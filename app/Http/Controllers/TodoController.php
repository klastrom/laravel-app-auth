<?php
namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TodoController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // ログインユーザーのTODOリストを取得
        $todos = Auth::user()->todos;
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Authorization check (optional)
        $this->authorize('create', Todo::class);

        // TODOを作成
        Auth::user()->todos()->create($request->only(['title', 'description']));

        return redirect()->route('todos.index')->with('success', 'TODOを作成しました！');
    }

    public function edit(Todo $todo)
    {
        $this->authorize('view', $todo); // ポリシーでアクセス制御
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $this->authorize('update', $todo);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'required|boolean',
        ]);

        // Update with specific fields
        $todo->update($request->only(['title', 'description', 'is_completed']));

        return redirect()->route('todos.index')->with('success', 'TODOを更新しました！');
    }

    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);

        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'TODOを削除しました！');
    }
}
