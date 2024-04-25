<?php

use App\Http\Controllers\Admin\PersonController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth'], ], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('people', PersonController::class);
    });
});
