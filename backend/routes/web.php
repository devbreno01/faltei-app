<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Socialite;
use App\Http\Controllers\Api\v1\Auth\GoogleAuthController;
Route::get('/', function () {
    return 'testando..';
});
//Route::get('/users', [UserController::class, 'getUsers']);

Route::get('auth/google/redirect',[GoogleAuthController::class, 'redirect']);
Route::get('auth/google/callback',[GoogleAuthController::class, 'callback']);
