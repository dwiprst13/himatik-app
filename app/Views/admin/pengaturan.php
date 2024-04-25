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
                <form action="">
                    <div>
                        <label for="nama_kabinet">Nama Kabinet:</label>
                        <input type="text" id="nama_kabinet" name="nama_kabinet">
                    </div>
                    <div>
                        <label for="periode">Periode:</label>
                        <input type="text" id="periode" name="periode">
                    </div>
                    <div>
                        <label for="logo_kabinet">Logo Kabinet:</label>
                        <input type="file" id="logo_kabinet" name="logo_kabinet">
                    </div>
                </form>
            </section>
        </div>
    </body>
</section>