<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\EmailSettingsController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Models\EmailSetting;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile-setting', function () {
        return view('profile-setting');
    })->name('profile-setting');

    Route::controller(SettingsController::class)->group(function () {
        Route::post('update-profile', 'updateProfile')->name('settings.updateProfile');
        Route::post('update-password', 'updatePassword')->name('settings.updatePassword');
        Route::post('update-email', 'updateEmail')->name('settings.updateEmail');
    });

    Route::controller(EmailSettingsController::class)->group(function () {
        Route::get('/email-config', 'showForm')->name('settings.email');
        Route::post('/email-config', 'updateEmailConfig')->name('settings.updateEmail');
    });

    Route::controller((CompanyController::class))->group(function () {
        Route::post('update-company', 'updateCompany')->name('settings.updateCompany');
    });

    Route::controller(ReportController::class)->group(function () {
        Route::get('/report', 'index')->name('report'); // Show reports page
        Route::post('/add-report', 'addReport')->name('add-report'); // Store new report
        route::post('/edit-report','editReport')->name('edit-report');
        route::any('/delete-report/{id}','deleteReport')->name('delete-report');

        /* -------------------------- report review routes -------------------------- */
        Route::get('/report-review', 'viewReportReview')->name('report-review');
        Route::post('/add-report-review', 'addReportReview')->name('add-report-review');
        route::post('/edit-report-review','editReportReview')->name('edit-report-review');
        route::any('/delete-report-review/{id}','deleteReportReview')->name('delete-report-review');
    });


    Route::controller(UserController::class)->group(function () {
        Route::get('/all-users', 'index')->name('all-users'); // Show users list
        route::post('add-user','addUser')->name('add-user');
        route::post('edit-user','editUser')->name('edit-user');
        route::post('delete-user/{id}','deleteUser')->name('delete-user');
        });

    Route::controller(ConfigController::class)->group(function () {


        Route::any('/check-email', [UserController::class, 'checkEmail'])->name('check.email');

        /* ----------------------------- hospital routes ---------------------------- */
        Route::get('/view-hospital', 'viewHospital')->name('view-hospital');
        route::post('add-hospital','addHospital')->name('add-hospital');
        route::post('edit-hospital','editHospital')->name('edit-hospital');
        route::post('delete-hospital/{id}','deleteHospital')->name('delete-hospital');
        /* ------------------------- equipment group routes ------------------------- */
        Route::get('/view-equipment-group', 'viewEquipmentGroup')->name('view-equipment-group');
        route::post('add-equipment-group','addEquipmentGroup')->name('add-equipment-group');
        route::post('edit-equipment-group','editEquipmentGroup')->name('edit-equipment-group');
        route::post('delete-equipment-group/{id}','deleteEquipmentGroup')->name('delete-equipment-group');
        /* ---------------------------- equipment routes ---------------------------- */
        Route::get('/view-equipment', 'viewEquipment')->name('view-equipment');
        route::post('/add-equipment','addEquipment')->name('add-equipment');
        route::post('/edit-equipment','editEquipment')->name('edit-equipment');
        route::post('/delete-equipment/{id}','deleteEquipment')->name('delete-equipment');
        /* --------------------------- supply group routes -------------------------- */
        Route::get('/view-supply-group', 'viewSupplyGroup')->name('view-supply-group');
        route::post('/add-supply-group','addSupplyGroup')->name('add-supply-group');
        route::post('/edit-supply-group','editSupplyGroup')->name('edit-supply-group');
        route::post('/delete-supply-group/{id}','deleteSupplyGroup')->name('delete-supply-group');
        /* ----------------------------- supplies routes ---------------------------- */
        Route::get('/view-supplies', 'viewSupplies')->name('view-supplies');
        route::post('/add-supplies','addSupplies')->name('add-supplies');

        route::post('/update-supplies','editSupplies')->name('update-supplies');
        route::post('/delete-supplies/{id}','deleteSupplies')->name('delete-supplies');
        /* ------------------------------ staff routes ------------------------------ */
        Route::get('/view-staff', 'viewStaff')->name('view-staff');
        route::post('/add-staff','addStaff')->name('add-staff');
        route::post('/edit-staff','editStaff')->name('edit-staff');
        route::post('/delete-staff/{id}','deleteStaff')->name('delete-staff');

        /* ------------------------- procedure module routes ------------------------ */
        Route::get('/view-procedure', 'viewProcedure')->name('view-procedure');
        route::post('/add-procedure','addProcedure')->name('add-procedure');
        route::post('/edit-procedure','editProcedure')->name('edit-procedure');
        route::post('/delete-procedure/{id}','deleteProcedure')->name('delete-procedure');

    });

    Route::controller(LabController::class)->group(function () {
        /* --------------------------- lab results routes --------------------------- */
        Route::get('/lab-results', 'viewlabResults')->name('view-lab-results');
        route::post('/add-lab-results','addlabResults')->name('add-lab-results');
        route::post('/edit-lab-results','editlabResults')->name('edit-lab-results');
        route::post('/delete-lab-results/{id}','deletelabResults')->name('delete-lab-results');

        /* ------------------------------- lab routes ------------------------------- */

        Route::get('/labs', 'viewLab')->name('view-lab');
        route::post('/add-lab','addLab')->name('add-lab');
        route::post('/edit-lab','editLab')->name('edit-lab');
        route::post('/delete-lab/{id}','deleteLab')->name('delete-lab');

        /* ---------------------------- lab ranges routes --------------------------- */

        Route::get('/lab-ranges', 'viewLabrange')->name('view-lab-range');
        route::post('/add-lab-range','addLabrange')->name('add-lab-range');
        route::post('/edit-lab-range','editLabrange')->name('edit-lab-range');
        route::post('/delete-lab-range/{id}','deleteLabrange')->name('delete-lab-range');

    });
    Route::post('/settings/check-password', [SettingsController::class, 'checkPassword'])->name('settings.checkPassword');
    Route::controller(GeneralController::class)->group(function () {
        /* ------------------------------- General Event routes ------------------------------- */
        Route::get('/general-event', 'viewgeneralevents')->name('general-event');
        route::post('/add-gevent', 'addGevent')->name('add-gevent');
        route::post('/edit-gevent', 'editGeneralEvent')->name('edit-gevent');
        // route::get('/delete-gevent/{id}', 'deleteGevent')->name('delete-gevent');
        Route::post('/delete-gevent/{id}', 'deleteGevent')->name('delete-gevent');

        /* ------------------------- check list item routes ------------------------ */
        Route::get('/checklist-item', 'viewClitem')->name('checklist-item');
        route::post('/add-clitem', 'addClitem')->name('add-clitem');
        route::post('/edit-clitem', 'editClitem')->name('edit-clitem');
        route::get('/delete-clitem/{id}', 'deleteClitem')->name('delete-clitem');

        /* ------------------------- check list routes ------------------------ */
        Route::get('/checklist', 'viewClist')->name('checklist');
        route::post('/add-clist', 'addClist')->name('add-clist');
        route::post('/delete-clist/{id}', 'deleteClist')->name('delete-clist');
        Route::get('/edit-clist/{id}','editClist')->name('edit-clist');
        Route::post('/update-clist','updateClist')->name('update-clist');

         /* ------------------------- checklist groups routes ------------------------ */
        Route::get('/checklist-group', 'viewCLG')->name('checklist-group');
        route::post('/add-checklistgroup', 'addCLG')->name('add-checklistgroup');
        route::post('/delete-checklistgroup/{id}', 'deleteCLG')->name('delete-checklistgroup');
        route::get('/edit-cgroup/{id}','editCLGroup')->name('edit-cgroup');
        route::post('/update-cgroup','updateCLGroup')->name('update-cgroup');
    });
});

require __DIR__.'/auth.php';
