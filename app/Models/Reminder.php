<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model {
    protected $fillable = ['task_id','reminder_date'];
    public function task() {
        return $this->belongsTo(Task::class);
    }
}

