<form action="{{ route('add-noncardic-procedure') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="row form-group mt-3 mb-3">
                <div class="col-md-12">
                    <label for="">Carotid Endarterectomy</label>
                </div>
                <div class="col-md-12 d-flex">
                    <label class="me-3">
                        <input type="radio" name="carotid" value="1" />
                        <span>Yes Planned</span>
                    </label>
                    <label class="me-3">
                        <input type="radio" name="carotid" value="2" />
                        <span>Yes, Unplanned Surgical Complication</span>
                    </label>
                    <label class="me-3">
                        <input type="radio" name="carotid" value="3" />
                        <span>Yes, Unplanned Disease/Anatomy</span>
                    </label>
                    <label>
                        <input type="radio" name="carotid" value="1" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>

            <div class="row form-group mt-3 mb-3">
                <div class="col-md-12">
                    <label for="">Other Vascular</label>
                </div>
                <div class="col-md-12 d-flex">
                    <label class="me-3">
                        <input type="radio" name="vascular" value="1" />
                        <span>Yes Planned</span>
                    </label>
                    <label class="me-3">
                        <input type="radio" name="vascular" value="2" />
                        <span>Yes, Unplanned Surgical Complication</span>
                    </label>
                    <label class="me-3">
                        <input type="radio" name="vascular" value="3" />
                        <span>Yes, Unplanned Disease/Anatomy</span>
                    </label>
                    <label >
                        <input type="radio" name="vascular" value="1" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>

            <div class="row form-group mt-3 mb-3">
                <div class="col-md-12">
                    <label for="">Other Thoracic</label>
                </div>
                <div class="col-md-12 d-flex">
                    <label class="me-3">
                        <input type="radio" name="thoracic" value="1" />
                        <span>Yes Planned</span>
                    </label>
                    <label class="me-3">
                        <input type="radio" name="thoracic" value="2" />
                        <span>Yes, Unplanned Surgical Complication</span>
                    </label>
                    <label class="me-3">
                        <input type="radio" name="thoracic" value="3" />
                        <span>Yes, Unplanned Disease/Anatomy</span>
                    </label>
                    <label>
                        <input type="radio" name="thoracic" value="1" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>

            <div class="row form-group mt-3 mb-3">
                <div class="col-md-12">
                    <label for="">Other</label>
                </div>
                <div class="col-md-12 d-flex">
                    <label class="me-3">
                        <input type="radio" name="other" value="1" />
                        <span>Yes Planned</span>
                    </label>
                    <label class="me-3">
                        <input type="radio" name="other" value="2" />
                        <span>Yes, Unplanned Surgical Complication</span>
                    </label>
                    <label class="me-3">
                        <input type="radio" name="other" value="3" />
                        <span>Yes, Unplanned Disease/Anatomy</span>
                    </label>
                    <label>
                        <input type="radio" name="other" value="1" checked />
                        <span>No</span>
                    </label>
                </div>
            </div>
            <button style="submit" class="btn btn-dark">Submit</button>
        </div>
    </div>
</form>
