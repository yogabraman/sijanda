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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

                            $disp = !empty($rows->dispo) ? implode("<br>",json_decode($rows->dispo)): "";
                            ?>
                            <tr>
                                <td><?= $d . " " . $nm . " " . $y ?></td>
                                <td><?= substr($rows->waktu_agenda, 0, 5) ?></td>
                                <td><?= $rows->asal ?></td>
                                <td><?= $rows->tempat ?></td>
                                <td><?= substr($rows->isi, 0, 200) ?></td>
                                <td><?= $disp ?></td>
                                <td class="text-center" style="min-width:100px;">
                                    <button class="btn btn-info edit-sm" id="<?= $rows->id_agenda ?>" title="Edit"><i class="far fa-edit"></i></button>
                                    <a href="<?= base_url('surat_masuk/hapus/') ?><?= $rows->id_agenda ?>" class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>
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