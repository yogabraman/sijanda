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

<!-- Tabel Surat Keluar -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        var tabel = $('#dataTableSK').DataTable({
            order: [
                [0, 'desc']
            ]
        });

    });
</script>

<!-- Edit Surat Keluar -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        $('#dataTableSK').DataTable();
        // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('#dataTableSK').on('click', '.edit-sk', function() {
            // Get the id of selected phone and assign it in a variable called phoneData
            var skId = $(this).attr('id');
            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "<?php echo site_url('surat_masuk/get_sk') ?>",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {
                    skId: skId
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

<!-- Hapus Surat Keluar -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTableSK').DataTable();
        $('#dataTableSK').on('click', '.hapus-sk', function() {
            var skId = $(this).attr('id');
            $('#test').empty();
            $('#hapusModal').modal('show');
            $('#test').append('<a class="btn btn-danger" href="<?= site_url('surat_masuk/hapus_sk/') ?>' + skId + '">Hapus</a>');
        });
    });
</script>

<!-- Cetak Surat Keluar -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        $('#dataTableSK').DataTable();
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

<!-- Tambah Dispo Nota Dinas -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTableNota').DataTable();
        $('#dataTableNota').on('click', '.add-disponota', function() {
            var notaId = $(this).attr('id');
            const Idx = notaId.split("/-/");
            $('#ids').empty();
            $('#filex').empty();
            $('#disponotaModal').modal('show');
            $('#ids').append('<input class="form-control" type="hidden" name="id_nota" value="' + Idx[1] + '">');
            $('#filex').append('<embed src="<?= base_url() ?>assets/notadinas/' + Idx[0] + '" width="800px" height="1000px" />');
        });
    });
</script>

<!-- Upload Nota Dinas -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTableSM').DataTable();
        $('#dataTableSM').on('click', '.upload-nodin', function() {
            var smId = $(this).attr('id');
            $('#idnodin').empty();
            $('#uploadNodin').modal('show');
            $('#idnodin').append('<input class="form-control" type="hidden" name="id_surat" value="' + smId + '">');
        });
    });
</script>

<!-- Preview Nota Dinas -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTableSM').DataTable();
        $('#dataTableSM').on('click', '.view-nota', function() {
            var notaId = $(this).attr('id');
            const IdN = notaId.split("/-/");
            $('#printNodin').empty();
            $('#file_nodin').empty();
            $('#viewModal').modal('show');
            $('#printNodin').append('<a target="_blank" href="<?= site_url('dispo/print_dispo_nodin/') ?>' + IdN[1] + '" class="btn btn-success" id="' + IdN[1] + '" title="Disposisi"><i class="fa fa-print"></i> Print Dispo Nodin</a>');
            $('#file_nodin').append('<embed src="<?= base_url() ?>assets/notadinas/' + IdN[0] + '" width="800px" height="1000px" />');
        });
    });
</script>

<!-- Edit Nota Dinas -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        $('#dataTableNota').DataTable();
        // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('#dataTableNota').on('click', '.edit-nota', function() {
            // Get the id of selected phone and assign it in a variable called phoneData
            var notaId = $(this).attr('id');
            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "<?php echo site_url('surat_masuk/get_nota') ?>",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {
                    notaId: notaId
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

<!-- Hapus Nota Dinas -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTableNota').DataTable();
        $('#dataTableNota').on('click', '.hapus-nota', function() {
            var notaId = $(this).attr('id');
            $('#test').empty();
            $('#hapusModal').modal('show');
            $('#test').append('<a class="btn btn-danger" href="<?= site_url('surat_masuk/hapus_nota/') ?>' + notaId + '">Hapus</a>');
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
            $('#filex').append('<embed src="<?= base_url() ?>assets/suratmasuk/' + Idx[0] + '" width="800px" height="1000px" />');
        });
    });
</script>

<!-- Tambah Dispo -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTableSM').DataTable();
        $('#dataTableSM').on('click', '.add-disponota', function() {
            var smId = $(this).attr('id');
            const Idx = smId.split("/-/");
            $('#idNodin').empty();
            $('#fileNodin').empty();
            $('#dispoNodin').modal('show');
            $('#idNodin').append('<input class="form-control" type="hidden" name="id_surat" value="' + Idx[1] + '">');
            $('#fileNodin').append('<embed src="<?= base_url() ?>assets/notadinas/' + Idx[0] + '" width="800px" height="1000px" />');
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

<!-- Tabel viewer laporan kinerja -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        var tabel = $('#dataTableLaporKinerja').DataTable({});
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

<!-- Edit Dispo -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        $('#dataTableSM').DataTable();
        // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('#dataTableSM').on('click', '.edit-dispo', function() {
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

<!-- Upload Dokumen Agenda -->
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#dataTableAgenda').DataTable();
        $('#dataTableAgenda').on('click', '.upload-dukung', function() {
            var notaId = $(this).attr('id');
            const Idx = notaId.split("/-/");
            $('#ids').empty();
            $('#file_ppt').empty();
            $('#uploadModal').modal('show');
            $('#ids').append('<input class="form-control" type="hidden" name="id_nota" value="' + Idx[1] + '">');
            $('#file_ppt').append('<a target="_blank" href="<?= base_url() ?>assets/agenda/" class="btn btn-info"><i class="fa fa-download"></i>  Klik untuk melihat Dokumen</a>');
        });
    });
</script> -->

