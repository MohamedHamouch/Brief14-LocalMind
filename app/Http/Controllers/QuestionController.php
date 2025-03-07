<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('user')->latest()->get();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'place' => 'required|string|max:255',
        ]);

        $question = new Question();
        $question->user_id = Auth::id();
        $question->title = $request->title;
        $question->content = $request->content;
        $question->place = $request->place;
        $question->published_at = now();
        $question->save();

        return redirect()->route('questions.index')->with('success', 'Question created successfully.');
    }

    public function show($id)
    {
        $question = Question::with('user', 'answers.user')->findOrFail($id);
        return view('questions.show', compact('question'));
    }

}
