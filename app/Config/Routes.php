<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Routes Untuk Admin Auth
$routes->get('/himatikadmin/login', 'Login::index');
$routes->post('/himatikadmin/login', 'Login::auth');
$routes->post('/himatikadmin/logout', 'Login::logout');
$routes->get('/himatikadmin/login/lupapassword', 'Login::lupapassword');

// Routes Untuk Admin
$routes->get('/himatik/index.php/himatikadmin/dashboard', 'Admins\AdminMain::index');
$routes->get('/himatikadmin', 'Admins\AdminMain::index');
$routes->get('/himatikadmin/dashboard', 'Admins\AdminMain::index'); 
$routes->get('/himatikadmin/admin', 'Admins\AdminMain::getAllAdmin');
$routes->get('/himatikadmin/pengurus', 'Admins\AdminMain::pengurus');
$routes->get('/himatikadmin/divisi', 'Admins\AdminMain::divisi');
$routes->get('/himatikadmin/proker', 'Admins\AdminMain::proker');
$routes->get('/himatikadmin/galeri', 'Admins\AdminMain::galeri');
$routes->get('/himatikadmin/artikel', 'Admins\AdminMain::artikel'); 
$routes->get('/himatikadmin/info', 'Admins\AdminMain::info'); 
$routes->get('/himatikadmin/pesan', 'Admins\AdminMain::pesan');

// Routes Untuk Admin => Tambah
$routes->get('/himatikadmin/admin/tambahadmin', 'Admins\AdminTambah::tambahAdmin');
// $routes->get('/himatikadmin/pengurus/tambahpengurus', 'AdminTambah::pengurus');
// $routes->get('/himatikadmin/proker/tambahproker', 'AdminTambah::proker');
// $routes->get('/himatikadmin/galeri/tambahgaleri', 'AdminTambah::galeri');
// $routes->get('/himatikadmin/artikel/tambahartikel', 'AdminTambah::artikel');
// $routes->get('/himatikadmin/info/tambahinfo', 'AdminTambah::info');

// Routes Untuk Admin => Edit
$routes->post('/himatikadmin/admin/editadmin/(:num)', 'Admins\AdminEdit::viewAdmin/$1');
$routes->get('/himatikadmin/admin/editadmin/(:num)', 'Admins\AdminEdit::viewAdmin/$1');
// $routes->get('/himatikadmin/pengurus/editpengurus/{id}', 'AdminEdit::pengurus');
// $routes->get('/himatikadmin/proker/editproker/{id}', 'AdminEdit::proker');
// $routes->get('/himatikadmin/galeri/editgaleri/{id}', 'AdminEdit::galeri');
// $routes->get('/himatikadmin/artikel/editartikel/{id}', 'AdminEdit::artikel');
// $routes->get('/himatikadmin/info/edditinfo/{id}', 'AdminEdit::info');

// Routes Untuk Admin => Detail
// $routes->get('/himatikadmin/pengurus/detailpengurus/{id}', 'AdminDetail::pengurus');
// $routes->get('/himatikadmin/galeri/detailgaleri/{id}', 'AdminDetail::galeri');
// $routes->get('/himatikadmin/artikel/detailartikel/{id}', 'AdminDetail::artikel');
// $routes->get('/himatikadmin/pesan/detailpesan/{id}', 'AdminDetail::pesan');

// Routes Untuk User 
$routes->get('/himatikuaa', 'UserMain::index');
