<?= $this->include('temp_homepage/header'); ?>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">History Pemesanan Tiket Wisata</h6>
        </div>
        <?php $count = 1; ?>
        <div class="row g-4">
            <?php foreach ($history as $ws) : ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden mt-3">
                        <div class="position-relative">
                            <img class="w-100" src="<?= base_url('img/wisata/' . $ws['gambar']) ?>" alt="Image" width="500px" height="300px">
                            <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">Rp <?= number_format($ws['total_bayar'], 0, ',', '.'); ?></small>
                            <small class="position-absolute end-0 top-100 translate-middle-y bg-dark text-white rounded py-1 px-3 ms-4"><?= date('d-m-Y', strtotime($ws['tgl_transaksi'])) ?></small>
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
                                <div class="text-box text-white <?= ($ws['status'] === 'Selesai') ? 'bg-primary' : 'bg-dark' ?>">
                                    <?= $ws['status'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $count++ ?>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?= $this->include('temp_homepage/footer'); ?>