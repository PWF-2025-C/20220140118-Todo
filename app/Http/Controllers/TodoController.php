<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', Auth::id())
        // ->orderBy('is_done', 'asc')
        ->orderBy('created_at', 'desc')
        ->get();
        // dd($todos);
        return view('todo.index', compact('todos'));
    }

    public function Create() {
        return view('todo.create');
    }

    public function Edit() {
        return view('todo.edit');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $todo = Todo::create([
            'title' => ucfirst($request->title),
            'user_id' => auth()->user()->id,
        ]);

    return redirect()->route('todo.index')->with('success', 'Todo created successfully!');
    }
}
