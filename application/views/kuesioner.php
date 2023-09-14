<!-- Begin Page Content -->
<style>
    .fullwhite {
        background-color: #FFFFFF;
    }
</style>

<body>

    <div class="container fullwhite">

        <div class="row collapse" id="tambahForm" style="display: block;">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row" id="form-detil">
                        <form class="form-horizontal" action="#" method="post" id="formdetil">
                            <input type="hidden" name="_token" value="uBNBx8IbiyyU8DT9E6ebm3fN9JoBlswmaIk10O3P">

                            <h3 style="text-align:center;"> KUESIONER SURVEY KEPUASAN MASYARAKAT <br>LAYANAN FASILITASI KELEMBAGAAN PERANGKAT DAERAH, DISPERMADESDUKCAPIL PROVINSI JAWA TENGAH<br>TAHUN 2023</h3>

                            <input type="hidden" name="dt[fidKuesioner]" id="fidKuesioner" class="form-control" value="2763">
                            <input type="hidden" name="dt[fidOrganisasi]" id="fidOrganisasi" class="form-control" value="1134">
                            <input type="hidden" name="dt[fidSurvey]" id="fidSurvey" class="form-control" value="">
                            <input type="hidden" name="dt[sumber]" id="dtSumber" class="form-control" value="1">

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
                                            <div class="col-md-12"> Layanan Fasilitasi Kelembagaan Perangkat Daerah </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Periode SKM</td>
                                        <td>
                                            <div class="col-md-12">
                                                Semester II Th. 2023 (01 Juli 2023 s/d 31 Desember 2023)
                                                <input type="hidden" name="dt[fidPeriode]" value="12">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="width:180px;">Tanggal</td>
                                        <td>
                                            <div class="col-md-12">
                                                <div class="input-group date">
                                                    <input type="text" id="datepicker" class="form-control" name="dt[tglSurvey]" style="background-color: white !important;"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                </div>

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
                                            <div class="col-md-12">
                                                <input type="text" name="dt[namaResponden]" id="namaResponden" class="form-control" value="">
                                                <input type="hidden" name="dt[idResponden]" id="idResponden" class="form-control" value="">
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Email</td>
                                        <td>
                                            <div class="col-md-12">
                                                <input type="text" name="dt[emailResponden]" id="emailResponden" class="form-control" value="">
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>No. Telp/HP</td>
                                        <td>
                                            <div class="col-md-12">
                                                <input type="text" name="dt[noHp]" id="noHp" class="form-control" value="">
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>4.</td>
                                        <td>Umur *)</td>
                                        <td>
                                            <div class="col-md-3">
                                                <input type="number" name="dt[umurResponden]" id="umurResponden" min="10" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="form-control" value="">

                                            </div>
                                            <div class="col-md-1" style="padding-top:10px;">Tahun</div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>5.</td>
                                        <td>Jenis Kelamin *)</td>
                                        <td>
                                            <div class="col-md-12">
                                                <select name="dt[jnsKelamin]" class="form-control">
                                                    <option value="1">Laki-Laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>6.</td>
                                        <td>Alamat</td>
                                        <td>
                                            <div class="col-md-6">
                                                <select class="form-control" name="dt[fidProv]" id="cmbProv" onchange="pilihandaerahubah(this)" data-jenis="1">
                                                    <option value="1">Bali</option>
                                                    <option value="2">Bangka Belitung</option>
                                                    <option value="3">Banten</option>
                                                    <option value="4">Bengkulu</option>
                                                    <option value="5">DI Yogyakarta</option>
                                                    <option value="6">DKI Jakarta</option>
                                                    <option value="7">Gorontalo</option>
                                                    <option value="8">Jambi</option>
                                                    <option value="9">Jawa Barat</option>
                                                    <option value="10" selected="">Jawa Tengah</option>
                                                    <option value="11">Jawa Timur</option>
                                                    <option value="12">Kalimantan Barat</option>
                                                    <option value="13">Kalimantan Selatan</option>
                                                    <option value="14">Kalimantan Tengah</option>
                                                    <option value="15">Kalimantan Timur</option>
                                                    <option value="16">Kalimantan Utara</option>
                                                    <option value="17">Kepulauan Riau</option>
                                                    <option value="18">Lampung</option>
                                                    <option value="19">Maluku</option>
                                                    <option value="20">Maluku Utara</option>
                                                    <option value="21">Nanggroe Aceh Darussalam (NAD)</option>
                                                    <option value="22">Nusa Tenggara Barat (NTB)</option>
                                                    <option value="23">Nusa Tenggara Timur (NTT)</option>
                                                    <option value="24">Papua</option>
                                                    <option value="25">Papua Barat</option>
                                                    <option value="26">Riau</option>
                                                    <option value="27">Sulawesi Barat</option>
                                                    <option value="28">Sulawesi Selatan</option>
                                                    <option value="29">Sulawesi Tengah</option>
                                                    <option value="30">Sulawesi Tenggara</option>
                                                    <option value="31">Sulawesi Utara</option>
                                                    <option value="32">Sumatera Barat</option>
                                                    <option value="33">Sumatera Selatan</option>
                                                    <option value="34">Sumatera Utara</option>
                                                </select>

                                                <select class="form-control" name="dt[fidKabKota]" id="cmbKabKota" onchange="pilihandaerahubah(this)" data-jenis="2">
                                                    <option value="">--Pilih Kab/Kota--</option>
                                                    <option value="170">Kabupaten Banjarnegara</option>
                                                    <option value="169">Kabupaten Banyumas</option>
                                                    <option value="154">Kabupaten Batang</option>
                                                    <option value="175">Kabupaten Blora</option>
                                                    <option value="156">Kabupaten Boyolali</option>
                                                    <option value="171">Kabupaten Brebes</option>
                                                    <option value="172">Kabupaten Cilacap</option>
                                                    <option value="158">Kabupaten Demak</option>
                                                    <option value="161">Kabupaten Grobogan</option>
                                                    <option value="166">Kabupaten Jepara</option>
                                                    <option value="179">Kabupaten Karanganyar</option>
                                                    <option value="182">Kabupaten Kebumen</option>
                                                    <option value="165">Kabupaten Kendal</option>
                                                    <option value="157">Kabupaten Klaten</option>
                                                    <option value="174">Kabupaten Kudus</option>
                                                    <option value="163">Kabupaten Magelang</option>
                                                    <option value="162">Kabupaten Pati</option>
                                                    <option value="159">Kabupaten Pekalongan</option>
                                                    <option value="167">Kabupaten Pemalang</option>
                                                    <option value="184">Kabupaten Purbalingga</option>
                                                    <option value="185">Kabupaten Purworejo</option>
                                                    <option value="181">Kabupaten Rembang</option>
                                                    <option value="173">Kabupaten Semarang</option>
                                                    <option value="180">Kabupaten Sragen</option>
                                                    <option value="164">Kabupaten Sukoharjo</option>
                                                    <option value="168">Kabupaten Tegal</option>
                                                    <option value="160">Kabupaten Temanggung</option>
                                                    <option value="153">Kabupaten Wonogiri</option>
                                                    <option value="155">Kabupaten Wonosobo</option>
                                                    <option value="187">Kota Magelang</option>
                                                    <option value="186">Kota Pekalongan</option>
                                                    <option value="177">Kota Salatiga</option>
                                                    <option value="176">Kota Semarang</option>
                                                    <option value="183">Kota Surakarta</option>
                                                    <option value="178">Kota Tegal</option>
                                                </select>



                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" name="dt[fidKecamatan]" id="cmbKec">
                                                    <option value="">--Pilih Kab/Kota Dahulu--</option>
                                                </select>
                                                <input type="text" name="dt[alamat]" class="form-control" placeholder="Alamat Lengkap">
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>7.</td>
                                        <td>Pendidikan Terakhir *)</td>
                                        <td>
                                            <div class="col-md-12">
                                                <select name="dt[pendidikan]" class="form-control">
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
                                                <select name="dt[pekerjaan]" id="pekerjaan" class="form-control" onchange="pekerjaanganti(this)">
                                                    <option value="7">PNS / TNI / Polri</option>
                                                    <option value="8">Pensiunan</option>
                                                    <option value="9">Pegawai Swasta</option>
                                                    <option value="10">Wiraswasta</option>
                                                    <option value="11">Buruh (Tani/Bangunan)</option>
                                                    <option value="12">Pelajar/Mahasiswa</option>
                                                    <option value="13">Tidak Bekerja</option>
                                                    <option value="14">Lainya</option>
                                                    <option value="64">Petani</option>
                                                </select>
                                                <div id="divPekrjaanLain" style="display:none">
                                                    <input type="text" name="dt[pekerjaanLainya]" placeholder="Tuliskan Nama Pekerjaan" class="form-control">
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
                                        <td id="B6fFbTY3g4H2CgtW" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('B6fFbTY3g4H2CgtW')" id="vaGcJBnXxVpE17ab" type="radio" name="dt[jawabKinerja][32361]" value="37" style="float: left;display: block;">
                                            <label for="vaGcJBnXxVpE17ab" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Mudah</label><input onclick="jawabanclick('B6fFbTY3g4H2CgtW')" id="BvzLSWdoxuSf64Ah" type="radio" name="dt[jawabKinerja][32361]" value="38" style="float: left;display: block;">
                                            <label for="BvzLSWdoxuSf64Ah" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Mudah</label><input onclick="jawabanclick('B6fFbTY3g4H2CgtW')" id="1zPvXVEcXSj7KFEd" type="radio" name="dt[jawabKinerja][32361]" value="39" style="float: left;display: block;">
                                            <label for="1zPvXVEcXSj7KFEd" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Mudah</label><input onclick="jawabanclick('B6fFbTY3g4H2CgtW')" id="16T2aXpXWPF42UtI" type="radio" name="dt[jawabKinerja][32361]" value="40" style="float: left;display: block;">
                                            <label for="16T2aXpXWPF42UtI" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Mudah</label>
                                        </td>
                                        <td id="CoGXURttKJTa2gUC" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('CoGXURttKJTa2gUC')" id="e6OHvvH6fbnY6TqT" type="radio" name="dt[jawabKepentingan][32361]" value="5" style="float: left;display: block;">
                                            <label for="e6OHvvH6fbnY6TqT" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Penting</label><input onclick="jawabanclick('CoGXURttKJTa2gUC')" id="MjtCII62Q5cs386p" type="radio" name="dt[jawabKepentingan][32361]" value="6" style="float: left;display: block;">
                                            <label for="MjtCII62Q5cs386p" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Penting</label><input onclick="jawabanclick('CoGXURttKJTa2gUC')" id="UIRwAajneEbHTDDD" type="radio" name="dt[jawabKepentingan][32361]" value="7" style="float: left;display: block;">
                                            <label for="UIRwAajneEbHTDDD" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Penting</label><input onclick="jawabanclick('CoGXURttKJTa2gUC')" id="hOno4fSG0rYraCYn" type="radio" name="dt[jawabKepentingan][32361]" value="8" style="float: left;display: block;">
                                            <label for="hOno4fSG0rYraCYn" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Penting</label>
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: top;">
                                        <td>2</td>
                                        <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap prosedur untuk mendapatkan Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                        <td id="isu1Qy8jT0B8276Q" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('isu1Qy8jT0B8276Q')" id="qoif1RX9pJui84cJ" type="radio" name="dt[jawabKinerja][32362]" value="37" style="float: left;display: block;">
                                            <label for="qoif1RX9pJui84cJ" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Mudah</label><input onclick="jawabanclick('isu1Qy8jT0B8276Q')" id="dTelqc7byCK79Mq7" type="radio" name="dt[jawabKinerja][32362]" value="38" style="float: left;display: block;">
                                            <label for="dTelqc7byCK79Mq7" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Mudah</label><input onclick="jawabanclick('isu1Qy8jT0B8276Q')" id="Q3gutD5zFnqZRwpt" type="radio" name="dt[jawabKinerja][32362]" value="39" style="float: left;display: block;">
                                            <label for="Q3gutD5zFnqZRwpt" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Mudah</label><input onclick="jawabanclick('isu1Qy8jT0B8276Q')" id="7R2tMrrk7nnQxeF9" type="radio" name="dt[jawabKinerja][32362]" value="40" style="float: left;display: block;">
                                            <label for="7R2tMrrk7nnQxeF9" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Mudah</label>
                                        </td>
                                        <td id="Le0JkMU1jFtInGpq" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('Le0JkMU1jFtInGpq')" id="qxAYQlGbAiQUiBpz" type="radio" name="dt[jawabKepentingan][32362]" value="5" style="float: left;display: block;">
                                            <label for="qxAYQlGbAiQUiBpz" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Penting</label><input onclick="jawabanclick('Le0JkMU1jFtInGpq')" id="lIvJASBjnjU2q9Mh" type="radio" name="dt[jawabKepentingan][32362]" value="6" style="float: left;display: block;">
                                            <label for="lIvJASBjnjU2q9Mh" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Penting</label><input onclick="jawabanclick('Le0JkMU1jFtInGpq')" id="EZXBPDjMy2FN1Nex" type="radio" name="dt[jawabKepentingan][32362]" value="7" style="float: left;display: block;">
                                            <label for="EZXBPDjMy2FN1Nex" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Penting</label><input onclick="jawabanclick('Le0JkMU1jFtInGpq')" id="kHIa5tXqGZ1Nyhjk" type="radio" name="dt[jawabKepentingan][32362]" value="8" style="float: left;display: block;">
                                            <label for="kHIa5tXqGZ1Nyhjk" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Penting</label>
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: top;">
                                        <td>3</td>
                                        <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap kecepatan Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                        <td id="eb2vRg1Y8bPaBr3l" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('eb2vRg1Y8bPaBr3l')" id="FvG3mKvXAfIDDAa5" type="radio" name="dt[jawabKinerja][32363]" value="21" style="float: left;display: block;">
                                            <label for="FvG3mKvXAfIDDAa5" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Cepat</label><input onclick="jawabanclick('eb2vRg1Y8bPaBr3l')" id="pJuPNss28kGvjfr4" type="radio" name="dt[jawabKinerja][32363]" value="22" style="float: left;display: block;">
                                            <label for="pJuPNss28kGvjfr4" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Cepat</label><input onclick="jawabanclick('eb2vRg1Y8bPaBr3l')" id="sQQbMqw8asjUyd0o" type="radio" name="dt[jawabKinerja][32363]" value="23" style="float: left;display: block;">
                                            <label for="sQQbMqw8asjUyd0o" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Cepat</label><input onclick="jawabanclick('eb2vRg1Y8bPaBr3l')" id="kbIFHfubY33Gpyqr" type="radio" name="dt[jawabKinerja][32363]" value="24" style="float: left;display: block;">
                                            <label for="kbIFHfubY33Gpyqr" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Cepat</label>
                                        </td>
                                        <td id="Vhrh9BsNApQkMwyB" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('Vhrh9BsNApQkMwyB')" id="CGs7U9ydN79Hofss" type="radio" name="dt[jawabKepentingan][32363]" value="5" style="float: left;display: block;">
                                            <label for="CGs7U9ydN79Hofss" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Penting</label><input onclick="jawabanclick('Vhrh9BsNApQkMwyB')" id="9HTa2AkScXNHvaGh" type="radio" name="dt[jawabKepentingan][32363]" value="6" style="float: left;display: block;">
                                            <label for="9HTa2AkScXNHvaGh" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Penting</label><input onclick="jawabanclick('Vhrh9BsNApQkMwyB')" id="87mD4IGO7w7OJ64X" type="radio" name="dt[jawabKepentingan][32363]" value="7" style="float: left;display: block;">
                                            <label for="87mD4IGO7w7OJ64X" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Penting</label><input onclick="jawabanclick('Vhrh9BsNApQkMwyB')" id="HUH25EsqYTIIi83w" type="radio" name="dt[jawabKepentingan][32363]" value="8" style="float: left;display: block;">
                                            <label for="HUH25EsqYTIIi83w" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Penting</label>
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: top;">
                                        <td>4</td>
                                        <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap biaya untuk mendapatkan Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                        <td id="sKTwEpIbi5Wq7aK9" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('sKTwEpIbi5Wq7aK9')" id="RbEuQ2a2LZtpTYVA" type="radio" name="dt[jawabKinerja][32364]" value="55" style="float: left;display: block;">
                                            <label for="RbEuQ2a2LZtpTYVA" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Wajar</label><input onclick="jawabanclick('sKTwEpIbi5Wq7aK9')" id="wU1625C9Z2QzsNet" type="radio" name="dt[jawabKinerja][32364]" value="56" style="float: left;display: block;">
                                            <label for="wU1625C9Z2QzsNet" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Wajar</label><input onclick="jawabanclick('sKTwEpIbi5Wq7aK9')" id="sa2KC5nU0qMISwT5" type="radio" name="dt[jawabKinerja][32364]" value="57" style="float: left;display: block;">
                                            <label for="sa2KC5nU0qMISwT5" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Wajar</label><input onclick="jawabanclick('sKTwEpIbi5Wq7aK9')" id="1GPnQF6uwKHqrKow" type="radio" name="dt[jawabKinerja][32364]" value="58" style="float: left;display: block;">
                                            <label for="1GPnQF6uwKHqrKow" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Wajar</label>
                                        </td>
                                        <td id="YgRF8fQTeg0k68eR" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('YgRF8fQTeg0k68eR')" id="nwxaHyqjTPk74PnX" type="radio" name="dt[jawabKepentingan][32364]" value="5" style="float: left;display: block;">
                                            <label for="nwxaHyqjTPk74PnX" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Penting</label><input onclick="jawabanclick('YgRF8fQTeg0k68eR')" id="uH8kZW7j9H7UK9mD" type="radio" name="dt[jawabKepentingan][32364]" value="6" style="float: left;display: block;">
                                            <label for="uH8kZW7j9H7UK9mD" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Penting</label><input onclick="jawabanclick('YgRF8fQTeg0k68eR')" id="KwqVxli9QeysShYC" type="radio" name="dt[jawabKepentingan][32364]" value="7" style="float: left;display: block;">
                                            <label for="KwqVxli9QeysShYC" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Penting</label><input onclick="jawabanclick('YgRF8fQTeg0k68eR')" id="FUlsyGLaMJV6Cyfr" type="radio" name="dt[jawabKepentingan][32364]" value="8" style="float: left;display: block;">
                                            <label for="FUlsyGLaMJV6Cyfr" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Penting</label>
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: top;">
                                        <td>5</td>
                                        <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap kualitas Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                        <td id="8OGnhkbVIrcde4Lb" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('8OGnhkbVIrcde4Lb')" id="l7q1jQhC8UvZjPC2" type="radio" name="dt[jawabKinerja][32365]" value="41" style="float: left;display: block;">
                                            <label for="l7q1jQhC8UvZjPC2" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Berkualitas</label><input onclick="jawabanclick('8OGnhkbVIrcde4Lb')" id="BFNOd2FAkPfzzihX" type="radio" name="dt[jawabKinerja][32365]" value="42" style="float: left;display: block;">
                                            <label for="BFNOd2FAkPfzzihX" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Berkualitas</label><input onclick="jawabanclick('8OGnhkbVIrcde4Lb')" id="JLAl28gixLRLoVKT" type="radio" name="dt[jawabKinerja][32365]" value="43" style="float: left;display: block;">
                                            <label for="JLAl28gixLRLoVKT" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Berkualitas</label><input onclick="jawabanclick('8OGnhkbVIrcde4Lb')" id="tNe62fbeVNXb58Zm" type="radio" name="dt[jawabKinerja][32365]" value="45" style="float: left;display: block;">
                                            <label for="tNe62fbeVNXb58Zm" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Berkualitas</label>
                                        </td>
                                        <td id="gtvLpCFMCoAGlbbw" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('gtvLpCFMCoAGlbbw')" id="GF0FEifXaQUWk9v3" type="radio" name="dt[jawabKepentingan][32365]" value="5" style="float: left;display: block;">
                                            <label for="GF0FEifXaQUWk9v3" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Penting</label><input onclick="jawabanclick('gtvLpCFMCoAGlbbw')" id="2Ksb4TXOQBusweIB" type="radio" name="dt[jawabKepentingan][32365]" value="6" style="float: left;display: block;">
                                            <label for="2Ksb4TXOQBusweIB" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Penting</label><input onclick="jawabanclick('gtvLpCFMCoAGlbbw')" id="a8oStNIIqLQjLRTF" type="radio" name="dt[jawabKepentingan][32365]" value="7" style="float: left;display: block;">
                                            <label for="a8oStNIIqLQjLRTF" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Penting</label><input onclick="jawabanclick('gtvLpCFMCoAGlbbw')" id="aQpqKWUxt03JDv4R" type="radio" name="dt[jawabKepentingan][32365]" value="8" style="float: left;display: block;">
                                            <label for="aQpqKWUxt03JDv4R" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Penting</label>
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: top;">
                                        <td>6</td>
                                        <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap kompetensi petugas dalam memberikan Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                        <td id="RnRmGQoiNMX8l5f6" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('RnRmGQoiNMX8l5f6')" id="eqCYbwbdt5umgDx4" type="radio" name="dt[jawabKinerja][32366]" value="41" style="float: left;display: block;">
                                            <label for="eqCYbwbdt5umgDx4" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Berkualitas</label><input onclick="jawabanclick('RnRmGQoiNMX8l5f6')" id="Ouwc4MnJYUoLuA1S" type="radio" name="dt[jawabKinerja][32366]" value="42" style="float: left;display: block;">
                                            <label for="Ouwc4MnJYUoLuA1S" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Berkualitas</label><input onclick="jawabanclick('RnRmGQoiNMX8l5f6')" id="bEkitzrKaLBo9tdp" type="radio" name="dt[jawabKinerja][32366]" value="43" style="float: left;display: block;">
                                            <label for="bEkitzrKaLBo9tdp" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Berkualitas</label><input onclick="jawabanclick('RnRmGQoiNMX8l5f6')" id="JXlmDyxgBEYGfnfF" type="radio" name="dt[jawabKinerja][32366]" value="45" style="float: left;display: block;">
                                            <label for="JXlmDyxgBEYGfnfF" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Berkualitas</label>
                                        </td>
                                        <td id="rnvZgX6lteIiOTiV" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('rnvZgX6lteIiOTiV')" id="R4jUYjhS6lpj4aDN" type="radio" name="dt[jawabKepentingan][32366]" value="5" style="float: left;display: block;">
                                            <label for="R4jUYjhS6lpj4aDN" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Penting</label><input onclick="jawabanclick('rnvZgX6lteIiOTiV')" id="Id017ytJHRpu4w8A" type="radio" name="dt[jawabKepentingan][32366]" value="6" style="float: left;display: block;">
                                            <label for="Id017ytJHRpu4w8A" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Penting</label><input onclick="jawabanclick('rnvZgX6lteIiOTiV')" id="EHxHRgf3qy7riF3X" type="radio" name="dt[jawabKepentingan][32366]" value="7" style="float: left;display: block;">
                                            <label for="EHxHRgf3qy7riF3X" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Penting</label><input onclick="jawabanclick('rnvZgX6lteIiOTiV')" id="hqDOnsjnPmjHdeOp" type="radio" name="dt[jawabKepentingan][32366]" value="8" style="float: left;display: block;">
                                            <label for="hqDOnsjnPmjHdeOp" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Penting</label>
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: top;">
                                        <td>7</td>
                                        <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap perilaku petugas Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                        <td id="RbRpK0HDVMJCzIAi" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('RbRpK0HDVMJCzIAi')" id="kagZ8W8QoJqFud60" type="radio" name="dt[jawabKinerja][32367]" value="29" style="float: left;display: block;">
                                            <label for="kagZ8W8QoJqFud60" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Ramah/Sopan</label><input onclick="jawabanclick('RbRpK0HDVMJCzIAi')" id="YnnOXOwUmtnHOAbE" type="radio" name="dt[jawabKinerja][32367]" value="30" style="float: left;display: block;">
                                            <label for="YnnOXOwUmtnHOAbE" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Ramah/Sopan</label><input onclick="jawabanclick('RbRpK0HDVMJCzIAi')" id="YcotGaW67kHY8hOK" type="radio" name="dt[jawabKinerja][32367]" value="31" style="float: left;display: block;">
                                            <label for="YcotGaW67kHY8hOK" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Ramah/Sopan</label><input onclick="jawabanclick('RbRpK0HDVMJCzIAi')" id="uyTFUa7GNrraxuAH" type="radio" name="dt[jawabKinerja][32367]" value="32" style="float: left;display: block;">
                                            <label for="uyTFUa7GNrraxuAH" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Ramah/Sopan</label>
                                        </td>
                                        <td id="oRHRtkEPldJjL41m" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('oRHRtkEPldJjL41m')" id="e2VXSPorcZamiOwL" type="radio" name="dt[jawabKepentingan][32367]" value="5" style="float: left;display: block;">
                                            <label for="e2VXSPorcZamiOwL" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Penting</label><input onclick="jawabanclick('oRHRtkEPldJjL41m')" id="6UcWH5sWYQbMxv0z" type="radio" name="dt[jawabKepentingan][32367]" value="6" style="float: left;display: block;">
                                            <label for="6UcWH5sWYQbMxv0z" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Penting</label><input onclick="jawabanclick('oRHRtkEPldJjL41m')" id="hfvfMYx1kvCo0ZUj" type="radio" name="dt[jawabKepentingan][32367]" value="7" style="float: left;display: block;">
                                            <label for="hfvfMYx1kvCo0ZUj" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Penting</label><input onclick="jawabanclick('oRHRtkEPldJjL41m')" id="zFVH1im7OKDTH1iz" type="radio" name="dt[jawabKepentingan][32367]" value="8" style="float: left;display: block;">
                                            <label for="zFVH1im7OKDTH1iz" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Penting</label>
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: top;">
                                        <td>8</td>
                                        <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap tindak lanjut petugas dalam penanganan pengaduan, saran dan masukan pada Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                        <td id="NDA7QMtZbVBv7WHw" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('NDA7QMtZbVBv7WHw')" id="jx4qE04WdqEIJGPm" type="radio" name="dt[jawabKinerja][32368]" value="50" style="float: left;display: block;">
                                            <label for="jx4qE04WdqEIJGPm" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Ditanggapi dan Tidak Ditindaklanjuti </label><input onclick="jawabanclick('NDA7QMtZbVBv7WHw')" id="2BtiOALfxHAQZTlw" type="radio" name="dt[jawabKinerja][32368]" value="51" style="float: left;display: block;">
                                            <label for="2BtiOALfxHAQZTlw" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Ditanggapi dan Kurang Ditindaklanjuti</label><input onclick="jawabanclick('NDA7QMtZbVBv7WHw')" id="hluSd3mlQDvH5vsi" type="radio" name="dt[jawabKinerja][32368]" value="52" style="float: left;display: block;">
                                            <label for="hluSd3mlQDvH5vsi" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Ditanggapi dan Ditindaklanjuti</label><input onclick="jawabanclick('NDA7QMtZbVBv7WHw')" id="tyrGo8HI4SrUR386" type="radio" name="dt[jawabKinerja][32368]" value="54" style="float: left;display: block;">
                                            <label for="tyrGo8HI4SrUR386" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Selalu Ditanggapi dan Ditindaklanjuti</label>
                                        </td>
                                        <td id="7sSFOEubx0uNCQTp" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('7sSFOEubx0uNCQTp')" id="UnQJUtBQgODOwcpM" type="radio" name="dt[jawabKepentingan][32368]" value="5" style="float: left;display: block;">
                                            <label for="UnQJUtBQgODOwcpM" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Penting</label><input onclick="jawabanclick('7sSFOEubx0uNCQTp')" id="FVmVd8uPpmd3y2aT" type="radio" name="dt[jawabKepentingan][32368]" value="6" style="float: left;display: block;">
                                            <label for="FVmVd8uPpmd3y2aT" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Penting</label><input onclick="jawabanclick('7sSFOEubx0uNCQTp')" id="iMvOz3l43QtaD5ka" type="radio" name="dt[jawabKepentingan][32368]" value="7" style="float: left;display: block;">
                                            <label for="iMvOz3l43QtaD5ka" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Penting</label><input onclick="jawabanclick('7sSFOEubx0uNCQTp')" id="epW47Ox9TUWcAHAV" type="radio" name="dt[jawabKepentingan][32368]" value="8" style="float: left;display: block;">
                                            <label for="epW47Ox9TUWcAHAV" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Penting</label>
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: top;">
                                        <td>9</td>
                                        <td>Bagaimana penilaian Bapak/Ibu/Saudara terhadap kelengkapan sarana dan prasarana dalam Pelayanan Fasilitasi Kelembagaan Perangkat Daerah ?</td>
                                        <td id="ZQhy03DZa8LBYRoq" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('ZQhy03DZa8LBYRoq')" id="5pFgnm7UeMsNFcXQ" type="radio" name="dt[jawabKinerja][32369]" value="41" style="float: left;display: block;">
                                            <label for="5pFgnm7UeMsNFcXQ" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Berkualitas</label><input onclick="jawabanclick('ZQhy03DZa8LBYRoq')" id="GMwz79Ibve0aKEEc" type="radio" name="dt[jawabKinerja][32369]" value="42" style="float: left;display: block;">
                                            <label for="GMwz79Ibve0aKEEc" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Berkualitas</label><input onclick="jawabanclick('ZQhy03DZa8LBYRoq')" id="TNyVPUoUfubwYjEK" type="radio" name="dt[jawabKinerja][32369]" value="43" style="float: left;display: block;">
                                            <label for="TNyVPUoUfubwYjEK" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Berkualitas</label><input onclick="jawabanclick('ZQhy03DZa8LBYRoq')" id="qynPerVfRSqXVVJZ" type="radio" name="dt[jawabKinerja][32369]" value="45" style="float: left;display: block;">
                                            <label for="qynPerVfRSqXVVJZ" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Berkualitas</label>
                                        </td>
                                        <td id="muLItXAatvLY2Jwo" class="td-jawaban-pilihan" style="background-color: antiquewhite;"><input onclick="jawabanclick('muLItXAatvLY2Jwo')" id="i3t9Mn4Nkwh4IdXy" type="radio" name="dt[jawabKepentingan][32369]" value="5" style="float: left;display: block;">
                                            <label for="i3t9Mn4Nkwh4IdXy" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Tidak Penting</label><input onclick="jawabanclick('muLItXAatvLY2Jwo')" id="X30nLfUe3GD60ZxG" type="radio" name="dt[jawabKepentingan][32369]" value="6" style="float: left;display: block;">
                                            <label for="X30nLfUe3GD60ZxG" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Kurang Penting</label><input onclick="jawabanclick('muLItXAatvLY2Jwo')" id="zhPMKxjToNiPrNVg" type="radio" name="dt[jawabKepentingan][32369]" value="7" style="float: left;display: block;">
                                            <label for="zhPMKxjToNiPrNVg" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Penting</label><input onclick="jawabanclick('muLItXAatvLY2Jwo')" id="zQ0OekzG5sYPfals" type="radio" name="dt[jawabKepentingan][32369]" value="8" style="float: left;display: block;">
                                            <label for="zQ0OekzG5sYPfals" style="margin-bottom:0px;position: relative;margin-left: 20px;display: block;"> Sangat Penting</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Apakah terdapat tambahan biaya diluar biaya yang ditetapkan ? </td>
                                        <td colspan="2">
                                            <div class="form-group col-md-12">
                                                <div class="col-md-6">
                                                    <input id="aOxD6tFSzQGn9pwf" type="radio" name="dt[isPungli]" value="0" checked="">
                                                    <label for="aOxD6tFSzQGn9pwf"> Tidak Ada</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="QBnJPDoDw5R2RLUQ" type="radio" name="dt[isPungli]" value="1">
                                                    <label for="QBnJPDoDw5R2RLUQ"> Ada </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4">
                                            <div class="form-group col-md-12">
                                                <label class="control-label">Masukan / Saran untuk perbaikan pelayanan (<span><i>Jika Terdapat jawaban yang kurang, isikan saran/masukan.</i></span>) **)</label>
                                                <textarea class="form-control" name="dt[masukan]"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="form-group">
                                <div class="col-md-12" align="right">
                                    <button type="button" onclick="simpandata();" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Kirim</button>
                                    <button type="button" onclick="closeformdetil();" class="btn btn-danger" id="keluarForm"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> Batal</button>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row collapse" id="tambahFormKonfirmasi">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row" id="form-konfirm-detil">
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
        //stoken='uBNBx8IbiyyU8DT9E6ebm3fN9JoBlswmaIk10O3P' ;
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
            if (idKerjaPilih == 14) {
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