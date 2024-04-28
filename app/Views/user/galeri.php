<section class="w-[100%] mx-auto ">
    <div class="w-[95%] mx-auto md:w-[90%] bg-white rounded-2xl p-3 md:p-5 shadow-lg">
        <div>
            <h2 class="font-bold text-[1.6rem] md:text-[2rem] lg:text-[2.5rem] text-blue-700">Galeri</h2>
        </div>
        <div class="container flex flex-wrap mx-auto px-4">
            <?php foreach ($latestGaleri as $galeri) : ?>
                <form action="galeri/editgaleri/<?= $galeri->id_galeri ?>" class="w-[100%] sm:w-[50%] md:w-[33.3333%] xl:w-[25%] rounded-lg p-2">
                    <button class="w-full bg-white rounded-lg shadow-lg flex flex-col space-y-1.5 p-2 justify-center items-center">
                        <h1 class=""><b><?= $galeri->judul ?></b></h1>
                        <div class="bg-black h-48 w-full flex justify-center items-center overflow-hidden">
                            <img src="/<?= $galeri->img ?>" alt="" class="object-cover w-full h-full">
                        </div>
                        <p class="line-clamp-1"><?= $galeri->deskripsi ?></p>
                    </button>
                </form>
            <?php endforeach; ?>
        </div>
        <div class="flex justify-center my-3">
            <button class="bg-blue-700 hover:bg-blue-800 text-white rounded-md p-2">Selengkapnya</button>
        </div>
    </div>
</section>