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
                        <li class="breadcrumb-item"><a href="<?= base_url('wisata') ?>">Data Wisata</a></li>
                        <li class="breadcrumb-item active">Edit Data Wisata</li>
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
                            <h3 class="card-title text-bold">Form Edit Data Wisata</h3>
                        </div>
                        <form action="<?= base_url('wisata/update') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Wisata</label>
                                            <input type="hidden" name="id_wisata" value="<?= $val['id_wisata'] ?>">
                                            <input type="text" class="form-control" name="nama_wisata" placeholder="Masukkan Nama Wisata" value="<?= $val['nama_wisata'] ?>" required autofocus autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Admin</label>
                                            <select name="id_admin" class="form-control select2" required>
                                                <option selected disabled>-- Pilih Admin --</option>
                                                <?php foreach ($admin as $row) : ?>
                                                    <option value="<?= $row['id_user'] ?>" <?= ($val['id_admin'] == $row['id_user']) ? 'selected' : '' ?>><?= $row['nama'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Gambar</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="gambar">
                                                    <label class=" custom-file-label" for="exampleInputFile"><?= $val['gambar'] ? $val['gambar'] : 'Choose file'; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" required><?= $val['deskripsi'] ?></textarea>
                                        </div>
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
</div>
<?= $this->section('js') ?>
<script>
    $(function() {
        bsCustomFileInput.init();
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    });
</script>
<?= $this->endsection('js') ?>
<?= $this->include('temp_adminpage/footer') ?>