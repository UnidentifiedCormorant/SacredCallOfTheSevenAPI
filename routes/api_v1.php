<?php

use App\Http\Controllers\Api\v1\ElementController;
//use App\Http\Controllers\Api\v1\LinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return 'Пусть священный призыв семерых подарит тебе настоящую радость!';
});

Route::prefix('elements')->group(function () {
    Route::get('all', [ElementController::class, 'index']);
    Route::get('{id}', [ElementController::class, 'show']);
    Route::post('store', [ElementController::class, 'create']);
    Route::patch('update/{id}', [ElementController::class, 'update']);
});

//Route::get('all', [LinkController::class, 'index']);

Route::apiResource('links', \App\Http\Controllers\Api\v1\LinkController::class);
