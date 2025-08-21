<?php

use App\Http\Middleware\IsUserAdmin;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginFormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TblStudentController;

use App\Http\Controllers\SettingsControllers\TblInstituteController;
use App\Http\Controllers\SettingsControllers\TblAcademicYearController;
use App\Http\Controllers\SettingsControllers\TblClasseController;
use App\Http\Controllers\SettingsControllers\TblShiftController;
use App\Http\Controllers\SettingsControllers\TblSectionController;
use App\Http\Controllers\SettingsControllers\TblExamTermController;

Route::get('/', function () { return view('website.home'); })->name('home');

// Authentication Routes
Route::view('/sirikotia','admin.login-form')->name('login')->middleware('guest');
Route::post('/loginAction',[LoginFormController::class,'login'])->name('loginAction');
Route::get('/logout',[LoginFormController::class,'logout'])->name('logout');


Route::middleware(["auth", IsUserAdmin::class])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'all_counts'])->name('dashboard');

    // Students Routes
    Route::resource('/students', TblStudentController::class);
    Route::get('/students/class/{class?}', [TblStudentController::class, 'short_by_class'])->name('class');
    Route::get('/students/id-card/print/{id?}',[TblStudentController::class, 'id_card_print'])->name('id.card.print');
    Route::get('/students/admit-card/print/{id?}',[TblStudentController::class, 'admit_card_print'])->name('admit.card.print');
    Route::get('/students/seat-sticker/print/{id?}',[TblStudentController::class, 'seat_sticker_print'])->name('seat.sticker.print');

    // Settings/Shift-Management
    Route::resource('/institutes', TblInstituteController::class);
    Route::resource('/academic-years', TblAcademicYearController::class);
    Route::resource('/class', TblClasseController::class);
    Route::resource('/shifts', TblShiftController::class);
    Route::resource('/sections', TblSectionController::class);
    Route::resource('/exam-terms', TblExamTermController::class);

});
