{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleDropdown() {
            document.getElementById('userDropdown').classList.toggle('hidden');
        }
    </script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">


        <aside class="w-64 bg-white shadow hidden md:block">
            <div class="h-16 flex items-center justify-center border-b">
                <h1 class="text-xl font-bold text-gray-700">Cinevibe</h1>
            </div>

            <nav class="mt-6">
                <a href="{{ route('dashboard') }}" class="block py-3 px-6 text-gray-700 hover:bg-gray-200">Dashboard</a>
            </nav>

            <nav class="mt-6">
                <a href="{{ route('admin-gallery.index') }}" class="block py-3 px-6 text-gray-700 hover:bg-gray-200">
                    Gallery
                </a>
            </nav>

            <nav class="mt-6">
                <a href="{{ route('admin-videos.index') }}"
                    class="block py-3 px-6 text-gray-700 hover:bg-gray-200">Videos</a>
            </nav>


            <nav class="mt-6">
                <a href="{{ route('admin.contact') }}" class="block py-3 px-6 text-gray-700 hover:bg-gray-200">Contact
                    Submissions</a>
            </nav>

        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Topbar -->
            <header class="bg-white shadow h-16 flex items-center justify-between px-6">
                <div class="text-lg font-semibold text-gray-800">Dashboard</div>

                <div class="relative">
                    <button onclick="toggleDropdown()"
                        class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 focus:outline-none">
                        @if (Auth::user()->profile_photo)
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                class="h-8 w-8 rounded-full" alt="User Avatar">
                        @else
                            <img src="{{ asset('images/default-avatar.jpg') }}" class="h-8 w-8 rounded-full"
                                alt="Default Avatar">
                        @endif

                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="userDropdown" class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg hidden z-10">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>

                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Log
                                Out</button>
                        </form>
                    </div>
                </div>
            </header>

            @yield('body')
        </div>
    </div>
</body>
</html> --}}








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleDropdown() {
            document.getElementById('userDropdown').classList.toggle('hidden');
        }
    </script>
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md hidden md:flex flex-col">

            <div class="h-20 flex items-center justify-center border-b space-x-4">
                <img src="{{ asset('images/logo.webp') }}" alt="Logo" class="h-17 w-17 object-contain">
            </div>


            <nav class="flex-1 mt-4 space-y-2 px-4">
                <a href="{{ route('dashboard') }}"
                    class="block py-2.5 px-4 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    Dashboard
                </a>

                <a href="{{ route('admin-gallery.index') }}"
                    class="block py-2.5 px-4 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    Gallery
                </a>

                <a href="{{ route('admin-videos.index') }}"
                    class="block py-2.5 px-4 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    Videos
                </a>

                <a href="{{ route('admin.contact') }}"
                    class="block py-2.5 px-4 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    Contact Submissions
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Topbar -->
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 border-b">
                <div class="text-xl font-semibold text-gray-800">Dashboard</div>

                <div class="relative">
                    <button onclick="toggleDropdown()"
                        class="flex items-center gap-2 text-gray-700 hover:text-blue-600 focus:outline-none transition">
                        @if (Auth::user()->profile_photo)
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                class="h-9 w-9 rounded-full border-2 border-blue-200" alt="User Avatar">
                        @else
                            <img src="{{ asset('images/default-avatar.jpg') }}"
                                class="h-9 w-9 rounded-full border-2 border-gray-300" alt="Default Avatar">
                        @endif
                        <span class="font-medium">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div id="userDropdown"
                        class="absolute right-0 mt-2 w-44 bg-white rounded-md shadow-xl border hidden z-50 overflow-hidden transition-all duration-150">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>

                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Log Out</button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Body -->
            {{-- <main class="flex-1 overflow-y-auto p-6 bg-gray-50"> --}}
            {{-- @yield('body') --}}
            {{-- </main> --}}
            @yield('body')
        </div>
    </div>
</body>

</html>
