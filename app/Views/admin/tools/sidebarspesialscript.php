<?php
$uri = service('uri');
$uripath = $uri->getPath();
$removed_path = str_replace("himatik/index.php", "", $uripath);
$path = trim($removed_path, '/');
$session = session();
$nama_admin = $session->get('nama_admin');
$role = $session->get('role');
$isLoggedIn = $session->get('logged_in');
?>