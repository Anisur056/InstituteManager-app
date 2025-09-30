<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstituteInfoController;
use App\Http\Controllers\InstituteAcademicYearsController;
use App\Http\Controllers\InstituteClassesController;
use App\Http\Controllers\InstituteShiftsController;
use App\Http\Controllers\InstituteSectionsController;
use App\Http\Controllers\InstituteSubjectController;
use App\Http\Controllers\InstituteGroupsController;
use App\Http\Controllers\InstituteExamTermsController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\SmsController;
use App\Http\Controllers\TblFingerDevice;


Auth::routes();

Route::get('/', function () { return view('website.home'); })->name('home');

// Auto Sync For Attendance log & Send SMS. Python Script Automate it.
// Route::get('/device/log/sync',[TblFingerDevice::class, 'syncDeviceAttendanceLog'])->name('device.log.sync');

// All Authenticated Route
Route::middleware(["auth"])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'getUsersCount'])->name('dashboard');

    // All Institute Settings Route
    Route::resource('/institutes', InstituteInfoController::class);
    Route::resource('/academic-years', InstituteAcademicYearsController::class);
    Route::resource('/class', InstituteClassesController::class);
    Route::resource('/shifts', InstituteShiftsController::class);
    Route::resource('/sections', InstituteSectionsController::class);
    Route::resource('/subject', InstituteSubjectController::class);
    Route::resource('/groups', InstituteGroupsController::class);
    Route::resource('/exam-terms', InstituteExamTermsController::class);

    // Students Routes
    Route::resource('/students', UserController::class);
    Route::get('/students/class/{class?}', [UserController::class, 'short_by_class'])->name('class');
    // Route::get('/students/id-card/print/{id?}',[StudentController::class, 'id_card_print'])->name('id.card.print');
    // Route::get('/students/admit-card/print/{id?}',[StudentController::class, 'admit_card_print'])->name('admit.card.print');
    // Route::get('/students/seat-sticker/print/{id?}',[StudentController::class, 'seat_sticker_print'])->name('seat.sticker.print');

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


    // Test SMS Routes
    // Route::get('/test-sms/{number?}',[SmsController::class, 'testSMS'])->name('sms.test');



});
