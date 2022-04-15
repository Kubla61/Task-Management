<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function addForm() {
        $data = [
            'allUsers' => User::all(),
        ];
        
        return view('tasks.add', $data);
    }
}
