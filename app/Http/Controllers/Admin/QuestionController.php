<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use Illuminate\View\View;

class QuestionController
{
    public function index(): View
    {
        $questions = Question::all();

        return view('faq', [
            'questions' => $questions
        ]);
    }
}
