<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<?= $id_surat = "" ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pegawai</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Pegawai</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTablePegawai" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pegawai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($list as $rows) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $rows->pegawai ?></td>
                                <td class="text-center" style="min-width:180px;">
                                    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) { ?>

                                        <button class="btn btn-info edit-pegawai" id="<?= $rows->id_pegawai ?>" title="Edit"><i class="far fa-edit"></i></button>

                                        <button class="btn btn-danger hapus-pegawai" id="<?= $rows->id_pegawai ?>" title="Hapus"><i class="fa fa-trash"></i></button>

                                    <?php } elseif ($this->session->userdata('level') == 2) { ?>

                                        <button class="btn btn-info edit-pegawai" id="<?= $rows->id_pegawai ?>" title="Edit"><i class="far fa-edit"></i></button>

                                        <button class="btn btn-danger hapus-pegawai" id="<?= $rows->id_pegawai ?>" title="Hapus"><i class="fa fa-trash"></i></button>

                                    <?php } else { ?>

                                        <button class="btn btn-info edit-pegawai" id="<?= $rows->id_pegawai ?>" title="Edit"><i class="far fa-edit"></i></button>

                                        <button class="btn btn-danger hapus-pegawai" id="<?= $rows->id_pegawai ?>" title="Hapus"><i class="fa fa-trash"></i></button>

                                    <?php } ?>

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
                <h4 class="modal-title">Tambah Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal"><i class="ion-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-body">
                        <form action="<?= site_url('spt/tambah_pegawai') ?>" method="post" enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Nama Pegawai</label>
                                        <input class="form-control" type="text" name="pegawai" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row" align="right">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
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

<!-- Modal Edit -->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" id="edit_result">

        <!-- Modal content-->
        <!-- <div id="edit_result"></div> -->

    </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingin Menghapus Data?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik hapus untuk menghapus data.</div>
            <div class="modal-footer">
                <div id="test"></div>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->