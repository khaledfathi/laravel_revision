<?php

namespace App\features\tasks\domain\usecase;

use App\features\tasks\domain\entity\TaskEntity;
use App\features\tasks\domain\repository\TaskRepositoryInterface;

class UpdateTaskUseCase
{
    public function __construct(public TaskRepositoryInterface $taskrepository) {}
    public function update(TaskEntity $task) {
        return $this->taskrepository->update($task);
    }
}
