<!-- Begin Page Content -->
<style>
    .fullwhite {
        background-color: #FFFFFF;
    }
</style>

<body>

    <div class="container fullwhite">
        <div class="card-body" id="tambahForm">
            <div class="form-body">
                <form action="<?= site_url('kuesioner/add_data') ?>" method="post" enctype="multipart/form-data">
                    <h3 style="text-align:center;"> KUESIONER SURVEY KEPUASAN MASYARAKAT <br>LAYANAN FASILITASI KELEMBAGAAN PERANGKAT DAERAH, DISPERMADESDUKCAPIL PROVINSI JAWA TENGAH<br>TAHUN 2023</h3>

                    <table class="table table-bordered" id="tblResponden">
                        <tbody>
                            <tr>
                                <td colspan="3">
                                    *) Data responden yang bertanda bintang wajib diisi. <br>
                                    **) Saran/masukan Wajib diisi jika terdapat jawaban yang kurang.
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Nama Kuesioner</td>
                                <td>
                                    <div class="col-md-12 col-12"> Layanan Fasilitasi Kelembagaan Perangkat Daerah </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Periode SKM</td>
                                <td>
                                    <div class="col-md-12 col-12">
                                        Semester II Th. 2023 (01 Juli 2023 s/d 31 Desember 2023)
                                        <input type="hidden" name="periode">

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Tanggal</td>
                                <td>
                                    <div class="col-md-12 col-12">
                                        <input type="date" id="datepicker" class="form-control" name="tgl"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: center;font-weight: bold;vertical-align: baseline;">IDENTITAS RESPONDEN</td>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Nama Responden</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <input type="text" name="nama" id="namaResponden" class="form-control">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Email</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <input type="text" name="email" id="emailResponden" class="form-control">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>No. Telp/HP</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <input type="text" name="telp" id="telp" class="form-control">
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Umur *)</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3 col-6">
                                            <input type="number" name="umur" id="umurResponden" min="10" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="form-control">
                                        </div>
                                        <div class="col-md-3 col-6" style="padding-top:5px;">Tahun</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Jenis Kelamin *)</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <select name="gender" class="form-control">
                                                <option value="1">Laki-Laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>Alamat</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <select class="form-control" id="prop" type="text" name="prop" required>
                                                    <option value="">--Pilih Provinsi--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <select class="form-control" id="kab" type="text" name="kab" required>
                                                    <option value="">--Pilih Kab/Kota--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <select class="form-control" id="kec" type="text" name="kec" required>
                                                    <option value="">--Pilih Kec--</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td>Pendidikan Terakhir *)</td>
                                <td>
                                    <div class="col-md-12 col-12">
                                        <select name="pendidikan" class="form-control">
                                            <option value="1">SD/Sederajat</option>
                                            <option value="2">SLTP</option>
                                            <option value="3">SLTA</option>
                                            <option value="4">Diploma (D-1, D-2, D-3)</option>
                                            <option value="5">Sarjana (S-1)</option>
                                            <option value="6">Pasca Sarjana (S-2, S-3)</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td>Pekerjaan Utama *)</td>
                                <td>
                                    <div class="col-md-12">
                                        <select name="pekerjaan" id="pekerjaan" class="form-control" onchange="pekerjaanganti(this)">
                                            <option value="pns/tni/polri">PNS / TNI / Polri</option>
                                            <option value="pensiunan">Pensiunan</option>
                                            <option value="swasta">Pegawai Swasta</option>
                                            <option value="wiraswasta">Wiraswasta</option>
                                            <option value="buruh">Buruh (Tani/Bangunan)</option>
                                            <option value="petani">Petani</option>
                                            <option value="pelajar/mahasiswa">Pelajar/Mahasiswa</option>
                                            <option value="tidak bekerja">Tidak Bekerja</option>
                                            <option value="0">Lainya</option>
                                        </select>
                                        <div id="divPekrjaanLain" style="display:none">
                                            <input type="text" name="lain" placeholder="Tuliskan Nama Pekerjaan" class="form-control">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <h4 style="text-align:center;">Pendapat Responden Tentang Kualitas Pelayanan dan Tingkat Kepentingannya</h4>

                    <table class="table table-bordered" id="tblResponden">
                        <tbody>
                            <tr style="text-align: center;font-weight: bold;vertical-align: baseline;">
                                <td style="width:20px;">No</td>
                                <td>Pertanyaan</td>
                                <td style="width:200px;">Kinerja/Kenyataannya *)</td>
                                <td style="width:200px;">Tingkat Kepentingan *)</td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td>1</td>
                                <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap persyaratan untuk mendapatkan Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                <td id="q1a" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q1a')" type="radio" name="q1a" value="1"><label for="q1a" style="margin-left: 10px;">Tidak Mudah</label><br>
                                    <input onclick="jawabanclick('q1a')" type="radio" name="q1a" value="2"><label for="q1a" style="margin-left: 10px;">Kurang Mudah</label><br>
                                    <input onclick="jawabanclick('q1a')" type="radio" name="q1a" value="3"><label for="q1a" style="margin-left: 10px;">Mudah</label><br>
                                    <input onclick="jawabanclick('q1a')" type="radio" name="q1a" value="4"><label for="q1a" style="margin-left: 10px;">Sangat Mudah</label><br>
                                </td>
                                <td id="q1b" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q1b')" type="radio" name="q1b" value="1"><label for="q1b" style="margin-left: 10px;">Tidak Penting</label><br>
                                    <input onclick="jawabanclick('q1b')" type="radio" name="q1b" value="2"><label for="q1b" style="margin-left: 10px;">Kurang Penting</label><br>
                                    <input onclick="jawabanclick('q1b')" type="radio" name="q1b" value="3"><label for="q1b" style="margin-left: 10px;">Penting</label><br>
                                    <input onclick="jawabanclick('q1b')" type="radio" name="q1b" value="4"><label for="q1b" style="margin-left: 10px;">Sangat Penting</label><br>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td>2</td>
                                <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap prosedur untuk mendapatkan Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                <td id="q2a" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q2a')" type="radio" name="q2a" value="1"><label for="q2a" style="margin-left: 10px;">Tidak Mudah</label><br>
                                    <input onclick="jawabanclick('q2a')" type="radio" name="q2a" value="2"><label for="q2a" style="margin-left: 10px;">Kurang Mudah</label><br>
                                    <input onclick="jawabanclick('q2a')" type="radio" name="q2a" value="3"><label for="q2a" style="margin-left: 10px;">Mudah</label><br>
                                    <input onclick="jawabanclick('q2a')" type="radio" name="q2a" value="4"><label for="q2a" style="margin-left: 10px;">Sangat Mudah</label><br>
                                </td>
                                <td id="q2b" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q2b')" type="radio" name="q2b" value="1"><label for="q2b" style="margin-left: 10px;">Tidak Penting</label><br>
                                    <input onclick="jawabanclick('q2b')" type="radio" name="q2b" value="2"><label for="q2b" style="margin-left: 10px;">Kurang Penting</label><br>
                                    <input onclick="jawabanclick('q2b')" type="radio" name="q2b" value="3"><label for="q2b" style="margin-left: 10px;">Penting</label><br>
                                    <input onclick="jawabanclick('q2b')" type="radio" name="q2b" value="4"><label for="q2b" style="margin-left: 10px;">Sangat Penting</label><br>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td>3</td>
                                <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap kecepatan Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                <td id="q3a" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q3a')" type="radio" name="q3a" value="1"><label for="q3a" style="margin-left: 10px;">Tidak Mudah</label><br>
                                    <input onclick="jawabanclick('q3a')" type="radio" name="q3a" value="2"><label for="q3a" style="margin-left: 10px;">Kurang Mudah</label><br>
                                    <input onclick="jawabanclick('q3a')" type="radio" name="q3a" value="3"><label for="q3a" style="margin-left: 10px;">Mudah</label><br>
                                    <input onclick="jawabanclick('q3a')" type="radio" name="q3a" value="4"><label for="q3a" style="margin-left: 10px;">Sangat Mudah</label><br>
                                </td>
                                <td id="q3b" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q3b')" type="radio" name="q3b" value="1"><label for="q3b" style="margin-left: 10px;">Tidak Penting</label><br>
                                    <input onclick="jawabanclick('q3b')" type="radio" name="q3b" value="2"><label for="q3b" style="margin-left: 10px;">Kurang Penting</label><br>
                                    <input onclick="jawabanclick('q3b')" type="radio" name="q3b" value="3"><label for="q3b" style="margin-left: 10px;">Penting</label><br>
                                    <input onclick="jawabanclick('q3b')" type="radio" name="q3b" value="4"><label for="q3b" style="margin-left: 10px;">Sangat Penting</label><br>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td>4</td>
                                <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap biaya untuk mendapatkan Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                <td id="q4a" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q4a')" type="radio" name="q4a" value="1"><label for="q4a" style="margin-left: 10px;">Tidak Mudah</label><br>
                                    <input onclick="jawabanclick('q4a')" type="radio" name="q4a" value="2"><label for="q4a" style="margin-left: 10px;">Kurang Mudah</label><br>
                                    <input onclick="jawabanclick('q4a')" type="radio" name="q4a" value="3"><label for="q4a" style="margin-left: 10px;">Mudah</label><br>
                                    <input onclick="jawabanclick('q4a')" type="radio" name="q4a" value="4"><label for="q4a" style="margin-left: 10px;">Sangat Mudah</label><br>
                                </td>
                                <td id="q4b" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q4b')" type="radio" name="q4b" value="1"><label for="q4b" style="margin-left: 10px;">Tidak Penting</label><br>
                                    <input onclick="jawabanclick('q4b')" type="radio" name="q4b" value="2"><label for="q4b" style="margin-left: 10px;">Kurang Penting</label><br>
                                    <input onclick="jawabanclick('q4b')" type="radio" name="q4b" value="3"><label for="q4b" style="margin-left: 10px;">Penting</label><br>
                                    <input onclick="jawabanclick('q4b')" type="radio" name="q4b" value="4"><label for="q4b" style="margin-left: 10px;">Sangat Penting</label><br>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td>5</td>
                                <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap kualitas Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                <td id="q5a" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q5a')" type="radio" name="q5a" value="1"><label for="q5a" style="margin-left: 10px;">Tidak Mudah</label><br>
                                    <input onclick="jawabanclick('q5a')" type="radio" name="q5a" value="2"><label for="q5a" style="margin-left: 10px;">Kurang Mudah</label><br>
                                    <input onclick="jawabanclick('q5a')" type="radio" name="q5a" value="3"><label for="q5a" style="margin-left: 10px;">Mudah</label><br>
                                    <input onclick="jawabanclick('q5a')" type="radio" name="q5a" value="4"><label for="q5a" style="margin-left: 10px;">Sangat Mudah</label><br>
                                </td>
                                <td id="q5b" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q5b')" type="radio" name="q5b" value="1"><label for="q5b" style="margin-left: 10px;">Tidak Penting</label><br>
                                    <input onclick="jawabanclick('q5b')" type="radio" name="q5b" value="2"><label for="q5b" style="margin-left: 10px;">Kurang Penting</label><br>
                                    <input onclick="jawabanclick('q5b')" type="radio" name="q5b" value="3"><label for="q5b" style="margin-left: 10px;">Penting</label><br>
                                    <input onclick="jawabanclick('q5b')" type="radio" name="q5b" value="4"><label for="q5b" style="margin-left: 10px;">Sangat Penting</label><br>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td>6</td>
                                <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap kompetensi petugas dalam memberikan Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                <td id="q6a" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q6a')" type="radio" name="q6a" value="1"><label for="q6a" style="margin-left: 10px;">Tidak Mudah</label><br>
                                    <input onclick="jawabanclick('q6a')" type="radio" name="q6a" value="2"><label for="q6a" style="margin-left: 10px;">Kurang Mudah</label><br>
                                    <input onclick="jawabanclick('q6a')" type="radio" name="q6a" value="3"><label for="q6a" style="margin-left: 10px;">Mudah</label><br>
                                    <input onclick="jawabanclick('q6a')" type="radio" name="q6a" value="4"><label for="q6a" style="margin-left: 10px;">Sangat Mudah</label><br>
                                </td>
                                <td id="q6b" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q6b')" type="radio" name="q6b" value="1"><label for="q6b" style="margin-left: 10px;">Tidak Penting</label><br>
                                    <input onclick="jawabanclick('q6b')" type="radio" name="q6b" value="2"><label for="q6b" style="margin-left: 10px;">Kurang Penting</label><br>
                                    <input onclick="jawabanclick('q6b')" type="radio" name="q6b" value="3"><label for="q6b" style="margin-left: 10px;">Penting</label><br>
                                    <input onclick="jawabanclick('q6b')" type="radio" name="q6b" value="4"><label for="q6b" style="margin-left: 10px;">Sangat Penting</label><br>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td>7</td>
                                <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap perilaku petugas Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                <td id="q7a" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q7a')" type="radio" name="q7a" value="1"><label for="q7a" style="margin-left: 10px;">Tidak Mudah</label><br>
                                    <input onclick="jawabanclick('q7a')" type="radio" name="q7a" value="2"><label for="q7a" style="margin-left: 10px;">Kurang Mudah</label><br>
                                    <input onclick="jawabanclick('q7a')" type="radio" name="q7a" value="3"><label for="q7a" style="margin-left: 10px;">Mudah</label><br>
                                    <input onclick="jawabanclick('q7a')" type="radio" name="q7a" value="4"><label for="q7a" style="margin-left: 10px;">Sangat Mudah</label><br>
                                </td>
                                <td id="q7b" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q7b')" type="radio" name="q7b" value="1"><label for="q7b" style="margin-left: 10px;">Tidak Penting</label><br>
                                    <input onclick="jawabanclick('q7b')" type="radio" name="q7b" value="2"><label for="q7b" style="margin-left: 10px;">Kurang Penting</label><br>
                                    <input onclick="jawabanclick('q7b')" type="radio" name="q7b" value="3"><label for="q7b" style="margin-left: 10px;">Penting</label><br>
                                    <input onclick="jawabanclick('q7b')" type="radio" name="q7b" value="4"><label for="q7b" style="margin-left: 10px;">Sangat Penting</label><br>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td>8</td>
                                <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap tindak lanjut petugas dalam penanganan pengaduan, saran dan masukan pada Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                <td id="q8a" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q8a')" type="radio" name="q8a" value="1"><label for="q8a" style="margin-left: 10px;">Tidak Mudah</label><br>
                                    <input onclick="jawabanclick('q8a')" type="radio" name="q8a" value="2"><label for="q8a" style="margin-left: 10px;">Kurang Mudah</label><br>
                                    <input onclick="jawabanclick('q8a')" type="radio" name="q8a" value="3"><label for="q8a" style="margin-left: 10px;">Mudah</label><br>
                                    <input onclick="jawabanclick('q8a')" type="radio" name="q8a" value="4"><label for="q8a" style="margin-left: 10px;">Sangat Mudah</label><br>
                                </td>
                                <td id="q8b" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q8b')" type="radio" name="q8b" value="1"><label for="q8b" style="margin-left: 10px;">Tidak Penting</label><br>
                                    <input onclick="jawabanclick('q8b')" type="radio" name="q8b" value="2"><label for="q8b" style="margin-left: 10px;">Kurang Penting</label><br>
                                    <input onclick="jawabanclick('q8b')" type="radio" name="q8b" value="3"><label for="q8b" style="margin-left: 10px;">Penting</label><br>
                                    <input onclick="jawabanclick('q8b')" type="radio" name="q8b" value="4"><label for="q8b" style="margin-left: 10px;">Sangat Penting</label><br>
                                </td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td>9</td>
                                <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap kelengkapan sarana dan prasarana dalam Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                <td id="q9a" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q9a')" type="radio" name="q9a" value="1"><label for="q9a" style="margin-left: 10px;">Tidak Mudah</label><br>
                                    <input onclick="jawabanclick('q9a')" type="radio" name="q9a" value="2"><label for="q9a" style="margin-left: 10px;">Kurang Mudah</label><br>
                                    <input onclick="jawabanclick('q9a')" type="radio" name="q9a" value="3"><label for="q9a" style="margin-left: 10px;">Mudah</label><br>
                                    <input onclick="jawabanclick('q9a')" type="radio" name="q9a" value="4"><label for="q9a" style="margin-left: 10px;">Sangat Mudah</label><br>
                                </td>
                                <td id="q9b" class="td-jawaban-pilihan" style="background-color: antiquewhite;">
                                    <input onclick="jawabanclick('q9b')" type="radio" name="q9b" value="1"><label for="q9b" style="margin-left: 10px;">Tidak Penting</label><br>
                                    <input onclick="jawabanclick('q9b')" type="radio" name="q9b" value="2"><label for="q9b" style="margin-left: 10px;">Kurang Penting</label><br>
                                    <input onclick="jawabanclick('q9b')" type="radio" name="q9b" value="3"><label for="q9b" style="margin-left: 10px;">Penting</label><br>
                                    <input onclick="jawabanclick('q9b')" type="radio" name="q9b" value="4"><label for="q9b" style="margin-left: 10px;">Sangat Penting</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Apakah terdapat tambahan biaya diluar biaya yang ditetapkan ? </td>
                                <td colspan="2">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 col-6">
                                                <input id="pungli" type="radio" name="pungli" value="0" checked="">
                                                <label for="pungli"> Tidak Ada</label>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <input id="pungli" type="radio" name="pungli" value="1">
                                                <label for="pungli"> Ada </label>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4">
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Masukan / Saran untuk perbaikan pelayanan (<span><i>Jika Terdapat jawaban yang kurang, isikan saran/masukan.</i></span>) **)</label>
                                        <textarea class="form-control" name="saran"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <div class="row" align="right">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                            <button type="button" onclick="closeformdetil();" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row collapse" id="tambahFormKonfirmasi" style="display: none;">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row" id="form-konfirm-detil">
                        <div class="col-md-12" style="text-align:center;">
                            <h2>Pengisian Kusioner SKM Berhasil</h2><br>
                            <p>Terima kasih telah mengisi kuesioner SKM Prov. Jateng.
                                untuk melengkapi kuesioner yang telah dilakukan silahkan lakukan <mark>verifikasi kuesioner</mark>
                                melalui email yang telah dikirmkan ke email <mark> ybraman@gmail.com</mark> ( Mungkin email masuk dalam kotak Spam )</p> <br>
                            <button type="button" onclick="closeformdetil();" class="btn btn-danger" id="keluarForm"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="indexData" style="display: none;">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-eskm">
                        <h2>Kuesioner Survey Kepuasan Masyarakat <br>Layanan Fasilitasi Kelembagaan Perangkat Daerah, Biro Organisasi, Sekretariat Daerah Provinsi Jawa Tengah</h2>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('.input-group.date').datepicker({
                language: 'id',
                format: 'dd MM yyyy',
                endDate: '2023-09-14 13:37:15',
                autoclose: true,
                showOtherMonths: true,
                todayHighlight: true
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            isikuesioner({
                'fidKues': 2763,
                'fidPeriode': 12
            });
        });

        function isikuesioner(dtsend) {
            urisend = "https://eskm.jatengprov.go.id/survey/umum/form";
            jQuery.ajax({
                // headers: {'X-CSRF-TOKEN': stoken},
                type: 'POST',
                url: urisend,
                data: dtsend,
                beforeSend: function() {
                    waitingDialog.show('Loading...');
                },
                success: function(data) {
                    if (data['status'] == 'ok') {
                        $("#form-detil").html(data['data']);
                        $("#indexData").hide();
                        $("#tambahForm").show();

                        $('.input-group.date').datepicker({
                            language: 'id',
                            format: 'dd MM yyyy',
                            endDate: '2023-09-14 13:37:15',
                            autoclose: true,
                            showOtherMonths: true,
                            todayHighlight: true
                        });
                    } else {
                        alert(data['pesan']);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert('(' + xhr.status + ') ' + thrownError);
                },
                complete: function() {
                    waitingDialog.hide();
                }
            });





        }

        function simpandata() {
            urisend = "https://eskm.jatengprov.go.id/survey/umum/save";
            dtsend = $("#formdetil").serialize();
            jQuery.ajax({
                // headers: {'X-CSRF-TOKEN': stoken },
                type: 'POST',
                url: urisend,
                data: dtsend,
                beforeSend: function() {
                    $("body").removeAttr("style");
                    waitingDialog.show('Loading...');
                },
                success: function(data) {
                    if (data['status'] == 'ok') {
                        $("#tambahForm").hide();
                        $("#form-konfirm-detil").html(data['data']);
                        $("#tambahFormKonfirmasi").show();
                    } else {
                        waitingDialog.hide();
                        bootbox.alert(data['pesan']);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert('(' + xhr.status + ') ' + thrownError);
                },
                complete: function() {
                    waitingDialog.hide();
                }
            });
        }

        function closeformdetil() {
            $('#formdetil')[0].reset();
            $('.td-jawaban-pilihan').css('background-color', 'antiquewhite');
            $("#tambahFormKonfirmasi").hide();
            $("#tambahForm").show();

            $("html, body").animate({
                scrollTop: 0
            }, 1000);
        }

        function pekerjaanganti(obj) {
            idKerjaPilih = $(obj).val();
            if (idKerjaPilih == 9) {
                $("#divPekrjaanLain").show();
            } else {
                $("#divPekrjaanLain").hide();
            }
        }

        function jawabanclick(idObj) {
            $("#" + idObj).css("background-color", "");
        }

        function pilihandaerahubah(obj) {
            jenis = $(obj).data("jenis");
            idParent = $(obj).val();
            urisend = "https://eskm.jatengprov.go.id/survey/list-daerah";
            dtsend = {
                'jnsInduk': jenis,
                'fidParent': idParent
            };
            jQuery.ajax({
                //headers: {'X-CSRF-TOKEN': stoken },
                type: 'POST',
                url: urisend,
                data: dtsend,
                beforeSend: function() {
                    // $("body").removeAttr("style");
                    // waitingDialog.show('Loading...');
                },
                success: function(data) {
                    if (data['status'] == 'ok') {
                        if (jenis == 1) {
                            $("#cmbKabKota").html(data['data']);
                            $("#cmbKec").html('<option value="" >--Pilih Kab/Kota Dahulu--</option>');
                        } else if (jenis == 2) {
                            $("#cmbKec").html(data['data']);
                        }
                    }
                    // }else{
                    //     bootbox.alert(data['pesan']);
                    // }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert('(' + xhr.status + ') ' + thrownError);
                },
                complete: function() {
                    // waitingDialog.hide();
                }
            });



        }
    </script>

</body>