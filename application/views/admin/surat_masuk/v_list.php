<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<?= $id_surat = "" ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Surat Masuk</h1>
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
                <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Surat Masuk</button>
                <a href="<?= site_url('surat_masuk/cetak') ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak Surat Masuk</a>
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
                        <?php foreach ($masuk as $rows) { ?>
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

                                        <a target="_blank" href="<?= base_url() ?>assets/suratmasuk/<?= $rows->file ?>" class="btn btn-warning" title="Lihat File"><i class="fa fa-file"></i></a>

                                        <button class="btn btn-danger hapus-sm" id="<?= $rows->id_surat ?>" title="Hapus"><i class="fa fa-trash"></i></button>

                                        <?php if ($rows->status_dispo == 0 && $rows->status_print == 0 && $rows->penerima == null) { ?>
                                            <!-- <a href="<?= site_url('dispo/get_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-success edit-sm " id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-pen"></i></a> -->
                                        <?php } elseif ($rows->status_dispo == 1 && $rows->status_print == 0 && $rows->penerima == null) { ?>
                                            <a target="_blank" href="<?= site_url('dispo/print_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-primary" id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-eye"></i></a>
                                        <?php } elseif ($rows->status_dispo == 1 && $rows->status_print == 1 && $rows->penerima == null) { ?>
                                            <a target="_blank" href="<?= site_url('dispo/print_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-success" id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-print"></i></a>
                                        <?php } else { ?>
                                            <a target="_blank" href="<?= site_url('dispo/print_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-success" id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-user"></i></a>
                                        <?php } ?>

                                        <?php if ($rows->nodin == 1) { ?>
                                            <button style="margin-top:3px" class="btn btn-success upload-nodin" id="<?= $rows->id_surat ?>" title="Upload"><i class="fa fa-upload"></i></button>
                                        <?php } elseif ($rows->nodin == 2) { ?>
                                            <a style="margin-top:3px" target="_blank" href="<?= base_url() ?>assets/notadinas/<?= $rows->file_nodin ?>" class="btn btn-success" title="Lihat File"><i class="fa fa-file"></i></a>
                                        <?php } ?>

                                    <?php } elseif ($this->session->userdata('level') == 2) { ?>

                                        <a target="_blank" href="<?= base_url() ?>assets/suratmasuk/<?= $rows->file ?>" class="btn btn-warning" title="Lihat File"><i class="fa fa-file"></i></a>

                                        <?php if ($rows->status_dispo == 0) { ?>
                                            <button class="btn btn-success add-dispo" id="<?= $rows->file ?>/-/<?= $rows->id_surat ?>" title=" Disposisi"><i class="fa fa-pen"></i></button>
                                            <!-- <a href="<?= site_url('dispo/get_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-success edit-sm " id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-pen"></i></a> -->
                                        <?php } else { ?>
                                            <a href="<?= site_url('dispo/get_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-primary" id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-eye"></i></a>
                                            <a href="<?= site_url('dispo/print_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-success" id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-print"></i></a>
                                        <?php } ?>

                                        <?php if ($rows->nodin == 1) { ?>
                                            <button style="margin-top:3px" class="btn btn-success" onclick="belum()"><i class="fa fa-file"></i></button>
                                        <?php } elseif ($rows->nodin == 2) { ?>
                                            <a style="margin-top:3px" target="_blank" href="<?= base_url() ?>assets/notadinas/<?= $rows->file_nodin ?>" class="btn btn-success" title="Lihat File"><i class="fa fa-file"></i></a>
                                        <?php } ?>

                                    <?php } elseif ($this->session->userdata('level') == 3) { ?>
                                        <?php if ($rows->status_dispo == 0) { ?>
                                            <!-- <a href="<?= site_url('dispo/get_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-success edit-sm " id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-pen"></i></a> -->
                                        <?php } elseif ($rows->status_dispo == 1 && $rows->status_print == 0) { ?>
                                            <a target="_blank" href="<?= site_url('dispo/print_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-success" id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-print"></i></a>
                                        <?php } else { ?>
                                            <a target="_blank" href="<?= site_url('dispo/print_dispo/') ?><?= $rows->id_surat ?>" class="btn btn-primary" id="<?= $rows->id_surat ?>" title="Disposisi"><i class="fa fa-eye"></i></a>
                                        <?php } ?>

                                        <?php if ($rows->nodin == 1) { ?>
                                            <button style="margin-top:3px" class="btn btn-success" onclick="belum()"><i class="fa fa-file"></i></button>
                                        <?php } elseif ($rows->nodin == 2) { ?>
                                            <a style="margin-top:3px" target="_blank" href="<?= base_url() ?>assets/notadinas/<?= $rows->file_nodin ?>" class="btn btn-success" title="Lihat File"><i class="fa fa-file"></i></a>
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
                        <form action="<?= site_url('surat_masuk/tambah_sm') ?>" method="post" enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Pilih tipe Surat</label>
                                        <select class="form-control tipe_surat" name="tipe_surat" required>
                                            <option value="0">Surat Biasa</option>
                                            <option value="1">Undangan</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Nomor Agenda</label>
                                        <!-- <input class="form-control" type="text" name="no_agenda"> -->
                                        <?php

                                        $rand = date("Ymd");
                                        //new logic
                                        $no_agenda = $this->db->limit(1)->query("SELECT no_agenda FROM tbl_surat_masuk ORDER BY id_surat DESC")->row()->no_agenda;
                                        $regex = explode("/", $no_agenda);
                                        $ymd = $regex[0];
                                        $num = $regex[1] + 1;
                                        if ($ymd == $rand) {
                                            echo '<input class="form-control" type="text" name="no_agenda" value="' . $rand . '/' . $num . '" readonly>';
                                        } else {
                                            echo '<input class="form-control" type="text" name="no_agenda" value="' . $rand . '/1" readonly>';
                                        }

                                        //old logic
                                        // $no_agenda = $this->db->query("SELECT no_agenda FROM tbl_surat_masuk")->result();
                                        // $cek = false;
                                        // foreach ($no_agenda as $rows) {    
                                        //     if (strpos($rows->no_agenda,'/') !== false) {
                                        //         $regex = explode("/", $rows->no_agenda);
                                        //         $ymd = $regex[0];
                                        //         $num = $regex[1] + 1;

                                        //         if ($ymd == $rand) {
                                        //             echo '<input class="form-control" type="text" name="no_agenda" value="' . $rand . '/' . $num . '" readonly>';
                                        //         } else {
                                        //             echo '<input class="form-control" type="text" name="no_agenda" value="' . $rand . '/1" readonly>';
                                        //         }
                                        //         $cek = true;
                                        //     }
                                        // }
                                        // // print_r($cek);
                                        // if ($cek == false){
                                        //     echo '<input class="form-control" type="text" name="no_agenda" value="' . $rand . '/1" readonly>';
                                        // }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Asal Surat</label>
                                        <input class="form-control" type="text" name="asal_surat" id="asal_surat" required>
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
                                        <input class="form-control" type="date" name="tgl_surat">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Perihal</label>
                                        <textarea class="form-control" type="textarea" name="isi"></textarea>
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


                            <div id="undangan">
                                <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="control-label">Tanggal Acara</label>
                                            <input class="form-control" type="date" name="tgl_agenda">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="control-label">Tempat Acara</label>
                                            <input class="form-control" type="text" name="tempat" placeholder="tempat">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="control-label">Waktu Acara</label>
                                            <input class="form-control" type="time" name="waktu_agenda">
                                        </div>
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
                <!-- <a class="btn btn-danger" href="<?= site_url('user/hapus') ?>">Hapus</a> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Dispo -->
<div class="modal fade" id="dispoModal" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Dispo</h4>
                <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-body">
                        <form action="<?= site_url('dispo/add_dispo') ?>" method="post" enctype="multipart/form-data">
                            <div id="filex" class="row"></div>
                            <div class="row">
                                <div id="ids"></div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Kepada Yth: </label>
                                        <?php
                                        $struk = $this->db->query("SELECT * FROM tbl_struktural")->result();
                                        foreach ($struk as $rows) {
                                            echo '<br><input id="struk_' . $rows->id_struk . '" class="form-control-input" value="' . $rows->nama . '" type="checkbox" name="bidang[]" >';
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
                                            echo '<br><input id="' . $rows->id_perintah . '" class="form-control-input" value="' . $rows->perintah . '" type="checkbox" name="perintah[]" >';
                                            echo '<label for="' . $rows->id_perintah . '" for="perintah" >&nbsp' . $rows->perintah . '</label>';
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Buatkan Nota Dinas?</label><br>
                                        <div class="col-3">
                                            <input type="radio" name="nodin" value="0" checked>
                                            <label for="nodin">Tidak</label>
                                        </div>
                                        <div class="col-3">
                                            <input type="radio" name="nodin" value="1">
                                            <label for="nodin">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
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

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Isi Disposisi</label>
                                        <textarea class="form-control" type="text" name="isi_disposisi"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Catatan</label>
                                        <textarea class="form-control" type="text" name="catatan"></textarea>
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

<!-- Modal Upload File -->
<div class="modal fade" id="uploadNodin" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload Nota Dinas</h4>
                <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-body">
                        <form action="<?= site_url('surat_masuk/upload_nodin') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div id="idnodin"></div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Upload Nota Dinas</label>
                                        <input style="margin-bottom :7px" type="file" name="filex" class="form-control">
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

<script>
function belum() {
  alert("Nota Dinas Belum Diupload!");
}
</script>

<!-- End of Main Content -->