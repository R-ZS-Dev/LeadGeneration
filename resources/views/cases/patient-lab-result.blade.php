@extends('sitemaster.master-layout')
@section('title', 'All Data Devices')
@section('content')
<div class="container-fluid">
    <div class="row">

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <!-- Success Message -->
        <div id="successMessage" class="alert alert-success" style="display: none;"></div>

        <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="text-center mt-2 mb-4">
                            <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                <h4 class="mb-0"><b>Add Patient Lab Result</b></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('add-patient-lab-result') }}" class="mt-4">
                            @csrf
                            <div class="row">

                                <div class="col-lg-12 mb-2">
                                    <label for="pat_id">Select Patient</label>
                                    <select name="pat_id" id="pat_id" class="form-control" required>
                                        <option value="">Select Patient</option>
                                        @foreach ($patients as $item)
                                        <option value="{{ $item->pat_id }}">{{ $item->first_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="">Select Lab</label>
                                        <select name="lab_id" id="labSelect" class="form-control">
                                            <option value="">Select Lab</option>
                                            @foreach ($viewLabs as $lab)
                                            <option value="{{ $lab->l_id }}">{{ $lab->l_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group mb-3">
                                    <div class="col-lg-6">
                                        <div class="col-md-12">
                                            <label for="">Arterial</label>
                                        </div>
                                        <div class="col-md-12 d-flex">
                                            <label class="me-3">
                                                <input type="radio" name="c_arterial" value="0" checked />
                                                <span>Arterial</span>
                                            </label>
                                            <label class="me-3">
                                                <input type="radio" name="c_arterial" value="1" />
                                                <span>Venous</span>
                                            </label>
                                            <label class="me-3">
                                                <input type="radio" name="c_arterial" value="2" />
                                                <span>Mixed</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-md-12">
                                            <label for="">Temperature</label>
                                        </div>
                                        <div class="col-md-12 d-flex">
                                            <label class="me-3">
                                                <input type="radio" name="c_temp" value="0" checked />
                                                <span>Alpha-Stat</span>
                                            </label>
                                            <label class="me-3">
                                                <input type="radio" name="c_temp" value="1" />
                                                <span>pH-Stat</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group mb-3">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Draw Date</label>
                                            <input type="date" name="draw_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Draw Time</label>
                                            <input type="time" name="draw_time" class="form-control" value="{{ now()->format('H:i') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group mb-3">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Result Date</label>
                                            <input type="date" name="result_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Result Time</label>
                                            <input type="time" name="result_time" class="form-control" value="{{ now()->format('H:i') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group mb-3">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Billing Code</label>
                                            <input type="text" name="billing_code" class="form-control" value="" maxlength="30">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group mb-3">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Note</label>
                                            <textarea name="note" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- ACT section start-->
                            <section id="section1" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    ACT <label class="text-muted small ms-2">(seconds, Low: 70 High: 180)</label>
                                                </label>
                                                <input type="text" name="act_act" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Hep Test Conc <label class="text-muted small ms-2">mg/kg</label>
                                                </label>
                                                <input type="text" name="act_hep_test_conc" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Hep Bolus Indic <label class="text-muted small ms-2">unit</label>
                                                </label>
                                                <input type="text" name="act_hep_bolus_indic" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Hep Maint Indic <label class="text-muted small ms-2">units</label>
                                                </label>
                                                <input type="text" name="act_hep_maint_indic" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Prot Indic <label class="text-muted small ms-2">mg</label>
                                                </label>
                                                <input type="text" name="act_prot_indic" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- ACT section End-->

                            <!-- Blood Gas section start-->
                            <section id="section2" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    PH <label class="text-muted small ms-2">(Low: 7.32 High: 7.45)</label>
                                                </label>
                                                <input type="text" name="bg_ph" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    p02 <label class="text-muted small ms-2">ImmHg</label>
                                                </label>
                                                <input type="text" name="bg_p02" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    pCO2 <label class="text-muted small ms-2">ImmHg</label>
                                                </label>
                                                <input type="text" name="bg_pco2" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Ca++ <label class="text-muted small ms-2">Immol/L</label>
                                                </label>
                                                <input type="text" name="bg_ca" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    K+ <label class="text-muted small ms-2">Immol/L</label>
                                                </label>
                                                <input type="text" name="bg_k" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    tHb <label class="text-muted small ms-2">g/dL</label>
                                                </label>
                                                <input type="text" name="bg_thb" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    SO2 <label class="text-muted small ms-2">%</label>
                                                </label>
                                                <input type="text" name="bg_so2" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Lactate <label class="text-muted small ms-2">mmol/L (Low: 0.5 High: 2.0)</label>
                                                </label>
                                                <input type="text" name="bg_lactate" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    HCT <label class="text-muted small ms-2">% (Low: 45 High: 52)</label>
                                                </label>
                                                <input type="text" name="bg_hct" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Blood Gas section End-->

                            <!-- Blood Sugar section start-->
                            <section id="section3" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    GLUC <label class="text-muted small ms-2">mg/dL (Low: 70 High: 99)</label>
                                                </label>
                                                <input type="text" name="bs_gluc" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Blood Sugar section End-->

                            <!-- CBC w/Auto Diff (CBC50) section start-->
                            <section id="section4" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    WBC <label class="text-muted small ms-2">K/ul (Low: 4.23 High: 9.07)</label>
                                                </label>
                                                <input type="text" name="cbc_wbc" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Hgb <label class="text-muted small ms-2">g/dL (Low: 13 High: 18)</label>
                                                </label>
                                                <input type="text" name="cbc_hgb" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Hct <label class="text-muted small ms-2">% (Low: 45 High: 52)</label>
                                                </label>
                                                <input type="text" name="cbc_hct" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    MCV <label class="text-muted small ms-2">picograms (Low: 27 High: 32)</label>
                                                </label>
                                                <input type="text" name="cbc_mcv" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    MCH <label class="text-muted small ms-2">pg (Low: 25.7 High: 32.2)</label>
                                                </label>
                                                <input type="text" name="cbc_mch" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    MCHC <label class="text-muted small ms-2">% (Low: 28 High: 36)</label>
                                                </label>
                                                <input type="text" name="cbc_mchc" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    RDW <label class="text-muted small ms-2">% (Low: 11 High: 15)</label>
                                                </label>
                                                <input type="text" name="cbc_rdw" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    PLT <label class="text-muted small ms-2">mL (Low: 150,000 High: 400,000)</label>
                                                </label>
                                                <input type="text" name="cbc_plt" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    MPV <label class="text-muted small ms-2">femtoliters (Low: 7.5 High: 11.5)</label>
                                                </label>
                                                <input type="text" name="cbc_mpv" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    RBC (red blood cell) erythrocyte count <label class="text-muted small ms-2">cmm (Low: 4.2 million High: 5.9 million)</label>
                                                </label>
                                                <input type="text" name="cbc_rbc" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- CBC w/Auto Diff (CBC50) section End-->

                            <!-- CDI 500 section start-->
                            <section id="section5" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    PH <label class="text-muted small ms-2">(Low: 7.32 High: 7.45)</label>
                                                </label>
                                                <input type="text" name="cdi_ph" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    PaCO2 <label class="text-muted small ms-2">mm Hg</label>
                                                </label>
                                                <input type="text" name="cdi_paco2" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    PaO2 <label class="text-muted small ms-2">mm Hg</label>
                                                </label>
                                                <input type="text" name="cdi_pao2" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    T <label class="text-muted small ms-2">F</label>
                                                </label>
                                                <input type="text" name="cdi_t" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    HCO3 <label class="text-muted small ms-2">mEq/L</label>
                                                </label>
                                                <input type="text" name="cdi_hco3" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    B.E. <label class="text-muted small ms-2">ImEq/liter (Low: -2 High: +2)</label>
                                                </label>
                                                <input type="text" name="cdi_be" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    SaO2 <label class="text-muted small ms-2">%</label>
                                                </label>
                                                <input type="text" name="cdi_sao2" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    K+ <label class="text-muted small ms-2">Immol/L</label>
                                                </label>
                                                <input type="text" name="cdi_k" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    S02 <label class="text-muted small ms-2">%</label>
                                                </label>
                                                <input type="text" name="cdi_so2" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Hct <label class="text-muted small ms-2">% (Low: 45 High: 52)</label>
                                                </label>
                                                <input type="text" name="cdi_hct" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Hgb <label class="text-muted small ms-2">g/dL (Low: 13 High: 18)</label>
                                                </label>
                                                <input type="text" name="cdi_hgb" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- CDI 500 section End-->

                            <!-- Chemistry Panel section start-->
                            <section id="section6" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    ALT <label class="text-muted small ms-2">IU/L (Low: 8 High: 37)</label>
                                                </label>
                                                <input type="text" name="cp_alt" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Albumin <label class="text-muted small ms-2">g/dL (Low: 3.9 High: 5.0)</label>
                                                </label>
                                                <input type="text" name="cp_albumin" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    A/G ratio <label class="text-muted small ms-2">ratio (Low: 1.01:1 High: 1.2:1)</label>
                                                </label>
                                                <input type="text" name="cp_ag_ratio" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    ALP <label class="text-muted small ms-2">IU/L (Low: 44 High: 147)</label>
                                                </label>
                                                <input type="text" name="cp_alp" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    AST <label class="text-muted small ms-2">IU/L (Low: 10 High: 34)</label>
                                                </label>
                                                <input type="text" name="cp_ast" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    TBI <label class="text-muted small ms-2">mg/dL (Low: 0.1 High: 1.9)</label>
                                                </label>
                                                <input type="text" name="cp_tbi" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    BUN <label class="text-muted small ms-2">mg/dL (Low: 10 High: 20)</label>
                                                </label>
                                                <input type="text" name="cp_bun" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    BUN/CREA <label class="text-muted small ms-2">ratio (Low: 10:1 High: 20:1)</label>
                                                </label>
                                                <input type="text" name="cp_bun_crea" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    CA <label class="text-muted small ms-2">mg/dL (Low: 9.0 High: 10.5)</label>
                                                </label>
                                                <input type="text" name="cp_ca" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    CL <label class="text-muted small ms-2">ImEq/L (Low: 98 High: 106)</label>
                                                </label>
                                                <input type="text" name="cp_cl" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Creatinine <label class="text-muted small ms-2">mg/dL (Low: 0.5 High: 1.1)</label>
                                                </label>
                                                <input type="text" name="cp_creatinine" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    GLUC <label class="text-muted small ms-2">mg/dL (Low: 70 High: 99)</label>
                                                </label>
                                                <input type="text" name="cp_gluc" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Phosphorus <label class="text-muted small ms-2">mg/dL (Low: 2.4 High: 4.1)</label>
                                                </label>
                                                <input type="text" name="cp_phosphorus" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    K <label class="text-muted small ms-2">mEq/L (Low: 3.7 High: 5.2)</label>
                                                </label>
                                                <input type="text" name="cp_k" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    ΝΑ <label class="text-muted small ms-2">ImEq/L (Low: 135 High: 145)</label>
                                                </label>
                                                <input type="text" name="cp_na" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Chemistry Panel section End-->

                            <!-- Complete Blood Count (CBC) section start-->
                            <section id="section7" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Hct <label class="text-muted small ms-2">% (Low: 45 High: 52)</label>
                                                </label>
                                                <input type="text" name="cbcr_Hct" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Hgb <label class="text-muted small ms-2">g/dL (Low: 13 High: 18)</label>
                                                </label>
                                                <input type="text" name="cbcr_Hgb" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    MCV <label class="text-muted small ms-2">picograms (Low: 27 High: 32)</label>
                                                </label>
                                                <input type="text" name="cbcr_MCV" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    MCHC <label class="text-muted small ms-2">% (Low: 28 High: 36)</label>
                                                </label>
                                                <input type="text" name="cbcr_MCHC" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    RDW <label class="text-muted small ms-2">% (Low: 11 High: 15)</label>
                                                </label>
                                                <input type="text" name="cbcr_RDW" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    PLT <label class="text-muted small ms-2">mL (Low: 150,000 High: 400,000)</label>
                                                </label>
                                                <input type="text" name="cbcr_PLT" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    MPV <label class="text-muted small ms-2">femtoliters (Low: 7.5 High: 11.5)</label>
                                                </label>
                                                <input type="text" name="cbcr_MPV" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    WBC leukocyte <label class="text-muted small ms-2">cmm (Low: 4,300 High: 10,800)</label>
                                                </label>
                                                <input type="text" name="cbcr_WBC_leukocyte" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    WBC differential Monocytes <label class="text-muted small ms-2">% (Low: 2 High: 8)</label>
                                                </label>
                                                <input type="text" name="cbcr_WBC_differential_Monocytes" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    WBC differential Eosinophils <label class="text-muted small ms-2">% (Low: 1 High: 4)</label>
                                                </label>
                                                <input type="text" name="cbcr_WBC_differential_Eosinophils" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    WBC differential Basophils <label class="text-muted small ms-2">% (Low: 0.5 High: 1)</label>
                                                </label>
                                                <input type="text" name="cbcr_WBC_differential_Basophils" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    WBC differential Neutrophils <label class="text-muted small ms-2">% (Low: 40 High: 60)</label>
                                                </label>
                                                <input type="text" name="cbcr_WBC_differential_Neutrophils" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    WBC differential Lymphocytes <label class="text-muted small ms-2">% (Low: 20 High: 40)</label>
                                                </label>
                                                <input type="text" name="cbcr_WBC_differential_Lymphocytes" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    RBC (red blood cell) erythrocyte count <label class="text-muted small ms-2">cmm (Low: 4.2 million High: 5.9 million)</label>
                                                </label>
                                                <input type="text" name="cbcr_RBC_erythrocyte_count" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Complete Blood Count (CBC) section End-->

                            <!-- Comprehensive Metabolic Panel (CMP47) section start-->
                            <section id="section8" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> GLUC <label class="text-muted small ms-2">Img/dL (Low: 70 High: 99)</label> </label>
                                                <input type="text" name="cmp_gluc" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> BUN <label class="text-muted small ms-2">mg/dL (Low: 10 High: 20)</label> </label>
                                                <input type="text" name="cmp_bun" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Creatinine <label class="text-muted small ms-2">mg/dL (Low: 0.5 High: 1.1)</label> </label>
                                                <input type="text" name="cmp_creatinine" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> CA <label class="text-muted small ms-2">mg/dL (Low: 9.0 High: 10.5)</label> </label>
                                                <input type="text" name="cmp_ca" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> TBI <label class="text-muted small ms-2">mg/dL (Low: 0.1 High: 1.9)</label> </label>
                                                <input type="text" name="cmp_tbi" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> ALP <label class="text-muted small ms-2">IU/L (Low: 44 High: 147)</label> </label>
                                                <input type="text" name="cmp_alp" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> TP <label class="text-muted small ms-2">g/dL (Low: 6.4 High: 8.2)</label> </label>
                                                <input type="text" name="cmp_tp" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> ALT <label class="text-muted small ms-2">IU/L (Low: 8 High: 37)</label> </label>
                                                <input type="text" name="cmp_alt" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> AST <label class="text-muted small ms-2">IU/L (Low: 10 High: 34)</label> </label>
                                                <input type="text" name="cmp_ast" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> A/G ratio <label class="text-muted small ms-2">ratio (Low: 1.01:1 High: 1.2:1)</label> </label>
                                                <input type="text" name="cmp_a_g_ratio" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> BUN/CREA <label class="text-muted small ms-2">ratio (Low: 10:1 High: 20:1)</label> </label>
                                                <input type="text" name="cmp_bun_crea" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> GLOB <label class="text-muted small ms-2">g/dL (Low: 0 High: 0)</label> </label>
                                                <input type="text" name="cmp_glob" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> NA <label class="text-muted small ms-2">mEq/L (Low: 135 High: 145)</label> </label>
                                                <input type="text" name="cmp_na" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> K <label class="text-muted small ms-2">mEq/L (Low: 3.7 High: 5.2)</label> </label>
                                                <input type="text" name="cmp_k" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> CL <label class="text-muted small ms-2">ImEq/L (Low: 98 High: 106)</label> </label>
                                                <input type="text" name="cmp_cl" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> ECO2 <label class="text-muted small ms-2">mmol/L (Low: 21 High: 32)</label> </label>
                                                <input type="text" name="cmp_eco2" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> A GAP </label>
                                                <input type="text" name="cmp_a_gap" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> eGFR <label class="text-muted small ms-2">ml/min/1.73m2</label> </label>
                                                <input type="text" name="cmp_egfr" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Comprehensive Metabolic Panel (CMP47) section End-->

                            <!-- Lipid Panel (2) section start-->
                            <section id="section9" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> CHOLESTEROL <label class="text-muted small ms-2">mg/dL (Low: 0 High: 200)</label> </label>
                                                <input type="text" name="lp_cholesterol" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> HDL <label class="text-muted small ms-2">dL (Low: 60 High: 100)</label> </label>
                                                <input type="text" name="lp_hdl" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> LDL <label class="text-muted small ms-2">mg/dL (Low: 0 High: 100)</label> </label>
                                                <input type="text" name="lp_ldl" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> TRIGYL TOT <label class="text-muted small ms-2">mg/dL (Low: 40 High: 160)</label> </label>
                                                <input type="text" name="lp_trigyl_tot" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> AST <label class="text-muted small ms-2">IU/L (Low: 10 High: 34)</label> </label>
                                                <input type="text" name="lp_ast" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> ALT <label class="text-muted small ms-2">IU/L (Low: 8 High: 37)</label> </label>
                                                <input type="text" name="lp_alt" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Lipid Panel (2) section End-->

                            <!-- Lipid Panel or Lipid Profile section start-->
                            <section id="section10" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> CHOLESTEROL <label class="text-muted small ms-2">mg/dL (Low: 0 High: 200)</label> </label>
                                                <input type="text" name="lpr_cholesterol" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> TRIGYL TOT <label class="text-muted small ms-2">mg/dL (Low: 40 High: 160)</label> </label>
                                                <input type="text" name="lpr_trigyl_tot" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> HDL <label class="text-muted small ms-2">dL (Low: 60 High: 100)</label> </label>
                                                <input type="text" name="lpr_hdl" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> LDL <label class="text-muted small ms-2">mg/dL (Low: 0 High: 100)</label> </label>
                                                <input type="text" name="lpr_ldl" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label"> Total cholesterol/HDL ratio <label class="text-muted small ms-2">ratio (Low: 3.5:1 High: 5:1)</label> </label>
                                                <input type="text" name="lpr_total_cholesterol_hdl_ratio" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Lipid Panel or Lipid Profile section End-->

                            <!-- Normal Blood Gases section start-->
                            <section id="section11" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> pH <label class="text-muted small ms-2">(Low: 7.32 High: 7.45)</label> </label>
                                                <input type="text" name="nbg_ph" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> PaO2 <label class="text-muted small ms-2">mm Hg</label> </label>
                                                <input type="text" name="nbg_pao2" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> HCO3 <label class="text-muted small ms-2">mEq/L</label> </label>
                                                <input type="text" name="nbg_hco3" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> PaCO2 <label class="text-muted small ms-2">mm Hg</label> </label>
                                                <input type="text" name="nbg_paco2" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> B.E. <label class="text-muted small ms-2">mEq/liter (Low: -2 High: +2)</label> </label>
                                                <input type="text" name="nbg_be" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> SaO2 <label class="text-muted small ms-2">%</label> </label>
                                                <input type="text" name="nbg_sao2" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Normal Blood Gases section End-->

                            <!-- RAPIDPoint 500 + ACT section start-->
                            <section id="section12" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> pH <label class="text-muted small ms-2">(Low: 7.32 High: 7.45)</label> </label>
                                                <input type="text" name="ract_ph" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> pC02 <label class="text-muted small ms-2">mmHg</label> </label>
                                                <input type="text" name="ract_pco2" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> pO2 <label class="text-muted small ms-2">mmHg</label> </label>
                                                <input type="text" name="ract_po2" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> HCO3- <label class="text-muted small ms-2">mmol/L</label> </label>
                                                <input type="text" name="ract_hco3" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> BE(B) <label class="text-muted small ms-2">mmol/L</label> </label>
                                                <input type="text" name="ract_be_b" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Hct <label class="text-muted small ms-2">% (Low: 45 High: 52)</label> </label>
                                                <input type="text" name="ract_hct" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> tHb <label class="text-muted small ms-2">g/dL</label> </label>
                                                <input type="text" name="ract_thb" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> S02 <label class="text-muted small ms-2">%</label> </label>
                                                <input type="text" name="ract_so2" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Na+ <label class="text-muted small ms-2">mmol/L</label> </label>
                                                <input type="text" name="ract_na" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> K+ <label class="text-muted small ms-2">mmol/L</label> </label>
                                                <input type="text" name="ract_k" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Ca++ <label class="text-muted small ms-2">mmol/L</label> </label>
                                                <input type="text" name="ract_ca" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Glu <label class="text-muted small ms-2">mg/dL</label> </label>
                                                <input type="text" name="ract_glu" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Lac <label class="text-muted small ms-2">mmol/L</label> </label>
                                                <input type="text" name="ract_lac" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> ACT <label class="text-muted small ms-2">seconds (Low: 70 High: 180)</label> </label>
                                                <input type="text" name="ract_act" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Hep Test Conc <label class="text-muted small ms-2">mg/kg</label> </label>
                                                <input type="text" name="ract_hep_test_conc" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Hep Bolus Indic <label class="text-muted small ms-2">unit</label> </label>
                                                <input type="text" name="ract_hep_bolus_indic" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Hep Maint Indic <label class="text-muted small ms-2">units</label> </label>
                                                <input type="text" name="ract_hep_maint_indic" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Prot Indic <label class="text-muted small ms-2">mg</label> </label>
                                                <input type="text" name="ract_prot_indic" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- RAPIDPoint 500 + ACT section End-->

                            <!-- RAPIDPoint 500 section start-->
                            <section id="section13" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    pH <label class="text-muted small ms-2">(Low: 7.32 High: 7.45)</label>
                                                </label>
                                                <input type="text" name="rapd_pH" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    pC02 <label class="text-muted small ms-2">mmHg</label>
                                                </label>
                                                <input type="text" name="rapd_pCO2" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    pO2 <label class="text-muted small ms-2">ImmHg</label>
                                                </label>
                                                <input type="text" name="rapd_pO2" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    HCO3- <label class="text-muted small ms-2">Immol/L</label>
                                                </label>
                                                <input type="text" name="rapd_HCO3" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    BE(B) <label class="text-muted small ms-2">Immol/L</label>
                                                </label>
                                                <input type="text" name="rapd_BEB" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Hct <label class="text-muted small ms-2">% (Low: 45 High: 52)</label>
                                                </label>
                                                <input type="text" name="rapd_Hct" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    tHb <label class="text-muted small ms-2">g/dL</label>
                                                </label>
                                                <input type="text" name="rapd_tHb" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    sO2 <label class="text-muted small ms-2">%</label>
                                                </label>
                                                <input type="text" name="rapd_sO2" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Na+ <label class="text-muted small ms-2">mmol/L</label>
                                                </label>
                                                <input type="text" name="rapd_Na" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    K+ <label class="text-muted small ms-2">mmol/L</label>
                                                </label>
                                                <input type="text" name="rapd_K" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Ca++ <label class="text-muted small ms-2">mmol/L</label>
                                                </label>
                                                <input type="text" name="rapd_Ca" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Glu <label class="text-muted small ms-2">mg/dL</label>
                                                </label>
                                                <input type="text" name="rapd_Glu" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Lac <label class="text-muted small ms-2">mmol/L</label>
                                                </label>
                                                <input type="text" name="rapd_Lac" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- RAPIDPoint 500 section End-->

                            <!-- Thyroid section start-->
                            <section id="section14" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    TSH <label class="text-muted small ms-2">(Low: 0.3 High: 3)</label>
                                                </label>
                                                <input type="text" name="thy_TSH" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Total T4 <label class="text-muted small ms-2">(Low: 4.5 High: 12.5)</label>
                                                </label>
                                                <input type="text" name="thy_TotalT4" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Free T4 <label class="text-muted small ms-2">(Low: 0.7 High: 2.0)</label>
                                                </label>
                                                <input type="text" name="thy_FreeT4" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Total T3 <label class="text-muted small ms-2">(Low: 80 High: 220)</label>
                                                </label>
                                                <input type="text" name="thy_TotalT3" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Free T3 <label class="text-muted small ms-2">(Low: 2.3 High: 4.2)</label>
                                                </label>
                                                <input type="text" name="thy_FreeT3" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Thyroid section End-->

                            <!-- Vitamin D section start-->
                            <section id="section15" style="display: none;">
                                <div class="row form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Vitamin D <label class="text-muted small ms-2">ng/mL (Low: 30 High: 74)</label>
                                                </label>
                                                <input type="text" name="vitamin_d" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Vitamin D section End-->

                            <div class="col-lg-12 text-end">
                                <button type="submit" class="btn btn-dark" id="submitBtn">Add Patient Lab Results</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="col-12 mt-2">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-end">

                        <button type="button" class="btn waves-effect waves-light mb-2 btn-outline-primary"
                            data-bs-toggle="modal" data-bs-target="#signup-modal">
                            <i class="fas fa-plus"></i> Add Patient Lab Result
                        </button>

                    </div>
                </div>
                <div class="table-responsive">
                    <table id="users-table" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Lab</th>
                                <th>Arterial</th>
                                <th>Temperature</th>
                                <th>Draw Date</th>
                                <th>Draw Time</th>
                                <th>Result Date</th>
                                <th>Result Time</th>
                                <th>Billing Code</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach($viewPLRs as $plr)
                            <tr id="row-{{ $plr->plr_id }}">
                                <td>{{ ++$i }}</td>
                                <td>{{ $plr->lab->l_name ?? 'N/A' }}</td>

                                <td>
                                    @if($plr->c_arterial == 0)
                                    Arterial
                                    @elseif($plr->c_arterial == 1)
                                    Venous
                                    @elseif($plr->c_arterial == 2)
                                    Mixed
                                    @else
                                    N/A
                                    @endif
                                </td>

                                <td>
                                    @if($plr->c_temp == 0)
                                    Alpha-Stat
                                    @elseif($plr->c_temp == 1)
                                    pH-Stat
                                    @else
                                    N/A
                                    @endif
                                </td>

                                <td>{{ $plr->draw_date ?? 'N/A' }}</td>
                                <td>{{ $plr->draw_time ?? 'N/A' }}</td>
                                <td>{{ $plr->result_date ?? 'N/A' }}</td>
                                <td>{{ $plr->result_time ?? 'N/A' }}</td>
                                <td>{{ $plr->billing_code ?? 'N/A' }}</td>
                                <td>{{ $plr->note ?? 'N/A' }}</td>
                                <td>
                                    <a onclick="editPLR({{ json_encode($plr) }})" href="javascript:void(0);">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <a href="javascript:void(0);"
                                        onclick="confirmDelete('{{ route('delete-patient-lab-result', $plr->plr_id) }}', '{{ $plr->plr_id }}')"
                                        class="edit-icon delete-user-btn text-danger">
                                        <i class="fa-solid fa-trash-can-arrow-up"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- /* --------------------------- edit hospital modal -------------------------- */ --}}
<div id="editHospital" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-body ">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h4 class="mb-0"><b>Edit Patient Lab Result</b></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('edit-patient-lab-result') }}" class="mt-4">
                    @csrf
                    <input type="hidden" name="plr_id" id="plr_id">
                    <div class="col-lg-12 mb-2">
                        <label for="pat_id">Select Patient</label>
                        <select name="pat_id" id="editpat_id" class="form-control" required>
                            <option value="">Select Patient</option>
                            @foreach ($patients as $item)
                            <option value="{{ $item->pat_id }}">{{ $item->first_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="">Select Lab</label>
                            <select name="lab_id" id="editlabSelect" class="form-control lab-select">
                                <option value="">Select Lab</option>
                                @foreach ($viewLabs as $lab)
                                <option value="{{ $lab->l_id }}">{{ $lab->l_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row form-group mb-3">
                        <div class="col-lg-6">
                            <div class="col-md-12">
                                <label for="">Arterial</label>
                            </div>
                            <div class="col-md-12 d-flex">
                                <label class="me-3">
                                    <input type="radio" name="c_arterial" id="editc_arterial_0" value="0" />
                                    <span>Arterial</span>
                                </label>
                                <label class="me-3">
                                    <input type="radio" name="c_arterial" id="editc_arterial_1" value="1" />
                                    <span>Venous</span>
                                </label>
                                <label class="me-3">
                                    <input type="radio" name="c_arterial" id="editc_arterial_2" value="2" />
                                    <span>Mixed</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="col-md-12">
                                <label for="">Temperature</label>
                            </div>
                            <div class="col-md-12 d-flex">
                                <label class="me-3">
                                    <input type="radio" name="c_temp" id="editc_temp_0" value="0" />
                                    <span>Alpha-Stat</span>
                                </label>
                                <label class="me-3">
                                    <input type="radio" name="c_temp" id="editc_temp_1" value="1" />
                                    <span>pH-Stat</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group mb-3">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Draw Date</label>
                                <input type="date" id="edit_draw_date" name="draw_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Draw Time</label>
                                <input type="time" id="edit_draw_time" name="draw_time" class="form-control" value="{{ now()->format('H:i') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group mb-3">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Result Date</label>
                                <input type="date" id="edit_result_date" name="result_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Result Time</label>
                                <input type="time" id="edit_result_time" name="result_time" class="form-control" value="{{ now()->format('H:i') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group mb-3">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Billing Code</label>
                                <input type="text" id="edit_billing_code" name="billing_code" class="form-control" value="" maxlength="30">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group mb-3">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Note</label>
                                <textarea id="edit_note" name="note" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <section id="editsection1" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            ACT <label class="text-muted small ms-2">(seconds, Low: 70 High: 180)</label>
                                        </label>
                                        <input type="text" name="act_act" id="edit_act_act" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Hep Test Conc <label class="text-muted small ms-2">mg/kg</label>
                                        </label>
                                        <input type="text" name="act_hep_test_conc" id="edit_act_hep_test_conc" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Hep Bolus Indic <label class="text-muted small ms-2">unit</label>
                                        </label>
                                        <input type="text" name="act_hep_bolus_indic" id="edit_act_hep_bolus_indic" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Hep Maint Indic <label class="text-muted small ms-2">units</label>
                                        </label>
                                        <input type="text" name="act_hep_maint_indic" id="edit_act_hep_maint_indic" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Prot Indic <label class="text-muted small ms-2">mg</label>
                                        </label>
                                        <input type="text" name="act_prot_indic" id="edit_act_prot_indic" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="editsection2" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            PH <label class="text-muted small ms-2">(Low: 7.32 High: 7.45)</label>
                                        </label>
                                        <input type="text" name="bg_ph" id="edit_bg_ph" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            pO2 <label class="text-muted small ms-2">ImmHg</label>
                                        </label>
                                        <input type="text" name="bg_p02" id="edit_bg_p02" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            pCO2 <label class="text-muted small ms-2">ImmHg</label>
                                        </label>
                                        <input type="text" name="bg_pco2" id="edit_bg_pco2" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Ca++ <label class="text-muted small ms-2">Immol/L</label>
                                        </label>
                                        <input type="text" name="bg_ca" id="edit_bg_ca" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            K+ <label class="text-muted small ms-2">Immol/L</label>
                                        </label>
                                        <input type="text" name="bg_k" id="edit_bg_k" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            tHb <label class="text-muted small ms-2">g/dL</label>
                                        </label>
                                        <input type="text" name="bg_thb" id="edit_bg_thb" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            SO2 <label class="text-muted small ms-2">%</label>
                                        </label>
                                        <input type="text" name="bg_so2" id="edit_bg_so2" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Lactate <label class="text-muted small ms-2">mmol/L (Low: 0.5 High: 2.0)</label>
                                        </label>
                                        <input type="text" name="bg_lactate" id="edit_bg_lactate" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            HCT <label class="text-muted small ms-2">% (Low: 45 High: 52)</label>
                                        </label>
                                        <input type="text" name="bg_hct" id="edit_bg_hct" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="editsection3" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            GLUC <label class="text-muted small ms-2">mg/dL (Low: 70 High: 99)</label>
                                        </label>
                                        <input type="text" name="bs_gluc" id="edit_bs_gluc" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="editsection4" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            WBC <label class="text-muted small ms-2">K/ul (Low: 4.23 High: 9.07)</label>
                                        </label>
                                        <input type="text" name="cbc_wbc" id="edit_cbc_wbc" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Hgb <label class="text-muted small ms-2">g/dL (Low: 13 High: 18)</label>
                                        </label>
                                        <input type="text" name="cbc_hgb" id="edit_cbc_hgb" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Hct <label class="text-muted small ms-2">% (Low: 45 High: 52)</label>
                                        </label>
                                        <input type="text" name="cbc_hct" id="edit_cbc_hct" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            MCV <label class="text-muted small ms-2">picograms (Low: 27 High: 32)</label>
                                        </label>
                                        <input type="text" name="cbc_mcv" id="edit_cbc_mcv" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            MCH <label class="text-muted small ms-2">pg (Low: 25.7 High: 32.2)</label>
                                        </label>
                                        <input type="text" name="cbc_mch" id="edit_cbc_mch" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            MCHC <label class="text-muted small ms-2">% (Low: 28 High: 36)</label>
                                        </label>
                                        <input type="text" name="cbc_mchc" id="edit_cbc_mchc" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            RDW <label class="text-muted small ms-2">% (Low: 11 High: 15)</label>
                                        </label>
                                        <input type="text" name="cbc_rdw" id="edit_cbc_rdw" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            PLT <label class="text-muted small ms-2">mL (Low: 150,000 High: 400,000)</label>
                                        </label>
                                        <input type="text" name="cbc_plt" id="edit_cbc_plt" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            MPV <label class="text-muted small ms-2">femtoliters (Low: 7.5 High: 11.5)</label>
                                        </label>
                                        <input type="text" name="cbc_mpv" id="edit_cbc_mpv" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            RBC (red blood cell) erythrocyte count <label class="text-muted small ms-2">cmm (Low: 4.2 million High: 5.9 million)</label>
                                        </label>
                                        <input type="text" name="cbc_rbc" id="edit_cbc_rbc" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="editsection5" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            PH <label class="text-muted small ms-2">(Low: 7.32 High: 7.45)</label>
                                        </label>
                                        <input type="text" name="cdi_ph" id="edit_cdi_ph" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            PaCO2 <label class="text-muted small ms-2">mm Hg</label>
                                        </label>
                                        <input type="text" name="cdi_paco2" id="edit_cdi_paco2" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            PaO2 <label class="text-muted small ms-2">mm Hg</label>
                                        </label>
                                        <input type="text" name="cdi_pao2" id="edit_cdi_pao2" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            T <label class="text-muted small ms-2">F</label>
                                        </label>
                                        <input type="text" name="cdi_t" id="edit_cdi_t" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            HCO3 <label class="text-muted small ms-2">mEq/L</label>
                                        </label>
                                        <input type="text" name="cdi_hco3" id="edit_cdi_hco3" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            B.E. <label class="text-muted small ms-2">ImEq/liter (Low: -2 High: +2)</label>
                                        </label>
                                        <input type="text" name="cdi_be" id="edit_cdi_be" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            SaO2 <label class="text-muted small ms-2">%</label>
                                        </label>
                                        <input type="text" name="cdi_sao2" id="edit_cdi_sao2" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            K+ <label class="text-muted small ms-2">Immol/L</label>
                                        </label>
                                        <input type="text" name="cdi_k" id="edit_cdi_k" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            S02 <label class="text-muted small ms-2">%</label>
                                        </label>
                                        <input type="text" name="cdi_so2" id="edit_cdi_so2" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Hct <label class="text-muted small ms-2">% (Low: 45 High: 52)</label>
                                        </label>
                                        <input type="text" name="cdi_hct" id="edit_cdi_hct" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Hgb <label class="text-muted small ms-2">g/dL (Low: 13 High: 18)</label>
                                        </label>
                                        <input type="text" name="cdi_hgb" id="edit_cdi_hgb" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="editsection6" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            ALT <label class="text-muted small ms-2">IU/L (Low: 8 High: 37)</label>
                                        </label>
                                        <input type="text" name="cp_alt" id="edit_cp_alt" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Albumin <label class="text-muted small ms-2">g/dL (Low: 3.9 High: 5.0)</label>
                                        </label>
                                        <input type="text" name="cp_albumin" id="edit_cp_albumin" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            A/G ratio <label class="text-muted small ms-2">ratio (Low: 1.01:1 High: 1.2:1)</label>
                                        </label>
                                        <input type="text" name="cp_ag_ratio" id="edit_cp_ag_ratio" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            ALP <label class="text-muted small ms-2">IU/L (Low: 44 High: 147)</label>
                                        </label>
                                        <input type="text" name="cp_alp" id="edit_cp_alp" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            AST <label class="text-muted small ms-2">IU/L (Low: 10 High: 34)</label>
                                        </label>
                                        <input type="text" name="cp_ast" id="edit_cp_ast" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            TBI <label class="text-muted small ms-2">mg/dL (Low: 0.1 High: 1.9)</label>
                                        </label>
                                        <input type="text" name="cp_tbi" id="edit_cp_tbi" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            BUN <label class="text-muted small ms-2">mg/dL (Low: 10 High: 20)</label>
                                        </label>
                                        <input type="text" name="cp_bun" id="edit_cp_bun" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            BUN/CREA <label class="text-muted small ms-2">ratio (Low: 10:1 High: 20:1)</label>
                                        </label>
                                        <input type="text" name="cp_bun_crea" id="edit_cp_bun_crea" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            CA <label class="text-muted small ms-2">mg/dL (Low: 9.0 High: 10.5)</label>
                                        </label>
                                        <input type="text" name="cp_ca" id="edit_cp_ca" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            CL <label class="text-muted small ms-2">ImEq/L (Low: 98 High: 106)</label>
                                        </label>
                                        <input type="text" name="cp_cl" id="edit_cp_cl" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Creatinine <label class="text-muted small ms-2">mg/dL (Low: 0.5 High: 1.1)</label>
                                        </label>
                                        <input type="text" name="cp_creatinine" id="edit_cp_creatinine" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            GLUC <label class="text-muted small ms-2">mg/dL (Low: 70 High: 99)</label>
                                        </label>
                                        <input type="text" name="cp_gluc" id="edit_cp_gluc" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Phosphorus <label class="text-muted small ms-2">mg/dL (Low: 2.4 High: 4.1)</label>
                                        </label>
                                        <input type="text" name="cp_phosphorus" id="edit_cp_phosphorus" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            K <label class="text-muted small ms-2">mEq/L (Low: 3.7 High: 5.2)</label>
                                        </label>
                                        <input type="text" name="cp_k" id="edit_cp_k" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            ΝΑ <label class="text-muted small ms-2">ImEq/L (Low: 135 High: 145)</label>
                                        </label>
                                        <input type="text" name="cp_na" id="edit_cp_na" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="editsection7" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Hct <label class="text-muted small ms-2">% (Low: 45 High: 52)</label>
                                        </label>
                                        <input type="text" name="cbcr_Hct" id="edit_cbcr_Hct" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Hgb <label class="text-muted small ms-2">g/dL (Low: 13 High: 18)</label>
                                        </label>
                                        <input type="text" name="cbcr_Hgb" id="edit_cbcr_Hgb" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            MCV <label class="text-muted small ms-2">picograms (Low: 27 High: 32)</label>
                                        </label>
                                        <input type="text" name="cbcr_MCV" id="edit_cbcr_MCV" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            MCHC <label class="text-muted small ms-2">% (Low: 28 High: 36)</label>
                                        </label>
                                        <input type="text" name="cbcr_MCHC" id="edit_cbcr_MCHC" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            RDW <label class="text-muted small ms-2">% (Low: 11 High: 15)</label>
                                        </label>
                                        <input type="text" name="cbcr_RDW" id="edit_cbcr_RDW" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            PLT <label class="text-muted small ms-2">mL (Low: 150,000 High: 400,000)</label>
                                        </label>
                                        <input type="text" name="cbcr_PLT" id="edit_cbcr_PLT" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            MPV <label class="text-muted small ms-2">femtoliters (Low: 7.5 High: 11.5)</label>
                                        </label>
                                        <input type="text" name="cbcr_MPV" id="edit_cbcr_MPV" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            WBC leukocyte <label class="text-muted small ms-2">cmm (Low: 4,300 High: 10,800)</label>
                                        </label>
                                        <input type="text" name="cbcr_WBC_leukocyte" id="edit_cbcr_WBC_leukocyte" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            WBC differential Monocytes <label class="text-muted small ms-2">% (Low: 2 High: 8)</label>
                                        </label>
                                        <input type="text" name="cbcr_WBC_differential_Monocytes" id="edit_cbcr_WBC_differential_Monocytes" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            WBC differential Eosinophils <label class="text-muted small ms-2">% (Low: 1 High: 4)</label>
                                        </label>
                                        <input type="text" name="cbcr_WBC_differential_Eosinophils" id="edit_cbcr_WBC_differential_Eosinophils" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            WBC differential Basophils <label class="text-muted small ms-2">% (Low: 0.5 High: 1)</label>
                                        </label>
                                        <input type="text" name="cbcr_WBC_differential_Basophils" id="edit_cbcr_WBC_differential_Basophils" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            WBC differential Neutrophils <label class="text-muted small ms-2">% (Low: 40 High: 60)</label>
                                        </label>
                                        <input type="text" name="cbcr_WBC_differential_Neutrophils" id="edit_cbcr_WBC_differential_Neutrophils" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            WBC differential Lymphocytes <label class="text-muted small ms-2">% (Low: 20 High: 40)</label>
                                        </label>
                                        <input type="text" name="cbcr_WBC_differential_Lymphocytes" id="edit_cbcr_WBC_differential_Lymphocytes" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            RBC (red blood cell) erythrocyte count <label class="text-muted small ms-2">cmm (Low: 4.2 million High: 5.9 million)</label>
                                        </label>
                                        <input type="text" name="cbcr_RBC_erythrocyte_count" id="edit_cbcr_RBC_erythrocyte_count" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="editsection8" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> GLUC <label class="text-muted small ms-2">Img/dL (Low: 70 High: 99)</label> </label>
                                        <input type="text" name="cmp_gluc" id="edit_cmp_gluc" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> BUN <label class="text-muted small ms-2">mg/dL (Low: 10 High: 20)</label> </label>
                                        <input type="text" name="cmp_bun" id="edit_cmp_bun" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> Creatinine <label class="text-muted small ms-2">mg/dL (Low: 0.5 High: 1.1)</label> </label>
                                        <input type="text" name="cmp_creatinine" id="edit_cmp_creatinine" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> CA <label class="text-muted small ms-2">mg/dL (Low: 9.0 High: 10.5)</label> </label>
                                        <input type="text" name="cmp_ca" id="edit_cmp_ca" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> TBI <label class="text-muted small ms-2">mg/dL (Low: 0.1 High: 1.9)</label> </label>
                                        <input type="text" name="cmp_tbi" id="edit_cmp_tbi" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> ALP <label class="text-muted small ms-2">IU/L (Low: 44 High: 147)</label> </label>
                                        <input type="text" name="cmp_alp" id="edit_cmp_alp" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> TP <label class="text-muted small ms-2">g/dL (Low: 6.4 High: 8.2)</label> </label>
                                        <input type="text" name="cmp_tp" id="edit_cmp_tp" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> ALT <label class="text-muted small ms-2">IU/L (Low: 8 High: 37)</label> </label>
                                        <input type="text" name="cmp_alt" id="edit_cmp_alt" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> AST <label class="text-muted small ms-2">IU/L (Low: 10 High: 34)</label> </label>
                                        <input type="text" name="cmp_ast" id="edit_cmp_ast" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> A/G ratio <label class="text-muted small ms-2">ratio (Low: 1.01:1 High: 1.2:1)</label> </label>
                                        <input type="text" name="cmp_a_g_ratio" id="edit_cmp_a_g_ratio" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> BUN/CREA <label class="text-muted small ms-2">ratio (Low: 10:1 High: 20:1)</label> </label>
                                        <input type="text" name="cmp_bun_crea" id="edit_cmp_bun_crea" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> GLOB <label class="text-muted small ms-2">g/dL (Low: 0 High: 0)</label> </label>
                                        <input type="text" name="cmp_glob" id="edit_cmp_glob" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> NA <label class="text-muted small ms-2">mEq/L (Low: 135 High: 145)</label> </label>
                                        <input type="text" name="cmp_na" id="edit_cmp_na" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> K <label class="text-muted small ms-2">mEq/L (Low: 3.7 High: 5.2)</label> </label>
                                        <input type="text" name="cmp_k" id="edit_cmp_k" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> CL <label class="text-muted small ms-2">ImEq/L (Low: 98 High: 106)</label> </label>
                                        <input type="text" name="cmp_cl" id="edit_cmp_cl" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> ECO2 <label class="text-muted small ms-2">mmol/L (Low: 21 High: 32)</label> </label>
                                        <input type="text" name="cmp_eco2" id="edit_cmp_eco2" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> A GAP </label>
                                        <input type="text" name="cmp_a_gap" id="edit_cmp_a_gap" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> eGFR <label class="text-muted small ms-2">ml/min/1.73m2</label> </label>
                                        <input type="text" name="cmp_egfr" id="edit_cmp_egfr" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="editsection9" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> CHOLESTEROL <label class="text-muted small ms-2">mg/dL (Low: 0 High: 200)</label> </label>
                                        <input type="text" id="edit_lp_cholesterol" name="lp_cholesterol" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> HDL <label class="text-muted small ms-2">dL (Low: 60 High: 100)</label> </label>
                                        <input type="text" id="edit_lp_hdl" name="lp_hdl" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> LDL <label class="text-muted small ms-2">mg/dL (Low: 0 High: 100)</label> </label>
                                        <input type="text" id="edit_lp_ldl" name="lp_ldl" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> TRIGYL TOT <label class="text-muted small ms-2">mg/dL (Low: 40 High: 160)</label> </label>
                                        <input type="text" id="edit_lp_trigyl_tot" name="lp_trigyl_tot" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> AST <label class="text-muted small ms-2">IU/L (Low: 10 High: 34)</label> </label>
                                        <input type="text" id="edit_lp_ast" name="lp_ast" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> ALT <label class="text-muted small ms-2">IU/L (Low: 8 High: 37)</label> </label>
                                        <input type="text" id="edit_lp_alt" name="lp_alt" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="editsection10" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> CHOLESTEROL <label class="text-muted small ms-2">mg/dL (Low: 0 High: 200)</label> </label>
                                        <input type="text" id="edit_lpr_cholesterol" name="lpr_cholesterol" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> TRIGYL TOT <label class="text-muted small ms-2">mg/dL (Low: 40 High: 160)</label> </label>
                                        <input type="text" id="edit_lpr_trigyl_tot" name="lpr_trigyl_tot" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> HDL <label class="text-muted small ms-2">dL (Low: 60 High: 100)</label> </label>
                                        <input type="text" id="edit_lpr_hdl" name="lpr_hdl" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> LDL <label class="text-muted small ms-2">mg/dL (Low: 0 High: 100)</label> </label>
                                        <input type="text" id="edit_lpr_ldl" name="lpr_ldl" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label"> Total cholesterol/HDL ratio <label class="text-muted small ms-2">ratio (Low: 3.5:1 High: 5:1)</label> </label>
                                        <input type="text" id="edit_lpr_total_cholesterol_hdl_ratio" name="lpr_total_cholesterol_hdl_ratio" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="editsection11" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> pH <label class="text-muted small ms-2">(Low: 7.32 High: 7.45)</label> </label>
                                        <input type="text" id="edit_nbg_ph" name="nbg_ph" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> PaO2 <label class="text-muted small ms-2">mm Hg</label> </label>
                                        <input type="text" id="edit_nbg_pao2" name="nbg_pao2" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> HCO3 <label class="text-muted small ms-2">mEq/L</label> </label>
                                        <input type="text" id="edit_nbg_hco3" name="nbg_hco3" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> PaCO2 <label class="text-muted small ms-2">mm Hg</label> </label>
                                        <input type="text" id="edit_nbg_paco2" name="nbg_paco2" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> B.E. <label class="text-muted small ms-2">mEq/liter (Low: -2 High: +2)</label> </label>
                                        <input type="text" id="edit_nbg_be" name="nbg_be" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> SaO2 <label class="text-muted small ms-2">%</label> </label>
                                        <input type="text" id="edit_nbg_sao2" name="nbg_sao2" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="editsection12" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> pH <label class="text-muted small ms-2">(Low: 7.32 High: 7.45)</label> </label>
                                        <input type="text" id="edit_ract_ph" name="ract_ph" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> pCO2 <label class="text-muted small ms-2">mmHg</label> </label>
                                        <input type="text" id="edit_ract_pco2" name="ract_pco2" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> pO2 <label class="text-muted small ms-2">mmHg</label> </label>
                                        <input type="text" id="edit_ract_po2" name="ract_po2" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> HCO3- <label class="text-muted small ms-2">mmol/L</label> </label>
                                        <input type="text" id="edit_ract_hco3" name="ract_hco3" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> BE(B) <label class="text-muted small ms-2">mmol/L</label> </label>
                                        <input type="text" id="edit_ract_be_b" name="ract_be_b" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> Hct <label class="text-muted small ms-2">% (Low: 45 High: 52)</label> </label>
                                        <input type="text" id="edit_ract_hct" name="ract_hct" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> tHb <label class="text-muted small ms-2">g/dL</label> </label>
                                        <input type="text" id="edit_ract_thb" name="ract_thb" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> SO2 <label class="text-muted small ms-2">%</label> </label>
                                        <input type="text" id="edit_ract_so2" name="ract_so2" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> Na+ <label class="text-muted small ms-2">mmol/L</label> </label>
                                        <input type="text" id="edit_ract_na" name="ract_na" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> K+ <label class="text-muted small ms-2">mmol/L</label> </label>
                                        <input type="text" id="edit_ract_k" name="ract_k" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> Ca++ <label class="text-muted small ms-2">mmol/L</label> </label>
                                        <input type="text" id="edit_ract_ca" name="ract_ca" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> Glu <label class="text-muted small ms-2">mg/dL</label> </label>
                                        <input type="text" id="edit_ract_glu" name="ract_glu" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="editsection13" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            pH <label class="text-muted small ms-2">(Low: 7.32 High: 7.45)</label>
                                        </label>
                                        <input type="text" name="rapd_pH" id="edit_rapd_pH" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            pCO2 <label class="text-muted small ms-2">mmHg</label>
                                        </label>
                                        <input type="text" name="rapd_pCO2" id="edit_rapd_pCO2" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            pO2 <label class="text-muted small ms-2">mmHg</label>
                                        </label>
                                        <input type="text" name="rapd_pO2" id="edit_rapd_pO2" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            HCO3- <label class="text-muted small ms-2">mmol/L</label>
                                        </label>
                                        <input type="text" name="rapd_HCO3" id="edit_rapd_HCO3" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            BE(B) <label class="text-muted small ms-2">mmol/L</label>
                                        </label>
                                        <input type="text" name="rapd_BEB" id="edit_rapd_BEB" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Hct <label class="text-muted small ms-2">% (Low: 45 High: 52)</label>
                                        </label>
                                        <input type="text" name="rapd_Hct" id="edit_rapd_Hct" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            tHb <label class="text-muted small ms-2">g/dL</label>
                                        </label>
                                        <input type="text" name="rapd_tHb" id="edit_rapd_tHb" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            sO2 <label class="text-muted small ms-2">%</label>
                                        </label>
                                        <input type="text" name="rapd_sO2" id="edit_rapd_sO2" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Na+ <label class="text-muted small ms-2">mmol/L</label>
                                        </label>
                                        <input type="text" name="rapd_Na" id="edit_rapd_Na" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            K+ <label class="text-muted small ms-2">mmol/L</label>
                                        </label>
                                        <input type="text" name="rapd_K" id="edit_rapd_K" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Ca++ <label class="text-muted small ms-2">mmol/L</label>
                                        </label>
                                        <input type="text" name="rapd_Ca" id="edit_rapd_Ca" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Glu <label class="text-muted small ms-2">mg/dL</label>
                                        </label>
                                        <input type="text" name="rapd_Glu" id="edit_rapd_Glu" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Lac <label class="text-muted small ms-2">mmol/L</label>
                                        </label>
                                        <input type="text" name="rapd_Lac" id="edit_rapd_Lac" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="editsection14" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            TSH <label class="text-muted small ms-2">(Low: 0.3 High: 3)</label>
                                        </label>
                                        <input type="text" id="edit_thy_TSH" name="thy_TSH" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Total T4 <label class="text-muted small ms-2">(Low: 4.5 High: 12.5)</label>
                                        </label>
                                        <input type="text" id="edit_thy_TotalT4" name="thy_TotalT4" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Free T4 <label class="text-muted small ms-2">(Low: 0.7 High: 2.0)</label>
                                        </label>
                                        <input type="text" id="edit_thy_FreeT4" name="thy_FreeT4" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Total T3 <label class="text-muted small ms-2">(Low: 80 High: 220)</label>
                                        </label>
                                        <input type="text" id="edit_thy_TotalT3" name="thy_TotalT3" class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Free T3 <label class="text-muted small ms-2">(Low: 2.3 High: 4.2)</label>
                                        </label>
                                        <input type="text" id="edit_thy_FreeT3" name="thy_FreeT3" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="editsection15" style="display: none;">
                        <div class="row form-group mb-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Vitamin D <label class="text-muted small ms-2">ng/mL (Low: 30 High: 74)</label>
                                        </label>
                                        <input type="text" id="edit_vitamin_d" name="vitamin_d" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn w-100 btn-dark" id="submitBtn">
                            Add Patient Lab Result
                        </button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

@endsection
@section('script')

<script>
    $(document).ready(function() {
    console.log("jQuery Loaded");

    let previousLabId = null;
    $(".lab-section").hide();

    $(".lab-select").change(function() {
        let selectedValue = parseInt($(this).val()) || 0;
        console.log("Selected Lab ID:", selectedValue);

        hidePreviousSection();
        showSection(selectedValue);
    });

    function showSection(lab_id) {
        console.log("Showing section for Lab ID:", lab_id);
        if (lab_id >= 1 && lab_id <= 15) {
            $("#editsection" + lab_id).fadeIn(500);
            previousLabId = lab_id;
        } else {
            console.log("No matching section found!");
        }
    }

    function hidePreviousSection() {
        if (previousLabId !== null) {
            console.log("Hiding previous section for Lab ID:", previousLabId);
            $("#editsection" + previousLabId).hide();
        }
    }
});

</script>


<script>
    function editPLR(plr) {
        document.getElementById("plr_id").value = plr.plr_id;
        document.getElementById("editpat_id").value = plr.pat_id;

        // showSection(plr.lab_id);
        // ✅ Previous opened section hide karna zaroori hai
        // $(".lab-section").hide();

        // // ✅ Show correct section
        // showSection(plr.lab_id);

        document.getElementById("editc_arterial_0").checked = plr.c_arterial == 0;
        document.getElementById("editc_arterial_1").checked = plr.c_arterial == 1;
        document.getElementById("editc_arterial_2").checked = plr.c_arterial == 2;
        document.getElementById("editc_temp_0").checked = plr.c_temp == 0;
        document.getElementById("editc_temp_1").checked = plr.c_temp == 1;

        document.getElementById("edit_draw_date").value = plr.draw_date;
        document.getElementById("edit_draw_time").value = plr.draw_time;
        document.getElementById("edit_result_date").value = plr.result_date;
        document.getElementById("edit_result_time").value = plr.result_time;
        document.getElementById("edit_billing_code").value = plr.billing_code;
        document.getElementById("edit_note").value = plr.note;

        // ✅ Fill Section 1
        document.getElementById("edit_act_act").value = plr.act_act || "";
        document.getElementById("edit_act_hep_test_conc").value = plr.act_hep_test_conc || "";
        document.getElementById("edit_act_hep_bolus_indic").value = plr.act_hep_bolus_indic || "";
        document.getElementById("edit_act_hep_maint_indic").value = plr.act_hep_maint_indic || "";
        document.getElementById("edit_act_prot_indic").value = plr.act_prot_indic || "";

        // // ✅ Fill Section 2
        document.getElementById("edit_bg_ph").value = plr.bg_ph || "";
        document.getElementById("edit_bg_p02").value = plr.bg_p02 || "";
        document.getElementById("edit_bg_pco2").value = plr.bg_pco2 || "";
        document.getElementById("edit_bg_ca").value = plr.bg_ca || "";
        document.getElementById("edit_bg_k").value = plr.bg_k || "";
        document.getElementById("edit_bg_thb").value = plr.bg_thb || "";
        document.getElementById("edit_bg_so2").value = plr.bg_so2 || "";
        document.getElementById("edit_bg_lactate").value = plr.bg_lactate || "";
        document.getElementById("edit_bg_hct").value = plr.bg_hct || "";

        // // ✅ Fill Section 3
        document.getElementById("edit_bs_gluc").value = plr.bs_gluc || "";

        // // ✅ Fill Section 4
        document.getElementById("edit_cbc_wbc").value = plr.cbc_wbc || "";
        document.getElementById("edit_cbc_hgb").value = plr.cbc_hgb || "";
        document.getElementById("edit_cbc_hct").value = plr.cbc_hct || "";
        document.getElementById("edit_cbc_mcv").value = plr.cbc_mcv || "";
        document.getElementById("edit_cbc_mch").value = plr.cbc_mch || "";
        document.getElementById("edit_cbc_mchc").value = plr.cbc_mchc || "";
        document.getElementById("edit_cbc_rdw").value = plr.cbc_rdw || "";
        document.getElementById("edit_cbc_plt").value = plr.cbc_plt || "";
        document.getElementById("edit_cbc_mpv").value = plr.cbc_mpv || "";
        document.getElementById("edit_cbc_rbc").value = plr.cbc_rbc || "";

        // // ✅ Fill Section 5
        document.getElementById("edit_cdi_ph").value = plr.cdi_ph || "";
        document.getElementById("edit_cdi_paco2").value = plr.cdi_paco2 || "";
        document.getElementById("edit_cdi_pao2").value = plr.cdi_pao2 || "";
        document.getElementById("edit_cdi_t").value = plr.cdi_t || "";
        document.getElementById("edit_cdi_hco3").value = plr.cdi_hco3 || "";
        document.getElementById("edit_cdi_be").value = plr.cdi_be || "";
        document.getElementById("edit_cdi_sao2").value = plr.cdi_sao2 || "";
        document.getElementById("edit_cdi_k").value = plr.cdi_k || "";
        document.getElementById("edit_cdi_so2").value = plr.cdi_so2 || "";
        document.getElementById("edit_cdi_hct").value = plr.cdi_hct || "";
        document.getElementById("edit_cdi_hgb").value = plr.cdi_hgb || "";

        // ✅ Fill Section 6
        document.getElementById("edit_cp_alt").value = plr.cp_alt || "";
        document.getElementById("edit_cp_albumin").value = plr.cp_albumin || "";
        document.getElementById("edit_cp_ag_ratio").value = plr.cp_ag_ratio || "";
        document.getElementById("edit_cp_alp").value = plr.cp_alp || "";
        document.getElementById("edit_cp_ast").value = plr.cp_ast || "";
        document.getElementById("edit_cp_tbi").value = plr.cp_tbi || "";
        document.getElementById("edit_cp_bun").value = plr.cp_bun || "";
        document.getElementById("edit_cp_bun_crea").value = plr.cp_bun_crea || "";
        document.getElementById("edit_cp_ca").value = plr.cp_ca || "";
        document.getElementById("edit_cp_cl").value = plr.cp_cl || "";
        document.getElementById("edit_cp_creatinine").value = plr.cp_creatinine || "";
        document.getElementById("edit_cp_gluc").value = plr.cp_gluc || "";
        document.getElementById("edit_cp_phosphorus").value = plr.cp_phosphorus || "";
        document.getElementById("edit_cp_k").value = plr.cp_k || "";
        document.getElementById("edit_cp_na").value = plr.cp_na || "";

        // // ✅ Fill Section 7
        document.getElementById("edit_cbcr_Hct").value = plr.cbcr_Hct || "";
        document.getElementById("edit_cbcr_Hgb").value = plr.cbcr_Hgb || "";
        document.getElementById("edit_cbcr_MCV").value = plr.cbcr_MCV || "";
        document.getElementById("edit_cbcr_MCHC").value = plr.cbcr_MCHC || "";
        document.getElementById("edit_cbcr_RDW").value = plr.cbcr_RDW || "";
        document.getElementById("edit_cbcr_PLT").value = plr.cbcr_PLT || "";
        document.getElementById("edit_cbcr_MPV").value = plr.cbcr_MPV || "";
        document.getElementById("edit_cbcr_WBC_leukocyte").value = plr.cbcr_WBC_leukocyte || "";
        document.getElementById("edit_cbcr_WBC_differential_Monocytes").value = plr.cbcr_WBC_differential_Monocytes || "";
        document.getElementById("edit_cbcr_WBC_differential_Eosinophils").value = plr.cbcr_WBC_differential_Eosinophils || "";
        document.getElementById("edit_cbcr_WBC_differential_Basophils").value = plr.cbcr_WBC_differential_Basophils || "";
        document.getElementById("edit_cbcr_WBC_differential_Neutrophils").value = plr.cbcr_WBC_differential_Neutrophils || "";
        document.getElementById("edit_cbcr_WBC_differential_Lymphocytes").value = plr.cbcr_WBC_differential_Lymphocytes || "";
        document.getElementById("edit_cbcr_RBC_erythrocyte_count").value = plr.cbcr_RBC_erythrocyte_count || "";

        // ✅ Fill Section 8
        document.getElementById("edit_cmp_gluc").value = plr.cmp_gluc || "";
        document.getElementById("edit_cmp_bun").value = plr.cmp_bun || "";
        document.getElementById("edit_cmp_creatinine").value = plr.cmp_creatinine || "";
        document.getElementById("edit_cmp_ca").value = plr.cmp_ca || "";
        document.getElementById("edit_cmp_tbi").value = plr.cmp_tbi || "";
        document.getElementById("edit_cmp_alp").value = plr.cmp_alp || "";
        document.getElementById("edit_cmp_tp").value = plr.cmp_tp || "";
        document.getElementById("edit_cmp_alt").value = plr.cmp_alt || "";
        document.getElementById("edit_cmp_ast").value = plr.cmp_ast || "";
        document.getElementById("edit_cmp_a_g_ratio").value = plr.cmp_a_g_ratio || "";
        document.getElementById("edit_cmp_bun_crea").value = plr.cmp_bun_crea || "";
        document.getElementById("edit_cmp_glob").value = plr.cmp_glob || "";
        document.getElementById("edit_cmp_na").value = plr.cmp_na || "";
        document.getElementById("edit_cmp_k").value = plr.cmp_k || "";
        document.getElementById("edit_cmp_cl").value = plr.cmp_cl || "";
        document.getElementById("edit_cmp_eco2").value = plr.cmp_eco2 || "";
        document.getElementById("edit_cmp_a_gap").value = plr.cmp_a_gap || "";
        document.getElementById("edit_cmp_egfr").value = plr.cmp_egfr || "";

        // ✅ Fill Section 9
        document.getElementById("edit_lp_cholesterol").value = plr.lp_cholesterol || "";
        document.getElementById("edit_lp_hdl").value = plr.lp_hdl || "";
        document.getElementById("edit_lp_ldl").value = plr.lp_ldl || "";
        document.getElementById("edit_lp_trigyl_tot").value = plr.lp_trigyl_tot || "";
        document.getElementById("edit_lp_ast").value = plr.lp_ast || "";
        document.getElementById("edit_lp_alt").value = plr.lp_alt || "";

        // ✅ Fill Section 10
        document.getElementById("edit_lpr_cholesterol").value = plr.lpr_cholesterol || "";
        document.getElementById("edit_lpr_trigyl_tot").value = plr.lpr_trigyl_tot || "";
        document.getElementById("edit_lpr_hdl").value = plr.lpr_hdl || "";
        document.getElementById("edit_lpr_ldl").value = plr.lpr_ldl || "";
        document.getElementById("edit_lpr_total_cholesterol_hdl_ratio").value = plr.lpr_total_cholesterol_hdl_ratio || "";

        // ✅ Fill Section 11
        document.getElementById("edit_nbg_ph").value = plr.nbg_ph || "";
        document.getElementById("edit_nbg_pao2").value = plr.nbg_pao2 || "";
        document.getElementById("edit_nbg_hco3").value = plr.nbg_hco3 || "";
        document.getElementById("edit_nbg_paco2").value = plr.nbg_paco2 || "";
        document.getElementById("edit_nbg_be").value = plr.nbg_be || "";
        document.getElementById("edit_nbg_sao2").value = plr.nbg_sao2 || "";

        // ✅ Fill Section 12
        document.getElementById("edit_ract_ph").value = plr.ract_ph || "";
        document.getElementById("edit_ract_pco2").value = plr.ract_pco2 || "";
        document.getElementById("edit_ract_po2").value = plr.ract_po2 || "";
        document.getElementById("edit_ract_hco3").value = plr.ract_hco3 || "";
        document.getElementById("edit_ract_be_b").value = plr.ract_be_b || "";
        document.getElementById("edit_ract_hct").value = plr.ract_hct || "";
        document.getElementById("edit_ract_thb").value = plr.ract_thb || "";
        document.getElementById("edit_ract_so2").value = plr.ract_so2 || "";
        document.getElementById("edit_ract_na").value = plr.ract_na || "";
        document.getElementById("edit_ract_k").value = plr.ract_k || "";
        document.getElementById("edit_ract_ca").value = plr.ract_ca || "";
        document.getElementById("edit_ract_glu").value = plr.ract_glu || "";

        // ✅ Fill Section 13
        document.getElementById("edit_rapd_pH").value = plr.rapd_pH || "";
        document.getElementById("edit_rapd_pCO2").value = plr.rapd_pCO2 || "";
        document.getElementById("edit_rapd_pO2").value = plr.rapd_pO2 || "";
        document.getElementById("edit_rapd_HCO3").value = plr.rapd_HCO3 || "";
        document.getElementById("edit_rapd_BEB").value = plr.rapd_BEB || "";
        document.getElementById("edit_rapd_Hct").value = plr.rapd_Hct || "";
        document.getElementById("edit_rapd_tHb").value = plr.rapd_tHb || "";
        document.getElementById("edit_rapd_sO2").value = plr.rapd_sO2 || "";
        document.getElementById("edit_rapd_Na").value = plr.rapd_Na || "";
        document.getElementById("edit_rapd_K").value = plr.rapd_K || "";
        document.getElementById("edit_rapd_Ca").value = plr.rapd_Ca || "";
        document.getElementById("edit_rapd_Glu").value = plr.rapd_Glu || "";
        document.getElementById("edit_rapd_Lac").value = plr.rapd_Lac || "";


        // ✅ Fill Section 14
        document.getElementById("edit_thy_TSH").value = plr.thy_TSH || "";
        document.getElementById("edit_thy_TotalT4").value = plr.thy_TotalT4 || "";
        document.getElementById("edit_thy_FreeT4").value = plr.thy_FreeT4 || "";
        document.getElementById("edit_thy_TotalT3").value = plr.thy_TotalT3 || "";
        document.getElementById("edit_thy_FreeT3").value = plr.thy_FreeT3 || "";

        // ✅ Fill Section 15
        document.getElementById("edit_vitamin_d").value = plr.vitamin_d || "";

        var editModal = new bootstrap.Modal(document.getElementById("editHospital"));
        editModal.show();
    }
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.addEventListener("submit", function(event) {
            const activeModal = document.querySelector(".modal.show");
            if (!activeModal) return;

            const form = activeModal.querySelector("form");
            if (!form) return;

            // const inputs = form.querySelectorAll("input:not([type='hidden'])");
            const submitBtn = form.querySelector("button[type='submit']");

            let isValid = true;

            // inputs.forEach(input => {
            //     if (input.type !== "checkbox" && input.value.trim() === "") {
            //         input.classList.add("is-invalid");
            //         isValid = false;
            //     } else {
            //         input.classList.remove("is-invalid");
            //     }
            // });

            if (!isValid) {
                event.preventDefault();
            } else {
                submitBtn.innerHTML =
                    '<span class="spinner-border spinner-border-sm"></span> Processing...';
                submitBtn.disabled = true;
            }
        });
        // document.addEventListener("input", function(event) {
        //     const input = event.target;
        //     if (input.value.trim() !== "") {
        //         input.classList.remove("is-invalid");
        //     }
        // });
    });
</script>

<script>
    $(document).ready(function() {
        // console.log("jQuery Loaded");

        $("#labSelect").change(function() {
            let selectedValue = $(this).val();
            console.log("Selected Value: ", selectedValue); // Debugging

            // Hide all sections smoothly
            $("#section1, #section2, #section3, #section4, #section5, #section6, #section7, #section8, #section9, #section10, #section11, #section12, #section13, #section14, #section15").slideUp(500);

            // Show the relevant section with smooth animation
            if (selectedValue >= 1 && selectedValue <= 15) {
                $("#section" + selectedValue).slideDown(500);
            }
        });
    });
</script>

@endsection