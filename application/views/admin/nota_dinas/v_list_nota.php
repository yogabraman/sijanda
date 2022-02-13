<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<?= $id_surat = "" ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Surat nota</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <div class="col-md-6 col-12">
                <div class="form-group">
                    <label class="control-label">Asal Surat</label>
                    <input class="form-control" type="text" name="asal_surat" id="asal_surat">
                </div>
            </div> -->
            <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) { ?>
                <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Nota Dinas</button>
            <?php } else {
                echo "";
            } ?>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableSM" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. Agenda</th>
                            <th>No. Surat<br />Tgl Surat</th>
                            <th>Asal Surat</th>
                            <th>Perihal</th>
                            <th>Action</th>
                            <th>status</th>
                            <th>created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($nota as $rows) { ?>
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
                                <td><?= $rows->no_agenda ?></td>
                                <td><?= $rows->no_surat ?> <br>
                                    <hr /> <?= $d . " " . $nm . " " . $y ?>
                                </td>
                                <td><?= $rows->asal_surat ?></td>
                                <td><?= $rows->isi ?></td>
                                <td class="text-center" style="min-width:180px;">
                                    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) { ?>

                                        <button class="btn btn-info edit-sm" id="<?= $rows->id_surat ?>" title="Edit"><i class="far fa-edit"></i></button>

                                        <a target="_blank" href="<?= base_url() ?>assets/suratnota/<?= $rows->file ?>" class="btn btn-warning" title="Lihat File"><i class="fa fa-file"></i></a>

                                        <button class="btn btn-danger hapus-sm" id="<?= $rows->id_surat ?>" title="Hapus"><i class="fa fa-trash"></i></button>

                                        <?php if ($rows->status_dispo == 0) { ?>
                                            <!-- <a href="<?= site_url('dispo/get_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-success edit-sm " id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-pen"></i></a> -->
                                        <?php } elseif ($rows->status_dispo == 1 && $rows->status_print == 0) { ?>
                                            <a target="_blank" href="<?= site_url('dispo/print_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-primary" id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-eye"></i></a>
                                        <?php } else { ?>
                                            <a target="_blank" href="<?= site_url('dispo/print_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-success" id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-print"></i></a>
                                        <?php } ?>

                                    <?php } elseif ($this->session->userdata('level') == 2) { ?>

                                        <a target="_blank" href="<?= base_url() ?>assets/suratnota/<?= $rows->file ?>" class="btn btn-warning" title="Lihat File"><i class="fa fa-file"></i></a>

                                        <?php if ($rows->status_dispo == 0) { ?>
                                            <button class="btn btn-success add-dispo" id="<?= $rows->file ?>/-/<?= $rows->id_surat ?> title=" Disposisi"><i class="fa fa-pen"></i></button>
                                            <!-- <a href="<?= site_url('dispo/get_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-success edit-sm " id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-pen"></i></a> -->
                                        <?php } else { ?>
                                            <a href="<?= site_url('dispo/get_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-primary" id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-eye"></i></a>
                                        <?php } ?>

                                    <?php } elseif ($this->session->userdata('level') == 3) { ?>
                                        <?php if ($rows->status_dispo == 0) { ?>
                                            <!-- <a href="<?= site_url('dispo/get_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-success edit-sm " id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-pen"></i></a> -->
                                        <?php } elseif ($rows->status_dispo == 1 && $rows->status_print == 0) { ?>
                                            <a target="_blank" href="<?= site_url('dispo/print_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-success" id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-print"></i></a>
                                        <?php } else { ?>
                                            <a target="_blank" href="<?= site_url('dispo/print_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-primary" id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-eye"></i></a>
                                        <?php } ?>
                                    <?php } ?>

                                </td>
                                <td><?= $rows->status_dispo ?></td>
                                <td><?= $rows->tgl_diterima ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->