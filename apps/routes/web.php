<?php

use App\Http\Middleware\IsUserAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TblShiftController;
use App\Http\Controllers\LoginFormController;

Route::get('/', function () {
    return view('website.home');
})->name('home');

// Authentication Routes
Route::view('/login-sirikotia','admin.login-form')->name('login')->middleware('guest');
Route::post('/loginAction',[LoginFormController::class,'login'])->name('loginAction');
Route::get('/logout',[LoginFormController::class,'logout'])->name('logout');


Route::middleware(["auth", IsUserAdmin::class])->group(function(){
    Route::get('/dashboard',function () { return view('admin.dashboard'); })->name('dashboard');
    
    Route::resource('/shifts',TblShiftController::class);
});