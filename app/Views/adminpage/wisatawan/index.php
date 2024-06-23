<?= $this->include('temp_adminpage/header') ?>
<?= $this->include('temp_adminpage/sidebar') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Pengunjung</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Laporan Pengunjung</li>
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
                            <div class="row col-sm-5">
                                <div class="col-sm-8">
                                    <form action="<?= base_url('laporan/pengunjung') ?>" method="POST">
                                        <div class="form-group">
                                            <label>Pilih Tanggal</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="pilih-tanggal" name="tanggal" value="<?= (isset($tgl) ? $tgl : '') ?>">
                                                <button type="submit" class="btn btn-primary" name="cari"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Wisatawan</th>
                                        <th>No HP</th>
                                        <th>Email</th>
                                        <th>Tanggal Berkunjung</th>
                                        <th>Total Anggota</th>
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
                                        <th class="text-center"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->section('js') ?>
<script>
    $(function() {
        $('#pilih-tanggal').daterangepicker({
            locale: {
                format: 'DD-MM-YYYY'
            }
        });
        $("#datatable").DataTable();

    });
</script>
<?= $this->endsection('js') ?>
<?= $this->include('temp_adminpage/footer') ?>