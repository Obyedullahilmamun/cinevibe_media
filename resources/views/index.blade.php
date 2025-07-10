<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Breeze Project</title>

    <!-- Tailwind + Fonts (Breeze default) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="antialiased bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-400 selection:bg-red-500 selection:text-white">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker dark:bg-dots-lighter bg-center">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold hover:text-gray-900 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold hover:text-gray-900 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        Log In
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold hover:text-gray-900 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        @endif

        <!-- Welcome Message + BDT Time & Date -->
        <div class="text-center mt-20 sm:mt-0 px-4">
            <h1 class="text-5xl font-extrabold text-indigo-700 dark:text-indigo-300 mb-6 drop-shadow">
                Welcome to Breeze Project
            </h1>

            <div class="mt-4 p-6 bg-white dark:bg-gray-800 rounded-xl shadow-xl inline-block">
                <p class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-4">
                    📅 <span id="current-date" class="text-green-600 dark:text-green-400"></span>
                </p>
                <p class="text-5xl font-extrabold text-blue-700 dark:text-blue-400 tracking-wide">
                    🕒 <span id="current-time"></span> <span class="text-lg text-gray-500">(BDT)</span>
                </p>

            </div>
        </div>
    </div>

    <!-- Script to Show BDT Time & Date -->
    <script>
        function updateBDTTime() {
            const bdtOffset = 6 * 60; // BDT is UTC+6
            const now = new Date();
            const utc = now.getTime() + now.getTimezoneOffset() * 60000;
            const bdt = new Date(utc + (bdtOffset * 60000));

            const optionsDate = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const optionsTime = {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            };

            document.getElementById('current-date').textContent = bdt.toLocaleDateString('en-BD', optionsDate);
            document.getElementById('current-time').textContent = bdt.toLocaleTimeString('en-BD', optionsTime);
        }

        updateBDTTime();
        setInterval(updateBDTTime, 1000); // Update every second
    </script>
</body>

</html>
