<?php

use Alkoumi\LaravelHijriDate\Hijri;
use App\Http\Controllers\PushNotificationController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/' , \App\Http\Controllers\MainController::class);
Route::put('/{id}' , [\App\Http\Controllers\MainController::class , 'update']);
Route::get('/getDates' , [\App\Http\Controllers\MainController::class , 'getDates']);
Route::delete('/{id}' , [\App\Http\Controllers\MainController::class , 'destroy']);

Route::post('send',[PushNotificationController::class, 'bulksend'])->name('bulksend');
Route::get('all-notifications', [PushNotificationController::class, 'index']);
Route::get('get-notification-form', [PushNotificationController::class, 'create']);


Route::post('admin-task', [\App\Http\Controllers\adminTasksController::class, 'adminTask'])->name('adminTask');


Route::get('/x' , function (){
    $date = Carbon::now('Asia/Riyadh');
    dump($date->week);
    dump(Hijri::Date('l ، j F ، Y', $date));                  // With optional Timestamp It will return Hijri Date of [$date] => Results "الأحد ، 12 جمادى الأول ، 1442"
    Hijri::Date('Y/m/d');                              // => Results "1442/04/12"
    Hijri::DateIndicDigits('l ، j F ، Y', $date);       // With optional Timestamp It will return Hijri Date of [$date] in Indic Digits => Results "الأحد ، ١٢ جمادى الأول ، ١٤٤٢"
    Hijri::DateIndicDigits('Y/m/d');
});
