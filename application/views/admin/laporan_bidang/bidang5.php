<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<?= $id_surat = "" ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Kinerja Bidang 5</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Laporan</button>
            <button class="btn btn-info"><i class="fa fa-download"></i> Template Laporan</button>
        </div>
        <div class="card-body">
            <form action="<?= site_url('') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-mb-2 mb-sm-0 col-6">
                        <div class="form-group">
                            <label class="control-label">Pilih Tahun</label>
                            <select class="form-control" id="tahun" type="text" name="tahun" required>
                                <option value="2022">2022</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-mb-2 mb-sm-0 col-6">
                        <div class="form-group">
                            <label class="control-label">Pilih Bulan</label>
                            <select class="form-control" id="bulan" type="text" name="bulan" required>
                                <option value="january">Januari</option>
                                <option value="february">Februari</option>
                                <option value="march">Maret</option>
                                <option value="april">April</option>
                                <option value="may">Mei</option>
                                <option value="june">Juni</option>
                                <option value="july">Juli</option>
                                <option value="august">Agustus</option>
                                <option value="september">September</option>
                                <option value="october">Oktober</option>
                                <option value="november">November</option>
                                <option value="december">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-mb-2 mb-sm-0 col-6">
                        <div class="form-group">
                            <label class="control-label">Pilih Periode</label>
                            <select class="form-control" id="periode" type="text" name="periode" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12" style="padding: 30px">
                        <a id="btnSearch" class="btn btn-primary btn-user">
                            <i class="fa fa-eye"></i> TAMPILKAN
                        </a>
                    </div>
                </div>
            </form>
            <style>
                .dataTables_wrapper {
                    font-family: tahoma;
                    font-size: 8px;
                    position: relative;
                    clear: both;
                    *zoom: 1;
                    zoom: 1;
                }
            </style>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableLaporKinerja" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center;">NO</th>
                            <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center;">KAB./ KOTA</th>
                            <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center;">WAJIB KTP-EL</th>
                            <th scope="col" colspan="2" style="vertical-align: middle; text-align: center;">PEREKAMAN</th>
                            <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center;">SISA SUKET</th>
                            <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center;">KOLOM HILANG?!</th> <!-- BUG DATATABLES-->
                            <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center;">SISA PRR</th>
                            <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center;">SISA BLANGKO KTP-EL</th>
                            <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center;">JUMLAH ANAK 0-17</th>
                            <th scope="col" colspan="2" style="vertical-align: middle; text-align: center;">CETAK KIA</th>
                            <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center;">JUMLAH ANAK 0-18</th>
                            <th scope="col" colspan="2" style="vertical-align: middle; text-align: center;">AKTA KELAHIRAN 0-18</th>
                            <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center;">PENGGUNAAN KERTAS PUTIH JLH. DOK</th>
                            <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center;">PENGGUNAAN TTE JLH. DOK</th>
                            <th scope="col" colspan="2" style="vertical-align: middle; text-align: center;">LAYANAN ONLINE</th>
                            <th scope="col" colspan="2" style="vertical-align: middle; text-align: center;">LAYANAN TERINTEGRITAS</th>
                            <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center;">PKS</th>
                            <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center;">AKSES DATA</th>
                        </tr>
                        <tr>
                            <th scope="col" style="vertical-align: middle; text-align: center;">JUMLAH</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">%</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">JUMLAH</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">%</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">JUMLAH</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">%</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">SUDAH</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">BELUM</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">SUDAH</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">BELUM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td style="vertical-align: middle; text-align: center;">3301</td>
                        <td>KAB. CILACAP</td>
                        <td style="vertical-align: middle; text-align: right;"><?= number_format(213123, 0, ',', '.'); ?></td>
                        <td style="vertical-align: middle; text-align: right;"><?= number_format(44455534, 0, ',', '.'); ?></td>
                        <td style="vertical-align: middle; text-align: right;"><?= number_format(104.23, 2, ',', '.'); ?></td>
                        <td style="vertical-align: middle; text-align: right;"><?= number_format(0, 0, ',', '.'); ?></td>
                        <td style="vertical-align: middle; text-align: right;">HAI AKU BUG</td> <!-- BUG DATATABLES-->
                        <td style="vertical-align: middle; text-align: right;"><?= number_format(12500, 0, ',', '.'); ?></td>
                        <td style="vertical-align: middle; text-align: right;"><?= number_format(30000, 0, ',', '.'); ?></td>
                        <td style="vertical-align: middle; text-align: right;"><?= number_format(1000000, 0, ',', '.'); ?></td>
                        <td style="vertical-align: middle; text-align: right;"><?= number_format(500000, 0, ',', '.'); ?></td>
                        <td style="vertical-align: middle; text-align: right;"><?= number_format(54.80, 2, ',', '.'); ?></td>
                        <td style="vertical-align: middle; text-align: right;"><?= number_format(30000, 0, ',', '.'); ?></td>
                        <td style="vertical-align: middle; text-align: right;"><?= number_format(2000000, 0, ',', '.'); ?></td>
                        <td style="vertical-align: middle; text-align: right;"><?= number_format(48.30, 2, ',', '.'); ?></td>
                        <td style="vertical-align: middle; text-align: center;"><?= number_format(35, 0, ',', '.'); ?></td>
                        <td style="vertical-align: middle; text-align: center;"><?= number_format(40, 0, ',', '.'); ?></td>
                        <td style="vertical-align: middle; text-align: center;">SUDAH</td>
                        <td style="vertical-align: middle; text-align: center;">tes 123</td>
                        <td style="vertical-align: middle; text-align: center;">SUDAH</td>
                        <td style="vertical-align: middle; text-align: center;">tes 123</td>
                        <td style="vertical-align: middle; text-align: center;">SUDAH</td>
                        <td style="vertical-align: middle; text-align: center;">Belum Dapat Hak Akses</td>
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
                <h4 class="modal-title">Tambah Laporan</h4>
                <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-body">
                        <form action="<?= base_url('laporan_bidang/importexcel_bid_5'); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Pilih Tahun</label>
                                        <select class="form-control" id="tahun" type="text" name="tahun" required>
                                            <option value="<?= date("Y") ?>"><?= date("Y") ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Pilih Bulan</label>
                                        <select class="form-control" id="bulan" name="bulan" required>
                                            <option value="january">Januari</option>
                                            <option value="february">Februari</option>
                                            <option value="march">Maret</option>
                                            <option value="april">April</option>
                                            <option value="may">Mei</option>
                                            <option value="june">Juni</option>
                                            <option value="july">Juli</option>
                                            <option value="august">Agustus</option>
                                            <option value="september">September</option>
                                            <option value="october">Oktober</option>
                                            <option value="november">November</option>
                                            <option value="december">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Pilih Periode</label>
                                        <select class="form-control" id="periode" type="text" name="periode" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">File</label>
                                        <input type="file" name="importexcel" class="form-control" accept=".xlsx,.xls">
                                    </div>
                                </div>
                            </div>
                            <div class="row" align="right">
                                <div class="col-md-12">
                                    <button name="importnow" type="submit" class="btn btn-success" onclick="return confirm('Konfirmasi data akan disimpan?');"><i class="fa fa-check"></i> Simpan</button>
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
<!-- End of Main Content -->