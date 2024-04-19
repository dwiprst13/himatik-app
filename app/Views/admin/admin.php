<?php if (session()->has('success')) : ?>
    <script>
        window.addEventListener('load', function() {
            alert("<?php echo session('success'); ?>");
        });
    </script>
<?php endif; ?>
<div class="ml-64 h-screen">
    <div class="p-4 flex">
        <h1 class="text-xl">
            Daftar Admin
        </h1>
    </div>
    <div class=" px-3 py-4 flex justify-between">
        <div>
            <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                <a href="admin/tambahadmin">Tambah</a>
            </button>
        </div>
        <div class="mb-3">
            <form method="post" class="flex mb-4 w-full flex-wrap ">
                <input type="search" class="mx-auto m-0 -mr-0.5 block min-w-0 flex-auto rounded-l border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6]  outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-blackfocus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-gray-600 dark:focus:border-primary" placeholder="Search" aria-label="Search" aria-describedby="button-addon1" />
                <button class=" flex items-center rounded-r bg-blue-500 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg" type="button" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md table-auto bg-white shadow-md rounded-md">
            <tbody class="rounded-md mb-4">
                <tr class="px-3 border-b bg-gray-500 text-white rounded-md">
                    <th class="text-center p-3 px-5">Id</th>
                    <th class="text-center p-3 px-5">Nama</th>
                    <th class="text-center p-3 px-5">Nama Pengguna</th>
                    <th class="text-center p-3 px-5">Email</th>
                    <th class="text-center p-3 px-5">NIM</th>
                    <th class="text-center p-3 px-5">Role</th>
                    <th class="text-center p-3 px-5">Aksi</th>
                </tr>
                <?php foreach ($allAdmin as $admin) : ?>
                    <tr class="px-3 border-b bg-gray-100">
                        <td class="p-3 text-center px-5"><?php echo $admin['id_admin']; ?></td>
                        <td class="p-3 text-center px-5"><?php echo $admin['nama']; ?></td>
                        <td class="p-3 text-center px-5"><?php echo $admin['username']; ?></td>
                        <td class="p-3 text-center px-5"><?php echo $admin['email']; ?></td>
                        <td class="p-3 text-center px-5"><?php echo $admin['nim']; ?></td>
                        <td class="p-3 text-center px-5"><?php echo $admin['role']; ?></td>
                        <td class="px-5">
                            <div class="flex items-center justify-between">
                                <form action="/himatikadmin/admin/editadmin/<?= $admin['id_admin'] ?>" method="get" class="h-full mt-3">
                                    <button type="submit" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded-md focus:outline-none focus:shadow-outline">Edit</button>
                                </form>
                                <form action="/himatikadmin/admin/deleteadmin/<?= $admin['id_admin'] ?>" method="get" class="h-full mt-3" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
                                    <button type="submit" name="hapus" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded-md focus:outline-none focus:shadow-outline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>