<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Haloo, {{ auth()->user()->name }} </p>

                    {{-- Admin menu --}}
                    @if (auth()->user()->hasPermission('manage_users'))
                        <a href="{{ route('admin.dashboard') }}"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-indigo-600 text-black font-medium shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-300 transition">
                            Kelola User
                        </a>
                    @endif

                    {{-- Instructor menu --}}
                    @if (auth()->user()->hasPermission('create_course'))
                        <a href="{{ route('courses.create') }}"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-green-600 text-black font-medium shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300 transition">
                            Buat Course
                        </a>
                    @endif

                    {{-- Student menu --}}
                    @if (auth()->user()->hasPermission('submit_assignment'))
                        <a href="{{ route('assignment.index') }}"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-sky-500 text-black font-medium shadow hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-300 transition">
                            Submit Tugas
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
