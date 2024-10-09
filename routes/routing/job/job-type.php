<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Job\JobTypeController;
Route::get('manage-job-type', [JobTypeController::class, 'index'])->name('manage-job-type');
Route::get('manage-job-type/all-job', [JobTypeController::class, 'allJobs'])->name('manage-job-type.all-job');
Route::post('manage-job-type/store', [JobTypeController::class, 'store'])->name('manage-job-type.store');
Route::post('manage-job-type/delete', [JobTypeController::class, 'delete'])->name('manage-job-type.delete');
Route::post('manage-job-type/edit', [JobTypeController::class, 'edit'])->name('manage-job-type.edit');
Route::post('manage-job-type/update', [JobTypeController::class, 'update'])->name('manage-job-type.update');
