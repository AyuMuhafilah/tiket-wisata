<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('/') ?>" class="brand-link">
        <img src="<?= (isset($user['profile']) ? base_url('img/profile/' . $user['profile']) : base_url('img/profile/User_Default.png')) ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $nama ?></span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-header ml-2">MATER DATA</li>
                <?php if ($user['role'] == 'super_user') : ?>
                    <li class="nav-item ml-2">
                        <a href="<?= base_url('data_admin') ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p> Data Admin </p>
                        </a>
                    </li>
                    <li class="nav-item ml-2">
                        <a href="<?= base_url('wisata') ?>" class="nav-link">
                            <i class="nav-icon fas fa-image"></i>
                            <p> Data Wisata </p>
                        </a>
                    </li>
                <?php endif ?>
                <?php if ($user['role'] == 'admin') : ?>
                    <li class="nav-item ml-2">
                        <a href="<?= base_url('fasilitas') ?>" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p> Data Fasilitas </p>
                        </a>
                    </li>
                    <li class="nav-item ml-2">
                        <a href="<?= base_url('harga') ?>" class="nav-link">
                            <i class="nav-icon fas fa-columns"></i>
                            <p> Data Harga Tiket </p>
                        </a>
                    </li>
                    <li class="nav-header ml-2">TRANSAKSI</li>
                    <li class="nav-item ml-2">
                        <a href="<?= base_url('transaksi') ?>" class="nav-link">
                            <i class="nav-icon fas fa-money-check"></i>
                            <p>Validasi Pembayaran</p>
                        </a>
                    </li>
                    <li class="nav-item ml-2">
                        <a href="<?= base_url('transaksi/status') ?>" class="nav-link">
                            <i class="nav-icon far fa-chart-bar"></i>
                            <p>Status Pemesanan</p>
                        </a>
                    </li>
                <?php endif ?>
                <li class="nav-header ml-2">LAPORAN</li>
                <li class="nav-item ml-2">
                    <a href="<?= base_url('laporan/pengunjung') ?>" class="nav-link">
                        <i class="fas fa-file-pdf nav-icon"></i>
                        <p>Laporan Pengunjung</p>
                    </a>
                </li>
                <li class="nav-item ml-2">
                    <a href="<?= base_url('laporan/penjualan') ?>" class="nav-link">
                        <i class="fas fa-file-pdf nav-icon"></i>
                        <p>Laporan Penjualan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('logout') ?>" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>