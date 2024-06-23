<?= $this->include('temp_adminpage/header') ?>
<?= $this->include('temp_adminpage/sidebar') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Fasilitas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Fasilitas</li>
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
                                        <th>Nama Fasilitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($fasilitas as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $row['nama_fasilitas'] ?></td>
                                            <td class="text-center">
                                                <button class="btn  btn-warning btn-sm" title="Edit" data-toggle="modal" data-target="#edit-data" data-id="<?= $row['id_fasilitas'] ?>" data-nama="<?= $row['nama_fasilitas'] ?>"><i class="fas fa-edit"></i></button></a>
                                                <button class="btn  btn-danger btn-sm" title="Hapus" data-toggle="modal" data-target="#hapus-data" data-id="<?= $row['id_fasilitas'] ?>"><i class="fas fa-trash"></i></button></a>
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

<div class="modal fade" id="tambah-data">
    <div class="modal-dialog sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Fasilitas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('fasilitas/store') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Fasilitas</label>
                        <input type="text" class="form-control" id="nama_fasilitas" name="nama_fasilitas" autocomplete="off" autofocus>
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
                <h4 class="modal-title">Edit Fasilitas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('fasilitas/update') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Fasilitas</label>
                        <input type="hidden" name="id_fasilitas" id="edit_id">
                        <input type="text" class="form-control" id="edit_nama" name="nama_fasilitas" autocomplete="off" autofocus>
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
<div class="modal fade" id="hapus-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="">Apakah Anda Yakin Data Fasilitas Akan Dihapus?</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('fasilitas/delete') ?>" method="POST" id="deleteForm">
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
        $('#tambah-data').on('shown.bs.modal', function() {
            $('#nama_fasilitas').focus();
        });
        $('#edit-data').on('shown.bs.modal', function(event) {
            var id = $(event.relatedTarget).data('id');
            var nama = $(event.relatedTarget).data('nama');
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nama').value = nama;
        });
        $('#hapus-data').on('shown.bs.modal', function(event) {
            var id = $(event.relatedTarget).data('id');
            document.getElementById('hapus_id').value = id;
        });
        $('#datatable').DataTable({
            // responsive: true
        });
    });
</script>
<?= $this->endsection('js') ?>
<?= $this->include('temp_adminpage/footer') ?>