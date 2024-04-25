<section>
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
                    Menu Pengaturan Website HIMATIK UAA
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

            </section>
        </div>
    </body>
</section>