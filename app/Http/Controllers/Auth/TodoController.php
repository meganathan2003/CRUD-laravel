<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('home',compact('tasks'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'taskname' => 'required',
            'description' => 'required'
        ]);
        $data = $request->except('_token');
        Task::create($data);
        return redirect()->route('tasks.index')->with('success', 'task created Sucessfully');
        // return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $tasks)
    {
        return view('home', compact('tasks')); 
    }       
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update(['status' => 'COMPLETED']);
        return redirect()->route('tasks.index')->with('success','Task Completed SucessFully');
    }

}
