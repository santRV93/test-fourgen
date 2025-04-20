<?php

use App\Http\Controllers\Api\PetsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::post('/pets/create', [PetsController::class, 'store']);
    Route::get('/pets/get', [PetsController::class, 'list']);
    Route::post('/pets/{pet}', [PetsController::class, 'update']);
    Route::delete('/pets/{pet}', [PetsController::class, 'delete']);
});