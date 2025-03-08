@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Breadcrumb -->
    <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-6">
        <a href="{{ route('questions.index') }}" class="hover:text-indigo-600 transition-colors">Questions</a>
        <span><i class="fas fa-chevron-right text-xs"></i></span>
        <span class="text-gray-900">Details</span>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-8">
            <!-- Question Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-900 leading-tight mb-4">
                        {{ $question->title }}
                    </h1>
                    <div class="prose max-w-none text-gray-700 mb-6">
                        {{ $question->content }}
                    </div>
                    <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                    <i class="fas fa-user text-indigo-600"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $question->user->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $question->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                            <span class="h-6 w-px bg-gray-200"></span>
                            <div class="flex items-center text-gray-500">
                                <i class="fas fa-map-marker-alt text-indigo-500 mr-2"></i>
                                <span class="text-sm">{{ $question->place }}</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                                <i class="fas fa-comments mr-1"></i>
                                {{ $question->answers->count() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Answer Form -->
            @auth
                <div class="mt-8">
                    <form action="{{ route('answers.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Your Answer</h3>
                                <textarea name="content" 
                                          rows="6" 
                                          class="block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('content') border-red-300 @enderror"
                                          placeholder="Share your knowledge and experience..."
                                          required>{{ old('content') }}</textarea>
                                @error('content')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <div class="mt-4">
                                    <button type="submit" 
                                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                        <i class="fas fa-paper-plane mr-2"></i>
                                        Post Answer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @else
                <div class="mt-8 bg-gradient-to-r from-indigo-50 to-indigo-100 rounded-xl p-6 border border-indigo-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-12 w-12 bg-indigo-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-lock text-white text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-indigo-900">Join the conversation</h3>
                            <p class="mt-1 text-indigo-700">
                                <a href="{{ route('login') }}" class="font-semibold underline hover:text-indigo-800">Sign in</a> or 
                                <a href="{{ route('register') }}" class="font-semibold underline hover:text-indigo-800">create an account</a> 
                                to share your answer.
                            </p>
                        </div>
                    </div>
                </div>
            @endauth

            <!-- Answers List -->
            <div class="mt-8 space-y-6">
                <h2 class="text-xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-comments text-indigo-600 mr-2"></i>
                    {{ $question->answers->count() }} {{ Str::plural('Answer', $question->answers->count()) }}
                </h2>

                @forelse($question->answers as $answer)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center">
                                        <i class="fas fa-user text-gray-600"></i>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="text-base font-medium text-gray-900">{{ $answer->user->name }}</h4>
                                            <p class="text-sm text-gray-500">{{ $answer->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-4 prose max-w-none text-gray-700">
                                        {{ $answer->content }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-gray-50 rounded-xl p-8 text-center">
                        <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-gray-100 mb-4">
                            <i class="fas fa-comments text-gray-400 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-1">No answers yet</h3>
                        <p class="text-gray-500">Be the first to share your knowledge and help others!</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-4">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden sticky top-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">About this Question</h3>
                    <div class="space-y-4">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar-alt w-5 text-indigo-500"></i>
                            <span>Asked {{ $question->created_at->format('M d, Y') }}</span>
                        </div>
                        {{-- <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-eye w-5 text-indigo-500"></i>
                            <span>Viewed {{ rand(10, 100) }} times</span>
                        </div> --}}
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-map-marked-alt w-5 text-indigo-500"></i>
                            <span>Location: {{ $question->place }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection