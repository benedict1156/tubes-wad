<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // MENAMPILKAN SEMUA TUGAS (READ)
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())
                     ->orderBy('deadline', 'asc')
                     ->get();

        return view('tasks.index', compact('tasks'));
    }

    // MENYIMPAN TUGAS BARU (CREATE)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date'
        ]);

        Task::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline
        ]);

        return redirect()->back()->with('success', 'Tugas berhasil ditambahkan');
    }

    // MENAMPILKAN FORM EDIT (EDIT)
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // UPDATE DATA TUGAS (UPDATE)
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date'
        ]);

        $task->update($request->all());

        return redirect('/tasks')->with('success', 'Tugas berhasil diperbarui');
    }

    // HAPUS TUGAS (DELETE)
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->with('success', 'Tugas berhasil dihapus');
    }
}
