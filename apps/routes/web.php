<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Website\HomeController;



use App\Http\Controllers\Admin\SmsLogsController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\UserStudentController;
use App\Http\Controllers\Admin\UserEmployeeController;
use App\Http\Controllers\Admin\InstituteInfoController;
use App\Http\Controllers\Admin\InstituteBranchesController;
use App\Http\Controllers\Admin\WebsiteNoticeController;
use App\Http\Controllers\Admin\WebsiteGalleryController;
use App\Http\Controllers\Admin\AttendanceSheetController;
use App\Http\Controllers\Admin\InstituteGroupsController;

use App\Http\Controllers\Admin\InstituteShiftsController;
use App\Http\Controllers\Admin\InstituteClassesController;
use App\Http\Controllers\Admin\InstituteSubjectController;

use App\Http\Controllers\Admin\AttendanceDevicesController;

use App\Http\Controllers\Admin\InstituteSectionsController;
use App\Http\Controllers\Admin\InstituteExamTermsController;
use App\Http\Controllers\Admin\WebsiteVideoGalleryController;
use App\Http\Controllers\Admin\InstituteAcademicYearsController;

Auth::routes();

// Website Frontend Route
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/notice', [HomeController::class, 'noticeIndex'])->name('notice.index');
Route::get('/notice/{id?}', [HomeController::class, 'noticeShow'])->name('notice.show');

Route::get('/galleries', [HomeController::class, 'galleryIndex'])->name('galleries.index');
Route::get('/video-galleries', [HomeController::class, 'videoGalleryIndex'])->name('videoGalleries.index');

// Admission Form Route
Route::get('/online-admission', [HomeController::class, 'onlineAdmission'])->name('online.admission');









// Auto Sync For Attendance log & Send SMS. Python Script Automate it.
Route::get('/device/log/sync',[AttendanceDevicesController::class, 'syncDeviceAttendanceLog'])->name('device.log.sync');

// All Authenticated Route
Route::middleware(["auth"])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'getUsersCount'])->name('dashboard');
    Route::resource('/notices', WebsiteNoticeController::class);
    Route::resource('/gallery', WebsiteGalleryController::class);
    Route::resource('/video-gallery', WebsiteVideoGalleryController::class);

    // Student Routes
    Route::resource('/students', UserStudentController::class);
    Route::get('/students/class/{class?}', [UserStudentController::class, 'shortByClass'])->name('class');
    // Route::get('/students/id-card/print/{id?}',[UserStudentController::class, 'id_card_print'])->name('id.card.print');
    // Route::get('/students/admit-card/print/{id?}',[UserStudentController::class, 'admit_card_print'])->name('admit.card.print');
    // Route::get('/students/seat-sticker/print/{id?}',[UserStudentController::class, 'seat_sticker_print'])->name('seat.sticker.print');

    // Employee Routes
    Route::resource('/employee', UserEmployeeController::class);
    Route::get('/employee-ex', [UserEmployeeController::class, 'exEmployee'])->name('employee.ex');

    // SMS Routes
    Route::get('/sendsms/{id?}', [SmsLogsController::class, 'createUserSMS'])->name('sms.create');
    Route::post('/sendsms/{id?}', [SmsLogsController::class, 'sendUserSMS'])->name('sms.store');


    // SMS Logs Routes
    Route::get('/smslog',[SmsLogsController::class, 'showLogs'])->name('sms.logs');


    // Attendance Routes
    Route::get('/attendance/sheet/student/{year?}/{month?}/{class?}',[AttendanceSheetController::class, 'showMonthlySheetStudent'])->name('attendance.sheet.student');
    Route::get('/attendance/sheet/employee/{year?}/{month?}',[AttendanceSheetController::class, 'showMonthlySheetEmployee'])->name('attendance.sheet.employee');
    Route::get('/attendance/upload',[AttendanceSheetController::class, 'UploadAttendance'])->name('attendance.upload');
    Route::post('/attendance/upload',[AttendanceSheetController::class, 'UploadAttendanceStore'])->name('attendance.store');

    // Finger Device Routes
    Route::get('/device/info',[AttendanceDevicesController::class, 'getDeviceInfo'])->name('device.info');

    Route::get('/device/user',[AttendanceDevicesController::class, 'getDeviceUser'])->name('device.user');
    Route::get('/device/user/create/{id?}',[AttendanceDevicesController::class, 'createSingleUser'])->name('device.user.add');
    Route::get('/device/user/bulk',[AttendanceDevicesController::class, 'BulkUser'])->name('device.user.bulk');
    Route::get('/device/user/remove/{id?}',[AttendanceDevicesController::class, 'removeSingleUser'])->name('device.user.remove');
    Route::get('/device/user/destroy',[AttendanceDevicesController::class, 'destroyAllUser'])->name('device.user.destroy');


    Route::get('/device/log',[AttendanceDevicesController::class, 'getDeviceAttendanceLog'])->name('device.log');
    // AT THE TOP--- Route::get('/device/log/sync',[AttendanceDevicesController::class, 'syncDeviceAttendanceLog'])->name('device.log.sync');
    Route::get('/device/log/destroy',[AttendanceDevicesController::class, 'exportDestroyLogs'])->name('device.log.destroy');



    // All Institute Settings Routes
    Route::resource('/institutes', InstituteInfoController::class);
    Route::resource('/branches', InstituteBranchesController::class);
    Route::resource('/academic-years', InstituteAcademicYearsController::class);
    Route::resource('/class', InstituteClassesController::class);
    Route::resource('/shifts', InstituteShiftsController::class);
    Route::resource('/sections', InstituteSectionsController::class);
    Route::resource('/subject', InstituteSubjectController::class);
    Route::resource('/groups', InstituteGroupsController::class);
    Route::resource('/exam-terms', InstituteExamTermsController::class);


    // Cache Clear Route
    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return back()->with('message', 'All caches cleared!');
    })->name('clear.cache');


});
