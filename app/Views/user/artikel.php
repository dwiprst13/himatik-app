<section class="w-[100%] mx-auto py-10 bg-gray-900">
    <div class="w-[95%] mx-auto md:w-[90%] bg-white rounded-2xl p-3 md:p-5 shadow-lg">
        <div>
            <h2 class="font-bold text-[1.6rem] md:text-[2rem] lg:text-[2.5rem] text-blue-700 my-5">Artikel</h2>
        </div>
        <h3>Himatik sekarang punya wadah untuk menyalurkan bakat bakat kalian dalam bidang menulis loh, jika ada karya kalian yang bisa kita unggah, silahkan kirimkan kepada kita</h3>
        <div class="container flex flex-wrap mx-auto space-y-3 md:space-y-0 md:px-4 my-5">
            <?php foreach ($latestArtikel as $artikel) : ?>
                <a href="/artikel/<?= $artikel->id_artikel ?>" class="w-[100%] md:w-[50%] mx-auto h-40 md:h-48 flex items-center md:p-2">
                    <div class="flex gap-3 border border-gray-900 h-full w-full p-2 rounded-xl">
                        <div class="flex items-center">
                            <div>
                                <h4 class="font-semibold text-[1rem] md:text-[1.1rem] lg:text-[1.2rem] text-black"><?= $artikel->judul ?></h4>
                                <div class="flex gap-3">
                                    <p class="text-[0.8rem] text-gray-500"><?= date('d F Y', strtotime($artikel->date)) ?></p>
                                    <p class="text-[0.8rem] text-gray-500">Oleh <?= $artikel->author ?></p>
                                </div>
                                <div class="md:flex hidden">
                                    <p class="text-[0.8rem] text-red-600"><?= substr($artikel->content, 0, 100) . '...' ?></p>
                                </div>
                                <div class="flex md:hidden">
                                    <p class="text-[0.8rem] text-red-600"><?= substr($artikel->content, 0, 80) . '...' ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="flex justify-center items-center my-3">
            <button onclick="window.location.href = '/artikel';" class="bg-blue-700 text-white font-bold py-2 px-5 rounded-lg">Lihat Artikel</button>
        </div>
    </div>
</section>