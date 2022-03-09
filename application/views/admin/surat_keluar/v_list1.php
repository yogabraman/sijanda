<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<?= $id_surat = "" ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Surat keluar</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) { ?>
                <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Surat keluar</button>
                <a href="<?= site_url('surat_masuk/cetak1') ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak Surat keluar</a>
            <?php } else {
                echo "";
            } ?>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableSK" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. Surat<br />Tgl Surat</th>
                            <th>Perihal</th>
                            <th>Konseptor</th>
                            <th>Tujuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($keluar as $rows) { ?>
                            <?php
                            $y = substr($rows->tgl_surat, 0, 4);
                            $m = substr($rows->tgl_surat, 5, 2);
                            $d = substr($rows->tgl_surat, 8, 2);
                            $id_surat = $rows->id_surat;

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
                            ?>
                            <tr>
                                <td><?= $rows->id_surat ?></td>
                                <td><?= $rows->no_surat ?> <br>
                                    <hr /> <?= $d . " " . $nm . " " . $y ?>
                                </td>
                                <td><?= $rows->perihal ?></td>
                                <td><?= $rows->dari ?></td>
                                <td><?= $rows->tujuan ?></td>
                                <td class="text-center" style="min-width:100px;">
                                    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) { ?>
                                        <button class="btn btn-info edit-sk" id="<?= $rows->id_surat ?>" title="Edit"><i class="far fa-edit"></i></button>
                                        <button class="btn btn-danger hapus-sk" id="<?= $rows->id_surat ?>"><i class="fa fa-trash"></i></button>
                                        <a target="_blank" href="<?= base_url() ?>assets/suratkeluar/<?= $rows->file ?>" class="btn btn-warning" title="Lihat File"><i class="fa fa-file"></i></a>
                                        <a target="_blank" class="btn btn-dark" title="Share Link"><i class="fa fa-share-alt"></i></a>
                                    <?php } elseif ($this->session->userdata('level') == 2) { ?>
                                        <button class="btn btn-secondary"><i class="fas fa-exclamation-circle"></i></button>
                                        <a target="_blank" href="<?= base_url() ?>assets/suratkeluar/<?= $rows->file ?>" class="btn btn-warning" title="Lihat File"><i class="fa fa-file"></i></a>
                                    <?php } elseif ($this->session->userdata('level') == 3) { ?>
                                        <button class="btn btn-secondary"><i class="fas fa-exclamation-circle"></i></button>
                                        <a target="_blank" href="<?= base_url() ?>assets/suratkeluar/<?= $rows->file ?>" class="btn btn-warning" title="Lihat File"><i class="fa fa-file"></i></a>
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
                <h4 class="modal-title">Tambah Surat keluar</h4>
                <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-body">
                        <form action="<?= site_url('surat_masuk/tambah_sk') ?>" method="post" enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Konseptor Surat</label>
                                        <select class="form-control" type="text" name="dari" required>
                                            <option></option>
                                            <?php
                                            $struk = $this->db->query("SELECT * FROM tbl_struktural")->result();
                                            foreach ($struk as $rows) {
                                                echo '<option value="' . $rows->nama . '">' . $rows->nama . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Tujuan Surat</label>
                                        <textarea class="form-control" type="text" name="tujuan" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Nomor Surat</label>
                                        <input class="form-control" type="text" name="no_surat" placeholder="Nomor Surat">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Surat</label>
                                        <input class="form-control" type="date" name="tgl_surat" required>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Perihal</label>
                                        <input class="form-control" type="text" name="perihal" required>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">File</label>
                                        <input type="file" name="filex" class="form-control">
                                        <small class="red-text">*Format file yang diperbolehkan *.JPG, *.PNG, *.DOC, *.DOCX, *.PDF dan ukuran maksimal file 10 MB!</small>
                                    </div>
                                </div>

                            </div>

                            <div class="row" align="right">
                                <div class="col-md-12">
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
                <!-- <a class="btn btn-danger" href="<?= site_url('') ?>">Hapus</a> -->
            </div>
        </div>
    </div>
</div>

<!-- End of Main Content -->