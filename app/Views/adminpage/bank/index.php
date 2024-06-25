<?= $this->include('temp_adminpage/header') ?>
<?= $this->include('temp_adminpage/sidebar') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Bank</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Bank</li>
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
                                        <th>Nama Bank</th>
                                        <th>Nomor Rekening</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($bank as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $row['nama_bank'] ?></td>
                                            <td><?= $row['no_rek'] ?></td>
                                            <td class="text-center">
                                                <button class="btn  btn-warning btn-sm" title="Edit" data-toggle="modal" data-target="#edit-data" data-id="<?= $row['id_bank'] ?>" data-nama="<?= $row['nama_bank'] ?>" data-norek="<?= $row['no_rek'] ?>"><i class="fas fa-edit"></i></button></a>
                                                <button class="btn  btn-danger btn-sm" title="Hapus" data-toggle="modal" data-target="#hapus-data" data-id="<?= $row['id_bank'] ?>"><i class="fas fa-trash"></i></button></a>
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
                <h4 class="modal-title">Tambah Bank</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('bank/store') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Bank</label>
                        <select name="nama_bank" class="form-control">
                            <option value="BRI">BRI</option>
                            <option value="BNI">BNI</option>
                            <option value="BCA">BCA</option>
                            <option value="BSI">BSI</option>
                            <option value="MANDIRI">MANDIRI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input type="text" name="no_rek" class="form-control" autocomplete="off">
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
                <h4 class="modal-title">Edit Bank</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('bank/update') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Bank</label>
                        <input type="hidden" name="id_bank" id="edit_id">
                        <select name="nama_bank" class="form-control" id="edit_nama">
                            <option value="BRI">BRI</option>
                            <option value="BNI">BNI</option>
                            <option value="BCA">BCA</option>
                            <option value="BSI">BSI</option>
                            <option value="MANDIRI">MANDIRI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input type="text" name="no_rek" id="edit_norek" class="form-control" autocomplete="off">
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
                <p class="">Apakah Anda Yakin Data Bank Akan Dihapus?</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('bank/delete') ?>" method="POST" id="deleteForm">
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
        $('#edit-data').on('shown.bs.modal', function(event) {
            var id = $(event.relatedTarget).data('id');
            var nama = $(event.relatedTarget).data('nama');
            var norek = $(event.relatedTarget).data('norek');
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_norek').value = norek;
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