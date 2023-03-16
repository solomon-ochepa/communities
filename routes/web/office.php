<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Office\ApartmentController;
use App\Http\Controllers\Office\RoleController;
use App\Http\Controllers\Office\AddonController;
use App\Http\Controllers\Office\ApartmentResidentController;
use App\Http\Controllers\Office\ProfileController;
use App\Http\Controllers\Office\SettingController;
use App\Http\Controllers\Office\VisitorController;
use App\Http\Controllers\Office\EmployeeController;
use App\Http\Controllers\Office\LanguageController;
use App\Http\Controllers\Office\UserController;
use App\Http\Controllers\Office\ApartmentVisitorController;
use App\Http\Controllers\Office\DashboardController;
use App\Http\Controllers\Office\AttendanceController;
use App\Http\Controllers\Office\DepartmentsController;
use App\Http\Controllers\Office\PreRegisterController;
use App\Http\Controllers\Office\DesignationsController;
use App\Http\Controllers\Office\VisitorReportController;
use App\Http\Controllers\Office\WebNotificationController;
use App\Http\Controllers\Office\AttendanceReportController;
use App\Http\Controllers\Office\MenuController;
use App\Http\Controllers\Office\PreRegistersReportController;
use App\Http\Controllers\Office\RoomController;
use App\Http\Controllers\Office\ResidentController;
use App\Http\Controllers\Office\VisitController;
use App\Http\Controllers\VehicleController;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'office', 'middleware' => ['auth', 'backend_permission'], 'as' => 'office.'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Visits
    Route::resource('visit', VisitController::class)->except(['index'])->names('visit');
    Route::get('visits', [VisitController::class, 'index'])->name('visit.index');
    Route::get('visit', fn () => redirect(route('office.visit.index')));

    // Residences
    Route::resource('resident', ResidentController::class)->except(['index'])->names('resident');
    Route::get('residents', [ResidentController::class, 'index'])->name('resident.index');
    Route::get('resident', fn () => redirect(route('office.resident.index')));

    // Users
    Route::resource('user', UserController::class)->names('user');
    Route::get('users-get', [UserController::class, 'getAdminUsers'])->name('user.get');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/update/{profile}', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/change', [ProfileController::class, 'change'])->name('profile.change');

    Route::resource('role', RoleController::class);
    Route::post('role/save-permission/{id}', [RoleController::class, 'savePermission'])->name('role.save-permission');

    // Designations
    Route::resource('designation', DesignationsController::class)->except(['index'])->names('designation');
    Route::get('designations', [DesignationsController::class, 'index'])->name('designation.index');
    Route::get('designation', function () {
        return redirect()->route('office.designation.index');
    });
    Route::get('get-designations', [DesignationsController::class, 'getDesignations'])->name('designation.get-designations');

    //departments
    Route::resource('departments', DepartmentsController::class);
    Route::get('get-departments', [DepartmentsController::class, 'getDepartments'])->name('departments.get-departments');

    //web-token
    Route::post('store-token', [WebNotificationController::class, 'store'])->name('store.token');

    //employee route
    Route::resource('employees', EmployeeController::class);
    Route::get('get-employees', [EmployeeController::class, 'getEmployees'])->name('employees.get-employees');
    Route::get('employees/get-pre-registers/{id}', [EmployeeController::class, 'getPreRegister'])->name('employees.get-pre-registers');
    Route::get('employees/get-visitors/{id}', [EmployeeController::class, 'getVisitor'])->name('employees.get-visitors');
    Route::put('employees/check/{id}', [EmployeeController::class, 'checkEmployee'])->name('employees.check');

    //pre-registers
    Route::resource('pre-registers', PreRegisterController::class);
    Route::get('get-pre-registers', [PreRegisterController::class, 'getPreRegister'])->name('pre-registers.get-pre-registers');

    //visitors
    Route::resource('visitors', VisitorController::class);
    Route::post('visitor/search', [VisitorController::class, 'search'])->name('visitor.search');
    Route::get('visitor/check-out/{visitingDetail}', [VisitorController::class, 'checkout'])->name('visitors.checkout');
    Route::get('visitor/change-status/{id}/{status}/{dashboard}',  [VisitorController::class, 'changeStatus'])->name('visitor.change-status');
    Route::get('get-visitors', [VisitorController::class, 'getVisitor'])->name('visitors.get-visitors');
    Route::get('visitor/disable/{id}',  [VisitorController::class, 'visitorDisable'])->name('visitors.disable');

    //report
    Route::get('admin-visitor-report', [VisitorReportController::class, 'index'])->name('admin-visitor-report.index');
    Route::post('admin-visitor-report', [VisitorReportController::class, 'index'])->name('admin-visitor-report.post');

    Route::get('admin-pre-registers-report', [PreRegistersReportController::class, 'index'])->name('admin-pre-registers-report.index');
    Route::post('admin-pre-registers-report', [PreRegistersReportController::class, 'index'])->name('admin-pre-registers-report.post');

    Route::get('attendance-report', [AttendanceReportController::class, 'index'])->name('attendance-report.index');
    Route::post('attendance-report', [AttendanceReportController::class, 'index'])->name('attendance-report.post');

    Route::post('admin-attendance/clockin', [AttendanceController::class, 'clockIn'])->name('attendance.clockin');
    Route::post('admin-attendance/clockout', [AttendanceController::class, 'clockOut'])->name('attendance.clockout');

    Route::resource('attendance', AttendanceController::class);
    Route::get('get-attendance', [AttendanceController::class, 'getAttendance'])->name('attendance.get-attendance');
    //language
    Route::resource('language', LanguageController::class);
    Route::get('get-language', [LanguageController::class, 'getLanguage'])->name('language.get-language');
    Route::get('language/change-status/{id}/{status}', [LanguageController::class, 'changeStatus'])->name('language.change-status');

    //Addons
    Route::resource('addons', AddonController::class);
    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::post('/', [SettingController::class, 'siteSettingUpdate'])->name('site-update');
        Route::get('sms', [SettingController::class, 'smsSetting'])->name('sms');
        Route::post('sms', [SettingController::class, 'smsSettingUpdate'])->name('sms-update');
        Route::get('fcm-notification', [SettingController::class, 'fcmSetting'])->name('fcm');
        Route::post('fcm-notification', [SettingController::class, 'fcmSettingUpdate'])->name('fcm-update');
        Route::get('email', [SettingController::class, 'emailSetting'])->name('email');
        Route::post('email', [SettingController::class, 'emailSettingUpdate'])->name('email-update');
        Route::get('notification', [SettingController::class, 'notificationSetting'])->name('notification');
        Route::post('notification', [SettingController::class, 'notificationSettingUpdate'])->name('notification-update');
        Route::get('emailtemplate', [SettingController::class, 'emailTemplateSetting'])->name('email-template');
        Route::post('emailtemplate', [SettingController::class, 'mailTemplateSettingUpdate'])->name('email-template-update');
        Route::get('homepage', [SettingController::class, 'homepageSetting'])->name('homepage');
        Route::post('homepage', [SettingController::class, 'homepageSettingUpdate'])->name('homepage-update');
        Route::get('whatsapp', [SettingController::class, 'whatsappSetting'])->name('whatsapp-message');
        Route::post('whatsapp', [SettingController::class, 'whatsappSettingupdate'])->name('whatsapp-message-update');
    });

    // Menus
    Route::resource('menu', MenuController::class)->except(['index'])->names('menu');
    Route::get('menus', [MenuController::class, 'index'])->name('menu.index');
    Route::get('menu', function () {
        return redirect()->route('office.menu.index');
    });

    // Vehicles
    Route::resource('vehicle', VehicleController::class)->except(['index'])->names('vehicle');
    Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicle.index');
    Route::get('vehicle', function () {
        return redirect()->route('office.vehicle.index');
    });

    // Apartment
    Route::resource('apartment', ApartmentController::class)->except(['index'])->names('apartment');
    Route::get('apartments', [ApartmentController::class, 'index'])->name('apartment.index');
    Route::get('apartment', function () {
        return redirect()->route('office.apartment.index');
    });

    // Apartment->Rooms
    Route::resource('apartment/{apartment}/room', RoomController::class)->except(['index'])->names('apartment.room');
    Route::get('apartment/{apartment}/rooms', [RoomController::class, 'index'])->name('apartment.room.index');
    Route::get('apartment/{apartment}/room', function () {
        return redirect()->route('office.apartment.room.index');
    });

    // Apartment->Room->Residents
    Route::resource('apartment/{apartment}/room', RoomController::class)->except(['index'])->names('apartment.room');
    Route::get('apartment/{apartment}/rooms', [RoomController::class, 'index'])->name('apartment.room.index');
    Route::get('apartment/{apartment}/room', function () {
        return redirect()->route('office.apartment.room.index');
    });

    // Apartment->Residents
    Route::resource('apartment/{apartment}/resident', ApartmentResidentController::class)->except(['index'])->names('apartment.resident');
    Route::get('apartment/{apartment}/residents', [ApartmentResidentController::class, 'index'])->name('apartment.resident.index');
    Route::get('apartment/{apartment}/resident', function () {
        return redirect()->route('office.apartment.resident.index');
    });

    // Apartment->Visitors
    Route::resource('apartment/{apartment}/visitor', ApartmentVisitorController::class)->except(['index'])->names('apartment.visitor');
    Route::get('apartment/{apartment}/visitors', [ApartmentVisitorController::class, 'index'])->name('apartment.visitor.index');
    Route::get('apartment/{apartment}/visitor', function () {
        return redirect()->route('office.apartment.visitor.index');
    });
});
