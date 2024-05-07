<section class="min-h-screen bg-gray-900">
    <div class="container flex flex-wrap mx-auto px-4 py-5">
        <?php foreach ($allArtikel as $artikel) : ?>
            <a href="/artikel/<?= $artikel['id_artikel'] ?>" class="w-[100%] md:w-[50%] p-2 h-48 flex items-center">
                <div class="h-full p-2 border flex items-center border-gray-700 rounded-lg bg-gray-600">
                    <div>
                        <div class="flex gap-3">
                            <img src="/<?= $artikel['img'] ?> " alt="<?= $artikel['judul'] ?>" class="w-[40%] object-contain">
                            <div class="flex items-center">
                                <div>
                                    <h4 class="font-semibold text-[1rem] md:text-[1.1rem] lg:text-[1.2rem] text-black"><?= $artikel['judul'] ?></h4>
                                    <div class="flex gap-3">
                                        <p class="text-[0.8rem] text-white"><?= date('d F Y', strtotime($artikel['date'])) ?></p>
                                        <p class="text-[0.8rem] text-blue-600">Oleh <?= $artikel['author'] ?></p>
                                    </div>
                                    <div class="md:flex hidden">
                                        <p class="text-[0.8rem] text-red-600"><?= substr($artikel['content'], 0, 100) . '...' ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:hidden flex">
                            <p class="text-[0.8rem] text-red-600"><?= substr($artikel['content'], 0, 150) . '...' ?></p>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>