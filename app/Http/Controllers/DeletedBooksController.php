<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DeletedBooksController extends Controller
{
    public function list()
    {
        $books = Book::onlyTrashed()->get();
        return view('deleted_books',compact('books'));
    }

    public function restore(Request $request)
    {
        Book::onlyTrashed()->where('id',$request->id)->restore();
       return view('books');
    }

}
