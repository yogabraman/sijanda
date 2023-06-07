<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');
$waktu = date('Y-m-d H:i:s');
$date = date_create($waktu);

$result = date_format($date, "Y");
?>
<footer class="main-footer">
  <!-- <div class="footer-left">
    Copyright &copy; <?= $result ?> <div class="bullet"></div> Design By <a href="#">Irfan Ardian</a>
  </div>
  <div class="footer-right"> -->

  </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>

<script src="<?php echo base_url(); ?>assets/js/page/modules-ion-icons.js"></script>

<script src="<?php echo base_url(); ?>assets/js/page/index-0.js"></script>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- <script>
  var quill = new Quill('#editormemo-edit', {
    theme: 'snow',
    modules: {
      toolbar: [
        [{
          header: [1, 2, 3, 4, 5, 6, false]
        }],
        [{
          font: []
        }],
        ["bold", "italic"],
        ["link", "blockquote", "code-block", "image"],
        [{
          list: "ordered"
        }, {
          list: "bullet"
        }],
        [{
          script: "sub"
        }, {
          script: "super"
        }],
        [{
          color: []
        }, {
          background: []
        }],
      ]
    },
  });
  quill.on('text-change', function(delta, oldDelta, source) {
    document.querySelector("input[name='edit_memo']").value = quill.root.innerHTML;
  });
</script> -->

<script>
  var quill = new Quill('#editor-edit', {
    theme: 'snow',
    modules: {
      toolbar: [
        [{
          header: [1, 2, 3, 4, 5, 6, false]
        }],
        [{
          font: []
        }],
        ["bold", "italic"],
        ["link", "blockquote", "code-block", "image"],
        [{
          list: "ordered"
        }, {
          list: "bullet"
        }],
        [{
          script: "sub"
        }, {
          script: "super"
        }],
        [{
          color: []
        }, {
          background: []
        }],
      ]
    },
  });
  quill.on('text-change', function(delta, oldDelta, source) {
    document.querySelector("input[name='isi_disposisi']").value = quill.root.innerHTML;
  });
  quill.on('text-change', function(delta, oldDelta, source) {
    document.querySelector("input[name='isi']").value = quill.root.innerHTML;
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.terlaksana').on('change', function(e) {
      var id = $(this).val();
      $('#notulen').empty();
      $('#dokumentasi1').empty();
      $('#dokumentasi2').empty();
      $('#dokumentasi3').empty();

      if (id == '1') {
        $('#notulen').append('<label class="control-label" >Hasil Notulen</label><textarea name="hasil_notulen" class="form-control" placeholder="Hasil Notulen..." rows="3" required></textarea>');
        $('#dokumentasi1').append('<label class="control-label">Dokumentasi 1</label><input type="file" name="dokumentasi1" class="form-control" required>');
        $('#dokumentasi2').append('<label class="control-label">Dokumentasi 2</label><input type="file" name="dokumentasi2" class="form-control" required>');
        $('#dokumentasi3').append('<label class="control-label">Dokumentasi 3</label><input type="file" name="dokumentasi3" class="form-control" required>');
      }
      if (id == '2') {
        $('#notulen').append('<label class="control-label" >Hasil Notulen</label><textarea name="hasil_notulen" class="form-control" placeholder="Hasil Notulen..." rows="3"></textarea>');
        $('#dokumentasi1').append('<label class="control-label">Dokumentasi 1</label><input type="file" name="dokumentasi1" class="form-control">');
        $('#dokumentasi2').append('<label class="control-label">Dokumentasi 2</label><input type="file" name="dokumentasi2" class="form-control">');
        $('#dokumentasi3').append('<label class="control-label">Dokumentasi 3</label><input type="file" name="dokumentasi3" class="form-control">');
      }
      if (id == '3') {
        $('#notulen').append('<label class="control-label" >Hasil Notulen</label><textarea name="hasil_notulen" class="form-control" placeholder="Hasil Notulen..." rows="3"></textarea>');
        $('#dokumentasi1').append('<label class="control-label">Dokumentasi 1</label><input type="file" name="dokumentasi1" class="form-control">');
        $('#dokumentasi2').append('<label class="control-label">Dokumentasi 2</label><input type="file" name="dokumentasi2" class="form-control">');
        $('#dokumentasi3').append('<label class="control-label">Dokumentasi 3</label><input type="file" name="dokumentasi3" class="form-control">');
      }
      if (id == '4') {
        $('#notulen').append('<label class="control-label" >Hasil Notulen</label><textarea name="hasil_notulen" class="form-control" placeholder="Hasil Notulen..." rows="3"></textarea>');
        $('#dokumentasi1').append('<label class="control-label">Dokumentasi 1</label><input type="file" name="dokumentasi1" class="form-control">');
        $('#dokumentasi2').append('<label class="control-label">Dokumentasi 2</label><input type="file" name="dokumentasi2" class="form-control">');
        $('#dokumentasi3').append('<label class="control-label">Dokumentasi 3</label><input type="file" name="dokumentasi3" class="form-control">');
      }

    });

  });
</script>

<script type="text/javascript">
  $(document).ready(function() {

    var i = <?= $count_undangan ?>;

    $('.undangan-edit').click(function(e) {
      $('#addopd-edit').empty();
      i++;
      $('#opd-edit').append('<div class="col-md-6 col-12"><div class="form-group"><input type="hidden" name="keterangan' + i + '" class="form-control" value="Undangan"><label class="control-label">OPD Undangan ' + i + '</label><select class="form-control" name="undangan' + i + '"><option value="0">Pilih Instansi</option><?php foreach ($instansi as $rows) { ?><option value="<?= $rows->id_instansi ?>"><?= $rows->nama_instansi ?></option><?php } ?></select></div></div>');
      $('#addopd-edit').append('<input type="hidden" name="jumlah_undangan" class="form-control" value="' + i + '">');
      e.preventDefault();
    });


  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


<script type="text/javascript">
  <?php if ($this->session->flashdata('success')) { ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
  <?php } else if ($this->session->flashdata('error')) {  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
  <?php } else if ($this->session->flashdata('warning')) {  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
  <?php } else if ($this->session->flashdata('info')) {  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
  <?php } ?>
</script>

<!-- Template JS File -->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
</body>

</html>