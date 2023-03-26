<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <a href="<?= base_url('auto/kirim_file_saja'); ?>" class="btn btn-success"><i class="fa fa-comment-dots"></i>  Coba WA</a><br><br>

    <!-- Content Row -->
    <div class="row mb-4">

        <!-- ARUS SAAT INI Card Example -->
        <div class="col-12 col-md-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Surat Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count1 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TEGANGAN SAAT INI Card Example -->
        <div class="col-12 col-md-3">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Jumlah Surat Keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count2 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DAYA SAAT INI Example -->
        <div class="col-12 col-md-3">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Jumlah Belum Disposisi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count3 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-inbox fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PULSA SAAT INI Card Example -->
        <div class="col-12 col-md-3">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Disposisi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count4 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-inbox-out fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($this->session->userdata('level') == 1) {?>
            <div style="margin-top:10px" class="col-12 col-md-3">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Pengguna</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count5 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->