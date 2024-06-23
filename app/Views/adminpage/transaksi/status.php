<?= $this->include('temp_adminpage/header') ?>
<?= $this->include('temp_adminpage/sidebar') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Status Pemesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Status Pemesanan</li>
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
                            <table class="table table-bordered table-hover" id="datatable">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>ID Transaksi</th>
                                        <th>Nama Wisatawan</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Jumlah Tiket</th>
                                        <th>Total Bayar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
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
                                            <td class="text-center <?= ($row['status'] === 'Selesai') ? 'text-success' : 'text-danger' ?>"><?= $row['status'] ?></a></td>
                                            <td class="text-center">
                                                <button class="btn  btn-primary btn-sm" title="Detail" data-toggle="modal" data-target="#detail" data-id="<?= $row['id_transaksi'] ?>"><i class="fas fa-info"></i></button></a>
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
<div class="modal fade" id="detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Pemesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4 text-bold">Data Pemesan</div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-7"></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">ID Transaksi</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-7" id="id_transaksi"></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">Nama Wisatawan</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-7" id="nama"></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">No Hp</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-7" id="nohp"></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">Email</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-7" id="email"></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">Tanggal Transaksi</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-7" id="tgl"></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">Bukti Bayar</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-7">
                        <a href="" id="img-bukti" alt="Bukti Pembayaran" target="_blank">
                            <div id="bukti"></div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">Status</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-7 text-bold" id="status"></div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-4 text-bold">Detail Tiket</div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-7"></div>
                </div>
                <div id="detail-content">
                </div>
                <div class="row">
                    <div class="col-sm-4">Total Tiket</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-7" id="total_tiket"></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">Total Bayar</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-7 text-bold" id="total_bayar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>
<script>
    $(function() {
        $('#detail').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');

            $.ajax({
                url: '<?= base_url('getDetail/') ?>' + id,
                method: 'GET',
                success: function(response) {
                    document.getElementById('id_transaksi').innerHTML = response.transaksi.id_transaksi;
                    document.getElementById('nama').innerHTML = response.transaksi.nama;
                    document.getElementById('nohp').innerHTML = response.transaksi.no_hp;
                    document.getElementById('email').innerHTML = response.transaksi.email;
                    document.getElementById('status').innerHTML = response.transaksi.status;
                    document.getElementById('bukti').innerHTML = response.transaksi.bukti_bayar;
                    var textsrc = "<?= base_url('img/bukti/') ?>";
                    document.getElementById("img-bukti").href = textsrc + response.transaksi.bukti_bayar;

                    var date = new Date(response.transaksi.tgl_transaksi);
                    document.getElementById('tgl').innerHTML =
                        String(date.getDate()).padStart(2, '0') + '-' +
                        String(date.getMonth() + 1).padStart(2, '0') + '-' +
                        date.getFullYear();

                    document.getElementById('total_tiket').innerHTML = response.transaksi.total_tiket;
                    document.getElementById('total_bayar').innerHTML = formatRupiah(response.transaksi.total_bayar);

                    var detailContent = document.getElementById('detail-content');
                    detailContent.innerHTML = '';
                    response.detail.forEach(item => {
                        var row = document.createElement('div');
                        row.className = 'row';

                        var labels = ['Jenis', ':', item.jenis_tiket, 'Jumlah', ':', item.jumlah_tiket, 'Harga', ':', formatRupiah(item.harga)];
                        var colSizes = [4, 1, 7, 4, 1, 7, 4, 1, 7];

                        labels.forEach((text, index) => {
                            var col = document.createElement('div');
                            col.className = `col-sm-${colSizes[index]}`;
                            col.textContent = text;
                            row.appendChild(col);
                        });

                        detailContent.appendChild(row);
                    });

                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch data:', error);
                }
            });
        });
        $('#datatable').DataTable();
    });
</script>
<?= $this->endsection('js') ?>
<?= $this->include('temp_adminpage/footer') ?>