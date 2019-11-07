<?php

namespace App\Http\Controllers;

use Validator;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'title'=>'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return response()->json('verifique os campos', 500);
        }
        $task = Task::create($input);
        return response()->json($task, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        if(is_null($task)){
            return response()->json('Task not found', 404);
        }
        return response()->json($task, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if(is_null($task)){
            return response()->json('Task not found', 404);
        }
        $input = $request->all();
        $validator = Validator::make($input,[
            'title'=>'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return response()->json('verifique os campos', 500);
        }
        $task->title = $input['title'];
        $task->description = $input['description'];
        $task->status = $input['status'];
        $task->update();
        return response()->json($task, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if(is_null($task)){
            return response()->json('Task not found', 404);
        }
        $task->delete();
        return response()->json('task deletada', 200);
    }
}
