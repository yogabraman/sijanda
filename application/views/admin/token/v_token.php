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
                        <h1 class="h3 mb-0 text-gray-800">Pembelian Token Pulsa</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Token Pulsa</h6>
                        </div>
                        <div class="card-body">
                            

                            <form>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Kamar</label>
                                        <select class="form-control" id="key">
                                            <option value="0">Pilih Kamar</option>
                                            <?php foreach ($token as $rows) { ?>
                                                <option value="<?= $rows->id_pelanggan ?>"><?= $rows->nama ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" class="form-control form-control-user" id="c" placeholder="xxxx-xxxx-xxxx">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Kwh</label>
                                        <input type="text" class="form-control" id="kwh" placeholder="Misal : 0100" min="4" max="4" required>
                                        <input id="pc" name="pc" size="1" value="x" type="hidden">
                                        <input id="token" name="token" type="hidden" class="form-control">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary btn-user" onclick="Encrypt()">
                                    Beli
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                
                <!-- Modal Edit -->
                <div id="editModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable" id="edit_result">

                    <!-- Modal content-->
                    <!-- <div id="edit_result"></div> -->

                    </div>
                </div>

            </div>
            <!-- End of Main Content -->