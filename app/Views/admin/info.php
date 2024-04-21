<body>
    <div class="md:ml-64 min-h-screen transition-all main">
        <div class="p-4 flex">
            <h1 class="text-xl">
                Daftar Info
            </h1>
        </div>
        <div class=" px-3 py-4 flex justify-between">
            <div>
                <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                    <a href="info/tambahinfo">Tambah</a>
                </button>
            </div>
        </div>
        <section class="w-[100%] mx-auto ">
            <div class="container flex flex-wrap mx-auto px-4 py-16 gap-3">
                <?php foreach ($allInfo as $info) : ?>
                    <form action="info/editinfo/<?= $info['id_info'] ?>" class="w-[calc(25%-12px)] bg-gray-300 rounded-lg ">
                        <button class="w-full flex flex-col space-y-1.5 p-2 justify-center items-center">
                            <div class="bg-black h-40 w-full flex justify-center items-center overflow-hidden">
                                <img src="/<?= $info['img'] ?>" alt="" class="w-auto h-auto max-h-full">
                            </div>
                            <p class="line-clamp-1"><?= $info['detail'] ?></p>
                        </button>
                    </form>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</body>