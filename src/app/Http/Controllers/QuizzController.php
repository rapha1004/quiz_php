<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quizz;
use App\Models\Question;

class QuizzController extends Controller
{
    function index() {
        $quizzs = Quizz::all();
        return view('quizz', ['quizzs' => $quizzs]);
    }

    function participate($quizzId, $questionNumber = 1) {
        $quizz = Quizz::findOrFail($quizzId);
        $questions = $quizz->questions()->orderBy('position')->get();
        
        if ($questions->isEmpty()) {
            return redirect()->route('quizzs.index')->with('error', 'This quiz has no questions.');
        }

        $totalQuestions = $questions->count();
        
        if ($questionNumber < 1 || $questionNumber > $totalQuestions) {
            $questionNumber = 1;
        }

        $currentQuestion = $questions[$questionNumber - 1];
        $responses = $currentQuestion->responses;

        return view('quiz-participate', [
            'quizz' => $quizz,
            'currentQuestion' => $currentQuestion,
            'responses' => $responses,
            'questionNumber' => $questionNumber,
            'totalQuestions' => $totalQuestions,
            'progressPercentage' => round(($questionNumber / $totalQuestions) * 100),
        ]);
    }
}
