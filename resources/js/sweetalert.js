<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("button[type='submit']").forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // Stop form submission until confirmed

            let form = this.closest("form"); // Get the nearest form
            let actionName = this.getAttribute("data-action") || "Confirm Action"; // Get action name
            let message = this.getAttribute("data-alert") || "Are you sure you want to proceed?";

            Swal.fire({
                title: `${actionName}`, // Dynamic title
                text: message,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, proceed",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Processing...",
                        text: "Please wait while we update your data.",
                        icon: "info",
                        allowOutsideClick: false,
                        showConfirmButton: false
                    });

                    setTimeout(() => {
                        form.submit(); // Submit the form after alert closes
                    }, 2000); // Adjust delay as needed
                }
            });
        });
    });
});