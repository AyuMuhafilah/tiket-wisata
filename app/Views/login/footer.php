</div>
<script src="<?= base_url('admin/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('admin/dist/js/adminlte.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/toastr/toastr.min.js') ?>"></script>
<script src="<?= base_url('admin/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('admin/dist/js/global.js') ?>"></script>

<script>
    <?php if (session()->has('toast')) : ?>
        var toastData = <?= json_encode(session()->getFlashdata('toast')) ?>;
        showToast(toastData.icon, toastData.title);
    <?php endif; ?>
</script>
</body>

</html>