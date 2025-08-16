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
    Route::get('/students/class/{class?}', [TblStudentController::class, 'short_by_class'])->name('class');


    Route::get('/students/id-card/print/{id?}',[TblStudentController::class, 'id_card_print'])->name('id.card.print');
    Route::get('/students/admit-card/print/{id?}',[TblStudentController::class, 'admit_card_print'])->name('admit.card.print');
    Route::get('/students/seat-sticker/print/{id?}',[TblStudentController::class, 'seat_sticker_print'])->name('seat.sticker.print');

    Route::resource('/shifts', TblShiftController::class);

});
