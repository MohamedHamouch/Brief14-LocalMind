<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'LocalMind') }}</title>
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Add Heroicons (You'll need to install this via npm) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-100">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ url('/') }}" class="flex items-center">
                                <i class="fas fa-brain text-indigo-600 text-2xl mr-2"></i>
                                <span class="text-xl font-bold text-gray-800 hover:text-indigo-600 transition">
                                    LocalMind
                                </span>
                            </a>
                        </div>
                        <div class="hidden sm:-my-px sm:ml-8 sm:flex space-x-4">
                            <a href="{{ url('/') }}" 
                               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:border-indigo-600 transition">
                                <i class="fas fa-home mr-2"></i>
                                Home
                            </a>
                            <a href="{{ route('questions.index') }}" 
                               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:border-indigo-600 transition">
                                <i class="fas fa-question-circle mr-2"></i>
                                Questions
                            </a>
                        </div>
                    </div>
                    <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                        @guest
                            <a href="{{ route('login') }}" 
                               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 transition">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                Login
                            </a>
                            <a href="{{ route('register') }}" 
                               class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 transition">
                                <i class="fas fa-user-plus mr-2"></i>
                                Register
                            </a>
                        @else
                            <div class="relative group">
                                <button class="flex items-center text-sm font-medium text-gray-600 hover:text-indigo-600 focus:outline-none transition">
                                    <i class="fas fa-user-circle mr-2 text-lg"></i>
                                    <span>{{ Auth::user()->name }}</span>
                                    <i class="fas fa-chevron-down ml-2 text-xs"></i>
                                </button>
                                <div class="absolute right-0 w-48 mt-2 py-2 bg-white rounded-md shadow-lg hidden group-hover:block">
                                    
                                    <a href="{{ route('logout') }}" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">
                                        <i class="fas fa-sign-out-alt mr-2"></i>
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex items-center sm:hidden">
                        <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Mobile menu -->
                <div class="sm:hidden hidden mobile-menu">
                    <div class="pt-2 pb-3 space-y-1">
                        <a href="{{ url('/') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50">
                            <i class="fas fa-home mr-2"></i>
                            Home
                        </a>
                        <a href="{{ route('questions.index') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50">
                            <i class="fas fa-question-circle mr-2"></i>
                            Questions
                        </a>
                        @guest
                            <a href="{{ route('login') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50">
                                <i class="fas fa-user-plus mr-2"></i>
                                Register
                            </a>
                        @else
                            {{-- <a href="{{ route('profile.edit') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50">
                                <i class="fas fa-cog mr-2"></i>
                                Profile Settings
                            </a> --}}
                            <a href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();"
                               class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Logout
                            </a>
                            <form id="mobile-logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-100">
            <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2 text-gray-600">
                        <i class="fas fa-brain text-indigo-600"></i>
                        <span>&copy; {{ date('Y') }} LocalMind. All rights reserved.</span>
                    </div>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-indigo-600 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-indigo-600 transition">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-indigo-600 transition">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu-button').addEventListener('click', function() {
            document.querySelector('.mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>

</html>