<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cetak Surat Masuk</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-print"></i>  Cetak</h6>
        </div>
        <div class="card-body">


            <form>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Dari Tanggal</label>
                        <input type="date" class="form-control" id="from" required>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Sampai Tanggal</label>
                        <input type="date" class="form-control" id="to" required>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-user" onclick="Encrypt()">
                    TAMPILKAN
                </button>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->