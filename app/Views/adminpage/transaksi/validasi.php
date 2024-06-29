<?= $this->include('temp_adminpage/header') ?>
<?= $this->include('temp_adminpage/sidebar') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Validasi Pembayaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Validasi Pembayaran</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title text-bold">Data Pemesanan </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="datatable">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>ID Transaksi</th>
                                            <th>Nama Wisatawan</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Jumlah Tiket</th>
                                            <th>Total Bayar</th>
                                            <th>Bukti Bayar</th>
                                            <th width="50">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($transaksi as $row) : ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td class="text-center"><?= $row['id_transaksi'] ?></td>
                                                <td><?= $row['nama'] ?></td>
                                                <td class="text-center"><?= date('d-m-Y', strtotime($row['tgl_transaksi'])) ?></td>
                                                <td class="text-center"><?= $row['total_tiket'] ?></td>
                                                <td class="text-center">Rp. <?= number_format($row['total_bayar'], 0, '.', '.') ?></td>
                                                <td class="text-center"><a href="<?= base_url('img/bukti/' . $row['bukti_bayar']) ?>" target="_blank"><?= $row['bukti_bayar'] ?></a></td>
                                                <td class="text-center">
                                                    <button class="btn  btn-success btn-sm" title="Validasi" data-toggle="modal" data-target="#terima-data" data-id="<?= $row['id_transaksi'] ?>"><i class="fas fa-check"></i></button></a>
                                                    <button class="btn  btn-danger btn-sm" title="Tolak" data-toggle="modal" data-target="#hapus-data" data-id="<?= $row['id_transaksi'] ?>"><i class="fas fa-times"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="terima-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="">Apakah Anda Yakin Pemesanan Akan <b>Diterima?</b></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('transaksi/terima') ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="id" id="terima_id">
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary btn-sm">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="hapus-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="">Apakah Anda Yakin Pemesanan Akan <b>Ditolak?</b></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('transaksi/tolak') ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="id" id="hapus_id">
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary btn-sm">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->section('js') ?>
<script>
    $(function() {
        setModalId('#terima-data', 'terima_id');
        setModalId('#hapus-data', 'hapus_id');

        function setModalId(modalId, inputId) {
            $(modalId).on('shown.bs.modal', function(event) {
                var id = $(event.relatedTarget).data('id');
                document.getElementById(inputId).value = id;
            });
        }

        $('#datatable').DataTable();
    });
</script>
<?= $this->endsection('js') ?>
<?= $this->include('temp_adminpage/footer') ?>