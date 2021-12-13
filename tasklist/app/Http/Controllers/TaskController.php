<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{

    public function taskView($id = NULL)
    {
        if ($id) {
            return view('task', ['task'=>Task::find($id)]);
        }
        return view('task');
    }

    public function listTaskView(Request $request)
    {
        $tasks = Task::where('user_id', Auth::user()->id);
        return view('tasks', ['length'=>ceil(count($tasks->get()) / 20), 'tasks'=>$tasks->paginate(20), "actualPage"=>$request->page ? $request->page : 1]);
    }

    public function newTask(Request $request)
    {
        $task = Task::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title
        ]);
        return redirect()->route('listTaskView');
    }

    public function updateTask(Request $request, $id)
    {
        $task = Task::find($id);
        $task->title = $request->title;
        $task->save();
        return redirect()->route('listTaskView');
    }

    public function changeTask($id)
    {
        $task = Task::all()->where('id', $id)->first();
        $task->done = $task->done ? 0 : 1;
        $task->save();
        return redirect()->route('listTaskView');
    }

    public function deleteTask($id)
    {
        Task::find($id)->delete();
        return redirect()->route('listTaskView');
    }

};
