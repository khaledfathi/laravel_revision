<?php

namespace App\features\tasks\domain\usecase\boundray; 

use App\features\tasks\domain\entity\TaskEntity;

interface AddTaskUseCaseInterface  {
    public function add (TaskEntity $task):int;
}