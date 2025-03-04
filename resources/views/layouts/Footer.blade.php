<!-- Lead Generation. All Rights Reserved. -->            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            {{-- <footer class="footer text-center text-muted">
                All Rights Reserved by Freedash. Designed and Developed by <a
                    href="https://atozcoder.com/" target="_blank">AtoZ Coders</a>.
            </footer> --}}
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('dist/js/app-style-switcher.js')}}"></script>
    <script src="{{ asset('dist/js/feather.min.js')}}"></script>
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{ asset('assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{ asset('assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{ asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard1.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
           function confirmDelete(deleteUrl, rowId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteUrl,
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            icon: "success",
                            title: "Deleted Successfully!",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });

                        // ✅ Smooth fadeOut animation
                        $("#row-" + rowId).fadeOut(500, function() {
                            $(this).remove();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire("Error!", "Something went wrong.", "error");
                    }
                });
            }
        });
    }
    </script>
    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        </script>
    @endif
{{--
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let checkbox = document.querySelector(".form-check-input");
            let label = document.querySelector(".status-label");
            function updateLabel() {
                label.textContent = checkbox.checked ? "Active" : "InActive";
            }
            updateLabel();
            checkbox.addEventListener("change", updateLabel);
        });
    </script> --}}
    {{-- <script>
        function updateLabels() {
            document.querySelectorAll(".status-switch").forEach(function (checkbox) {
                let label = checkbox.nextElementSibling; // Get the associated label
                label.textContent = checkbox.checked ? "Active" : "Inactive"; // Update label text
            });
        }
        window.onload = updateLabels;
        document.querySelectorAll(".status-switch").forEach(function (checkbox) {
            checkbox.addEventListener("change", updateLabels);
        });
    </script> --}}

</body>

</html>
