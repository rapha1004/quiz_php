<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizzController extends Controller
{
    function index() {
        return view('quizz');
    }
}
