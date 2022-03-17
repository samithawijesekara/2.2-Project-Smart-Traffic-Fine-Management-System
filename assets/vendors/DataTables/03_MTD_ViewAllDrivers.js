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

        buttons: [{
                extend: 'csv',
                className: 'btn btn-primary mb-3',
                text: '<i class="fas fa-file-csv"></i> CSV',
                exportOptions: {
                    columns: [1,2,3,4,5]
                } 
            },
            {
                extend: 'excel',
                className: 'btn btn-success mb-3',
                text: '<i class="fas fa-file-excel"></i> Excel',
                titleAttr: 'Excel',
                exportOptions: {
                    columns: [1,2,3,4,5]
                }
            },
            {
                extend: 'pdf',
                className: 'btn btn-danger mb-3',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                exportOptions: {
                    columns: [1,2,3,4,5]
                }
            },
            {
                extend: 'print',
                className: 'btn btn-dark mb-3',
                text: '<i class="fas fa-print"></i> Print',
                exportOptions: {
                    columns: [1,2,3,4,5]
                } 
            }
        ],
    });
});