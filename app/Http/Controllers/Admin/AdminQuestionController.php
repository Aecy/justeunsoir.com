<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AdminQuestionUpdateRequest;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminQuestionController extends Controller
{
    public function index(): View
    {
        $questions = Question::all();

        return view('admin.questions.index', [
            'questions' => $questions,
            'user' => $this->getUser(),
        ]);
    }

    public function create(): View
    {
        return view('admin.questions.create', [
            'user' => $this->getUser()
        ]);
    }

    public function edit(Question $question): View
    {
        return view('admin.questions.edit', [
            'question' => $question,
            'user' => $this->getUser()
        ]);
    }

    public function update(AdminQuestionUpdateRequest $request, Question $question): RedirectResponse
    {
        $question->fill($request->validated());
        $question->save();

        return redirect()->back();
    }

    public function store(AdminQuestionUpdateRequest $request): RedirectResponse
    {
        Question::create($request->validated());

        return redirect()->to(
            route('admin.question.index')
        );
    }
}
