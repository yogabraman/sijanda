<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data User</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Nama <br> Bidang</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $rows) { ?>
                            <tr>
                                <td><?= $rows->username ?></td>
                                <td><?= $rows->nama ?><br><?= $rows->nip ?></td>
                                <td>
                                    <?php if ($rows->admin == 1) { ?>
                                        Admin
                                    <?php } elseif ($rows->admin == 4) { ?>
                                        Tata Usaha
                                    <?php } elseif ($rows->admin == 2) { ?>
                                        Stuktural
                                    <?php } else { ?>
                                        Pegawai
                                    <?php } ?>
                                </td>
                                <td>
                                    <button class="btn btn-primary edit-user" id="<?= $rows->id_user ?>"><i class="far fa-edit"></i> edit</button>
                                    <!-- <a href="<?= site_url('user/hapus') ?>/<?= $rows->id_user ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a> -->
                                    <button class="btn btn-danger hapus-user" id="<?= $rows->id_user ?>"><i class="fa fa-trash"></i> Hapus</button>
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
                <h4 class="modal-title">Tambah Data User</h4>
                <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="<?= site_url('user/tambah_user') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-body">

                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Username</label>
                                        <input class="form-control" type="text" name="username" placeholder="Username">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input class="form-control" type="text" name="password" placeholder="Password">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" placeholder="Nama">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Bidang</label>
                                        <select class="form-control" id="bidang" type="text" name="bidang" required>
                                            <option></option>
                                            <?php
                                            $struk = $this->db->query("SELECT * FROM tbl_struktural")->result();
                                            foreach ($struk as $rows) {
                                                echo '<option value=' . $rows->id_struk . '>' . $rows->nama . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Pilih Tipe User</label>
                                        <select class="form-control" id="admin" type="text" name="admin" required>
                                            <option value="2">Pimpinan</option>
                                            <option value="3">Pegawai</option>
                                            <option value="4">Tata Usaha</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row" align="right">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                </div>
                            </div>

                        </div>
                    </form>
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
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingin Menghapus Data?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik hapus untuk menghapus data <?= $this->input->post("userId") ?>sdfa</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" href="<?= site_url('user/hapus') ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->