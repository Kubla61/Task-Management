<?php

namespace App\Http\Controllers\api;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Task as TaskResourse;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get retrive all tasks records
        // $tasks = Task::all();
        // return New TaskResourse($tasks);

        $data = [
            'tasksNew' => Task::where('status', '0')->get(),
            'tasksInProgress' => Task::where('status', '1')->get(),
            'tasksOnReview' => Task::where('status', '2')->get(),
            'tasksCompleted' => Task::where('status', '3')->get(),
            'allUsers' => User::all(),
        ];
        
        return view('tasks', $data);
    }

    public function addForm($status) {
        $data = [
            'allUsers' => User::all(),
            'status' => $status
        ];

        return view('tasks.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create new task record
        $task = new Task();
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->status = $request->input('status');
        $task->assignee = $request->input('assignee');
        $task->save();
        return redirect(route('getTasks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get specific task record by id
        $task = Task::findOrFail($id);
        $assignedUser = User::where('id', $task['assignee'])->first();
        
        if($assignedUser) {
            $userName = $assignedUser->username;
        } else {
            $userName = 'No one';
        }

        $data = [
            'task' => $task,
            'assignedTo' => $userName,
        ];
        // return new TaskResourse($task);

        return view('tasks.task', $data);
    }

    public function updateForm(Request $request, $id)
    {
        //show update form
        $task = Task::findOrFail($id);

        $data = [
            'task' => $task,
            'assignedTo' => User::where('id', $task['assignee'])->first(),
            'allUsers' => User::all(),
        ];
        
        return view('tasks.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update a specific task record
        $task = Task::findOrFail($id);
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->status = $request->input('status');
        $task->assignee = $request->input('assignee');
        $task->save();

        $data = [
            'task' => $task,
            'assignedTo' => User::where('id', $task['assignee'])->first(),
        ];
        
        return redirect(route('getSingleTasks', $id));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete specific product record by id
        $task = Task::findOrFail($id);
        if($task->delete()) {
            // return new TaskResourse($task);
            return redirect(route('getTasks'));
        }
    }
}
