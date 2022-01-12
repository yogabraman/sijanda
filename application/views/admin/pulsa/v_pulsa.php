<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
                      function rupiah($angka){
                        $hasil_rupiah = "Rp. " . number_format($angka);
                        return $hasil_rupiah;
                      }
                    ?>

            <?php if ($this->session->userdata('level') == 1) { ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Pulsa</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pulsa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Sensor</th>
                                            <th>Pulsa</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pulsa as $rows) {?>
                                        <tr>
                                            <td><?= $rows->nama ?></td>
                                            <td><?= number_format($rows->pulsa) ?> Kwh</td>
                                            <td>
                                                <button class="btn btn-primary edit-pulsa" id="<?= $rows->id_sensor ?>"><i class="far fa-edit"></i> Isi Pulsa</button>
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

            <?php } else { ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $title_user ?></h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?= $title_user ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Sensor</th>
                                            <th>Pulsa</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pulsa_user as $rows) {?>
                                        <tr>
                                            <td><?= $rows->nama ?></td>
                                            <td><?= number_format($rows->pulsa) ?> Kwh</td>
                                            <td>
                                                <button class="btn btn-primary edit-pulsa" id="<?= $rows->id_sensor ?>"><i class="far fa-edit"></i> Isi Pulsa</button>
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

            <?php } ?>

                
                <!-- Modal Edit -->
                <div id="editModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable" id="edit_result">

                    <!-- Modal content-->
                    <!-- <div id="edit_result"></div> -->

                    </div>
                </div>

            </div>
            <!-- End of Main Content -->