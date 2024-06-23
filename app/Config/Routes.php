<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::homepage');
$routes->get('login', 'Login::index');
$routes->post('login', 'Login::login');
$routes->get('register', 'Login::register');
$routes->post('register/store', 'Login::register_store');
$routes->get('logout', 'Login::logout');
$routes->get('dashboard', 'Home::adminpage', ['filter' => 'otentifikasi']);

// Fasilitas
$routes->get('fasilitas', 'Fasilitas::index', ['filter' => 'otentifikasi']);
$routes->post('fasilitas/store', 'Fasilitas::store', ['filter' => 'otentifikasi']);
$routes->post('fasilitas/update/', 'Fasilitas::update', ['filter' => 'otentifikasi']);
$routes->post('fasilitas/delete/', 'Fasilitas::delete', ['filter' => 'otentifikasi']);

// Admin
$routes->get('data_admin', 'Admin::index', ['filter' => 'otentifikasi']);
$routes->post('data_admin/store', 'Admin::store', ['filter' => 'otentifikasi']);
$routes->post('data_admin/delete', 'Admin::delete', ['filter' => 'otentifikasi']);
$routes->get('getAdmin', 'Admin::getAdmin', ['filter' => 'otentifikasi']);
$routes->post('admin/delete/', 'Admin::delete', ['filter' => 'otentifikasi']);


// Wisata
$routes->get('wisata', 'Wisata::index', ['filter' => 'otentifikasi']);
$routes->get('wisata/create', 'Wisata::create', ['filter' => 'otentifikasi']);
$routes->post('wisata/store', 'Wisata::store', ['filter' => 'otentifikasi']);
$routes->get('wisata/edit/(:num)', 'Wisata::edit/$1)', ['filter' => 'otentifikasi']);
$routes->post('wisata/update', 'Wisata::update', ['filter' => 'otentifikasi']);
$routes->post('wisata/delete', 'Wisata::delete', ['filter' => 'otentifikasi']);
$routes->get('getWisata/(:num)', 'Wisata::getWisataById/$1');
$routes->post('pesan-tiket', 'Wisata::pesan', ['filter' => 'otentifikasi']);

// Harga
$routes->get('harga', 'Harga::index', ['filter' => 'otentifikasi']);
$routes->post('harga/store', 'Harga::store', ['filter' => 'otentifikasi']);
$routes->post('harga/update/', 'Harga::update', ['filter' => 'otentifikasi']);
$routes->post('harga/delete/', 'Harga::delete', ['filter' => 'otentifikasi']);

// Transaksi
$routes->get('transaksi', 'Transaksi::index', ['filter' => 'otentifikasi']);
$routes->post('transaksi/tolak', 'Transaksi::tolak', ['filter' => 'otentifikasi']);
$routes->post('transaksi/terima', 'Transaksi::terima', ['filter' => 'otentifikasi']);
$routes->get('transaksi/status', 'Transaksi::status', ['filter' => 'otentifikasi']);
$routes->get('getDetail/(:any)', 'Transaksi::detail/$1', ['filter' => 'otentifikasi']);

// Laporan
$routes->get('laporan/pengunjung', 'Wisatawan::index', ['filter' => 'otentifikasi']);
$routes->post('laporan/pengunjung', 'Wisatawan::index', ['filter' => 'otentifikasi']);
$routes->post('laporan/pengunjung/pdf', 'Wisatawan::pdfPengunjung', ['filter' => 'otentifikasi']);
$routes->get('laporan/penjualan', 'Transaksi::laporan', ['filter' => 'otentifikasi']);
$routes->post('laporan/penjualan', 'Transaksi::laporan', ['filter' => 'otentifikasi']);
$routes->post('laporan/penjualan/pdf', 'Transaksi::pdfPenjualan', ['filter' => 'otentifikasi']);
