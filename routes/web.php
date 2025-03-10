<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;


Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create')->middleware('auth');
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store')->middleware('auth');
Route::get('/questions/{id}', [QuestionController::class, 'show'])->name('questions.show');
Route::post('/answers', [AnswerController::class, 'store'])->name('answers.store')->middleware('auth');


// Route::get('/debug', function () {
//     dd(auth()->user());
// });

require __DIR__ . '/auth.php';
