<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::select(
            'task_statuses.name as status_name',
            'tasks.id as id',
            'tasks.name as name',
            'tasks.created_at',
            'task_creators.name as created_by_name',
            'task_appointee.name as assigned_to_name'
        )
            ->join('task_statuses', function ($join) {
                $join->on('tasks.status_id', '=', 'task_statuses.id');
            })
            ->join('users as task_creators', function ($join) {
                $join->on('tasks.created_by_id', '=', 'task_creators.id');
            })
            ->join('users as task_appointee', function ($join) {
                $join->on('tasks.assigned_to_id', '=', 'task_appointee.id');
            })
            ->orderBy('id')
            ->paginate();
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $appointeeOptions = $this->getAppointeeOptions();
        $taskStatusOptions = $this->getTaskStatusOptions();

        return view('task.create', compact('appointeeOptions', 'taskStatusOptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request, User $user)
    {
        $data = $request->validated();

        $task = new Task();
        $task->fill($data);
        $task->created_by_id = $request->user()->id;
        $task->save();

        flash(__('layout.task_create_flash_success'))->success();

        return redirect()
            ->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $appointeeOptions = $this->getAppointeeOptions();
        $taskStatusOptions = $this->getTaskStatusOptions();

        return view('task.edit', compact('task', 'appointeeOptions', 'taskStatusOptions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $data = $request->validated();

        $task->fill($data);
        $task->save();

        flash(__('layout.task_update_flash_success'))->success();

        return redirect()
            ->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }

    private function getAppointeeOptions()
    {
        $appointees = User::select('id', 'name')
            ->get();
        return collect($appointees)
            ->mapWithKeys(function ($item) {
                return [$item['id'] => $item['name']];
            })
            ->toArray();
    }

    private function getTaskStatusOptions()
    {
        $taskStatuses = TaskStatus::select('id', 'name')
            ->get();
        return collect($taskStatuses)
            ->mapWithKeys(function ($item) {
                return [$item['id'] => $item['name']];
            })
            ->toArray();
    }
}
