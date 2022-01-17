<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Surat Masuk</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Surat Masuk</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. Agenda</th>
                            <th>No. Surat<br />Tgl Surat</th>
                            <th>Asal Surat</th>
                            <th>Perihal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($masuk as $rows) { ?>
                            <?php
                            $y = substr($rows->tgl_surat, 0, 4);
                            $m = substr($rows->tgl_surat, 5, 2);
                            $d = substr($rows->tgl_surat, 8, 2);

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
                                    <button class="btn btn-info edit-sm" id="<?= $rows->id_surat ?>" title="Edit"><i class="far fa-edit"></i></button>
                                    <button class="btn btn-success edit-sm" id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-pen"></i></button>
                                    <a href="<?= base_url('') ?><?= $rows->id_surat ?>" class="btn btn-warning" title="Lihat File"><i class="fa fa-file"></i></a>
                                    <a href="<?= base_url('surat_masuk/hapus/') ?><?= $rows->id_surat ?>" class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
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

</div>
<!-- End of Main Content -->