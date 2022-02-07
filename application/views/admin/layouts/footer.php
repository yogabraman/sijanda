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


<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <!-- <span>Copyright &copy; Melianti Dwi S <?= $result ?></span> -->
        </div>
    </div>
</footer>
<!-- End of Footer -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= site_url('login/logout/') ?><?php echo $this->session->userdata('nama') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<!-- Edit User -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        $('#dataTableUser').DataTable();
        // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('#dataTableUser').on('click', '.edit-user', function() {
            // Get the id of selected phone and assign it in a variable called phoneData
            var userId = $(this).attr('id');
            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "<?php echo site_url('user/get_user') ?>",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {
                    userId: userId
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

<!-- Hapus User -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTableUser').DataTable();
        $('#dataTableUser').on('click', '.hapus-user', function() {
            var userId = $(this).attr('id');
            $('#test').empty();
            $('#hapusModal').modal('show');
            $('#test').append('<a class="btn btn-danger" href="<?= site_url('user/hapus/') ?>' + userId + '">Hapus</a>');
        });
    });
</script>

<!-- Tabel Surat Masuk -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        var tabel = $('#dataTableSM').DataTable({
            columnDefs: [{
                targets: [5, 6],
                visible: false
            }],
            order: [
                [5, 'asc'],
                [6, 'desc']
            ]
        });

    });
</script>

<!-- Edit Surat Masuk -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        $('#dataTableSM').DataTable();
        // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('#dataTableSM').on('click', '.edit-sm', function() {
            // Get the id of selected phone and assign it in a variable called phoneData
            var smId = $(this).attr('id');
            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "<?php echo site_url('surat_masuk/get_sm') ?>",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {
                    smId: smId
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

<!-- Hapus Surat Masuk -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTableSM').DataTable();
        $('#dataTableSM').on('click', '.hapus-sm', function() {
            var smId = $(this).attr('id');
            $('#test').empty();
            $('#hapusModal').modal('show');
            $('#test').append('<a class="btn btn-danger" href="<?= site_url('surat_masuk/hapus/') ?>' + smId + '">Hapus</a>');
        });
    });
</script>

<!-- Cetak Surat Masuk -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        $('#dataTableSM').DataTable();
        // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('#btnSearch').click(function() {
            // Get the id of selected phone and assign it in a variable called phoneData
            var start = $('#start').val();
            var end = $('#end').val();


            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "<?php echo base_url('surat_masuk/get_cetak') ?>",
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

<!-- Tambah Dispo -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTableSM').DataTable();
        $('#dataTableSM').on('click', '.add-dispo', function() {
            var smId = $(this).attr('id');
            const Idx = smId.split("/-/");
            $('#ids').empty();
            $('#filex').empty();
            $('#dispoModal').modal('show');
            $('#ids').append('<input class="form-control" type="hidden" name="id_surat" value="' + Idx[1] + '">');
            $('#filex').append('<embed src="<?= base_url() ?>assets/suratmasuk/'+ Idx[0] +'" width="800px" height="1000px" />');
        });
    });
</script>

<!-- Tabel Dispo -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        var tabel = $('#dataTableDispo').DataTable({
            columnDefs: [{
                targets: [6],
                visible: false
            }],
            order: [
                [6, 'desc']
            ]
        });

    });
</script>

<!-- Edit Dispo -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        $('#dataTableDispo').DataTable();
        // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('#dataTableDispo').on('click', '.edit-dispo', function() {
            // Get the id of selected phone and assign it in a variable called phoneData
            var dispoId = $(this).attr('id');
            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "<?php echo site_url('dispo/getdisp') ?>",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {
                    dispoId: dispoId
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

<!-- Hapus Dispo -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTableDispo').DataTable();
        $('#dataTableDispo').on('click', '.hapus-dispo', function() {
            var dispoId = $(this).attr('id');
            $('#test').empty();
            $('#hapusModal').modal('show');
            $('#test').append('<a class="btn btn-danger" href="<?= site_url('dispo/hapus/') ?>' + dispoId + '">Hapus</a>');
        });
    });
</script>

<!-- Tabel Agenda -->
<!-- <script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        var tabel = $('#dataTableAgenda').DataTable({
            columnDefs: [{
                targets: [0, 1],
                // visible: false
            }],
            order: [
                [0, 'asc'],
                [1, 'asc']
            ]
        });

    });
</script> -->

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

<!-- Autocomplete -->
<script type="text/javascript">
        $(document).ready(function(){
            $( "#asal_surat" ).autocomplete({
              source: "<?php echo site_url('auto/auto_asal/?');?>"
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

<script type="text/javascript">
    $(document).ready(function() {

        var undangan = document.getElementById("undangan");

        undangan.style.display = "none";

        $('.tipe_surat').on('change', function(e) {
            var id = $(this).val();


            if (id == '0') {
                undangan.style.display = "none";

            }
            if (id == '1') {
                undangan.style.display = "block";

            }

        });

    });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script type="text/javascript">
    <?php if ($this->session->flashdata('success')) { ?>
        toastr.success("<?php echo $this->session->flashdata('success'); ?>");
    <?php } else if ($this->session->flashdata('error')) {  ?>
        toastr.error("<?php echo $this->session->flashdata('error'); ?>");
    <?php } else if ($this->session->flashdata('warning')) {  ?>
        toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
    <?php } else if ($this->session->flashdata('info')) {  ?>
        toastr.info("<?php echo $this->session->flashdata('info'); ?>");
    <?php } ?>
</script>

</body>

</html>