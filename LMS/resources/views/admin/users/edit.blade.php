<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit User</h2>
    </x-slot>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="p-6">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="border rounded w-full" required>
        </div>
        <div class="mb-4">
            <label class="block">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="border rounded w-full" required>
        </div>
        <div class="mb-4">
            <label class="block">Password (leave empty if not changing)</label>
            <input type="password" name="password" class="border rounded w-full">
        </div>
        <div class="mb-4">
            <label class="block">Role</label>
            <select name="role_id" class="border rounded w-full">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" @if($user->role_id == $role->id) selected @endif>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</x-app-layout>
