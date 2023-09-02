<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getTasks()
    {
        //'SELECT * FROM tasks'
        $tasks = Tasks::all();
        return view('welcome', compact('tasks'));
    }
}
