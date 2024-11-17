<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TODOを編集') }}
        </h2>
    </x-slot>
<div class="container mt-5">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('todos.update', $todo->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title" class="form-label">タイトル</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $todo->title) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">説明</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $todo->description) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="is_completed" class="form-label">完了</label>
            <select name="is_completed" id="is_completed" class="form-control" required>
                <option value="0" {{ old('is_completed', $todo->is_completed) == 0 ? 'selected' : '' }}>未完了</option>
                <option value="1" {{ old('is_completed', $todo->is_completed) == 1 ? 'selected' : '' }}>完了</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
</x-app-layout>