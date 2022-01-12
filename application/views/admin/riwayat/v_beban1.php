<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Riwayat Beban 1</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Riwayat Beban 1</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Arus</th>
                                            <th>Tegangan</th>
                                            <th>Daya</th>
                                            <th>Energi</th>
                                            <th>Pulsa</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sensor1 as $rows) {?>
                                        <tr>
                                            <td><?= $rows->arus ?></td>
                                            <td><?= $rows->tegangan ?></td>
                                            <td><?= $rows->daya ?></td>
                                            <td><?= $rows->energi ?></td>
                                            <td><?= $rows->pulsa ?></td>
                                            <td><?= $rows->created_at ?></td>
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