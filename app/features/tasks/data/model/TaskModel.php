<?php

namespace App\features\tasks\data\model;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    protected $table = 'tasks'; 
    //
    public $fillable = [
        'title',
        'description',
        'long_description',
        'completed'
    ];

}
