<div id="particles-js"></div>
    
      <ul class="cb-slideshow">
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
          </ul>
    <!-- <div class="flex-w flex-sb-m p-l-80 p-r-74 p-b-5 respon5">
      <div class="wrappic1 m-r-30 m-t-10 m-b-10">
        <a href="#"><img src="images/logotunggal.png" alt="LOGO" width="6%"></a>
      </div>

      <div class="flex-w m-t-10 m-b-10">
        <a href="#" class="size3 flex-c-m how-social trans-04 m-r-6">
          <i class="fa fa-facebook"></i>
        </a>

        <a href="#" class="size3 flex-c-m how-social trans-04 m-r-6">
          <i class="fa fa-twitter"></i>
        </a>

        <a href="#" class="size3 flex-c-m how-social trans-04 m-r-6">
          <i class="fa fa-youtube-play"></i>
        </a>
      </div>
    </div> -->

<?php 
  function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>

    <div class="respon1">

      <div class="row justify-content-center">
        <div class="col-lg-4 col-12 logo">
          <center><img src="<?php echo base_url(); ?>assets/img/logosigap.png" width="100%"></center>
        </div>

              <div class="col-lg-11 col-12">
                <div class="tm-content card">
                  <div class="card-header">
                    <center><h4>Agenda Pimpinan yang sudah Terlaksana</h4></center>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Tanggal</th>
                            <th>Pukul</th>
                            <th>Nama Kegiatan</th>
                            <th>OPD/Instansi</th>
                            <th>Tempat</th>
                            <th>Pimpinan</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody class="usulan"> 

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="row align-items-end">
              <div class="col-lg-12 col-12">
                <marquee direction="left" scrollamount="5">
                  <p style="color: white; font-size: 18px; font-weight: bold;">
                    <?php $no=1; foreach ($iklan as $ads) { ?>
                      <?php echo $no++ .". ". $ads->iklan; ?>
                    <?php } ?>
                  </p>
                </marquee>
              </div>
            </div>

    </div>