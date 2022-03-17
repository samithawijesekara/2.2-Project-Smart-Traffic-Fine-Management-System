// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable({
        dom: 'Bfrtip',
        "searching": true,
        "fixedColumns": true,
        "paging": true,
        "responsive": true,
        "select": true,
        "order": [
            [0, "asc"]
        ],
        "ordering": true,
        "lengthMenu": [
            [20, 40, 60, 100, -1],
            [20, 40, 60, 100, "All"]
        ],

        "columnDefs": [{
            "targets": [1],
            "orderable": true
        }, {
            "targets": [1],
            "visible": true,
            "searchable": true
        }],

        buttons: [
        ],

    });
});