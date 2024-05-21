<section class="bg-gray-900">
    <div class="text-center text-white py-5">
        <h2 class="text-[2rem] font-bold">Galeri</h2>
        <p>Kumpulan dokumentasi kegiatan HIMATIK UAA</p>
    </div>
    <div class="container flex flex-wrap mx-auto px-4 pt-5 pb-16">
        <?php foreach ($allGaleri as $galeri) : ?>
            <div action="galeri/editgaleri/<?= $galeri['id_galeri'] ?>" class="w-[100%] sm:w-[50%] md:w-[33.3333%] xl:w-[25%] rounded-lg p-2">
                <div class="w-full bg-white rounded-lg shadow-lg flex flex-col space-y-1.5 p-2 justify-center items-center">
                    <h1 class=""><b><?= $galeri['judul'] ?></b></h1>
                    <div class="bg-black w-full flex justify-center items-center overflow-hidden aspect-w-6 aspect-h-4 min-h-48">
                        <img src="/<?= $galeri['img'] ?>" alt="" class="object-cover">
                    </div>
                    <p class=" line-clamp-1"><?= $galeri['deskripsi'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>