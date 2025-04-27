<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search | Premium Travel Guide</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-yellow-50 to-blue-100 font-sans text-gray-800 min-h-screen" x-data="{ showPaywall: false }">

    <!-- Navigation Bar -->
    <nav class="relative z-10 bg-orange-500 shadow-md py-5">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="text-white text-3xl font-extrabold tracking-wide">
                <a href="/" class="flex items-center space-x-2">
                    <span>🌎 Premium Travel Guide</span>
                </a>
            </div>
            <div class="flex space-x-4">
                <a href="/" class="bg-white text-orange-600 hover:bg-yellow-50 px-5 py-2 rounded-md font-semibold transition duration-300">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Search Section -->
    <section class="flex flex-col items-center text-center mt-16 px-6">
        <h1 class="text-4xl font-bold text-gray-800 mb-6 animate-fade-in-down">Search Your Destination</h1>
        <form method="POST" action="{{ route('query.store') }}" class="flex items-center bg-white border-2 border-blue-200 rounded-full shadow-xl px-4 py-2 w-full max-w-xl transition duration-300 hover:shadow-2xl">
            @csrf
            <input type="text" name="query" value="{{ old('query', $query ?? '') }}" class="flex-grow px-4 py-2 text-gray-700 focus:outline-none rounded-full placeholder-gray-400" placeholder="Search Manali, Nainital, Shimla...">
            <button type="submit" class="bg-green-300 hover:bg-green-600 text-white p-4 rounded-full ml-4 transition duration-300">
                🔍
            </button>
        </form>
    </section>

    <!-- Results Section -->
    <section class="max-w-7xl mx-auto mt-16 px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="md:col-span-2 space-y-8">
            <!-- Images -->
            @if (!empty($images))
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 animate-fade-in-up">
                    @foreach ($images as $imgUrl)
                        <div class="overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-transform transform hover:scale-105">
                            <img src="{{ $imgUrl }}" alt="Image" class="w-full h-48 object-cover">
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Search Results -->
            @if(!empty($results))
                @foreach ($results as $result)
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300 animate-fade-in-up">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{ $result['title'] }}</h2>
                        <p class="text-gray-600">{!! $result['snippet'] !!}...</p>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Sidebar: AI Tour Guide -->
        <aside class="bg-white p-6 rounded-xl shadow-md h-fit sticky top-24 animate-fade-in-up">
            <h3 class="text-2xl font-semibold text-blue-700 mb-4">🧭 AI Tour Guide</h3>

            @if (!empty($suggestions) && isset($suggestions['error']))
                <div class="p-4 bg-red-100 text-red-700 rounded-lg shadow">
                    <h3 class="text-lg font-bold">{{ $suggestions['error']['title'] ?? 'Error' }}</h3>
                    <p class="text-sm">{{ $suggestions['error']['description'] ?? 'An unexpected error occurred.' }}</p>
                </div>
            @elseif (!empty($suggestions))
                <div class="space-y-5">
                    @foreach($suggestions as $section)
                        <div class="border-l-4 border-blue-500 pl-4">
                            <h4 class="text-xl font-bold text-gray-700">{{ $section['title'] ?? 'Untitled Section' }}</h4>
                            <p class="text-gray-600 mt-2">{{ $section['description'] ?? 'No description available.' }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </aside>
    </section>

    <!-- Tailwind Animations -->
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
