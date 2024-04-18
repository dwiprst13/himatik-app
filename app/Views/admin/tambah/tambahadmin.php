<div class="ml-64 h-screen">
    <div class="p-4 flex">
        <h1 class="text-xl">
            Daftar Admin
        </h1>
    </div>
    <div class=" px-3 py-4 flex justify-between">
        <div>
            <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                <a href="/himatikadmin/admin">Kembali</a>
            </button>
        </div>
    </div>
    <form method="post">
        <input type="hidden" name="id_admin">
        <div class=" grid grid-cols-8 ">
            <div class="space-y-6 col-span-4 p-5">
                <div>
                    <label for="name" class="block text-sm font-medium leading-6">Nama:</label>
                    <input type="text" name="name" placeholder="Masukakan Nama" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><br>
                </div>
                <div>
                    <label for="nim" class="block text-sm font-medium leading-6">Nim:</label>
                    <input type="text" name="nim" placeholder="Masukakan NIM" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><br>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium leading-6">Email:</label>
                    <input type="text" name="email" placeholder="Masukakan Email" required class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><br>
                </div>
            </div>
            <div class="space-y-6 col-span-4 p-5">
                <div>
                    <label for="password" class="block text-sm font-medium leading-6">Kata Sandi:</label>
                    <input type="text" name="password" placeholder="Masukkan Kata Sandi" class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><br>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium leading-6">Ulangi Kata Sandi:</label>
                    <input type="text" name="password" placeholder="Masukkan Ulang Kata Sandi" class="block w-full rounded-md  p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><br>
                </div>
                <div>
                    <label for="role" class="block text-sm font-medium leading-6">Role:</label>
                    <select id="role" name="role" class="block w-full rounded-md p-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="SuperAdmin">SuperAdmin</option>
                        <option value="Admin">Admin</option>
                        <option value="Jurnalis">Jurnalis</option>
                    </select>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" name="submit" class="flex text-white justify-center rounded-md w-[20%] bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mx-auto">
                Tambah
            </button>
        </div>
    </form>
</div>