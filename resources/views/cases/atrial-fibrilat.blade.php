<form id="atrial-fibrillationForm" action="{{ route('add-atrial-fibrillation') }}" method="post">
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
    <div class="row form-group mb-2">
        <div class="col-lg-6">
            <label for=""> Epicardial </label>
            <div class="row  mb-3">
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="epicardial_radio" value="Primarily epicardial" id="epicardial" />
                        <span>Primarily epicardial</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="epicardial_radio" value="Primarily Intracardiac" id="epicardials" />
                        <span>Primarily Intracardiac</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <label> Method of Lesion Creation Documented </label>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="mlc_doc" value="1" id="mlc_doc_Yes" />
                        <span>Yes</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="mlc_doc" value="0" id="mlc_doc_No" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>

        </div>
    </div>

    <div class="row" id="radio-frequency" style="display: none;">
        <div class="col-lg-12">
            <div class="title-box mb-3">
                <span class="title-label">If yes</span>
                <div class="row form-group">
                    <div class="col-lg-12">
                        <div class="row mb-2">
                            <div class="col-lg-7 col-md-12">
                                <label for="" class="mb-2"> Radio Frequency </label>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="radio_frequency" value="1" id="radio_frequency_yes" />
                                            <span>Yes</span>
                                        </label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>
                                            <input type="radio" name="radio_frequency" value="0" id="radio_frequencys" checked />
                                            <span>No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="rf_bipolar_div" style="display: none;">
                        <div class="col-lg-12">
                            <div class="title-box mb-2">
                                <span class="title-label">If yes</span>
                                <div class="row">
                                    <div class="col-lg-7 col-md-12">
                                        <label for="" class="mb-2"> Radio Frequency - Bipolar </label>
                                    </div>
                                    <div class="col-lg-5 col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="radio" name="rf_bipolar" value="1" id="rf_bipolar" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div class="col-md-5">
                                                <label>
                                                    <input type="radio" name="rf_bipolar" value="0" id="rf_bipolars" checked />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group mb-2">
                        <div class="col-lg-6">
                            <label for=""> Cut-And-Sew </label>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                        <input type="radio" name="cut_sew" value="1" id="cut_sew" />
                                        <span>Yes</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label>
                                        <input type="radio" name="cut_sew" value="0" id="cut_sews" checked />
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for=""> Cryo </label>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                        <input type="radio" name="cryo" value="1" id="cryos" />
                                        <span>Yes</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label>
                                        <input type="radio" name="cryo" value="0" id="cryos" checked />
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="title-box mb-3">
        <span class="title-label">Atrial Fibrillation Lesion Location</span>

        <div class="row form-group mb-2">
            <div class="col-lg-12">
                <div class="row">

                    @php
                    $checkboxList = [ "Pulmonary Vein Isolation", "Box Lesion", "Inferior Pulmonary Vein Connecting Lesion",
                    "Superior Pulmonary Vein Connecting Lesion", "Posterior Mitral Annular Line", "Pulmonary Vein Connecting Lesion to Anterior Mitral Annulus",
                    "Mitral Valve Cryo Lesion", "LAA Ligation/Removal", "Pulmonary Vein to LAA", "Intercaval Line to Tricuspid Annulus ('T' lesion)",
                    "Tricuspid Cryo Lesion, Medial (10)", "Intercaval Line", "Tricuspid Annular Line to RAA",
                    "Tricuspid Cryo Lesion (13)", "RAA Ligation/Removal", "RAA Lateral Wall (Short)",
                    "RAA Lateral Wall to 'T' Lesion", "Other" ];

                    // Split the list into two equal parts
                    $half = ceil(count($checkboxList) / 2);
                    $firstColumn = array_slice($checkboxList, 0, $half);
                    $secondColumn = array_slice($checkboxList, $half);
                    @endphp

                    <div class="container">
                        <label><strong>Select Procedures:</strong></label>
                        <div class="row">
                            <div class="col-md-6">
                                @foreach($firstColumn as $index => $checkbox)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox{{ $index }}" name="procedures[]" value="{{ $checkbox }}">
                                    <label class="form-check-label" for="checkbox{{ $index }}">{{ $checkbox }}</label>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                @foreach($secondColumn as $index => $checkbox)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox{{ $index + $half }}" name="procedures[]" value="{{ $checkbox }}">
                                    <label class="form-check-label" for="checkbox{{ $index + $half }}">{{ $checkbox }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 text-end">
        <button type="submit" class="btn btn-dark" id="submitBtn">Add Atrial Fibrillation</button>
    </div>
</form>
