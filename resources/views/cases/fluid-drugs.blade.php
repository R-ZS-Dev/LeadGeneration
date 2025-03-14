@extends('sitemaster.master-layout')
@section('title', 'Case Fluid Drugs')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mt-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-end">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="users-table" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Time</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Unit</th>
                                    <th>Volume (ML)</th>
                                    <th>Expires</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($cfluid as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->cfluid_time }}</td>
                                        <td>{{ $item->fluid->fd_gname }}</td>
                                        <td>{{ $item->fluid->fd_amount }}</td>
                                        <td>g</td>
                                        <td>{{ $item->fluid->fd_conto }}</td>
                                        <td>{{ $item->cfluid_exp }}</td>
                                        <td align="center"> <a onclick="editDrug({{ json_encode($item) }})"
                                                href="javascript:void(0);">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button id="showButton" type="button" class="btn waves-effect waves-light mt-2 btn-outline-primary">
                        Show Calculation
                    </button>

                    <button id="hideButton" type="button" class="btn waves-effect waves-light mt-2 btn-outline-primary"
                        style="display: none;">
                        Hide Calculation
                    </button>
                    <div class="row p-3">
                        <div class="col-lg-12" id="calculationDiv"
                            style="display: none; border: 1px solid #ccc;padding: 10px; margin-top: 10px;">
                            @php
                                $total = $drug + $amount;
                            @endphp
                            <div class="row p-3">
                                <h5><b>Fluid Management calculations:</b></h5>
                                <div class="col-md-6">
                                    <p>Prime: 0</p>
                                    <p>Crystalloid: 0</p>
                                    <p>Drugs: {{ $drug }}</p>
                                    <p>Albumin: {{ $amount }}</p>
                                    <p>Cardiolegia Solution: 0</p>
                                    <p>Blood: 0</p>
                                    <p><b>Fluid volume in: {{ $total }}</b></p>
                                </div>
                                <div class="col-md-6">
                                    <p>Estimated Blood Loss: 0</p>
                                    <p>Urine: 0</p>
                                    <p>Ultrafiltrate: 0</p>
                                    <p><b>Fluid Volume out: 0</b></p>
                                    <p><b>Fluid Gain (Loss): 0</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" id="formcard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('add-case-fluiddrugs') }}" method="POST">
                                @csrf
                                <div class="row" id="form-data">
                                    <div class="col-md-12 d-flex mb-3">
                                        <button class="btn btn-dark me-2">PRBC</button>
                                        <button class="btn btn-dark me-2">Cell Saver RBC</button>
                                        <button class="btn btn-dark me-2">Estimated Blood Loss</button>
                                        <button class="btn btn-dark me-2">Urine</button>
                                        <button class="btn btn-dark me-2">Ultrafiltrate</button>
                                        <button class="btn btn-dark me-2">CaCl</button>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" id="date" name="cfluid_date" class="form-control"
                                            value="{{ now()->format('Y-m-d') }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="time" class="form-label">Time</label>
                                        <input type="time" id="time" name="cfluid_time" class="form-control"
                                            value="{{ now()->format('H:i') }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fluid_drug" class="form-label">Fluid/Drug</label>
                                        <select id="fluidDropdown" name="cfluid_drug" class="form-control"
                                            onchange="populateFields(this)">
                                            <option value="">Select Fluid</option>
                                            @foreach ($fluid as $item)
                                                <option value="{{ $item->fd_id }}" data-fluid='{{ json_encode($item) }}'>
                                                    {{ $item->fd_gname }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" id="drugName" name="cfluid_drugname" class="form-control" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group form-switch mb-3">
                                                    <input type="hidden" name="cfluid_prime" value="0">
                                                    <input type="checkbox" role="switch" name="cfluid_prime"
                                                        id="edit-active" checked value="1" class="form-check-input"
                                                        {{ old('cfluid_prime') ? 'checked' : '' }}>
                                                    <label for="edit-active" class="form-check-label">Prime</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group form-switch mb-3">
                                                    <input type="hidden" name="cfluid_card" value="0">
                                                    <input type="checkbox" role="switch" name="cfluid_card"
                                                        id="edit-active" checked value="1" class="form-check-input"
                                                        {{ old('cfluid_card') ? 'checked' : '' }}>
                                                    <label for="edit-active" class="form-check-label">Cardioplegia</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="amount" class="form-label">Amount (ML)</label>
                                        <input type="text" id="amount" name="cfluid_amount" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="concentration" class="form-label">Concentration</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" id="concentration" name="cfluid_concentper"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-6 d-flex">
                                            <input type="text" id="per_ml" name="cfluid_concentml"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label for="lot" class="form-label">Lot</label>
                                        <input type="text" id="lot" name="cfluid_lot" class="form-control">
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label for="expiration" class="form-label">Expiration</label>
                                        <input type="date" id="expiration" name="cfluid_exp" class="form-control">
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label for="billing_code" class="form-label">Billing Code</label>
                                        <input type="text" id="billing_code" name="cfluid_billcode"
                                            class="form-control">
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label for="billing_amount" class="form-label">Billing Amount</label>
                                        <input type="number" id="billing_amount" name="cfluid_billamnt"
                                            class="form-control">
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">From</label>
                                            <select name="fd_from" id="" class="form-control">
                                                <option value="">Select From</option>
                                                @foreach ($location as $item)
                                                    <option value="{{ $item->fl_id }}">{{ $item->fl_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label">To</label>
                                            <select name="fd_to" id="" class="form-control">
                                                <option value="">Select To</option>
                                                @foreach ($location as $item)
                                                    <option value="{{ $item->fl_id }}">{{ $item->fl_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="note" class="form-label">Note</label>
                                        <textarea name="cfluid_note" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark ft">Add Float Drugs</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
@section('script')

    <script>
        function populateFields(selectElement) {
            var selectedOption = selectElement.options[selectElement.selectedIndex];

            if (!selectedOption.value) {
                return; // Exit if no fluid is selected
            }
            var fluidData = JSON.parse(selectedOption.getAttribute('data-fluid'));
            document.getElementById('drugName').value = fluidData.fd_gname || "";
            document.getElementById('amount').value = fluidData.fd_amount || '';
            document.getElementById('concentration').value = fluidData.fd_confrom || '';
            document.getElementById('per_ml').value = fluidData.fd_conto || '';
            document.getElementById('expiration').value = fluidData.created_at.split('T')[0] ||
                '';
            document.getElementById('billing_code').value = fluidData.fd_billcode || '';
            document.getElementById('billing_amount').value = fluidData.fd_billamount || '';
            document.querySelector(`select[name="fd_from"]`).value = fluidData.fd_from || '';
            document.querySelector(`select[name="fd_to"]`).value = fluidData.fd_to || '';
            document.querySelector(`textarea[name="cfluid_note"]`).value = fluidData.fd_defaultnote || '';
        }
    </script>
    <script>
   function editDrug(item) {
    document.getElementById('date').value = item.cfluid_date || '';
    document.getElementById('time').value = item.cfluid_time || '';
    document.getElementById('fluidDropdown').value = item.cfluid_drug || '';
    document.getElementById('drugName').value = item.cfluid_drugname || '';
    document.getElementById('amount').value = item.cfluid_amount || '';
    document.getElementById('concentration').value = item.cfluid_concentper || '';
    document.getElementById('per_ml').value = item.cfluid_concentml || '';
    document.getElementById('lot').value = item.cfluid_lot || '';
    document.getElementById('expiration').value = item.cfluid_exp || '';
    document.getElementById('billing_code').value = item.cfluid_billcode || '';
    document.getElementById('billing_amount').value = item.cfluid_billamnt || '';
    document.querySelector('input[name="cfluid_prime"]').checked = item.cfluid_prime == 1;
    document.querySelector('input[name="cfluid_card"]').checked = item.cfluid_card == 1;
    document.querySelector('select[name="fd_from"]').value = item.fd_from || '';
    document.querySelector('select[name="fd_to"]').value = item.fd_to || '';
    document.querySelector('textarea[name="cfluid_note"]').value = item.cfluid_note || '';

    $("#formcard").slideDown("slow", function() {
        $('html, body').animate({
            scrollTop: $("#formcard").offset().top - 100
        }, 500);
    });
}
</script>

    <script>
        $(document).ready(function() {
            $("#showButton").click(function() {
                $("#calculationDiv").slideDown();
                $("#showButton").hide();
                $("#hideButton").show();
            });
            $("#hideButton").click(function() {
                $("#calculationDiv").slideUp();
                $("#hideButton").hide();
                $("#showButton").show();
            });
        });
    </script>

@endsection
