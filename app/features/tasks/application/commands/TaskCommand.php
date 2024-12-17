<?php
declare(strict_type=1);

namespace App\features\tasks\application\commands;

use App\features\tasks\application\commands\contracts\TaskCommandInterface;
use App\features\tasks\domain\entity\TaskEntity;
use App\features\tasks\domain\entity\TaskPaginationEntity;
use App\features\tasks\domain\repository\TaskRepositoryInterface;
use App\features\tasks\domain\usecase\boundray\CreateTaskUseCaseInterface;
use App\features\tasks\domain\usecase\boundray\DeleteTaskUseCaseInterface;
use App\features\tasks\domain\usecase\boundray\GetTaskUseCaseInterface;
use App\features\tasks\domain\usecase\boundray\UpdateTaskUseCaseInterface;
use App\features\tasks\domain\usecase\CreateTaskUseCase;
use App\features\tasks\domain\usecase\DeleteTaskUseCase;
use App\features\tasks\domain\usecase\GetTaskUseCase;
use App\features\tasks\domain\usecase\UpdateTaskUseCase;

class TaskCommand implements TaskCommandInterface
{
    private GetTaskUseCaseInterface $getTask;
    private CreateTaskUseCaseInterface $createTask;
    private UpdateTaskUseCaseInterface $updateTask;
    private DeleteTaskUseCaseInterface $deleteTask;
    public function __construct(TaskRepositoryInterface $taskRepositoy)
    {
        $this->getTask = new GetTaskUseCase($taskRepositoy);
        $this->createTask = new CreateTaskUseCase($taskRepositoy);
        $this->updateTask = new UpdateTaskUseCase($taskRepositoy);
        $this->deleteTask = new DeleteTaskUseCase($taskRepositoy);
    }

    public function getAll(int $itemPerPage = 10): TaskPaginationEntity
    {
        return $this->getTask->allWithPagination($itemPerPage);
    }

    public function get(int $id): TaskEntity|null
    {
        return $this->getTask->byId($id);
    }

    public function create(TaskEntity $task ): int
    {
        return $result = $this->createTask->create($task);
    }

    public function update (TaskEntity $task){
        return $this->updateTask->update($task);
    }
    public function delete(int $id): bool
    {
        return $this->deleteTask->deleteById($id);
    }
}
