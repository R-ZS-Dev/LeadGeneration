<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailSettingsController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::middleware(['auth'])->group(function () {

    Route::get('/app-chat', function () {
        return view('app-chat');
    })->name('app-chat');
    Route::get('/app-calendar', function () {
        return view('app-calendar');
    })->name('app-calendar');
    Route::get('/profile-setting', function () {
        return view('profile-setting');
    })->name('profile-setting');

    Route::get('/report', function () {
        return view('report');
    })->name('report');

    Route::controller(ReportController::class)->group(function () {
        Route::get('/report', 'index')->name('report'); // Show reports page
        Route::post('/reports', 'store')->name('reports.store'); // Store new report
        Route::get('/reports/{id}/edit', 'edit')->name('reports.edit'); // Fetch report for edit
        Route::post('/reports/{id}/update', 'update')->name('reports.update');
        Route::delete('/reports/{id}', 'destroy')->name('reports.destroy'); // Delete report
    });


    Route::controller(SettingsController::class)->group(function () {
        Route::post('update-profile', 'updateProfile')->name('settings.updateProfile');
        Route::post('update-password', 'updatePassword')->name('settings.updatePassword');
        Route::post('update-email', 'updateEmail')->name('settings.updateEmail');
    });

    Route::controller(EmailSettingsController::class)->group(function () {
        Route::get('/email-config', 'showForm')->name('settings.email');
        Route::post('/email-config', 'updateEmailConfig')->name('settings.updateEmail');
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller((CompanyController::class))->group(function () {
        Route::post('update-company', 'updateCompany')->name('settings.updateCompany');
    });

    Route::controller(RegisteredUserController::class)->group(function () {
        Route::get('/register', 'register')->name('register'); // Show registration form
        Route::post('/register', 'store')->name('register.store'); // Handle form submission
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/all-users', 'index')->name('all-users'); // Show users list
        Route::delete('/users/{id}', 'destroy')->name('users.destroy');
        Route::get('/users/{id}/edit', 'edit')->name('users.edit');
        Route::put('/users/{id}', 'update')->name('users.update');
    });

    Route::controller(ConfigController::class)->group(function () {
        /* ----------------------------- hospital routes ---------------------------- */
        Route::get('/view-hospital', 'viewHospital')->name('view-hospital');
        route::post('add-hospital','addHospital')->name('add-hospital');
        route::post('edit-hospital','editHospital')->name('edit-hospital');
        route::get('delete-hospital/{id}','deleteHospital')->name('delete-hospital');
        /* ------------------------- equipment group routes ------------------------- */
        Route::get('/view-equipment-group', 'viewEquipmentGroup')->name('view-equipment-group');
        route::post('add-equipment-group','addEquipmentGroup')->name('add-equipment-group');
        route::post('edit-equipment-group','editEquipmentGroup')->name('edit-equipment-group');
        route::get('delete-equipment-group/{id}','deleteEquipmentGroup')->name('delete-equipment-group');
        /* ---------------------------- equipment routes ---------------------------- */
        Route::get('/view-equipment', 'viewEquipment')->name('view-equipment');
        route::post('/add-equipment','addEquipment')->name('add-equipment');
        route::post('/edit-equipment','editEquipment')->name('edit-equipment');
        route::get('/delete-equipment/{id}','deleteEquipment')->name('delete-equipment');
        /* --------------------------- supply group routes -------------------------- */
        Route::get('/view-supply-group', 'viewSupplyGroup')->name('view-supply-group');
        route::post('/add-supply-group','addSupplyGroup')->name('add-supply-group');
        route::post('/edit-supply-group','editSupplyGroup')->name('edit-supply-group');
        route::get('/delete-supply-group/{id}','deleteSupplyGroup')->name('delete-supply-group');
        /* ----------------------------- supplies routes ---------------------------- */
        Route::get('/view-supplies', 'viewSupplies')->name('view-supplies');
        route::post('/add-supplies','addSupplies')->name('add-supplies');

        route::post('/update-supplies','editSupplies')->name('update-supplies');
        route::get('/delete-supplies/{id}','deleteSupplies')->name('delete-supplies');
        /* ------------------------------ staff routes ------------------------------ */
        Route::get('/view-staff', 'viewStaff')->name('view-staff');
        route::post('/add-staff','addStaff')->name('add-staff');
        route::post('/edit-staff','editStaff')->name('edit-staff');
        route::get('/delete-staff/{id}','deleteStaff')->name('delete-staff');

        /* ------------------------- procedure module routes ------------------------ */
        Route::get('/view-procedure', 'viewProcedure')->name('view-procedure');
        route::post('/add-procedure','addProcedure')->name('add-procedure');
        route::post('/edit-procedure','editProcedure')->name('edit-procedure');
        route::get('/delete-procedure/{id}','deleteProcedure')->name('delete-procedure');

    });

    Route::controller(LabController::class)->group(function () {
        /* --------------------------- lab results routes --------------------------- */
        Route::get('/lab-results', 'viewlabResults')->name('view-lab-results');
        route::post('/add-lab-results','addlabResults')->name('add-lab-results');
        route::post('/edit-lab-results','editlabResults')->name('edit-lab-results');
        route::get('/delete-lab-results/{id}','deletelabResults')->name('delete-lab-results');

    });

});

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'authenticate')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('register');
});

Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('/forget-password', 'showForgetPasswordForm')->name('forget-password');
    Route::post('/forget-password', 'submitForgetPasswordForm')->name('password.email');

    Route::get('/reset-password', 'showResetPasswordForm')->name('password.reset');
    Route::post('/reset-password', 'submitResetPasswordForm')->name('password.update');
});
