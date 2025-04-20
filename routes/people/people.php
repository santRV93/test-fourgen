<?php

use App\Http\Controllers\Api\People;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::post('/people/create', [People::class, 'store']);
    Route::get('/people/get', [People::class, 'list']);
    Route::post('/people/{person}', [People::class, 'update']);
    Route::delete('/people/{person}', [People::class, 'delete']);
    Route::get('/people/pets/{person}', [People::class, 'petsByPerson']);
});