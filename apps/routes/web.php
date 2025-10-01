<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserEmployeeController;
use App\Http\Controllers\UserStudentController;

use App\Http\Controllers\InstituteInfoController;
use App\Http\Controllers\InstituteAcademicYearsController;
use App\Http\Controllers\InstituteClassesController;
use App\Http\Controllers\InstituteShiftsController;
use App\Http\Controllers\InstituteSectionsController;
use App\Http\Controllers\InstituteSubjectController;
use App\Http\Controllers\InstituteGroupsController;
use App\Http\Controllers\InstituteExamTermsController;

use App\Http\Controllers\SmsLogsController;
use App\Http\Controllers\TblFingerDevice;

Auth::routes();

Route::get('/', function () { return view('website.home'); })->name('home');

// Auto Sync For Attendance log & Send SMS. Python Script Automate it.
// Route::get('/device/log/sync',[TblFingerDevice::class, 'syncDeviceAttendanceLog'])->name('device.log.sync');

// All Authenticated Route
Route::middleware(["auth"])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'getUsersCount'])->name('dashboard');

    // Employee Routes
    Route::resource('/employee', UserEmployeeController::class);
    Route::get('/employee/sms/{id?}', [UserEmployeeController::class, 'createUserSMS'])->name('sms.create');
    Route::post('/employee/sms/{id?}', [UserEmployeeController::class, 'sendUserSMS'])->name('sms.store');

    // Student Routes
    Route::resource('/students', UserStudentController::class);
    Route::get('/students/class/{class?}', [UserStudentController::class, 'short_by_class'])->name('class');

    // All Institute Settings Routes
    Route::resource('/institutes', InstituteInfoController::class);
    Route::resource('/academic-years', InstituteAcademicYearsController::class);
    Route::resource('/class', InstituteClassesController::class);
    Route::resource('/shifts', InstituteShiftsController::class);
    Route::resource('/sections', InstituteSectionsController::class);
    Route::resource('/subject', InstituteSubjectController::class);
    Route::resource('/groups', InstituteGroupsController::class);
    Route::resource('/exam-terms', InstituteExamTermsController::class);

    // SMS Logs Routes
    Route::get('/sms/logs',[SmsLogsController::class, 'showLogs'])->name('sms.logs');




    // Route::get('/students/id-card/print/{id?}',[UserStudentController::class, 'id_card_print'])->name('id.card.print');
    // Route::get('/students/admit-card/print/{id?}',[UserStudentController::class, 'admit_card_print'])->name('admit.card.print');
    // Route::get('/students/seat-sticker/print/{id?}',[UserStudentController::class, 'seat_sticker_print'])->name('seat.sticker.print');

    // Attendance Routes
    // Route::get('/attendance/sheet/{year?}/{month?}/{class?}',[TblAttendanceLogController::class, 'showMonthlySheet'])->name('attendance.sheet');
    // Route::get('/attendance/upload',[TblAttendanceLogController::class, 'UploadAttendance'])->name('attendance.upload');
    // Route::post('/attendance/upload',[TblAttendanceLogController::class, 'UploadAttendanceStore'])->name('attendance.store');

    // Finger Device Routes
    // Route::get('/device/info',[TblFingerDevice::class, 'getDeviceInfo'])->name('device.info');

    // Route::get('/device/user',[TblFingerDevice::class, 'getDeviceUser'])->name('device.user');
    // Route::get('/device/user/create/{id?}',[TblFingerDevice::class, 'createSingleUser'])->name('device.user.add');
    // Route::get('/device/user/remove/{id?}',[TblFingerDevice::class, 'removeSingleUser'])->name('device.user.remove');
    // Route::get('/device/user/destroy',[TblFingerDevice::class, 'destroyAllUser'])->name('device.user.destroy');


    // Route::get('/device/log',[TblFingerDevice::class, 'getDeviceAttendanceLog'])->name('device.log');
    // AT THE TOP--- Route::get('/device/log/sync',[TblFingerDevice::class, 'syncDeviceAttendanceLog'])->name('device.log.sync');
    // Route::get('/device/log/destroy',[TblFingerDevice::class, 'exportDestroyLogs'])->name('device.log.destroy');






});
