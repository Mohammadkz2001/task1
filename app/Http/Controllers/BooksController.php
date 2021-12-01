<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function list()
    {
        $author = Author::all();
        $publisher = publisher::all();
        return view('books', [
            'auth' => $author,
            'pub' => $publisher
        ]);

    }

    public function store(Request $request)
    {
        $book = Book::create([
            'name' => $request->name,
            'author_id' => $request->author_id,
            'publisher_id' => $request->publisher_id,
            'quantity' => $request->quantity,
            'description' => $request->description,
        ]);

//            $book = Book::where('name',$request->input('name'))->first();

        if ($request->hasFile('file') and $request->file('file')->isValid()) {

            $book->addMediaFromRequest('file')->toMediaCollection('books_images');

        }


        return back()->with('massage', '**succesfull**');

    }

    public function addForm()
    {
        return view('books_add');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('edit', ['book' => $book]);

    }

    public function update(Request $request, $id)
    {
        Book::where('id', $id)->update([
            'name' => $request->input('name'),
            'author_id' => $request->input('author_id'),
            'publisher_id' => $request->input('publisher_id'),
            'quantity' => $request->input('quantity'),
        ]);
        return back()->with('massage', 'sucessfull');
    }

    public function destroy($id)
    {
        Book::where('id', $id)->delete();
        return back();
    }


}
