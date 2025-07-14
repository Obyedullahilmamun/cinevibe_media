@php use Illuminate\Support\Str; @endphp

@extends('layouts.admin_master')
@section('body')
    <!-- Main Section -->
    <main class="flex-1 overflow-y-auto p-6">
        <!-- Header Actions -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Contact Submissions Dashboard</h1>

        </div>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white mt-6">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th> <!-- ✅ New column -->
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Subject</th>
                    <th class="py-2 px-4 border-b">Message</th> <!-- ✅ New Column -->
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $contact->id }}</td> <!-- ✅ New cell -->
                        <td class="py-2 px-4 border-b">{{ $contact->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $contact->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $contact->subject }}</td>
                        <td class="py-2 px-4 border-b">
                            {{ Str::limit($contact->message, 101) }} <!-- ✅ Limit to 101 characters -->
                        </td>
                        <td class="py-2 px-4 border-b flex gap-2">
                            <a href="{{ route('admin.contact.show', $contact->id) }}"
                                class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">View</a>
                            <form method="POST" action="{{ route('admin.contact.delete', $contact->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')"
                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        </div>
    </main>
@endsection
