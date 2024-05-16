<main class="flex items-center justify-center w-full min-h-screen bg-gray-900">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 w-full">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Masuk dengan Akun Anda</h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/userlogin" method="POST">
                <div>
                    <label for="namapengguna" class="block text-sm font-medium leading-6 text-white">Nama Pengguna</label>
                    <div class="mt-2">
                        <input id="namapengguna" name="namapengguna" type="text" placeholder="Nama Pengguna" autocomplete="off" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-white">Kata Sandi</label>
                        <div class="text-sm">
                            <a href="/lupapassword" class="font-semibold text-indigo-600 hover:text-indigo-500">Lupa Kata Sandi?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" placeholder="Kata Sandi" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <button type="submit" name="login" value="LOGIN" id="login" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Masuk</button>
                </div>
            </form>
            <p class="mt-10 text-center text-sm text-gray-500">
                Belum punya Akun?
                <a href="/register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Daftar Sekarang</a>
            </p>
        </div>
    </div>
</main>