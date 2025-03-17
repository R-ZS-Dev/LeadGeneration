<form id="aortic-pro-form" action="{{ route('add-aortic-procedure') }}" method="post">
    @csrf
    <div class="col-lg-12 form-group mb-3">
        <label for="pat_id">Select Patient</label>
        <select name="pat_id" id="pat_id" class="form-control" required>
            <option value="">Select Patient</option>
            @foreach ($patients as $item)
            <option value="{{ $item->pat_id }}">{{ $item->first_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="title-box mb-3">
        <span class="title-label">Other Aortic Location</span>

        <div class="row form-group mb-3">
            <div class="col-lg-6 col-md-6">
                <div class="row">
                    <div class="col-lg-7 col-md-12">
                        <label for="" class="mb-2"> Root </label>
                    </div>
                    <div class="col-lg-5 p-0 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="root" value="1" id="root" />
                                    <span>yes</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="root" value="0" id="rootno" checked />
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
                        <label for="" class="mb-2"> Ascending </label>
                    </div>
                    <div class="col-lg-5 p-0 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="ascending" value="1" id="ascending" />
                                    <span>Yes</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="ascending" value="0" id="ascendingno" checked />
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
                        <label for="" class="mb-2"> Hemi-Arch </label>
                    </div>
                    <div class="col-lg-5 p-0 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="hemi_arch" value="1" id="hemi_arch" />
                                    <span>yes</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="hemi_arch" value="0" id="hemi_archno" checked />
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
                        <label for="" class="mb-2"> Total Arch </label>
                    </div>
                    <div class="col-lg-5 p-0 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="total_arch" value="1" id="total_arch" />
                                    <span>yes</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="total_arch" value="0" id="total_archno" checked />
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
                        <label for="" class="mb-2"> Descending Proximal </label>
                    </div>
                    <div class="col-lg-5 p-0 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="descending_proximal" value="1" id="descending_proximal" />
                                    <span>yes</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="descending_proximal" value="0" id="descending_proximalno" checked />
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
                        <label for="" class="mb-2"> Descending - Mid </label>
                    </div>
                    <div class="col-lg-5 p-0 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="descending_mid" value="1" id="descending_mid" />
                                    <span>Yes</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="descending_mid" value="0" id="descending_midno" checked />
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
                        <label for="" class="mb-2"> Descending Distal </label>
                    </div>
                    <div class="col-lg-5 p-0 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="descending_distal" value="1" id="descending_distal" />
                                    <span>Yes</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="descending_distal" value="0" id="descending_distalno" checked />
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
                        <label for="" class="mb-2"> Thoracoabdominal </label>
                    </div>
                    <div class="col-lg-5 p-0 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="thoracoabdominal" value="1" id="thoracoabdominal" checked />
                                    <span>Yes</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="thoracoabdominal" value="0" id="thoracoabdominalno" checked />
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
        <div class="col-lg-7 col-md-12">
            <label for="" class="mb-2"> Aortic Procedure Synthetic Graft Used </label>
        </div>
        <div class="col-lg-5 p-0 col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="apsg_use" value="1" id="apsg_use_yes" />
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="apsg_use" value="0" id="apsg_use_no" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="apsg-use" style="display: none;">
        <div class="title-box mb-3">
            <span class="title-label">If yes</span>
            <div class="row form-group mb-2">
                <div class="col-lg-4">
                    <label for=""> Intercostal Vessels Re-implanted </label>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="iv_ri" value="1" id="iv_ri" />
                                    <span>Yes</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="iv_ri" value="0" id="iv_rino" checked />
                                    <span>No</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <label for=""> CSF Drainage Utilized </label>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="csf_du" value="1" id="csf_du" />
                                    <span>Yes</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="csf_du" value="0" id="csf_duno" checked />
                                    <span>No</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <label for=""> Elephant Trunk </label>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="el_trunk" value="1" id="el_trunk" />
                                    <span>Yes</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="el_trunk" value="0" id="el_trunkno" checked />
                                    <span>No</span>
                                </label>
                            </div>
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
                    <label for="" class="mb-2"> Coil Embolization of Aortic False Lumen </label>
                </div>
                <div class="col-lg-5 p-0 col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <label>
                                <input type="radio" name="ceaf_lumen" value="1" id="ceaf_lumen" />
                                <span>yes</span>
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label>
                                <input type="radio" name="ceaf_lumen" value="0" id="ceaf_lumenno" checked />
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
                    <label for="" class="mb-2"> Aortic Procedure - Other </label>
                </div>
                <div class="col-lg-5 p-0 col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <label>
                                <input type="radio" name="ap_other" value="1" id="ap_other" />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label>
                                <input type="radio" name="ap_other" value="0" id="ap_otherno" checked />
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group mb-2">
        <div class="col-lg-12">
            <label for=""> Aortic Procedure TEVAR </label>
            <div class="row  mb-3">
                <div class="col-lg-4 col-md-6">
                    <label>
                        <input type="radio" name="ap_tevar" value="Yes, with debranching" id="ap_tevar" />
                        <span>Yes, with debranching</span>
                    </label>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label>
                        <input type="radio" name="ap_tevar" value="Yes, with debranching" id="ap_tevaryes" />
                        <span>Yes, without debranching</span>
                    </label>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label>
                        <input type="radio" name="ap_tevar" value="No" id="ap_tevarno" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 text-end">
        <button type="submit" class="btn btn-dark" id="submitBtn">Add Other Aortic Procedure</button>
    </div>
</form>
