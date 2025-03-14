<form action="{{ route('add-other-cardiac-pro') }}" method="post">
    @csrf
    <div class="row form-group mb-3">
        <div class="col-lg-12 form-group mb-3">
            <label for="pat_id">Select Patient</label>
            <select name="pat_id" id="pat_id" class="form-control" required>
                <option value="">Select Patient</option>
                @foreach ($patients as $item)
                <option value="{{ $item->pat_id }}">{{ $item->first_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <label for="" class="mb-2"> AFib Epicardial Lesions </label>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="afib_el" value="1" id="afib_el_yes" />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="afib_el" value="0" id="afib_elno" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <label for="" class="mb-2"> ASD Repair - PFO Type </label>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="asd_pfo" value="1" id="asd_pfo_yes" />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="asd_pfo" value="0" id="asd_pfo_no" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <label for="" class="mb-2"> Atrial Appendage Procedure RAA </label>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <label>
                                <input type="radio" name="aap_raa" value="RAA" id="aap_raa" />
                                <span>RAA</span>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label>
                                <input type="radio" name="aap_raa" value="LAA" id="aap_raa_laa" />
                                <span>LAA</span>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label>
                                <input type="radio" name="aap_raa" value="Both" id="" />
                                <span>Both</span>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label>
                                <input type="radio" name="aap_raa" value="No" id="" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <label for=""> Arrhythmia Device Surgery</label>
            <select name="arr_dev_sur" id="" class="form-select">
                <option value="">Select an option</option>
                <option value="none">None</option>
                <option value="permanent Pacemaker">Permanent Pacemaker</option>
                <option value="Permanent Pacemaker with Cardiac Resynchronization Technique (CRT)">Permanent Pacemaker with Cardiac Resynchronization Technique (CRT)</option>
                <option value="Implantable Cardioverter Defibrillator (ICD)">Implantable Cardioverter Defibrillator (ICD)</option>
                <option value="ICD with CRT">ICD with CRT</option>
                <option value="implantable Recorder">Implantable recorder</option>
            </select>
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <label for="" class="mb-2"> Lead Insertion </label>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="lead_in" value="1" id="" />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="lead_in" value="0" id="" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <label for="" class="mb-2"> Myocardial Stem Cell Therapy </label>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="msc_therapy" value="1" id="" checked />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="msc_therapy" value="0" id="" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <label for="" class="mb-2"> Transmyocardial Laser Revascularization </label>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="tl_rev" value="1" id="" />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="tl_rev" value="0" id="" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <label for="" class="mb-2"> AFib Intracardiac Lesions </label>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="afib_il" value="1" id="" />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="afib_il" value="0" id="" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <label for="" class="mb-2"> ASD Repair-Secundum Or Sinus Venosus </label>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="asd_sv" value="1" id="" />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="asd_sv" value="0" id="" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <label for=""> Arrhythmia Correction Surgery-Lead Extraction</label>
            <select name="arr_correction_ext" id="" class="form-select">
                <option value="">Select an option</option>
                <option value="no">No</option>
                <option value="yesPlanned">Yes, planned</option>
                <option value="yesUnplannedSurgicalComplication">Yes, unplanned due to surgical complication</option>
                <option value="yesUnplannedDiseaseAnatomy">Yes, unplanned due to unsuspected disease or anatomy</option>
            </select>
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <label for="" class="mb-2"> LVA </label>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="lva" value="1" id="" />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="lva" value="0" id="" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <label for="" class="mb-2"> Pulmonary Thromboembolectomy Acute </label>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label>
                                <input type="radio" name="pt_acute" value="Yes, Acute" id="" />
                                <span>Yes, Acute</span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label>
                                <input type="radio" name="pt_acute" value="Yes, Chronic" id="" />
                                <span>Yes, Chronic</span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label>
                                <input type="radio" name="pt_acute" value="No" id="" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-lg-6 col-md-12">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <label for="" class="mb-2"> Subaortic Stenosis Resection </label>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="ss_res" value="1" id="ss_res" />
                                <span>yes</span>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="ss_res" value="0" id="ss_resno" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group mb-3" id="ssr_div" style="display: none;">
        <div class="col-lg-12 col-md-12">
            <div class="title-box mb-3 mt-3">
                <span class="title-label">If Yes</span>
                <label for=""> Subaortic Stenosis Resection Type</label>
                <select name="ssr_type" class="form-select">
                    <option value="">Select an option</option>
                    <option value="muscle">Muscle</option>
                    <option value="ring">Ring</option>
                    <option value="membrane">Membrane</option>
                    <option value="web">Web</option>
                    <option value="notReported">Not reported</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <label for="" class="mb-2"> Surgical Ventricular Restoration </label>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="sv_res" value="1" id="" />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="sv_res" value="0" id="" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <label for=""> Tumor</label>
            <select name="tumor_select" id="" class="form-select">
                <option value="">Select an option</option>
                <option value="myxoma">Myxoma</option>
                <option value="fibroelastoma">Fibroelastoma</option>
                <option value="hypernephroma">Hypernephroma</option>
                <option value="sarcoma">Sarcoma</option>
                <option value="other">Other</option>
                <option value="no">No</option>
            </select>
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <label for="" class="mb-2"> Card Tx </label>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="card_tx" value="1" id="" />
                                <span>yes</span>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="card_tx" value="0" id="" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <label for="" class="mb-2"> Cardiac Trauma </label>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="cardiac_t" value="1" id="" />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="cardiac_t" value="0" id="" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <label for="" class="mb-2"> Congenital </label>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="p_congenital" value="1" id="" />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="p_congenital" value="0" id="" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <label for="" class="mb-2"> Other </label>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="p_other" value="1" id="" checked />
                                <span>yes</span>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label>
                                <input type="radio" name="p_other" value="0" id="" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group mb-3">

        <div class="col-lg-12 col-md-12">
            <label for="" class="mb-2"> VSDCongenital </label>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <label>
                        <input type="radio" name="vsd_con" value="Yes, congenital" id="" checked />
                        <span>Yes, congenital</span>
                    </label>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label>
                        <input type="radio" name="vsd_con" value="Yes, acquired" id="" checked />
                        <span>Yes, acquired</span>
                    </label>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label>
                        <input type="radio" name="vsd_con" value="No" id="" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 text-end">
        <button type="submit" class="btn btn-dark" id="submitBtn">Add Other Cardiac Procedure</button>
    </div>
</form>
