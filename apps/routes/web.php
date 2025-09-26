<?php

use App\Http\Middleware\IsUserAdmin;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SmsController;
use App\Http\Controllers\TblFingerDevice;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginFormController;

use App\Http\Controllers\TblAttendanceLogController;
use App\Http\Controllers\SettingsControllers\TblGroupController;
use App\Http\Controllers\SettingsControllers\TblShiftController;
use App\Http\Controllers\SettingsControllers\TblClasseController;
use App\Http\Controllers\SettingsControllers\TblSectionController;
use App\Http\Controllers\SettingsControllers\TblExamTermController;
use App\Http\Controllers\SettingsControllers\TblInstituteController;
use App\Http\Controllers\SettingsControllers\TblAcademicYearController;

Route::get('/', function () { return view('website.home'); })->name('home');
Route::get('/device/log/sync',[TblFingerDevice::class, 'syncDeviceAttendanceLog'])->name('device.log.sync');


// Authentication Routes
Route::view('/login1','admin/login')->name('login')->middleware('guest');
Route::post('/loginAction',[LoginFormController::class,'login'])->name('loginAction');
Route::get('/logout',[LoginFormController::class,'logout'])->name('logout');


Route::middleware(["auth", IsUserAdmin::class])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'all_counts'])->name('dashboard');

    // Students Routes
    Route::resource('/students', StudentController::class);
    Route::get('/students/class/{class?}', [StudentController::class, 'short_by_class'])->name('class');
    Route::get('/students/id-card/print/{id?}',[StudentController::class, 'id_card_print'])->name('id.card.print');
    Route::get('/students/admit-card/print/{id?}',[StudentController::class, 'admit_card_print'])->name('admit.card.print');
    Route::get('/students/seat-sticker/print/{id?}',[StudentController::class, 'seat_sticker_print'])->name('seat.sticker.print');

    // Attendance Routes
    Route::get('/attendance/sheet/{year?}/{month?}/{class?}',[TblAttendanceLogController::class, 'showMonthlySheet'])->name('attendance.sheet');
    Route::get('/attendance/upload',[TblAttendanceLogController::class, 'UploadAttendance'])->name('attendance.upload');
    Route::post('/attendance/upload',[TblAttendanceLogController::class, 'UploadAttendanceStore'])->name('attendance.store');

    // Finger Device Routes
    Route::get('/device/info',[TblFingerDevice::class, 'getDeviceInfo'])->name('device.info');

    Route::get('/device/user',[TblFingerDevice::class, 'getDeviceUser'])->name('device.user');
    Route::get('/device/user/create/{id?}',[TblFingerDevice::class, 'createSingleUser'])->name('device.user.add');
    Route::get('/device/user/remove/{id?}',[TblFingerDevice::class, 'removeSingleUser'])->name('device.user.remove');
    Route::get('/device/user/destroy',[TblFingerDevice::class, 'destroyAllUser'])->name('device.user.destroy');


    Route::get('/device/log',[TblFingerDevice::class, 'getDeviceAttendanceLog'])->name('device.log');
    // AT THE TOP--- Route::get('/device/log/sync',[TblFingerDevice::class, 'syncDeviceAttendanceLog'])->name('device.log.sync');
    Route::get('/device/log/destroy',[TblFingerDevice::class, 'exportDestroyLogs'])->name('device.log.destroy');


    // Test SMS Routes
    Route::get('/test-sms/{number?}',[SmsController::class, 'testSMS'])->name('sms.test');

    // Settings/Shift-Management
    Route::resource('/institutes', TblInstituteController::class);
    Route::resource('/academic-years', TblAcademicYearController::class);
    Route::resource('/class', TblClasseController::class);
    Route::resource('/shifts', TblShiftController::class);
    Route::resource('/sections', TblSectionController::class);
    Route::resource('/groups', TblGroupController::class);
    Route::resource('/exam-terms', TblExamTermController::class);

});
