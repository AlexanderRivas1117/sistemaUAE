<!DOCTYPE html>
<head>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

    <link rel="stylesheet"  href="vendor/DataTables/jquery.datatables.min.css">	
    <script src="vendor/DataTables/jquery.dataTables.min.js" type="text/javascript"></script> 

    <link href="style.css" rel="stylesheet" type="text/css" />

    <title>Column Search in DataTables using Server-side Processing</title>
    <script>
        $(document).ready(function ()
        {
            // $('#tbl-contact thead th').each(function () {
            //     var title = $(this).text();
            //     $(this).html(title+' <input type="text" class="col-search-input" placeholder="Search ' + title + '" />');
            // });
            
            var table = $('#tbl-contact').DataTable({
                	"scrollX": true,
            		"pagingType": "numbers",
                "processing": true,
                "serverSide": true,
                "ajax": "server.php",
                order: [[2, 'asc']],
                columnDefs: [{
                    targets: "_all",
                    orderable: false
                 }]
            });

            table.columns().every(function () {
                var table = this;
                $('input', this.header()).on('keyup change', function () {
                    if (table.search() !== this.value) {
                    	   table.search(this.value).draw();
                    }
                });
            });
        });

    </script>
</head>

<body>
    <div class="datatable-container">
        <h2>Column Search in DataTables using Server-side Processing</h2>
        <table name="tbl-contact" id="tbl-contact" class="display" cellspacing="0" width="100%">   

            <thead>
                <tr>
                    
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Date Of Birth</th>

                </tr>
            </thead>
            
        </table>
    </div>
</body>
</html>