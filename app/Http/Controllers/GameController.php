<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntryNameRequest;
use App\Http\Requests\UserAnswerRequest;
use App\Repositories\Question\QuestionRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\UserAnswer\UserAnswerRepositoryInterface;

class GameController extends Controller
{
    public function __construct(
        protected QuestionRepositoryInterface $questionRepository,
        protected UserRepositoryInterface $userRepository,
        protected UserAnswerRepositoryInterface $userAnswerRepository
    ) {}

    public function entryNamePage()
    {
        return view('entry-name');
    }

    public function submitName(EntryNameRequest $request)
    {
        // Luc: Tạo user hoặc lưu tạm trong session
        $user = $this->userRepository->create(['name' => $request->player_name]);
        session(['user_id' => $user->id]);

        // Luc: Lấy 5 câu hỏi ngẫu nhiên
        $questions = $this->questionRepository->getRandomQuestion();
        session(['questions' => $questions, 'current_index' => 0]);

        return redirect()->route('question.show', 0);
    }

    public function showQuestion($index)
    {
        $questions = session('questions');
        if (!$questions || $index < 0 || $index >= count($questions)) {
            return redirect()->route('home');
        }

        $question = $questions[$index];

        return view('question', compact('question', 'index'));
    }

    public function answer(UserAnswerRequest $request)
    {
        $userId = session('user_id');
        $questionId = $request->question_id;
        $selectedOption = $request->answer;

        // Luc: Lưu câu trả lời
        $this->userAnswerRepository->updateOrCreate(
            ['user_id' => $userId, 'question_id' => $questionId],
            ['answer' => $selectedOption]
        );

        // Luc: Chuyển câu hỏi
        $questions = session('questions');
        $currentIndex = $request->current_index;

        if ($request->action == 'next') {
            $currentIndex++;
        } elseif ($request->action == 'prev') {
            $currentIndex--;
        }

        return redirect()->route('question.show', $currentIndex);
    }

    public function finish()
    {
        $userId = session('user_id');
        $questions = session('questions');
        $answers = $this->userAnswerRepository->getUserAnswer($userId);

        // Luc: Tính điểm
        $score = 0;
        foreach ($questions as $question) {
            $userAnswer = $answers->firstWhere('question_id', $question->id);
            if ($userAnswer && $userAnswer->answer === $question->correct_option) {
                $score++;
            }
        }
        $this->userRepository->update($userId, ['score'=> $score]);

        // Luc: Xóa session sau khi xong 1 phiên
        session()->flush();

        return view('result', compact('score'));
    }
}
