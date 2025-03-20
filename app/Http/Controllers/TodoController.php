<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('todo.index');
    }

    public function Create() {
        return view('todo.create');
    }

    public function Edit() {
        return view('todo.edit');
    }
}
