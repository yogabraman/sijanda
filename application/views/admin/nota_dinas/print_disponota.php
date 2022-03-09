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
            border: 1px solid #444;
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
            margin: 0.8rem 0 0 1rem;
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

        .lbr-dispo {
            font-weight: bold;
            margin: 0 10px 0 0;
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
    <?php foreach ($nota as $rows) { ?>

        <div class="lbr-dispo" style="text-align:right"> Lembar Disposisi</div>

        <table border="1" width="100%">
            <tbody>
                <tr>
                    <td class="tgh" id="lbr" colspan="5">
                        <div class="disp">
                            <img class="logodisp" src="<?php echo base_url(); ?>assets/img/jateng.png" />
                            <span id="nama" style="margin-bottom: -10px;">
                                PEMERINTAH PROVINSI JAWA TENGAH<br>
                                <p style="margin-top: -5px;">DINAS PEMBERDAYAAN MASYARAKAT, DESA,</p>
                                <p style="margin-top: -20px">KEPENDUDUKAN DAN PENCATATAN SIPIL</p>
                            </span>
                            <p id="alamat" style="margin-top: -15px;">
                                Jl. Menteri Supeno No.17 TELP. (024) 88311621 FAX.8318492 SEMARANG 50243</p>
                            <p id="alamat" style="margin-top: -15px">Email : dispermadesdukcapil@jatengprov.go.id</p>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="tgh" id="lbr" colspan="5"><strong>Disposisi Nota Dinas</strong></td>
                </tr>

                <?php if ($tipe == 0) { ?>
                    <tr>
                        <td id="right" style="font-size: 13px; padding-left: 10px"><strong>Nomor Surat Masuk</strong></td>
                        <td id="left" colspan="4" style="font-size: 13px; padding-left: 10px">: <?= $rows->no_surat ?></td>
                    </tr>
                    <tr>
                        <td id="right" style="font-size: 13px; padding-left: 10px"><strong>Tanggal Surat</strong></td>
                        <td id="left" colspan="4" style="font-size: 13px; padding-left: 10px">: <?= tgl_indo($rows->tgl_surat) ?></td>
                    </tr>
                    <tr>
                        <td id="right" style="font-size: 13px; padding-left: 10px"><strong>Nomor Pencatat Kendali</strong></td>
                        <td id="left" colspan="4" style="font-size: 13px; padding-left: 10px">: <?= $rows->no_agenda ?></td>
                    </tr>
                    <tr>
                        <td id="right" style="font-size: 13px; padding-left: 10px"><strong>Dari</strong></td>
                        <td id="left" colspan="4" style="font-size: 13px; padding-left: 10px">: <?= $rows->asal_surat ?></td>
                    </tr>
                    <tr>
                        <td id="right" style="font-size: 13px; padding-left: 10px"><strong>Perihal</strong></td>
                        <td id="left" colspan="4" style="font-size: 13px; padding-left: 10px">: <?= $rows->perihal ?></td>
                    </tr>

                <?php } else { ?>
                    <tr>
                        <td id="right" style="font-size: 13px; padding-left: 10px"><strong>Perihal</strong></td>
                        <td id="left" colspan="4" style="font-size: 13px; padding-left: 10px">: <?= $rows->perihal ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>

        <div style="margin-top:50px" class="separator"></div>
        <div class="jarak2"> Arahan Kepala Dinas :</div>

    <?php } ?>
</body>

</html>