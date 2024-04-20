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
$routes->post('/himatikadmin/pengurus/editpengurus/(:num)', 'Admins\PengurusController::updatePengurus/$1');
$routes->get('/himatikadmin/pengurus/deletepengurus/(:num)', 'Admins\PengurusController::deletePengurus/$1');

// Routes Untuk Galeri
$routes->get('/himatikadmin/galeri', 'Admins\GaleriController::getAllGaleri');
$routes->get('/himatikadmin/galeri/tambahgaleri', 'Admins\GaleriController::tambahGaleri');
$routes->post('/himatikadmin/galeri/tambahgaleri', 'Admins\GaleriController::simpanGaleri');
$routes->get('/himatikadmin/galeri/editgaleri/(:num)', 'Admins\GaleriController::viewGaleri/$1');
$routes->post('/himatikadmin/galeri/editgaleri/(:num)', 'Admins\GaleriController::updateGaleri/$1');
$routes->get('/himatikadmin/galeri/deletegaleri/(:num)', 'Admins\GaleriController::deleteGaleri/$1');

$routes->get('/himatikadmin/divisi', 'Admins\AdminMain::divisi');
$routes->get('/himatikadmin/proker', 'Admins\AdminMain::proker');
$routes->get('/himatikadmin/info', 'Admins\AdminMain::info'); 
$routes->get('/himatikadmin/pesan', 'Admins\AdminMain::pesan');

// Routes Untuk Artikel
$routes->get('/himatikadmin/artikel', 'Admins\ArtikelController::getAllArtikel'); 
$routes->get('/himatikadmin/artikel/tambahartikel', 'Admins\ArtikelController::tambahArtikel');
$routes->post('/himatikadmin/artikel/tambahartikel', 'Admins\ArtikelController::simpanArtikel');
$routes->get('/himatikadmin/artikel/detailartikel/(:num)', 'Admins\ArtikelController::detailArtikel/$1');
$routes->post('/himatikadmin/artikel/detailartikel/editstatus/(:num)', 'Admins\ArtikelController::editstatus/$1');
$routes->get('/himatikadmin/artikel/editartikel/(:num)', 'Admins\ArtikelController::viewArtikel/$1');
$routes->post('/himatikadmin/artikel/editartikel/(:num)', 'Admins\ArtikelController::updateArtikel/$1');
$routes->get('/himatikadmin/artikel/deleteartikel/(:num)', 'Admins\ArtikelController::deleteArtikel/$1');
// $routes->get('/himatikadmin/proker/tambahproker', 'AdminTambah::proker');
// $routes->get('/himatikadmin/galeri/tambahgaleri', 'AdminTambah::galeri');
// $routes->get('/himatikadmin/artikel/tambahartikel', 'AdminTambah::artikel');
// $routes->get('/himatikadmin/info/tambahinfo', 'AdminTambah::info');

// Routes Untuk Admin => Edit
// $routes->post('/himatikadmin/admin/editadmin', 'Admins\AdminEdit::updateAdmin');
// $routes->post('/himatikadmin/pengurus/editpengurus', 'Admins\PengurusController::updatePengurus');
// $routes->get('/himatikadmin/pengurus/editpengurus/{id}', 'AdminEdit::pengurus');
// $routes->get('/himatikadmin/proker/editproker/{id}', 'AdminEdit::proker');
// $routes->get('/himatikadmin/galeri/editgaleri/{id}', 'AdminEdit::galeri');
// $routes->get('/himatikadmin/artikel/editartikel/{id}', 'AdminEdit::artikel');
// $routes->get('/himatikadmin/info/edditinfo/{id}', 'AdminEdit::info');

// Routes Untuk Admin => Detail

// Routes Untuk Admin => Detail
// $routes->get('/himatikadmin/pengurus/detailpengurus/{id}', 'AdminDetail::pengurus');
// $routes->get('/himatikadmin/galeri/detailgaleri/{id}', 'AdminDetail::galeri');
// $routes->get('/himatikadmin/artikel/detailartikel/{id}', 'AdminDetail::artikel');
// $routes->get('/himatikadmin/pesan/detailpesan/{id}', 'AdminDetail::pesan');

// Routes Untuk User 
$routes->get('/himatikuaa', 'UserMain::index');
