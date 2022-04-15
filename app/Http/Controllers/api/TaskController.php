<?php

namespace App\Http\Controllers\api;

use App\Models\Task;
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
        $tasks = Task::all();
        return New TaskResourse($tasks);
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
        return new TaskResourse($task);

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
        return new TaskResourse($task);
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
        return new TaskResourse($task);
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
            return new TaskResourse($task);
        }
    }
}
