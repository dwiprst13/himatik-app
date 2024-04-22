<div class="hidden min-h-screen bg-gray-100 md:flex md:flex-col md:justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
            Selamat Datang di Menu Admin Website Himatik UAA
        </h2>
    </div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10 space-y-6">
            <h3 class="text-center text-[1.3rem] font-semibold">Silakan masuk dengan akun anda</h3>
            <form class="space-y-6" action="" method="post">
                <?php
                if (session()->getFlashdata('error')) {
                ?>
                    <div class="bg-red-600 text-white text-center rounded-md">
                        <?php echo session()->getFlashdata('error') ?>
                    </div>
                <?php
                }
                ?>
                <div>
                    <label for="input_username" class="block text-sm font-medium text-gray-700">
                        Nama Pengguna
                    </label>
                    <div class="mt-1">
                        <input id="input_username" name="admin_username" type="text" required class="autofill-none appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Masukkan nama pengguna anda">
                    </div>
                </div>

                <div>
                    <label for="input_password" class="block text-sm font-medium text-gray-700">
                        Kata Sandi
                    </label>
                    <div class="mt-1">
                        <input id="input_password" name="admin_password" type="password" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Masukkan Kata Sandi">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            Ingat Saya
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="/himatikadmin/login/lupapassword" class="font-medium text-blue-600 hover:text-blue-500">
                            Lupa Kata Sandi?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" name="login" value="LOGIN" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Masuk
                    </button>
                </div>
            </form>
            <div class="mt-6">
            </div>
        </div>
    </div>
</div>
<div class="flex md:hidden items-center text-center h-screen">
    <div>
        <h1 class="font-semibold">Maaf untuk kenyamanan penggunaan, Halaman Admin HIMATIK UAA tidak dapat diakses di perangkat mobile</h1>
        <button class="bg-blue-600 rounded px-1 py-2 text-white mt-5">Buka himatikuaa.com >></button>
        <p class="mt-2">Website Ini belum responsive, harap maklum</p>
    </div>
</div>