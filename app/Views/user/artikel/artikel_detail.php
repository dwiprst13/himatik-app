<?php
$konten = $artikel['content'];
$konten = str_replace('<img src="../../uploads/gambar/', '<img class="h-60 mx-auto rounded-md object-cover my-5" src="/uploads/gambar/', $konten);
$konten = str_replace('<h2', '<h2 class="text-[1.7rem] font-bold"', $konten);
$konten = str_replace('<p>', '<p class="text-justify my-2"> ', $konten);
$konten = str_replace('width="300" height="168"', '', $konten);
$konten = str_replace('width="300" height="200"', '', $konten);
$konten = str_replace('<ul>', '<table class="pl-3">', $konten);
$konten = str_replace('</ul>', '</table>', $konten);
$konten = str_replace('<li>', '<tr class="flex gap-4"><td class="font-semibold">-</td><td>', $konten);
$konten = str_replace('</li>', '</td></tr>', $konten);
?>

<main class="bg-gray-900">
    <section class="w-[100%] md:w-[85%] lg:w-[75%] flex flex-col mx-auto md:flex-row justify-center text-white">
        <div class="md:w-[70%] p-2 pt-5 pb-10 rounded-lg ">
            <div class="text-white flex gap-2 text-[0.8rem] md:text-[1rem]">
                <a href="/artikel">Artikel </a>
                <span> / </span>
                <p>Detail Artikel </p>
                <span> / </span>
                <p> <?= substr($artikel['judul'], 0, 15) . '...' ?></p>
            </div>
            <article class="px-3 py-3">
                <h1 class="text-center pt-3 text-[2rem] md:text-[2.5rem]"><b><?= $artikel['judul'] ?></b></h1>
                <div class="block md:flex text-[0.8rem] my-2 space-x-0 md:space-x-2">
                    <div class="flex gap-2">
                        <p>Ditulis Oleh <span class="text-blue-600"><?= $artikel['author'] ?></span></p>
                        <p> / </p>
                        <p> <?= $artikel['date'] ?></p>
                    </div>
                    <p class="hidden md:block">/</p>
                    <div class="flex gap-2 text-white">
                        <p>Keywords:</p>
                        <?php
                        $tags = explode(' ', $artikel['tag']);
                        foreach ($tags as $tag) {
                            if (strpos($tag, '#') === 0) {
                                $tag = substr($tag, 1);
                                echo '<p>' . $tag . '</p>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <img src="/<?= $artikel['img'] ?>" alt="" class="h-60 md:h-72 lg:h-80 mt-5 mx-auto object-cover">
                <p class="text-center text-gray-400 text-sm pt-1 pb-5">Gambar <?= $artikel['judul'] ?></p>
                <p class="text-justify text-sm pt-3"><?= $konten ?></p>
            </article>
        </div>
        <div class="md:w-[30%] md:pt-20 px-5">
            <?php
            $relatedTags = '';
            $skipFirstTag = true;
            foreach ($tags as $tag) {
                if ($skipFirstTag) {
                    $skipFirstTag = false;
                    continue;
                }

                if (strpos($tag, '#') === 0) {
                    $tag = substr($tag, 1);
                    $relatedTags .= $tag;
                }
            }
            ?>
            <div class="bg-gray-800 p-2">
                <h3 class="">Artikel lainnya yang berkaitan dengan
                    <span class="text-blue-600">
                        <?= $relatedTags ?>
                    </span>
                </h3>
            </div>

            <div class="py-10">
                <?php
                if (empty($listArtikelByTag)) {
                    echo '<div class="w-[100%] md:w-[65%] mx-auto text-center text-white text-[1.1rem]">Artikel dengan topik "' . $relatedTags . '" tidak ada.</div>';
                } else {
                    $lastKey = count($listArtikelByTag) - 1;
                    foreach ($listArtikelByTag as $key => $artikel) :
                ?>
                        <a href="/artikel/<?= $artikel['id_artikel'] ?>" class="flex items-center py-2 text-white hover:text-blue-600">
                            <h4 class="font-semibold text-[0.8rem] md:text-[0.9rem] lg:text-[1rem] line-clamp-1"><?= $artikel['judul'] ?></h4>
                        </a>
                <?php if ($key !== $lastKey) {
                            echo '<hr class="w-[100%] mx-auto">';
                        }
                    endforeach;
                }
                ?>
            </div>
        </div>
    </section>
    <section class="w-[100%] md:w-[85%] lg:w-[75%] mx-auto text-white">
        <div class="md:w-[70%]">
            <hr>
            <h3 class="px-3 py-3 text-[2rem]">Komentar</h3>
            <section id="komentar" class="w-full px-3 my-5 space-y-5">
                <?php
                if (isset($_SESSION['id_user'])) {
                ?>
                    <form action="/postComent" method="POST" class="flex gap-5">
                        <div class="flex gap-3 w-full">
                            <input type="hidden" name="id_artikel" value="<?php echo $artikel['id_artikel'] ?>">
                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
                            <img src="" alt="" class="w-12 h-12 bg-gray-500 flex items-center text-center">
                            <textarea name="komentar" id="komentar" cols="30" class="w-full rounded-lg bg-gray-100 text-gray-900 placeholder:text-gray-700 focus:outline-none focus:border-none" placeholder="Tulis Komentar Anda..."></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button id="submit" name="submit" class="bg-blue-600 focus:outline-none rounded-lg p-2 px-4 h-fit w-fit">
                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <div class="text-[1.5rem] text-center text-gray-500">
                        <p>Masuk dengan akun anda terlebih dahulu untuk berkomentar.</p>
                    </div>
                <?php
                }
                ?>
                <div class="">
                    <h4>Komentar Lainnya</h4>
                    <?php
                    if (empty($getKomentar)) {
                        echo '<div class="w-[100%] md:w-[65%] mx-auto text-center text-gray-300 text-[1.4rem]">Belum ada komentar di artikel ini</div>';
                    } else {
                        $lastKey = count($getKomentar) - 1;
                        foreach ($getKomentar as $key => $komentar) :
                    ?>
                            <div class="my-3 flex space-x-5">
                                <img src="" alt="" class="h-8 w-8 bg-gray-600">
                                <div class="w-full">
                                    <div class="flex justify-between w-full text-gray-500">
                                        <p class="font-bold text-[1.2rem] md:text-[1rem] lg:text-[0.9rem] line-clamp-1"><?= $komentar['nama_user'] ?></p>
                                        <p class="flex text-[1.1rem] md:text-[0.9rem] lg:text-[0.8rem]"><span class="hidden md:block">Diposting pada: </span><?= date('d F Y', strtotime($komentar['date_posted'])) ?></p>
                                    </div>
                                    <div class="w-full">
                                        <p class="text-[1rem] md:text-[0.9rem] lg:text-[1rem] pb-3"><?= $komentar['komentar'] ?></p>
                                        <div class="flex justify-between">
                                            <button class="font-normal p-1">Balas</button>
                                            <button class="text-red-600 p-1">Laporkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php if ($key !== $lastKey) {
                                echo '<hr class="w-[100%] mx-auto">';
                            }
                        endforeach;
                    }
                    ?>
                </div>
            </section>
        </div>
    </section>
</main>