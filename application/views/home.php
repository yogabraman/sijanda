<!-- Begin Page Content -->

<body>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row justify-content-center">
            <div class="col-lg-4 col-12 logo">
                <center><img src="<?php echo base_url(); ?>assets/img/logo.png" width="100%"></center>
            </div>

        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableAgenda" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Dari</th>
                                <th>Tempat</th>
                                <th>Acara</th>
                                <th>Dispo</th>
                                <th>Date</th>
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

                                $disp = !empty($rows->dispo) ? implode("<br>", json_decode($rows->dispo)) : "";
                                ?>
                                <tr>
                                    <td><?= $d . " " . $nm . " " . $y ?></td>
                                    <td><?= substr($rows->waktu_agenda, 0, 5) ?></td>
                                    <td><?= $rows->asal ?></td>
                                    <td><?= $rows->tempat ?></td>
                                    <td><?= substr($rows->isi, 0, 200) ?></td>
                                    <td><?= $disp ?></td>
                                    <td><?= $rows->tgl_agenda ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</body>