<?php

namespace App\Http\Controllers;

use App\Http\Resources\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function list()
    {
        return view('authors');
    }
}
