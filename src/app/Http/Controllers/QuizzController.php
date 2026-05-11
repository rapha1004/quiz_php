<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quizz;

class QuizzController extends Controller
{
    function index() {
        $quizzs = Quizz::all();
        return view('quizz', ['quizzs' => $quizzs]);
    }
}
