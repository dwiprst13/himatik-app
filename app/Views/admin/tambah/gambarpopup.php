<div class="fixed flex gap-5 h-screen right-0 top-0 z-50">
    <div id="imageList" class="w-full bg-white border border-black rounded-lg my-10 hidden p-5 z-50">
        <div class="w-full h-12 flex items-center">
            <h1 class="text-center w-full text-[1.5rem]">List Gambar</h1>
        </div>
        <div>
            <?php if (!empty($allGambar)) : ?>
                <div class="container flex flex-wrap mx-auto px-4 py-16 gap-3">
                    <table>
                        <?php foreach ($allGambar as $gambar) : ?>
                            <tr>
                                <td class="w-20">
                                    <img id="gambar<?= $gambar['id_gambar'] ?>" src="/<?= $gambar['img'] ?>" alt="" class="h-10">
                                </td>
                                <td class="w-60">
                                    <p class="line-clamp-1"><?= $gambar['nama'] ?></p>
                                </td>
                                <td class="w-20">
                                    <button onclick="copyURL('gambar<?= $gambar['id_gambar'] ?>')">Copy Link</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php else : ?>
                <p>Tidak dapat menemukan daftar artikel di database.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="h-screen flex items-center">
        <button id="showImagesBtn" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-2 px-2 rounded-l-full focus:outline-none focus:shadow-outline flex gap-2 ">
            <p class="text-[1rem]">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </p>
            <p class="text-[1.2rem]">
                <i class="fa fa-picture-o" aria-hidden="true"></i>
            </p>
        </button>
    </div>
</div>