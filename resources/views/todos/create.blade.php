<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a New TODO') }}
        </h2>
    </x-slot>
    <div class="container mx-auto mt-5">
        <form action="{{ route('todos.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            <div class="form-group mb-4">
                <label for="title" class="block text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" name="title" id="title" class="form-control mt-1 block w-full" required>
            </div>
            <div class="form-group mb-4">
                <label for="description" class="block text-gray-700 dark:text-gray-300">Description</label>
                <textarea name="description" id="description" class="form-control mt-1 block w-full"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-full py-2">Create TODO</button>
        </form>
    </div>
</x-app-layout>