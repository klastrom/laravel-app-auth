<div class="container">
    <h1>TODOリスト</h1>
    <a href="{{ route('todos.create') }}" class="btn btn-primary">新しいTODOを作成</a>
    <ul>
        @foreach ($todos as $todo)
            <li>
                <strong>{{ $todo->title }}</strong>
                <p>{{ $todo->description }}</p>
                <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('todos.edit', $todo) }}" class="btn btn-secondary">編集</a>
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
