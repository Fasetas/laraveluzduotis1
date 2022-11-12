<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    private $validationRules=[
        'name' => ['required', 'min:3', 'max:64'],
        'discription' => ['max:512'],
    ];
    private $validationMessages=[
        'name.required'=>'<b>Pavadinimas</b> yra privalomas', 
        'name.min'=>'Pavadinimas turi buti ne trumpeesnis nei 3 simboliai',
        'name.max'=>'Pavadinimas turi buti ne ilgesnis nei 64 simboliu',
        'discription.max'=>'Negali buti daugiau nei 512 simboliu',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=Task::all();
        return view("tasks.index", [
            'tasks'=>$tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priorities=Priority::all();
        $users = User::all();
        return view('tasks.create',[
            'priorities'=>$priorities,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules, $this->validationMessages);
        $task=new Task();
        $task->name=$request->name;
        $task->discription=$request->discription;
        $task->status=$request->status;
        $task->priority_id=$request->priority_id;
        $task->user_id=$request->user_id;
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $priorities=Priority::all();
        $users = User::all();
        return view('tasks.edit',[
            'priorities'=>$priorities,
            'task'=>$task,
            'users' => $users
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate($this->validationRules, $this->validationMessages);
        $task->name=$request->name;
        $task->discription=$request->discription;
        $task->status=$request->status;
        $task->priority_id=$request->priority_id;
        $task->user_id=$request->user_id;
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
