<section class="min-h-screen bg-gray-900">
    <div class="text-center text-white py-5">
        <h2 class="text-[2rem] font-bold">Artikel Terbaru Kami</h2>
        <p>Wadah bagi anggota HIMATIK UAA untuk saling berbagi ilmu berkaitan dengan dunia IT</p>
        <div class="w-5/6 md:w-1/2 lg:w-1/3 mx-auto my-5">
            <form action="<?= base_url('artikel') ?>" method="get" class="flex">
                <input name="searchPost" type="text" autocomplete="off" placeholder="Cari Postingan..." class="bg-slate-200 text-gray-900 placeholder:text-gray-600 w-[80%] focus:outline-none rounded-l-lg" value="<?= session()->getFlashdata('searchPost') ?>">
                <button type="submit" class="w-[20%] bg-blue-500 text-white focus:outline-none rounded-r-lg">Cari</button>
            </form>
        </div>
    </div>
    <div class="container mx-auto px-4 py-5 space-y-2 pb-16">
        <?php
        if (empty($allArtikel)) {
            echo '<div class="w-[100%] md:w-[65%] mx-auto text-center text-white text-[1.8rem]">Artikel dengan topik "' . esc($searchPost) . '" tidak ada.</div>';
        } else {
            $lastKey = count($allArtikel) - 1;
            foreach ($allArtikel as $key => $artikel) :
        ?>
                <a href="/artikel/<?= $artikel['id_artikel'] ?>" class="w-[100%] md:w-[65%] mx-auto h-36 md:h-48 flex items-center">
                    <div class="h-full p-2 flex flex-col md:flex-row items-center rounded-lg ">
                        <div class="w-full flex flex-col items-center gap-3">
                            <div class="w-full">
                                <div class="flex gap-2 text-white text-[0.8rem]">
                                    <?php
                                    $tags = explode(' ', $artikel['tag']);
                                    foreach ($tags as $tag) {
                                        if (strpos($tag, '#') === 0) {
                                            $tag = substr($tag, 1);
                                            echo '<p class="bg-green-600 rounded-full px-2">' . $tag . '</p>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="space-y-2">
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
                        </div>
                        <div class="md:hidden flex text-white">
                            <p class="text-[0.8rem]"><?= substr($artikel['content'], 0, 75) . '...' ?></p>
                        </div>
                    </div>
                </a>
        <?php if ($key !== $lastKey) {
                    echo '<hr class="w-[100%] md:w-[65%] mx-auto">';
                }
            endforeach;
        }
        ?>
    </div>
</section>