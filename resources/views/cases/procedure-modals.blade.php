@extends('sitemaster.master-layout')
@section('title', 'All Equipment Groups')
@section('content')
    <div class="container-fluid">
        <div class="row">

            {{-- <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2 mb-4">
                                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                    <h4 class="mb-0"><b>Add Equipment Group</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div> --}}
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="#" class="mt-4">
                        @csrf
                        <div class="row form-group">
                            <label for="">
                                Valve Prosthesis Explant
                            </label>
                            <div class="row  mb-3 mt-3">
                                <div class="col-md-4 ">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="valve_pro" value="Yes"
                                            id="valvepro_yes">
                                        <label class="form-check-label" for="valvepro_yes">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="valve_pro" value="Yes"
                                            id="valvepro_no">
                                        <label class="form-check-label" for="valvepro_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group mb-3">
                            <div class="col-lg-12 mt-3 mb-3">
                                <div class="title-box">
                                    <span class="title-label">If Yes</span>
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row form-group mb-3">
                                            <div class="col-lg-4 col-md-6">
                                                <label for="">Explant Position</label>
                                                <select name="explant_position" id="" class="form-select">
                                                    <option value="">Select Explant Position</option>
                                                    <option value="Aortic">Aortic</option>
                                                    <option value="Mitral">Mitral</option>
                                                    <option value="Tricuspid">Tricuspid</option>
                                                    <option value="Pulmonic">Pulmonic</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <label for="">Explant Type</label>
                                                <select name="explant_type" id="" class="form-select">
                                                    <option value="">Select Explant Type</option>
                                                    <option value="Mechanical Valve">Mechanical Valve</option>
                                                    <option value="Mitral">Mitral</option>
                                                    <option value="Leaflet clip">Leaflet clip</option>
                                                    <option value="Bioprosthetic">Bioprosthetic</option>
                                                    <option value="Transcatheter Device">Transcatheter Device</option>
                                                    <option value="Homograft">Homograft</option>
                                                    <option value="other">other</option>
                                                    <option value="Annuloplasty Device">Annuloplasty Device</option>
                                                    <option value="Unknown">Unknown</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <label for="">Explant Etiology</label>
                                                <select name="explant_etiology" id="" class="form-select">
                                                    <option value="">Select Explant Etiology</option>
                                                    <option value="Endocarditis">Endocardities</option>
                                                    <option value="Faild Repair">Faild Repair</option>
                                                    <option value="Hemolysis">Hemolysis</option>
                                                    <option value="Incompetence">Incompetence</option>
                                                    <option value="Pannus">Pannus</option>
                                                    <option value="Para-valvular leak">Para-valvular leak</option>
                                                    <option value="Prothetic deterioration">Prothetic deterioration</option>
                                                    <option value="Sizing/positioning issue">Sizing positioning issue
                                                    </option>
                                                    <option value="Stenosis">Stenosis</option>
                                                    <option value="Thrombosis">Thrombosis</option>
                                                    <option value="Other">Other</option>
                                                    <option value="Unknown">Unknown</option>
                                                </select>
                                            </div>
                                            <div class="row form-group mt-3 mb-3">
                                                <label for="">
                                                    Explant Device Known
                                                </label>
                                                <div class="row">
                                                    <div class="col-md-4 ">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input"
                                                                name="explant_device" value="Yes" id="expdevice_yes">
                                                            <label class="form-check-label" for="expdevice_yes">Yes</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input"
                                                                name="explant_device" value="Yes" id="expdevice_no">
                                                            <label class="form-check-label" for="expdevice_no">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group mb-3">
                                                <div class="col-lg-12 ">
                                                    <div class="title-box">
                                                        <span class="title-label">If Yes</span>
                                                        <div class="row form-group mb-3">
                                                            <div class="col-lg-6 col-md-6">
                                                                <label for="">Explant Model#</label>
                                                                <input type="text" name="exp_model" id=""
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <label for="">Unique Device Identifier</label>
                                                                <input type="text" name="exp_uid" id=""
                                                                    class="form-control">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row form-group mt-3 mb-3">
                                                <label for="">
                                                    Second Valve Prosthesis Explant
                                                </label>
                                                <div class="row">
                                                    <div class="col-md-4 ">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input"
                                                                name="second_valve" value="Yes" id="secondvalve_yes">
                                                            <label class="form-check-label"
                                                                for="secondvalve_yes">Yes</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input"
                                                                name="second_valve" value="Yes" id="secondvalve_no">
                                                            <label class="form-check-label"
                                                                for="secondvalve_no">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group mb-3">
                                                <div class="col-lg-12 mt-3 mb-3">
                                                    <div class="title-box">
                                                        <span class="title-label">If Yes</span>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-6 form-group mb-3">
                                                                <label for="">Explant Position</label>
                                                                <select name="secexp_pos" id=""
                                                                    class="form-select">
                                                                    <option value="">Select Explant Position</option>
                                                                    <option value="Aortic">Aortic</option>
                                                                    <option value="Mitral">Mitral</option>
                                                                    <option value="Tricuspid">Tricuspid</option>
                                                                    <option value="Pulmonic">Pulmonic</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 col-md-6">
                                                                <label for="">Explant Type</label>
                                                                <select name="secexplant_type" id=""
                                                                    class="form-select">
                                                                    <option value="">Select Explant Type</option>
                                                                    <option value="Mechanical Valve">Mechanical Valve
                                                                    </option>
                                                                    <option value="Mitral">Mitral</option>
                                                                    <option value="Leaflet clip">Leaflet clip</option>
                                                                    <option value="Bioprosthetic">Bioprosthetic</option>
                                                                    <option value="Transcatheter Device">Transcatheter
                                                                        Device</option>
                                                                    <option value="Homograft">Homograft</option>
                                                                    <option value="other">other</option>
                                                                    <option value="Annuloplasty Device">Annuloplasty Device
                                                                    </option>
                                                                    <option value="Unknown">Unknown</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 col-md-6">
                                                                <label for="">Explant Etiology</label>
                                                                <select name="secexplant_etiology" id=""
                                                                    class="form-select">
                                                                    <option value="">Select Explant Etiology</option>
                                                                    <option value="Endocarditis">Endocardities</option>
                                                                    <option value="Faild Repair">Faild Repair</option>
                                                                    <option value="Hemolysis">Hemolysis</option>
                                                                    <option value="Incompetence">Incompetence</option>
                                                                    <option value="Pannus">Pannus</option>
                                                                    <option value="Para-valvular leak">Para-valvular leak
                                                                    </option>
                                                                    <option value="Prothetic deterioration">Prothetic
                                                                        deterioration</option>
                                                                    <option value="Sizing/positioning issue">Sizing
                                                                        positioning issue</option>
                                                                    <option value="Stenosis">Stenosis</option>
                                                                    <option value="Thrombosis">Thrombosis</option>
                                                                    <option value="Other">Other</option>
                                                                    <option value="Unknown">Unknown</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group mt-3 mb-3">
                                                            <label for="">
                                                                Explant Device Known
                                                            </label>
                                                            <div class="row">
                                                                <div class="col-md-4 ">
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="secexplant_device" value="Yes"
                                                                            id="secexpdevice_yes">
                                                                        <label class="form-check-label"
                                                                            for="secexpdevice_yes">Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="secexplant_device" value="Yes"
                                                                            id="secexpdevice_no">
                                                                        <label class="form-check-label"
                                                                            for="secexpdevice_no">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group mb-3">
                                                            <div class="col-lg-12 ">
                                                                <div class="title-box">
                                                                    <span class="title-label">If Yes</span>
                                                                    <div class="row form-group mb-3">
                                                                        <div class="col-lg-6 col-md-6">
                                                                            <label for="">Explant Model#</label>
                                                                            <input type="text" name="secexp_model"
                                                                                id="" class="form-control">
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6">
                                                                            <label for="">Unique Device
                                                                                Identifier</label>
                                                                            <input type="text" name="secexp_uid"
                                                                                id="" class="form-control">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="">
                                Aortic Valve Procedure
                            </label>
                            <div class="row  mb-3">
                                <div class="col-md-4 ">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="aortic_valve_pro"
                                            value="Yes" id="aorticvalve_yes">
                                        <label class="form-check-label" for="aorticvalve_yes">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="aortic_valve_pro"
                                            value="Yes, unplanned surgical complication" id="aorticvalve_no">
                                        <label class="form-check-label" for="aorticvalve_no">Yes, unplanned surgical
                                            complication</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="">
                                Perform
                            </label>
                            <div class="row  mb-3">
                                <div class="col-md-4 ">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="perform" value="No"
                                            id="perform_No">
                                        <label class="form-check-label" for="perform_No">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="perform"
                                            value="Yes, unplanned disease/anatomy" id="perform_no">
                                        <label class="form-check-label" for="perform_no">Yes, unplanned
                                            disease/anatomy</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group mb-3">
                            <div class="col-lg-12 mt-3 mb-3">
                                <div class="row form-group mb-3">
                                    <div class="col-lg-12">
                                        <div class="title-box">
                                            <span class="title-label">If Yes</span>
                                            <div class="col-md-11 mx-auto">
                                                <label for="">Aortic procedure performed</label>
                                                <select name="aortic_performed" id="" class="form-select mb-3">
                                                    <option value="Replacement">Replacement</option>
                                                    <option value="Repair / Reconstruction"> Repair / Reconstruction
                                                    </option>
                                                    <option value="Root Replacement with valved conduit (Bentall)">Root
                                                        Replacement with valved conduit (Bentall)</option>
                                                    <option
                                                        value="Replacement AV and insertion aortic non-valved conduit in supra-coronary position">
                                                        Replacement AV and insertion aortic non-valved conduit in
                                                        supra-coronary
                                                        position</option>
                                                    <option
                                                        value="Replacement AV and major root reconstruction/debridement with vavked conduit">
                                                        Replacement AV and major root reconstruction/debridement with vavked
                                                        conduit</option>
                                                    <option value="Resuspension AV without replacement of ascending aorta">
                                                        Resuspension AV without replacement of ascending aorta</option>
                                                    <option value="Resuspension AV with replacement of ascending aorta">
                                                        Resuspension AV with replacement of ascending aorta</option>
                                                    <option value="Apico-aortic conduit (Aortic valve bypass)">Apico-aortic
                                                        conduit (Aortic valve bypass)</option>
                                                    <option value="Autograft with pulmonary valve (Ross precedure)">
                                                        Autograft
                                                        with pulmonary valve (Ross precedure)</option>
                                                    <option value="Homograft root replacement">Homograft root replacememt
                                                    </option>
                                                    <option value="Valve sparing root reimplantation (David)">Valve sparing
                                                        root reimplantation (David)</option>
                                                    <option value="Valve sparing root reimplantation (Yacoub)">Valve
                                                        sparing
                                                        root reimplantation (Yacoub)</option>
                                                    <option value="Valve sparing root reimplantation (Florida Sleeve)">
                                                        Valve
                                                        sparing root reimplantation (Florida Sleeve)</option>
                                                </select>
                                                <div class="row form-group mb-3">
                                                    <div class="col-md-12">
                                                        <div class="title-box">
                                                            <span class="title-label">If Replacement</span>
                                                            <div class="row form-group">
                                                                <label for="">
                                                                    Transcatheter Valve Replacement
                                                                </label>
                                                                <div class="row  mb-3">
                                                                    <div class="col-md-4 ">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input"
                                                                                name="transcat" value="Yes"
                                                                                id="transcat_yes">
                                                                            <label class="form-check-label"
                                                                                for="transcat_yes">Yes</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input"
                                                                                name="transcat" value="No"
                                                                                id="transcat_no">
                                                                            <label class="form-check-label"
                                                                                for="transcat_no">No</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group mb-3">
                                                                <div class="col-md-12">
                                                                    <div class="title-box">
                                                                        <span class="title-label">If Yes</span>
                                                                        <label for="">Approach</label>
                                                                        <select name="approach" class="form-select" id="">
                                                                            <option value="">Select Aproach</option>
                                                                            <option value="Transapical">Transapical</option>
                                                                            <option value="Transaxillary">Transaxillary</option>
                                                                            <option value="Transfemoral">Transfemoral</option>
                                                                            <option value="Transaortic">Transaortic</option>
                                                                            <option value="Subclavian">Subclavian</option>
                                                                            <option value="Other">Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-group mb-3">
                                                    <div class="col-md-12">
                                                        <div class="title-box">
                                                            <span class="title-label">If Repair / Reconstruction</span>
                                                            <div class="row form-group mb-2">
                                                                <div class="col-lg-6">
                                                                    <label for="">
                                                                        Commissural Annuloplasty
                                                                    </label>
                                                                    <div class="row  mb-3">
                                                                        <div class="col-md-4 ">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="commissural" value="Yes"
                                                                                    id="commissural_yes">
                                                                                <label class="form-check-label"
                                                                                    for="commissural_yes">Yes</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="commissural" value="No"
                                                                                    id="commissural_no">
                                                                                <label class="form-check-label"
                                                                                    for="commissural_no">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="">
                                                                        Ring Annuloplasty
                                                                    </label>
                                                                    <div class="row  mb-3">
                                                                        <div class="col-md-4 ">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="ringannul" value="Yes"
                                                                                    id="ringannul_yes">
                                                                                <label class="form-check-label"
                                                                                    for="ringannul_yes">Yes</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="ringannul" value="No"
                                                                                    id="ringannul_no">
                                                                                <label class="form-check-label"
                                                                                    for="ringannul_no">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group mb-2">
                                                                <div class="col-lg-6">
                                                                    <label for="">
                                                                        Leaflet plication
                                                                    </label>
                                                                    <div class="row  mb-3">
                                                                        <div class="col-md-4 ">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="leafletplic" value="Yes"
                                                                                    id="leafletplic_yes">
                                                                                <label class="form-check-label"
                                                                                    for="leafletplic_yes">Yes</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="leafletplic" value="No"
                                                                                    id="leafletplic_no">
                                                                                <label class="form-check-label"
                                                                                    for="leafletplic_no">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="">
                                                                        Leaflet resection suture
                                                                    </label>
                                                                    <div class="row  mb-3">
                                                                        <div class="col-md-4 ">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="leafletresec" value="Yes"
                                                                                    id="leafletresec_yes">
                                                                                <label class="form-check-label"
                                                                                    for="leafletresec_yes">Yes</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="leafletresec" value="No"
                                                                                    id="leafletresec_no">
                                                                                <label class="form-check-label"
                                                                                    for="leafletresec_no">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group mb-2">
                                                                <div class="col-lg-6">
                                                                    <label for="">
                                                                        Leaflet free edge reinforcement
                                                                    </label>
                                                                    <div class="row  mb-3">
                                                                        <div class="col-md-4 ">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="leafletfree" value="Yes"
                                                                                    id="leafletfree_yes">
                                                                                <label class="form-check-label"
                                                                                    for="leafletfree_yes">Yes</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="leafletfree" value="No"
                                                                                    id="leafletfree_no">
                                                                                <label class="form-check-label"
                                                                                    for="leafletfree_no">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="">
                                                                        Leaflet pericardial patch
                                                                    </label>
                                                                    <div class="row  mb-3">
                                                                        <div class="col-md-4 ">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="leafletpericard" value="Yes"
                                                                                    id="leafletpericard_yes">
                                                                                <label class="form-check-label"
                                                                                    for="leafletpericard_yes">Yes</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="leafletpericard" value="No"
                                                                                    id="leafletpericard_no">
                                                                                <label class="form-check-label"
                                                                                    for="leafletpericard_no">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group mb-2">
                                                                <div class="col-lg-6">
                                                                    <label for="">
                                                                        Leaflet commissural resuspension suture
                                                                    </label>
                                                                    <div class="row  mb-3">
                                                                        <div class="col-md-4 ">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="leafletcomm" value="Yes"
                                                                                    id="leafletcomm_yes">
                                                                                <label class="form-check-label"
                                                                                    for="leafletcomm_yes">Yes</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="leafletcomm" value="No"
                                                                                    id="leafletcomm_no">
                                                                                <label class="form-check-label"
                                                                                    for="leafletcomm_no">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="">
                                                                        Leaflet debridement
                                                                    </label>
                                                                    <div class="row  mb-3">
                                                                        <div class="col-md-4 ">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="leafletdebrid" value="Yes"
                                                                                    id="leafletdebrid_yes">
                                                                                <label class="form-check-label"
                                                                                    for="leafletdebrid_yes">Yes</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="leafletdebrid" value="No"
                                                                                    id="leafletdebrid_no">
                                                                                <label class="form-check-label"
                                                                                    for="leafletdebrid_no">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group mb-2">
                                                                <div class="col-lg-6">
                                                                    <label for="">
                                                                        Division of fused leaflet raphe
                                                                    </label>
                                                                    <div class="row  mb-3">
                                                                        <div class="col-md-4 ">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="leafletraphe" value="Yes"
                                                                                    id="leafletraphe_yes">
                                                                                <label class="form-check-label"
                                                                                    for="leafletraphe_yes">Yes</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="leafletraphe" value="No"
                                                                                    id="leafletraphe_no">
                                                                                <label class="form-check-label"
                                                                                    for="leafletraphe_no">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="">
                                                                        Repair of Perioprosthetic Leak
                                                                    </label>
                                                                    <div class="row  mb-3">
                                                                        <div class="col-md-4 ">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="repairleak" value="Yes"
                                                                                    id="repairleak_yes">
                                                                                <label class="form-check-label"
                                                                                    for="repairleak_yes">Yes</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="repairleak" value="No"
                                                                                    id="repairleak_no">
                                                                                <label class="form-check-label"
                                                                                    for="repairleak_no">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group mb-2 mt-2">
                                                            <div class="col-lg-6">
                                                                <label for="">
                                                                    Aortic Annular Enlargement
                                                                </label>
                                                                <div class="row  mb-3">
                                                                    <div class="col-md-4 ">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input"
                                                                                name="annular" value="Yes"
                                                                                id="annular_yes">
                                                                            <label class="form-check-label"
                                                                                for="annular_yes">Yes</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input"
                                                                                name="annular" value="No"
                                                                                id="annular_no">
                                                                            <label class="form-check-label"
                                                                                for="annular_no">No</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label for="">
                                                                    Aortic Implant
                                                                </label>
                                                                <div class="row  mb-3">
                                                                    <div class="col-md-4 ">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input"
                                                                                name="implant" value="Yes"
                                                                                id="implant_yes">
                                                                            <label class="form-check-label"
                                                                                for="implant_yes">Yes</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input"
                                                                                name="implant" value="No"
                                                                                id="implant_no">
                                                                            <label class="form-check-label"
                                                                                for="implant_no">No</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog --> --}}
        </div><!-- /.modal -->


    </div>
@endsection
@section('script')

@endsection
