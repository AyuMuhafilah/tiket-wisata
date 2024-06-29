<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>E-Tiket</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            padding: 1cm 2cm 1cm 2cm;
            margin: 0;
        }

        .box {
            padding: 0.5cm;
            margin-bottom: 1cm;
            border: 1px solid black;
            page-break-inside: avoid;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border: none;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php for ($i = 0; $i < $transaksi['Dewasa']; $i++) : ?>
        <div class="box">
            <table>
                <tr>
                    <td colspan="3">
                        <h1 class="text-center"><?= $transaksi['nama_wisata'] ?> <br>
                            <hr>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td width="150px">ID TRANSAKSI</td>
                    <td colspan="2">: <?= $transaksi['id_transaksi'] ?></td>
                </tr>
                <tr>
                    <td>TGL BERKUNJUNG</td>
                    <td colspan="2">: <?= date('d-m-Y', strtotime($transaksi['tgl_transaksi'])) ?></td>
                </tr>
                <tr>
                    <td>JENIS TIKET</td>
                    <td colspan="2">: Dewasa</td>
                </tr>
                <tr>
                    <td colspan="3" class="text text-right">Rp. <?= number_format($transaksi['harga_Dewasa'], 0, '.', '.') ?></td>
                </tr>
            </table>
        </div>
    <?php endfor; ?>
    <?php if (isset($transaksi['Anak - Anak'])) : ?>
        <?php for ($i = 0; $i < $transaksi['Anak - Anak']; $i++) : ?>
            <div class="box">
                <table>
                    <tr>
                        <td colspan="3">
                            <h1 class="text-center"><?= $transaksi['nama_wisata'] ?> <br>
                                <hr>
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td width="150px">ID TRANSAKSI</td>
                        <td colspan="2">: <?= $transaksi['id_transaksi'] ?></td>
                    </tr>
                    <tr>
                        <td>TGL BERKUNJUNG</td>
                        <td colspan="2">: <?= date('d-m-Y', strtotime($transaksi['tgl_transaksi'])) ?></td>
                    </tr>
                    <tr>
                        <td>JENIS TIKET</td>
                        <td colspan="2">: Anak - Anak</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text text-right">Rp. <?= number_format($transaksi['harga_Anak - Anak'], 0, '.', '.') ?></td>
                    </tr>
                </table>
            </div>
        <?php endfor; ?>
    <?php endif ?>
</body>

</html>