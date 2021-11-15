<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class publishersController extends Controller
{
    public function list()
    {
        return view('publishers');
    }
}
