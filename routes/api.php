<?php

use App\Http\Controllers\Api\Leadbyte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::any('leadbyte', Leadbyte::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
