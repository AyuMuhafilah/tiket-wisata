<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SafeToTrip</title>

    <link rel="icon" type="image/png" href="<?= base_url('img/favicon-310x310.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('admin/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <link rel="stylesheet" href=<?= base_url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>>
    <link rel="stylesheet" href="<?= base_url('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/plugins/toastr/toastr.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/plugins/daterangepicker/daterangepicker.css') ?>">
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <script src="<?= base_url('admin/plugins/jquery/jquery.min.js') ?>"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <?php if ($user['role'] === 'admin') : ?>
                        <a href="<?= base_url('/') ?>" class="nav-link">Wisata <?= $admin['nama_wisata'] ?></a>
                    <?php endif ?>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>