<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = [
        'task_id',
        'milestone_name',
        'description',
        'due_date',
    ];

    // Define relationships with other models

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
