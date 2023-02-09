<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminQuestionUpdateRequest;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
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

        alert()->success("Vous avez modifier la question $question->title");

        return redirect()->to(
            route('admin.question.index')
        );
    }

    public function store(AdminQuestionUpdateRequest $request): RedirectResponse
    {
        Question::create($request->validated());

        alert()->success("Vous avez créer une nouvelle question / réponse.");

        return redirect()->to(
            route('admin.question.index')
        );
    }

    public function delete(Question $question): RedirectResponse
    {
        $question->delete();

        alert()->success("Vous avez supprimé une question / réponse.");

        return redirect()->to(
            route('admin.question.index')
        );
    }
}
