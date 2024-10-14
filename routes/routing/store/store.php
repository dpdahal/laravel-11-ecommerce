<?php

use Illuminate\Support\Facades\Route;


Route::resource('manage-store', "\App\Http\Controllers\Backend\Store\StoreController");
Route::any('manage-store-update-status', "\App\Http\Controllers\Backend\Store\StoreController@updateStatus")->name('manage-store-update-status');
