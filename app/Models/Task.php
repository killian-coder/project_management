<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'project_id',
        'task_name',
        'description',
        'assigned_to',
        'start_date',
        'end_date',
        'status',
    ];

    // Define relationships with other models

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class, 'task_id');
    }
}
