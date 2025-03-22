<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(5);
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:10|max:255',
            'content' => 'required|min:10',
            'place' => 'required|string',
            'published_at' => 'required|date',
        ]);
    
        $question = Question::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'place' => $validated['place'],
            'published_at' => $validated['published_at'],
            'user_id' => auth()->id(),
        ]);
    

        return redirect()->route('questions.index')->with('success', 'Question created successfully.');
    }

    public function show($id)
    {
        $question = Question::with('user', 'answers.user')->findOrFail($id);
        return view('questions.show', compact('question'));
    }

}
