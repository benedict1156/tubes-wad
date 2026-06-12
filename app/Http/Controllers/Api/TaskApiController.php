<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    // ===============================
    // GET /api/tasks
    // ===============================
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Task::all()
        ], 200);
    }

    // ===============================
    // GET /api/tasks/{id}
    // ===============================
    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'status' => false,
                'message' => 'Task tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $task
        ], 200);
    }

    // ===============================
    // POST /api/tasks
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deadline' => 'required|date'
        ]);

        $task = Task::create([
            'user_id' => 1, // dummy user (tanpa auth API)
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Task berhasil ditambahkan',
            'data' => $task
        ], 201);
    }

    // ===============================
    // PUT /api/tasks/{id}
    // ===============================
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'status' => false,
                'message' => 'Task tidak ditemukan'
            ], 404);
        }

        $task->update([
            'title' => $request->title ?? $task->title,
            'description' => $request->description ?? $task->description,
            'deadline' => $request->deadline ?? $task->deadline
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Task berhasil diupdate',
            'data' => $task
        ], 200);
    }

    // ===============================
    // DELETE /api/tasks/{id}
    // ===============================
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'status' => false,
                'message' => 'Task tidak ditemukan'
            ], 404);
        }

        $task->delete();

        return response()->json([
            'status' => true,
            'message' => 'Task berhasil dihapus'
        ], 200);
    }
}
