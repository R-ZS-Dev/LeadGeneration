@extends('sitemaster.master-layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @php
                $quickboxes = [
                    'a_gap' => 'A GAP',
                    'albumin_globulin_ratio' => 'albumin/globulin ratio',
                    'abe' => 'ABE',
                    'activated_clotting_time' => 'Activated Clotting Time',
                    'albumin' => 'Albumin',
                    'alkaline_phosphatase' => 'Alkaline phosphatase',
                    'alanine_aminotransferase' => 'alanine aminotransferase',
                    'aspartate_aminotransferase' => 'aspartate aminotransferase',
                    'be' => 'B.E.',
                    'be_b' => 'BE(B)',
                    'bun_creatinine_ratio' => 'BUN/creatinine ratio',
                    'blood_urea_nitrogen' => 'blood urea nitrogen',
                    'ca_plus_plus' => 'Ca++',
                    'calcium' => 'Calcium',
                    'total_cholesterol' => 'Total cholesterol',
                    'chloride' => 'Chloride',
                    'cohb' => 'COHb',
                    'creatinine' => 'Creatinine',
                    'ctco2' => 'ctCO2',
                    'eco2' => 'ECO2',
                    'egfr' => 'eGFR',
                    'fio2' => 'FIO2',
                    'free_t3' => 'Free T3 (free triiodothyronine)',
                    'free_t4' => 'Free T4 (free thyroxine)',
                    'glob' => 'GLOB',
                    'glu' => 'Glu',
                    'fasting_glucose' => 'Fasting glucose (blood sugar)',
                    'hco3' => 'HCO3',
                    'hco3_minus' => 'HCO3-',
                    'hematocrit_hct' => 'Hematocrit (Hct)',
                    'hdl_cholesterol' => 'HDL (Good) cholesterol',
                    'heparin_bolus' => 'Heparin Bolus Indicated',
                    'heparin_maintenance' => 'Heparin Maintenance Indicated',
                    'heparin_concentration' => 'Heparin Concentration',
                    'hemoglobin_hgb' => 'Hemoglobin (Hgb)',
                    'k_plus' => 'K+',
                    'potassium' => 'Potassium',
                    'lac' => 'Lac',
                    'lactic_acid' => 'Lactic Acid',
                    'ldl_cholesterol' => 'LDL (Bad) cholesterol',
                    'mch' => 'MCH',
                    'mchc' => 'Mean corpuscular hemoglobin concentration (MCHC)',
                    'mcv' => 'Mean corpuscular volume (MCV)',
                    'mpv' => 'Mean Platelet Volume (MPV)',
                    'sodium' => 'Sodium',
                    'paO2' => 'PaO2',
                    'pco2' => 'pCO2',
                    'ph' => 'pH',
                    'phosphorus' => 'Phosphorus',
                    'platelet_count' => 'Platelet count',
                    'rbc_count' => 'RBC (red blood cell) erythrocyte count',
                    'temperature' => 'Temperature',
                    'bilirubin' => 'Bilirubin',
                    'total_t3' => 'Total T3 (total triiodothyronine)',
                    'total_t4' => 'Total T4 (total thyroxine)',
                    'total_protein' => 'Total Protein',
                    'triglycerides' => 'Triglycerides',
                    'tsh' => 'Thyroid-stimulating hormone (TSH)',
                    'vitamin_d' => 'Vitamin D',
                    'wbc_basophils' => 'WBC (white blood cell) differential count Basophils',
                    'wbc_eosinophils' => 'WBC (white blood cell) differential count Eosinophils',
                    'wbc_lymphocytes' => 'WBC (white blood cell) differential count Lymphocytes',
                    'wbc_monocytes' => 'WBC (white blood cell) differential count Monocytes',
                    'wbc_neutrophils' => 'WBC (white blood cell) differential count Neutrophils',
                    'wbc' => 'WBC',
                ];
            @endphp
            <!-- Success Message -->
            <div id="successMessage" class="alert alert-success" style="display: none;"></div>
            <!-- Signup modal content -->
            <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2 mb-4">
                                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                    <h4 class="mb-0"><b>Add Labs</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>

                            <form action="{{ route('add-lab') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="l_name">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Billing Code</label>
                                            <input type="text" class="form-control" maxlength="6" name="l_billcode">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Report Title</label>
                                            <input type="text" class="form-control" name="l_reporttitle">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Report Footer</label>
                                            <textarea class="form-control" name="l_reportfooter" rows="3"></textarea>
                                        </div>
                                    </div>
                                    @php
                                        $checkboxes = [
                                            'hide_source_row' => 'Hide Source Row',
                                            'hide_temperature_row' => 'Hide Temperature Row',
                                            'hide_draw_date_row' => 'Hide Draw Date Row',
                                            'hide_draw_time_row' => 'Hide Draw Time Row',
                                            'hide_result_date_row' => 'Hide Result Date Row',
                                            'hide_result_time_row' => 'Hide Result Time Row',
                                        ];
                                    @endphp
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            @foreach ($checkboxes as $name => $label)
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input" type="checkbox" name="rowboxes[]"
                                                        id="{{ $name }}" value="{{ $label }}">
                                                    <label class="form-check-label"
                                                        for="{{ $name }}">{{ $label }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <input class="form-check-input" type="checkbox" name="show_quick_button"
                                                id="show_quick_button">
                                            <label class="form-check-label" for="show_quick_button">Show Quick
                                                Button</label>
                                        </div>
                                    </div>


                                    <div id="quick_button_section" style="display: none;">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Quick Button Text</label>
                                                <input type="text" class="form-control" name="quick_button_text">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <div class="row">
                                                    @foreach ($quickboxes as $name => $label)
                                                        <div class="col-md-6 col-lg-4"> <!-- XS: 1, MD: 2, LG: 3 -->
                                                            <div class="form-check mb-1">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="quickboxes[]" id="{{ $name }}"
                                                                    value="{{ $label }}">
                                                                <label class="form-check-label"
                                                                    for="{{ $name }}">{{ $label }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group form-switch mb-3">
                                            <input type="hidden" name="l_active" value="0">
                                            <input type="checkbox" name="l_active" id="active" value="1"
                                                class="form-check-input" checked role="switch">
                                            <label for="active" class="form-check-label">Active</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary"
                                            style="float: right;">Submit</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end">

                                <button type="button" class="btn waves-effect waves-light mb-2 btn-outline-primary"
                                    data-bs-toggle="modal" data-bs-target="#signup-modal">
                                    <i class="fas fa-plus"></i> Add Lab
                                </button>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="users-table" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Billing Code</th>
                                        <th>Title</th>
                                        <th>Footer</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach ($labs as $index => $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->l_name }}</td>
                                            <td>{{ $item->l_billcode }}</td>
                                            <td>{{ $item->l_reporttitle }}</td>
                                            <td>{{ $item->l_reportfooter }}</td>
                                            <td>
                                                @if ($item->l_active == '1')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a onclick='editPro(@json($item))'
                                                    href="javascript:void(0);" class="text-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    onclick="confirmDelete('{{ route('delete-lab', $item->l_id) }}')"
                                                    class="text-danger">
                                                    <i class="fa-solid fa-trash-can-arrow-up"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- /* --------------------------- edit hospital modal -------------------------- */ --}}
        <div id="editHospital" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-body ">
                        <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                            <h4 class="mb-0"><b>Edit Lab Result</b></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('edit-lab') }}" class="mt-4">
                            @csrf
                            <input type="hidden" name="l_id" id="l_id">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="l_name" id="name">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Billing Code</label>
                                        <input type="text" class="form-control" maxlength="6" name="l_billcode"
                                            id="code">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Report Title</label>
                                        <input type="text" class="form-control" name="l_reporttitle" id="title">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Report Footer</label>
                                        <textarea class="form-control" name="l_reportfooter" rows="3"
                                            id="footer"></textarea>
                                    </div>
                                </div>
                                @php
                                    $checkboxes = [
                                        'hide_source_row' => 'Hide Source Row',
                                        'hide_temperature_row' => 'Hide Temperature Row',
                                        'hide_draw_date_row' => 'Hide Draw Date Row',
                                        'hide_draw_time_row' => 'Hide Draw Time Row',
                                        'hide_result_date_row' => 'Hide Result Date Row',
                                        'hide_result_time_row' => 'Hide Result Time Row',
                                    ];
                                @endphp
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        @foreach ($checkboxes as $name => $label)
                                            <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" name="rowboxes[]"
                                                    id="{{ $name }}" value="{{ $label }}">
                                                <label class="form-check-label"
                                                    for="{{ $name }}">{{ $label }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">   
                                            <input type="hidden" name="show_quick_button" value="0">
                                            <input type="checkbox" name="show_quick_button" id="show_quick_button1" value="1"
                                                class="form-check-input">
                                        <label class="form-check-label" for="show_quick_button">Show Quick Button</label>
                                    </div>
                                </div>
                                <div id="quick_button_section1" style="display: none;">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Quick Button Text</label>
                                            <input type="text" class="form-control" name="quick_button_text">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                @foreach ($quickboxes as $name => $label)
                                                    <div class="col-md-6 col-lg-4"> <!-- XS: 1, MD: 2, LG: 3 -->
                                                        <div class="form-check mb-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="quickboxes[]" id="{{ $name }}"
                                                                value="{{ $label }}">
                                                            <label class="form-check-label"
                                                                for="{{ $name }}">{{ $label }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group form-switch mb-3">
                                        <input type="hidden" name="l_active" value="0">
                                        <input type="checkbox" name="l_active" id="edit_active" value="1"
                                            class="form-check-input" checked role="switch">
                                        <label for="edit_active" class="form-check-label">Active</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary" style="float: right;">Update
                                        Lab</button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#users-table').DataTable({
                "paging": true, // Enable pagination
                "lengthChange": true, // Allow user to change the number of records per page
                "searching": true, // Enable search functionality
                "ordering": true, // Enable column sorting
                "info": true, // Display info like "Showing 1 to 10 of 50 entries"
                "autoWidth": false // Disable automatic column width adjustment
            });
        });
    </script>
    <script>
        function editPro(pro) {
            document.getElementById("l_id").value = pro.l_id;
            document.getElementById("name").value = pro.l_name;
            document.getElementById("code").value = pro.l_billcode;
            document.getElementById("title").value = pro.l_reporttitle;
            document.getElementById("footer").value = pro.l_reportfooter;
            document.getElementById("edit_active").checked = pro.l_active == 1;
            document.getElementById("show_quick_button1").checked = pro.show_quick_button == 1;
            let selectedRowboxes = pro.rowboxes ? JSON.parse(pro.rowboxes) : [];
            document.querySelectorAll("input[name='rowboxes[]']").forEach((checkbox) => {
                checkbox.checked = selectedRowboxes.includes(checkbox.value);
            });
            let selectedQuickboxes = pro.quickboxes ? JSON.parse(pro.quickboxes) : [];
            document.querySelectorAll("input[name='quickboxes[]']").forEach((checkbox) => {
                checkbox.checked = selectedQuickboxes.includes(checkbox.value);
            });
            let quickButtonSection = document.getElementById("quick_button_section1");
            quickButtonSection.style.display = pro.show_quick_button == 1 ? "block" : "none";

            var editModal = new bootstrap.Modal(document.getElementById("editHospital"));
            editModal.show();
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.addEventListener("submit", function(event) {
                const activeModal = document.querySelector(".modal.show");
                if (!activeModal) return;

                const form = activeModal.querySelector("form");
                if (!form) return;

                const inputs = form.querySelectorAll("input:not([type='hidden'])");
                const submitBtn = form.querySelector("button[type='submit']");

                let isValid = true;

                inputs.forEach(input => {
                    if (input.type !== "checkbox" && input.value.trim() === "") {
                        input.classList.add("is-invalid");
                        isValid = false;
                    } else {
                        input.classList.remove("is-invalid");
                    }
                });

                if (!isValid) {
                    event.preventDefault();
                } else {
                    submitBtn.innerHTML =
                        '<span class="spinner-border spinner-border-sm"></span> Processing...';
                    submitBtn.disabled = true;
                }
            });
            document.addEventListener("input", function(event) {
                const input = event.target;
                if (input.value.trim() !== "") {
                    input.classList.remove("is-invalid");
                }
            });
        });
    </script>
    <script>
        document.getElementById('show_quick_button').addEventListener('change', function() {
            var section = document.getElementById('quick_button_section');
            if (this.checked) {
                section.style.display = 'block'; // Show section
            } else {
                section.style.display = 'none'; // Hide section
            }
        });
    </script>
    <script>
        document.getElementById('show_quick_button1').addEventListener('change', function() {
            var section = document.getElementById('quick_button_section1');
            if (this.checked) {
                section.style.display = 'block'; // Show section
            } else {
                section.style.display = 'none'; // Hide section
            }
        });
    </script>
@endsection
