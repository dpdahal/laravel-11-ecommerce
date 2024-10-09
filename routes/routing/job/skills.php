<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Job\SkillsController;

Route::get('manage-skills', [SkillsController::class, 'index'])->name('manage-skills');
Route::get('manage-skills/all-skills', [SkillsController::class, 'allJobs'])->name('manage-skills.all-skills');
Route::post('manage-skills/store', [SkillsController::class, 'store'])->name('manage-skills.store');
Route::post('manage-skills/delete', [SkillsController::class, 'delete'])->name('manage-skills.delete');
Route::post('manage-skills/edit', [SkillsController::class, 'edit'])->name('manage-skills.edit');
Route::post('manage-skills/update', [SkillsController::class, 'update'])->name('manage-skills.update');
