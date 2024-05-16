<main class="flex items-center justify-center w-full min-h-screen bg-gray-900">
    <div class="flex min-h-full flex-col px-6 py-12 lg:px-8 w-full">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-white">Daftar Akun</h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/registerUser" method="POST">
                <div>
                    <label for="nama" class="block text-sm font-medium leading-6 text-white">Nama</label>
                    <div class="mt-2">
                        <input id="nama" name="nama" type="text" autocomplete="none" placeholder="Masukkan Nama" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="namapengguna" class="block text-sm font-medium leading-6 text-white">Nama Pengguna</label>
                    <div class="mt-2">
                        <input id="namapengguna" name="namapengguna" type="text" autocomplete="none" placeholder="Masukkan nama pengguna anda" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-white">Alamat Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="off" required placeholder="Masukkan email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <div class="flex items-center">
                        <label for="password" class="block text-sm font-medium leading-6 text-white">Kata Sandi</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="Masukkan kata sandi" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <div class="flex items-center">
                        <label for="password" class="block text-sm font-medium leading-6 text-white">Ulangi Kata Sandi</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="Ulangi kata sandi" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar</button>
                </div>
            </form>
            <p class="mt-10 text-center text-sm text-gray-500">
                Sudah punya akun?
                <a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Masuk dengan akun anda</a>
            </p>
        </div>
    </div>
</main>