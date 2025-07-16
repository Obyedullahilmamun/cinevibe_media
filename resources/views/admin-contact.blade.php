@php use Illuminate\Support\Str; @endphp

@extends('layouts.admin_master')

@section('body')
    <main class="flex-1 overflow-y-auto bg-gray-50 min-h-screen p-1 sm:p-6">

        <!-- ✅ Mobile Navbar with Hamburger (Only on small screens) -->
        <div class="block sm:hidden bg-white border-b border-gray-200 shadow-sm mb-3">
            <div class="flex justify-between items-center p-2">
                <div> </div>
                <!-- Hamburger Button -->
                <button id="menu-toggle" class="text-gray-600 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            <!-- Collapsible Menu -->
            <nav id="mobile-menu" class="hidden flex-col gap-2 px-3 pb-2 text-[12px]">
                <a href="{{ url('/dashboard') }}" class="block py-1 text-gray-600 hover:text-blue-600">Dashboard</a>
                <a href="{{ url('/admin-gallery') }}" class="block py-1 text-gray-600 hover:text-blue-600">Gallery</a>
                <a href="{{ url('/admin-videos') }}" class="block py-1 text-gray-600 hover:text-blue-600">Videos</a>
                <a href="{{ url('/admin-contact') }}" class="block py-1 text-blue-600 font-semibold">Contacts</a>
            </nav>
        </div>

        <!-- ✅ Header -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-3 sm:mb-6 gap-1 sm:gap-3">
            <h1 class="text-sm sm:text-3xl font-semibold text-gray-800 tracking-tight">Contact Submissions</h1>
            <div class="w-full sm:w-auto flex justify-start sm:justify-end text-[9px] sm:text-base">
                {{ $contacts->links('pagination::tailwind') }}
            </div>
        </div>

        <!-- ✅ Flash Message -->
        @if (session('success'))
            <div
                class="bg-green-50 border border-green-400 text-green-700 px-2 py-1 sm:px-4 sm:py-3 rounded mb-3 sm:mb-6 shadow-sm text-[9px] sm:text-base">
                ✅ {{ session('success') }}
            </div>
        @endif

        <!-- ✅ Table -->
        <div class="overflow-x-auto bg-white rounded border border-gray-100 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200 text-[9px] sm:text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-1 px-1 sm:py-3 sm:px-6 text-left font-semibold uppercase tracking-wider w-6">ID</th>
                        <th class="py-1 px-1 sm:py-3 sm:px-6 text-left font-semibold uppercase tracking-wider w-20">Name
                        </th>
                        <th class="py-1 px-1 sm:py-3 sm:px-6 text-left font-semibold uppercase tracking-wider w-28">Email
                        </th>
                        <th class="py-1 px-1 sm:py-3 sm:px-6 text-left font-semibold uppercase tracking-wider w-20">Subject
                        </th>
                        <th
                            class="py-1 px-1 sm:py-3 sm:px-6 text-left font-semibold uppercase tracking-wider max-w-[90px] sm:w-1/2">
                            Message</th>
                        <th class="py-1 px-1 sm:py-3 sm:px-6 text-left font-semibold uppercase tracking-wider w-16">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($contacts as $contact)
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-1 sm:py-3 sm:px-6 text-gray-900">{{ $contact->id }}</td>
                            <td class="py-1 px-1 sm:py-3 sm:px-6 text-gray-800 font-medium">
                                <span class="sm:hidden">{{ Str::limit($contact->name, 15) }}</span>
                                <span class="hidden sm:inline">{{ $contact->name }}</span>
                            </td>
                            <td class="py-1 px-1 sm:py-3 sm:px-6 text-gray-600 truncate" title="{{ $contact->email }}">
                                {{ $contact->email }}</td>
                            <td class="py-1 px-1 sm:py-3 sm:px-6 text-gray-700 truncate" title="{{ $contact->subject }}">
                                <span class="sm:hidden">{{ Str::limit($contact->subject, 15) }}</span>
                                <span class="hidden sm:inline">{{ $contact->subject }}</span>
                            </td>
                            <td class="py-1 px-1 sm:py-3 sm:px-6 text-gray-600 max-w-[90px] sm:max-w-none truncate"
                                title="{{ $contact->message }}">
                                <span class="sm:hidden">{{ Str::limit($contact->message, 40) }}</span>
                                <span class="hidden sm:inline">{{ Str::limit($contact->message, 101) }}</span>
                            </td>
                            <td class="py-1 px-1 sm:py-3 sm:px-6 whitespace-nowrap">
                                <div class="flex flex-col sm:flex-row gap-0.5 sm:gap-2">
                                    <a href="{{ route('admin.contact.show', $contact->id) }}"
                                        class="bg-blue-500 text-white text-[8px] sm:text-xs px-1 sm:px-3 py-0.5 sm:py-1 rounded hover:bg-blue-600 text-center">
                                        View
                                    </a>
                                    <form method="POST" action="{{ route('admin.contact.delete', $contact->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="bg-red-500 text-white text-[8px] sm:text-xs px-1 sm:px-3 py-0.5 sm:py-1 rounded hover:bg-red-600 text-center">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Spacer -->
        <!-- ✅ Extra Spacer for Mobile -->
        <div class="py-12 sm:py-14"></div>
    </main>

    <style>
        @media (min-width: 768px) {

            table td:nth-child(5),
            table th:nth-child(5) {
                width: 30%;
                max-width: 30%;
            }
        }
    </style>

    <!-- ✅ JavaScript for Hamburger Toggle -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
