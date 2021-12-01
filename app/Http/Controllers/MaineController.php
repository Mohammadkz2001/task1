<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class MaineController extends Controller
{
    public function show()
    {
        $books = Book::latest()->get();
        return view('mainpage' , ['books' => $books]);
    }
}
