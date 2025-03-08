@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="text-center py-12 px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6">
                Welcome to <span class="text-indigo-600">LocalMind</span>
            </h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-600 mb-8">
                Your community-driven platform for local insights, recommendations, and knowledge sharing. Connect with your
                community and get answers from people who know best.
            </p>
            <div class="space-x-4">
                @guest
                    <a href="{{ route('register') }}"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150 ease-in-out">
                        <i class="fas fa-user-plus mr-2"></i>
                        Get Started
                    </a>
                    <a href="{{ route('questions.index') }}"
                        class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 hover:text-indigo-600 transition duration-150 ease-in-out">
                        <i class="fas fa-search mr-2"></i>
                        Browse Questions
                    </a>
                @else
                    <a href="{{ route('questions.create') }}"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150 ease-in-out">
                        <i class="fas fa-question-circle mr-2"></i>
                        Ask a Question
                    </a>
                    <a href="{{ route('questions.index') }}"
                        class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 hover:text-indigo-600 transition duration-150 ease-in-out">
                        <i class="fas fa-comments mr-2"></i>
                        Join Discussions
                    </a>
                @endguest
            </div>
        </div>

        <!-- Features Section -->
        <div class="py-12 bg-white rounded-lg shadow-sm border border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Platform Features</h2>
                    <p class="text-lg text-gray-600">Everything you need to connect with your local community and share
                        knowledge.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Feature 1 -->
                    <div class="flex flex-col items-center p-6 bg-gray-50 rounded-lg hover:shadow-md transition">
                        <div class="h-12 w-12 text-indigo-600 mb-4">
                            <i class="fas fa-question-circle text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Ask Questions</h3>
                        <p class="text-gray-600 text-center">Get answers about local events, services, and community matters
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex flex-col items-center p-6 bg-gray-50 rounded-lg hover:shadow-md transition">
                        <div class="h-12 w-12 text-indigo-600 mb-4">
                            <i class="fas fa-lightbulb text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Share Knowledge</h3>
                        <p class="text-gray-600 text-center">Answer questions and help others with your local expertise</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="flex flex-col items-center p-6 bg-gray-50 rounded-lg hover:shadow-md transition">
                        <div class="h-12 w-12 text-indigo-600 mb-4">
                            <i class="fas fa-thumbs-up text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Vote & Engage</h3>
                        <p class="text-gray-600 text-center">Upvote helpful answers and engage with the community</p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="flex flex-col items-center p-6 bg-gray-50 rounded-lg hover:shadow-md transition">
                        <div class="h-12 w-12 text-indigo-600 mb-4">
                            <i class="fas fa-user-circle text-3xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Build Profile</h3>
                        <p class="text-gray-600 text-center">Manage your profile and track your contributions</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- How It Works Section -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 lg:text-center">How It Works</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Step 1 -->
                    <div class="relative pl-16">
                        <div
                            class="absolute left-0 top-0 flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 text-white">
                            1
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Create an Account</h3>
                        <p class="text-gray-600">Register for free to join our community and start participating in
                            discussions.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative pl-16">
                        <div
                            class="absolute left-0 top-0 flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 text-white">
                            2
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Ask or Answer</h3>
                        <p class="text-gray-600">Post your questions or share your knowledge by answering others' questions.
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative pl-16">
                        <div
                            class="absolute left-0 top-0 flex items-center justify-center h-12 w-12 rounded-md bg-indigo-600 text-white">
                            3
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Engage & Grow</h3>
                        <p class="text-gray-600">Participate in discussions, vote on answers, and build your reputation.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="bg-indigo-50 rounded-lg shadow-sm border border-indigo-100 mt-12 mb-8">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 flex flex-col items-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">Ready to Join Your Local Community?</h2>
                <p class="text-lg text-gray-600 mb-8 text-center">Start asking questions and sharing your knowledge today.
                </p>
                @guest
                    <div class="space-x-4">
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150 ease-in-out">
                            <i class="fas fa-user-plus mr-2"></i>
                            Create Account
                        </a>
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 hover:text-indigo-600 transition duration-150 ease-in-out">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Sign In
                        </a>
                    </div>
                @else
                    <a href="{{ route('questions.create') }}"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150 ease-in-out">
                        <i class="fas fa-question-circle mr-2"></i>
                        Ask Your First Question
                    </a>
                @endguest
            </div>
        </div>
    </div>
@endsection