<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Job\EducationLevelController;

Route::get('manage-education', [EducationLevelController::class, 'index'])->name('manage-education');
Route::get('manage-education/all-education', [EducationLevelController::class, 'allEducation'])->name('manage-education.all-education');
Route::post('manage-education/store', [EducationLevelController::class, 'store'])->name('manage-education.store');
Route::post('manage-education/delete', [EducationLevelController::class, 'delete'])->name('manage-education.delete');
Route::post('manage-education/edit', [EducationLevelController::class, 'edit'])->name('manage-education.edit');
Route::post('manage-education/update', [EducationLevelController::class, 'update'])->name('manage-education.update');
