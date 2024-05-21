<?php
session();
?>
<script>
</script>
<header class="bg-gray-900 sticky top-0 z-50">
    <div class="flex relative justify-between items-center h-20 w-[85%] mx-auto">
        <?php
        if (session()->getFlashdata('alert')) {
        ?>
            <div class="alert-info absolute w-full h-full flex items-center justify-center">
                <div class="bg-red-600 border border-white text-white text-center rounded-md w-fit mx-auto p-2">
                    <?php echo session()->getFlashdata('alert') ?>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="md:w-1/3 justify-start">
            <h1><a class="text-white text-2xl font-bold" href="">HIMATIK UAA</a></h1>
        </div>
        <nav class="w-full md:w-1/3 justify-center nav-links duration-500 bg-gray-900 lg:static absolute lg:min-h-fit min-h-[60vh] left-0 top-[-800%] text-white flex items-center px-5">
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
        </nav>
        <div class="md:w-1/3 justify-end flex items-center gap-4">
            <?php
            if (isset($_SESSION['id_user'])) {
                echo '<form method="POST" action="/logoutUser" class="logout-form">
                <button type="submit" name="submit" class="hidden md:block bg-red-600 focus:outline-none text-white px-3 p-1 rounded-xl">
                <p>Keluar</p>
            </button></form>';
            } else {
                echo  '<button class="hidden md:block bg-blue-600 focus:outline-none text-white px-3 p-1 rounded-xl" onclick="window.location.href=\'/login\'">
                <p>Masuk</p>
            </button>';
            }
            ?>
            <?php if (isset($_SESSION['id_user'])) {
                echo '<button id="account-btn" class="account-btn focus:outline-none flex md:hidden text-white p-2 items-center justify-center">
                <i class="fas fa-user"></i>
            </button>';
            } else {
                echo '
            <button id="account-btn" class="focus:outline-none flex md:hidden text-white p-2 items-center justify-center" onclick="window.location.href=\'/login\'">
                <i class="fas fa-user"></i>
            </button>';
            }
            ?>

            <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl text-white cursor-pointer lg:hidden"></ion-icon>

            <div class="account-modal absolute w-full top-20 h-20 hidden" id="account-modal">
                <div class="flex bg-white h-full md:w-[50%] rounded-xl right-0 justify-between">
                    <div class="p-2 flex items-center font-semibold">
                        <p>
                            <?php if (isset($_SESSION['id_user'])) {
                                echo $_SESSION['nama_user'];
                            } else {
                                echo 'Masuk untuk berinteraksi';
                            }
                            ?>
                        </p>
                    </div>
                    <div class="flex items-center p-2">
                        <?php
                        if (isset($_SESSION['id_user'])) {
                            echo '<form method="POST" action="/logoutUser" class="logout-form">
                    <button type="submit" name="submit" class="block md:hidden bg-red-600 focus:outline-none text-white px-3 p-1 rounded-lg">
                        <p>Keluar</p>
                    </button>
                </form>';
                        } else {
                            echo  '<button class="block md:hidden bg-blue-600 focus:outline-none text-white px-3 p-1 rounded-lg" onclick="window.location.href=\'/login\'">
                    <p>Masuk</p>
                </button>';
                        }
                        ?>
                    </div>
                </div>
            </div>
</header>
<script>
    const navLinks = document.querySelector('.nav-links')

    function onToggleMenu(e) {
        e.name = e.name === 'menu' ? 'close' : 'menu'
        navLinks.classList.toggle('top-0')
    }

    const logoutForm = document.querySelector('.logout-form');
    logoutForm.addEventListener('submit', function(event) {
        if (!confirm('Apakah Anda yakin ingin logout?')) {
            event.preventDefault();
        }
    });

    setTimeout(() => {
        const alertElement = document.querySelector('.alert-info');
        alertElement.style.display = 'none';
    }, 5000);

    document.addEventListener('DOMContentLoaded', (event) => {
        const accountBtn = document.getElementById('account-btn');
        const accountModal = document.getElementById('account-modal');

        accountBtn.addEventListener('click', () => {
            accountModal.classList.toggle('hidden');
        });
    });
</script>