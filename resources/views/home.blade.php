@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-4">Welcome to LocalMind</h1>
        <p class="text-gray-700 mb-6">
            LocalMind is a community-driven platform where users can ask and answer questions about local topics. Whether you're looking for recommendations, advice, or local insights, LocalMind is the place to connect with your community.
        </p>

        <h2 class="text-2xl font-semibold mb-4">Features</h2>
        <ul class="list-disc list-inside text-gray-700 mb-6">
            <li>Ask questions about local events, services, and more</li>
            <li>Answer questions to share your knowledge and help others</li>
            <li>Upvote helpful answers to highlight the best information</li>
            <li>Manage your profile and track your contributions</li>
        </ul>

        <h2 class="text-2xl font-semibold mb-4">How It Works</h2>
        <p class="text-gray-700 mb-6">
            Simply register for an account to start asking and answering questions. Use the search function to find existing questions or topics you're interested in. Engage with your community by providing valuable insights and information.
        </p>

        <a href="{{ route('register') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Get Started
        </a>
    </div>
@endsection