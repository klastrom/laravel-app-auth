
<div class="container">
    <h1>TODOを編集</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $todo->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">説明</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $todo->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="is_completed">完了</label>
            <select name="is_completed" id="is_completed" class="form-control" required>
                <option value="0" {{ old('is_completed', $todo->is_completed) == 0 ? 'selected' : '' }}>未完了</option>
                <option value="1" {{ old('is_completed', $todo->is_completed) == 1 ? 'selected' : '' }}>完了</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
