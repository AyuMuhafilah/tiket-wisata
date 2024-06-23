<?= $this->include('temp_adminpage/header') ?>
<?= $this->include('temp_adminpage/sidebar') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Admin</li>
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
                            <h3 class="card-title text-bold">Form Data Admin</h3>
                        </div>
                        <form action="<?= base_url('data_admin/store') ?>" method="POST">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="hidden" name="id_user" id="id_user">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= old('nama') ?>" autofocus autocomplete="off">
                                        </div>
                                        <?= (isset($errors['nama'])) ? "<p class=error-message>$errors[nama]</p>" : '' ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>No Hp</label>
                                            <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No Hp" value="<?= old('no_hp') ?>" autocomplete="off">
                                        </div>
                                        <?= (isset($errors['no_hp'])) ? "<p class=error-message>$errors[no_hp]</p>" : '' ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= old('email') ?>" autofocus autocomplete="off">
                                        </div>
                                        <?= (isset($errors['email'])) ? "<p class=error-message>$errors[email]</p>" : '' ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="alamat" id="alamat" class="form-control"><?= old('alamat') ?></textarea>
                                        </div>
                                        <?= (isset($errors['alamat'])) ? "<p class=error-message>$errors[alamat]</p>" : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
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
                            <h3 class="card-title text-bold">Data Admin </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="datatable">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No Hp</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Profile</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($admin as $row) : ?>
                                            <tr onclick="tampilkan(<?= $row['id_user'] ?>);">
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?= $row['nama'] ?></td>
                                                <td><?= $row['no_hp'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['alamat'] ?></td>
                                                <td class="text-center"><img src="<?= (isset($user['profile']) ? base_url('img/profile/' . $user['profile']) : base_url('img/profile/User_Default.png')) ?>" class="user-circle"></td>
                                                <td class="text-center">
                                                    <button class="btn  btn-danger btn-sm" title="Hapus" data-toggle="modal" data-target="#hapus-data" data-id="<?= $row['id_user'] ?>"><i class="fas fa-trash"></i></button></a>
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
                <p class="">Apakah Anda Yakin Data Admin Akan Dihapus?</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/delete') ?>" method="POST" id="deleteForm">
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

    function tampilkan(id_user) {
        $.ajax({
            url: "<?= base_url('getAdmin') ?>",
            method: 'GET',
            data: {
                id_user: id_user
            },
            success: function(response) {
                var userData = $('#userData');
                $("#id_user").val(response.id_user);
                $("#nama").val(response.nama);
                $("#no_hp").val(response.no_hp);
                $("#email").val(response.email);
                $("#alamat").val(response.alamat);
            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    }
</script>
<?= $this->endsection('js') ?>
<?= $this->include('temp_adminpage/footer') ?>