<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TODOリスト') }}
        </h2>
    </x-slot>
    <div class="container mt-4">
        <h1 class="mb-4">TODOリスト</h1>
        <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">新しいTODOを作成</a>
        <ul class="list-group">
            @foreach ($todos as $todo)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $todo->title }}</strong>
                            <p class="mb-1">{{ $todo->description }}</p>
                        </div>
                        <div class="btn-group" role="group">
                            <a href="{{ route('todos.edit', $todo) }}" class="btn btn-outline-secondary btn-sm">編集</a>
                            <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">削除</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>