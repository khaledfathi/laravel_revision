<?php

namespace App\features\tasks\data\repository;

use App\features\tasks\data\model\TaskModel;
use App\features\tasks\domain\entity\TaskEntity;
use App\features\tasks\domain\entity\TaskPaginationEntity;
use App\features\tasks\domain\repository\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    public function index(): array|TaskEntity
    {
        return $this->TaskModelToTaskEntity(TaskModel::all());
    }
    public function show(int $id): TaskEntity|null
    {
        $task = TaskModel::find($id);
        if ($task) return $this->TaskModelToTaskEntity($task);
        return null;
    }
    public function indexPaginate(int $itemPerPage= 1): TaskPaginationEntity
    {
        $result = TaskModel::paginate($itemPerPage);
        return new TaskPaginationEntity(
            tasks: $result->items(),
            pages: ceil($result->total() / $result->perPage()),
            perPage: $result->perPage(),
            currentPage: $result->currentPage(),
            firstItem: $result->firstItem(),
            lastItem: $result->lastItem(),
            lastPage: $result->lastPage(),
            total: $result->total(),
            hasMorePages: $result->hasMorePages(),
            nextPageUrl: $result->nextPageUrl(),
            previousPageUrl: $result->previousPageUrl()
        );
    }
    public function store(TaskEntity $taskEntity): int
    {
        return TaskModel::create([
            'title' => $taskEntity->title,
            'description' => $taskEntity->description,
            'long_description' => $taskEntity->longDescription,
            'completed' => $taskEntity->completed
        ])->id;
    }
    function update(TaskEntity $task): bool
    {
        $find = TaskModel::find($task->id);
        if ($find) {
            $find->title = $task->title;
            $find->description = $task->description;
            $find->long_description = $task->longDescription;
            $find->completed = $task->completed ? true : false;
            $find->save();
            return true;
        } else return false;
    }
    public function destroy(int $id): bool
    {
        $deleted = TaskModel::destroy($id);
        return $deleted > 0  ? true : false;
    }

    /* ----- Utilities ----- */

    public function TaskModelToTaskEntity(TaskModel|Collection $data): array|TaskEntity
    {
        switch (get_class($data)) {
            case Collection::class:
                $entityList = [];
                foreach ($data as $record) {
                    $entityList[] =
                        new TaskEntity(
                            id: $record->id,
                            title: $record->title,
                            description: $record->description,
                            longDescription: $record->long_description,
                            completed: $record->completed,
                            createdAt: $record->created_at,
                            updatedAt: $record->updated_at,
                        );
                }
                return $entityList;
            case TaskModel::class:
                return new TaskEntity(
                    id: $data->id,
                    title: $data->title,
                    description: $data->description,
                    longDescription: $data->long_description,
                    completed: $data->completed,
                    createdAt: $data->created_at,
                    updatedAt: $data->updated_at,
                );
            default:
                return [];
        }
    }
}
