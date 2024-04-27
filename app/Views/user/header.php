<header class="bg-gray-900 sticky top-0 z-50">
    <nav class="flex justify-between items-center h-20 w-[85%] mx-auto">
        <div class="md:w-1/3 justify-start">
            <h1><a class="text-white text-2xl font-bold" href="">HIMATIK UAA</a></h1>
        </div>
        <div class="md:w-1/3 justify-center nav-links duration-500 bg-gray-900 lg:static absolute lg:min-h-fit min-h-[60vh] left-0 top-[-800%] text-white w-full flex items-center px-5">
            <ul class="flex flex-col lg:flex-row lg:items-center lg:gap-[4vw] gap-8 my-10 md:my-0">
                <li>
                    <a class="text-white hover:text-gray-500" href="#">Beranda</a>
                </li>
                <li>
                    <a class="text-white hover:text-gray-500" href="#">Profil</a>
                </li>
                <li>
                    <a class="text-white hover:text-gray-500" href="#">Galeri</a>
                </li>
                <li>
                    <a class="text-white hover:text-gray-500" href="#">Artikel</a>
                </li>
            </ul>
        </div>
        <div class="md:w-1/3 justify-end flex items-center gap-6">
            <button class="bg-blue-500 text-white px-5 py-2 rounded-xl hover:bg-blue-700"><a href="login.html">Masuk</a></button>
            <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3lg text-white cursor-pointer lg:hidden"></ion-icon>
        </div>
</header>
<script>
    const navLinks = document.querySelector('.nav-links')

    function onToggleMenu(e) {
        e.name = e.name === 'menu' ? 'close' : 'menu'
        navLinks.classList.toggle('top-0')
    }
</script>