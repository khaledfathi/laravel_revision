<?php
declare(strict_type=1);

namespace App\features\tasks\domain\usecase;

use App\features\tasks\domain\entity\TaskEntity;
use App\features\tasks\domain\repository\TaskRepositoryInterface;
use App\features\tasks\domain\usecase\boundray\CreateTaskUseCaseInterface;

class CreateTaskUseCase  implements CreateTaskUseCaseInterface{
    public function __construct(
        public TaskRepositoryInterface $taskRepositroy
    ){ }

    public function create (TaskEntity $task):int{
        return $this->taskRepositroy->store($task); 
    }

}