<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            padding: 1cm 2cm 1cm 2cm;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        hr {
            margin-bottom: 1cm;
        }
    </style>
</head>

<body>
    <h2 class="text-center">Laporan Penjualan Tiket</h2>
    <h2 class="text-center">Wisata <?= $admin['nama_wisata'] ?></h2>
    <hr>
    <p>Berikut adalah Laporan Penjualan dari <?= date('d-m-Y', strtotime($mulai)) . ' sampai ' . date('d-m-Y', strtotime($selesai)) ?></p>
    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">ID Transaksi</th>
                <th class="text-center">Tanggal Transaksi</th>
                <th class="text-center">Jumlah Tiket</th>
                <th class="text-center">Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($transaksi as $row) : ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= $row['id_transaksi'] ?></td>
                    <td class="text-center"><?= date('d-m-Y', strtotime($row['tgl_transaksi'])) ?></td>
                    <td class="text-center"><?= $row['total_tiket'] ?></td>
                    <td class="text-right"><?= number_format($row['total_bayar'], 0, '.', '.') ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th class="text-right" colspan="3">Total</th>
                <th class="text-center"><?= $total_tiket ?></th>
                <th class="text-right">Rp. <?= number_format($total, 0, '.', '.') ?></th>
            </tr>
        </tfoot>
    </table>
</body>

</html>