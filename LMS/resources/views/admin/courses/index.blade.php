<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Course Management</h2>
    </x-slot>

    <div class="py-6">
        <a href="{{ route('admin.courses.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Add Course</a>

        <div class="mt-6">
            <table class="w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">ID</th>
                        <th class="p-2">Title</th>
                        <th class="p-2">Instructor</th>
                        <th class="p-2">Created At</th>
                        <th class="p-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr class="border-t">
                            <td class="p-2">{{ $course->id }}</td>
                            <td class="p-2">{{ $course->title }}</td>
                            <td class="p-2">{{ $course->instructor->name ?? '-' }}</td>
                            <td class="p-2">{{ $course->created_at->format('d M Y') }}</td>
                            <td class="p-2 space-x-2">
                                <a href="{{ route('admin.courses.edit', $course) }}" class="text-blue-500">Edit</a>
                                <form action="{{ route('admin.courses.destroy', $course) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete course?')"
                                        class="text-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $courses->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
