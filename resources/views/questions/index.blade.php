@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Questions</h1>
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white shadow-md rounded-lg p-6">
            <ul>
                @foreach($questions as $question)
                    <li class="mb-4">
                        <a href="{{ route('questions.show', $question->id) }}" class="text-xl font-semibold text-blue-500 hover:underline">
                            {{ $question->title }}
                        </a>
                        <p class="text-gray-700">By {{ $question->user->name }} on {{ $question->published_at }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection