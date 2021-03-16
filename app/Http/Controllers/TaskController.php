<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function store(Request $request)
    {

        $request->validate(
            [
                'user_id' => 'required|integer',
                'task_name' => 'required|string',
                'task_date' => 'required',
                'task_time' => 'required',
            ]
        );

        $task = new Task();
        $task->create(
            $request->all()
        );

        return [
            'success' => true,
            'data' => $request->all(),
        ];
    }
    public function getUserTasks(Request $request){

        $tasks = Task::where('user_id', $request->id)->get();
        return $tasks;
    }
}
