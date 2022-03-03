<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <style type="text/css">
        table {
            background: #fff;
            padding: 5px;
        }

        tr,
        td {
            border: table-cell;
        }

        tr,
        td {
            vertical-align: top !important;
        }

        #right {
            border-right: none !important;
        }

        #left {
            border-left: none !important;
        }

        .isi {
            height: 250px !important;
        }

        .disp {
            text-align: center;
        }

        .logodisp {
            float: left;
            position: relative;
            width: 15%;
            margin: 0.2rem 0 0 1rem;
        }

        .qrcode {
            float: left;
            position: relative;
            margin: 0 0 0 1rem;
        }

        #lead {
            width: 100%;
            position: relative;
            margin: 25px 0 0 0;
        }

        .lead {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: -10px;
        }

        .tgh {
            text-align: center;
        }

        #nama {
            font-size: 1.05rem;
            margin-bottom: -1rem;
        }

        #alamat {
            font-size: 0.8rem;
        }

        .up {
            text-transform: uppercase;
            margin: 0;
            font-size: 8px;
        }

        .status {
            margin: 0;
            font-size: 1.3rem;
            margin-bottom: .5rem;
        }

        #lbr {
            font-size: 20px;
            font-weight: bold;
            max-width: 100%;
        }

        .separator {
            border-bottom: 2px solid #616161;
            margin: -1.3rem 0 1.5rem;
        }

        .footer {
            width: 100%;
            height: 50px;
            padding-left: 10px;
            line-height: 30px;
            margin: 1.3rem 0 1.5rem;
        }

        #tembus1 {
            position: fixed;
            bottom: 65;
            left: 0;
        }

        #tembus2 {
            position: fixed;
            bottom: 40;
            left: 0;
        }
    </style>

</head>

