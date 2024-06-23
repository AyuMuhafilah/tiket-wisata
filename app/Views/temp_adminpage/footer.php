<footer class="main-footer">
    <strong class="text-center">Copyright &copy; <a href="https://www.instagram.com/ayymhflh10/">Ayu Muhafilah</a> TINFC 2022 02</strong>
</footer>
</div>



<script src="<?= base_url('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('admin/dist/js/pages/dashboard.js') ?>"></script>
<script src="<?= base_url('admin/dist/js/adminlte.js') ?>"></script>
<script src="<?= base_url('admin/plugins/toastr/toastr.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('admin/dist/js/global.js') ?>"></script>
<script src="<?= base_url('admin/plugins/select2/js/select2.full.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?= base_url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>

<script>
    <?php if (session()->has('toast')) : ?>
        var toastData = <?= json_encode(session()->getFlashdata('toast')) ?>;
        showToast(toastData.icon, toastData.title);
    <?php endif; ?>

    function formatRupiah(angka, prefix) {
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