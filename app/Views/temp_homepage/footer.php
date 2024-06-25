<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer wow fadeIn mt-5" data-wow-delay="0.1s">
    <div class="container pb-5">
        <div class="row g-5">
            <div class="col-md-2">
                <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
            </div>
            <div class="col-md-3">
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kuningan Jawa Barat</p>
            </div>
            <div class="col-md-2">
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>(0232)-871142</p>
            </div>
            <div class="col-md-3">
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@kuningankab.go.id</p>
            </div>
            <div class="col-md-2">
                <div class="d-flex">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>
</div>
<script src="<?= base_url('home/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url("home/js/main.js") ?>"></script>
<script src="<?= base_url('admin/plugins/toastr/toastr.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('admin/dist/js/global.js') ?>"></script>

<script>
    <?php if (session()->has('toast')) : ?>
        var toastData = <?= json_encode(session()->getFlashdata('toast')) ?>;
        showToast(toastData.icon, toastData.title);
    <?php endif; ?>

    function formatRupiah(angka) {
        var numberString = angka.toString(),
            sisa = numberString.length % 3,
            rupiah = numberString.substr(0, sisa),
            ribuan = numberString.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            var separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return 'Rp. ' + rupiah;
    }
</script>
<?= $this->renderSection('js') ?>
</body>

</html>