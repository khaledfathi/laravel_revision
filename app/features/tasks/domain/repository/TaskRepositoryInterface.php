<?php
namespace App\features\tasks\domain\repository;
use App\features\tasks\domain\entity\TaskEntity;
use App\features\tasks\domain\entity\TaskPaginationEntity;

interface  TaskRepositoryInterface {
    /**
     * get all Tasks
     * @return array - array of TaskEntity
     */
    function index():array|TaskEntity; 
    /**
     * get all  tasks  with pagination 
     * @param int $pagesCount
     * @return TaskPaginationEntity 
     */
    function indexPaginate(int $itemPerPage):TaskPaginationEntity;
    /**
     * get task
     * @param int $id
     * @return TaskEntity|null
     */
    public function show (int $id):TaskEntity|null;
    /**
     * store single Task  
     * @return int - the record id 
     */
    function store(TaskEntity $task):int; 
    /**
     * update single Task  
     * @return int - count of raw affected
     */
    function update(TaskEntity $data ):bool; 
    /**
     * delete single Task
     * @return int - count of raw affected
     */
    function destroy(int $id):bool;
}