<form method="POST" action="{{ route('add-valve-procedure') }}">
    @csrf

    <div class="row">
        <div class="col-lg-12">
            <div class="row form-group">
                <div class="col-md-6">
                    <label for="">
                        Valve Prosthesis Explant
                    </label>
                </div>
                <div class="col-md-6 d-md-flex">
                    <label class="me-2">
                        <input type="radio" name="valve_pro" value="Yes" id="valve_pro_yes" />
                        <span>Yes</span>
                    </label>
                    <label>
                        <input type="radio" name="valve_pro" value="No" id="valve_pro_no" checked>
                        <span>No</span></label>
                </div>
            </div>
            <div class="row form-group mb-3" id="valve-pro-yes" style="display: none;">
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
                                    <div class="col-md-6">
                                        <label for="">
                                            Explant Device Known
                                        </label>
                                    </div>

                                    <div class="col-md-6 d-md-flex">
                                        <label class="me-2">
                                            <input type="radio" name="explant_device" value="Yes"
                                                id="explant_device_yes" />
                                            <span>Yes</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="explant_device" value="No"
                                                id="explant_device_no" checked>
                                            <span>No</span></label>
                                    </div>

                                </div>
                                <div class="row form-group mb-3" id="explant-device-yes" style="display: none;">
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
                                    <div class="col-md-6">
                                        <label for="">
                                            Second Valve Prosthesis Explant
                                        </label>
                                    </div>
                                    <div class="col-md-6 d-md-flex">
                                        <label class="me-2">
                                            <input type="radio" name="second_valve" value="Yes"
                                                id="second_valve_yes" />
                                            <span>Yes</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="second_valve" value="No"
                                                id="second_valve_no" checked>
                                            <span>No</span></label>
                                    </div>

                                </div>
                                <div class="row form-group mb-3" id="second-valve-yes" style="display: none;">
                                    <div class="col-lg-12 mt-3 mb-3">
                                        <div class="title-box">
                                            <span class="title-label">If Yes</span>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 form-group mb-3">
                                                    <label for="">Explant Position</label>
                                                    <select name="secexp_pos" id="" class="form-select">
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
                                                <div class="col-md-6">
                                                    <label for="">
                                                        Explant Device Known
                                                    </label>
                                                </div>
                                                <div class="col-md-6 d-md-flex">
                                                    <label class="me-2">
                                                        <input type="radio" name="secexplant_devic" value="Yes"
                                                            id="secexplant_devic_yes" />
                                                        <span>Yes</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="secexplant_devic" value="No"
                                                            id="secexplant_devic_no" checked>
                                                        <span>No</span></label>
                                                </div>

                                            </div>
                                            <div class="row form-group mb-3" id="secexplant-devic-yes"
                                                style="display: none;">
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
                <div class="col-md-5">
                    <label for="">
                        Aortic Valve Procedure
                    </label>
                </div>

                <div class="col-md-7 d-lg-flex">
                    <label class="me-2">
                        <input type="radio" name="aortic_valve_pro" value="Yes" id="aorticvalve_yes" checked />
                        <span>Yes</span></label>

                    <label>
                        <input type="radio" name="aortic_valve_pro" value="Yes, unplanned surgical complication"
                            id="aorticvalve_no">
                        <span>Yes, unplanned surgical
                            complication</span></label>
                </div>
            </div>
            <div class="row form-group mt-2 mb-2">
                <div class="col-md-4">
                    <label for="">
                        Performed
                    </label>
                </div>
                <div class="col-md-8 d-lg-flex">
                    <label class="me-2">
                        <input type="radio" name="perform" value="No" id="perform_No" checked />
                        <span>No</span></label>
                    <label>
                        <input type="radio" name="perform" value="Yes, unplanned disease/anatomy"
                            id="perform_yes" />
                        <span>
                            Yes, unplanned
                            disease/anatomy</span></label>
                </div>
            </div>
            <div class="row form-group" id="perform-yes" style="display: none;">
                <div class="col-lg-12 mt-3">
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="title-box">
                                <span class="title-label">If Yes</span>
                                <div class="col-md-11 mx-auto">
                                    <label for="">Aortic procedure performed</label>
                                    <select name="aortic_performed" id="aortic-procedure" class="form-select mb-3">
                                        <option value="">Select aortic procedure performed</option>
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
                                    <div class="row form-group mb-3" id="aortic_replace" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="title-box">
                                                <span class="title-label">If Replacement</span>
                                                <div class="row form-group  mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">
                                                            Transcatheter Valve Replacement
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 d-lg-flex">
                                                        <label for="transcat_yes">
                                                            <input type="radio" name="transcat" value="Yes"
                                                                id="transcat_yes" />
                                                            <span>Yes</span></label>
                                                        <label>
                                                            <input type="radio" name="transcat" value="No"
                                                                id="transcat_no" checked>
                                                            <Span>No</Span></label>

                                                    </div>
                                                </div>
                                                <div class="row form-group mb-3" id="transcat-yes"
                                                    style="display:none;">
                                                    <div class="col-md-12">
                                                        <div class="title-box">
                                                            <span class="title-label">If Yes</span>
                                                            <label for="">Approach</label>
                                                            <select name="approach" class="form-select"
                                                                id="">
                                                                <option value="">Select Aproach</option>
                                                                <option value="Transapical">Transapical
                                                                </option>
                                                                <option value="Transaxillary">Transaxillary
                                                                </option>
                                                                <option value="Transfemoral">Transfemoral
                                                                </option>
                                                                <option value="Transaortic">Transaortic
                                                                </option>
                                                                <option value="Subclavian">Subclavian</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-3" id="aortic_reconst" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="title-box">
                                                <span class="title-label">If Repair / Reconstruction</span>
                                                <div class="row form-group">
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="">
                                                                    Commissural Annuloplasty
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6 d-lg-flex">
                                                                <label class="me-2">
                                                                    <input type="radio" name="commissural"
                                                                        value="Yes" id="commissural_yes" checked />
                                                                    <span>Yes</span></label>

                                                                <label>
                                                                    <input type="radio" name="commissural"
                                                                        value="No" id="commissural_no">
                                                                    <span>No</span></label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="">
                                                                    Ring Annuloplasty
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6 d-lg-flex">
                                                                <label class="me-2">
                                                                    <input type="radio" name="ringannul"
                                                                        value="Yes" id="ringannul_yes" checked />
                                                                    <span>Yes</span>
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="ringannul"
                                                                        value="No" id="ringannul_no" />
                                                                    <span>No</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">
                                                                Leaflet plication
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6 d-lg-flex">
                                                            <label class="me-2">
                                                                <input type="radio" name="leafletplic"
                                                                    value="Yes" id="leafletplic_yes" checked />
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="leafletplic"
                                                                    value="No" id="leafletplic_no" />
                                                                <span>No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="">
                                                                Leaflet resection suture
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6 d-lg-flex">
                                                            <label class="me-2">
                                                                <input type="radio" name="leafletresec"
                                                                    value="Yes" id="leafletresec_yes" checked />
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="leafletresec"
                                                                    value="No" id="leafletresec_no" />
                                                                <span>No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">
                                                                Leaflet free edge reinforcement
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6 d-lg-flex">
                                                            <label class="me-2">
                                                                <input type="radio" name="leafletfree"
                                                                    value="Yes" id="leafletfree_yes" checked />
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="leafletfree"
                                                                    value="No" id="leafletfree_no" />
                                                                <span>No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">
                                                                Leaflet pericardial patch
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6 d-lg-flex">
                                                            <label class="me-2">
                                                                <input type="radio" name="leafletpericard"
                                                                    value="Yes" id="leafletpericard_yes" checked />
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="leafletpericard"
                                                                    value="No" id="leafletpericard_no" />
                                                                <span>No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label for="">Leaflet commissural
                                                                resuspension suture</label>
                                                        </div>
                                                        <div class="col-md-4 d-lg-flex">
                                                            <label>
                                                                <input type="radio" name="leafletcomm"
                                                                    value="Yes" id="leafletcomm_yes" checked>
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="leafletcomm"
                                                                    value="No" id="leafletcomm_no">
                                                                <span>No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">Leaflet debridement</label>
                                                        </div>
                                                        <div class="col-md-6 d-lg-flex">
                                                            <label class="me-2">
                                                                <input type="radio" name="leafletdebridt"
                                                                    value="Yes" id="leafletdebridt_yes" checked>
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="leafletdebridt"
                                                                    value="No" id="leafletdebridt_no">
                                                                <span>No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">Division of fused leaflet
                                                                raphe</label>
                                                        </div>
                                                        <div class="col-md-6 d-lg-flex">
                                                            <label class="me-2">
                                                                <input type="radio" name="leafletraphe"
                                                                    value="Yes" id="leafletraphe_yes" checked>
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="leafletraphe"
                                                                    value="No" id="leafletraphe_no">
                                                                <span>No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">Repair of Perioprosthetic
                                                                Leak</label>
                                                        </div>
                                                        <div class="col-md-6 d-lg-flex">
                                                            <label class="me-2">
                                                                <input type="radio" name="repairleak"
                                                                    value="Yes" id="repairleak_yes" checked>
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="repairleak"
                                                                    value="No" id="repairleak_no">
                                                                <span>No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row form-group mb-2 mt-3">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">Aortic Annular
                                                                Enlargement</label>
                                                        </div>
                                                        <div class="col-md-6 d-lg-flex">
                                                            <label class="me-2">
                                                                <input type="radio" name="annular" value="Yes"
                                                                    id="annular_yes">
                                                                <span>Yes</span>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="annular" value="No"
                                                                    id="annular_no" checked>
                                                                <span>No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group mb-3" id="annular-yes" style="display: none;">
                                                <div class="col-md-12">
                                                    <div class="title-box">
                                                        <span class="title-label">If Yes</span>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 form-group mb-3">
                                                                <label for="">Aortic Implant Model
                                                                    Number#</label>
                                                                <input type="text" name="aorticimp_modelno"
                                                                    class="form-control" id=""
                                                                    placeholder="Aortic Implant model number">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 form-group mb-3">
                                                                <label for="">Aortic Implant
                                                                    Type</label>
                                                                <select name="aortic_implnt" id=""
                                                                    class="form-select">
                                                                    <option value="">Select Aortic Plant
                                                                        Type</option>
                                                                    <option value="Mechanical Valve">Mechanical
                                                                        Valve</option>
                                                                    <option value="Annuloplasty Device">
                                                                        Annuloplasty Device</option>
                                                                    <option value="Bioprosthetic valve">
                                                                        Bioprosthetic valve</option>
                                                                    <option value="Transcatheter device">
                                                                        Transcatheter device</option>
                                                                    <option value="Homograft">homograft
                                                                    </option>
                                                                    <option value="Other">Other</option>
                                                                    <option value="Autograft (Ross)">Autograft
                                                                        (Ross)</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 form-group mb-3">
                                                                <label for="">Aortic Implant
                                                                    Size</label>
                                                                <input type="text" name="aorticimp_size"
                                                                    class="form-control" id=""
                                                                    placeholder="Aortic Implant Size">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 form-group mb-3">
                                                                <label for="">Unique Device
                                                                    Identifier</label>
                                                                <input type="text" name="aorticimp_udi"
                                                                    class="form-control" id=""
                                                                    placeholder="Unique Device Identifier">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 form-group mb-3">
                                                                <label for="">Expiration</label>
                                                                <input type="text" name="aortic_exp"
                                                                    class="form-control" id=""
                                                                    placeholder="Expiration">
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
            <div class="row form-group mt-3">
                <div class="col-lg-12">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="">Mitral Valve Procedure</label>
                        </div>
                        <div class="col-md-8 d-lg-flex">
                            <label class="me-2">
                                <input type="radio" name="mitrlvalve" value="Yes" id="mitrlvalve_yes" checked>
                                <span>Yes</span>
                            </label>
                            <label>
                                <input type="radio" name="mitrlvalve" value="Yes, unplanned surgical complication"
                                    id="mitrlvalve_no">
                                <span>Yes, unplanned surgical complication</span>
                            </label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="">Performed</label>
                        </div>
                        <div class="col-md-8 d-lg-flex ">
                            <label class="me-2">
                                <input type="radio" name="mitral_performed" value="No" id="performed_no"
                                    checked>
                                <span>No</span>
                            </label>
                            <label>
                                <input type="radio" name="mitral_performed" value="Yes, unplanned disease/anatomy"
                                    id="performed_yes">
                                <span>Yes, unplanned disease/anatomy</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group mb-2" id="mitral-performed" style="display: none;">
                <div class="col-md-12">
                    <div class="title-box">
                        <span class="title-label">If Yes</span>
                        <div class="col-lg-11 mx-auto">
                            <label for="">
                                Mitral Procedure Performed
                            </label>
                            <select name="mitral_perform" id="mitral-procs" class="form-select mb-3">
                                <option value="">Select Mitral Procedure Perform</option>
                                <option value="Repair">Repair</option>
                                <option value="Replacement">Replacement</option>
                            </select>
                            <div class="row form-group mb-3" id="mitral-repair" style="display: none;">
                                <div class="col-md-12">
                                    <div class="title-box">
                                        <span class="title-label">If Repair</span>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Annuloplasty</label>
                                                    </div>
                                                    <div class="col-md-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="repairannol" value="Yes"
                                                                id="repairannol_yes" checked>
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="repairannol" value="No"
                                                                id="repairannol_no">
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Resection
                                                            Location</label>
                                                    </div>
                                                    <div class="col-md-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="resection" value="Yes"
                                                                id="resection_yes">
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="resection" value="No"
                                                                id="resection_no" checked>
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-3" id="resection-yes" style="display:none;">
                                            <div class="col-md-12">
                                                <div class="title-box">
                                                    <span class="title-label">If Yes</span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="">Resection
                                                                Type</label>
                                                            <select name="resecttype" class="form-select"
                                                                id="">
                                                                <option value="">Select
                                                                    Type</option>
                                                                <option value="Triangular">
                                                                    Triangular</option>
                                                                <option value="Quadrangular">
                                                                    Quadrangular</option>
                                                                <option value="Other">Other
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="">Resection
                                                                Location</label>
                                                            <select name="resectloc" class="form-select"
                                                                id="">
                                                                <option value="">Select
                                                                    Resection Location</option>
                                                                <option value="Anterior">
                                                                    Anterior</option>
                                                                <option value="Posterior">
                                                                    Posterior</option>
                                                                <option value="Both Anterior and Posterior">
                                                                    Both Anterior and Posterior
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <div class="col-lg-6">
                                                <div class="row form-group mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Leaflet
                                                            Plication</label>
                                                    </div>
                                                    <div class="col-md-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="leafletplicat" value="Yes"
                                                                id="leafletplicat_yes" checked />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="leafletplicat" value="No"
                                                                id="leafletplicat_no">
                                                            <span>No</span></label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row form-group mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Leaflet
                                                            Debridement</label>
                                                    </div>
                                                    <div class="col-md-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="leafletdebrid" value="Yes"
                                                                id="leafletdebrid_yes" checked />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="leafletdebrid" value="No"
                                                                id="leafletdebrid_no">
                                                            <span>No</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row form-group mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Folding
                                                            Plasty</label>
                                                    </div>
                                                    <div class="col-md-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="fold_plasty" value="Yes"
                                                                id="fold_plasty_yes" checked />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="fold_plasty" value="No"
                                                                id="fold_plasty_no">
                                                            <span>No</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row form-group mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Sliding
                                                            Plasty</label>
                                                    </div>
                                                    <div class="col-md-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="slid_plasty" value="Yes"
                                                                id="slid_plasty_yes" checked />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="slid_plasty" value="No"
                                                                id="slid_plasty_no">
                                                            <span>No</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row form-group mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Annular
                                                            Decalcification/ Debridement</label>
                                                    </div>
                                                    <div class="col-md-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="annular_decal" value="Yes"
                                                                id="annular_decal_yes" checked />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="annular_decal" value="No"
                                                                id="annular_decal_no">
                                                            <span>No</span></label>
                                                    </div>
                                                </div>

                                                <div class="row form-group mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Neochords
                                                            (PTFE)</label>
                                                    </div>
                                                    <div class="col-md-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="neochords" value="Yes"
                                                                id="neochords_yes" />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="neochords" value="No"
                                                                id="neochords_no" checked>
                                                            <span>No</span></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12" id="neochords-yes" style="display: none;">
                                                <div class="title-box">
                                                    <span class="title-label">If
                                                        yes
                                                    </span>
                                                    <label for="">No of neochords
                                                        inserted</label>
                                                    <input type="text" name="neochard" class="form-control"
                                                        id="" placeholder="No of neochards inserted">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <div class="row form-group mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Chordal/Leaflet
                                                            Transfer</label>
                                                    </div>

                                                    <div class="col-lg-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="chordal_leaflet_transfer"
                                                                value="Yes" id="chordal_leaflet_transfer_yes"
                                                                checked />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="chordal_leaflet_transfer"
                                                                value="Yes" id="chordal_leaflet_transfer_yes">
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row form-group mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Leaflet
                                                            Extension/Replacement/Patch</label>
                                                    </div>
                                                    <div class="col-lg-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="leaflet_extension"
                                                                value="Yes" id="leaflet_extension_yes" checked />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="leaflet_extension"
                                                                value="No" id="leaflet_extension_no" />
                                                            <span>No</span>
                                                        </label>
                                                    </div>

                                                </div>

                                                <div class="row form-group mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Edge to Edge
                                                            Repair</label>
                                                    </div>
                                                    <div class="col-lg-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="edge_to_edge_repair"
                                                                value="Yes" id="edge_to_edge_repair_yes" checked />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="edge_to_edge_repair"
                                                                value="No" id="edge_to_edge_repair_no" />
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row form-group mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Mitral Leaflet
                                                            Clip</label>
                                                    </div>
                                                    <div class="col-lg-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="mitral_leaflet_clip"
                                                                value="Yes" id="mitral_leaflet_clip_yes" checked />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="mitral_leaflet_clip"
                                                                value="No" id="mitral_leaflet_clip_no" />
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row form-group mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Mitral
                                                            Commissurotomy</label>
                                                    </div>
                                                    <div class="col-lg-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="mitral_commissurotomy"
                                                                value="Yes" id="mitral_commissurotomy_yes"
                                                                checked />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="mitral_commissurotomy"
                                                                value="No" id="mitral_commissurotomy_no" />
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row form-group mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Mitral
                                                            Commissuroplasty</label>
                                                    </div>
                                                    <div class="col-lg-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="mitral_commissuroplasty"
                                                                value="Yes" id="mitral_commissuroplasty_yes"
                                                                checked />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="mitral_commissuroplasty"
                                                                value="No" id="mitral_commissuroplasty_no" />
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row form-group mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Mitral Cleft
                                                            Repair (Scallop Closure)</label>
                                                    </div>
                                                    <div class="col-lg-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="mitral_cleft_repair"
                                                                value="Yes" id="mitral_cleft_repair_yes" checked />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="mitral_cleft_repair"
                                                                value="No" id="mitral_cleft_repair_no" />
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row form-group mb-3">
                                                    <div class="col-md-6">
                                                        <label for="">Other
                                                            Repair</label>
                                                    </div>
                                                    <div class="col-lg-6 d-lg-flex">
                                                        <label class="me-2">
                                                            <input type="radio" name="other_repair" value="Yes"
                                                                id="other_repair_yes" checked />
                                                            <span>Yes</span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="other_repair" value="No"
                                                                id="other_repair_no" />
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-3" id="mitral-replace" style="display:none;">
                                <div class="col-md-12">
                                    <div class="title-box">
                                        <span class="title-label">If Replacement
                                            Performed</span>
                                        <div class="row form-group mb-2">
                                            <div class="col-md-8">
                                                <label for="">Repair Attempt Prior to
                                                    Mittral
                                                    valve Replacement
                                                </label>
                                            </div>
                                            <div class="col-lg-4 d-lg-flex">
                                                <label class="me-2">
                                                    <input type="radio" name="attempt_prior" value="Yes"
                                                        id="attempt_prior_yes" checked />
                                                    <span>Yes</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="attempt_prior" value="No"
                                                        id="attempt_prior_no" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-3">
                                            <div class="col-lg-12">
                                                <label for="">
                                                    Mitral Chords Preserved
                                                </label>
                                                <input type="text" class="form-control" name="mitral_chords"
                                                    id="" placeholder="Mitral Chords Preserved">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <div class="col-md-8">
                                                <label for="">Transcatheter Replacement
                                                </label>
                                            </div>
                                            <div class="col-lg-4 d-lg-flex">
                                                <label class="me-2">
                                                    <input type="radio" name="transcather_replace" value="Yes"
                                                        id="transcather_replace_yes" checked />
                                                    <span>Yes</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="transcather_replace" value="No"
                                                        id="transcather_replace_no" />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-8">
                                    <label for="">Mitral Implant
                                    </label>
                                </div>
                                <div class="col-lg-4 d-lg-flex">
                                    <label class="me-2">
                                        <input type="radio" name="mitral_implnt" value="Yes"
                                            id="mitral_implnt_yes" />
                                        <span>Yes</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="mitral_implnt" value="No"
                                            id="mitral_implnt_no" checked />
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group mb-3" id="mitral-implnt-yes" style="display:none;">
                                <div class="col-md-12">
                                    <div class="title-box">
                                        <span class="title-label">If Yes</span>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <label for="">Mitral Implant
                                                    Type</label>
                                                <select name="mi_type" id="" class="form-select">
                                                    <option value="">Select mitral
                                                        implant type</option>
                                                    <option value="Mechanical Valve">Mechanical
                                                        Valve</option>
                                                    <option value="Mitral Leaflet clip">Mitral
                                                        Leaflet clip</option>
                                                    <option value="Bioprosthetic">Bioprosthetic
                                                    </option>
                                                    <option value="Transcatheter Device">
                                                        Transcatheter Device</option>
                                                    <option value="Annuloplasty">Annuloplasty
                                                    </option>
                                                    <option value="other">other</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="">Mitral Iplant Model
                                                    Number</label>
                                                <input type="text" name="mitral_imn" id=""
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="">Mitral Iplant
                                                    Size</label>
                                                <input type="text" name="mitral_size" id=""
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="">Unique device
                                                    identifer</label>
                                                <input type="text" name="mitral_udi" id=""
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="">Expiration</label>
                                                <input type="text" name="mitral_exp" id=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group mb-2">
                <div class="col-md-4">
                    <label for="">Tricuspid Valve Procedure
                    </label>
                </div>
                <div class="col-lg-8 d-lg-flex">
                    <label class="me-2">
                        <input type="radio" name="tricuspid" value="Yes" id="tricuspid_yes" checked />
                        <span>Yes</span>
                    </label>
                    <label>
                        <input type="radio" name="tricuspid" value="Yes, unplanned surgical complication"
                            id="tricuspid_no" />
                        <span>Yes, unplanned surgical complication</span>
                    </label>
                </div>
            </div>
            <div class="row form-group mb-2">
                <div class="col-md-4">
                    <label for="">Performed
                    </label>
                </div>
                <div class="col-lg-8 d-lg-flex">
                    <label class="me-2">
                        <input type="radio" name="tricuspidper" value="No" id="tricuspidper_no" checked />
                        <span>No</span>
                    </label>
                    <label>
                        <input type="radio" name="tricuspidper" value="Yes, unplanned disease/anatomy"
                            id="tricuspidper_yes" />
                        <span>Yes, unplanned disease/anatomy </span>
                    </label>
                </div>
            </div>
            <div class="row form-group mb-3" id="tricuspidper-yes" style="display: none;">
                <div class="col-lg-12 mt-3 mb-3">
                    <div class="title-box">
                        <span class="title-label">If Yes</span>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="">Tricuspid Procedure Performed </label>
                                <select name="tricuspid_pro" id="tricuspid-procs" class="form-select">
                                    <option value=""> Select tricuspid precoedure performed</option>
                                    <option value="Annuloplasty Only">Annulopasty only</option>
                                    <option value="Replacement">Replacement</option>
                                    <option value="Reconstruction with Annuloplasty">Reconstruction with
                                        annuloplasty</option>
                                    <option value="Reconstruction without annuloplasty">Reconstruction without
                                        annuloplasty</option>
                                    <option value="Valvectomy">Valvectomy</option>
                                </select>
                            </div>
                            <div class="col-lg-12 mt-2 mb-2" id="tricuspid-replace" style="display: none;">
                                <div class="title-box">
                                    <span class="title-label">If Annuloplasty</span>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Type of annuloplasty </label>
                                            <select name="typeofannulo" id="" class="form-select">
                                                <option value=""> Select type of annuloplasty</option>
                                                <option value="Pericardium">Pericardium</option>
                                                <option value="Suture">Suture</option>
                                                <option value="Prosthetic ring">Prosthetic ring</option>
                                                <option value="Prosthetic band">Prosthetic band</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2 mb-2" id="tricuspid-repair" style="display: none;">
                                <div class="title-box">
                                    <span class="title-label">If Replacement</span>
                                    <div class="row form-group mb-2">
                                        <div class="col-md-8">
                                            <label for="">Transcatheter Replacement
                                            </label>
                                        </div>
                                        <div class="col-lg-4 d-lg-flex">
                                            <label class="me-2">
                                                <input type="radio" name="transtricusp_replace" value="Yes"
                                                    id="transtricusp_replace_yes" checked />
                                                <span>Yes</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="transtricusp_replace" value="No"
                                                    id="transtricusp_replace_no" />
                                                <span>No</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-8">
                                    <label for="">Tricuspid Implant
                                    </label>
                                </div>
                                <div class="col-lg-4 d-lg-flex">
                                    <label class="me-2">
                                        <input type="radio" name="tricuspidimplnt" value="Yes"
                                            id="tricuspidimplnt_yes" />
                                        <span>Yes</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="tricuspidimplnt" value="No"
                                            id="tricuspidimplnt_no" checked />
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2 mb-2" id="tricuspidimplnt-yes" style="display: none;">
                                <div class="title-box">
                                    <span class="title-label">If Yes</span>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 form-group mb-3">
                                            <label for="">Tricuspid Implant Model
                                                Number#</label>
                                            <input type="text" name="tricuspid_modelno" class="form-control"
                                                id="" placeholder="Tricuspid Implant model number">
                                        </div>
                                        <div class="col-lg-6 col-md-6 form-group mb-3">
                                            <label for="">Tricuspid Implant
                                                Type</label>
                                            <select name="tricuspid_implnt" id="" class="form-select">
                                                <option value="">Select Tricuspid Plant
                                                    Type</option>
                                                <option value="Mechanical Valve">Mechanical
                                                    Valve</option>
                                                <option value="Annuloplasty Device">
                                                    Annuloplasty Device</option>
                                                <option value="Bioprosthetic valve">
                                                    Bioprosthetic valve</option>
                                                <option value="Transcatheter device">
                                                    Transcatheter device</option>
                                                <option value="Homograft">homograft
                                                </option>
                                                <option value="Other">Other</option>
                                                <option value="Autograft (Ross)">Autograft
                                                    (Ross)</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 col-md-6 form-group mb-3">
                                            <label for="">Tricuspid Implant
                                                Size</label>
                                            <input type="text" name="tricuspidimp_size" class="form-control"
                                                id="" placeholder="Tricuspid Implant Size">
                                        </div>
                                        <div class="col-lg-6 col-md-6 form-group mb-3">
                                            <label for="">Unique Device
                                                Identifier</label>
                                            <input type="text" name="tricuspidimp_udi" class="form-control"
                                                id="" placeholder="Unique Device Identifier">
                                        </div>

                                        <div class="col-lg-6 col-md-6 form-group mb-3">
                                            <label for="">Expiration</label>
                                            <input type="text" name="tricuspid_exp" class="form-control"
                                                id="" placeholder="Expiration">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- /* --- ------------------------------------------------------------------- -- */ --}}

            <div class="row form-group mb-2">
                <div class="col-md-4">
                    <label for="">Pulmonic Valve Procedure
                    </label>
                </div>
                <div class="col-lg-8 d-lg-flex">
                    <label class="me-2">
                        <input type="radio" name="pulmonic" value="Yes" id="pulmonic_yes" checked />
                        <span>Yes</span>
                    </label>
                    <label>
                        <input type="radio" name="pulmonic" value="Yes, unplanned surgical complication"
                            id="pulmonic_no" />
                        <span>Yes, unplanned surgical complication</span>
                    </label>
                </div>
            </div>
            <div class="row form-group mb-2">
                <div class="col-md-4">
                    <label for="">Performed
                    </label>
                </div>
                <div class="col-lg-8 d-lg-flex">
                    <label class="me-2">
                        <input type="radio" name="pulmonicper" value="No" id="pulmonicper_no" checked />
                        <span>No</span>
                    </label>
                    <label>
                        <input type="radio" name="pulmonicper" value="Yes, unplanned disease/anatomy"
                            id="pulmonicper_yes" />
                        <span>Yes, unplanned disease/anatomy </span>
                    </label>
                </div>
            </div>
            <div class="row form-group mb-3" id="pulmonicper-yes" style="display:none;">
                <div class="col-lg-12 mt-3 mb-3">
                    <div class="title-box">
                        <span class="title-label">If Yes</span>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="">Pulmonic Procedure Performed </label>
                                <select name="pulmonic_pro" id="pulmonic-procs" class="form-select">
                                    <option value=""> Select Pulmonic precoedure performed</option>
                                    <option value="Replacement">Replacement</option>
                                    <option value="Reconstruction">Reconstruction</option>
                                    <option value="Valvectomy">Valvectomy</option>
                                </select>
                            </div>

                            <div class="col-lg-12 mt-2 mb-2" id="pulmonic-replace" style="display: none;">
                                <div class="title-box">
                                    <span class="title-label">If Replacement</span>
                                    <div class="row form-group mb-2">
                                        <div class="col-md-8">
                                            <label for="">Transcatheter Replacement
                                            </label>
                                        </div>
                                        <div class="col-lg-4 d-lg-flex">
                                            <label class="me-2">
                                                <input type="radio" name="pulmonictrans_replace" value="Yes"
                                                    id="pulmonictrans_replace_yes" checked />
                                                <span>Yes</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="pulmonictrans_replace" value="No"
                                                    id="pulmonictrans_replace_no" />
                                                <span>No</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-2">
                                <div class="col-md-8">
                                    <label for="">Pulomnic Implant
                                    </label>
                                </div>
                                <div class="col-lg-4 d-lg-flex">
                                    <label class="me-2">
                                        <input type="radio" name="pulomnicimplnt" value="Yes"
                                            id="pulomnicimplnt_yes" />
                                        <span>Yes</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="pulomnicimplnt" value="No"
                                            id="pulomnicimplnt_no" checked />
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2 mb-2" id="pulomnicimplnt-yes" style="display:none;">
                                <div class="title-box">
                                    <span class="title-label">If Yes</span>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 form-group mb-3">
                                            <label for="">Pulmonic Implant Model
                                                Number#</label>
                                            <input type="text" name="pulmonicimp_modelno" class="form-control"
                                                id="" placeholder="Pulmonic Implant model number">
                                        </div>
                                        <div class="col-lg-6 col-md-6 form-group mb-3">
                                            <label for="">Pulmonic Implant
                                                Type</label>
                                            <select name="pulmonic_implnt" id="" class="form-select">
                                                <option value="">Select Pulmonic Plant
                                                    Type</option>
                                                <option value="Mechanical Valve">Mechanical
                                                    Valve</option>
                                                <option value="Annuloplasty Device">
                                                    Annuloplasty Device</option>
                                                <option value="Bioprosthetic valve">
                                                    Bioprosthetic valve</option>
                                                <option value="Transcatheter device">
                                                    Transcatheter device</option>
                                                <option value="Homograft">homograft
                                                </option>
                                                <option value="Other">Other</option>
                                                <option value="Autograft (Ross)">Autograft
                                                    (Ross)</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 col-md-6 form-group mb-3">
                                            <label for="">Pulmonic Implant
                                                Size</label>
                                            <input type="text" name="pulmonicimp_size" class="form-control"
                                                id="" placeholder="Pulmonic Implant Size">
                                        </div>
                                        <div class="col-lg-6 col-md-6 form-group mb-3">
                                            <label for="">Unique Device
                                                Identifier</label>
                                            <input type="text" name="pulmonicimp_udi" class="form-control"
                                                id="" placeholder="Unique Device Identifier">
                                        </div>
                                        <div class="col-lg-6 col-md-6 form-group mb-3">
                                            <label for="">Expiration</label>
                                            <input type="text" name="pulmonic_exp" class="form-control"
                                                id="" placeholder="Expiration">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <button type="submit" class="btn btn-dark mt-2" style="float: right;">Submit</button>
        </div>
    </div>
</form>
