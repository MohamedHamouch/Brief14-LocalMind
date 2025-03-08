@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Ask a Question</h1>
            <p class="mt-2 text-sm text-gray-600">
                Get help from your local community. Be specific and provide enough details for others to help you effectively.
            </p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-md">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">
                            Please fix the following errors:
                        </h3>
                        <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Question Form -->
        <form action="{{ route('questions.store') }}" method="POST" class="bg-white shadow-sm rounded-lg border border-gray-100">
            @csrf
            <div class="p-6 space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Question Title <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="text" 
                               name="title" 
                               id="title" 
                               value="{{ old('title') }}"
                               class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('title') border-red-300 @enderror"
                               placeholder="e.g., What are the best coffee shops in Rabat?"
                               required>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">
                        Be specific and imagine you're asking a question to another person.
                    </p>
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">
                        Question Details <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1">
                        <textarea name="content" 
                                  id="content" 
                                  rows="6"
                                  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('content') border-red-300 @enderror"
                                  placeholder="Provide more details about your question..."
                                  required>{{ old('content') }}</textarea>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">
                        Include all the information someone would need to answer your question.
                    </p>
                </div>

                <!-- Location -->
                <div>
                    <label for="place" class="block text-sm font-medium text-gray-700">
                        Location <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1">
                        <select name="place" 
                                id="place" 
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('place') border-red-300 @enderror"
                                required>
                            <option value="">Select a city</option>
                            @foreach([
                                'Agadir', 'Casablanca', 'Chefchaouen', 'Essaouira', 'Fez', 
                                'Marrakech', 'Meknes', 'Merzouga', 'Ouarzazate', 'Rabat', 
                                'Tangier', 'Tetouan'
                            ] as $city)
                                <option value="{{ $city }}" {{ old('place') == $city ? 'selected' : '' }}>
                                    {{ $city }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">
                        Select the city your question is about.
                    </p>
                </div>

                <!-- Publishing Date -->
                <input type="hidden" name="published_at" value="{{ now()->format('Y-m-d') }}">
            </div>

            <!-- Form Actions -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 rounded-b-lg flex items-center justify-between">
                <a href="{{ route('questions.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Questions
                </a>
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Post Question
                </button>
            </div>
        </form>

        <!-- Tips Section -->
        <div class="mt-8 bg-indigo-50 rounded-lg p-6 border border-indigo-100">
            <h3 class="text-lg font-medium text-indigo-900 mb-4">
                <i class="fas fa-lightbulb mr-2 text-indigo-500"></i>
                Tips for a Great Question
            </h3>
            <ul class="space-y-3 text-sm text-indigo-900">
                <li class="flex items-start">
                    <i class="fas fa-check-circle mt-1 mr-2 text-indigo-500"></i>
                    <span>Be specific about what you're asking</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle mt-1 mr-2 text-indigo-500"></i>
                    <span>Provide relevant details and context</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle mt-1 mr-2 text-indigo-500"></i>
                    <span>Make sure your question is related to the selected location</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle mt-1 mr-2 text-indigo-500"></i>
                    <span>Check if a similar question hasn't been asked before</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection