<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Routes Untuk Admin
$routes->get('/himatik/index.php/himatikadmin/dashboard', 'AdminMain::index');
$routes->get('/himatikadmin', 'AdminMain::index');
$routes->get('/himatikadmin/login', 'LoginController::index');  
$routes->post('/himatikadmin/login', 'LoginController::login'); 
$routes->get('/himatikadmin/dashboard', 'AdminMain::index'); 
$routes->get('/himatikadmin/admin', 'AdminMain::admin');
$routes->get('/himatikadmin/pengurus', 'AdminMain::pengurus');
$routes->get('/himatikadmin/divisi', 'AdminMain::divisi');
$routes->get('/himatikadmin/proker', 'AdminMain::proker');
$routes->get('/himatikadmin/galeri', 'AdminMain::galeri');
$routes->get('/himatikadmin/artikel', 'AdminMain::artikel'); 
$routes->get('/himatikadmin/info', 'AdminMain::info'); 
$routes->get('/himatikadmin/pesan', 'AdminMain::pesan');

// Routes Untuk Admin => Tambah
$routes->get('/himatikadmin/admin/tambahadmin', 'AdminTambah::admin');
$routes->get('/himatikadmin/pengurus/tambahpengurus', 'AdminTambah::pengurus');
$routes->get('/himatikadmin/proker/tambahproker', 'AdminTambah::proker');
$routes->get('/himatikadmin/galeri/tambahgaleri', 'AdminTambah::galeri');
$routes->get('/himatikadmin/artikel/tambahartikel', 'AdminTambah::artikel');
$routes->get('/himatikadmin/info/tambahinfo', 'AdminTambah::info');

// Routes Untuk Admin => Edit
$routes->get('/himatikadmin/admin/editadmin/{id}', 'AdminEdit::admin');
$routes->get('/himatikadmin/pengurus/editpengurus/{id}', 'AdminEdit::pengurus');
$routes->get('/himatikadmin/proker/editproker/{id}', 'AdminEdit::proker');
$routes->get('/himatikadmin/galeri/editgaleri/{id}', 'AdminEdit::galeri');
$routes->get('/himatikadmin/artikel/editartikel/{id}', 'AdminEdit::artikel');
$routes->get('/himatikadmin/info/edditinfo/{id}', 'AdminEdit::info');

// Routes Untuk Admin => Detail
$routes->get('/himatikadmin/pengurus/detailpengurus/{id}', 'AdminDetail::pengurus');
$routes->get('/himatikadmin/galeri/detailgaleri/{id}', 'AdminDetail::galeri');
$routes->get('/himatikadmin/artikel/detailartikel/{id}', 'AdminDetail::artikel');
$routes->get('/himatikadmin/pesan/detailpesan/{id}', 'AdminDetail::pesan');

// Routes Untuk User 
$routes->get('/himatikuaa', 'UserMain::index');
