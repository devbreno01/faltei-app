<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\SemesterController;
use App\Http\Controllers\Api\v1\SubjectController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function(){


    Route::post('user/login', [AuthController::class, 'login']);

    Route::post('/user/create', [UserController::class, 'store']);

    Route::group(['middleware' => ['auth:sanctum']], function(){
        Route::post('user/logout', [AuthController::class, 'logout']);

        Route::get('/users', [UserController::class, 'getUsers']);
        Route::get('/users/{id}', [UserController::class, 'getUser']);
        Route::put('users/{id}',[UserController::class, 'updateUser']);
        Route::delete('users/{id}',[UserController::class, 'destroy']);


        Route::get('/semesters', [SemesterController::class, 'getSemesters']);
        Route::get('/semesters/{id}', [SemesterController::class, 'getSemester']);
        Route::put('semesters/{id}',[SemesterController::class, 'updateSemester']);
        Route::delete('semesters/{id}',[SemesterController::class, 'destroy']);
        Route::post('semester/create', [SemesterController::class, 'store']);


        Route::get('/subjects', [SubjectController::class, 'getSubjects']);
        Route::get('/subjects/{id}', [SubjectController::class, 'getSubject']);
        Route::put('subjects/{id}',[SubjectController::class, 'updateSubject']);
        Route::delete('subjects/{id}',[SubjectController::class, 'destroy']);
        Route::post('subject/create', [SubjectController::class, 'store']);

        

    });

});

