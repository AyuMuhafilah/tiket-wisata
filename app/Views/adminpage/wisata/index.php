<?= $this->include('temp_adminpage/header') ?>
<?= $this->include('temp_adminpage/sidebar') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Wisata</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Wisata</li>
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
                                <a href="<?= base_url('wisata/create') ?>" class="btn btn-block btn-primary btn-sm"><i class="fas fa-plus mr-2"></i>Tambah Data</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="datatable">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama Wisata</th>
                                            <th>Fasilitas</th>
                                            <th>Nama Admin</th>
                                            <th width="400px">Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($wisata as $row) : ?>
                                            <tr>
                                                <td class="text-center align-middle"><?= $no++ ?></td>
                                                <td class="align-middle"><?= $row['nama_wisata'] ?></td>
                                                <td>
                                                    <?php foreach ($row['fasilitas'] as $fas) : ?>
                                                        <ul>
                                                            <li><?= $fas['nama_fasilitas'] ?></li>
                                                        </ul>
                                                    <?php endforeach ?>
                                                </td>
                                                <td class="align-middle"><?= $row['nama'] ?></td>
                                                <td class="align-middle"><?= substr($row['deskripsi'], 0, 200) . (strlen($row['deskripsi']) > 200 ? '...' : '') ?></td>
                                                <td class="text-center align-middle">
                                                    <a href="<?= base_url('wisata/edit/' . $row['id_wisata']); ?>" class="btn  btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                                    <button class="btn  btn-danger btn-sm" title="Hapus" data-toggle="modal" data-target="#hapus-data" data-id="<?= $row['id_wisata'] ?>"><i class="fas fa-trash"></i></button>
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
<div class="modal fade" id="hapus-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="">Apakah Anda Yakin Data Wisata Akan Dihapus?</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('wisata/delete') ?>" method="POST" id="deleteForm">
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
        $('#hapus-data').on('shown.bs.modal', function(event) {
            var id = $(event.relatedTarget).data('id');
            document.getElementById('hapus_id').value = id;
        });
        $('#datatable').DataTable();
    });
</script>
<?= $this->endsection('js') ?>
<?= $this->include('temp_adminpage/footer') ?>