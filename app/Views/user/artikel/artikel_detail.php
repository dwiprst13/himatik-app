<?php
$konten = $artikel['content'];
$konten = str_replace('<img src="../../uploads/gambar/', '<img class="h-60 mx-auto rounded-md object-cover my-5" src="/uploads/gambar/', $konten);
$konten = str_replace('<h2', '<h2 class="text-[1.7rem] font-bold"', $konten);
$konten = str_replace('<p>', '<p class="text-justify my-2"> ', $konten);
$konten = str_replace('width="300" height="168"', '', $konten);
$konten = str_replace('width="300" height="200"', '', $konten);
?>
<section class="bg-gray-900">
    <div class="relative w-[90%] mx-auto md:flex text-white">
        <div class="w-full md:w-[70%] p-2 pt-5 pb-10 rounded-lg">
            <div class="text-white flex gap-2 text-[0.8rem] md:text-[1rem]">
                <a href="/artikel">Artikel </a>
                <span> / </span>
                <p>Detail Artikel </p>
                <span> / </span>
                <p> <?= substr($artikel['judul'], 0, 15) . '...' ?></p>
            </div>
            <div class="px-3 py-3">
                <h1 class="text-center pt-3 text-[2rem] md:text-[2.5rem]"><b><?= $artikel['judul'] ?></b></h1>
                <div class="flex gap-2 text-[0.8rem] my-2">
                    <p>Ditulis Oleh <span class="text-blue-600"><?= $artikel['author'] ?></span></p>
                    <p> / </p>
                    <p> <?= $artikel['date'] ?></p>
                </div>
                <img src="/<?= $artikel['img'] ?>" alt="" class="h-60 mt-5 mx-auto object-cover">
                <p class="text-center text-sm pt-1 pb-5">Gambar <?= $artikel['judul'] ?></p>
                <p class="text-justify text-sm pt-3"><?= $konten ?></p>
            </div>
        </div>
        <div class="w-full md:w-[30%]">
            <h3>Artikel Lainnya</h3>
            <div class="bg-gray-300">

            </div>
        </div>
    </div>
</section>