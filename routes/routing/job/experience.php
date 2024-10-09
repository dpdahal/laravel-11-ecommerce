<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Job\ExperienceController;

Route::get('manage-experience', [ExperienceController::class, 'index'])->name('manage-experience');
Route::get('manage-experience/all-experience', [ExperienceController::class, 'allJobs'])->name('manage-experience.all-experience');
Route::post('manage-experience/store', [ExperienceController::class, 'store'])->name('manage-experience.store');
Route::post('manage-experience/delete', [ExperienceController::class, 'delete'])->name('manage-experience.delete');
Route::post('manage-experience/edit', [ExperienceController::class, 'edit'])->name('manage-experience.edit');
Route::post('manage-experience/update', [ExperienceController::class, 'update'])->name('manage-experience.update');
