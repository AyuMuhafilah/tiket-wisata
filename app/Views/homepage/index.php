<?= $this->include('temp_homepage/header'); ?>
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/1.jpg" alt="Image" width="1366px" height="768px">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <h1 class="section-title text-white text-uppercase mb-3 animated slideInDown">KUNINGAN</h1>
                    <h6 class="display-6 text-white animated slideInDown">Destinasi Impian</h6>
                    <h6 class="display-6 text-white animated slideInDown">Bagi Pencinta Alam</h6>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/2.png" alt="Image" width="1366px" height="768px">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <h1 class="section-title text-white text-uppercase mb-3 animated slideInDown">KUNINGAN</h1>
                    <h6 class="display-6 text-white animated slideInDown">Destinasi Impian</h6>
                    <h6 class="display-6 text-white animated slideInDown">Bagi Pencinta Alam</h6>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/3.png" alt="Image" width="1366px" height="768px">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <h1 class="section-title text-white text-uppercase mb-3 animated slideInDown">KUNINGAN</h1>
                    <h6 class="display-6 text-white animated slideInDown">Destinasi Impian</h6>
                    <h6 class="display-6 text-white animated slideInDown">Bagi Pencinta Alam</h6>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h6 class="section-title text-start text-primary text-uppercase">Selamat Datang</h6>
                <h1 class="mb-4">Di Kuningan</h1>
                <p class="mb-4">Kuningan adalah sebuah kota yang terletak di Provinsi Jawa Barat, Indonesia. Kota ini terkenal dengan sejarah dan budayanya yang sangat kaya. Kuningan dikenal sebagai salah satu kota yang
                    memiliki potensi wisata yang sangat besar, dengan objek wisata yang beragam dan menarik.
                    Kuningan juga terletak strategis, karena berada di tengah-tengah jalur pantai utara Jawa
                    dan jalur pantai selatan Jawa, sehingga membuat kota ini menjadi salah satu kota yang paling
                    mudah dijangkau di provinsi tersebut. Selain itu, kota ini juga terletak di dekat dengan kota-kota
                    lainnya seperti Cirebon, Majalengka, dan Tasikmalaya, sehingga membuat kota ini menjadi salah satu kota yang sangat strategis.</p>
                <div class="row g-3 pb-4">
                    <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="border rounded p-1">
                            <div class="border rounded text-center p-4">
                                <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                <h2 class="mb-1" data-toggle="counter-up">53</h2>
                                <p class="mb-0">Tempat Wisata</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                        <div class="border rounded p-1">
                            <div class="border rounded text-center p-4">
                                <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                <h2 class="mb-1" data-toggle="counter-up">150</h2>
                                <p class="mb-0">Admin Wisata</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="border rounded p-1">
                            <div class="border rounded text-center p-4">
                                <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                <h2 class="mb-1" data-toggle="counter-up">444</h2>
                                <p class="mb-0">Wisatawan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/curug putri.jpg" style="margin-top: 25%;" width="400px" height="400px">
                    </div>
                    <div class="col-6 text-start mt-5">
                        <img class="img-fluid rounded w-100 wow zoomIn mt-4" data-wow-delay="0.3s" src="img/linggarjati.jpg" width="400px" height="400px">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/curug bangkong.jpg">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/telaga biru.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Wisata Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Daftar Wisata</h6>
        </div>
        <?php $count = 1; ?>
        <div class="row g-4">
            <?php foreach ($wisata as $ws) : ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden mt-3">
                        <div class="position-relative">
                            <img class="w-100" src="<?= base_url('img/wisata/' . $ws['gambar']) ?>" alt="Image" width="500px" height="300px">
                            <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">Rp <?= number_format($ws['harga'], 0, ',', '.'); ?></small>
                        </div>
                        <div class="p-4 mt-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0"><?= $ws['nama_wisata'] ?></h5>
                                <div class="ps-2">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                </div>
                            </div>
                            <p class="text-body mb-3">
                                <td class="align-middle"><?= substr($ws['deskripsi'], 0, 100) . (strlen($ws['deskripsi']) > 100 ? '...' : '') ?></td>
                            </p>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" data-bs-toggle="modal" data-bs-target="#detail-tiket" data-id="<?= $ws['id_wisata'] ?>">Detail</a>
                                <?php if (isset($user)) : ?>
                                    <button type="button" class="btn btn-sm btn-dark rounded py-2 px-4" data-bs-toggle="modal" data-bs-target="#pesan-tiket" data-id="<?= $ws['id_wisata'] ?>">Pesan</button>
                                <?php else : ?>
                                    <a href="<?= base_url('login') ?>" class="btn btn-sm btn-dark rounded py-2 px-4">Pesan</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $count++ ?>
            <?php endforeach ?>
        </div>
    </div>
