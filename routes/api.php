<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::resource('/user' , \App\Http\Controllers\User::class);
Route::resource('/task' , \App\Http\Controllers\TaskController::class);
Route::resource('/reminder' , \App\Http\Controllers\ReminderController::class);
Route::resource('/event' , \App\Http\Controllers\EventController::class);


Route::post('/getUserReminders' , [\App\Http\Controllers\ReminderController::class , 'getUserReminders']);
Route::post('/getUserTasks' , [\App\Http\Controllers\TaskController::class , 'getUserTasks']);
Route::post('/getUserEvents' , [\App\Http\Controllers\EventController::class , 'getUserEvents']);


Route::post('/login' , [\App\Http\Controllers\User::class , 'login']);
