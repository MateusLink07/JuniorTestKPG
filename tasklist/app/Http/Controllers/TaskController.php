<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    // C
    public function newTask(Request $request)
    {
        $task = Task::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title
        ]);
        return redirect('tasks');
    }
    // R
    public function listTask(Request $request)
    {
        $tasks = Task::all()->where('user_id', Auth::user()->id);
        return view('tasks', ['tasks'=>$tasks]);
    }
    // U
    public function newTaskView(){
        return view('task');
    }
    public function updateTaskView($id)
    {
        $task = Task::find($id);
        // return $task;
        return view('task', ['task'=>$task]);
    }
    public function updateTask(Request $request, $id)
    {
        $task = Task::find($id);
        $task->title = $request->title;
        $task->save();
        return redirect('tasks');
    }
    public function changeTask($id)
    {
        $task = Task::all()->where('id', $id)->first();
        $task->done = $task->done ? 0 : 1;
        $task->save();
        return redirect('tasks');
    }
    public function deleteTask($id)
    {
        Task::find($id)->delete();
        return redirect('tasks');
    }
    // D
}
