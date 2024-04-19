<div class="ml-64 h-screen">
    <div class="p-4 flex">
        <h1 class="text-xl">
            Tambah Pengurus
        </h1>
    </div>
    <div class=" px-3 py-4 flex justify-between">
        <div>
            <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                <a href="/himatikadmin/pengurus">Kembali</a>
            </button>
        </div>
    </div>
    <div class="sm:mx-auto sm:w-full ">
        <form class="space-y-6" action="/himatikadmin/pengurus/editpengurus" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_pengurus" value="<?= $pengurus['id_pengurus'] ?>">
            <div class=" grid grid-cols-8 ">
                <div class="space-y-6 col-span-4 p-5">
                    <div class=" ">
                        <label for="new_name" class="block text-sm font-medium leading-6">Nama Lengkap</label>
                        <div class="mt-2">
                            <input id="new_name" name="new_name" type="text" value="<?= $pengurus['nama'] ?>" autocomplete="off" placeholder="Nama Lengkap" required class="block w-full rounded-md  p-2 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class=" ">
                        <label for="new_panggilan" class="block text-sm font-medium leading-6">Nama Panggilan</label>
                        <div class="mt-2">
                            <input id="new_panggilan" name="new_panggilan" type="text" value="<?= $pengurus['nama_panggilan'] ?>" autocomplete="off" placeholder="Nama Panggilan" required class="block w-full rounded-md  p-2 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="new_nim" class="block text-sm font-medium leading-6">NIM</label>
                        <div class="mt-2">
                            <input id="new_nim" name="new_nim" type="text" value="<?= $pengurus['nim'] ?>" autocomplete="off" placeholder="Masukkan NIM" required class="block w-full rounded-md  p-2 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="new_divisi" class="block text-sm font-medium leading-6">Divisi</label>
                        <div class="mt-2">
                            <select id="new_divisi" name="new_divisi" required class="block w-full rounded-md p-2 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="Ketua">Ketua</option>
                                <option value="Wakil Ketua">Wakil Ketua</option>
                                <option value="BPH">BPH</option>
                                <option value="Kominfo">Kominfo</option>
                                <option value="Sosmas">Sosmas</option>
                                <option value="Diklat">Diklat</option>
                                <option value="PSDA">PSDA</option>
                                <option value="Keagamaan">Keagamaan</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="new_posisi" class="block text-sm font-medium leading-6">Posisi</label>
                        <div class="mt-2">
                            <input id="new_posisi" name="new_posisi" type="text" value="<?= $pengurus['posisi'] ?>" placeholder="Masukkan Posisi Pengurus (Koor/Staff)" autocomplete="off" required class="block w-full rounded-md  p-2 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
                <div class="space-y-6 col-span-4 p-5">
                    <div>
                        <label for="new_fotopengurus" class="block text-sm font-medium leading-6">Foto</label>
                        <div class="mt-2">
                            <input id="new_fotopengurus" name="new_fotopengurus" type="file" autocomplete="" multiple onchange="readURL(this)" accept="image/*" placeholder="Pilih Foto" enctype="multipart/form-data" class="bg-white block w-[100%] p-2 file:mr-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-violet-500 file:cursor-pointer rounded-md border-0 py-1.5 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="new_ig_link" class="block text-sm font-medium leading-6 ">IG</label>
                        <div class="mt-2">
                            <input id="new_ig_link" name="new_ig_link" type="text" placeholder="Link Akun Instagram" autocomplete="off" value="<?= $pengurus['ig_link'] ?>" class="block w-full rounded-md  p-2 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="new_linkedin_link" class="block text-sm font-medium leading-6  ">LinkedIn</label>
                        <div class="mt-2">
                            <input id="new_linkedin_link" name="new_linkedin_link" type="text" placeholder="Link Akun LinkedIn" autocomplete="off" value="<?= $pengurus['linkedin_link'] ?>" class="block w-full rounded-md  p-2 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="new_github_link" class="block text-sm font-medium leading-6  ">Github</label>
                        <div class="mt-2">
                            <input id="new_github_link" name="new_github_link" type="text" value="<?= $pengurus['github_link'] ?>" placeholder="Link Akun Github" autocomplete="off" class="block w-full rounded-md  p-2 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <div class="mt-2">
                            <button type="submit" name="submit" class="flex text-white justify-center rounded-md w-full bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>