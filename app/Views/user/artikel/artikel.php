<section class="min-h-screen bg-gray-900">
    <div class="text-center text-white py-5">
        <h2 class="text-[2rem] font-bold">Artikel Terbaru Kami</h2>
        <p>Wadah bagi anggota HIMATIK UAA untuk saling berbagi ilmu berkaitan dengan dunia IT</p>
        <div class="w-5/6 md:w-1/2 lg:w-1/3 mx-auto my-5">
            <form action="searchPost" class="flex">
                <input type="text" placeholder="Cari Postingan..." class="bg-slate-200 text-gray-900 placeholder:text-gray-600 w-[80%] focus:outline-none rounded-l-lg">
                <button class="w-[20%] bg-blue-500 text-white focus:outline-none rounded-r-lg">Cari</button>
            </form>
        </div>
    </div>
    <div class="container mx-auto px-4 py-5 space-y-2 pb-16">
        <?php
        $lastKey = count($allArtikel) - 1;
        foreach ($allArtikel as $key => $artikel) :
        ?>
            <a href="/artikel/<?= $artikel['id_artikel'] ?>" class="w-[100%] md:w-[65%] mx-auto h-36 md:h-48 flex items-center">
                <div class="h-full p-2 flex flex-col md:flex-row items-center rounded-lg ">
                    <div class="w-full flex items-center gap-3">
                        <div class="space-y-3 w-full">
                            <h4 class="font-semibold text-[1rem] md:text-[1.1rem] lg:text-[1.2rem] text-white"><?= $artikel['judul'] ?></h4>
                            <div class="flex gap-3">
                                <p class="text-[0.8rem] text-white"><?= date('d F Y', strtotime($artikel['date'])) ?></p>
                                <p class="text-[0.8rem] text-blue-600">Oleh <?= $artikel['author'] ?></p>
                            </div>
                            <div class="md:flex hidden text-white">
                                <p class="text-[0.8rem]"><?= substr($artikel['content'], 0, 150) . '...' ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="md:hidden flex text-white">
                        <p class="text-[0.8rem]"><?= substr($artikel['content'], 0, 75) . '...' ?></p>
                    </div>
                </div>
            </a>
        <?php if ($key !== $lastKey) {
                echo '<hr  class="w-[100%] md:w-[65%] mx-auto">';
            }
        endforeach;
        ?>
    </div>
</section>