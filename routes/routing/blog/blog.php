<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Blogs\BlogChildController;

Route::resource('manage-blog', "\App\Http\Controllers\Backend\Blogs\BlogController");
Route::get('post-child/{pid}', [BlogChildController::class, 'index'])->name('post-child');
Route::get('create-post-page/{pid}', [BlogChildController::class, 'create'])->name('create-post-page');
Route::post('create-post-page/{pid}', [BlogChildController::class, 'store']);
Route::get('edit-post-page/{pid}', [BlogChildController::class, 'edit'])->name('edit-post-page');
Route::put('edit-post-page/{pid}', [BlogChildController::class, 'update']);
Route::get('delete-post-page/{pid}', [BlogChildController::class, 'destroy'])->name('delete-post-page');


