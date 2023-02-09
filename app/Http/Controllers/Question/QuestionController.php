<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\View\View;

class QuestionController extends Controller
{
    public function index(): View
    {
        $questions = Question::all();

        return view('faq', [
            'questions' => $questions
        ]);
    }
}
