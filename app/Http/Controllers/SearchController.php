<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{

        public function __invoke(Request $request)
    {

        $results = null;
        $query = $request->get('query');
        if($query){
            $results = Book::search($query)->get();
        }
        return view('mainpage' ,
            ['books' => $results]
        );

    }
}
