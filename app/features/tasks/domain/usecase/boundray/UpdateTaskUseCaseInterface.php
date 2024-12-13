<?php

namespace App\features\tasks\domain\usecase\boundray; 

use App\features\tasks\domain\entity\TaskEntity;

interface UpdateTaskUseCaseInterface
{
    public function update(TaskEntity $task) :bool;
}
