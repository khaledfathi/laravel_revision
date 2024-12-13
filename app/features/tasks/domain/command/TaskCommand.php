<?php

namespace App\features\tasks\domain\command;

use App\features\tasks\domain\entity\TaskEntity;
use App\features\tasks\domain\entity\TaskPaginationEntity;
use App\features\tasks\domain\repository\TaskRepositoryInterface;
use App\features\tasks\domain\usecase\AddTaskUseCase;
use App\features\tasks\domain\usecase\boundray\AddTaskUseCaseInterface;
use App\features\tasks\domain\usecase\boundray\DeleteTaskUseCaseInterface;
use App\features\tasks\domain\usecase\boundray\GetTaskUseCaseInterface;
use App\features\tasks\domain\usecase\boundray\UpdateTaskUseCaseInterface;
use App\features\tasks\domain\usecase\DeleteTaskUseCase;
use App\features\tasks\domain\usecase\GetTaskUseCase;
use App\features\tasks\domain\usecase\UpdateTaskUseCase;

class TaskCommand
{
    private GetTaskUseCaseInterface $getTaskUseCase;
    private  AddTaskUseCaseInterface $addTaskUseCase;
    private UpdateTaskUseCaseInterface $updateTaskUseCase;
    private DeleteTaskUseCaseInterface $deleteTaskUseCase;
    public function __construct(
        private TaskRepositoryInterface $taskRepository
    )
    {
        $this->getTaskUseCase = new GetTaskUseCase($this->taskRepository);
        $this->addTaskUseCase = new AddTaskUseCase($this->taskRepository);
        $this->updateTaskUseCase = new UpdateTaskUseCase($this->taskRepository);
        $this->deleteTaskUseCase = new DeleteTaskUseCase($this->taskRepository);
    }

    public function getAllPagination(int $itemPerPage):TaskPaginationEntity {
        return $this->getTaskUseCase->allWithPagination(10);
    }
    public function show(int $id):TaskEntity{
        return $this->getTaskUseCase->byId($id);
    }
    public function add(TaskEntity $task):int {
        return $this->addTaskUseCase->add($task); 
    }
    public function update(TaskEntity $task) :bool{
        return $this->updateTaskUseCase->update($task); 
    }
    public function delete(int $id):bool {
        return $this->deleteTaskUseCase->deleteById($id); 
    }
}
