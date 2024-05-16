<?php

use CodeIgniter\Router\RouteCollection;

$routes->setAutoRoute(false);
/**
 * @var RouteCollection $routes
 */
// Routes Untuk Auth
$routes->get('/himatikadmin/login', 'LoginController::index');
$routes->post('/himatikadmin/login', 'LoginController::auth');
$routes->post('/himatikadmin/logout', 'LoginController::logout');
$routes->get('/himatikadmin/login/lupapassword', 'LoginController::lupapassword');

// Routes Untuk Dashboard
$routes->get('/himatikadmin', 'Admins\DashboardController::index');
$routes->get('/himatikadmin/dashboard', 'Admins\DashboardController::index');

// Routes Untuk Admin
$routes->get('/himatikadmin/pengaturan', 'Admins\PengaturanController::getAllPengaturan');
// $routes->get('/himatikadmin/pengaturan/tambahPengaturan', 'Admins\PengaturanController::tambahPengaturan');
$routes->post('/himatikadmin/pengaturan/tambahpengaturan', 'Admins\PengaturanController::simpanPengaturan');
$routes->get('/himatikadmin/pengaturan/editpengaturan/(:num)', 'Admins\PengaturanController::viewPengaturan/$1');
$routes->post('/himatikadmin/pengaturan/editpengaturan/(:num)', 'Admins\PengaturanController::updatePengaturan/$1');
$routes->get('/himatikadmin/pengaturan/deletepengaturan/(:num)', 'Admins\PengaturanController::deletePengaturan/$1');

// Routes Untuk Admin
$routes->get('/himatikadmin/admin', 'Admins\AdminController::getAllAdmin');
$routes->get('/himatikadmin/admin/tambahadmin', 'Admins\AdminController::tambahAdmin');
$routes->post('/himatikadmin/admin/tambahadmin', 'Admins\AdminController::simpanAdmin');
$routes->get('/himatikadmin/admin/editadmin/(:num)', 'Admins\AdminController::viewAdmin/$1');
$routes->post('/himatikadmin/admin/editadmin/(:num)', 'Admins\AdminController::updateAdmin/$1');
$routes->get('/himatikadmin/admin/deleteadmin/(:num)', 'Admins\AdminController::deleteAdmin/$1');

// Routes Untuk Pengurus
$routes->get('/himatikadmin/pengurus', 'Admins\PengurusController::getAllPengurus');
$routes->get('/himatikadmin/pengurus/tambahpengurus', 'Admins\PengurusController::tambahPengurus');
$routes->post('/himatikadmin/pengurus/tambahpengurus', 'Admins\PengurusController::simpanPengurus');
$routes->get('/himatikadmin/pengurus/editpengurus/(:num)', 'Admins\PengurusController::viewPengurus/$1');
$routes->post('/himatikadmin/pengurus/editpengurus', 'Admins\PengurusController::updatePengurus');
$routes->get('/himatikadmin/pengurus/deletepengurus/(:num)', 'Admins\PengurusController::deletePengurus/$1');

// Routes Untuk Galeri
$routes->get('/himatikadmin/galeri', 'Admins\GaleriController::getAllGaleri');
$routes->get('/himatikadmin/galeri/tambahgaleri', 'Admins\GaleriController::tambahGaleri');
$routes->post('/himatikadmin/galeri/tambahgaleri', 'Admins\GaleriController::simpanGaleri');
$routes->get('/himatikadmin/galeri/editgaleri/(:num)', 'Admins\GaleriController::viewGaleri/$1');
$routes->post('/himatikadmin/galeri/editgaleri', 'Admins\GaleriController::updateGaleri');
$routes->get('/himatikadmin/galeri/deletegaleri/(:num)', 'Admins\GaleriController::deleteGaleri/$1');

