<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/list-users', [Controller::class, 'index']);
Route::get('/search', [Controller::class, 'search'])->name('search');
