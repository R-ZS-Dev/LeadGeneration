@extends('sitemaster.master-layout')
@section('title', 'All STS')
@section('content')
    <div class="container-fluid">
        <style>
            .nav {
                flex-wrap: nowrap;
                /* Prevent wrapping */
            }

            label input {
                position: absolute;
                left: -9999px;
            }

            .nav-item {
                flex-shrink: 0;
            }
        </style>

        <div class="row">

            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1"
                                type="button" role="tab" aria-controls="tab1" aria-selected="true">
                                Medications
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2"
                                type="button" role="tab" aria-controls="tab2" aria-selected="false">
                                Risk Factory
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3"
                                type="button" role="tab" aria-controls="tab3" aria-selected="false">
                                Previous Interventions
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4"
                                type="button" role="tab" aria-controls="tab4" aria-selected="false">
                                Cardic Status
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton" id="tab5-tab" data-bs-toggle="tab" data-bs-target="#tab5"
                                type="button" role="tab" aria-controls="tab5" aria-selected="false">
                                Hemodynamics and Cath
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton" id="tab6-tab" data-bs-toggle="tab" data-bs-target="#tab6"
                                type="button" role="tab" aria-controls="tab6" aria-selected="false">
                                Lab Results
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton" id="tab7-tab" data-bs-toggle="tab" data-bs-target="#tab7"
                                type="button" role="tab" aria-controls="tab7" aria-selected="false">
                                Operative
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn tabButton" id="tab7-tab" data-bs-toggle="tab" data-bs-target="#tab7"
                                type="button" role="tab" aria-controls="tab7" aria-selected="false">
                                Patient
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content mt-4">
                        <section id="tab1" class="tab-pane fade show">
                           <div class="row p-2 mb-3">
                           <center>
                            <h2><b>Add Patient Medications</b></h2>
                           </center>
                           <hr>
                           </div>
                            <form action="{{ route('add-patient-medication') }}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-3">ACE or ARB</label><span
                                            class="fs-10 mt-2">within
                                            48 hours</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="aceorarb" value="Yes" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="aceorarb" value="No" />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="aceorarb" value="Contrandicated" checked />
                                                <span>Contrandicated</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label>
                                                <input type="radio" name="aceorarb" value="Unknown" checked />
                                                <span>Unknown</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-3">ADP Inhibitor</label><span
                                            class="fs-10 mt-2">Within 5 Days</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="inhibitor" id="inhibitoryes"
                                                    value="Yes" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="inhibitor" value="No" />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="inhibitor" value="Contrandicated" />
                                                <span>Contrandicated</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label>
                                                <input type="radio" name="inhibitor" value="Unknown" checked />
                                                <span>Unknown</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group mb-3" id="inhibitor-yes" style="display: none;">
                                    <div class="col-lg-12">
                                        <div class="title-box">
                                            <span class="title-label">If Yes</span>
                                            <div class="col-md-11 mx-auto">
                                                <label for="">
                                                    ADP Inhibitors Discontinuation (# days prior to surgery)
                                                </label>
                                                <input type="number" name="inhibitor_no" class="form-control"
                                                    id="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="">Amiodraone prior to surgery</label>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="amiod" value="Yes, on home theropy" />
                                                <span>Yes, on home theropy</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="amiod"
                                                    value="Yes, therapy started this admission" />
                                                <span>Yes, therapy started this admission</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="amiod" value="No" checked />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label>
                                                <input type="radio" name="amiod" value="Unknown" checked />
                                                <span>Unknown</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-2">Anticoagulants</label>
                                        <span class="fs-10 mt-2">Within 48 hours</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="anticoagulant" id="anticoyes"
                                                    value="1" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="anticoagulant" value="0" checked />
                                                <span>No</span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row form-group mb-3" id="antico-yes" style="display: none;">
                                    <div class="col-lg-12">
                                        <div class="title-box">
                                            <span class="title-label">If Yes</span>
                                            <div class="col-md-11 mx-auto">
                                                <label for="">
                                                    Medication
                                                </label>
                                                <select name="medicat" class="form-select" id="">
                                                    <option value="">Select Medication</option>
                                                    <option value="Heprain (Unfractionated)">Heprain (Unfractionated)
                                                    </option>
                                                    <option value="Heprain (Low Molecular)">Heprain (Low Molecular)
                                                    </option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-2">Antiplatelets</label><span
                                            class="fs-10 mt-2">Within 5 Days</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="antiplaletes" value="Yes" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="antiplaletes" value="No" />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="antiplaletes" value="Contrandicated" />
                                                <span>Contrandicated</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="antiplaletes" value="Unknown" checked />
                                                <span>Unknown</span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-2">Aspirin</label><span class="fs-10 mt-2">
                                            within
                                            5 days</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="aspirin" value="Yes" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="aspirin" value="No" />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="aspirin" value="Contrandicated" />
                                                <span>Contrandicated</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="aspirin" value="Unknown" checked />
                                                <span>Unknown</span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-2">Beta Blocker</label><span
                                            class="fs-10 mt-2">Within 24 hours</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="beta_blocker" value="Yes" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="beta_blocker" value="No" checked />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="beta_blocker" value="Contrandicated" />
                                                <span>Contrandicated</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label for="" class="me-2">Beta Blocker</label><span
                                            class="fs-10 mt-2"> on
                                            therapy for >= 2 weeks prior to surgery</span>
                                    </div>
                                    <div class="col-lg-6 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="blocker_prior" value="Yes" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="blocker_prior" value="No" checked />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="blocker_prior" value="Contrandicated" />
                                                <span>Contrandicated</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="blocker_prior" value="Unknown" />
                                                <span>Unknown</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-6 d-flex">
                                        <label for="" class="me-2">Calcium Channel Blocker</label><span
                                            class="fs-10 mt-2"> on therapy for >= 2 weeks prior to surgery</span>
                                    </div>
                                    <div class="col-lg-6 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="calcium_prior" value="Yes" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="calcium_prior" value="No" checked />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="calcium_prior" value="Contrandicated" />
                                                <span>Contrandicated</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="calcium_prior" value="Unknown" />
                                                <span>Unknown</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-2">Coumadin</label><span
                                            class="fs-10 mt-2">Within
                                            24 hours</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="coumadin" value="Yes" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="coumadin" value="No" checked />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="coumadin" value="Unknown" />
                                                <span>Unknown</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-2">Factor Xa inhibitors</label><span
                                            class="fs-10 mt-2">Within 24 hours</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="factorxa" value="Yes" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="factorxa" value="No" checked />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="factorxa" value="Unknown" />
                                                <span>Unknown</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-2">Glycoprotein llb/llla</label><span
                                            class="fs-10 mt-2">Within 24 hours</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="glycoprotein" id="glycoyes"
                                                    value="Yes" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="glycoprotein" value="No" checked />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="glycoprotein" value="Unknown" />
                                                <span>Unknown</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group mb-3" id="glyco-yes" style="display: none;">
                                    <div class="col-lg-12">
                                        <div class="title-box">
                                            <span class="title-label">If Yes</span>
                                            <div class="col-md-11 mx-auto">
                                                <label for="">
                                                    Medication Name
                                                </label>
                                                <select name="med_name" class="form-select" id="">
                                                    <option value="">Select Medication Name</option>
                                                    <option value="Abciximab (ReoPro)">Abciximab (ReoPro)</option>
                                                    <option value="Emptifibatide (Integrilin)">Emptifibatide (Integrilin)
                                                    </option>
                                                    <option value="Tirofiban (Aggrastat)">Tirofiban (Aggrastat)</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-2">Inotropic, intraveous</label><span
                                            class="fs-10 mt-2">Within 48 hours</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="ointravanous" value="1" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="ointravanous" value="0" checked />
                                                <span>No</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-2">Lipid Lowering</label><span
                                            class="fs-10 mt-2">Within 24 hours</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <label class="me-2">
                                            <input type="radio" name="lipid" id="lipidyes" value="Yes" />
                                            <span>Yes</span>
                                        </label>
                                        <label class="me-2">
                                            <input type="radio" name="lipid" value="No" checked />
                                            <span>No</span>
                                        </label>
                                        <label class="me-2">
                                            <input type="radio" name="lipid" value="Contraindicated" />
                                            <span>Contraindicated</span>
                                        </label>
                                        <label class="me-2">
                                            <input type="radio" name="lipid" value="Unknown" />
                                            <span>Unknown</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row form-group mb-3" id="lipid-yes" style="display: none;">
                                    <div class="col-lg-12">
                                        <div class="title-box">
                                            <span class="title-label">If Yes</span>
                                            <div class="col-md-11 mx-auto">
                                                <label for="">
                                                    Medication Type
                                                </label>
                                                <select name="med_type" class="form-select" id="">
                                                    <option value="">Select Medication Type</option>
                                                    <option value="Statin">Statin</option>
                                                    <option value="Non-statin">Non-statin</option>
                                                    <option value="Other">Other</option>
                                                    <option value="Combination">Combination</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label for="" class="me-2">Long-acting Nitrate</label><span
                                            class="fs-10 mt-2">On therapy for >= 2 Weeks prior to surgery</span>
                                    </div>
                                    <div class="col-lg-6 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="long_acting" value="Yes" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="long_acting" value="No" checked />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="long_acting" value="Contraindicated" />
                                                <span>Contraindicated</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="long_acting" value="Unknown" />
                                                <span>Unknown</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-2">Nitrates, intravenous</label><span
                                            class="fs-10 mt-2">Within 24 hours</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="nitrates" value="1" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="nitrates" value="0" checked />
                                                <span>No</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label for="" class="me-2">Other Antianginal Medication</label><span
                                            class="fs-10 mt-2">On therapy for >= 2 weeks prior to surgery</span>
                                    </div>
                                    <div class="col-lg-6 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="antianginal" value="Yes" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="antianginal" value="No" checked />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="antianginal" value="Contraindicated" />
                                                <span>Contraindicated</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="antianginal" value="Unknown" />
                                                <span>Unknown</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-2">Steroids</label><span
                                            class="fs-10 mt-2">Within
                                            24 hours</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="steroids" value="Yes" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="steroids" value="No" checked />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="steroids" value="Contraindicated" />
                                                <span>Contraindicated</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="steroids" value="Unknown" />
                                                <span>Unknown</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-2">Thrombin Inhibitors</label><span
                                            class="fs-10 mt-2">Within 24 hours</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="thrombin" value="Yes" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="thrombin" value="No" checked />
                                                <span>No</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="thrombin" value="Contraindicated" />
                                                <span>Contraindicated</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="thrombin" value="Unknown" />
                                                <span>Unknown</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label for="" class="me-2">Thrombolytics</label><span
                                            class="fs-10 mt-2">Within 24 hours</span>
                                    </div>
                                    <div class="col-lg-8 d-md-flex">
                                        <div class="">
                                            <label class="me-2">
                                                <input type="radio" name="thrombolytics" value="1" />
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="me-2">
                                                <input type="radio" name="thrombolytics" value="0" checked />
                                                <span>No</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-dark ft">Add Patient Medications</button>
                                    </div>
                                </div>
                            </form>
                        </section>

                        <section id="tab2" class="tab-pane fade show ">
                            <div class="row p-2 mb-3">
                                <center>
                                 <h2><b>Add Patient Risk Factor</b></h2>
                                </center>
                                <hr>
                                </div>
                            <form action="{{ route('add-risk-factor') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label for="">Family History of Premature CAD</label>
                                            </div>
                                            <div class="col-lg-8 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="premature" value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="premature" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="radio" name="premature" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label for="">Diabetes</label>
                                            </div>
                                            <div class="col-lg-8 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="diabetes" id="diabetesyes"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="diabetes" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="radio" name="diabetes" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-3" id="diabetes-yes">
                                            <div class="col-lg-12">
                                                <div class="title-box">
                                                    <span class="title-label">If Yes</span>
                                                    <div class="col-md-11 mx-auto">
                                                        <label for="">
                                                            Diabetes-Control
                                                        </label>
                                                        <select name="diabetes-control" id="" class="form-select">
                                                            <option value="">Select diabetes control</option>
                                                            <option value="None">None</option>
                                                            <option value="Diet">Diet</option>
                                                            <option value="Oral">Oral</option>
                                                            <option value="Insulin">Insulin</option>
                                                            <option value="Other subcutaneous medication">Other subcutaneous
                                                                medication</option>
                                                            <option value="Other">Other</option>
                                                            <option value="2">Unknown</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label for="">Dyslipidemia</label>
                                            </div>
                                            <div class="col-lg-8 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="dyslipidemia" value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="dyslipidemia" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="radio" name="dyslipidemia" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label for="">Dialysis</label>
                                            </div>
                                            <div class="col-lg-8 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="dialysis" value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="dialysis" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="radio" name="dialysis" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label for="">Hypertension</label>
                                            </div>
                                            <div class="col-lg-8 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="hypertension" value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="hypertension" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="radio" name="hypertension" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label for="">Endocarditis</label>
                                            </div>
                                            <div class="col-lg-8 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="endocarditis" id="endocarditisyes"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="endocarditis" value="0" checked />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-3" id="endocarditis-yes">
                                            <div class="col-lg-12">
                                                <div class="title-box">
                                                    <span class="title-label">If Yes</span>
                                                    <div class="col-md-11 mx-auto">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="">
                                                                    Infected Endocard Type
                                                                </label>
                                                                <select name="infect_endocard_type" id=""
                                                                    class="form-select">
                                                                    <option value="">Select Infected Endocard Type
                                                                    </option>
                                                                    <option value="Treated">Treated</option>
                                                                    <option value="Active">Active</option>

                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="">
                                                                    Diabetes-Control
                                                                </label>
                                                                <select name="infect_endocard_culture" id=""
                                                                    class="form-select">
                                                                    <option value="">Select Infected Endocard Culture
                                                                    </option>
                                                                    <option value="Culture Negative">Culture Negative</option>
                                                                    <option value="Staphylococcus aureus">Staphylococcus aureus
                                                                    </option>
                                                                    <option value="Streptococcus species">Streptococcus species
                                                                    </option>
                                                                    <option value="Coagulase negative staphylococcus">Coagulase
                                                                        negative staphylococcus</option>
                                                                    <option value="Enterococcus species">Enterococcus species
                                                                    </option>
                                                                    <option value="Fungal">Fungal</option>
                                                                    <option value="Other">Other</option>
                                                                    <option value="2">Unknown</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group mb-3">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="">Tobacco use</label>
                                                        <select name="tobacco" id="" class="form-select">
                                                            <option value="">Select tobacco use</option>
                                                            <option value="Never Smoker">Never Smoker</option>
                                                            <option value="Current every day smoker">Current every day smoker
                                                            </option>
                                                            <option value="Current some day smoker">Current some day smoker
                                                            </option>
                                                            <option value="Smoker, current state (frequency) unknown">Smoker,
                                                                current state (frequency) unknown</option>
                                                            <option value="Former smoker">Former smoker</option>
                                                            <option value="Smoking status unknown">Smoking status unknown
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Chronic Lung Disease</label>
                                                        <select name="lung_disease" id="lung_disease" class="form-select">
                                                            <option value="">Select chronic lung disease</option>
                                                            <option value="0">No</option>
                                                            <option value="Mild">Mild</option>
                                                            <option value="Moderate">Moderate</option>
                                                            <option value="Severe">Severe</option>
                                                            <option value="Lung disease documented, severity unknown">Lung
                                                                disease documented, severity unknown</option>
                                                            <option value="2">Unknown</option>
                                                        </select>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                        <div class="row form-group mb-3" id="lungdisease-yes">
                                            <div class="col-lg-12">
                                                <div class="title-box">
                                                    <span class="title-label">If Mild , Moderate or Severe</span>
                                                    <div class="col-md-11 mx-auto">
                                                        <label for="">
                                                            Chronic Lung Disease - Type
                                                        </label>
                                                        <select name="lung_disease_type" class="form-select">
                                                            <option value="">Select Lung Disease Type
                                                            </option>
                                                            <option value="Obstructive">Obstructive</option>
                                                            <option value="Reactive">Reactive</option>
                                                            <option value="Interstitial Fibrosis">Interstitial Fibrosis
                                                            </option>
                                                            <option value="Other">Other</option>
                                                            <option value="Multiple">Multiple</option>
                                                            <option value="Not Documented">Not Documented</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label for="">Pulmonary Function Test Done</label>
                                            </div>
                                            <div class="col-lg-8 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="pulomnary_test" id="pulomnarytestyes"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="pulomnary_test" value="0" checked />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-3" id="pulomonarytest-yes">
                                            <div class="col-lg-12">
                                                <div class="title-box">
                                                    <span class="title-label">If Yes</span>
                                                    <div class="col-md-11 mx-auto">
                                                        <label for="">
                                                            Forced Expiratory Volume Predicted
                                                        </label>
                                                        <input type="number" name="volumn_predict" class="form-control"
                                                            id="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label for="">DLCO Test Performed</label>
                                            </div>
                                            <div class="col-lg-8 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="dlco_test" id="dlcoyes"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="dlco_test" value="0" checked />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-3" id="dlco-yes">
                                            <div class="col-lg-12">
                                                <div class="title-box">
                                                    <span class="title-label">If Yes</span>
                                                    <div class="col-md-11 mx-auto">
                                                        <label for="">
                                                            DLCO Predicted
                                                        </label>
                                                        <input type="text" name="dlco_predict" class="form-control"
                                                            id="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label for="">Room Air ABG Performed</label>
                                            </div>
                                            <div class="col-lg-8 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="roomair_abg" id="abgyes"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="roomair_abg" value="0" checked />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-3" id="abg-yes">
                                            <div class="col-lg-12">
                                                <div class="title-box">
                                                    <span class="title-label">If Yes</span>
                                                    <div class="col-md-11 mx-auto">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="">Carbon dioxide level</label>
                                                                <input type="text" name="cd_level" class="form-control"
                                                                    id="">
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="">Oxygen level</label>
                                                                <input type="text" name="oxy_level" class="form-control"
                                                                    id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="">Home Oxygen</label>
                                                <select name="home_oxy" id="" class="form-select">
                                                    <option value="">Select Oxygen Level</option>
                                                    <option value="Yes, PRN">Yes, PRN</option>
                                                    <option value="Yes, Oxygen dependent">Yes Oxygen dependent</option>
                                                    <option value="0">No</option>
                                                    <option value="2">Unknown</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="">Inhaled Medication or Oral Bronchodilator Therapy</label>
                                            </div>
                                            <div class="col-lg-6 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="inhaled_therapy"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="inhaled_therapy" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="inhaled_therapy" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="">Sleep Apnea</label>
                                            </div>
                                            <div class="col-lg-6 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="sleep_apnea"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="sleep_apnea" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="sleep_apnea" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <label for="">Pneumonia</label>
                                                        <select name="pneumonia" class="form-control" id="">
                                                            <option value="">Select Pneumonia</option>
                                                            <option value="Recent">Recent</option>
                                                            <option value="Remote">Remote</option>
                                                            <option value="0">No</option>
                                                            <option value="2">Unknown</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label for="">Illicit drug use</label>
                                                        <select name="illicit_drug" class="form-control" id="">
                                                            <option value="">Select Illicit Drug Use</option>
                                                            <option value="Recent">Recent</option>
                                                            <option value="Remote">Remote</option>
                                                            <option value="0">No</option>
                                                            <option value="2">Unknown</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="">Depression</label>
                                            </div>
                                            <div class="col-lg-6 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="Depression"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="Depression" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="Depression" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                           <div class="col-md-12">
                                            <label for="">Alcohol Use</label>
                                            <select name="alco_use" class="form-select" id="">
                                                <option value="">Select Alcohol Use</option>
                                                <option value="<= 1 Drink/Week"><= 1 Drink/Week</option>
                                                <option value="2-7 Drinks/Week">2-7 Drinks/Week</option>
                                                <option value=">= 8 Drinks/week">>= 8 Drinks/Week</option>
                                                <option value="None">None</option>
                                                <option value="2">Unknown</option>
                                            </select>
                                           </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="">Liver Disease</label>
                                            </div>
                                            <div class="col-lg-6 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="liver_disease"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="liver_disease" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="liver_disease" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="">Immunocompromise Present</label>
                                            </div>
                                            <div class="col-lg-6 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="immuno_present"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="immuno_present" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="immuno_present" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="">Mediastinal Radiation</label>
                                            </div>
                                            <div class="col-lg-6 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="mediastinal"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="mediastinal" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="mediastinal" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="">Cancer Within 5 Year</label>
                                            </div>
                                            <div class="col-lg-6 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="cancer_within"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="cancer_within" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="cancer_within" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="">Peripheral Artery Disease</label>
                                            </div>
                                            <div class="col-lg-6 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="peripheral_artery"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="peripheral_artery" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="peripheral_artery" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="">Thoracic Aorta Disease </label>
                                            </div>
                                            <div class="col-lg-6 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="Thoracic_aorta"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="Thoracic_aorta" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="Thoracic_aorta" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="">Syncope</label>
                                            </div>
                                            <div class="col-lg-6 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="synocope"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="synocope" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="synocope" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="">Unresponsive State</label>
                                            </div>
                                            <div class="col-lg-6 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="unresponsive_state"
                                                            value="1" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="unresponsive_state" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="unresponsive_state" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="">Cerebrovascular Disease</label>
                                            </div>
                                            <div class="col-lg-6 d-md-flex">
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="cerebrovascular"
                                                            value="1" id="cerebrovascularyes" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="cerebrovascular" value="0" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="me-2">
                                                        <input type="radio" name="cerebrovascular" value="2" checked />
                                                        <span>Unknown</span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row form-group mb-3" id="cerebrovascular-yes" style="display: none;">
                                            <div class="col-lg-12">
                                                <div class="title-box">
                                                    <span class="title-label">If Yes</span>
                                                    <div class="col-md-11 mx-auto">
                                                        <div class="row mb-3">
                                                            <div class="col-lg-6">
                                                                <label for="">Prior CVA</label>
                                                            </div>
                                                            <div class="col-lg-6 d-md-flex">
                                                                <div>
                                                                    <label class="me-2">
                                                                        <input type="radio" name="priorcva"
                                                                            value="1" id="priorcvayes" />
                                                                        <span>Yes</span>
                                                                    </label>
                                                                </div>
                                                                <div>
                                                                    <label class="me-2">
                                                                        <input type="radio" name="priorcva" value="0" />
                                                                        <span>No</span>
                                                                    </label>
                                                                </div>
                                                                <div>
                                                                    <label class="me-2">
                                                                        <input type="radio" name="priorcva" value="2" checked />
                                                                        <span>Unknown</span>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row form-group mb-3" id="priorcva-yes" style="display: none;">
                                                            <div class="col-lg-12">
                                                                <div class="title-box">
                                                                    <span class="title-label">If Yes</span>
                                                                    <label for="">Prior CVA-When</label>
                                                                    <select name="priorcva_when" class="form-select" id="">
                                                                        <option value="">Select Prior CVA-When</option>
                                                                        <option value="<= 30 Days"><= 30 Days</option>
                                                                        <option value="> 30 Days">> 30 Days</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-lg-6">
                                                                <label for="">CVD TIA</label>
                                                            </div>
                                                            <div class="col-lg-6 d-md-flex">
                                                                <div>
                                                                    <label class="me-2">
                                                                        <input type="radio" name="cvdtia"
                                                                            value="1" id="cvdtiayes" />
                                                                        <span>Yes</span>
                                                                    </label>
                                                                </div>
                                                                <div>
                                                                    <label class="me-2">
                                                                        <input type="radio" name="cvdtia" value="0" />
                                                                        <span>No</span>
                                                                    </label>
                                                                </div>
                                                                <div>
                                                                    <label class="me-2">
                                                                        <input type="radio" name="cvdtia" value="2" checked />
                                                                        <span>Unknown</span>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-12">
                                                                <label for="">CVD Carotid Stenosis </label>
                                                                <select name="cvd_stenosis" id="cvd_stenosis" class="form-select">
                                                                    <option value="">Select CVD Carotid Stenosis</option>
                                                                    <option value="Right">Right</option>
                                                                    <option value="Left">Left</option>
                                                                    <option value="Both">Both</option>
                                                                    <option value="None">None</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group mb-3" id="hiddenDiv" style="display: none;">
                                                            <div class="col-lg-12">
                                                                <div class="title-box">
                                                                    <span class="title-label">If Right or Both</span>
                                                                    <label for="">Severity of stenosis on the right carotid artrey </label>
                                                                    <select name="stenosis_right" class="form-select" id="">
                                                                        <option value="">Select Severity of stenosis</option>
                                                                        <option value="50% to 79%">50% to 79%</option>
                                                                        <option value="80% to 99%">80% to 99%</option>
                                                                        <option value="100%">100%</option>
                                                                        <option value="Not documented">Not Documented</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group mb-3" id="hiddenleftDiv" style="display: none;">
                                                            <div class="col-lg-12">
                                                                <div class="title-box">
                                                                    <span class="title-label">If Left or Both</span>
                                                                    <label for="">Severity of stenosis on the left carotid artrey </label>
                                                                    <select name="stanosis_left" class="form-select" id="">
                                                                        <option value="">Select Severity of stenosis</option>
                                                                        <option value="50% to 79%">50% to 79%</option>
                                                                        <option value="80% to 99%">80% to 99%</option>
                                                                        <option value="100%">100%</option>
                                                                        <option value="Not documented">Not Documented</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-lg-8">
                                                                <label for="">History of previous carotid artery surgery and/or stenting </label>
                                                            </div>
                                                            <div class="col-lg-4 d-md-flex">
                                                                <div>
                                                                    <label class="me-2">
                                                                        <input type="radio" name="pre_carotid"
                                                                            value="1" id="pre_carotidyes" />
                                                                        <span>Yes</span>
                                                                    </label>
                                                                </div>
                                                                <div>
                                                                    <label class="me-2">
                                                                        <input type="radio" name="pre_carotid" value="0"  checked/>
                                                                        <span>No</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 mb-2">
                                                        <label for="">WBC count</label>
                                                        <input type="number" class="form-control" name="wbc_count">
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 mb-2">
                                                        <label for="">Hemoglobin</label>
                                                        <input type="text" class="form-control" name="hemoglobin">
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 mb-2">
                                                        <label for="">Hematocrit</label>
                                                        <input type="text" class="form-control" name="hematocrit">
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 mb-2">
                                                        <label for="">Platelet Count</label>
                                                        <input type="text" class="form-control" name="platelet_count">
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 mb-2">
                                                        <label for="">Last Creatinine Level</label>
                                                        <input type="text" class="form-control" name="lst_creatine_lvl">
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 mb-2">
                                                        <label for="">Total Albumin</label>
                                                        <input type="text" class="form-control" name="total_albumin">
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 mb-2">
                                                        <label for="">Total Bilirubin</label>
                                                        <input type="text" class="form-control" name="total_bilirubin">
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 mb-2">
                                                        <label for="">A 1 c Level</label>
                                                        <input type="text" class="form-control" name="aclevel">
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 mb-2">
                                                        <label for="">INR</label>
                                                        <input type="text" class="form-control" name="inr">
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 mb-2">
                                                        <label for="">Meld Score</label>
                                                        <input type="text" class="form-control" name="meld_score">
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 mb-2">
                                                        <label for="">BNP</label>
                                                        <input type="text" class="form-control" name="bnp">
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <label for="">High-Sensitivity Troponin T</label>
                                                        <input type="text" class="form-control" name="high_sensitive">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label for="">N-Terminal Prohormone of Brain NeuTriuretic Peptide</label>
                                                        <input type="text" class="form-control" name="nterminal">
                                                    </div>

                                                    <div class="col-md-6 mb-2">
                                                        <label for="">High Sensitive CRP or Ultra-sensitive CRP</label>
                                                        <input type="text" class="form-control" name="highultra_sensitive">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label for="">Growth Differentiation Factor 15</label>
                                                        <input type="text" class="form-control" name="growth_diff">
                                                    </div>

                                                    <div class="row mb-3 mt-2">
                                                        <div class="col-lg-6">
                                                            <label for="">HIT Antibodies </label>
                                                        </div>
                                                        <div class="col-lg-6 d-md-flex">
                                                            <div>
                                                                <label class="me-2">
                                                                    <input type="radio" name="antibody"
                                                                        value="Yes" id="antibodyyes" />
                                                                    <span>Yes</span>
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <label class="me-2">
                                                                    <input type="radio" name="antibody" value="No"  checked/>
                                                                    <span>No</span>
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <label class="me-2">
                                                                    <input type="radio" name="antibody" value="Not Applicable"/>
                                                                    <span>Not Applicable</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 mt-2">
                                                        <div class="col-lg-6">
                                                            <label for="">Five Meter Walk Test Done </label>
                                                        </div>
                                                        <div class="col-lg-6 d-md-flex">
                                                            <div>
                                                                <label class="me-2">
                                                                    <input type="radio" name="walkdone"
                                                                        value="Yes" id="walkdoneyes" />
                                                                    <span>Yes</span>
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <label class="me-2">
                                                                    <input type="radio" name="walkdone" value="No"  checked/>
                                                                    <span>No</span>
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <label class="me-2">
                                                                    <input type="radio" name="walkdone" value="Non-ambulatory patient"/>
                                                                    <span>Non-ambulatory patient</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group mb-3" id="walkdone-yes">
                                                        <div class="col-lg-12">
                                                            <div class="title-box">
                                                                <span class="title-label">If Yes</span>
                                                                <div class="row">
                                                                    <div class="col-md-4 mb-2">
                                                                        <label for="">Time 1 (Seconds)</label>
                                                                        <input type="text" name="time1sec" class="form-control" id="">
                                                                    </div>
                                                                    <div class="col-md-4 mb-2">
                                                                        <label for="">Time 2 (Seconds)</label>
                                                                        <input type="text" name="time2sec" class="form-control" id="">
                                                                    </div>
                                                                    <div class="col-md-4 mb-2">
                                                                        <label for="">Time 3 (Seconds)</label>
                                                                        <input type="text" name="time3sec" class="form-control" id="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-dark ft">Add Risk Factor</button>
                                    </div>
                                </div>
                               </form>
                        </section>

                        <section id="tab3" class="tab-pane fade show">

                        </section>

                        <section id="tab4" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="row mb-3 mt-2">
                                        <div class="col-lg-6">
                                            <label for="">Prior Myocardial Infarction </label>
                                        </div>
                                        <div class="col-lg-6 d-md-flex">
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="myocardial"
                                                        value="1" id="myocardialyes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="myocardial" value="0"  checked/>
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="myocardial" value="Unknown"/>
                                                    <span>Unknown</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-3" id="myocardial-yes">
                                        <div class="col-lg-12">
                                            <div class="title-box">
                                                <span class="title-label">If Yes</span>
                                                <div class="row">
                                                    <div class="col-md-11 mx-auto">
                                                        <label for="">MI When</label>
                                                        <select name="mi_when" class="form-select" id="">
                                                            <option value="">Select MI When</option>
                                                            <option value="<= 6 Hours"><= 6 Hours</option>
                                                            <option value=">6 Hours but <24 Hours"> &gt; 6 Hours but &lt; 24 Hours</option>
                                                                <option value="1 to 7 Days">1 to 7 Days</option>
                                                                <option value="8 to 21 Days">8 to 21 Days</option>
                                                                <option value=">21 Days">&gt; 21 Days</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-3">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="">Cardiac Symptoms at Time of admission:</label>
                                                    <select name="cardic_symp" class="form-select" id="">
                                                        <option value="">Select Cardic Symptoms</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('dist/js/sts.min.js') }}"></script>
@endsection
