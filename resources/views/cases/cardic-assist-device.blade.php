<!-- <form id="cardic-dev-form" action="{{ route('add-cardic-dev') }}" method="post"> -->
<form id="cardic-dev-form">
    @csrf

    iiiaab
    <div class="col-lg-12 form-group mb-3">
        <label for="pat_id">Select Patient</label>
        <select name="pat_id" id="pat_id" class="form-select" required>
            <option value="">Select Patient</option>
            @foreach ($patients as $item)
            <option value="{{ $item->pat_id }}">{{ $item->first_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="row form-group mb-2">
        <div class="col-lg-12">
            <label for=""> Intra-Aortic Balloon Pump </label>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label>
                        <input type="radio" name="iab_pump" value="1" id="iab_pump" />
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="iab_pump" value="0" id="iab_pumpno" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div id="iabp_div" style="display: none;">
        <div class="title-box mb-3">
            <span class="title-label">If yes</span>
            <div class="row form-group mb-2">
                <div class="col-lg-6">
                    <label for=""> IABP Insertion </label>
                    <select name="iabp_insertion" class="form-select">
                        <option value="">Select an option</option>
                        <option value="Preop">Preop</option>
                        <option value="Intraop">Intraop</option>
                        <option value="Postop">Postop</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label for=""> Primary Reason for Insertion </label>
                    <select name="iabp_reason" class="form-select">
                        <option value="">Select an option</option>
                        <option value="Hemodyn Instability">Hemodyn Instability</option>
                        <option value="Procedural Support">Procedural Support</option>
                        <option value="Unstable Angina">Unstable Angina</option>
                        <option value="Cardiopulmonary Bypass (CPB) Weaning Failure">Cardiopulmonary Bypass (CPB) Weaning Failure</option>
                        <option value="Prophylactic">Prophylactic</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
        </div>
    </div>


    <div class="row form-group mb-2">
        <div class="col-lg-12">
            <label for=""> Catheter Based Assist Device Used </label>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label>
                        <input type="radio" name="cbad_use" value="1" id="cbad_use" />
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="cbad_use" value="0" id="cbad_useno" checked />
                        <span>Yes</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div id="cbad_div" style="display: none;">
        <div class="title-box mb-3">
            <span class="title-label">If yes</span>
            <div class="row form-group mb-2">
                <div class="col-lg-4">
                    <label for=""> Type </label>
                    <select name="cbad_type" class="form-select">
                        <option value="">Select an option</option>
                        <option value="RV">RV</option>
                        <option value="LV">LV</option>
                        <option value="BiVAD">BiVAD</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for=""> When Inserted </label>
                    <select name="cbad_inserted" class="form-select">
                        <option value="">Select an option</option>
                        <option value="Preop">Preop</option>
                        <option value="Intraop">Intraop</option>
                        <option value="Postop">Postop</option>
                        <option value="Non-Operative">Non-Operative</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for=""> Primary Reason for Insertion </label>
                    <select name="cbad_reason" class="form-select">
                        <option value="">Select an option</option>
                        <option value="Hemodyn Instability">Hemodyn Instability</option>
                        <option value="CBP Weaning Failure">Cardiopulmonary Bypass (CPB) Weaning Failure</option>
                        <option value="PCI Failure">PCI Failure</option>
                        <option value="Procedural Support">Procedural Support</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
        </div>
    </div>


    <div class="row form-group mb-3">
        <div class="col-lg-12">
            <label for="ecmo-select"> ECMO </label>
            <select name="ecmo_sel" id="ecmo-select" class="form-select">
                <option value="">Select an option</option>
                <option value="Veno-venous">Veno-venous</option>
                <option value="Veno-arterial">Veno-arterial</option>
                <option value="Veno-venous converted to Veno-arterial">Veno-venous converted to Veno-arterial</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>

    <div id="ecmo-div" style="display: none">
        <div class="title-box mb-3">
            <span class="title-label">If yes</span>
            <div class="row form-group mb-2">
                <div class="col-lg-6">
                    <label for=""> ECMO Initiated </label>
                    <select name="ecmo_initiated" class="form-select">
                        <option value="">Select an option</option>
                        <option value="Preop">Preop</option>
                        <option value="Intraop">Intraop</option>
                        <option value="Postop">Postop</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label for=""> Clinical Indication for ECMO </label>
                    <select name="ecmo_clinical" class="form-select">
                        <option value="">Select an option</option>
                        <option value="Cardiac Failure">Cardiac Failure</option>
                        <option value="Respiratory Failure">Respiratory Failure</option>
                        <option value="Hypothermia Rescue/salvage">Hypothermia Rescue/salvage</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
        </div>
    </div>


    <div class="row form-group mb-2">
        <div class="col-lg-12">
            <label for=""> Was patient admitted with VAD </label>
            <div class="row  mb-3">
                <div class="col-md-4">
                    <label>
                        <input type="radio" name="wpa_vad" value="1" id="wpa_vad" />
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="wpa_vad" value="0" id="wpa_vadno" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div id="vad_maindiv" style="display: none;">
        <div class="title-box mb-3">
            <span class="title-label">If yes</span>
            <div class="row form-group mb-2">
                <div class="col-lg-12">
                    <label for=""> Previous VAD implanted at another facility </label>
                    <div class="row  mb-3">
                        <div class="col-md-4">
                            <label>
                                <input type="radio" name="piaf_vad" value="1" id="" />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label>
                                <input type="radio" name="piaf_vad" value="0" id="" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row form-group mb-2">
                <div class="col-lg-4 mb-3">
                    <label for="">Insertion date</label>
                    <input type="date" name="vad_date_ins" class="form-control" value="{{ now()->format('Y-m-d') }}">
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="">Device Model Number</label>
                    <input type="text" name="vad_dev_model" maxlength="50" class="form-control">
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="">UDI</label>
                    <input type="text" name="vad_udi" class="form-control">
                </div>
                <!--  -->
                <div class="row form-group mb-2">
                    <div class="col-lg-6">
                        <label for=""> Indication </label>
                        <select name="vad_indication" id="" class="form-select">
                            <option value="">Select an option</option>
                            <option value="Bridge to Transplantation Bridge to Recovery">Bridge to Transplantation Bridge to Recovery</option>
                            <option value="Destination">Destination</option>
                            <option value="Post Cardiotomy Ventricular Failure">Post Cardiotomy Ventricular Failure</option>
                            <option value="Device Malfunction">Device Malfunction</option>
                            <option value="End of (Device) Life">End of (Device) Life</option>
                            <option value="Salvage">Salvage</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for=""> Type </label>
                        <select name="vad_type" id="" class="form-select">
                            <option value="">Select an option</option>
                            <option value="RVAD">RVAD</option>
                            <option value="LVAD">LVAD</option>
                            <option value="BIVAD">BIVAD</option>
                            <option value="TAH">TAH</option>
                        </select>
                    </div>
                </div>

                <!--  -->
                <div class="row form-group mb-2" id="">
                    <div class="col-lg-12">
                        <label for=""> Previous VAD Explanted During This Admission </label>
                        <div class="row mb-3">
                            <div class="col-lg-4 col-6">
                                <label>
                                    <input type="radio" name="peda_vad" value="Yes, not during this procedure" id="peda_vad" />
                                    <span>Yes, not during this procedure</span>
                                </label>
                            </div>
                            <div class="col-lg-4 col-6">
                                <label>
                                    <input type="radio" name="peda_vad" value="Yes, during this procedure" id="peda_vadyes" />
                                    <span>Yes, during this procedure</span>
                                </label>
                            </div>
                            <div class="col-lg-4 col-6">
                                <label>
                                    <input type="radio" name="peda_vad" value="No" id="peda_vadno" checked />
                                    <span>No</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row form-group mb-2">
                <div id="if_vad_yes_during" style="display: none;">
                    <div class="col-lg-12">
                        <div class="title-box mb-3">
                            <span class="title-label">If yes</span>
                            <label for=""> Timing </label>
                            <select name="vad_timing" id="" class="form-select mb-1">
                                <option value="">Select an option</option>
                                <option value="Cardiac transplant">Cardiac transplant</option>
                                <option value="Recovery">Recovery</option>
                                <option value="Device transfer">Device transfer</option>
                                <option value="Device-related infection">Device-related infection</option>
                                <option value="Device malfunction">Device malfunction</option>
                                <option value="End of (device) life">End of (device) life</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="if_vad_yes" style="display: none;">
                    <div class="col-lg-12">
                        <div class="title-box mb-3">
                            <span class="title-label">If yes, not during this procedure</span>
                            <label class="form-label">Date</label>
                            <input type="date" name="vad_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  -->
    <div class="row form-group mb-2">
        <div class="col-lg-12">
            <label for=""> Ventricular Assist Device Implanted during this hospitalization </label>
            <div class="row  mb-3">
                <div class="col-md-4">
                    <label>
                        <input type="radio" name="vadid_hos" value="1" id="vadid_hos" />
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="vadid_hos" value="0" id="vadid_hosno" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div id="vadid_hos_maindiv" style="display: none;">
        <div class="title-box mb-3">
            <span class="title-label">If yes</span>
            <div class="row form-group mb-2">
                <div class="col-lg-4">
                    <label for=""> Timing </label>
                    <select name="vadidh_timing" id="" class="form-select">
                        <option value="">Select an option</option>
                        <option value="Pre-operative (during same hospitalization but not same OR trip as CV surgical procedure)">Pre-operative (during same hospitalization but not same OR trip as CV surgical procedure)</option>
                        <option value="Stand-alone VAD procedure">Stand-alone VAD procedure</option>
                        <option value="In conjunction with CV surgical procedure (same trip to the OR) - planned">In conjunction with CV surgical procedure (same trip to the OR) - planned</option>
                        <option value="In conjunction with CV surgical procedure (same trip to the OR) - unplanned">In conjunction with CV surgical procedure (same trip to the OR) - unplanned</option>
                        <option value="Post-operative (after surgical procedure during reoperation)">Post-operative (after surgical procedure during reoperation)</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for=""> Indication </label>
                    <select name="vadidh_indication" id="" class="form-select">
                        <option value="">Select an option</option>
                        <option value="Bridge to Transplantation">Bridge to Transplantation</option>
                        <option value="Bridge to Recovery">Bridge to Recovery</option>
                        <option value="Destination">Destination</option>
                        <option value="Post Cardiotomy Ventricular Failure">Post Cardiotomy Ventricular Failure</option>
                        <option value="Device Malfunction">Device Malfunction</option>
                        <option value="End of (Device) Life">End of (Device) Life</option>
                        <option value="Salvage">Salvage</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for=""> Type </label>
                    <select name="vadidh_type" id="" class="form-select">
                        <option value="">Select an option</option>
                        <option value="Right VAD (RVAD)">Right VAD (RVAD)</option>
                        <option value="Left VAD (LVAD)">Left VAD (LVAD)</option>
                        <option value="Biventricular VAD (BIVAD)">Biventricular VAD (BIVAD)</option>
                        <option value="Total Artificial Heart (TAH)">Total Artificial Heart (TAH)</option>
                    </select>
                </div>
            </div>

            <div class="row form-group mb-2">
                <div class="col-lg-4 mb-3">
                    <label for="">Device</label>
                    <input type="text" name="vadidh_device" class="form-control" maxlength="50">
                </div>

                <div class="col-lg-4 mb-3">
                    <label for="">Initial implant Implant Date</label>
                    <input type="date" name="vadidh_initial_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                </div>

                <div class="col-lg-4 mb-3">
                    <label for="">UDI</label>
                    <input type="text" name="vadidh_udi" class="form-control" maxlength="50">
                </div>
            </div>


            <!--  -->
            <div class="row form-group mb-2">
                <div class="col-lg-12">
                    <label for=""> VAD was explanted </label>
                    <div class="row  mb-3">
                        <div class="col-lg-4 col-md-6">
                            <label>
                                <input type="radio" name="vadidh_vad_exp" value="Yes, not during this procedure" id="vad_exp" />
                                <span>Yes, not during this procedure</span>
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label>
                                <input type="radio" name="vadidh_vad_exp" value="1, during this procedure" id="vad_expyes" />
                                <span>Yes, during this procedure</span>
                            </label>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label>
                                <input type="radio" name="vadidh_vad_exp" value="0" id="vad_expno" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row form-group mb-2">
                <div id="vadidh_if_yes" style="display: none;">
                    <div class="col-lg-12">
                        <div class="title-box mb-3">
                            <span class="title-label">If yes</span>
                            <label for=""> Reason </label>
                            <select name="vadidh_reason" id="" class="form-select mb-1">
                                <option value="">Select an option</option>
                                <option value="Cardiac transplant">Cardiac transplant</option>
                                <option value="Recovery">Recovery</option>
                                <option value="Device transfer">Device transfer</option>
                                <option value="Device-related infection">Device-related infection</option>
                                <option value="Device malfunction">Device malfunction</option>
                                <option value="End of (device) life">End of (device) life</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="vadidh_if_no" style="display: none;">
                    <div class="col-lg-12">
                        <div class="title-box mb-3">
                            <span class="title-label">If yes, not during this procedure</span>
                            <label class="form-label">Date</label>
                            <input type="date" name="vadidh_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!--  -->
    <div class="row form-group mb-2">
        <div class="col-lg-12">
            <label for=""> 2nd device implanted? </label>
            <div class="row  mb-3">
                <div class="col-md-4">
                    <label>
                        <input type="radio" name="sec_di" value="1" id="sec_di" />
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="sec_di" value="0" id="sec_dino" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="second_device_fields" style="display: none;">
        <div class="col-lg-12">
            <div class="title-box mb-3">
                <span class="title-label">If yes</span>
                <div class="row form-group mb-2">
                    <div class="col-lg-4">
                        <label for=""> Timing </label>
                        <select name="sec_timing" id="" class="form-select">
                            <option value="">Select an option</option>
                            <option value="Pre-operative (during same hospitalization but not same OR trip as CV surgical procedure)">Pre-operative (during same hospitalization but not same OR trip as CV surgical procedure)</option>
                            <option value="Stand-alone VAD procedure">Stand-alone VAD procedure</option>
                            <option value="In conjunction with CV surgical procedure (same trip to the OR) - planned">In conjunction with CV surgical procedure (same trip to the OR) - planned</option>
                            <option value="In conjunction with CV surgical procedure (same trip to the OR) - unplanned">In conjunction with CV surgical procedure (same trip to the OR) - unplanned</option>
                            <option value="Post-operative (after surgical procedure during reoperation)">Post-operative (after surgical procedure during reoperation)</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for=""> Indication </label>
                        <select name="sec_indication" id="" class="form-select">
                            <option value="">Select an option</option>
                            <option value="Bridge to Transplantation">Bridge to Transplantation</option>
                            <option value="Bridge to Recovery">Bridge to Recovery</option>
                            <option value="Destination">Destination</option>
                            <option value="Post Cardiotomy Ventricular Failure">Post Cardiotomy Ventricular Failure</option>
                            <option value="Device Malfunction">Device Malfunction</option>
                            <option value="End of (Device) Life">End of (Device) Life</option>
                            <option value="Salvage">Salvage</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for=""> Type </label>
                        <select name="sec_type" id="" class="form-select">
                            <option value="">Select an option</option>
                            <option value="Right VAD (RVAD)">Right VAD (RVAD)</option>
                            <option value="Left VAD (LVAD)">Left VAD (LVAD)</option>
                            <option value="Biventricular VAD (BIVAD)">Biventricular VAD (BIVAD)</option>
                            <option value="Total Artificial Heart (TAH)">Total Artificial Heart (TAH)</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group mb-2">
                    <div class="col-lg-4 mb-3">
                        <label for="">Device</label>
                        <input type="text" name="sec_device" class="form-control" maxlength="50">
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="">2nd device Implant Date</label>
                        <input type="date" name="sec_implant_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="">UDI</label>
                        <input type="text" name="sec_udi" class="form-control" maxlength="50">
                    </div>
                </div>


                <!--  -->
                <div class="row form-group mb-2">
                    <div class="col-lg-12">
                        <label for=""> VAD was explanted </label>
                        <div class="row  mb-3">
                            <div class="col-lg-4 col-md-6">
                                <label>
                                    <input type="radio" name="sec_vad_expl" value="Yes, not during this procedure" id="vad_expl" />
                                    <span>Yes, not during this procedure</span>
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label>
                                    <input type="radio" name="sec_vad_expl" value="Yes, during this procedure" id="vad_explyes" />
                                    <span>Yes, during this procedure</span>
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label>
                                    <input type="radio" name="sec_vad_expl" value="No" id="vad_explno" checked />
                                    <span>No</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row form-group mb-2">
                    <div id="sec_if_yes_during" style="display: none;">
                        <div class="col-lg-12">
                            <div class="title-box mb-3">
                                <span class="title-label">If yes</span>
                                <label for=""> Reason </label>
                                <select name="sec_reason" id="" class="form-select mb-1">
                                    <option value="">Select an option</option>
                                    <option value="Cardiac transplant">Cardiac transplant</option>
                                    <option value="Recovery">Recovery</option>
                                    <option value="Device transfer">Device transfer</option>
                                    <option value="Device-related infection">Device-related infection</option>
                                    <option value="Device malfunction">Device malfunction</option>
                                    <option value="End of (device) life">End of (device) life</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="sec_if_yes" style="display: none;">
                        <div class="col-lg-12">
                            <div class="title-box mb-3">
                                <span class="title-label">If yes, not during this procedure</span>
                                <label class="form-label">Date</label>
                                <input type="date" name="sec_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!--  -->
    <div class="row form-group mb-2">
        <div class="col-lg-12">
            <label for=""> 3rd device implanted? </label>
            <div class="row  mb-3">
                <div class="col-md-4">
                    <label>
                        <input type="radio" name="th_dev_imp" value="1" id="th_dev_imp" />
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="th_dev_imp" value="0" id="th_dev_impno" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="timing_div" style="display: none;">
        <div class="col-lg12">
            <div class="title-box mb-3">
                <span class="title-label">If yes</span>
                <div class="row form-group mb-2">
                    <div class="col-lg-4">
                        <label for=""> Timing </label>
                        <select name="th_timing" id="" class="form-select">
                            <option value="">Select an option</option>
                            <option value="Pre-operative (during same hospitalization but not same OR trip as CV surgical procedure)">Pre-operative (during same hospitalization but not same OR trip as CV surgical procedure)</option>
                            <option value="Stand-alone VAD procedure">Stand-alone VAD procedure</option>
                            <option value="In conjunction with CV surgical procedure (same trip to the OR) - planned">In conjunction with CV surgical procedure (same trip to the OR) - planned</option>
                            <option value="In conjunction with CV surgical procedure (same trip to the OR) - unplanned">In conjunction with CV surgical procedure (same trip to the OR) - unplanned</option>
                            <option value="Post-operative (after surgical procedure during reoperation)">Post-operative (after surgical procedure during reoperation)</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for=""> Indication </label>
                        <select name="th_indication" id="" class="form-select">
                            <option value="">Select an option</option>
                            <option value="Bridge to Transplantation">Bridge to Transplantation</option>
                            <option value="Bridge to Recovery">Bridge to Recovery</option>
                            <option value="Destination">Destination</option>
                            <option value="Post Cardiotomy Ventricular Failure">Post Cardiotomy Ventricular Failure</option>
                            <option value="Device Malfunction">Device Malfunction</option>
                            <option value="End of (Device) Life">End of (Device) Life</option>
                            <option value="Salvage">Salvage</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for=""> Type </label>
                        <select name="th_type" id="" class="form-select">
                            <option value="">Select an option</option>
                            <option value="Right VAD (RVAD)">Right VAD (RVAD)</option>
                            <option value="Left VAD (LVAD)">Left VAD (LVAD)</option>
                            <option value="Biventricular VAD (BIVAD)">Biventricular VAD (BIVAD)</option>
                            <option value="Total Artificial Heart (TAH)">Total Artificial Heart (TAH)</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group mb-2">
                    <div class="col-lg-4 mb-3">
                        <label for="">Device</label>
                        <input type="text" name="th_device" class="form-control" maxlength="50">
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="">3nd device Implant Date</label>
                        <input type="date" name="th_implant_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="">UDI</label>
                        <input type="text" name="th_udi" class="form-control" maxlength="50">
                    </div>
                </div>


                <!--  -->
                <div class="row form-group mb-2">
                    <div class="col-lg-12">
                        <label for=""> VAD was explanted </label>
                        <div class="row  mb-3">
                            <div class="col-lg-4 col-md-6">
                                <label>
                                    <input type="radio" name="th_vad_expla" value="Yes, not during this procedure" id="vad_expla" />
                                    <span>Yes, not during this procedure</span>
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label>
                                    <input type="radio" name="th_vad_expla" value="Yes, during this procedure" id="vad_explayes" />
                                    <span>Yes, during this procedure</span>
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label>
                                    <input type="radio" name="th_vad_expla" value="No" id="vad_explano" checked />
                                    <span>No</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row form-group mb-2">
                    <div id="if_yes_during" style="display: none;">
                        <div class="col-lg-12">
                            <div class="title-box mb-3">
                                <span class="title-label">If yes</span>
                                <label for=""> Reason </label>
                                <select name="th_reason" id="" class="form-select mb-1">
                                    <option value="">Select an option</option>
                                    <option value="Cardiac transplant">Cardiac transplant</option>
                                    <option value="Recovery">Recovery</option>
                                    <option value="Device transfer">Device transfer</option>
                                    <option value="Device-related infection">Device-related infection</option>
                                    <option value="Device malfunction">Device malfunction</option>
                                    <option value="End of (device) life">End of (device) life</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="if_yes_not_during" style="display: none;">
                        <div class="col-lg-12">
                            <div class="title-box mb-3">
                                <span class="title-label">If yes, not during this procedure</span>
                                <label class="form-label">Date</label>
                                <input type="date" name="th_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!--  -->
    <div class="row form-group mb-2">
        <div class="col-lg-12">
            <label for=""> Complications related to Mechanical Assist Device(s) </label>
            <div class="row  mb-3">
                <div class="col-lg-4 col-md-6">
                    <label>
                        <input type="radio" name="crma_dev" value="Yes, not during this procedure" id="crma_dev" />
                        <span>Yes, not during this procedure</span>
                    </label>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label>
                        <input type="radio" name="crma_dev" value="Yes, during this procedure" id="crma_devyes" />
                        <span>Yes, during this procedure</span>
                    </label>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label>
                        <input type="radio" name="crma_dev" value="No" id="crma_devno" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="complication_div" style="display: none;">
        <div class="col-lg-12">
            <div class="title-box mb-3">
                <span class="title-label">If yes</span>
                <div class="row form-group mb-2">
                    <div class="col-lg-4">
                        <label for=""> 1st Complication </label>
                        <select name="first_complication" id="" class="form-select mb-1">
                            <option value="">Select an option</option>
                            <option value="Cannula insertion site issue">Cannula insertion site issue</option>
                            <option value="Cardiac">Cardiac</option>
                            <option value="GI">GI</option>
                            <option value="Hemorrhagic">Hemorrhagic</option>
                            <option value="Hemolytic">Hemolytic</option>
                            <option value="Infection">Infection</option>
                            <option value="Metabolic">Metabolic</option>
                            <option value="Neurologic">Neurologic</option>
                            <option value="Pulmonary">Pulmonary</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label for=""> 2nd Complication </label>
                        <select name="second_complication" id="" class="form-select mb-1">
                            <option value="">Select an option</option>
                            <option value="No additional complications">No additional complications</option>
                            <option value="Cannula / insertion site issue">Cannula / insertion site issue</option>
                            <option value="Cardiac">Cardiac</option>
                            <option value="GI">GI</option>
                            <option value="Hemorrhagic">Hemorrhagic</option>
                            <option value="Hemolytic">Hemolytic</option>
                            <option value="Infection">Infection</option>
                            <option value="Metabolic">Metabolic</option>
                            <option value="Neurologic">Neurologic</option>
                            <option value="Pulmonary">Pulmonary</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label for=""> 3rd Complication </label>
                        <select name="third_complication" id="" class="form-select mb-1">
                            <option value="">Select an option</option>
                            <option value="No additional complications">No additional complications</option>
                            <option value="Cannula / insertion site issue">Cannula / insertion site issue</option>
                            <option value="Cardiac">Cardiac</option>
                            <option value="GI">GI</option>
                            <option value="Hemorrhagic">Hemorrhagic</option>
                            <option value="Hemolytic">Hemolytic</option>
                            <option value="Infection">Infection</option>
                            <option value="Metabolic">Metabolic</option>
                            <option value="Neurologic">Neurologic</option>
                            <option value="Pulmonary">Pulmonary</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 text-end">
        <button type="submit" class="btn btn-dark" id="acadBtn">Add Cardic Assist Devices</button>
    </div>
</form>
