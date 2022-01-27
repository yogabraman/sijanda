<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<?= $id_surat = "" ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Disposisi</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Disposisi</button> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableDispo" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tujuan Disposisi</th>
                            <th>Perintah Disposisi</th>
                            <th>Isi Disposisi</th>
                            <th>Sifat<br />Tgl Dispo</th>
                            <th>Action</th>
                            <th>tgl dispo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dispo as $rows) { ?>
                            <?php
                            $y = substr($rows->tgl_dispo, 0, 4);
                            $m = substr($rows->tgl_dispo, 5, 2);
                            $d = substr($rows->tgl_dispo, 8, 2);
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
                            $tujuan = !empty($rows->tujuan) ? implode("<br>",json_decode($rows->tujuan)): "";
                            $perintah = !empty($rows->perintah) ? implode("<br>",json_decode($rows->perintah)): "";
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $tujuan ?></td>
                                <td><?= $perintah ?></td>
                                <td><?= $rows->isi_disposisi ?></td>
                                <td><?= $rows->sifat ?> <br>
                                    <hr /> <?= $d . " " . $nm . " " . $y ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) { ?>

                                        <a target="_blank" href="<?= site_url('dispo/print_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-warning" title="cetak dispo"><i class="fa fa-print"></i></a>

                                    <?php } elseif ($this->session->userdata('level') == 2) { ?>

                                        <button class="btn btn-info edit-sm" id="<?= $rows->id_surat ?>" title="Edit"><i class="far fa-edit"></i></button>

                                        <a href="" data-toggle="modal" data-target="#hapusMasuk<?= $rows->id_surat ?>" class="btn btn-danger" title="Hapus"><i class="fa fa-trash"></i></a>

                                    <?php } ?>

                                </td>
                                <td><?= $rows->tgl_dispo ?></td>
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
                <h4 class="modal-title">Tambah Surat Masuk</h4>
                <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-body">
                        <form action="<?= site_url('dispo/add_agenda') ?>" method="post" enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Kepada Yth:</label>
                                        <?php
                                        $struk = $this->db->query("SELECT * FROM tbl_struktural")->result();
                                        foreach ($struk as $rows) {
                                            echo '<br><input id="struk_' . $rows->id_struk . '" class="form-control-input" value="' . $rows->nama . '" type="checkbox" name="bidang[]">';
                                            echo '<label for="struk_' . $rows->id_struk . '" for="bidang">&nbsp' . $rows->nama . '</label>';
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Untuk :</label>
                                        <?php
                                        $struk = $this->db->query("SELECT * FROM tbl_perintah")->result();
                                        foreach ($struk as $rows) {
                                            echo '<br><input id="' . $rows->id_perintah . '" class="form-control-input" value="' . $rows->perintah . '" type="checkbox" name="perintah[]">';
                                            echo '<label for="' . $rows->id_perintah . '" for="perintah">&nbsp' . $rows->perintah . '</label>';
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Pilih Sifat Disposisi</label>
                                        <select class="form-control" id="sifat" type="text" name="sifat" required>
                                            <option value="Biasa">Biasa</option>
                                            <option value="Penting">Penting</option>
                                            <option value="Segera">Segera</option>
                                            <option value="Rahasia">Rahasia</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Isi Disposisi</label>
                                        <input class="form-control" type="text" name="isi_disposisi">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Catatan</label>
                                        <input class="form-control" type="text" name="catatan">
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

</div>
<!-- End of Main Content -->