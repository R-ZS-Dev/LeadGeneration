<div class="row p-4">
   <form action="{{ route('add-case-procedure') }}" method="post">
    @csrf
    <div class="col-lg-12">
        <div class="row">
            <label for="pet_id">Select Patient</label>
           <div class="col-lg-12 form-group mb-2">
            <select name="propat_id" id="pat_id" class="form-control" required>
                <option value="">Select Patient</option>
                @foreach ($patient as $item)
                <option value="{{ $item->pat_id }}"
                    {{ session('pat_id') == $item->pat_id ? 'selected' : '' }}>
                    {{ $item->first_name }}
                </option>
            @endforeach
            </select>
           </div>
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
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="" class="mb-2">
                            Approach converted during procedure
                        </label>
                    </div>
                    <div class="col-lg-7 d-lg-flex">
                        <label class="me-2">
                            <input type="radio" name="approach_type" value="planned"
                                {{ old('approach_type') == 'planned' ? 'checked' : '' }} />
                            <span>Yes, Planned</span>
                        </label>
                        <label class="me-2">
                            <input type="radio" name="approach_type" value="unplanned"
                                {{ old('approach_type') == 'unplanned' ? 'checked' : '' }} />
                            <span>Yes, Unplanned</span>
                        </label>
                        <label class="">
                            <input type="radio" name="approach_type" value="no"
                                {{ old('approach_type') == 'no' ? 'checked' : '' }} checked />
                            <span>No</span>
                        </label>

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
                    <div class="col-lg-7 d-lg-flex">
                        <label class="me-2">
                            <input type="radio" name="robot_use" value="yes" id="robot_yes"
                                {{ old('robot_use') == 'yes' ? 'checked' : '' }} />
                            <span>Yes</span>
                        </label>
                        <label>
                            <input type="radio" name="robot_use" value="no" id="robot_no"
                                {{ old('robot_use') == 'no' ? 'checked' : '' }} checked />
                            <span>No</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="robot-use" style="display: none;">
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
                                        <input type="radio" class="form-check-input" name="robot_useop" value="entire"
                                            id="robot_entire" {{ old('robot_use') == 'entire' ? 'checked' : '' }}
                                            checked>
                                        <label class="form-check-label" for="robot_entire">Entire operation</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="robot_useop"
                                            value="part" id="robot_part"
                                            {{ old('robot_use') == 'part' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="robot_part">Part of the operation</label>
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
                    <select name="pro_coroart" id="proCoroartSelect" class="form-control">
                        <option value="">Select coronary artery bypass</option>
                        <option value="Yes, planned">Yes, planned</option>
                        <option value="Yes , unplanned due to surgical complication">Yes, unplanned due to surgical
                            complication</option>
                        <option value="Yes , unplanned due to unsuspected disease or anatomy">
                            Yes, unplanned due to unsuspected disease or anatomy
                        </option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="">Valve Surgery</label>
                    </div>
                    <div class="col-lg-7 d-md-flex">
                        <label class="me-3">
                            <input type="radio" name="valve_surgery" value="yes" id="valve_yes"
                                {{ old('valve_surgery') == 'yes' ? 'checked' : '' }} >
                            <span>Yes</span>
                        </label>
                        <label>
                            <input type="radio" name="valve_surgery" value="no" id="valve_no"
                                {{ old('valve_surgery') == 'no' ? 'checked' : '' }} checked>
                            <span>No</span>
                        </label>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="">VAD Implanted or Removed</label>
                    </div>
                    <div class="col-lg-7 d-md-flex">

                        <label class="me-3">
                            <input type="radio" name="vad_implant" value="yes" id="implant_yes"
                                {{ old('vad_implant') == 'yes' ? 'checked' : '' }}>
                            <span>Yes</span>
                        </label>

                        <label>
                            <input type="radio" name="vad_implant" value="no" id="implant_no"
                                {{ old('vad_implant') == 'no' ? 'checked' : '' }} checked>
                            <span>No</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="">Other Cardiac Procedure</label>
                    </div>
                    <div class="col-lg-7 d-md-flex">

                        <label class="me-3">
                            <input type="radio" name="other_cardiac" value="yes" id="cardiac_yes"
                                {{ old('other_cardiac') == 'yes' ? 'checked' : '' }}>
                            <span>Yes</span>
                        </label>

                        <label>
                            <input type="radio" name="other_cardiac" value="no" id="cardiac_no"
                                {{ old('other_cardiac') == 'no' ? 'checked' : '' }} checked>
                            <span>No</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="">Other Cardiac Procedure, AFib</label>
                    </div>
                    <div class="col-lg-7 d-md-flex">
                        <label class="me-3">
                            <input type="radio" name="cardiac_fib" value="yes" id="cardiacfib_yes"
                                {{ old('cardiac_fib') == 'yes' ? 'checked' : '' }}>
                            <span>Yes</span>
                        </label>
                        <label>
                            <input type="radio" name="cardiac_fib" value="no" id="cardiacfib_no"
                                {{ old('cardiac_fib') == 'no' ? 'checked' : '' }} checked>
                            <span>No</span>
                        </label>

                    </div>
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

        </div>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="">Other Non-Cardiac Procedure</label>
                    </div>
                    <div class="col-lg-7 d-lg-flex">
                        <label class="me-3">
                            <input type="radio" name="non_cardic" value="yes" id="noncardic_yes"
                                {{ old('non_cardic') == 'yes' ? 'checked' : '' }}>
                            <span>Yes</span>
                        </label>
                        <label>
                            <input type="radio" name="non_cardic" value="no" id="noncardic_no"
                                {{ old('non_cardic') == 'no' ? 'checked' : '' }} checked>
                            <span>No</span>
                        </label>
                    </div>
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
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="antibiotic" value="Yes" id="antibiotic_yes"
                            {{ old('antibiotic') == 'Yes' ? 'checked' : '' }}>
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="antibiotic" value="No" id="antibiotic_no"
                            {{ old('antibiotic') == 'No' ? 'checked' : '' }} checked>
                        <span>No</span>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="antibiotic" value="Exclusion" id="antibiotic_ex"
                            {{ old('antibiotic') == 'Exclusion' ? 'checked' : '' }}>
                        <span>Exclusion</span>
                    </label>
                </div>
            </div>

        </div>
        <div class="row">
            <label for="">
                Appropriate Antibiotic Adminintration Timing
            </label>
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="antiadmin" value="Yes" id="antiadmin_yes"
                            {{ old('antiadmin') == 'Yes' ? 'checked' : '' }}>
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="antiadmin" value="No" id="antiadmin_no"
                            {{ old('antiadmin') == 'No' ? 'checked' : '' }} checked>
                        <span>No</span>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="antiadmin" value="Exclusion" id="antiadmin_ex"
                            {{ old('antiadmin') == 'Exclusion' ? 'checked' : '' }}>
                        <span>Exclusion</span>
                    </label>
                </div>
            </div>


        </div>
        <div class="row">
            <label for="">
                Appropriate Antibiotic Discontinuation
            </label>
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="antidiscon" value="yes" id="antidiscon_yes"
                            {{ old('antidiscon') == 'yes' ? 'checked' : '' }}>
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="antidiscon" value="no" id="antidiscon_no"
                            {{ old('antidiscon') == 'no' ? 'checked' : '' }} checked>
                        <span>No</span>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="antidiscon" value="exclusion" id="antidiscon_ex"
                            {{ old('antidiscon') == 'exclusion' ? 'checked' : '' }}>
                        <span>Exclusion</span>
                    </label>
                </div>
            </div>

        </div>
        <div class="row">
            <label for="">
                Additional intraoperative prophylactic antibiotic dose
            </label>
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="addintra" value="yes" id="addintra_yes"
                            {{ old('addintra') == 'yes' ? 'checked' : '' }}>
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="addintra" value="no" id="addintra_no"
                            {{ old('addintra') == 'no' ? 'checked' : '' }} checked>
                        <span>No</span>
                    </label>
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
                <select name="cpb_utilize" id="cpb_utilize_select" class="form-select">
                    <option value="">Select Utlization</option>
                    <option value="None">None</option>
                    <option value="Combination">Combination</option>
                    <option value="Full">Full</option>
                </select>
            </div>
        </div>

        <hr>
        <div class="row" id="if-combine" style="display: none;">
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
                        <div class="col-lg-12 mt-2 mb-3" id="com-unplan" style="display: none;">
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
        <div class="row" id="if-combine-full" style="display: none;">
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
                                    <label class="me-3">
                                        <input type="radio" name="cannulation" value="no" id="can_no"
                                            {{ old('cannulation') == 'no' ? 'checked' : '' }} checked>
                                        <span>No</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="me-3">
                                        <input type="radio" name="cannulation" value="yes" id="can_yes"
                                            {{ old('cannulation') == 'yes' ? 'checked' : '' }}>
                                        <span>Yes</span>
                                    </label>
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
                                    <label class="me-3">
                                        <input type="radio" name="cannul_femo" value="no" id="canfemo_no"
                                            {{ old('cannul_femo') == 'no' ? 'checked' : '' }} checked>
                                        <span>No</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="me-3">
                                        <input type="radio" name="cannul_femo" value="yes" id="canfemo_yes"
                                            {{ old('cannul_femo') == 'yes' ? 'checked' : '' }}>
                                        <span>Yes</span>
                                    </label>
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
                                    <label class="me-3">
                                        <input type="radio" name="cannul_axil" value="no" id="canaxil_no"
                                            {{ old('cannul_axil') == 'no' ? 'checked' : '' }} checked>
                                        <span>No</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="me-3">
                                        <input type="radio" name="cannul_axil" value="yes" id="canaxil_yes"
                                            {{ old('cannul_axil') == 'yes' ? 'checked' : '' }}>
                                        <span>Yes</span>
                                    </label>
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
                                    <label class="me-3">
                                        <input type="radio" name="cannul_inno" value="no" id="caninno_no"
                                            {{ old('cannul_inno') == 'no' ? 'checked' : '' }} checked>
                                        <span>No</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="me-3">
                                        <input type="radio" name="cannul_inno" value="yes" id="caninno_yes"
                                            {{ old('cannul_inno') == 'yes' ? 'checked' : '' }}>
                                        <span>Yes</span>
                                    </label>
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
                                    <label class="me-3">
                                        <input type="radio" name="cannul_other" value="no" id="canother_no"
                                            {{ old('cannul_other') == 'no' ? 'checked' : '' }} checked>
                                        <span>No</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="me-3">
                                        <input type="radio" name="cannul_other" value="yes" id="canother_yes"
                                            {{ old('cannul_other') == 'yes' ? 'checked' : '' }}>
                                        <span>Yes</span>
                                    </label>
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
                                    <label class="me-3">
                                        <input type="radio" name="venous_femo" value="no" id="venousfemo_no"
                                            {{ old('venous_femo') == 'no' ? 'checked' : '' }} checked>
                                        <span>No</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="me-3">
                                        <input type="radio" name="venous_femo" value="yes" id="venousfemo_yes"
                                            {{ old('venous_femo') == 'yes' ? 'checked' : '' }}>
                                        <span>Yes</span>
                                    </label>
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
                                    <label class="me-3">
                                        <input type="radio" name="venous_jugular" value="no"
                                            id="venousjugu_no" {{ old('venous_jugular') == 'no' ? 'checked' : '' }}
                                            checked>
                                        <span>No</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="me-3">
                                        <input type="radio" name="venous_jugular" value="yes"
                                            id="venousjugu_yes" {{ old('venous_jugular') == 'yes' ? 'checked' : '' }}>
                                        <span>Yes</span>
                                    </label>
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
                                    <label class="me-3">
                                        <input type="radio" name="veno_right_artial" value="no"
                                            id="venoright_no"
                                            {{ old('veno_right_artial', 'no') == 'no' ? 'checked' : '' }}>
                                        <span>No</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="me-3">
                                        <input type="radio" name="veno_right_artial" value="yes"
                                            id="venoright_yes"
                                            {{ old('veno_right_artial') == 'yes' ? 'checked' : '' }}>
                                        <span>Yes</span>
                                    </label>
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
                                    <label class="me-3">
                                        <input type="radio" name="veno_left_artial" value="no"
                                            id="venoleft_no"
                                            {{ old('veno_left_artial', 'no') == 'no' ? 'checked' : '' }}>
                                        <span>No</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="me-3">
                                        <input type="radio" name="veno_left_artial" value="yes"
                                            id="venoleft_yes" {{ old('veno_left_artial') == 'yes' ? 'checked' : '' }}>
                                        <span>Yes</span>
                                    </label>
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
                                    <label class="me-3">
                                        <input type="radio" name="veno_pulmu" value="no" id="pulmo_no"
                                            {{ old('veno_pulmu', 'no') == 'no' ? 'checked' : '' }}>
                                        <span>No</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="me-3">
                                        <input type="radio" name="veno_pulmu" value="yes" id="pulmo_yes"
                                            {{ old('veno_pulmu') == 'yes' ? 'checked' : '' }}>
                                        <span>Yes</span>
                                    </label>
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
                                    <label class="me-3">
                                        <input type="radio" name="veno_cav" value="no" id="venocav_no"
                                            {{ old('veno_cav', 'no') == 'no' ? 'checked' : '' }}>
                                        <span>No</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="me-3">
                                        <input type="radio" name="veno_cav" value="yes" id="venocav_yes"
                                            {{ old('veno_cav') == 'yes' ? 'checked' : '' }}>
                                        <span>Yes</span>
                                    </label>
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
                                    <label class="me-3">
                                        <input type="radio" name="veno_other" value="no" id="venoother_no"
                                            {{ old('veno_other', 'no') == 'no' ? 'checked' : '' }}>
                                        <span>No</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="me-3">
                                        <input type="radio" name="veno_other" value="yes" id="venoother_yes"
                                            {{ old('veno_other') == 'yes' ? 'checked' : '' }}>
                                        <span>Yes</span>
                                    </label>
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
                                <label class="me-3">
                                    <input type="radio" name="circular_arrest" value="Yes" id="arrest_yes"
                                        {{ old('circular_arrest', 'No') == 'Yes' ? 'checked' : '' }}>
                                    <span>Yes</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="me-3">
                                    <input type="radio" name="circular_arrest" value="No" id="arrest_no"
                                        {{ old('circular_arrest', 'No') == 'No' ? 'checked' : '' }}>
                                    <span>No</span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="arrest" style="display: none;">
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
                                    <label class="me-3">
                                        <input type="radio" name="arrest_with_cerebral" value="Yes"
                                            id="withyes"
                                            {{ old('arrest_with_cerebral', 'No') == 'Yes' ? 'checked' : '' }}>
                                        <span>Yes</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="me-3">
                                        <input type="radio" name="arrest_with_cerebral" value="No"
                                            id="withno"
                                            {{ old('arrest_with_cerebral', 'No') == 'No' ? 'checked' : '' }}>
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12 mt-2 mb-3" style="display: none" id="cerebral-perfus">
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
                                        <label class="me-3">
                                            <input type="radio" name="cerebral_perfus_type" value="Retrograde"
                                                id="perfutypere"
                                                {{ old('cerebral_perfus_type', 'Retrograde') == 'Retrograde' ? 'checked' : '' }}>
                                            <span>Retrograde</span>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="me-3">
                                            <input type="radio" name="cerebral_perfus_type" value="Antegrade"
                                                id="perfutypean"
                                                {{ old('cerebral_perfus_type') == 'Antegrade' ? 'checked' : '' }}>
                                            <span>Antegrade</span>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="me-3">
                                            <input type="radio" name="cerebral_perfus_type" value="Both"
                                                id="perfutypebo"
                                                {{ old('cerebral_perfus_type') == 'Both' ? 'checked' : '' }}>
                                            <span>Both</span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-12 form-group mb-3">
                                <label for="">Total Circulatory Arrest Time</label>
                                <input type="text" name="circulat_arrest" id="" class="form-control">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group mb-3">
            <div class="col-lg-12">
                <label for="">Aortic Occlusion</label>
                <select name="aortic_occl" class="form-select" id="aortic_occl_select">
                    <option value="">Select Aortic Occlusion</option>
                    <option value="None-beating heart">None-beating heart</option>
                    <option value="None-fibrillating heart">None-fibrillating heart</option>
                    <option value="Aortic Crossclamp">Aortic Crossclamp</option>
                    <option value="Ballon Occlusion">Ballon Occlusion</option>
                </select>
            </div>
        </div>
        <div class="row form-group mb-3" id="not-none" style="display: none;">
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
                <select name="cardio_deliver" id="select-cardio" class="form-select">
                    <option value="">Select Cardioplegia Delivery</option>
                    <option value="None">None</option>
                    <option value="Antegrade">Antegrade</option>
                    <option value="Retrograde">Retrograde</option>
                    <option value="Both">Both</option>
                </select>
            </div>
        </div>
        <div class="row form-group mb-3" id="cardio-not-none" style="display:none;">
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
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="oximetry" value="Yes" id="oximetry_yes"
                            {{ old('oximetry', 'Yes') == 'Yes' ? 'checked' : '' }}>
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="oximetry" value="No" id="oximetry_no"
                            {{ old('oximetry') == 'No' ? 'checked' : '' }}>
                        <span>No</span>
                    </label>
                </div>
            </div>

        </div>
        <div class="row form-group">
            <label for="">
                Diffuse Aortic Calcification
            </label>
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="diffuse_aort" value="Yes" id="diffuse_aort_yes"
                            {{ old('diffuse_aort', 'Yes') == 'Yes' ? 'checked' : '' }}>
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="diffuse_aort" value="No" id="diffuse_aort_no"
                            {{ old('diffuse_aort') == 'No' ? 'checked' : '' }}>
                        <span>No</span>
                    </label>
                </div>
            </div>

        </div>
        <div class="row form-group">
            <label for="">
                Assessment of Ascending Aorta/Arch for atheroma/plaque
            </label>
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="ascending" value="Yes" id="ascending_yes"
                            {{ old('ascending') == 'Yes' ? 'checked' : '' }} checked>
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="ascending" value="No" id="ascending_no"
                            {{ old('ascending') == 'No' ? 'checked' : '' }}>
                        <span>No</span>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="ascending" value="Not Reported" id="ascending_ex"
                            {{ old('ascending') == 'Not Reported' ? 'checked' : '' }}>
                        <span>Not Reported</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row form-group mb-2" id="ascending-yes" style="display: none">
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
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="alterplan" value="Yes" id="alterplan_yes"
                            {{ old('alterplan') == 'Yes' ? 'checked' : '' }}>
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="me-3">
                        <input type="radio" name="alterplan" value="No" id="alterplan_no"
                            {{ old('alterplan') == 'No' ? 'checked' : '' }} checked>
                        <span>No</span>
                    </label>
                </div>
            </div>

        </div>
        <div class="row form-group">
            <label for="">
                Intraop Blood Products Refused
            </label>
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label for="intraop_yes">
                        <input type="radio" name="intraop" value="Yes" id="intraop_yes"
                            {{ old('intraop') == 'Yes' ? 'checked' : '' }} checked>
                        <span>Yes</span></label>

                </div>
                <div class="col-md-4">
                    <label for="intraop_no">
                        <input type="radio" name="intraop" value="No" id="intraop_no"
                            {{ old('intraop') == 'No' ? 'checked' : '' }}>
                        <span>No</span></label>

                </div>
            </div>

        </div>
        <div class="row form-group mb-2" id="intrapo-no" style="display: none;">
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
                    <div class="col-lg-12 mt-3 mb-3" id="intrapo-blood" style="display: none;">
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
        <div class="row form-group mb-3">
            <div class="col-lg-12">
                <label for="">Intraop Clothing Factors</label>
                <select name="clothing_factor" id="" class="form-select">
                    <option value="">Select Intraop Clothing Factor</option>
                    <option value="Yes, Factor Vlla">Yes, Factor Vlla</option>
                    <option value="Yes, FEIB">Yes, FEIB</option>
                    <option value="Yes, Composite">Yes, Composite</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
        <div class="row form-group">
            <label for="">
                Intraop Antifibrinolytic Medication: Epsilon Amino-Caproic Acid
            </label>
            <div class="row  mb-3 mt-3">
                <div class="col-md-4 ">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="intraop_antifi" value="Yes"
                            id="intraopantifi_yes">
                        <label class="form-check-label" for="intraopantifi_yes">Yes</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="intraop_antifi" value="Yes"
                            id="intraopantifi_no">
                        <label class="form-check-label" for="intraopantifi_no">No</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <label for="">
                Intraoperative TEE Performed post procedure
            </label>
            <div class="row  mb-3 mt-3">
                <div class="col-md-4 ">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="intraop_tee" value="Yes"
                            id="intraoptee_yes">
                        <label class="form-check-label" for="intraoptee_yes">Yes</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="intraop_tee" value="Yes"
                            id="intraoptee_no">
                        <label class="form-check-label" for="intraoptee_no">No</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group mb-3" id="tee-yes" style="display: none;">
            <div class="col-lg-12 mt-3 mb-3">
                <div class="title-box">
                    <span class="title-label">If Yes</span>
                    <div class="row form-group mb-3">
                        <div class="col-lg-12">
                            <label for="">High level aortic insufficient found</label>
                            <select name="aortic_insufi" id="" class="form-select">
                                <option value="">Select high level aortic insufficient found</option>
                                <option value="None">None</option>
                                <option value="Trace/Trivial">Trace/Trivial</option>
                                <option value="Mild">Mild</option>
                                <option value="Moderate">Moderate</option>
                                <option value="Severe">Severe</option>
                                <option value="Not Reported">Not Reported</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-lg-12">
                            <label for="">High level mitral insufficient found</label>
                            <select name="mitral_insufi" id="" class="form-select">
                                <option value="">Select high level mitral insufficient found</option>
                                <option value="None">None</option>
                                <option value="Trace/Trivial">Trace/Trivial</option>
                                <option value="Mild">Mild</option>
                                <option value="Moderate">Moderate</option>
                                <option value="Severe">Severe</option>
                                <option value="Not Reported">Not Reported</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-lg-12">
                            <label for="">High level tricuspid insufficient found</label>
                            <select name="tricuspid_insufi" id="" class="form-select">
                                <option value="">Select high level tricuspid insufficient found</option>
                                <option value="None">None</option>
                                <option value="Trace/Trivial">Trace/Trivial</option>
                                <option value="Mild">Mild</option>
                                <option value="Moderate">Moderate</option>
                                <option value="Severe">Severe</option>
                                <option value="Not Reported">Not Reported</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-lg-12">
                            <label for="">Ejection Fraction post procedure</label>
                            <select name="ejection_fract" id="" class="form-select">
                                <option value="">Select ejection fraction post procedure</option>
                                <option value="Unchanged">Unchanged</option>
                                <option value="Increased">Increased</option>
                                <option value="Decreased">Decreased</option>
                                <option value="Not Reported">Not Reported</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <label for="">
                Combine Cardiac surgery and PCI performed
            </label>
            <div class="row  mb-3 mt-3">
                <div class="col-md-4 ">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="cardiac_pci" value="Yes"
                            id="cardiacpci_yes">
                        <label class="form-check-label" for="cardiacpci_yes">Yes</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="cardiac_pci" value="No"
                            id="cardiacpci_no">
                        <label class="form-check-label" for="cardiacpci_no">No</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group mb-3" id="cardiac-pci" style="display: none;">
            <div class="col-lg-12 mt-3 mb-3">
                <div class="title-box">
                    <span class="title-label">If Yes</span>
                    <div class="row form-group mb-3">
                        <div class="col-lg-12">
                            <label for="">Combined Procedures</label>
                            <select name="combine_pro" id="" class="form-select">
                                <option value="">Select combined procedures</option>
                                <option value="PCI + CAD">PCI + CAD</option>
                                <option value="PCI + Valve">PCI + Valve</option>
                                <option value="PCI + Aortic">PCI + Aortic</option>
                                <option value="PCI + Other">PCI + Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-lg-12">
                            <label for="">Status</label>
                            <select name="proced_status" id="" class="form-select">
                                <option value="">Select Status</option>
                                <option value="Conurrent - same setting">Concurrent - same setting</option>
                                <option value="Staged - PCI followed by surgery">Staged - PCI followed by surgery
                                </option>
                                <option value="Staged - surgery followed by PCI"></option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-lg-12">
                            <label for="">PCI procedure</label>
                            <select name="pci_procedure" id="" class="form-select">
                                <option value="">Select PCI procedure</option>
                                <option value="Stent">Stent</option>
                                <option value="Angioplasty and stent">Angioplasty and stent</option>
                                <option value="Attempted PCI">Attempted PCI</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-lg-12 mt-3 mb-3">
                            <div class="title-box">
                                <span class="title-label">If Yes</span>
                                <label for="">Stent Type</label>
                                <select name="stent_type" id="" class="form-select">
                                    <option value="">Select Stent Type</option>
                                    <option value="Bare Metal">Bare Metal</option>
                                    <option value="Drug-eluting">Drug-eluting</option>
                                    <option value="Bioresorbable">Bioresorbable</option>
                                    <option value="Multiple">Multiple</option>
                                    <option value="Not Documented">Not Documented</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <button type="submit" class="btn btn-dark" style="float: right;">Submit</button>

    </div>


   </form>
</div>


{{-- /* --------------------------------- modals --------------------------------- */ --}}

<div id="yesModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                        <h4 class="mb-0"><b>Add Coronary Artery ByPasses</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
                @include('cases.coronary')
            </div>
        </div>
    </div>
</div>
{{-- /* ---------------------------------- valve --------------------------------- */ --}}
<div id="valveModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                        <h4 class="mb-0"><b>Valve Surgery</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
                @include('cases.valve-surgery')
            </div>
        </div>
    </div>
</div>

{{-- /* ------------------------------- non cardic ------------------------------- */ --}}

<div id="noncardic" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                        <h4 class="mb-0"><b>Other Non-Cardic Procedure</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
                @include('cases.non-cardic')
            </div>
        </div>
    </div>
</div>

{{-- /* ------------------------------ aortic modal ------------------------------ */ --}}

<div id="aorticModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                        <h4 class="mb-0"><b>Other Aortic Procedure</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
                @include('cases.aortic')
            </div>
        </div>
    </div>
</div>


{{-- /* --------------------------- atrial fibrilation --------------------------- */ --}}
<div id="atrailFilrilate" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                        <h4 class="mb-0"><b>Atrial Fibrilation</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
                @include('cases.atrial-fibrilat')
            </div>
        </div>
    </div>
</div>

{{-- /* -------------------------- cardic assist device -------------------------- */ --}}


<div id="cardicAssist" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                        <h4 class="mb-0"><b>Cardic Assist Devices</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
                @include('cases.cardic-assist-device')
            </div>
        </div>
    </div>
</div>

{{-- /* ------------------------------ other cardic ------------------------------ */ --}}

<div id="otherCardic" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                        <h4 class="mb-0"><b>Other Cardic Procedure</b></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
                @include('cases.other-cardic')
            </div>
        </div>
    </div>
</div>
