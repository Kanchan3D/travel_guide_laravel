<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Premium Travel Guide</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
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
                <a href="/login" class="bg-white text-orange-600 hover:bg-yellow-50 px-5 py-2 rounded-md font-semibold transition duration-300">Login</a>
            </div>
        </div>
    </nav>

    <!-- Sign Up Section -->
    <main class="flex-grow flex items-center justify-center min-h-screen px-6">
        <div class="w-full max-w-md bg-white rounded-xl shadow-2xl p-10 animate-fade-in-down mt-4 mb-10">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Create Your Account ✨</h1>

            <form action="{{ route('signup.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-400" placeholder="Your Name" required>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-400" placeholder="you@example.com" required>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-400" placeholder="••••••••" required>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-400" placeholder="••••••••" required>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                        Sign Up
                    </button>
                </div>
            </form>

            <p class="text-center text-gray-500 text-sm mt-6">
                Already have an account? 
                <a href="/login" class="text-blue-600 hover:underline font-medium">Login here</a>.
            </p>
        </div>
    </main>

    <!-- Tailwind Animation -->
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
