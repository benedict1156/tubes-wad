<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\Task;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function index()
    {
        return view('reminders.index', [
            'tasks' => Task::all(),
            'reminders' => Reminder::with('task')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required',
            'reminder_date' => 'required|date'
        ]);

        Reminder::create($request->all());
        return redirect()->back();
    }
}
