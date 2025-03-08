@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Community Questions</h1>
        <a href="{{ route('questions.create') }}" 
           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
            <i class="fas fa-plus-circle mr-2"></i>
            Ask a Question
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="bg-white shadow-sm rounded-lg border border-gray-100">
        @forelse($questions as $question)
            <div class="border-b border-gray-100 last:border-b-0">
                <div class="p-6 hover:bg-gray-50 transition-colors">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                <i class="fas fa-question text-indigo-600"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <a href="{{ route('questions.show', $question->id) }}" 
                               class="text-xl font-semibold text-gray-900 hover:text-indigo-600 transition-colors">
                                {{ $question->title }}
                            </a>
                            <p class="mt-1 text-sm text-gray-500 line-clamp-2">
                                {{ Str::limit($question->content, 150) }}
                            </p>
                            <div class="mt-2 flex items-center space-x-4 text-sm">
                                <div class="flex items-center text-gray-500">
                                    <i class="fas fa-user-circle mr-1"></i>
                                    {{ $question->user->name }}
                                </div>
                                <div class="flex items-center text-gray-500">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    {{ $question->place }}
                                </div>
                                <div class="flex items-center text-gray-500">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    {{ \Carbon\Carbon::parse($question->published_at)->format('M d, Y') }}
                                </div>
                                <div class="flex items-center text-gray-500">
                                    <i class="fas fa-comments mr-1"></i>
                                    {{ $question->answers->count() }} 
                                    {{ Str::plural('answer', $question->answers->count()) }}
                                </div>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="fas fa-chevron-right text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="p-6 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                    <i class="fas fa-question-circle text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-1">No questions yet</h3>
                <p class="text-gray-500">Be the first to ask a question!</p>
                <a href="{{ route('questions.create') }}" 
                   class="inline-flex items-center px-4 py-2 mt-4 border border-transparent rounded-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition-colors">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Ask a Question
                </a>
            </div>
        @endforelse
    </div>

    @if($questions->hasPages())
    <div class="mt-6">
        {{ $questions->links('vendor.pagination.tailwind') }}
    </div>
@endif
</div>
@endsection