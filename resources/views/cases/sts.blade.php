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
                        <section id="tab1" class="tab-pane fade show active">
                            <form action="{{ route('add-patient-medication') }}" method="post">
                                @csrf
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <label for="" class="me-3">ACE or ARB</label><span class="fs-10 mt-2">within
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
                                            <input type="radio" name="inhibitor" id="inhibitoryes" value="Yes" />
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
                                            <input type="radio" name="anticoagulant" id="anticoyes" value="1" />
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
                                                <option value="Heprain (Unfractionated)">Heprain (Unfractionated)</option>
                                                <option value="Heprain (Low Molecular)">Heprain (Low Molecular)</option>
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
                                    <label for="" class="me-2">Aspirin</label><span class="fs-10 mt-2"> within
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
                                    <label for="" class="me-2">Beta Blocker</label><span class="fs-10 mt-2"> on
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
                                    <label for="" class="me-2">Coumadin</label><span class="fs-10 mt-2">Within
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
                                            <input type="radio" name="glycoprotein" id="glycoyes" value="Yes" />
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
                                    <label for="" class="me-2">Steroids</label><span class="fs-10 mt-2">Within
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('dist/js/sts.min.js') }}"></script>
@endsection
