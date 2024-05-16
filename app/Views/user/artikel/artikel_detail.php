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
    <section class="w-[100%] md:w-[85%] lg:w-[75%] mx-auto md:flex md:flex-row justify-center text-white">
        <div class="md:w-[70%] p-2 pt-5 pb-10 rounded-lg ">
            <div class="text-white flex gap-2 text-[0.8rem] md:text-[1rem]">
                <a href="/artikel">Artikel </a>
                <span> / </span>
                <p>Detail Artikel </p>
                <span> / </span>
                <p> <?= substr($artikel['judul'], 0, 15) . '...' ?></p>
            </div>
            <div class="px-3 py-3">
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
            </div>
            <div id="komentar" class="w-full mt-5">
                <hr>
                <?php
                echo view('user/artikel/komentar');
                ?>
            </div>
        </div>
        <div class="hidden md:block md:w-[30%] pt-20 px-5">
            <h3 class="">Artikel lainnya yang berkaitan dengan
                <span class="text-blue-600">
                    <?php
                    $tags = explode(' ', $artikel['tag']);
                    $skipFirstTag = true;

                    foreach ($tags as $tag) {
                        if ($skipFirstTag) {
                            $skipFirstTag = false;
                            continue;
                        }

                        if (strpos($tag, '#') === 0) {
                            $tag = substr($tag, 1);
                            echo $tag;
                        }
                    }
                    ?>
                </span>
            </h3>
            <div class="">
                <?php
                if (empty($allArtikel)) {
                    echo '<div class="w-[100%] md:w-[65%] mx-auto text-center text-white text-[1.8rem]">Artikel dengan topik "' . esc($searchPost) . '" tidak ada.</div>';
                } else {
                    $lastKey = count($allArtikel) - 1;
                    foreach ($allArtikel as $key => $artikel) :
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
</main>