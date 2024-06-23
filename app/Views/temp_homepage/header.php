<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SafeToTrip</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" type="image/png" href="<?= base_url('img/favicon-310x310.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('admin/plugins/fontawesome-free/css/all.min.css') ?>">
    <link href="<?= base_url("home/css/bootstrap.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("home/css/style.css") ?>" rel="stylesheet">
    <link href="<?= base_url("style.css") ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('admin/plugins/toastr/toastr.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <script src="<?= base_url('admin/plugins/jquery/jquery.min.js') ?>"></script>
</head>

<body>
    <div class="bg-white p-0" <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
            <div class="col-lg-3 bg-dark d-none d-lg-block">
                <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                    <h1 class="m-0 text-primary text-uppercase">SafeToTrip</h1>
                </a>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto p-2">
                        </div>
                        <?php if (isset($user)) : ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?= (isset($user['profile']) ? base_url('img/profile/' . $user['profile']) : base_url('img/profile/User_Default.png')) ?>" class="user-circle me-2 mb-1" style="width: 30px; height: 30px; border-radius: 50%;"> <?= $nama ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?= base_url('profile') ?>">Profile</a>
                                    <?php if ($user['role'] === 'admin') : ?>
                                        <a class="dropdown-item" href="<?= base_url('/dashboard') ?>">Halaman Admin</a>
                                    <?php endif ?>
                                    <a class="dropdown-item" href="<?= base_url('settings') ?>">History Pemesanan</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
                                </div>
                            </div>
                        <?php else : ?>
                            <a href="<?= base_url('login') ?>" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
                        <?php endif ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>