<!-- Edit Memo -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        $('#dataTableMemo').DataTable();
        // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('#dataTableMemo').on('click', '.edit-memo', function() {
            // Get the id of selected phone and assign it in a variable called phoneData
            var memoId = $(this).attr('id');
            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "<?php echo site_url('memo/get_memo') ?>",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {
                    memoId: memoId
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
        $('#dataTableMemo').DataTable();
        $('#dataTableMemo').on('click', '.hapus-memo', function() {
            var memoId = $(this).attr('id');
            $('#test').empty();
            $('#hapusModal').modal('show');
            $('#test').append('<a class="btn btn-danger" href="<?= site_url('memo/hapus/') ?>' + memoId + '">Hapus</a>');
        });
    });
</script>

<!-- Edit Pegawai -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        $('#dataTablePegawai').DataTable();
        // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('#dataTablePegawai').on('click', '.edit-pegawai', function() {
            // Get the id of selected phone and assign it in a variable called phoneData
            var id = $(this).attr('id');
            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "<?php echo site_url('spt/get_pegawai') ?>",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {
                    id: id
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

<!-- Hapus Pegawai -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTablePegawai').DataTable();
        $('#dataTablePegawai').on('click', '.hapus-pegawai', function() {
            var id = $(this).attr('id');
            $('#test').empty();
            $('#hapusModal').modal('show');
            $('#test').append('<a class="btn btn-danger" href="<?= site_url('spt/hapus_pegawai/') ?>' + id + '">Hapus</a>');
        });
    });
</script>

<!-- Edit SPT -->
<script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function() {
        // Initiate DataTable function comes with plugin
        $('#dataTableSPT').DataTable();
        // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('#dataTableSPT').on('click', '.edit-spt', function() {
            // Get the id of selected phone and assign it in a variable called phoneData
            var sptId = $(this).attr('id');
            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "<?php echo site_url('spt/get_spt') ?>",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {
                    sptId: sptId
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

<!-- Hapus SPT -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTableSPT').DataTable();
        $('#dataTableSPT').on('click', '.hapus-spt', function() {
            var id = $(this).attr('id');
            $('#test').empty();
            $('#hapusModal').modal('show');
            $('#test').append('<a class="btn btn-danger" href="<?= site_url('spt/hapus_spt/') ?>' + id + '">Hapus</a>');
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

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{
                    header: [1, 2, 3, 4, 5, 6, false]
                }],
                [{
                    font: []
                }],
                ["bold", "italic"],
                ["link", "blockquote", "code-block", "image"],
                [{
                    list: "ordered"
                }, {
                    list: "bullet"
                }],
                [{
                    script: "sub"
                }, {
                    script: "super"
                }],
                [{
                    color: []
                }, {
                    background: []
                }],
                [{
                    align: []
                }],
            ]
        },
    });
    quill.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='isi_disposisi']").value = quill.root.innerHTML;
    });
</script>

<script>
    var quill = new Quill('#editormemo', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{
                    header: [1, 2, 3, 4, 5, 6, false]
                }],
                [{
                    font: []
                }],
                ["bold", "italic"],
                ["link", "blockquote", "code-block", "image"],
                [{
                    list: "ordered"
                }, {
                    list: "bullet"
                }],
                [{
                    script: "sub"
                }, {
                    script: "super"
                }],
                [{
                    color: []
                }, {
                    background: []
                }],
                [{
                    align: []
                }],
            ]
        },
    });
    quill.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='isi_memo']").value = quill.root.innerHTML;
    });
</script>

<!-- Tipe Surat Masuk -->
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

<!-- Rekap Surat Masuk by Year -->
<script type="text/javascript">
    $(document).ready(function() {

        var rekapsm = document.getElementById("rekapsm");

        // rekap.style.display = "none";

        $('.rekapsm').on('change', function(e) {
            var id = $(this).val();
            window.location.href = "<?php echo site_url('surat_masuk/rekap_sm_thn/'); ?>" + id;

        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('input[type=radio][name=nodin]').change(function() {
            if (this.value == 0) {
                $('[name="isi_disposisi"]').val("");
            } else if (this.value == 1) {
                $('[name="isi_disposisi"]').val("Buat Nota Dinas Hasilnya Makasih");
            }
        });
    });
</script>

<!-- Tipe Nota Dinas -->
<script type="text/javascript">
    $(document).ready(function() {

        var perihal = document.getElementById("biasa");
        var undangan = document.getElementById("undangan");

        perihal.style.display = "none";
        undangan.style.display = "block";

        $('.tipe_nota').on('change', function(e) {
            var id = $(this).val();


            if (id == '0') {
                perihal.style.display = "none";
                undangan.style.display = "block";

            }
            if (id == '1') {
                perihal.style.display = "block";
                undangan.style.display = "none";

            }

        });

    });
</script>

<!-- Autocomplete -->
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#asal_surat").autocomplete({
            source: "<?php echo site_url('auto/auto_asal/?'); ?>"
        });
    });
</script>

<!-- Autocomplete -->
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nota_surat_old").autocomplete({
            source: "<?php echo site_url('auto/auto_surat/?'); ?>",

            select: function(event, ui) {
                $('[name="id_surat"]').val(ui.item.label);
                $('[name="value"]').val(ui.item.value);
            }
        });
    });
</script>

<!-- Autocomplete -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#nota_surat").select2();
    });
</script>

<!-- Autocomplete -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#pilih_pegawai").select2();
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