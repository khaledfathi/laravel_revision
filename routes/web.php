<?php

use App\features\root\presentation\controllers\RootController;
use App\features\tasks\presentation\controllers\TaskController;
use Illuminate\Support\Facades\Route;

/* Root Feature */

Route::get('/', [RootController::class, 'index'])->name('root.index');
/* -------------- */

/* Task Feature */
Route::group(['prefix' => '/task'], function () {
    Route::get('/', [TaskController::class, 'index'])->name('task.index');
    Route::get('/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/store', [TaskController::class, 'store'])->name('task.store');
    Route::get('/{id}', [TaskController::class, 'show'])->name('task.show');
    Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/{id}/update', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/{id}/destroy', [TaskController::class, 'destroy'])->name('task.destroy');
});
/* -------------- */

/* Book Reviews Feature */
Route::group(['prefix' => '/books-reviews'], function () {
    Route::get('/', function () {
        return view('book_reviews.index');
    })->name('book-reviews.index');
});
/* -------------- */