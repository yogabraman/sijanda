<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<?= $id_surat = "" ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">SPT</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah SPT</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableSPT" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl Berangkat<br />Tgl Pulang</th>
                            <th>Tujuan</th>
                            <th>Pegawai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($spt as $rows) { ?>
                            <?php
                            $y = substr($rows->tgl_berangkat, 0, 4);
                            $m = substr($rows->tgl_berangkat, 5, 2);
                            $d = substr($rows->tgl_berangkat, 8, 2);

                            $y1 = substr($rows->tgl_pulang, 0, 4);
                            $m1 = substr($rows->tgl_pulang, 5, 2);
                            $d1 = substr($rows->tgl_pulang, 8, 2);

                            if ($m == "01") {
                                $nm = "Januari";
                            } elseif ($m == "02") {
                                $nm = "Februari";
                            } elseif ($m == "03") {
                                $nm = "Maret";
                            } elseif ($m == "04") {
                                $nm = "April";
                            } elseif ($m == "05") {
                                $nm = "Mei";
                            } elseif ($m == "06") {
                                $nm = "Juni";
                            } elseif ($m == "07") {
                                $nm = "Juli";
                            } elseif ($m == "08") {
                                $nm = "Agustus";
                            } elseif ($m == "09") {
                                $nm = "September";
                            } elseif ($m == "10") {
                                $nm = "Oktober";
                            } elseif ($m == "11") {
                                $nm = "November";
                            } elseif ($m == "12") {
                                $nm = "Desember";
                            }

                            if ($m1 == "01") {
                                $nm1 = "Januari";
                            } elseif ($m1 == "02") {
                                $nm1 = "Februari";
                            } elseif ($m1 == "03") {
                                $nm1 = "Maret";
                            } elseif ($m1 == "04") {
                                $nm1 = "April";
                            } elseif ($m1 == "05") {
                                $nm1 = "Mei";
                            } elseif ($m1 == "06") {
                                $nm1 = "Juni";
                            } elseif ($m1 == "07") {
                                $nm1 = "Juli";
                            } elseif ($m1 == "08") {
                                $nm1 = "Agustus";
                            } elseif ($m1 == "09") {
                                $nm1 = "September";
                            } elseif ($m1 == "10") {
                                $nm1 = "Oktober";
                            } elseif ($m1 == "11") {
                                $nm1 = "November";
                            } elseif ($m1 == "12") {
                                $nm1 = "Desember";
                            }
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d . " " . $nm . " " . $y ?> <br>
                                    <hr /> <?= $d1 . " " . $nm1 . " " . $y1 ?>
                                </td>
                                <td><?= $rows->tujuan ?></td>
                                <td><?= $rows->pegawai ?></td>
                                <td class="text-center" style="min-width:180px;">
                                    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) { ?>

                                        <button class="btn btn-info edit-spt" id="<?= $rows->id_spt ?>" title="Edit"><i class="far fa-edit"></i></button>

                                        <a target="_blank" href="<?= base_url() ?>assets/spt/<?= $rows->file_spt ?>" class="btn btn-warning" title="Lihat File"><i class="fa fa-file"></i></a>

                                        <button class="btn btn-danger hapus-spt" id="<?= $rows->id_spt ?>" title="Hapus"><i class="fa fa-trash"></i></button>

                                    <?php } elseif ($this->session->userdata('level') == 2) { ?>


                                    <?php } else { ?>

                                    <?php } ?>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Tambah -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah SPT</h4>
                <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-body">
                        <form action="<?= site_url('spt/tambah_spt') ?>" method="post" enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Berangkat</label>
                                        <input class="form-control" type="date" name="tgl_berangkat" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Pulang</label>
                                        <input class="form-control" type="date" name="tgl_pulang" required>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Tujuan</label>
                                        <input class="form-control" type="text" name="tujuan">
                                    </div>
                                </div>

                                <!-- <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Dasar SPT :</label>
                                        <textarea class="form-control" name="dasar"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Untuk :</label>
                                        <textarea class="form-control" name="untuk"></textarea>
                                    </div>
                                </div> -->

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Pilih Pegawai</label>
                                        <select class="form-control" id="pilih_pegawai" name="pegawai[]" multiple="multiple" style="width:100%">
                                            <option></option>
                                            <?php
                                            $pgw = $this->db->query("SELECT * FROM tbl_pegawai")->result();
                                            foreach ($pgw as $rows) {
                                                echo '<option value="' . $rows->pegawai . '">' . $rows->pegawai . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">File</label>
                                        <input type="file" name="filex" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row" align="right">
                                <div class="col-md-12">
                                    <!-- <button type="submit" formtarget="_blank" name="id" value="view" class="btn btn-primary"><i class="fa fa-print"></i> Preview</button> -->
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>


            </div>


        </div>
        <div class="modal-footer">

        </div>
    </div>

</div>

<!-- Modal Edit -->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" id="edit_result">

        <!-- Modal content-->
        <!-- <div id="edit_result"></div> -->

    </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingin Menghapus Data?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik hapus untuk menghapus data.</div>
            <div class="modal-footer">
                <div id="test"></div>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Preview File -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Preview Nota Dinas</h4>
                <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label class="control-label">Nota Dinas</label><br>
                                    <div id="file_nota"></div>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label class="control-label">Disposisi Nota Dinas</label><br>
                                    <div id="file_nota1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row" align="right">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
        <div class="modal-footer">
        </div>
    </div>

</div>

</div>
<!-- End of Main Content -->