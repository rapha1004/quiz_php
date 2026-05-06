<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Book;

class HomeController extends Controller
{
    function index() {
        $books = Book::all();
        return view('home', ["books" => $books]);
    }
}
