<?php if (session()->has('success')) : ?>
    <script>
        window.addEventListener('load', function() {
            alert("<?php echo session('success'); ?>");
        });
    </script>
<?php endif; ?>

<body>
    <div class="md:ml-64 min-h-screen transition-all main">
        <div class="p-4 flex">
            <h1 class="text-xl">
                Daftar Gambar
            </h1>
        </div>
        <div class=" px-3 py-4 flex justify-between">
            <div>
                <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                    <a href="gambar/tambahgambar">Tambah</a>
                </button>
                <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                    <a href="/himatikadmin/artikel">Artikel</a>
                </button>
            </div>
        </div>
        <section class="w-[100%] mx-auto ">
            <?php if (!empty($allGambar)) : ?>
                <div class="container flex flex-wrap mx-auto px-4 py-16 gap-3">
                    <?php foreach ($allGambar as $gambar) : ?>
                        <form action="gambar/editgambar/<?= $gambar['id_gambar'] ?>" class="w-[calc(25%-12px)] bg-gray-300 rounded-lg ">
                            <button class="w-full flex flex-col space-y-1.5 p-2 justify-center items-center">
                                <div class="bg-black h-32 w-full flex justify-center items-center overflow-hidden">
                                    <img src="/<?= $gambar['img'] ?>" alt="" class="w-auto h-auto max-h-full">
                                </div>
                                <p class="line-clamp-1"><?= $gambar['nama'] ?></p>
                            </button>
                        </form>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p>Tidak dapat menemukan daftar artikel di database.</p>
            <?php endif; ?>
        </section>
    </div>
</body>