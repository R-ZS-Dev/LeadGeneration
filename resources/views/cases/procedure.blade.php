<div class="row p-4">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12 form-group mb-2">
                <label for="">Procedure Selection</label>
                <select name="pro_casetype" id="" class="form-select">
                    <option value="">Select Procedure</option>
                    @foreach ($procedure as $item)
                        <option value="{{ $item->pro_id }}">{{ $item->pro_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group mb-2">
                <label for="">Procedure Description</label>
                <textarea name="pro_casedesc" id="" rows="3" placeholder="Procedure Description" class="form-control"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group mb-2">
                <label for="">Additional Operative Approach</label>
                <select name="pro_approach" id="" class="form-select">
                    <option value="Full conventional sertonomy">Full conventional sernotomy
                    </option>
                    <option value="Partial sernotomy">Partial Sernotomy</option>
                    <option value="Transverse sternotomy (includes calmshell)">Transverse
                        sternotomy (includes calmshell)</option>
                    <option value="Right or left parasternal incision">Right or left parasternal
                        incision</option>
                    <option value="Sub-xiphoid">Sub-xiphoid</option>
                    <option value="Sub-costal">Sub-costal</option>
                    <option value="Left thoracotomy">Left thoracotomy</option>
                    <option value="Right thoracotomy">Right thoracotomy</option>
                    <option value="Bilateral thoracotomy">Bilateral thoracotomy</option>
                    <option value="Limited (mini) thoracotomy , right">Limited (mini)
                        thoracotomy , right</option>
                    <option value="Limited (mini) thoracotomy , left">Limited (mini) thoracotomy
                        , left</option>
                    <option value="Limited (mini) thoracotomy , bilateral">Limited (mini)
                        thoracotomy , bilateral</option>
                    <option value="Thoracoabdominal inicison">Thoracoabdominal inicison</option>
                    <option value="Percutaneous">Percutaneous</option>
                    <option value="Port access">Port access</option>
                    <option value="Other">Other</option>
                    <option value="None (canceled case)">None (canceled case)</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="" class="mb-2">
                            Approach converted during procedure
                        </label>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="approach_type" value="planned"
                                        id="planned" {{ old('approach_type') == 'planned' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="planned">Yes,
                                        Planned</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="approach_type"
                                        value="unplanned" id="unplanned"
                                        {{ old('approach_type') == 'unplanned' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="unplanned">Yes,
                                        Unplanned</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="approach_type" value="no"
                                        id="no" {{ old('approach_type') == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="row">

                    <div class="col-lg-5">
                        <label for="">Robot Use</label>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="robot_use" value="yes"
                                        id="robot_yes" {{ old('robot_use') == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="robot_yes">Yes</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="robot_use" value="no"
                                        id="robot_no" {{ old('robot_use') == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="robot_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="title-box">
                    <span class="title-label">If Yes</span>

                    <div class="row">
                        <div class="col-lg-5">
                            <label for="">Robot used for</label>
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="robot_use"
                                            value="entire" id="robot_entire">
                                        <label class="form-check-label" for="robot_entire">Entire
                                            operation</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="robot_use"
                                            value="part" id="robot_part">
                                        <label class="form-check-label" for="robot_part">Part
                                            of
                                            the operation</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="form-group ">
                    <label for="">Coronary Artery Bypass</label>
                    <select name="pro_coroart" id="" class="form-control">
                        <option value="">Select coronary artery bypass</option>
                        <option value="Yes, planned">Yes, planned</option>
                        <option value="Yes , unplanned due to surgical complication">Yes ,
                            unplanned due to surgical complication</option>
                        <option value="Yes , unplanned due to unsuspected disease or anatomy">
                            Yes , unplanned due to unsuspected disease or anatomy</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-12 mt-2 mb-3">
                <div class="title-box text-center">
                    <span class="title-label">If Yes</span>
                    <button type="button" disabled class="btn btn-dark">
                        Coronary Artery Bypass
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="">Valve Surgery</label>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="valve_surgery"
                                        value="yes" id="valve_yes"
                                        {{ old('valve_surgery') == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="valve_yes">Yes</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="valve_surgery"
                                        value="no" id="valve_no"
                                        {{ old('valve_surgery') == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="valve_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-2 mb-3">
                <div class="title-box text-center">
                    <span class="title-label">If Yes</span>
                    <button type="button" disabled class="btn btn-dark">
                        Valve Surgery
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="">VAD Implanted or Removed</label>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="vad_implant" value="yes"
                                        id="implant_yes" {{ old('vad_implant') == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="implant_yes">Yes</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="vad_implant" value="no"
                                        id="implant_no" {{ old('vad_implant') == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="implant_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-2 mb-3">
                <div class="title-box text-center">
                    <span class="title-label">If Yes</span>
                    <button type="button" disabled class="btn btn-dark">
                        Cardiac Assist Device
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="">Other Cardiac Procedure</label>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="other_cardiac"
                                        value="yes" id="cardiac_yes"
                                        {{ old('other_cardiac') == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cardiac_yes">Yes</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="other_cardiac"
                                        value="no" id="cardiac_no"
                                        {{ old('other_cardiac') == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cardiac_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-2 mb-3">
                <div class="title-box text-center">
                    <span class="title-label">If Yes</span>
                    <button type="button" disabled class="btn btn-dark">
                        Other Cardiac Procedure
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="">Other Cardiac Procedure, AFib</label>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="cardiac_fib" value="yes"
                                        id="cardiacfib_yes" {{ old('cardiac_fib') == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cardiacfib_yes">Yes</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="cardiac_fib" value="no"
                                        id="cardiacfib_no" {{ old('cardiac_fib') == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cardiacfib_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-2 mb-3">
                <div class="title-box text-center">
                    <span class="title-label">If Yes</span>
                    <button type="button" disabled class="btn btn-dark">
                        Atrial Fibrillation
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <label for="">
                    Other cardic procedure, Aortic
                </label>
                <select name="aortic_proce" id="" class="form-select">
                    <option value="">Select other cardic procedure, Aortic</option>
                    <option value="Yes , planned">Yes , planned</option>
                    <option value="Yes , unplanned due to surgical complication">Yes ,
                        unplanned due to surgical complication</option>
                    <option value="Yes , unplanned due to unsuspected disease or anatomy">Yes ,
                        unplanned due to unsuspected disease or anatomy</option>
                    <option value="No">No</option>
                </select>

            </div>
            <div class="col-lg-12 mt-2 mb-3">
                <div class="title-box text-center">
                    <span class="title-label">If Yes</span>
                    <button type="button" disabled class="btn btn-dark">
                        Other Arotic Procedure
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="">Other Non-Cardiac Procedure</label>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="non_cardic" value="yes"
                                        id="noncardic_yes" {{ old('non_cardic') == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="noncardic_yes">Yes</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="non_cardic" value="no"
                                        id="noncardic_no" {{ old('non_cardic') == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="noncardic_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-2 mb-3">
                <div class="title-box text-center">
                    <span class="title-label">If Yes</span>
                    <button type="button" disabled class="btn btn-dark">
                        Other Non-Cardic Procedure
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 form-group mb-3">
                <label for="">CPT1 Code 1</label>
                <input type="text" name="cptcode1" class="form-control" id="">
            </div>
            <div class="col-md-4 form-group mb-3">
                <label for="">CPT1 Code 2</label>
                <input type="text" name="cptcode2" class="form-control" id="">
            </div>
            <div class="col-md-4 form-group mb-3">
                <label for="">CPT1 Code 3</label>
                <input type="text" name="cptcode3" class="form-control" id="">
            </div>
            <div class="col-md-4 form-group mb-3">
                <label for="">CPT1 Code 4</label>
                <input type="text" name="cptcode4" class="form-control" id="">
            </div>
            <div class="col-md-4 form-group mb-3">
                <label for="">CPT1 Code 5</label>
                <input type="text" name="cptcode5" class="form-control" id="">
            </div>
            <div class="col-md-4 form-group mb-3">
                <label for="">CPT1 Code 6</label>
                <input type="text" name="cptcode6" class="form-control" id="">
            </div>
            <div class="col-md-4 form-group mb-3">
                <label for="">CPT1 Code 7</label>
                <input type="text" name="cptcode7" class="form-control" id="">
            </div>
            <div class="col-md-4 form-group mb-3">
                <label for="">CPT1 Code 8</label>
                <input type="text" name="cptcode8" class="form-control" id="">
            </div>
            <div class="col-md-4 form-group mb-3">
                <label for="">CPT1 Code 9</label>
                <input type="text" name="cptcode9" class="form-control" id="">
            </div>
            <div class="col-md-4 form-group mb-3">
                <label for="">CPT1 Code 10</label>
                <input type="text" name="cptcode10" class="form-control" id="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label for="">OR Entry Date</label>
                <input type="date" name="orentrydate" class="form-control"
                    value="{{ old('orentrydate', date('Y-m-d')) }}">
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="">OR Entry Time</label>
                <input type="time" name="orentrytime" class="form-control"
                    value="{{ old('orentrytime', date('H:i')) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label for="">OR Exit Date</label>
                <input type="date" name="orexitdate" class="form-control"
                    value="{{ old('orexitdate', date('Y-m-d')) }}">
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="">OR Exit Time</label>
                <input type="time" name="orexittime" class="form-control"
                    value="{{ old('orexittime', date('H:i')) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label for="">Initial Intubation Date</label>
                <input type="date" name="initalintubedate" class="form-control"
                    value="{{ old('initalintubedate', date('Y-m-d')) }}">
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="">Initial Intubation Time</label>
                <input type="time" name="initalintubetime" class="form-control"
                    value="{{ old('initalintubetime', date('H:i')) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label for="">Initial Extubation Date</label>
                <input type="date" name="initalextubedate" class="form-control"
                    value="{{ old('initalextubedate', date('Y-m-d')) }}">
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="">Initial Extubation Time</label>
                <input type="time" name="initalextubetime" class="form-control"
                    value="{{ old('initalextubetime', date('H:i')) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label for="">Skin Incision Start Date</label>
                <input type="date" name="skinstrtdate" class="form-control"
                    value="{{ old('skinstrtdate', date('Y-m-d')) }}">
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="">ISkin Incision Start Time</label>
                <input type="time" name="skinstrttime" class="form-control"
                    value="{{ old('skinstrttime', date('H:i')) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label for="">Skin Incision Stop Date</label>
                <input type="date" name="skinenddate" class="form-control"
                    value="{{ old('skinenddate', date('Y-m-d')) }}">
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="">ISkin Incision Stop Time</label>
                <input type="time" name="skinendtime" class="form-control"
                    value="{{ old('skinendtime', date('H:i')) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label for="">Anesthesia End Date</label>
                <input type="date" name="anesthesiadate" class="form-control"
                    value="{{ old('anesthesiadate', date('Y-m-d')) }}">
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="">Anesthesia End Time</label>
                <input type="time" name="anesthesiatime" class="form-control"
                    value="{{ old('anesthesiatime', date('H:i')) }}">
            </div>
        </div>
        <div class="row">
            <label for="">
                Appropriate Antibiotic selection
            </label>
            <div class="row  mb-3 mt-3">
                <div class="col-md-4 ">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="antibiotic" value="Yes"
                            id="antibiotic_yes">
                        <label class="form-check-label" for="antibiotic_yes">Yes</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="antibiotic" value="Yes"
                            id="antibiotic_no">
                        <label class="form-check-label" for="antibiotic_no">No</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="antibiotic" value="Yes"
                            id="antibiotic_ex">
                        <label class="form-check-label" for="antibiotic_ex">Exclusion</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <label for="">
                Appropriate Antibiotic Adminintration Timing
            </label>
            <div class="row  mb-3 mt-3">
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="antiadmin" value="Yes"
                            id="antiadmin_yes">
                        <label class="form-check-label" for="antiadmin_yes">Yes</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="antiadmin" value="Yes"
                            id="antiadmin_no">
                        <label class="form-check-label" for="antiadmin_no">No</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="antiadmin" value="Yes"
                            id="antiadmin_ex">
                        <label class="form-check-label" for="antiadmin_ex">Exclusion</label>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <label for="">
                Appropriate Antibiotic Discontinuation
            </label>
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="antidiscon" value="Yes"
                            id="antidiscon_yes">
                        <label class="form-check-label" for="antidiscon_yes">Yes</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="antidiscon" value="Yes"
                            id="antidiscon_no">
                        <label class="form-check-label" for="antidiscon_no">No</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="antidiscon" value="Yes"
                            id="antidiscon_ex">
                        <label class="form-check-label" for="antidiscon_ex">Exclusion</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <label for="">
                Additional intraoperative prophylactic antibiotic dose
            </label>
            <div class="row mb-3 mt-3">
                <div class="col-md-4 ">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="addintra" value="Yes"
                            id="addintra_yes">
                        <label class="form-check-label" for="addintra_yes">Yes</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="addintra" value="Yes"
                            id="addintra_no">
                        <label class="form-check-label" for="addintra_no">No</label>
                    </div>
                </div>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-lg-4 col-md-6 form-group mb-3">
                <label for="">Lowest Temperature (C):</label>
                <input type="text" name="low_temp" class="form-control" id="">
            </div>
            <div class="col-lg-4 col-md-6 form-group mb-3">
                <label for="">Temperature Source:</label>
                <select name="temp_source" id="" class="form-select">
                    <option value="">Select Temperature Source</option>
                    <option value="Esophageal">Esophageal</option>
                    <option value="CPB venous return">CPB venous return</option>
                    <option value="Bladder">Bladder</option>
                    <option value="Nasopharyngeal">Nasopharyngeal</option>
                    <option value="Tympanic">Tympanic</option>
                    <option value="Rectal">Rectal</option>
                    <option value="Other">Other</option>
                    <option value="Unknown">Unknown</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-6 form-group mb-3">
                <label for="">Lowest Intra-op Hemoglobin:</label>
                <input type="text" name="low_hemo" class="form-control" id="">
            </div>
            <div class="col-lg-4 col-md-6 form-group mb-3">
                <label for="">Lowest Intra-op Hematocrit:</label>
                <input type="text" name="low_hema" class="form-control" id="">
            </div>
            <div class="col-lg-4 col-md-6 form-group mb-3">
                <label for="">Highest Intra-op Glucose:</label>
                <input type="text" name="high_gluco" class="form-control" id="">
            </div>
            <div class="col-lg-4 col-md-6 form-group mb-3">
                <label for="">CPB Utilization:</label>
                <select name="cpb_utilize" id="" class="form-select">
                    <option value="">Select Utlization</option>
                    <option value="None">None</option>
                    <option value="Combination">Combination</option>
                    <option value="Full">Full</option>
                </select>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-lg-12 mt-2 mb-3">
                <div class="title-box">
                    <span class="title-label">If Combination</span>

                    <label for="">Combination Planned</label>
                    <div class="row">
                        <div class="col-md-6 mt-2 mb-3">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="com_plan" value="Planned"
                                    id="com_planned">
                                <label class="form-check-label" for="com_planned">Planned</label>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2 mb-3">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="com_plan" value="Unplanned"
                                    id="com_unplan">
                                <label class="form-check-label" for="com_unplan">Unplanned</label>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-2 mb-3">
                            <div class="title-box">
                                <span class="title-label">If Unplanned</span>
                                <label for="">Unplanned Reason</label>
                                <select name="unplan_reason" id="" class="form-select">
                                    <option value="">Select Unplanned Reason</option>
                                    <option value="Exposure/visualization">
                                        Exposure/visualization</option>
                                    <option value="Bleeding">Bleeding</option>
                                    <option value="Inadequate size and/or diffuse disease of distal vissel">
                                        Inadequate size and/or diffuse disease of distal vissel
                                    </option>
                                    <option value="Hemodynamic instability (hyptension/arrhythamias)">
                                        "Hemodynamic instability (hyptension/arrhythamias)
                                    </option>
                                    <option value="Conduit quality and/or trauma">Conduit
                                        quality and/or trauma</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 mt-2 mb-3">
                <div class="title-box">
                    <span class="title-label">If Combination or Full</span>
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label for="">Arterial Cannulation Aortic Insertion</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="cannulation"
                                            value="no" id="can_no">
                                        <label class="form-check-label" for="can_no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="cannulation"
                                            value="yes" id="can_yes">
                                        <label class="form-check-label" for="can_yes">Yes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label for="">Arterial Cannulation Femoral
                                Insertion</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="cannul_femo"
                                            value="no" id="canfemo_no">
                                        <label class="form-check-label" for="canfemo_no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="cannul_femo"
                                            value="yes" id="canfemo_yes">
                                        <label class="form-check-label" for="canfemo_yes">Yes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label for="">Arterial Cannulation Axillary
                                Insertion</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="cannul_axil"
                                            value="no" id="canaxil_no">
                                        <label class="form-check-label" for="canaxil_no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="cannul_axil"
                                            value="yes" id="canaxil_yes">
                                        <label class="form-check-label" for="canaxil_yes">Yes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label for="">Arterial Cannulation Innomination
                                Insertion</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="cannul_inno"
                                            value="no" id="caninno_no">
                                        <label class="form-check-label" for="caninno_no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="cannul_inno"
                                            value="yes" id="caninno_yes">
                                        <label class="form-check-label" for="caninno_yes">Yes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label for="">Arterial Cannulation Other Insertion</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="cannul_other"
                                            value="no" id="canother_no">
                                        <label class="form-check-label" for="canother_no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="cannul_other"
                                            value="yes" id="canother_yes">
                                        <label class="form-check-label" for="canother_yes">Yes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label for="">Venous Cannulation Femoral Insertion</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="venous_femo"
                                            value="no" id="venousfemo_no">
                                        <label class="form-check-label" for="venousfemo_no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="venous_femo"
                                            value="yes" id="venousfemo_yes">
                                        <label class="form-check-label" for="venousfemo_yes">Yes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label for="">Venous Cannulation Jugular Insertion</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="venous_jugular"
                                            value="no" id="venousjugu_no">
                                        <label class="form-check-label" for="venousjugu_no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="venous_jugular"
                                            value="yes" id="venousjugu_yes">
                                        <label class="form-check-label" for="venousjugu_yes">Yes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label for="">Venous Cannulation Right Atrial
                                Insertion</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="veno_right_artial"
                                            value="no" id="venoright_no">
                                        <label class="form-check-label" for="venoright_no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="veno_right_artial"
                                            value="yes" id="venoright_yes">
                                        <label class="form-check-label" for="venoright_yes">Yes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label for="">Venous Cannulation Left Atrial
                                Insertion</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="veno_left_artial"
                                            value="no" id="venoleft_no">
                                        <label class="form-check-label" for="venoleft_no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="veno_left_artial"
                                            value="yes" id="venoleft_yes">
                                        <label class="form-check-label" for="venoleft_yes">Yes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label for="">Venous Cannulation Pulmonary Vein
                                Insertion</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="veno_pulmu"
                                            value="no" id="pulmo_no">
                                        <label class="form-check-label" for="pulmo_no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="veno_pulmu"
                                            value="yes" id="pulmo_yes">
                                        <label class="form-check-label" for="pulmo_yes">Yes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <label for="">Venous Cannulation Cav/Bicav
                                Insertion</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="veno_cav"
                                            value="no" id="venocav_no">
                                        <label class="form-check-label" for="venocav_no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="veno_cav"
                                            value="yes" id="venocav_yes">
                                        <label class="form-check-label" for="venocav_yes">Yes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-8">
                            <label for="">Venous Cannulation Other Insertion</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="veno_other"
                                            value="no" id="venoother_no">
                                        <label class="form-check-label" for="venoother_no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="veno_other"
                                            value="yes" id="venoother_yes">
                                        <label class="form-check-label" for="venoother_yes">Yes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="">Cardiopulmonary Bypass Time (min)</label>
                    <input type="text" name="bypass_time" id="" class="form-control">
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <label for="">Circulatory Arrest</label>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="curcular_arrest"
                                        value="No" id="arrest_no">
                                    <label class="form-check-label" for="arrest_no">No</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="curcular_arrest"
                                        value="Yes" id="arrest_yes">
                                    <label class="form-check-label" for="arrest_yes">Yes</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-2 mb-3">
                <div class="title-box">
                    <span class="title-label">If Yes</span>

                    <div class="row form-group mb-3">
                        <div class="col-lg-12">
                            <label for="">
                                Circulatory Arrest without cerebral perfusion time (min)
                            </label>
                            <input type="text" name="arrest_without_cerebral" class="form-control"
                                id="">
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-lg-8">
                            <label for="">Circulatory Arrest with cerebral
                                perfusion</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="arrest_with_cerebral"
                                            value="Yes" id="withyes">
                                        <label class="form-check-label" for="withyes">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="arrest_with_cerebral"
                                            value="No" id="withno">
                                        <label class="form-check-label" for="withno">No</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-2 mb-3">
                        <div class="title-box">
                            <span class="title-label">If Yes</span>
                            <div class="col-lg-12 form-group mb-3">
                                <label for="">Circulatory Arrest without cerebral
                                    perfusion
                                    time (min)</label>
                                <input type="text" name="cerebral_perfus_time" id=""
                                    class="form-control">
                            </div>
                            <div class="col-lg-12 form-group mb-3">
                                <label for="">Circulatory Arrest without cerebral
                                    perfusion
                                    Type (min)</label>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input"
                                                name="cerebral_perfus_type" value="Retrograde" id="perfutypere">
                                            <label class="form-check-label" for="perfutypere">Retrograte</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input"
                                                name="cerebral_perfus_type" value="Antegrade" id="perfutypean">
                                            <label class="form-check-label" for="perfutypean">Antegrade</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input"
                                                name="cerebral_perfus_type" value="Both" id="perfutypebo">
                                            <label class="form-check-label" for="perfutypebo">Both</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group mb-3">
                                <label for="">Total Circulatory Arrest Time</label>
                                <input type="text" name="circulat_arrest" id=""
                                    class="form-control">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group mb-3">
            <div class="col-lg-12">
                <label for="">Aortic Occlusion</label>
                <select name="aortic_occl" class="form-select" id="">
                    <option value="">Select Aortic Occlusion</option>
                    <option value="None-beating heart">None-beating heart</option>
                    <option value="None-fibrillating heart">None-fibrillating heart</option>
                    <option value="Aortic Crossclamp">Aortic Crossclamp</option>
                    <option value="Ballon Occlusion">Ballon Occlusion</option>
                </select>
            </div>
        </div>
        <div class="row form-group mb-3">
            <div class="col-lg-12 mt-2 mb-3">
                <div class="title-box">
                    <span class="title-label">If Not None</span>
                    <label for="">
                        Cross clamp time
                    </label>
                    <input type="text" name="cross_clamp" class="form-control" id="">

                </div>
            </div>
        </div>
        <div class="row form-group mb-3">
            <div class="col-lg-12">
                <label for="">Cardioplegia Delivery</label>
                <select name="cardio_deliver" id="" class="form-select">
                    <option value="">Select Cardioplegia Delivery</option>
                    <option value="None">None</option>
                    <option value="Antegrade">Antegrade</option>
                    <option value="Retrograde">Retrograde</option>
                    <option value="Both">Both</option>
                </select>
            </div>
        </div>
        <div class="row form-group mb-3">
            <div class="col-lg-12 mt-2 mb-3">
                <div class="title-box">
                    <span class="title-label">If Not None</span>
                    <label for="">Type of cardioplegia used</label>
                    <select name="type_of_cardio" id="" class="form-select">
                        <option value="">Select type of cardioplegia used</option>
                        <option value="Blood">Blood</option>
                        <option value="Crystalliod">Crystalliod</option>
                        <option value="Both">Both</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <label for="">
                Cerebral Oximetry Used
            </label>
            <div class="row  mb-3 mt-3">
                <div class="col-md-4 ">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="oximetry" value="Yes"
                            id="oximetry_yes">
                        <label class="form-check-label" for="oximetry_yes">Yes</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="oximetry" value="Yes"
                            id="oximetry_no">
                        <label class="form-check-label" for="oximetry_no">No</label>
                    </div>
                </div>

            </div>
        </div>
        <div class="row form-group">
            <label for="">
                Diffuse Aortic Calcification
            </label>
            <div class="row  mb-3 mt-3">
                <div class="col-md-4 ">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="diffuse_aort" value="Yes"
                            id="diffuse_aort_yes">
                        <label class="form-check-label" for="diffuse_aort_yes">Yes</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="diffuse_aort" value="Yes"
                            id="diffuse_aort_no">
                        <label class="form-check-label" for="diffuse_aort_no">No</label>
                    </div>
                </div>

            </div>
        </div>
        <div class="row form-group">
            <label for="">
                Assessment of Ascending Aorta/Arch for atheroma/plaque
            </label>
            <div class="row  mb-3 mt-3">
                <div class="col-md-4 ">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="ascesnding" value="Yes"
                            id="ascesnding_yes">
                        <label class="form-check-label" for="ascesnding_yes">Yes</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="ascesnding" value="Yes"
                            id="ascesnding_no">
                        <label class="form-check-label" for="ascesnding_no">No</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="ascesnding" value="Not Reported"
                            id="ascesnding_ex">
                        <label class="form-check-label" for="ascesnding_ex">Not
                            Reported</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group mb-2">
            <div class="col-lg-12 mt-2 mb-3">
                <div class="title-box">
                    <span class="title-label">If Yes</span>
                    <label for="">Assessment of Aorta Disease</label>

                    <select name="assess_aorta_disease" id="" class="form-select">
                        <option value="">Select Assessment of aorta disease</option>
                        <option value="Normal aorta/ No minimal plaque">Normal aorta/ No
                            minimal plaque</option>
                        <option value="Extensive intimal thickening">Extensive intimal
                            thickening</option>
                        <option value="Protruding Atheroma < 5 mm">Protruding Atheroma < 5 mm</option>
                        <option value="Protruding Atheroma >= 5 mm">Protruding Atheroma >= 5
                            mm</option>
                        <option value="Mobile plagues">Mobile plagues</option>
                        <option value="Not Documented">Not Documented</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <label for="">
                Aortic Condition Altered Plan
            </label>
            <div class="row  mb-3 mt-3">
                <div class="col-md-4 ">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="alterplan" value="Yes"
                            id="alterplan_yes">
                        <label class="form-check-label" for="alterplan_yes">Yes</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="alterplan" value="Yes"
                            id="alterplan_no">
                        <label class="form-check-label" for="alterplan_no">No</label>
                    </div>
                </div>

            </div>
        </div>
        <div class="row form-group">
            <label for="">
                Intraop Blood Products Refused
            </label>
            <div class="row  mb-3 mt-3">
                <div class="col-md-4 ">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="intraop" value="Yes"
                            id="intraop_yes">
                        <label class="form-check-label" for="intraop_yes">Yes</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="intraop" value="Yes"
                            id="intraop_no">
                        <label class="form-check-label" for="intraop_no">No</label>
                    </div>
                </div>

            </div>
        </div>
        <div class="row form-group mb-2">
            <div class="col-lg-12 mt-2 mb-3">
                <div class="title-box">
                    <span class="title-label">If No</span>
                    <div class="row form-group">
                        <div class="col-lg-8">
                            <label for="">
                                Intraop Blood Products
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="intraoppro"
                                            value="Yes" id="intraoppro_yes">
                                        <label class="form-check-label" for="intraoppro_yes">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="intraoppro"
                                            value="Yes" id="intraoppro_no">
                                        <label class="form-check-label" for="intraoppro_no">No</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3 mb-3">
                        <div class="title-box">
                            <span class="title-label">If Yes</span>
                            <div class="form-group mb-3">
                                <label for="">Red Blood Cell Units</label>
                                <input type="text" name="red_blood_cell" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Fresh Frozen Plasma Units</label>
                                <input type="text" name="fresh_frozen" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Platelet Units</label>
                                <input type="text" name="platelet_unit" id="" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Cryoprecipitate Units</label>
                                <input type="text" name="crypo_unit" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