// Routes Untuk Artikel
$routes->get('/himatikadmin/artikel', 'Admins\ArtikelController::getAllArtikel');
$routes->get('/himatikadmin/artikel/tambahartikel', 'Admins\ArtikelController::tambahArtikel');
$routes->post('/himatikadmin/artikel/tambahartikel', 'Admins\ArtikelController::simpanArtikel');
$routes->get('/himatikadmin/artikel/detailartikel/(:num)', 'Admins\ArtikelController::detailArtikel/$1');
$routes->post('/himatikadmin/artikel/detailartikel/editstatus/(:num)', 'Admins\ArtikelController::editstatus/$1');
$routes->get('/himatikadmin/artikel/editartikel/(:num)', 'Admins\ArtikelController::viewArtikel/$1');
$routes->post('/himatikadmin/artikel/editartikel/(:num)', 'Admins\ArtikelController::updateArtikel/$1');
$routes->get('/himatikadmin/artikel/deleteartikel/(:num)', 'Admins\ArtikelController::deleteArtikel/$1');

// Routes Untuk Info
$routes->get('/himatikadmin/info', 'Admins\InfoController::getAllInfo');
$routes->get('/himatikadmin/info/tambahinfo', 'Admins\InfoController::tambahInfo');
$routes->post('/himatikadmin/info/tambahinfo', 'Admins\InfoController::simpanInfo');
$routes->get('/himatikadmin/info/editinfo/(:num)', 'Admins\InfoController::viewInfo/$1');
$routes->post('/himatikadmin/info/editinfo', 'Admins\InfoController::updateInfo');
$routes->get('/himatikadmin/info/editinfo', 'Admins\InfoController::updateInfo');
$routes->get('/himatikadmin/info/deleteinfo/(:num)', 'Admins\InfoController::deleteInfo/$1');

// Routes Untuk Gambar
$routes->get('/himatikadmin/artikel/gambar', 'Admins\GambarController::getAllGambar');
$routes->get('/himatikadmin/artikel/gambar/tambahgambar', 'Admins\GambarController::tambahGambar');
$routes->post('/himatikadmin/artikel/gambar/tambahgambar', 'Admins\GambarController::simpanGambar');
$routes->get('/himatikadmin/artikel/gambar/editgambar/(:num)', 'Admins\GambarController::viewGambar/$1');
$routes->post('/himatikadmin/artikel/gambar/editgambar', 'Admins\GambarController::updateGambar');
$routes->get('/himatikadmin/artikel/gambar/editgambar', 'Admins\GambarController::updateGambar');
$routes->get('/himatikadmin/artikel/gambar/deletegambar/(:num)', 'Admins\GambarController::deleteGambar/$1');

// Routes Untuk Proker
$routes->get('/himatikadmin/proker', 'Admins\ProkerController::getAllProker');
$routes->get('/himatikadmin/proker/tambahproker', 'Admins\ProkerController::tambahProker');
$routes->post('/himatikadmin/proker/tambahproker', 'Admins\ProkerController::simpanProker');
$routes->get('/himatikadmin/proker/editproker/(:num)', 'Admins\ProkerController::viewProker/$1');
$routes->post('/himatikadmin/proker/editproker', 'Admins\ProkerController::updateProker');
$routes->get('/himatikadmin/proker/editproker', 'Admins\ProkerController::updateProker');
$routes->get('/himatikadmin/proker/deleteproker/(:num)', 'Admins\ProkerController::deleteProker/$1');

// Routes Untuk User Auth
$routes->get('/login', 'LoginController::userLogin');
$routes->get('/login/lupapassword', 'LoginController::lupaPassword');
$routes->post('/login', 'LoginController::auth');
$routes->get('/register', 'Users\UserMain::register');
$routes->get('/registerUser', 'Users\UserMain::userRegister');
$routes->post('/logout', 'LoginController::logout');

// Routes Untuk User 
$routes->get('/login', 'LoginController::userLogin');
$routes->get('/login/lupapassword', 'LoginController::lupaPassword');
$routes->get('/register', 'Users\UserMain::register');
$routes->get('/', 'Users\UserMain::index');
$routes->get('/artikel', 'Users\UserMain::artikel');
$routes->post('/searchPost', 'Users\UserMain::searchPost');
$routes->get('/artikel/(:num)', 'Users\UserMain::detailArtikel/$1');
$routes->get('/galeri', 'Users\UserMain::galeri');
$routes->get('/kontak', 'Users\UserMain::kontak');
$routes->get('/ruanghimatik', 'Users\UserMain::ruangHimatik');

// Routes Untuk User Login
$routes->post('/postComent', 'Users\UserMain::postComent');
$routes->post('/postComent', 'Users\UserMain::postComent');
