<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        // if (auth()->user() != Null) {

        //     $tasks = auth()->user()->statuses()->with('tasks')->get();

        //     return view('/fragments/tasks', compact('tasks'));
        // }
        // else {
        //     $tasks = Null;
        //     return view('/fragments/tasks', compact('tasks'));
        // }
        if (!Auth::check()) {
            return view('fragments/homepage');
        }

        $tasks = auth()->user()->statuses()->with('tasks')->get();

        return view('/fragments/tasks', compact('tasks'));

    }

    public function store(Request $request)
    {
        if ($request['description'] == Null) {
            $params = $this->validate($request, [
                'title' => ['required', 'string', 'max:56'],
                // 'description',
                'status_id' => ['required', 'exists:statuses,id'],
            ]);
        }
        else {

            $params = $this->validate($request, [
                'title' => ['required', 'string', 'max:56'],
                'description' => ['string'],
                'status_id' => ['required', 'exists:statuses,id'],
            ]);


        }



        // return Task::create($request->all());

        return Auth::user()->tasks()->create($params);
    }


    public function sync(Request $request)
    {
        $this->validate(request(), [
            'columns' => ['required', 'array']
        ]);

        foreach ($request->columns as $status) {
            foreach ($status['tasks'] as $i => $task) {
                $order = $i + 1;
                if ($task['status_id'] !== $status['id'] || $task['order'] !== $order) {
                    request()->user()->tasks()
                        ->find($task['id'])
                        ->update(['status_id' => $status['id'], 'order' => $order]);
                }
            }
        }

        return $request->user()->statuses()->with('tasks')->get();
    }

}
