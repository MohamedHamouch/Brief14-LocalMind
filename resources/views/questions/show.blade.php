@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Question Section -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6">
            <!-- Question Header -->
            <div class="flex items-start justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">
                        {{ $question->title }}
                    </h1>
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <i class="fas fa-user-circle mr-2"></i>
                        <span>{{ $question->user->name }}</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-clock mr-2"></i>
                        <span>{{ $question->created_at->diffForHumans() }}</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span>{{ $question->place }}</span>
                    </div>
                </div>
            </div>

            <!-- Question Content -->
            <div class="mt-4 text-gray-700 space-y-4">
                {{ $question->content }}
            </div>
        </div>
    </div>

    <!-- Answers Section -->
    <div class="mt-8">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">
            <i class="fas fa-comments mr-2 text-indigo-600"></i>
            {{ $question->answers->count() }} {{ Str::plural('Answer', $question->answers->count()) }}
        </h2>

        <!-- Answer Form (Only for authenticated users) -->
        @auth
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden mb-6">
                <form action="{{ route('answers.store') }}" method="POST" class="p-6">
                    @csrf
                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                    
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">
                            Your Answer
                        </label>
                        <div class="mt-1">
                            <textarea name="content" 
                                      id="content" 
                                      rows="4" 
                                      class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('content') border-red-300 @enderror"
                                      placeholder="Share your knowledge..."
                                      required>{{ old('content') }}</textarea>
                        </div>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4 flex justify-end">
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Post Answer
                        </button>
                    </div>
                </form>
            </div>
        @else
            <div class="bg-indigo-50 rounded-lg p-6 mb-6 border border-indigo-100">
                <div class="flex items-center">
                    <i class="fas fa-lock text-indigo-600 mr-3 text-lg"></i>
                    <div>
                        <h3 class="text-indigo-900 font-medium">Want to contribute?</h3>
                        <p class="text-indigo-700 text-sm mt-1">
                            Please <a href="{{ route('login') }}" class="font-medium underline hover:text-indigo-800">log in</a> or 
                            <a href="{{ route('register') }}" class="font-medium underline hover:text-indigo-800">register</a> to post an answer.
                        </p>
                    </div>
                </div>
            </div>
        @endauth

        <!-- Answers List -->
        <div class="space-y-6">
            @forelse($question->answers as $answer)
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-user-circle text-2xl text-gray-400"></i>
                                </div>
                                <div>
                                    <div class="font-medium text-gray-900">{{ $answer->user->name }}</div>
                                    <div class="text-sm text-gray-500">
                                        {{ $answer->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-gray-700 space-y-4">
                            {{ $answer->content }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-gray-50 rounded-lg p-6 text-center">
                    <i class="fas fa-comments text-gray-400 text-3xl mb-3"></i>
                    <p class="text-gray-500">No answers yet. Be the first to share your knowledge!</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Back to Questions -->
    <div class="mt-8">
        <a href="{{ route('questions.index') }}" 
           class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-indigo-600 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Questions
        </a>
    </div>
</div>
@endsection