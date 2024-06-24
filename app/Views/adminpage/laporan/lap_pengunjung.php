<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Pengunjung</title>
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
    <h2 class="text-center">Laporan Pengunjung</h2>
    <h2 class="text-center">Wisata <?= $nama_wisata ?></h2>
    <hr>
    <p>Berikut adalah Laporan Pengunjung dari <?= date('d-m-Y', strtotime($mulai)) . ' sampai ' . date('d-m-Y', strtotime($selesai)) ?></p>
    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Wisatawan</th>
                <th class="text-center">No HP</th>
                <th class="text-center">Email</th>
                <th class="text-center">Tanggal Berkunjung</th>
                <th class="text-center">Total Anggota</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($pengunjung as $row) : ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['no_hp'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td class="text-center"><?= date('d-m-Y', strtotime($row['tgl_transaksi'])) ?></td>
                    <td class="text-center"><?= $row['total_tiket'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th class="text-right" colspan="5">Total Pengunjung</th>
                <th class="text-center"><?= $total ?></th>
            </tr>
        </tfoot>
    </table>
</body>

</html>