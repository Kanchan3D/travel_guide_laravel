<!DOCTYPE html>
<html lang="en" x-data="{ showPaywall: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Premium Travel Guide</title>
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
</head>
<body class="bg-gradient-to-br from-yellow-50 to-blue-100 font-sans text-gray-800">

    <!-- Navigation Bar -->
    <nav class="relative z-10 bg-orange-500 shadow-md py-5">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="text-white text-3xl font-extrabold tracking-wide">
                <a href="/" class="flex items-center space-x-2">
                    <span>🌎 Premium Travel Guide</span>
                </a>
            </div>
            <div class="space-x-3">
                <a href="/signup" class="bg-white text-orange-600 hover:bg-yellow-50 px-5 py-2 rounded-md font-semibold transition duration-300">Sign Up</a>
            </div>
        </div>
    </nav>

    <!-- Login Form Section -->
    <section class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white p-10 rounded-xl shadow-2xl w-full max-w-md animate-fade-in-down">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Welcome Back 👋</h2>

            <form action="/login" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-gray-600 mb-1">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none placeholder-gray-400"
                        placeholder="you@example.com">
                </div>

                <div>
                    <label for="password" class="block text-gray-600 mb-1">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none placeholder-gray-400"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2">
                        Remember me
                    </label>
                    <a href="#" class="text-blue-600 hover:underline">Forgot Password?</a>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition duration-300">
                    Log In
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Don't have an account?
                <a href="/signup" class="text-blue-600 hover:underline font-medium">Sign Up</a>
            </p>
        </div>
    </section>

    <!-- Tailwind Animations -->
    <style>
        .animate-fade-in-down {
            animation: fadeInDown 1s ease-out forwards;
        }

        @keyframes fadeInDown {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>

</body>
</html>
