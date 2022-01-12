<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <?php if ($this->session->userdata('level') == 1) { ?>
      <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kontrol</h1>
                    </div>

                    <div class="row">

                        <div class="col-12 col-lg-6">

                            <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Kamar 1</h6>
                            </div>
                            <div class="card-body">
                                <center>
                                    <a href="<?= site_url('kontrol/sensor1') ?>/1" class="btn btn-success "><i class="fas fa-fw fa-power-off"></i> ON</a>
                                    <a href="<?= site_url('kontrol/sensor1') ?>/0" class="btn btn-danger "><i class="fas fa-fw fa-power-off"></i> OFF</a>
                                    <br>
                                    <?php foreach ($sensor1 as $rows) {
                                        if ($rows->saklar == 0) {
                                    ?>
                                        <img src="<?php echo base_url(); ?>assets/img/off.png" width="50%">
                                        <br>
                                        <h1 style="color: red;">OFF</h1>
                                    <?php } else { ?>
                                        <img src="<?php echo base_url(); ?>assets/img/on.png" width="50%">
                                        <br>
                                        <h1 style="color: green;">ON</h1>
                                    <?php } } ?>
                                </center>

                            </div>
                        </div>
                            
                        </div>

                        <div class="col-12 col-lg-6">

                            <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Kamar 2</h6>
                            </div>
                            <div class="card-body">
                                <center>
                                    <a href="<?= site_url('kontrol/sensor2') ?>/1" class="btn btn-success "><i class="fas fa-fw fa-power-off"></i> ON</a>
                                    <a href="<?= site_url('kontrol/sensor2') ?>/0" class="btn btn-danger "><i class="fas fa-fw fa-power-off"></i> OFF</a>
                                    <br>
                                    <?php foreach ($sensor2 as $rows) {
                                        if ($rows->saklar == 0) {
                                    ?>
                                        <img src="<?php echo base_url(); ?>assets/img/off.png" width="50%">
                                        <br>
                                        <h1 style="color: red;">OFF</h1>
                                    <?php } else { ?>
                                        <img src="<?php echo base_url(); ?>assets/img/on.png" width="50%">
                                        <br>
                                        <h1 style="color: green;">ON</h1>
                                    <?php } } ?>
                                </center>

                            </div>
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

                    <div class="row">

                        <div class="col-12 col-lg-6">

                            <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><?= $title_user ?></h6>
                            </div>
                            <div class="card-body">
                                <center>
                                    <a href="<?= site_url('kontrol/sensor') ?><?= $id_sensor ?>/1" class="btn btn-success "><i class="fas fa-fw fa-power-off"></i> ON</a>
                                    <a href="<?= site_url('kontrol/sensor') ?><?= $id_sensor ?>/0" class="btn btn-danger "><i class="fas fa-fw fa-power-off"></i> OFF</a>
                                    <br>
                                    <?php foreach ($kontrol_user as $rows) {
                                        if ($rows->saklar == 0) {
                                    ?>
                                        <img src="<?php echo base_url(); ?>assets/img/off.png" width="50%">
                                        <br>
                                        <h1 style="color: red;">OFF</h1>
                                    <?php } else { ?>
                                        <img src="<?php echo base_url(); ?>assets/img/on.png" width="50%">
                                        <br>
                                        <h1 style="color: green;">ON</h1>
                                    <?php } } ?>
                                </center>

                            </div>
                        </div>
                            
                        </div>


                    </div>
                    

                </div>
                <!-- /.container-fluid -->


    <?php } ?>

            </div>
            <!-- End of Main Content -->