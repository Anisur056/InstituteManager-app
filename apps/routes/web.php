<?php

use App\Http\Controllers\DashboardController;
use App\Http\Middleware\IsUserAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TblShiftController;
use App\Http\Controllers\TblStudentController;
use App\Http\Controllers\LoginFormController;

Route::get('/', function () {
    return view('website.home');
})->name('home');

// Authentication Routes
Route::view('/login-sirikotia','admin.login-form')->name('login')->middleware('guest');
Route::post('/loginAction',[LoginFormController::class,'login'])->name('loginAction');
Route::get('/logout',[LoginFormController::class,'logout'])->name('logout');


Route::middleware(["auth", IsUserAdmin::class])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'all_counts'])->name('dashboard');
    Route::resource('/students', TblStudentController::class);
    Route::resource('/shifts', TblShiftController::class);

    Route::get('/admit-card-list',[TblStudentController::class, 'admit_card_list'])->name('admit.card.list');
    Route::get('/admit-card-print/{id?}',[TblStudentController::class, 'admit_card_print'])->name('admit.card.print');
});
