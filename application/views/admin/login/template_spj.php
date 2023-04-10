<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <meta name="description" content="">
    <title>Bend 10.12</title>
    <meta name="author" content="">
    <!-- Favicon icon -->
    <style type="text/css">
        .upper {
            margin-top: -2.5rem;
        }

        #table th {
            text-align: center;
            font-size: 14px;
        }

        #table td {
            font-size: 13px;
            padding: 5px
        }

        .tr-spacer {
            height: 20px;
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
    function tgl_indo($tanggal)
    {

        $day = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

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

        return $day[(int)$har[2]] . ', ' . $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    ?>

    <table border="1" width="100%" class="upper">

        <tr>
            <td width="70%" style="text-align: center; font-weight: bold; font-size: 14px; border-right: none" colspan="3"><u>PEMERINTAH PROVINSI<br> JAWA TENGAH</u></td>
            <td width="30%" align="center" style="font-weight: bold; font-size: 10px; border-left: none"><u><br><br><br>Bend 10.12</u></td>
        </tr>

        <tr>
            <td width="70%" colspan="3" style="border-bottom: none;">
                <p style="font-size: 11px;">SKPD : DISPERMADES DUKCAPIL JAWA TENGAH</p>
                <p style="font-size: 9px; margin-top: -15px">TAHUN ANGGARAN : 2022 No. ............../................/............../2022</p>
                <p style="text-align: center; font-weight: bold; font-size: 11px"><u>SURAT BUKTI PENGELUARAN</u></p>
            </td>
            <td width="30%" style="border-bottom: none;">
                <p style="font-size: 11px; text-align: center;">KETERANGAN</p>
                <P style="font-size: 11px; text-align: left;"> Barang-barang tersebut telah masuk buku Persediaan/Inventaris tgl. ......</P>
            </td>
        </tr>

        <tr>
            <td width="20%" style="border-right: none; border-top: none; border-bottom: none; vertical-align: top;">
                <p style="text-align: left; font-size: 10px;">Dibayarkan Kepada</p>
                <p style="text-align: left; font-size: 10px;">Uang Sejumlah</p>
                <p style="text-align: left; font-size: 10px;">Untuk Pembayaran</p>
            </td>
            <td width="55%" colspan="2" style="border-left: none; border-top: none; border-bottom: none; vertical-align: top;">
                <p style="text-align: left; font-size: 10px">: Hesty Lestariyani, SE (Yoga Bramanditya, A.Md.Kom; Edwhin Prastyo, S.Kom)</p>
                <p style="text-align: left; font-size: 10px;">: Rp. 3.503.000,- ( Tiga Juta Lima Ratus Tiga Ribu Rupiah )</p>
                <p style="text-align: justify; font-size: 10px">: Biaya perjalanan dinas dalam rangka Koordinasi Peningkatan Kualitas Pelayanan Administrasi Kependudukan ke Kota Pekalongan pada 20 s.d 21 Desember 2022.</p>
            </td>
            <td width="25%" style="border-top: none; border-bottom: none;">
                <table border="1" width="100%">
                    <tr>
                        <td style="font-size: 10px;">Jml kotor</td>
                        <td style="font-size: 10px;">Pajak</td>
                        <td style="font-size: 10px;">Jml bersih</td>
                    </tr>
                    <tr>
                        <td height="100px" style="font-size: 10px;"></td>
                        <td height="100px" style="font-size: 10px;"></td>
                        <td height="100px" style="font-size: 10px;"></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td width="20%" style="border-right: none; border-top: none; vertical-align: top;">
                <p style="text-align: left; font-size: 10px;">Untuk pekerjaan/keperluan</p>
                <p style="text-align: left; font-size: 10px; margin-bottom: 1px;">Kode Rekening</p>
            </td>
            <td width="55%" colspan="2" style="border-left: none; border-top: none; vertical-align: top;">
                <p style="text-align: left; font-size: 10px;">: Perjalanan Dinas Biasa</p>
                <p style="text-align: left; font-size: 10px; margin-bottom: 1px;">: 2.13.2.12.0.00.03.0005.04.1.02.5.1.2.4.1.1</p>
            </td>
            <td width="25%" style="border-top: none;">
                <P style="font-size: 10px; text-align: left; margin-bottom: 1px;"> Pengeluaran/pembelian dilakukan <br> berdasarkan : SPT. No. 094/1234 <br> Tanggal : 20 Desember 2022 </P>
            </td>
        </tr>

        <tr>
            <td width="40%" colspan="2" style="border-right: none; border-top: none; vertical-align: top;">
                <p style="text-align: left; font-size: 10px;">Kegiatan : Penyelenggaraan urusan Administrasi Kependudukan Provinsi</p>
                <p style="text-align: left; font-size: 10px; margin-bottom: 1px;"><br><br> DPA No : 00933/DPPA/2022 Tanggal 3 November 2022 </p>
            </td>
            <td width="35%" colspan="1" style="border-left: none; border-top: none; vertical-align: top;">
                <p style="text-align: center; font-size: 10px;">Semarang, &nbsp; &nbsp; &nbsp; Desember 2022<br>Yang berhak menerima,<br>Pembayaran</p>
                <p style="text-align: center; font-size: 10px; margin-bottom: 1px;"><br><u>Yoga Bramanditya, A.Md.Kom</u><br>NIP. 19980410 202012 1 005</p>
            </td>
            <td width="25%" style="border-top: none; vertical-align: top;">
                <P style="font-size: 10px; text-align: left;"> Yang menerima barang/ memeriksa </P>
            </td>
        </tr>

        <tr>
            <td width="25%" colspan="1" style="vertical-align: top;">
                <p style="text-align: center; font-size: 10px;">Bendahara Pengeluaran Pembantu</p>
                <p style="text-align: center; font-size: 10px; margin-bottom: 1px;"><br><u>HESTI LESTARIYANI, SE</u><br>NIP. 19710513 199203 2 008</p>
            </td>
            <td width="27%" colspan="1" style="vertical-align: top;">
                <p style="text-align: center; font-size: 10px;">Pejabat Pelaksana Teknis Kegiatan</p>
                <p style="text-align: center; font-size: 10px; margin-bottom: 1px;"><br><br><u>Drs. SUNARSO, MM</u><br>NIP. 19670719 199203 1 003</p>
            </td>
            <td width="23%" colspan="1" style="vertical-align: top;">
                <p style="text-align: center; font-size: 10px;">Pengguna Anggaran</p>
                <p style="text-align: center; font-size: 10px; margin-bottom: 1px;"><br><br><u>TRI HARSO WIDIRAHMANTO, SH</u><br>NIP. 19720924 199703 1 003</p>
            </td>
            <td width="25%" style="border-top: none; vertical-align: top;">
            </td>
        </tr>

    </table>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>