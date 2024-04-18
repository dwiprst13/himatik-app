<?php
$session = session();
$nama_admin = $session->get('nama_admin');
$isLoggedIn = $session->get('logged_in');
?>

<body>
    <div class="ml-64 h-screen">
        <div class="gap-5 px-10 py-16 text-white space-y-6">
            <div class="flex flex-wrap w-full ">
                <a href="/himatikadmin/admin" class="w-3/12 px-2 py-4">
                    <div class="h-32 bg-blue-500 w-full rounded-lg p-3">
                        <h2 class="text-center text-[1.5rem] w-full bg-white text-black rounded-md">Admin</h2>
                        <p class="text-center text-[2.8rem]"><?= $totalAdmin; ?></p>
                    </div>
                </a>
                <a href="/himatikadmin/pengurus" class=" w-3/12 px-2 py-4">
                    <div class=" h-32 bg-orange-500 w-full rounded-lg p-3">
                        <h2 class="text-center text-[1.5rem] w-full bg-white text-black rounded-md">Pengurus</h2>
                        <p class="text-center text-[2.8rem]"><?= $totalPengurus; ?></p>
                    </div>
                </a>
                <a href="/himatikadmin/pengurus" class=" w-3/12 px-2 py-4">
                    <div class=" h-32 bg-amber-500 w-full rounded-lg p-3">
                        <h2 class="text-center text-[1.5rem] w-full bg-white text-black rounded-md">Divisi</h2>
                        <p class="text-center text-[2.8rem]"><?= $totalPengurus; ?></p>
                    </div>
                </a>
                <a href="" class="w-3/12 px-2 py-4">
                    <div class="h-32 bg-yellow-500 w-full rounded-lg p-3">
                        <h2 class="text-center text-[1.5rem] w-full bg-white text-black rounded-md">Galeri</h2>
                        <p class="text-center text-[2.8rem]"><?= $totalGaleri; ?></p>
                    </div>
                </a>
                <a href="" class="w-3/12 px-2 py-4 ">
                    <div class="h-32 bg-green-500 w-full rounded-lg p-3">
                        <h2 class="text-center text-[1.5rem] w-full bg-white text-black rounded-md">Artikel</h2>
                        <p class="text-center text-[2.8rem]"><?= $totalPengurus; ?></p>
                    </div>
                </a>
                <a href="" class="w-3/12 px-2 py-4 ">
                    <div class="h-32 bg-gray-500 w-full rounded-lg p-3">
                        <h2 class="text-center text-[1.5rem] w-full bg-white text-black rounded-md">Proker</h2>
                        <p class="text-center text-[2.8rem]"></p>
                    </div>
                </a>
                <a href="" class="w-3/12 px-2 py-4 ">
                    <div class="h-32 bg-purple-500 w-full rounded-lg p-3">
                        <h2 class="text-center text-[1.5rem] w-full bg-white text-black rounded-md">Info</h2>
                        <p class="text-center text-[2.8rem]"></p>
                    </div>
                </a>
                <a href="" class="w-3/12 px-2 py-4 ">
                    <div class="h-32 bg-red-500 w-full rounded-lg p-3">
                        <h2 class="text-center text-[1.5rem] w-full bg-white text-black rounded-md">Pesan</h2>
                        <p class="text-center text-[2.8rem]"></p>
                    </div>
                </a>
            </div>
            <div class="bg-gray-200 rounded-md p-3 text-black">
                <h2 class="text-[1.5rem] text-center">Selamat Datang, <span class="font-semibold"><?= $nama_admin; ?></span></h2>
                <p class="text-[1.2rem] text-center">Saat ini anda sedang mengakses halaman admin dari website HIMATIK Universitas Alma Ata</p>
            </div>
        </div>
    </div>
</body>