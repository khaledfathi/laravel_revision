<?php

namespace App\features\tasks\domain\usecase;

use App\features\tasks\domain\entity\TaskEntity;
use App\features\tasks\domain\repository\TaskRepositoryInterface;

final class AddTaskUseCase  {
    public function __construct(
        public TaskRepositoryInterface $TaskRepositroy
    ){ }

    public function add (TaskEntity $task):int{
        return $this->TaskRepositroy->store($task); 
    }

}