        <section class="w-[100%] mx-auto ">
            <div class="container flex flex-wrap mx-auto px-4 py-16 gap-3">
                <?php foreach ($latestGaleri as $galeri) : ?>
                    <form action="galeri/editgaleri/<?= $galeri->id_galeri ?>" class="w-[calc(25%-12px)] bg-gray-300 rounded-lg ">
                        <button class="w-full flex flex-col space-y-1.5 p-2 justify-center items-center">
                            <h1 class=""><b><?= $galeri->judul ?></b></h1>
                            <div class="bg-black h-40 w-full flex justify-center items-center overflow-hidden">
                                <img src="/<?= $galeri->img ?>" alt="" class="w-auto h-auto max-h-full">
                            </div>
                            <p class="line-clamp-1"><?= $galeri->deskripsi ?></p>
                        </button>
                    </form>
                <?php endforeach; ?>

            </div>
        </section>