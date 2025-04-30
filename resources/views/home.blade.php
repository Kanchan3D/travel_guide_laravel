<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Travel Guide</title>
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
</head>

<body class="bg-gradient-to-br from-[#dbeafe] to-[#38bdf8] font-sans text-gray-800">

    <!-- Navigation Bar -->
    <nav class="relative z-10 bg-gradient-to-r from-[#7dd3fc] to-blue-500 shadow-md py-5">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="text-[#1d4ed8] text-3xl font-extrabold tracking-wide">
                <a href="/" class="flex items-center space-x-2">
                    <span>🏔️ Premium Travel Guide</span>
                </a>
            </div>
            <div class="space-x-3 flex">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-white text-orange-600 hover:bg-red-400 hover:text-white px-5 py-2 rounded-md font-semibold transition duration-300">
                            Logout
                        </button>
                    </form>
                @endauth
            
                @guest
                    <a href="{{ route('login') }}"
                        class="bg-white text-[#2563eb] hover:bg-[#bbf7d0] px-5 py-2 rounded-md font-semibold transition duration-300">
                        Log In
                    </a>
                    <a href="/signup"
                        class="bg-white text-[#2563eb] hover:bg-[#bbf7d0] px-5 py-2 rounded-md font-semibold transition duration-300">
                        Sign Up
                    </a>
                @endguest
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
            <a href="/query"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-8 py-3 rounded-full text-lg shadow-md transition duration-300">
                Search Now
            </a>
        </div>
    </section>

   



    <!-- Tailwind Animations (optional utility) -->
    <style>
        .animate-fade-in-down {
            animation: fadeInDown 1s ease-out forwards;
        }

        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <!-- Destination Cards Section -->
    <section class="mt-16 px-6">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-10">Top Tourist Destinations</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            @foreach ([
                ['title' => 'Manali', 'image' => 'https://ujjwaltourandtravels.com/wp-content/uploads/2024/07/Manali-HD-Image-2.jpg', 'desc' => 'A beautiful hill station in Himachal Pradesh, perfect for nature and snow lovers.'],
                ['title' => 'Nainital', 'image' => 'https://i0.wp.com/stampedmoments.com/wp-content/uploads/2022/09/boating-naini-lake.jpg?fit=1920%2C1080&ssl=1', 'desc' => 'Surrounded by lakes and hills, Nainital is a charming town ideal for family trips.'],
                ['title' => 'Mussoorie', 'image' => 'https://c1.wallpaperflare.com/preview/893/142/399/mussoorie-uttarakhand-india-dehradun-district.jpg', 'desc' => 'The Queen of Hills, Mussoorie offers colonial charm and breathtaking views.'],
                ['title' => 'Goa', 'image' => 'https://c4.wallpaperflare.com/wallpaper/413/52/29/agonda-beach-goa-india-wallpaper-preview.jpg', 'desc' => 'Famous for its beaches, nightlife, and Portuguese heritage, Goa is a top vacation spot.'],
                ['title' => 'Kerala', 'image' => 'https://c4.wallpaperflare.com/wallpaper/532/772/1020/munroe-island-kerala-india-wallpaper-preview.jpg', 'desc' => 'God’s Own Country is known for lush greenery, houseboats, and Ayurvedic retreats.'],
                ['title' => 'Agra', 'image' => 'https://c4.wallpaperflare.com/wallpaper/320/1011/669/taj-mahal-agra-india-4k-wallpaper-preview.jpg', 'desc' => 'Home of the iconic Taj Mahal, Agra is a must-visit destination for history and architecture lovers.']
            ] as $destination)
                <form method="POST" action="{{ route('query.store') }}">
                    @csrf
                    <input type="hidden" name="query" value="{{ $destination['title'] }}">
                    <button type="submit" class="w-full text-left">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transform hover:scale-105 transition duration-300">
                            <img src="{{ $destination['image'] }}" alt="{{ $destination['title'] }}" class="w-full h-56 object-cover">
                            <div class="p-5">
                                <h3 class="text-xl font-semibold text-gray-800">{{ $destination['title'] }}</h3>
                                <p class="text-gray-600 mt-2">{{ $destination['desc'] }}</p>
                            </div>
                        </div>
                    </button>
                </form>
            @endforeach
        </div>
    </section>
    
    <!-- Optional: Small Footer -->
    <footer class="mt-10 py-6 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} Premium Travel Guide. All rights reserved.
    </footer>
</body>

</html>