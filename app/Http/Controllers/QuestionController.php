<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
 public function index() {
        return view('questions.index', ['questions' => Question::all()]);
    }

    public function create() {
        return view('questions.create');
    }

    public function store(Request $request) {
        Question::create($request->all());
        return redirect()->route('questions.index');
    }

    public function show(Question $question) {
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question) {
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question) {
        $question->update($request->all());
        return redirect()->route('questions.index');
    }

    public function destroy(Question $question) {
        $question->delete();
        return redirect()->route('questions.index');
    }}
