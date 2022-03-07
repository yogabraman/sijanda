<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agenda</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Agenda</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableAgenda" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Dari</th>
                            <th>Tempat</th>
                            <th>Acara</th>
                            <th>Dispo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($agenda as $rows) { ?>
                            <?php
                            $y = substr($rows->tgl_agenda, 0, 4);
                            $m = substr($rows->tgl_agenda, 5, 2);
                            $d = substr($rows->tgl_agenda, 8, 2);

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

                            $disp = !empty($rows->dispo) ? implode("<br>", json_decode($rows->dispo)) : "";
                            ?>
                            <tr>
                                <td><?= $d . " " . $nm . " " . $y ?></td>
                                <td><?= substr($rows->waktu_agenda, 0, 5) ?></td>
                                <td><?= $rows->asal ?></td>
                                <td><?= $rows->tempat ?></td>
                                <td><?= substr($rows->isi, 0, 200) ?></td>
                                <td><?= $disp ?></td>
                                <td class="text-center" style="min-width:80px;">
                                    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) { ?>
                                        <button class="btn btn-info edit-agenda" id="<?= $rows->id_agenda ?>" title="Edit"><i class="fa fa-edit"></i></button>
                                        <button style="margin-top :3px" class="btn btn-danger hapus-agenda" id="<?= $rows->id_agenda ?>"><i class="fa fa-trash"></i></button>
                                        <button style="margin-top :3px" class="btn btn-warning upload-dukung" id="<?= $rows->id_agenda ?>" title="Upload"><i class="fa fa-file"></i></button>
                                    <?php } elseif ($this->session->userdata('level') == 2) { ?>
                                        <button class="btn btn-info edit-agenda" id="<?= $rows->id_agenda ?>" title="Edit"><i class="far fa-edit"></i></button>
                                        <button class="btn btn-danger hapus-agenda" id="<?= $rows->id_agenda ?>"><i class="fa fa-trash"></i></button>
                                        <?php } elseif ($this->session->userdata('level') == 3) {
                                        if (strpos($rows->dispo, $this->session->userdata('bidang')) !== false) { ?>
                                            <button class="btn btn-info edit-agenda" id="<?= $rows->id_agenda ?>" title="Edit"><i class="fa fa-edit"></i></button>
                                        <?php } else { ?>
                                            <button class="btn btn-secondary"><i class="fas fa-exclamation-circle"></i></button>
                                        <?php } ?>
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
                <h4 class="modal-title">Tambah Agenda</h4>
                <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-body">
                        <form action="<?= site_url('agenda/add_agenda') ?>" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Acara</label>
                                        <input class="form-control" type="date" name="tgl_acara">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Tempat Acara</label>
                                        <input class="form-control" type="text" name="tempat">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Waktu Acara</label>
                                        <input class="form-control" type="time" name="wkt_acara">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Dari</label>
                                        <input class="form-control" type="text" name="dari">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Isi Acara</label>
                                        <textarea class="form-control" type="text" name="isi"></textarea>
                                    </div>
                                </div>

                                <?php if ($this->session->userdata('level') == 3) { ?>
                                    <input class="form-control" type="hidden" name="bidang[]" value="<?= $this->session->userdata('bidang') ?>">
                                <?php } else { ?>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="control-label">Bidang :</label>
                                            <?php
                                            $struk = $this->db->query("SELECT * FROM tbl_struktural")->result();
                                            foreach ($struk as $rows) {
                                                echo '<br><input id="struk_' . $rows->id_struk . '" class="form-control-input" value="' . $rows->nama . '" type="checkbox" name="bidang[]">';
                                                echo '<label for="struk_' . $rows->id_struk . '" for="bidang">&nbsp' . $rows->nama . '</label>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php } ?>

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
                <!-- <a class="btn btn-danger" href="<?= site_url('user/hapus') ?>">Hapus</a> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Upload File -->
<div class="modal fade" id="uploadModal" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" id="upload_result">
        <!-- Modal content-->
    </div>

</div>

</div>
<!-- End of Main Content -->