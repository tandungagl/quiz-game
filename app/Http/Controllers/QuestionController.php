<?php

namespace App\Http\Controllers;

use App\Repositories\Question\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function __construct(
        protected QuestionRepositoryInterface $questionRepository)
    {
    }

    public function startQuizPage(Request $request){
        $randomQuestion = $this->questionRepository->getRandomQuestion();
        return view("quizPage", $randomQuestion);
    }
}
