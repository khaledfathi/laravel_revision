<?php

namespace App\Providers;

use App\features\tasks\application\commands\contracts\TaskCommandInterface;
use App\features\tasks\application\commands\TaskCommand;
use App\features\tasks\domain\repository\TaskRepositoryInterface;
use App\features\tasks\infrastructure\repository\TaskRepository;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TaskCommandInterface::class,   function () {
            $taskRepository = $this->app->instance(TaskRepositoryInterface::class, new TaskRepository());
            return new TaskCommand($taskRepository);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
