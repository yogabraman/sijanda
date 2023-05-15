<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <meta name="description" content="">
    <title>SPPD</title>
    <meta name="author" content="">
    <!-- Favicon icon -->
    <style type="text/css">

            .upper {
                margin-top: -2rem;
            }

            #table th {
                text-align: center;
                font-size: 14px;
            }

            #table td {
                font-size: 13px;
                padding: 3.5px
            }

            ol {
                margin: -5px;
            }

            li {
                page-break-after: auto;
            }

            /*br {
                line-height: 10px
            }*/

	</style>

</head>

<body>

    <?php 
         function tgl_indo($tanggal){

            $day = array ( 1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
            );

            $bulan = array (
                1 =>    'Januari',
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

            $date = date_create($tanggal); 
            $date = date_format($date, "Y-m-d");

            $hari = date_create($tanggal);
            $hari = date_format($hari, "Y-m-N");

            $time = date_create($tanggal);
            $time = date_format($time, "H:i:s");
  
            $pecahkan = explode('-', $date);
            $har = explode('-', $hari);
            $waktu = explode(':', $time);
  
            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun
 
            return $day[ (int)$har[2] ] . ', '. $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }

    ?>

<table border="0" width="100%" class="upper">
    <tr>
        <td width="15%" style="text-align: center;"><img width="80" height="92" src="data:image/jpg;base64,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"></td>
        <td width="85%" align="center"><strong style="font-size: 17px">PEMERINTAH PROVINSI JAWA TENGAH<br>DINAS PEMBERDAYAAN MASYARAKAT, DESA,<br>KEPENDUDUKAN DAN PENCATATAN SIPIL</strong><br><span style="font-size: 14px">JL. MENTERI SUPENO.17 TELP.(024) 8311621 ( FAX.(024)8318492 SEMARANG 50243<br>Email : dispermadesdukcapil@jatengprov.goid</span></td>
    </tr>
</table>

<hr style="height:1px;border-width:0;color:gray;background-color:black">
<hr style="height:1.6px;background:black;margin-top:-15px">


<p style="font-weight: bold;" align="center"><u style="font-size: 16px;">MEMO</u><br><span style="font-size: 14px">Nomor: 940/X/0234/2019</span></p>

<table id="table" border="1" width="100%">
<?php 
	date_default_timezone_set('Asia/Jakarta');
    $waktu = date('Y-m-d H:i:s');
?>
  
        <tbody>
        	<tr>
                <td width="6%" style="text-align: center;">1.</td>   
                <td width="42%" style="text-align: left;" colspan="2">Pengguna Anggaran/ Kuasa Pengguna</td>
                <td width="52%" style="text-align: left;" colspan="2">Drs.BUDIHARJO,MM</td>
            </tr>
            <tr>
                <td style="text-align: center;">2.</td>
                <td width="42%" style="text-align: left;" colspan="2">Nama Gubernur/ Wakil Gubernur/ Pimpinan/ Anggota DPRD/ Nama PNS dan NIP/ Pegawai Non PNS yang melaksanakan perjalanan dinas</td>
                <td width="52%" style="text-align: left;" colspan="2">Drs.BUDIHARJO,MM</td>
            </tr>
            <tr>
                <td style="text-align: center;">3.</td>
                <td width="42%" style="text-align: left;" colspan="2">
                    <ol type="a">
                        <li>Pangkat/Golongan</li>
                        <li>Jabatan/Instansi</li>
                        <li>Tingkat biaya perjalanan dinas</li>
                    </ol>
                </td>
                <td width="52%" style="text-align: left;" colspan="2">
                    <ol type="a">
                        <li>Pembina Tingkat I (IV/b)</li>
                        <li>Kabid Fasilitasi Pelayanan Administrasi Kependudukan</li>
                        <li>c</li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td width="6%" style="text-align: center;">4.</td>   
                <td width="42%" style="text-align: left;" colspan="2">Maksud perjalanan dinas</td>
                <td width="52%" style="text-align: justify;" colspan="2">Melaksanakan Perjalanan Dinas Dalam Rangka Launching DUKCAPIL GO DIGITAL dan Sosialisasi Pelayanan Administrasi Kependudukan Secara Daring atau On Line di Graha Bumi Phala Kabupaten Temanggung Pada tanggal 30 April 2019</td>
            </tr>
            <tr>
                <td width="6%" style="text-align: center;">5.</td>   
                <td width="42%" style="text-align: left;" colspan="2">Alat angkut yang dipergunakan</td>
                <td width="52%" style="text-align: left;" colspan="2">Kendaraan Roda 4 (empat)</td>
            </tr>
            <tr>
                <td style="text-align: center;">6.</td>
                <td width="42%" style="text-align: left;" colspan="2">
                    <ol type="a">
                        <li>Tempat berangkat</li>
                        <li>Tempat tujuan</li>
                    </ol>
                </td>
                <td width="52%" style="text-align: left;" colspan="2">
                    <ol type="a">
                        <li>Semarang</li>
                        <li>Tegal</li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">7.</td>
                <td width="42%" style="text-align: left;" colspan="2">
                    <ol type="a">
                        <li>Lamanya perjalanan dinas</li>
                        <li>Tanggal berangkat</li>
                        <li>Tanggal harus kembali/tiba</li>
                    </ol>
                </td>
                <td width="52%" style="text-align: left;" colspan="2">
                    <ol type="a">
                        <li>4 Hari</li>
                        <li>19 Desember 2019</li>
                        <li>23 Desember 2019</li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td width="6%" style="text-align: center;">8.</td>
                <td width="21%" style="text-align: left; border:none;">Pengikut</td>
                <td width="21%" style="text-align: left; border:none;">Nama</td>
                <td width="26%" style="text-align: left; border-right: none; border-bottom: none;">Tanggal Lahir</td>
                <td width="26%" style="text-align: left; border:none;">Keterangan</td>
            </tr>
            <tr>
                <td style="text-align: center;"></td>
                <td width="42%" style="text-align: left;" colspan="2">
                    <ol type="1">
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                    </ol>
                </td>
                <td width="52%" style="text-align: left;" colspan="2">
                    
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">9.</td>
                <td width="42%" style="text-align: left;" colspan="2">
                    Pembebanan anggaran
                    <ol type="a">
                        <li>Instansi/SKPD</li>
                        <li>Akun</li>
                    </ol>
                </td>
                <td width="52%" style="text-align: left;" colspan="2">
                    &nbsp;
                    <ol type="a">
                        <li>Dispermades Dukcapil Prov.Jateng</li>
                        <li>22.06.2.07.01.01.0002</li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td width="6%" style="text-align: center;">10.</td>   
                <td width="42%" style="text-align: left;" colspan="2">Keterangan lain-lain</td>
                <td width="52%" style="text-align: justify;" colspan="2">Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah Kegiatan Pembinaan dan Fasilitasi Penyelenggaraan Pelayanan Pencatatan Sipil Nomor : 01175/DPA/2019</td>
            </tr>
                          
        </tbody>
    	
</table>

<table border="0" width="100%" style="margin-top: 10px">
    <tr>
        <td width="12%"></td>
        <td width="25%"></td>
        <td width="23%"></td>
        <td width="40%" align="center" style="font-size: 13px">Semarang, 19 Desember 2019<br>Kuasa Pengguna Anggaran,<br><br><br><b><u>Drs.BUDIHARJO,MM</u></b><br>Pembina Tingkat I (IV/b)<br>NIP. 19640412 199303 1 007</td>
    </tr>
</table>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>