@endsection


{{-- @php use Illuminate\Support\Str; @endphp

@extends('layouts.admin_master')
@section('body')
    <!-- Main Section -->
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50 min-h-screen">
        <!-- Header Actions -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-semibold text-gray-800 tracking-tight">Contact Submissions</h1>
        </div>

        <!-- Pagination -->
        <div class="w-full flex justify-end mb-4">
            {{ $contacts->links('pagination::tailwind') }}
        </div>



        <!-- Flash Message -->
        @if (session('success'))
            <div class="bg-green-50 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-6 shadow-sm">
                ✅ {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-xl shadow-lg border border-gray-100 mt-4">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-3 px-6 text-left font-semibold uppercase tracking-wider">ID</th>
                        <th class="py-3 px-6 text-left font-semibold uppercase tracking-wider">Name</th>
                        <th class="py-3 px-6 text-left font-semibold uppercase tracking-wider">Email</th>
                        <th class="py-3 px-6 text-left font-semibold uppercase tracking-wider">Subject</th>
                        <th class="py-3 px-6 text-left font-semibold uppercase tracking-wider w-1/2">Message</th>
                        <th class="py-3 px-6 text-left font-semibold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($contacts as $contact)
                        <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                            <td class="py-3 px-6 text-gray-900">{{ $contact->id }}</td>
                            <td class="py-3 px-6 text-gray-800 font-medium">{{ $contact->name }}</td>
                            <td class="py-3 px-6 text-gray-600">{{ $contact->email }}</td>
                            <td class="py-3 px-6 text-gray-700">{{ $contact->subject }}</td>
                            <td class="py-3 px-6 text-gray-600 w-1/2">{{ Str::limit($contact->message, 101) }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.contact.show', $contact->id) }}"
                                        class="inline-block bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition text-xs font-semibold shadow-sm">
                                        View</a>
                                    <form method="POST" action="{{ route('admin.contact.delete', $contact->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="inline-block bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition text-xs font-semibold shadow-sm">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <style>
            /* Add this style to limit the message column width */
            @media (min-width: 768px) {

                table td:nth-child(5),
                table th:nth-child(5) {
                    width: 30%;
                    max-width: 30%;
                }
            }
        </style>
        <!-- Spacer for bottom padding -->
        <div class="py-8 sm:py-12"></div>
    </main>
@endsection --}}
