<header class="bg-gray-900 sticky top-0 z-50">
    <nav class="flex justify-between items-center h-20 w-[85%] mx-auto">
        <div class="md:w-1/3 justify-start">
            <h1><a class="text-white text-2xl font-bold" href="">HIMATIK UAA</a></h1>
        </div>
        <div class="w-full md:w-1/3 justify-center nav-links duration-500 bg-gray-900 lg:static absolute lg:min-h-fit min-h-[60vh] left-0 top-[-800%] text-white flex items-center px-5">
            <ul class="flex w-full flex-col md:justify-center md:mx-auto lg:flex-row lg:items-center gap-5 my-10 md:my-0">
                <li>
                    <a class="<?= (current_url() === base_url('/')) ? 'text-blue-600' : 'text-white'; ?> hover:text-gray-500 flex justify-between" href="/">
                        <p>Beranda</p>
                        <div class="block md:hidden"><i class="fas fa-chevron-right"></i></div>
                    </a>
                </li>
                <hr class="block md:hidden">
                <li>
                    <a class="<?= (current_url() === base_url('/galeri')) ? 'text-blue-600' : 'text-white'; ?> hover:text-gray-500 flex justify-between" href="/galeri">
                        <p>Galeri</p>
                        <div class="block md:hidden"><i class="fas fa-chevron-right"></i></div>
                    </a>
                </li>
                <hr class="block md:hidden">
                <li>
                    <a class="<?= (strpos(current_url(), base_url('/artikel')) === 0) ? 'text-blue-600' : 'text-white'; ?> hover:text-gray-500 flex justify-between" href="/artikel">
                        <p>Artikel</p>
                        <div class="block md:hidden"><i class="fas fa-chevron-right"></i></div>
                    </a>
                </li>
                <hr class="block md:hidden">
                <li>
                    <a class="<?= (current_url() === base_url('/ruanghimatik')) ? 'text-blue-600' : 'text-white'; ?> hover:text-gray-500 flex justify-between" href="/ruanghimatik">
                        <p>Ruang Himatik</p>
                        <div class="block md:hidden"><i class="fas fa-chevron-right"></i></div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="md:w-1/3 justify-end flex items-center gap-4">
            <button class="hidden md:block bg-blue-700/50 text-white px-5 py-2 rounded-xl" onclick="window.location.href='/login'">
                <p>Masuk</p>
            </button>
            <button class="flex md:hidden text-white p-2 items-center justify-center" onclick="window.location.href='/login'" disabled>
                <i class="fas fa-user"></i>
            </button>
            <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl text-white cursor-pointer lg:hidden"></ion-icon>
        </div>
</header>
<script>
    const navLinks = document.querySelector('.nav-links')

    function onToggleMenu(e) {
        e.name = e.name === 'menu' ? 'close' : 'menu'
        navLinks.classList.toggle('top-0')
    }
</script>