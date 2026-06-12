<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class ManageController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('manage.index', compact('tasks'));
    }

    public function create()
    {
        return view('manage.create');
    }

    public function store(Request $request)
    {
       //dd(Auth::id());
        $request->validate([
            'title' => 'required',
            'description'  => 'required',
            'deadline'   => 'required|date',
        ]);

        Task::create([
            'user_id'    => Auth::id(),
            'title' => $request->title,
            'description'  => $request->description,
            'deadline'   => $request->deadline,
        ]);

        return redirect()->route('manage.index');
    }

    public function edit(Task $manage)
    {
        if ($manage->user_id !== Auth::id()) {
            abort(403);
        }

        return view('manage.edit', ['task' => $manage]);
    }

    public function update(Request $request, Task $manage)
    {
        if ($manage->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'description'  => 'required',
            'deadline'   => 'required|date',
        ]);

        $manage->update($request->only('title','description','deadline'));

        return redirect()->route('manage.index');
    }

    public function destroy(Task $manage)
    {
        if ($manage->user_id !== Auth::id()) {
            abort(403);
        }

        $manage->delete();
        return redirect()->route('manage.index');
    }
}
