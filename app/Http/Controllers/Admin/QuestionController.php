<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Repositories\Question\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct(
        protected QuestionRepositoryInterface $questionRepository
    ) {}

    public function list()
    {
        $questionList = $this->questionRepository->getAll();

        return view("admin.question-list", compact('questionList'));
    }

    public function create()
    {
        return view('admin.question-create');
    }

    public function store(QuestionRequest $request)
    {
        $data = $request->only([
            'question',
            'option_a',
            'option_b',
            'option_c',
            'option_d',
            'correct_option',
        ]);
        $question = $this->questionRepository->create( $data);
        if(! $question) {
            return redirect()->back()->withErrors(['message' => 'Failed to create question.']);
        }

        return redirect()->route('question.list')->with('success', 'Question created successfully.');
    }

    public function edit($id)
    {
        $question = $this->questionRepository->find($id);
        if (! $question) {
            abort(404);
        }

        return view('admin.question-edit', compact('question'));
    }

    public function update(QuestionRequest $request, $id)
    {
        if (!$request->validated()) {
            return back()->withInput($request->all());
        }

        $data = $request->only([
            'question',
            'option_a',
            'option_b',
            'option_c',
            'option_d',
            'correct_option',
        ]);

        $updated = $this->questionRepository->update($id, $data);
        if (! $updated) {
            return redirect()->back()->withInput($request->all());
        }

        return redirect()->route('question.list')->with('success', 'Question updated successfully.');
    }

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $deleted = $this->questionRepository->delete($id);

        if ($deleted) {
            return redirect()->route('question.list')->with('success', 'Question deleted successfully.');
        }

        return redirect()->back()->withErrors(['message' => 'Failed to delete question.']);
    }
}
