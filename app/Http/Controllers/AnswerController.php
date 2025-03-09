<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|min:10',
            'question_id' => 'required|exists:questions,id'
        ]);

        $answer = Answer::create([
            'content' => $validated['content'],
            'question_id' => $validated['question_id'],
            'user_id' => auth()->id(),
            'answered_at' => now() ,
        ]);

        return redirect()
            ->route('questions.show', $answer->question_id)
            ->with('success', 'Your answer has been posted successfully!');
    }
}
