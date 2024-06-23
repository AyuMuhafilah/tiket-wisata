<?= $this->include('temp_adminpage/header') ?>
<?= $this->include('temp_adminpage/sidebar') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Harga Tiket</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Harga Tiket</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#tambah-data"><i class="fas fa-plus mr-2"></i>Tambah Data</button>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="datatable">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Jenis Tiket</th>
                                        <th>Harga</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($harga as $row) : ?>
                                        <tr class="text-center">
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['jenis_tiket'] ?></td>
                                            <td><?= $row['harga'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($row['tgl_mulai'])) ?></td>
                                            <td><?= date('d-m-Y', strtotime($row['tgl_selesai'])) ?></td>
                                            <td>
                                                <button class="btn  btn-warning btn-sm" title="Edit" data-toggle="modal" data-target="#edit-data" data-id="<?= $row['id_harga'] ?>" data-id_wisata="<?= $row['id_wisata'] ?>" data-harga="<?= $row['harga'] ?>" data-jenis="<?= $row['jenis_tiket'] ?>" data-mulai="<?= $row['tgl_mulai'] ?>" data-selesai="<?= $row['tgl_selesai'] ?>"><i class="fas fa-edit"></i></button></a>
                                                <button class="btn  btn-danger btn-sm" title="Hapus" data-toggle="modal" data-target="#hapus-data" data-id="<?= $row['id_harga'] ?>"><i class="fas fa-trash"></i></button></a>
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
    </section>
</div>

<div class="modal fade" id="hapus-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="">Apakah Anda Yakin Data Harga Tiket Akan Dihapus?</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('harga/delete') ?>" method="POST" id="deleteForm">
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
<div class="modal fade" id="tambah-data">
    <div class="modal-dialog sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Harga Tiket</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('harga/store') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Tiket</label>
                        <select name="jenis_tiket" class="form-control">
                            <option value="dewasa">Dewasa</option>
                            <option value="anak-anak">Anak - Anak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tanggal_mulai" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" class="form-control" name="tanggal_selesai" autocomplete="off" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Harga Tiket</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('harga/update') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Tiket</label>
                        <select name="jenis_tiket" class="form-control" id="edit_jenis">
                            <option value="dewasa">Dewasa</option>
                            <option value="anak-anak">Anak - Anak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="hidden" class="form-control" name="id_harga" id="edit_id">
                        <input type="hidden" class="form-control" name="id_wisata" id="edit_id_wisata">
                        <input type="number" class="form-control" name="harga" id="edit_harga" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tanggal_mulai" id="edit_mulai" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" class="form-control" name="tanggal_selesai" id="edit_selesai" autocomplete="off" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
        </div>
    </div>
</div>


<?= $this->section('js') ?>
<script>
    $(function() {
        $('#edit-data').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var id_wisata = button.data('id_wisata');
            var harga = button.data('harga');
            var jenis = button.data('jenis');
            var mulai = button.data('mulai');
            var selesai = button.data('selesai');

            document.getElementById('edit_id').value = id;
            document.getElementById('edit_id_wisata').value = id_wisata;
            document.getElementById('edit_harga').value = harga;
            document.getElementById('edit_jenis').value = jenis;
            document.getElementById('edit_mulai').value = mulai;
            document.getElementById('edit_selesai').value = selesai;
        });
        $('#hapus-data').on('shown.bs.modal', function(event) {
            var id = $(event.relatedTarget).data('id');
            document.getElementById('hapus_id').value = id;
        });
        $('#datatable').DataTable();
    });
</script>
<?= $this->endsection('js') ?>
<?= $this->include('temp_adminpage/footer') ?>