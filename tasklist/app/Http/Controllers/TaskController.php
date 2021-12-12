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
        return 'Task '.$task->name.' criado';
    }
    // R
    public function listTask(Request $request)
    {
        $tasks = Task::all()->where('user_id', Auth::user()->id);
        return $tasks;
    }
    // U
    public function updateTask(Request $request, $id)
    {
        $task = Task::all()->where('id', $id)[0];
        $task->title = $request->title;
        return 'Task '.$task->title.' editado';
    }
    public function deleteTask($id)
    {
        Task::find($id)->delete();
        return 'Task Deletada';
    }
    // D
}
