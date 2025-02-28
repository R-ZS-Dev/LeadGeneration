

$(document).ready(function () {
    $('#users-table').DataTable({
        "paging": true, // Enable pagination
        "lengthChange": false, // Allow user to change the number of records per page
        "searching": true, // Enable search functionality
        "ordering": true, // Enable column sorting
        "info": true, // Display info like "Showing 1 to 10 of 50 entries"
        "autoWidth": false // Disable automatic column width adjustment

    });
});