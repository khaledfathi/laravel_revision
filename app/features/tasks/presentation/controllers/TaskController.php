<?php

namespace App\features\tasks\presentation\controllers;

use App\features\tasks\data\repository\TaskRepository;
use App\features\tasks\domain\entity\TaskEntity;
use App\features\tasks\domain\usecase\AddTaskUseCase;
use App\features\tasks\domain\usecase\DeleteTaskUseCase;
use App\features\tasks\domain\usecase\GetTaskUseCase;
use App\features\tasks\domain\usecase\UpdateTaskUseCase;
use App\features\tasks\presentation\requests\TaskStoreRequest;
use App\features\tasks\presentation\requests\TaskUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(
        private TaskRepository $taskRepository = new TaskRepository(),
    ) {}

    public function index()
    {
        $data = (new GetTaskUseCase($this->taskRepository))->allWithPagination(10);
        return view('tasks.index', ['data' => $data]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskStoreRequest $request)
    {
        $data = $request->all();
        (new AddTaskUseCase($this->taskRepository))->add(
            new TaskEntity(
                title: $data['title'],
                description: $data['description'],
                longDescription: $data['long_description'],
                completed: isset($data['completed']) ? 1 : 0,
            )
        );
        return redirect(route('task.index'))->with('message', 'Task has been created');
    }

    public function show(string $id)
    {
        $task = (new GetTaskUseCase($this->taskRepository))->byId($this->idStringToInt($id));
        return view('tasks.show', ['task' => $task]);
    }

    public function edit(string $id)
    {
        $task = (new GetTaskUseCase($this->taskRepository))->byId($this->idStringToInt($id));
        return view('tasks.edit',  ['task' => $task]);
    }

    public function update(TaskUpdateRequest $request, string $id)
    {
        $data = $request->all();
        $task = new TaskEntity(
            id: $id,
            title: $request->title,
            description: $request->description,
            longDescription: $request->long_description,
            completed: $request->completed ? true : false,
        );
        (new UpdateTaskUseCase($this->taskRepository))->update($task);
        return redirect(route('task.show', ['id' => $id]))->with('message', 'Task has been updated');
    }

    public function destroy(string $id)
    {
        $isDeleted = (new DeleteTaskUseCase($this->taskRepository))->deleteById($this->idStringToInt($id));
        $redirect = redirect(route('task.index'));
        return  $isDeleted
            ? $redirect->with('message', 'Task has been deleted')
            : $redirect->with('error', 'Error: Faild to delete');
    }
}
