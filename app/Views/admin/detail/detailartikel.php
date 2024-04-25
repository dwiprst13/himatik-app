<?php
$konten = $artikel['content'];
$konten = str_replace('<img src="../../uploads/gambar/', '<img class="h-60 mx-auto rounded-md object-cover my-5" src="/uploads/gambar/', $konten);
$konten = str_replace('<h2', '<h2 class="text-[1.7rem] font-bold"', $konten);
$konten = str_replace('<p>', '<p class="text-justify my-2"> ', $konten);
$konten = str_replace('width="300" height="168"', '', $konten);
$konten = str_replace('width="300" height="200"', '', $konten);
?>
<div class="ml-64 h-screen">
    <div class="p-4 flex">
        <h1 class="text-xl">
            Detail Artikel
        </h1>
    </div>
    <div class=" px-3 py-4 flex justify-between">
        <div>
            <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                <a href="/himatikadmin/artikel">Kembali</a>
            </button>
        </div>
    </div>
    <?php
    if (session()->getFlashdata('error')) {
    ?>
        <div class="">
            <div class="flex text-white justify-center rounded-md w-[70%] bg-red-400 px-3 py-1 text-sm font-semibold leading-6 shadow-sm mx-auto">
                <?php echo session()->getFlashdata('error') ?>
            </div>
        </div>
    <?php
    }
    ?>
    <?php
    if (session()->getFlashdata('success')) {
    ?>
        <div class="">
            <div class="flex text-white justify-center rounded-md w-[70%] bg-red-400 px-3 py-1 text-sm font-semibold leading-6 shadow-sm mx-auto">
                <?php echo session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php
    }
    ?>
    <section class="">
        <div class="w-[90%] mx-auto grid grid-cols-12">
            <div class="col-span-10 p-2 pt-5 pb-10 bg-white rounded-lg my-3">
                <div class="px-3 py-3">
                    <h1 class="text-center pt-3 text-[2.5rem]"><b><?= $artikel['judul'] ?></b></h1>
                    <img src="/<?= $artikel['img'] ?>" alt="" class="h-60 mt-5 mx-auto object-cover">
                    <p class="text-center text-sm pt-1 pb-5">Gambar <?= $artikel['judul'] ?></p>
                    <p class="text-justify text-sm pt-3"><?= $konten ?></p>
                </div>
            </div>
            <div class="col-span-2">
                <div class="h-64 flex flex-col justify-between p-2 pt-5">
                    <h2 class="text-center mt-8 font-bold">Tindakan</h2>
                    <form action="?page=artikel">
                        <button type="submit" class="mr-3 w-[100%] text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Kembali</button>
                    </form>
                    <form action="/himatikadmin/artikel/editartikel/<?= $artikel['id_artikel'] ?>" method="get">
                        <button type="submit" class="mr-3 w-[100%] text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
                    </form>
                    <form action="" method="post">
                        <input type="hidden" name="id_artikel" value=" ">
                        <button type="submit" name="unarsip" class="mr-3 w-[100%] text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Batal Arsip</button>
                    </form>
                    <form action="/himatikadmin/artikel/deleteartikel/<?= $artikel['id_artikel'] ?>" method="get" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
                        <input type="hidden" name="id_artikel" value=" ">
                        <button type="submit" name="hapus" class="mr-3 w-[100%] text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Hapus</button>
                    </form>
                </div>
                <div class="w-[90%] mx-auto justify-between space-y-2 text-[0.8rem] bg-white rounded-lg">
                    <p class=" rounded-lg">Author:</p>
                    <p class="w-full px-2 text-center bg-gray-400 rounded"><?= $artikel['author'] ?></p>
                    <p class=" rounded-lg">Status:
                        <p class="text-green-500w-full px-2 text-center text-white bg-green-600 rounded">Published</p>
                    </p>
                    <p class=" rounded-lg">Tag:</p>
                    <p class="w-full px-2 text-center bg-gray-400 rounded"><?= $artikel['tag'] ?></p>
                    <p class=" rounded-lg">Tanggal:</p>
                    <p class="w-full px-2 text-center bg-gray-400 rounded"><?= $artikel['date'] ?></p>
                    <p class=" rounded-lg">Diedit:</p>
                    <p class="w-full px-2 text-center bg-gray-400 rounded"><?= $artikel['edited'] ?></p>
                    <p class=" rounded-lg">Diedit Oleh:</p>
                    <p class="w-full px-2 text-center bg-gray-400 rounded"><?= $artikel['edited_by'] ?></p>
                </div>
            </div>
        </div>
    </section>
</div>