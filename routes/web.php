<?php

use App\Http\Controllers\CardioplegiaController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\DataDeviceController;
use App\Http\Controllers\EmailSettingsController;
use App\Http\Controllers\FluidController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LivelineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StsController;
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
        route::post('/edit-report', 'editReport')->name('edit-report');
        route::any('/delete-report/{id}', 'deleteReport')->name('delete-report');

        /* -------------------------- report review routes -------------------------- */
        Route::get('/report-review', 'viewReportReview')->name('report-review');
        Route::post('/add-report-review', 'addReportReview')->name('add-report-review');
        route::post('/edit-report-review', 'editReportReview')->name('edit-report-review');
        route::any('/delete-report-review/{id}', 'deleteReportReview')->name('delete-report-review');
    });


    Route::controller(UserController::class)->group(function () {
        Route::get('/all-users', 'index')->name('all-users'); // Show users list
        route::post('add-user', 'addUser')->name('add-user');
        route::post('edit-user', 'editUser')->name('edit-user');
        route::post('delete-user/{id}', 'deleteUser')->name('delete-user');
    });

    Route::controller(ConfigController::class)->group(function () {


        Route::any('/check-email', [UserController::class, 'checkEmail'])->name('check.email');

        /* ----------------------------- hospital routes ---------------------------- */
        Route::get('/view-hospital', 'viewHospital')->name('view-hospital');
        route::post('add-hospital', 'addHospital')->name('add-hospital');
        route::post('edit-hospital', 'editHospital')->name('edit-hospital');
        route::post('delete-hospital/{id}', 'deleteHospital')->name('delete-hospital');
        /* ------------------------- equipment group routes ------------------------- */
        Route::get('/view-equipment-group', 'viewEquipmentGroup')->name('view-equipment-group');
        route::post('add-equipment-group', 'addEquipmentGroup')->name('add-equipment-group');
        route::post('edit-equipment-group', 'editEquipmentGroup')->name('edit-equipment-group');
        route::post('delete-equipment-group/{id}', 'deleteEquipmentGroup')->name('delete-equipment-group');
        /* ---------------------------- equipment routes ---------------------------- */
        Route::get('/view-equipment', 'viewEquipment')->name('view-equipment');
        route::post('/add-equipment', 'addEquipment')->name('add-equipment');
        route::post('/edit-equipment', 'editEquipment')->name('edit-equipment');
        route::post('/delete-equipment/{id}', 'deleteEquipment')->name('delete-equipment');
        /* --------------------------- supply group routes -------------------------- */
        Route::get('/view-supply-group', 'viewSupplyGroup')->name('view-supply-group');
        route::post('/add-supply-group', 'addSupplyGroup')->name('add-supply-group');
        route::post('/edit-supply-group', 'editSupplyGroup')->name('edit-supply-group');
        route::post('/delete-supply-group/{id}', 'deleteSupplyGroup')->name('delete-supply-group');
        /* ----------------------------- supplies routes ---------------------------- */
        Route::get('/view-supplies', 'viewSupplies')->name('view-supplies');
        route::post('/add-supplies', 'addSupplies')->name('add-supplies');

        route::post('/update-supplies', 'editSupplies')->name('update-supplies');
        route::post('/delete-supplies/{id}', 'deleteSupplies')->name('delete-supplies');
        /* ------------------------------ staff routes ------------------------------ */
        Route::get('/view-staff', 'viewStaff')->name('view-staff');
        route::post('/add-staff', 'addStaff')->name('add-staff');
        route::post('/edit-staff', 'editStaff')->name('edit-staff');
        route::post('/delete-staff/{id}', 'deleteStaff')->name('delete-staff');

        /* ------------------------- procedure module routes ------------------------ */
        Route::get('/view-procedure', 'viewProcedure')->name('view-procedure');
        route::post('/add-procedure', 'addProcedure')->name('add-procedure');
        route::post('/edit-procedure', 'editProcedure')->name('edit-procedure');
        route::post('/delete-procedure/{id}', 'deleteProcedure')->name('delete-procedure');
    });

    Route::controller(LabController::class)->group(function () {
        /* --------------------------- lab results routes --------------------------- */
        Route::get('/lab-results', 'viewlabResults')->name('view-lab-results');
        route::post('/add-lab-results', 'addlabResults')->name('add-lab-results');
        route::post('/edit-lab-results', 'editlabResults')->name('edit-lab-results');
        route::post('/delete-lab-results/{id}', 'deletelabResults')->name('delete-lab-results');

        /* ------------------------------- lab routes ------------------------------- */

        Route::get('/labs', 'viewLab')->name('view-lab');
        route::post('/add-lab', 'addLab')->name('add-lab');
        route::post('/edit-lab', 'editLab')->name('edit-lab');
        route::post('/delete-lab/{id}', 'deleteLab')->name('delete-lab');

        /* ---------------------------- lab ranges routes --------------------------- */

        Route::get('/lab-ranges', 'viewLabrange')->name('view-lab-range');
        route::post('/add-lab-range', 'addLabrange')->name('add-lab-range');
        route::post('/edit-lab-range', 'editLabrange')->name('edit-lab-range');
        route::post('/delete-lab-range/{id}', 'deleteLabrange')->name('delete-lab-range');
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
        Route::get('/edit-clist/{id}', 'editClist')->name('edit-clist');
        Route::post('/update-clist', 'updateClist')->name('update-clist');

        /* ------------------------- checklist groups routes ------------------------ */
        Route::get('/checklist-group', 'viewCLG')->name('checklist-group');
        route::post('/add-checklistgroup', 'addCLG')->name('add-checklistgroup');
        route::post('/delete-checklistgroup/{id}', 'deleteCLG')->name('delete-checklistgroup');
        route::get('/edit-cgroup/{id}', 'editCLGroup')->name('edit-cgroup');
        route::post('/update-cgroup', 'updateCLGroup')->name('update-cgroup');
    });

    Route::controller(FluidController::class)->group(function () {

         /* ---------------------- fluid location module routes ---------------------- */
         Route::get('/fluid-location', 'viewFluidLocation')->name('fluid-location');
         route::post('/add-fluid-location', 'addFluidLocation')->name('add-fluid-location');
         route::post('/edit-fluid-location','editFluidLocation')->name('edit-fluid-location');
         route::post('/delete-fluid-location/{id}', 'deleteFluidLocation')->name('delete-fluid-location');

         /* ----------------------- fluid drugs modules routes ----------------------- */
         Route::get('/fluid-drugs', 'viewFluidDrugs')->name('fluid-drugs');
         route::post('/add-fluid-drugs', 'addFluidDrugs')->name('add-fluid-drugs');
         route::post('/edit-fluid-drugs','editFluidDrugs')->name('edit-fluid-drugs');
         route::post('/delete-fluid-drugs/{id}', 'deleteFluidDrugs')->name('delete-fluid-drugs');
        /* ---------------------- fluid location module routes ---------------------- */
        Route::get('/fluid-location', 'viewFluidLocation')->name('fluid-location');
        route::post('/add-fluid-location', 'addFluidLocation')->name('add-fluid-location');
        route::post('/edit-fluid-location', 'editFluidLocation')->name('edit-fluid-location');
        route::post('/delete-fluid-location/{id}', 'deleteFluidLocation')->name('delete-fluid-location');


        /* ---------------------- fluid drug mixture module routes ---------------------- */
        Route::get('/fluid-drug-mixture', 'viewFDMixture')->name('fluid-drug-mixture');
        route::post('/add-fdmixture', 'addFDMixture')->name('add-fdmixture');
        route::post('/delete-FDmixture/{id}', 'deleteFDmixture')->name('delete-FDmixture');
        route::post('/edit-FDmixture', 'editFDmixture')->name('edit-FDmixture');
    });

    Route::controller(CardioplegiaController::class)->group(function () {
        Route::get('/cardioplegias', 'viewCardioplegias')->name('cardioplegias');
        route::post('/add-cardioplegias', 'addCardioplegias')->name('add-cardioplegias');
        route::post('/edit-cardioplegias','editCardioplegias')->name('edit-cardioplegias');
        route::post('/delete-cardioplegias/{id}', 'deleteCardioplegias')->name('delete-cardioplegias');
    });

    Route::controller(DataDeviceController::class)->group(function () {
        Route::get('/data-devices', 'viewDataDevices')->name('data-devices');
        route::post('/add-data-devices', 'addDataDevices')->name('add-data-devices');
        route::post('/edit-data-devices','editDataDevices')->name('edit-data-devices');
        route::post('/delete-data-devices/{id}', 'deleteDataDevices')->name('delete-data-devices');
    });

    Route::controller(LivelineController::class)->group(function () {
        Route::get('/live-line', 'viewLiveLine')->name('live-line');
        route::post('/add-live-line', 'addLiveLine')->name('add-live-line');
        route::post('/edit-live-line','editLiveLine')->name('edit-live-line');
        route::post('/delete-live-line/{id}', 'deleteLiveLine')->name('delete-live-line');
    });

    Route::controller(CaseController::class)->group(function () {
        Route::get('/case', 'viewCase')->name('view-case');
        Route::post('/add-patient', 'addPatient')->name('add-patient');
        Route::post('/add-patient-history', 'addPatientHistory')->name('add-patient-history');
        Route::get('/procedure', 'caseProcedure')->name('case-procedure');

        Route::post('/add-case-procedure', 'addcaseProcedure')->name('add-case-procedure');
        Route::post('/add-valve-procedure', 'addvalveProcedure')->name('add-valve-procedure');
        Route::post('/add-noncardic-procedure', 'addNoncardicProcedure')->name('add-noncardic-procedure');



        /* ------------------------------- case staff ------------------------------- */

        Route::get('/case-staff', 'viewCstaff')->name('case-staff');
        route::post('/add-casestaff', 'addCaseStaff')->name('add-casestaff');
        route::post('/edit-casestaff', 'editcasestaff')->name('edit-casestaff');
        route::post('/delete-casestaff/{id}', 'deletecasestaff')->name('delete-casestaff');

        /* ---------------------- Case Equipment module routes ---------------------- */
        Route::get('/case-equipment', 'viewCEquipment')->name('case-equipment');
        route::post('/add-caseequipment', 'addCEquipment')->name('add-caseequipment');
        route::post('/edit-caseequipment', 'editCEquipment')->name('edit-caseequipment');
        route::post('/delete-caseequipment/{id}', 'deleteCaseEquipment')->name('delete-caseequipment');

        /* ---------------------- Case Supply module routes ---------------------- */
        route::post('/case-caseSupply', 'viewCase')->name('case-caseSupply');
        route::post('/add-caseSupply', 'addCaseSupply')->name('add-caseSupply');
        route::post('/edit-caseSupply', 'editCaseSupply')->name('edit-caseSupply');
        route::post('/delete-caseSupply/{id}', 'deleteCaseSupply')->name('delete-caseSupply');

        /* ---------------------- Coronary Artery Bypasses module routes ---------------------- */
        // route::get('/case-cabypasses', 'viewCase')->name('case-cabypasses');
        route::post('/add-cabypasses', 'addCABypasses')->name('add-cabypasses');
        route::post('/edit-cabypasses', 'editCABypasses')->name('edit-cabypasses');
        route::post('/delete-cabypasses/{id}', 'deleteCABypasses')->name('delete-cabypasses');

        Route::get('/othercp', 'viewothercps')->name('othercps');
        route::post('/add-other-cardiac-pro', 'addOtherCarPro')->name('add-other-cardiac-pro');
        route::post('/add-atrial-fibrillation', 'addAtrialFibrillation')->name('add-atrial-fibrillation');
        route::post('/add-aortic-procedure', 'addAorticProcedure')->name('add-aortic-procedure');
        route::post('/add-cardic-dev', 'addCardicAssistDev')->name('add-cardic-dev');

        /* ------------------------- fluid and drugs routes ------------------------- */

        route::get('/case-fluid-drugs', 'viewCaseFluidDrugs')->name('case-fluid-drugs');
        route::post('/add-case-fluiddrugs', 'addCaseFluiddrugs')->name('add-case-fluiddrugs');

        /* ---------------------- Case General Events module routes ---------------------- */
        route::get('/general-event', 'viewCGEvent')->name('general-event');
        route::post('/add-general-event', 'addCGEvent')->name('add-general-event');
        route::post('/delete-general-event/{id}', 'deleteCGEvent')->name('delete-general-event');
        route::post('/edit-general-event', 'editCGEvent')->name('edit-general-event');

        /* ---------------------- Case General Events module routes ---------------------- */
        route::get('/check-list', 'viewCList')->name('check-list');
        route::post('/add-check-list', 'addCList')->name('add-check-list');
        route::post('/delete-check-list/{id}', 'deleteCList')->name('delete-check-list');
        route::post('/edit-check-list', 'editCList')->name('edit-check-list');

        // Route::get('/get-rowboxes', 'getRowboxes')->name('get.rowboxes');

        Route::get('/get-rowboxes-groups', 'getRowboxesWithGroups')->name('get.rowboxes.groups');

        /* --------------------------- coronray fusion log -------------------------- */

    route::get('/coronary-perfusion-log', 'viewCornaryFusionLog')->name('coronary-perfusion-log');

    route::post('/add-coronary-perfusion-log', 'addCornaryFusionLog')->name('add-coronary-perfusion-log');

    route::post('/edit-coronary-perfusion-log', 'editCornaryFusionLog')->name('edit-coronary-perfusion-log');

        /* ------------------------------- sts routes ------------------------------- */

    });

    Route::controller(StsController::class)->group(function () {

    route::get('/sts', 'viewSts')->name('case-sts');

    });

});

require __DIR__ . '/auth.php';
