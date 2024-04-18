<div class="ml-64 h-screen">
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
                            <div class=" flex gap-5 justify-between w-[70%] mx-auto">
                                <form action="" method="get">
                                    <input type="hidden" name="page" value="edit_admin">
                                    <input type="hidden" name="id_admin" value="<?= $admin['id_admin'] ?>">
                                    <button type="submit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
                                </form>
                                <form action="" method="post" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
                                    <input type="hidden" name="id_admin" value="<?= $admin['id_admin'] ?>">
                                    <button type="submit" name="hapus" class="mr-3 text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>