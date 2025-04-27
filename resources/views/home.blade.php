<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Travel Guide</title>
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
</head>
<body class="bg-gradient-to-br from-yellow-50 to-blue-100 font-sans text-gray-800" x-data="{ showPaywall: false }">

    <!-- Navigation Bar -->
    <nav class="relative z-10 bg-orange-500 shadow-md py-5">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="text-white text-3xl font-extrabold tracking-wide">
                <a href="/" class="flex items-center space-x-2">
                    <span>🌎 Premium Travel Guide</span>
                </a>
            </div>
            <div class="space-x-3">
                <a href="/login" class="text-white hover:text-yellow-100 px-4 py-2 rounded-md transition duration-300">Login</a>
                <a href="/signup" class="bg-white text-orange-600 hover:bg-yellow-50 px-5 py-2 rounded-md font-semibold transition duration-300">Sign Up</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative z-10 text-center py-24 px-6">
        <div class="container mx-auto">
            <h1 class="text-5xl md:text-6xl font-bold leading-tight text-gray-900 mb-6 animate-fade-in-down">
                Discover Your Next Adventure
            </h1>
            <p class="text-xl md:text-2xl text-gray-700 mb-10 max-w-2xl mx-auto animate-fade-in-up">
                Unlock premium travel insights, exclusive destinations, and personalized recommendations.
            </p>
            <a href="/signup" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-8 py-3 rounded-full text-lg shadow-md transition duration-300">
                Get Started
            </a>
        </div>
    </section>

    <!-- Search Section -->
    <section class="mt-10 px-6 text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-6">Search Your Destination</h2>
        <form method="POST" action="{{ route('query.store') }}" class="mx-auto flex items-center bg-white border-2 border-blue-200 rounded-full shadow-xl px-4 py-2 w-full max-w-xl transition duration-300 hover:shadow-2xl">
            @csrf
            <input
                type="text"
                name="query"
                value="{{ old('query', $query ?? '') }}"
                class="flex-grow px-4 py-2 text-gray-700 focus:outline-none rounded-full placeholder-gray-400"
                placeholder="Search Manali, Nainital, Shimla..."
            >
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white p-3 rounded-full ml-2 transition duration-300">
                🔍
            </button>
        </form>
    </section>

    <!-- Optional: Small Footer -->
    <footer class="mt-70 py-6 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} Premium Travel Guide. All rights reserved.
    </footer>

    <!-- Tailwind Animations (optional utility) -->
    <style>
        .animate-fade-in-down {
            animation: fadeInDown 1s ease-out forwards;
        }
        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
        }
        @keyframes fadeInDown {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>

</body>
</html>
