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
                    <ul class="nav p-3" id="myTab" role="tablist">
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
                        <section id="tab1" class="tab-pane fade show ">
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

                        <section id="tab2" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <div class="col-lg-4">
                                            <label for="">Family History of Premature CAD</label>
                                        </div>
                                        <div class="col-lg-8 d-md-flex">
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="premature" value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="premature" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input type="radio" name="premature" value="Unknown" checked />
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="diabetes" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input type="radio" name="diabetes" value="Unknown" checked />
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
                                                        <option value="Unknown">Unknown</option>
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
                                                    <input type="radio" name="dyslipidemia" value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="dyslipidemia" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input type="radio" name="dyslipidemia" value="Unknown" checked />
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
                                                    <input type="radio" name="dialysis" value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="dialysis" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input type="radio" name="dialysis" value="Unknown" checked />
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
                                                    <input type="radio" name="hypertension" value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="hypertension" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input type="radio" name="hypertension" value="Unknown" checked />
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="endocarditis" value="No" checked />
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
                                                                <option value="Unknown">Unknown</option>
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
                                                        <option value="No">No</option>
                                                        <option value="Mild">Mild</option>
                                                        <option value="Moderate">Moderate</option>
                                                        <option value="Severe">Severe</option>
                                                        <option value="Lung disease documented, severity unknown">Lung
                                                            disease documented, severity unknown</option>
                                                        <option value="Unknown">Unknown</option>
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="pulomnary_test" value="No" checked />
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="dlco_test" value="No" checked />
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="roomair_abg" value="No" checked />
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
                                                <option value="No">No</option>
                                                <option value="Unknown">Unknown</option>
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="inhaled_therapy" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="inhaled_therapy" value="Unknown" checked />
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="sleep_apnea" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="sleep_apnea" value="Unknown" checked />
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
                                                        <option value="No">No</option>
                                                        <option value="Unknown">Unknown</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="">Illicit drug use</label>
                                                    <select name="illicit_drug" class="form-control" id="">
                                                        <option value="">Select Illicit Drug Use</option>
                                                        <option value="Recent">Recent</option>
                                                        <option value="Remote">Remote</option>
                                                        <option value="No">No</option>
                                                        <option value="Unknown">Unknown</option>
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="Depression" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="Depression" value="Unknown" checked />
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
                                            <option value="Unknown">Unknown</option>
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="liver_disease" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="liver_disease" value="Unknown" checked />
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="immuno_present" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="immuno_present" value="Unknown" checked />
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="mediastinal" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="mediastinal" value="Unknown" checked />
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="cancer_within" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="cancer_within" value="Unknown" checked />
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="peripheral_artery" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="peripheral_artery" value="Unknown" checked />
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="Thoracic_aorta" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="Thoracic_aorta" value="Unknown" checked />
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="synocope" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="synocope" value="Unknown" checked />
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
                                                        value="Yes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="unresponsive_state" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="unresponsive_state" value="Unknown" checked />
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
                                                        value="Yes" id="cerebrovascularyes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="cerebrovascular" value="No" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="me-2">
                                                    <input type="radio" name="cerebrovascular" value="Unknown" checked />
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
                                                                        value="Yes" id="priorcvayes" />
                                                                    <span>Yes</span>
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <label class="me-2">
                                                                    <input type="radio" name="priorcva" value="No" />
                                                                    <span>No</span>
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <label class="me-2">
                                                                    <input type="radio" name="priorcva" value="Unknown" checked />
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
