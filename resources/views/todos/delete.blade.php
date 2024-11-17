<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TODOを削除') }}
        </h2>
    </x-slot>
    <div class="container mx-auto mt-8 p-4 bg-white dark:bg-gray-800 shadow-md rounded">
        <h1 class="text-2xl font-bold mb-4">Delete TODO</h1>
        <p class="mb-6">Are you sure you want to delete this TODO item?</p>
        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex space-x-4">
                <button type="submit" class="btn btn-danger bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                <a href="{{ route('todos.index') }}" class="btn btn-secondary bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>