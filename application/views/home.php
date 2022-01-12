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

    <div class="respon1">

      <div class="row justify-content-center">
        <div class="col-lg-4 col-12 logo">
          <center><img src="<?php echo base_url(); ?>assets/img/logosigap.png" width="100%"></center>
        </div>

              <div class="col-lg-11 col-12">
                <div class="tm-content card">
                  <div class="card-header">
                    <center><h4>Jadwal Agenda Pimpinan</h4></center>
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
                  <div class="card-footer">
                    <center><a href="<?= site_url('home/terlaksana') ?>" target="_blank" class="btn btn-primary">Lihat Kegiatan Yang sudah Terlaksana</a></center>
                  </div>
                </div>
              </div>

            </div>

            <div class="footer-link">
                <marquee direction="left" scrollamount="5">
                  <p style="color: white; font-size: 18px; font-weight: bold;">
                    <?php $no=1; foreach ($iklan as $ads) { ?>
                      <?php echo $no++ .". ". $ads->iklan; ?>
                    <?php } ?>
                  </p>
                </marquee>
              </div>

    </div>