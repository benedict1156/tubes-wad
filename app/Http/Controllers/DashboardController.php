<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Forum;
use App\Models\Note;

class DashboardController extends Controller
{
    public function index()
    {
        return view('/dashboard', [
            'tasks'  => Task::all(),
            'forums' => Forum::all(),
            'notes'  => Note::all(),
        ]);
    }
}
