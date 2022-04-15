<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    //
    public function getTasks() {
        $data = [
            'tasksNew' => Task::where('status', '0')->get(),
            'tasksInProgress' => Task::where('status', '1')->get(),
            'tasksOnReview' => Task::where('status', '2')->get(),
            'tasksCompleted' => Task::where('status', '3')->get(),
        ];
        
        return view('tasks', $data);
    }
}
