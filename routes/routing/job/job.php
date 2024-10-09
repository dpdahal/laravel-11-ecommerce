<?php

use Illuminate\Support\Facades\Route;


Route::resource('manage-job', "\App\Http\Controllers\Backend\Job\JobController");
Route::get('manage-job-clear-attribute/{job_id?}/{table?}', "\App\Http\Controllers\Backend\Job\JobController@clearAttribute")->name('manage-job-clear-attribute');