</div>
<div class="modal fade" id="pesan-tiket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan Tiket</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pesan-tiket') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tempat Wisata</label>
                        <input type="hidden" class="form-control" name="id_wisata" id="id_wisata">
                        <input type="hidden" class="form-control" name="id_wisatawan" value="<?= (isset($user)) ? $user['id_user'] : 0 ?>">
                        <input type="text" class="form-control" name="nama_wisata" id="nama_wisata" autocomplete="off" disabled>
                    </div>
                    <div id="ticket-container">
                        <div class="form-group">
                            <label>Jenis Tiket</label>
                            <input type="text" class="form-control" name="tiket_dewasa" value="Dewasa" disabled>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="hidden" class="form-control" id="harga_dewasa">
                            <input type="hidden" class="form-control" id="harga_anak">
                            <input type="hidden" class="form-control" name="id_dewasa" id="id_dewasa">
                            <input type="hidden" class="form-control" name="id_anak" id="id_anak">
                            <input type="number" class="form-control jumlah-tiket-dewasa" name="jml_dewasa" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Total Bayar</label>
                        <input type="text" class="form-control" name="total_bayar" id="total_bayar" autocomplete="off" required readonly>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label class="form-label">Bukti Bayar</label>
                            <input class="form-control form-control-sm" type="file" name="bukti_bayar" accept="image/*" onchange="validateImageFile(this)" required>
                            <p class="alert text-msg"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <div class="row col-sm-12">
                        <div class="col-sm-7">
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        </div>
                        <div class="col-sm-5">
                            <button type="button" id="add-ticket" class="btn btn-success text-white btn-sm">Tambah</button>
                            <button type="submit" class="btn btn-info text-white btn-sm float-end">Pesan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="detail-tiket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Wisata</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="text-center" id="detail_nama"></h5>
                <div class="text-center mt-4 mb-4">
                    <img src="" class="img-fluid" width="467px" id="detail_gambar">
                </div>
                <div id="detail_deskripsi">
                </div>
                <div class="row mt-3">
                    <div class="col-sm-8">
                        <h6 id="judul_fasilitas"></h6>
                        <div class="row" id="detail_fasilitas">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h6 id="judul_harga"></h6>
                        <table class="table table-bordered" id="detail_harga">
                            <thead>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row detail-bank" id="detail_bank">
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>
<script>
    $(function() {
        var addTicketEventAdded = false;

        $('#pesan-tiket').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');

            $.ajax({
                url: '<?= base_url('getWisata/') ?>' + id,
                method: 'GET',
                success: function(response) {
                    document.getElementById('id_wisata').value = response.id_wisata;
                    document.getElementById('nama_wisata').value = response.nama_wisata;
                    document.getElementById('harga_dewasa').value = response.harga['Dewasa'];
                    document.getElementById('harga_anak').value = response.harga['Anak - Anak'];
                    document.getElementById('id_dewasa').value = response.harga['idDewasa'];
                    document.getElementById('id_anak').value = response.harga['idAnak - Anak'];
                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch data:', error);
                }
            });

            if (!addTicketEventAdded) {
                $('#add-ticket').on('click', function() {
                    var newTicketGroup = `
                    <div class="form-group ticket-group">
                        <label>Jenis Tiket</label>
                        <input type="text" class="form-control" name="tiket_anak" value="Anak - Anak" disabled>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control jumlah-tiket-anak" name="jml_anak" autocomplete="off" required>
                    </div>
                `;

                    $('#ticket-container').append(newTicketGroup);
                    $(this).hide();
                });

                $(document).on('input', '.jumlah-tiket-dewasa, .jumlah-tiket-anak', function() {
                    var jumlahDewasa = parseFloat($('.jumlah-tiket-dewasa').val()) || 0;
                    var jumlahAnak = parseFloat($('.jumlah-tiket-anak').val()) || 0;
                    var hargaDewasa = parseFloat($('#harga_dewasa').val().replace(/,/g, '')) || 0;
                    var hargaAnak = parseFloat($('#harga_anak').val().replace(/,/g, '')) || 0;
                    var totalBayarDewasa = jumlahDewasa * hargaDewasa;
                    var totalBayarAnak = jumlahAnak * hargaAnak;

                    var totalBayar = totalBayarDewasa + totalBayarAnak;
                    document.getElementById('total_bayar').value = totalBayar.toLocaleString();
                });

                addTicketEventAdded = true;
            }
        });

        $('#pesan-tiket').on('hidden.bs.modal', function(event) {
            $(this).find('form')[0].reset();
            $('#ticket-container').find('.ticket-group').remove();
            $('#add-ticket').show();
        });

        $('#detail-tiket').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');

            $.ajax({
                url: '<?= base_url('getDetailWisata/') ?>' + id,
                method: 'GET',
                success: function(response) {
                    txtSrc = "<?= base_url('img/wisata/') ?>" + response.gambar;
                    document.getElementById('detail_nama').textContent = response.nama_wisata;
                    document.getElementById('detail_gambar').src = txtSrc;
                    document.getElementById('detail_deskripsi').textContent = response.deskripsi;
                    document.getElementById('judul_fasilitas').textContent = "Fasilitas";
                    document.getElementById('judul_harga').textContent = "Harga";

                    let fasilitasHtml = '';
                    response.fasilitas.forEach(function(fasilitas) {
                        fasilitasHtml += '<div class="col-sm-6">' +
                            '<div class="facility-box">' +
                            '<div class="color-box"></div>' +
                            '<div class="facility-text">' + fasilitas.nama_fasilitas + '</div>' +
                            '</div>' +
                            '</div>';
                    });
                    $('#detail_fasilitas').html(fasilitasHtml);

                    var hargaHtml = '<thead><tr><th>Jenis</th><th>Harga</th></tr></thead><tbody>';
                    response.harga.forEach(function(harga) {
                        hargaHtml += '<tr>';
                        hargaHtml += '<td>' + harga.jenis_tiket + '</td>';
                        hargaHtml += '<td>' + formatRupiah(harga.harga) + '</td>';
                        hargaHtml += '</tr>';
                    });
                    hargaHtml += '</tbody>';
                    $('#detail_harga').html(hargaHtml);

                    var bankHtml = '';
                    response.bank.forEach(function(bank) {
                        bankHtml += '<div class="col-sm-2 text-center">' +
                            '<img class="bank-img" src="<?= base_url('img/') ?>' + bank.nama_bank + '.png" width="120px" style="cursor: pointer;" data-norek="' + bank.no_rek + '" alt="' + bank.nama_bank + '">' +
                            '</div>';
                    });

                    $('#detail_bank').html(bankHtml);
                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch data:', error);
                }
            });
        });

        $('#detail_bank').on('click', '.bank-img', function() {
            var nomor = $(this).data('norek');
            navigator.clipboard.writeText(nomor)
                .then(function() {
                    showToast('success', 'Nomor Rekening berhasil disalin : ' + nomor);
                })
                .catch(function(err) {
                    showToast('error', 'Nomor Rekening gagal disalin : ' + nomor);
                });
        });
    });

    function validateImageFile(input) {
        const file = input.files[0];
        if (file) {
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            const maxSize = 2 * 1024 * 1024;
            const msg = document.querySelector('.alert');
            if (!allowedTypes.includes(file.type)) {
                msg.innerText = "Hanya file gambar dengan tipe JPG, JPEG, atau PNG yang diperbolehkan."
                input.value = '';
                return false;
            } else {
                msg.innerText = "";
            }
            if (file.size > maxSize) {
                msg.innerText = "Ukuran file tidak boleh melebihi 2 MB."
                input.value = '';
                return false;
            } else {
                msg.innerText = "";
            }
            return true;
        }
    }
</script>
<?= $this->endSection('js') ?>
<?= $this->include('temp_homepage/footer'); ?>