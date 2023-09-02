<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    // protected $table = 'tasks';

    protected $fillable = [
        'task_title', 'task_description', 'due_date', 'task_status', 'category_id'
    ];
}
