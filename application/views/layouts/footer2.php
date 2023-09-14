<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');
$waktu = date('Y-m-d H:i:s');
$date = date_create($waktu);

$result = date_format($date, "Y");
?>


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->



<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


<!-- Tabel Agenda -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        var tabel = $('#dataTableAgenda').DataTable({
            columnDefs: [{
                targets: [6],
                visible: false
            }],
            order: [
                [6, 'asc'],
                [1, 'asc']
            ]
        });

    });
</script>

<!-- Edit Agenda -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        $('#dataTableAgenda').DataTable();
        // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('#dataTableAgenda').on('click', '.edit-agenda', function() {
            // Get the id of selected phone and assign it in a variable called phoneData
            var agId = $(this).attr('id');
            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "<?php echo site_url('agenda/get_agenda') ?>",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {
                    agId: agId
                },
                // Callback function that is executed after data is successfully sent and recieved
                success: function(data) {
                    // Print the fetched data of the selected phone in the section called #phone_result 
                    // within the Bootstrap modal
                    $('#edit_result').html(data);
                    // Display the Bootstrap modal
                    $('#editModal').modal('show');
                }
            });
            // End AJAX function
        });
    });
</script>

<!-- Hapus Agenda -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTableAgenda').DataTable();
        $('#dataTableAgenda').on('click', '.hapus-agenda', function() {
            var agId = $(this).attr('id');
            $('#test').empty();
            $('#hapusModal').modal('show');
            $('#test').append('<a class="btn btn-danger" href="<?= site_url('agenda/hapus/') ?>' + agId + '">Hapus</a>');
        });
    });
</script>

<!-- Cetak Agenda -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        $('#dataTableAgenda').DataTable();
        // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('#btnSearch').click(function() {
            // Get the id of selected phone and assign it in a variable called phoneData
            var start = $('#start').val();
            var end = $('#end').val();


            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "<?php echo base_url('agenda/get_cetak2') ?>",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {
                    start: start,
                    end: end
                },
                // Callback function that is executed after data is successfully sent and recieved
                success: function(data) {
                    //alert("What follows is blank: " + data);
                    // Print the fetched data of the selected phone in the section called #phone_result 
                    // within the Bootstrap modal
                    $('#cari').html(data);
                }
            });
            // End AJAX function
        });
    });
</script>

<!-- Upload Dokumen Agenda -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        $('#dataTableAgenda').DataTable();
        // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('#dataTableAgenda').on('click', '.upload-dukung', function() {
            // Get the id of selected phone and assign it in a variable called phoneData
            var agId = $(this).attr('id');
            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "<?php echo site_url('agenda/get_dokumen') ?>",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {
                    agId: agId
                },
                // Callback function that is executed after data is successfully sent and recieved
                success: function(data) {
                    // Print the fetched data of the selected phone in the section called #phone_result 
                    // within the Bootstrap modal
                    $('#upload_result').html(data);
                    // Display the Bootstrap modal
                    $('#uploadModal').modal('show');
                }
            });
            // End AJAX function
        });
    });
</script>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>

<script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/vendor/select2/dist/js/select2.full.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</body>

</html>