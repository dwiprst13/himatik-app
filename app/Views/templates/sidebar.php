<?php
$uri = service('uri');
$uripath = $uri->getPath();
$removed_path = str_replace("himatik/index.php", "", $uripath);
$path = trim($removed_path, '/');
$session = session();
$nama_admin = $session->get('nama_admin');
$isLoggedIn = $session->get('logged_in');

?>
<div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover">
        <span class="text-lg font-bold text-white ml-3">HimatikAdmin</span>
    </a>
    <ul class="mt-4">
        <li class="mb-2 group">
            <a href="/himatikadmin/dashboard" class="flex items-center py-2 px-4 rounded-md <?= ($path == 'himatikadmin/dashboard' ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-500 hover:text-gray-100 ') ?>">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Dashboard</span>
            </a>
        </li>
        <li class="mb-2 group ">
            <a href="/himatikadmin/admin" class="flex items-center py-2 px-4 rounded-md <?= ($path == 'himatikadmin/admin' ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-500 hover:text-gray-100 ') ?>">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Admin</span>
            </a>
        </li>
        <li class="mb-2 group">
            <a href="/himatikadmin/pengurus" class="flex items-center py-2 px-4 text-gray-300 rounded-md <?= ($path == 'himatikadmin/pengurus' ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-500 hover:text-gray-100 ') ?>">
                <i class="ri-settings-2-line mr-3 text-lg"></i>
                <span class="text-sm">Pengurus</span>
            </a>
        </li>
        <li class="mb-2 group ">
            <a href="/himatikadmin/divisi" class="flex items-center py-2 px-4 text-gray-300 rounded-md <?= ($path == 'himatikadmin/divisi' ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-500 hover:text-gray-100 ') ?>">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Divisi</span>
            </a>
        </li>
        <li class="mb-2 group ">
            <a href="/himatikadmin/artikel" class="flex items-center py-2 px-4 text-gray-300 rounded-md <?= ($path == 'himatikadmin/artikel' ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-500 hover:text-gray-100 ') ?>">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Artikel</span>
            </a>
        </li>
        <li class="mb-2 group ">
            <a href="/himatikadmin/galeri" class="flex items-center py-2 px-4 text-gray-300 rounded-md  <?= ($path == 'himatikadmin/galeri' ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-500 hover:text-gray-100 ') ?>">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Galeri</span>
            </a>
        </li>
        <li class="mb-2 group ">
            <a href="/himatikadmin/info" class="flex items-center py-2 px-4 text-gray-300 rounded-md <?= ($path == 'himatikadmin/info' ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-500 hover:text-gray-100 ') ?>">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Info</span>
            </a>
        </li>
        <li class="mb-2 group">
            <a href="/himatikadmin/pesan" class="flex items-center py-2 px-4 text-gray-300 rounded-md <?= ($path == 'himatikadmin/pesan' ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-500 hover:text-gray-100 ') ?>">
                <i class="ri-settings-2-line mr-3 text-lg"></i>
                <span class="text-sm">Pesan</span>
            </a>
        </li>
    </ul>
    <div>
        <form action="/himatikadmin/logout" method="post" class="logout-form py-16">
            <p class="text-white py-2">Halo, <?php echo $nama_admin ?></p>
            <button class="w-full bg-red-600 p-1 rounded-md text-white my-2" type="submit">Logout</button>
        </form>
    </div>
</div>
<script>
    const logoutForm = document.querySelector('.logout-form'); 
    logoutForm.addEventListener('submit', function(event) {
        if (!confirm('Apakah Anda yakin ingin logout?')) {
            event.preventDefault();
        }
    });
</script>