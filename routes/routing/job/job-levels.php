<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Job\JobLevelController;

Route::get('manage-levels', [JobLevelController::class, 'index'])->name('manage-levels');
Route::get('manage-levels/all-levels', [JobLevelController::class, 'allJobs'])->name('manage-levels.all-levels');
Route::post('manage-levels/store', [JobLevelController::class, 'store'])->name('manage-levels.store');
Route::post('manage-levels/delete', [JobLevelController::class, 'delete'])->name('manage-levels.delete');
Route::post('manage-levels/edit', [JobLevelController::class, 'edit'])->name('manage-levels.edit');
Route::post('manage-levels/update', [JobLevelController::class, 'update'])->name('manage-levels.update');
