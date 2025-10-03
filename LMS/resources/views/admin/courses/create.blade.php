<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Add Course</h2>
    </x-slot>

    <form action="{{ route('admin.courses.store') }}" method="POST" class="p-6">
        @csrf
        <div class="mb-4">
            <label class="block">Title</label>
            <input type="text" name="title" class="border rounded w-full" required>
        </div>
        <div class="mb-4">
            <label class="block">Description</label>
            <textarea name="description" class="border rounded w-full"></textarea>
        </div>
        <div class="mb-4">
            <label class="block">Instructor</label>
            <select name="instructor_id" class="border rounded w-full" required>
                @foreach($instructors as $instructor)
                    <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</x-app-layout>
