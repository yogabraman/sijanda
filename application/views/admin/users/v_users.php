<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
                      function rupiah($angka){
                        $hasil_rupiah = "Rp. " . number_format($angka);
                        return $hasil_rupiah;
                      }
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
                                            <th>Password</th>
                                            <th>Id Pelanggan</th>
                                            <th>Kamar</th>
                                            <th>Pulsa</th>
                                            <th>Saklar</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $rows) {?>
                                        <tr>
                                            <td><?= $rows->username ?></td>
                                            <td><?= $rows->password_text ?></td>
                                            <td>
                                                <?php if ($rows->id_pelanggan == NULL) { ?>
                                                    Tidak ada
                                                <?php } else { ?>
                                                    <?= $rows->id_pelanggan ?>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($rows->nama == NULL) { ?>
                                                    Tidak ada
                                                <?php } else { ?>
                                                    <?= $rows->nama ?>
                                                <?php } ?>
                                                    
                                            </td>
                                            <td><?= number_format($rows->pulsa) ?> Kwh</td>
                                            <td>
                                                <?php if ($rows->saklar == 1) { ?>
                                                    <div class="badge badge-success">ON</div>
                                                <?php } elseif ($rows->saklar != NULL) { ?>
                                                    <div class="badge badge-danger">OFF</div>
                                                <?php } elseif ($rows->saklar == NULL) { ?>
                                                    Tidak ada
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($rows->status == 1) { ?>
                                                    <div class="badge badge-success">AKTIF</div>
                                                <?php } else { ?>
                                                    <div class="badge badge-danger">TIDAK AKTIF</div>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary edit-user" id="<?= $rows->id_user ?>"><i class="far fa-edit"></i> edit</button>
                                                <a href="<?= site_url('user/hapus') ?>/<?= $rows->id_user ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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
                                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                                </div>
                                            </div>

                                        </div> 

                                        <div class="row">

                                            <?php if ($count_kamar > 0) { ?>

                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Pilih Kamar</label>
                                                    <select class="form-control" name="id_sensor">
                                                        <?php foreach ($kamar as $rows) { ?>
                                                            <option value="<?= $rows->id_sensor ?>"><?= $rows->nama ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <?php } else { ?>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="id_sensor" class="form-control" value="0">
                                                    <label class="control-label">Pilih Kamar</label>
                                                    <input type="text" class="form-control" name="kamar" value="Kamar Penuh" disabled="">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Level User</label>
                                                    <select class="form-control" name="level">
                                                        <option value="1">Admin</option>
                                                        <option value="2">Pengguna</option>
                                                    </select>
                                                </div>
                                            </div>
                                                    
                                            <?php } ?>

                                        </div>


                                        <?php if ($count_kamar > 0) { ?>

                                        <div class="row">

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Level User</label>
                                                    <select class="form-control" name="level">
                                                        <option value="1">Admin</option>
                                                        <option value="2">Pengguna</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Status User</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Tidak Aktif</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>  

                                        <?php } ?>

                                        <div class="row" align="right">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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

            </div>
            <!-- End of Main Content -->