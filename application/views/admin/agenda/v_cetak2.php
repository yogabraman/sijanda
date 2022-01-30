<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cetak Agenda</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Cetak Agenda
        </div>
        <div class="card-body">


            <form action="<?= site_url('agenda/cetakbydate2') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0 col-12">
                        <label>Dari Tanggal</label>
                        <input type="date" class="form-control" id="start" name="start" required>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0 col-12">
                        <label>Sampai Tanggal</label>
                        <input type="date" class="form-control" id="end" name="end" required>
                    </div>
                    <div class="col-sm-4 col-12" style="padding: 30px">
                        <a id="btnSearch" class="btn btn-primary btn-user">
                           <i class="fa fa-eye"></i> TAMPILKAN
                        </a>
                        <button type="submit" class="btn btn-warning btn-user" formtarget="_blank">
                           <i class="fa fa-print"></i> CETAK
                        </button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                      <table class="table table-striped" id="dataTableAgenda">
                        <thead>                                 
                          <tr>
                            <th class="text-center">No</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Dari</th>
                            <th>Tempat</th>
                            <th>Acara</th>
                            <th>Dispo</th>
                          </tr>
                        </thead>
                        <tbody id="cari">
                          
                        </tbody>
                      </table>
                    </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->