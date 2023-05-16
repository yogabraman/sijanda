<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Memo</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Memo</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableAgenda" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. Memo<br />Tgl Memo</th>
                            <th>Tujuan</th>
                            <th>Isi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($memo as $rows) { ?>
                            <?php
                            $y = substr($rows->created_at, 0, 4);
                            $m = substr($rows->created_at, 5, 2);
                            $d = substr($rows->created_at, 8, 2);
                            $id_memo = $rows->id_memo;

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
                                <td><?= $rows->no_surat ?> <br>
                                    <hr /> <?= $d . " " . $nm . " " . $y ?>
                                </td>
                                <td><?= $rows->dispo ?></td>
                                <td><?= $rows->isi ?></td>
                                <td class="text-center" style="min-width:80px;">
                                    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) { ?>
                                        <button class="btn btn-info edit-agenda" id="<?= $rows->id_memo ?>" title="Edit"><i class="fa fa-edit"></i></button>
                                        <button style="margin-top :3px" class="btn btn-danger hapus-agenda" id="<?= $rows->id_memo ?>"><i class="fa fa-trash"></i></button>
                                        <a target="_blank" href="<?= site_url('dispo/print_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-success" id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-user"></i></a>
                                    <?php } elseif ($this->session->userdata('level') == 2) { ?>
                                        <button class="btn btn-info edit-agenda" id="<?= $rows->id_agenda ?>" title="Edit"><i class="far fa-edit"></i></button>
                                        <button class="btn btn-danger hapus-agenda" id="<?= $rows->id_agenda ?>"><i class="fa fa-trash"></i></button>
                                        <?php } elseif ($this->session->userdata('level') == 3) {
                                        if (strpos($rows->dispo, $this->session->userdata('bidang')) !== false) { ?>
                                            <button class="btn btn-info edit-agenda" id="<?= $rows->id_agenda ?>" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button style="margin-top :3px" class="btn btn-warning upload-dukung" id="<?= $rows->id_agenda ?>" title="Upload"><i class="fa fa-file"></i></button>
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
                <h4 class="modal-title">Tambah Memo</h4>
                <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-body">
                        <form action="<?= site_url('memo/add_memo') ?>" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Nomor Memo</label>
                                        <?php

                                        $rand = date("Ymd");
                                        //new logic
                                        $no_memo = $this->db->limit(1)->query("SELECT no_memo FROM tbl_memo ORDER BY id_memo DESC")->row()->no_memo;
                                        print_r($no_memo);
                                        $regex = explode("/", $no_memo);
                                        $ymd = $regex[0];
                                        $num = $regex[1] + 1;
                                        if ($ymd == $rand) {
                                            echo '<input class="form-control" type="text" name="no_agenda" value="' . $rand . '/'.'MEMO/' . $num . '" readonly>';
                                        } else {
                                            echo '<input class="form-control" type="text" name="no_agenda" value="' . $rand . '/MEMO/1" readonly>';
                                        }
                                        ?>
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

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Disposisi</label>
                                        <input type="hidden" name="isi_disposisi" value="<?= set_value('isi_disposisi') ?>">
                                        <div id="editor" style="min-height: 160px;"><?= set_value('isi_disposisi') ?></div>
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

<!-- Modal Upload File -->
<div class="modal fade" id="uploadModal" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" id="upload_result">
        <!-- Modal content-->
    </div>

</div>

</div>
<!-- End of Main Content -->