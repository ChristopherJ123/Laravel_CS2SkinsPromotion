<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'create']);
Route::get('/api/skins', [DashboardController::class, 'retrieveSkins']);
Route::view('/login', 'login');
Route::view('/register', 'register');
Route::view('/profile', 'profile');
