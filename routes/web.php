<?php

use App\Http\Controllers\LivreController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('livres', LivreController::class);
