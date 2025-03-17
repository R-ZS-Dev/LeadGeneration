<form id="cabypassForm" action="{{ route('add-cabypasses') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12 form-group mb-3">
            <label for="pet_id">Select Patient</label>
            <select name="pet_id" id="pet_id" class="form-control" required>
                <option value="">Select Patient</option>
                @foreach ($patient as $item)
                <option value="{{ $item->pat_id }}"
                    {{ session('pat_id') == $item->pat_id ? 'selected' : '' }}>
                    {{ $item->first_name }}
                </option>
            @endforeach
            </select>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">Number of Distal Anastomoses with Arterial
                    Conduits</label>
                <input type="text" name="cab_arterial" class="form-control" required>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">Number of Distal Anastomoses with Venous
                    Conduits</label>
                <input type="number" name="cab_venous" id="numberInput" class="form-control">
            </div>
        </div>

        <div class="col-lg-12">
            <div class="custom-border-box-text position-relative">
                <div class="custom-label-text">If > 0</div>
                <div class="col-lg-12 form-group">
                    <label class="text-dark" for="">Vein Harvest Technique</label>
                    <select id="veinSelect" name="cab_htechniques" class="form-control" disabled>
                        <option value="">Select an option</option>
                        <option value="Endoscopic">Endoscopic</option>
                        <option value="Direct Vision (open)">Direct Vision (open)</option>
                        <option value="Both">Both</option>
                        <option value="Cryopreserved">Cryopreserved</option>
                    </select>
                </div>

                <div class="col-lg-12 mt-4">
                    <div class="custom-border-box-text position-relative">
                        <div class="custom-label-text ">If Endoscopic, Direct Vision (open), or
                            Both</div>
                        <div class="mb-3">
                            <label class="form-label">Start Time</label>
                            <input type="time" name="cab_htime" id="veinPrepTime" class="form-control"
                                value="{{ now()->format('H:i') }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="col-lg-12 form-group mt-3">
                <label for="" class="text-dark">Internal Mammary Artery used for
                    Grafts</label>
                <select id="imaSelect" name="cab_ima_options" class="form-control">
                    <option value="">Select an option</option>
                    <option value="Left IMA">1. Left IMA</option>
                    <option value="Right IMA">2. Right IMA</option>
                    <option value="Both IMAS">3. Both IMAS</option>
                    <option value="No IMA">4. No IMA</option>
                </select>
            </div>

            <div class="custom-border-box-text position-relative mt-4">
                <div class="custom-label-text">If No IMA</div>
                <div class="col-lg-12 form-group">
                    <label for="" class="text-dark">Indicate Primary Reason</label>
                    <select id="primaryReasonSelect" name="cab_ima_preson" class="form-control" disabled>
                        <option value="">Select an option</option>
                        <option value="Subclavian stenosis">2. Subclavian stenosis</option>
                        <option value="Previous cardiac or thoracic surgery">3. Previous cardiac or thoracic surgery
                        </option>
                        <option value="Previous mediastinal radiation">4. Previous mediastinal radiation</option>
                        <option value="Emergent or salvage procedure">5. Emergent or salvage procedure</option>
                        <option value="No LAD disease">6. No LAD disease</option>
                        <option value="Other">7. Other</option>
                    </select>
                </div>
            </div>

            <div id="imaDetailsDiv" class="custom-border-box-text position-relative mt-4" style="display: none;">
                <div class="custom-label-text">If Left, Right or Both IMAs</div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Total # of Distal Anastomoses done using IMA grafts</label>
                        <input type="text" name="cab_ima_anastomoses" id="distalAnastomosesInput"
                            class="form-control" disabled>
                    </div>
                </div>
                <div class="col-lg-12 form-group mb-3">
                    <label class="text-dark">IMA Harvest Technique</label>
                    <select id="harvestTechniqueSelect" name="cab_ima_htechniques" class="form-control" disabled>
                        <option value="">Select an option</option>
                        <option value="Direct Vision">2. Direct Vision (open)</option>
                        <option value="Thoracoscopy">3. Thoracoscopy</option>
                        <option value="Combination">4. Combination</option>
                        <option value="Robotic Assisted">5. Robotic Assisted</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="col-lg-12 mt-4">
            <div class="mb-3">
                <label class="form-label">Number of Radial Arteries Used for Grafts</label>
                <input type="text" name="cab_radial_arteries" id="radialArteriesInput" class="form-control"
                    value="">
            </div>
        </div>

        <div class="col-lg-12">
            <div class="custom-border-box-text position-relative mt-4" id="radialArterySection">
                <div class="custom-label-text">If > 0</div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Number of Radial Artery Distal Anastomoses</label>
                        <input type="text" name="cab_radial_distal" id="distalAnastomoses" class="form-control"
                            value="" disabled>
                    </div>
                </div>
                <div class="col-lg-12 form-group mb-3">
                    <label for="" class="text-dark">Radial Distal Anastomoses Harvest
                        Technique</label>
                    <select id="harvestTechnique" name="cab_distal_hanastomoses" class="form-control" disabled>
                        <option value="">Select an option</option>
                        <option value="Endoscopic">1. Endoscopic</option>
                        <option value="Direct Vision (open)">2. Direct Vision (open)</option>
                        <option value="Both">3. Both</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Radial Artery Harvest and Prep Time</label>
                        <input type="time" id="prepTime" name="cab_radial_time" class="form-control"
                            value="{{ now()->format('H:i') }}" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mt-4">
            <div class="mb-3">
                <label class="form-label">Number Other Arterial Distal Anastomoses
                    Used</label>
                <input type="text" name="cab_distal_anastomoses" class="form-control">
            </div>
        </div>
        <div class="col-lg-12 form-group mb-3">
            <label for="" class="text-dark">Proximal Technique</label>
            <select name="cab_proximal" id="" class="form-control">
                <option value="">Select an option</option>
                <option value="Single Cross Clamp">1. Single Cross Clamp</option>
                <option value="Partial Occlusion Clamp">2. Partial Occlusion Clamp</option>
                <option value="Anastomotic Assist Device">3. Anastomotic Assist Device</option>
            </select>
        </div>

        <div class="col-lg-12">
            <div id="imaDetailsDiv" class="custom-border-box-text mt-4">
                <div class="custom-label-text">Insertion Editor</div>
                <div class="col-lg-12 form-group mb-3">
                    <label class="text-dark">Distal Insertion Site Current</label>
                    <select name="cab_ins_distal" class="form-control">
                        <option value="">Select an option</option>
                        <option value="RCA">1 RCA</option>
                        <option value="Acute Marginal (AM)">2 Acute Marginal (AM)</option>
                        <option value="Posterior Descending (PDA)">3 Posterior Descending (PDA)
                        </option>
                        <option value="Posterolateral (PLB)">4 Posterolateral (PLB)</option>
                        <option value="Prox LAD">5 Prox LAD</option>
                        <option value="Mid LAD">6 Mid LAD</option>
                        <option value="Distal LAD">7 Distal LAD</option>
                        <option value="Diagonal 1">8 Diagonal 1</option>
                        <option value="Diagonal 2">9 Diagonal 2</option>
                        <option value="Ramus">10 Ramus</option>
                        <option value="Obtuse Marginal 1">11 Obtuse Marginal 1</option>
                        <option value="Obtuse Marginal 2">12 Obtuse Marginal 2</option>
                        <option value="Obtuse Marginal 3">13 Obtuse Marginal 3</option>
                        <option value="Other">14 Other</option>
                        <option value="Left Main">15 Left Main</option>
                        <option value="Diagonal 3">16 Diagonal 3</option>
                        <option value="Circumflex">17 Circumflex</option>
                    </select>
                </div>

                <div class="col-lg-12 form-group mb-3">
                    <label class="text-dark">Proximal Site Current</label>
                    <select name="cab_ins_proximal" class="form-control">
                        <option value="">Select an option</option>
                        <option value="In Situ Mammary">1. In Situ Mammary</option>
                        <option value="Ascending aorta">2. Ascending aorta</option>
                        <option value="Descending aorta">3. Descending aorta</option>
                        <option value="Subclavian artery">4. Subclavian artery</option>
                        <option value="Innominate artery">5. Innominate artery</option>
                        <option value="T-graft off SVG">6. T-graft off SVG</option>
                        <option value="T-graft off Radial">7. T-graft off Radial</option>
                        <option value="T-graft off LIMA">8. T-graft off LIMA</option>
                        <option value="T-graft off RIMA">9. T-graft off RIMA</option>
                        <option value="Natural Y vein graft">10. Natural Y vein graft</option>
                        <option value="Other">11. Other</option>
                    </select>
                </div>

                <div class="col-lg-12 form-group mb-3">
                    <label class="text-dark">Conduit Current</label>
                    <select name="cab_ins_conduit" class="form-control">
                        <option value="">Select an option</option>
                        <option value="1 Vein graft">1 Vein graft</option>
                        <option value="2 In Situ LIMA">2 In Situ LIMA</option>
                        <option value="3 In Situ RIMA">3 In Situ RIMA</option>
                        <option value="4 Free IMA">4 Free IMA</option>
                        <option value="5 Radial artery">5 Radial artery</option>
                        <option value="6 Other arteries, homograft">6 Other arteries, homograft
                        </option>
                        <option value="7 Synthetic graft">7 Synthetic graft</option>
                    </select>
                </div>
                <div class="row">

                    <div class="col-lg-6">
                        <label class="form-label">Distal Position Current</label>
                        <div class="d-flex">
                            <label class="me-3">
                                <input type="radio" name="cab_ins_position" value="1" id="endToSide">
                                <span>End to Side</span>
                            </label>

                            <label>
                                <input type="radio" name="cab_ins_position" value="0" id="sideToSide"
                                    checked>
                                <span>Side to Side</span>
                            </label>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <label class="form-label">Endarterectomy Current</label>
                        <div class="d-flex">
                            <label class="me-3">
                                <input type="radio" name="cab_ins_end" value="1" id="cab_ins_yes">
                                <span>Yes</span>
                            </label>

                            <label>
                                <input type="radio" name="cab_ins_end" value="0" id="cab_ins_no" checked>
                                <span>No</span>
                            </label>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Note</label>
                        <textarea class="form-control" name="note" rows="4"></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="text-end mt-3">
        <button type="submit" class="btn btn-dark">Add Coronary Artery ByPasses</button>
    </div>
</form>
