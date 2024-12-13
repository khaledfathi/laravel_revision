<?php

namespace App\features\tasks\domain\usecase;

use App\features\tasks\domain\entity\TaskEntity;
use App\features\tasks\domain\repository\TaskRepositoryInterface;
use App\features\tasks\domain\usecase\boundray\AddTaskUseCaseInterface;

final class AddTaskUseCase  implements AddTaskUseCaseInterface{
    public function __construct(
        public TaskRepositoryInterface $taskRepositroy
    ){ }

    public function add (TaskEntity $task):int{
        return $this->taskRepositroy->store($task); 
    }

}