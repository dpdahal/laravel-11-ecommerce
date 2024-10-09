<?php

use Illuminate\Support\Facades\Route;


Route::resource('manage-employer', "\App\Http\Controllers\Backend\Employer\EmployerController");

Route::any('manage-employer-update-status', "\App\Http\Controllers\Backend\Employer\EmployerController@updateStatus")->name('manage-employer-update-status');
