<?php

namespace App\features\tasks\presentation\controllers;

use App\features\tasks\application\commands\contracts\TaskCommandInterface;
use App\features\tasks\domain\entity\TaskEntity;
use App\features\tasks\presentation\requests\TaskStoreRequest;
use App\features\tasks\presentation\requests\TaskUpdateRequest;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function __construct(public TaskCommandInterface $taskCommand) { }

    public function index()
    {
        $data = $this->taskCommand->getAll();
        return view('tasks.index', ['data' => $data]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskStoreRequest $request)
    {
        $data = $request->all();
        $taskId = $this->taskCommand->create(
            new TaskEntity(
                title: $data['title'],
                description: $data['description'],
                longDescription: $data['long_description'],
                completed: isset($data['completed']) ? true : false,
            )
        );
        return redirect(route('task.index'))->with('message', "Task #$taskId has been created");
    }

    public function show(string $id)
    {
        $task = $this->taskCommand->get($this->idStringToInt($id));
        return view('tasks.show', ['task' => $task]);
    }

    public function edit(string $id)
    {
        $task = $this->taskCommand->get($this->idStringToInt($id));
        return view('tasks.edit',  ['task' => $task]);
    }

    public function update(TaskUpdateRequest $request, string $id)
    {
        $data = $request->all();
        $isUpdated = $this->taskCommand->update(
            new TaskEntity(
                id: $id,
                title: $data['title'],
                description: $data['description'],
                longDescription: $data['long_description'],
                completed: isset($data['completed']) ? true : false,
            )
        );
        $redirect = redirect(route('task.show', ['id' => $id]));
        return $isUpdated
            ? $redirect->with('message', 'Task has been updated')
            : $redirect->with('error',  'Error: Faild to update!');
    }

    public function destroy(string $id)
    {
        $isDeleted = $this->taskCommand->delete($id);
        $redirect = redirect(route('task.index'));
        return $isDeleted
            ? $redirect->with('message', 'Task has been deleted')
            : $redirect->with('error',  'Error: Faild to delete!');
    }
}