<body>

    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
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
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    ?>

    <table width="100%" style="margin-top: -35px">
        <tbody>

            <tr border="0">
                <td class="tgh" id="lbr" colspan="5">
                    <div class="disp">
                        <img class="logodisp" src="<?= base_url() ?>/assets/img/jateng.png" />
                        <span id="nama" style="margin-bottom: -10px;">
                            PEMERINTAH PROVINSI JAWA TENGAH<br>
                            <p style="margin-top: -5px;">DINAS PEMBERDAYAAN MASYARAKAT, DESA,</p>
                            <p style="margin-top: -20px">KEPENDUDUKAN DAN PENCATATAN SIPIL</p>
                        </span>
                        <p id="alamat" style="margin-top: -15px;">
                            Jl. Menteri Supeno No.17 TELP. (024) 88311621 FAX.8318492 SEMARANG 50243</p>
                        <p id="alamat" style="margin-top: -15px">Email : dispermadesdukcapil@jatengprov.go.id</p>
                        <hr style="height:1px;border-width:0;color:gray;background-color:black;margin-bottom: -19px">
                        <hr style="height:2px;border-width:0;color:gray;background-color:black">
                    </div>
                </td>
            </tr>

        </tbody>
    </table>

    <p align="center" style="font-size: 16px;margin-top: -15px"><u><b>SURAT PERINTAH TUGAS</b></u></p>
    <P align="center" style="font-size: 14px; margin-top: -18px"><b>Nomor: 940/X/0234/2019</b></P>

    <table border="0" style="font-size: 14px; margin-top: -15px; padding-bottom: -10px">
        <tr>
            <td width="12%">DASAR</td>
            <td width="3%" align="center">:</td>
            <td width="85%">
                <table border="0" style="margin-top: -5px; line-height:120%">
                    <tr>
                        <td width="5%" align="left">1.</td>
                        <td width="95%" align="justify">Peraturan Gubernur Jawa Tengah Nomor 17 Tahun 2013 tentang Perjalanan Dinas Gubernur/Wakil Gubernur, Pimpinan dan Anggota DPRD, PNS, CPNS dan Pegawai Negeri Non PNS.</td>
                    </tr>

                    <tr>
                        <td width="5%" align="left">2.</td>
                        <td width="95%" align="justify">Peraturan Gubernur Jawa Tengah Nomor 44 Tahun 2019 tentang Pedoman Penata Usahaan Pelaksanaan APBD Provinsi Jawa Tengah Tahun Anggaran 2020.</td>
                    </tr>

                    <tr>
                        <td width="5%" align="left">3.</td>
                        <td width="95%" align="justify">Peraturan Gubernur Jawa Tengah Nomor 59 Tahun 2019 tentang Penjabaran APBD Provinsi Jawa Tengah Tahun Anggaran 2020.</td>
                    </tr>

                    <tr>
                        <td width="5%" align="left">4.</td>
                        <td width="95%" align="justify">Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah Kegiatan Pembinaan dan Fasilitasi Penyelenggaraan Pelayanan Pencatatan Sipil Nomor : 01160/DPA/2020 tanggal 18 Desember 2020.</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

    <p align="center" style="font-size: 16px; margin-bottom: -5px"><b>MEMERINTAHKAN:</b></p>

    <table border="0" style="font-size: 14px; line-height:120%">
        <tr>
            <td width="12%">KEPADA</td>
            <td width="3%" align="center">:</td>
            <td width="85%">
                <table border="0" style="margin-top: -5px">
                    <tr>
                        <td align="justify" colspan="4">Pejabat/Staf Dinas Pemberdayaan Masyarakat, Desa, Kependudukan dan Pencatatan Sipil Provinsi Jawa Tengah</td>
                    </tr>

                    <tr>
                        <td width="5%" align="left">1.</td>
                        <td width="15%">Nama / NIP</td>
                        <td width="3%" align="center">:</td>
                        <td width="77%" align="justify">Drs.BUDIHARJO,MM / 19640412 199303 1 007</td>
                    </tr>
                    <tr>
                        <td width="5%" align="left">&nbsp;</td>
                        <td width="15%">Jabatan</td>
                        <td width="3%" align="center">:</td>
                        <td width="77%" align="justify">Kabid Fasilitasi Pelayanan Administrasi Kependudukan</td>
                    </tr>

                    <tr>
                        <td width="5%" align="left">2.</td>
                        <td width="15%">Nama / NIP</td>
                        <td width="3%" align="center">:</td>
                        <td width="77%" align="justify">DWI AGUNG KURNIAWAN,S.Kom / 19771216 200604 1 005</td>
                    </tr>
                    <tr>
                        <td width="5%" align="left">&nbsp;</td>
                        <td width="15%">Jabatan</td>
                        <td width="3%" align="center">:</td>
                        <td width="77%" align="justify">Kasi Bina Aparatur Pendaftaran Penduduk</td>
                    </tr>

                    <tr>
                        <td width="5%" align="left">3.</td>
                        <td width="15%">Nama / NIP</td>
                        <td width="3%" align="center">:</td>
                        <td width="77%" align="justify">PUTRI LINTANG, SE / </td>
                    </tr>
                    <tr>
                        <td width="5%" align="left">&nbsp;</td>
                        <td width="15%">Jabatan</td>
                        <td width="3%" align="center">:</td>
                        <td width="77%" align="justify"></td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

    <table border="0" style="font-size: 14px; line-height:120%">
        <tr>
            <td width="12%">UNTUK</td>
            <td width="3%" align="center">:</td>
            <td width="85%">
                <table border="0" style="margin-top: -5px">
                    <tr>
                        <td width="5%" align="left">1.</td>
                        <td width="95%" align="justify">Melaksanakan Perjalanan Dinas Dalam Rangka Launching DUKCAPIL GO DIGITAL dan Sosialisasi Pelayanan Administrasi Kependudukan Secara Daring atau On Line di Graha Bumi Phala Kabupaten Temanggung Pada tanggal 30 April 2019.</td>
                    </tr>

                    <tr>
                        <td width="5%" align="left">2.</td>
                        <td width="95%" align="justify">Melaporkan kepada Pejabat setempat guna pelaksanaan.</td>
                    </tr>

                    <tr>
                        <td width="5%" align="left">3.</td>
                        <td width="95%" align="justify">Melaporkan Hasil Pelaksanaan Tugas Tugas Tersebut Paling Lambat 7 (Tujuh) Hari.</td>
                    </tr>

                    <tr>
                        <td width="5%" align="left">4.</td>
                        <td width="95%" align="justify">Biaya perjalanan dinas dibebankan pada Rekening Nomor : 22.06.2.07.01.01.0002.</td>
                    </tr>

                    <tr>
                        <td width="5%" align="left">5.</td>
                        <td width="95%" align="justify">Perintah ini dilaksanakan dengan penuh tanggung jawab.</td>
                    </tr>

                    <tr>
                        <td width="5%" align="left">6.</td>
                        <td width="95%" align="justify">Apabila terdapat kekeliruan dalam Surat Perintah ini akan diadakan perbaikan kembali sebagaimana mestinya.</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

    <table border="0" align="right" style="font-size: 13px">
        <tr>
            <td width="55%">&nbsp;</td>
            <td width="15%">Dikeluarkan di</td>
            <td width="3%" align="center">:</td>
            <td width="27%" align="left">Semarang</td>
        </tr>
        <tr>
            <td width="55%">&nbsp;</td>
            <td width="15%" style="border-bottom: 0.8px solid #000;">Pada Tanggal</td>
            <td width="3%" align="center" style="border-bottom: 0.8px solid #000;">:</td>
            <td width="27%" align="left" style="border-bottom: 0.8px solid #000;"><?php date_default_timezone_set('Asia/Jakarta');
                                                                                    echo tgl_indo(date('Y-m-d')); ?></td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td width="55%">&nbsp;</td>
            <td colspan="3" align="center">KEPALA DINAS<br> PEMBERDAYAAN MASYARAKAT, DESA,<br> KEPENDUDUKAN DAN PENCATATAN SIPIL<br> PROVINSI JAWA TENGAH</td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td width="55%">&nbsp;</td>
            <td colspan="3" align="center"><b><u>Ir. SUGENG RIYANTO, MSc</u></b></td>
        </tr>
        <tr>
            <td width="55%">&nbsp;</td>
            <td colspan="3" align="center">Pembina Utama Madya</td>
        </tr>
        <tr>
            <td width="55%">&nbsp;</td>
            <td colspan="3" align="center">NIP. 19600512 198903 1 012</td>
        </tr>
    </table>

    <table border="0" id="tembus1" style="font-size: 13px;">
        <tr>
            <td width="15%"><u>TEMBUSAN</u></td>
            <td width="70%" align="left">: disampaikan Yth.</td>
        </tr>
    </table>
    <table border="0" id="tembus2" style="font-size: 13px; margin-top: -5px">
        <tr>
            <td width="5%">1.</td>
            <td width="70%" align="left">Kepala Dispermadesdukcapil Prov. Jateng</td>
        </tr>
        <tr>
            <td width="5%">2.</td>
            <td width="70%" align="left">Personil yang bersangkutan</td>
        </tr>
        <tr>
            <td width="5%">3.</td>
            <td width="70%" align="left"><u>Pertinggal.</u></td>
        </tr>
    </table>
</body>

</html>