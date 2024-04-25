<?php
$session = session();
$nama_admin = $session->get('nama_admin');
?>

<body>
    <div class="ml-64 h-screen">
        <div class="p-4 flex">
            <h1 class="text-xl">
                Edit Artikel
            </h1>
        </div>
        <div class=" px-3 py-4 flex justify-between">
            <div>
                <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                    <a href="/himatikadmin/admin">Kembali</a>
                </button>
            </div>
        </div>
        <?php view('admin/tools/getflashdata') ?>
        <form class="w-[90%] flex flex-col mx-auto pb-32" action="/himatikadmin/artikel/editartikel/<?php echo $artikel['id_artikel'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="">
                <div class="space-y-6">
                    <input type="hidden" name="edited_by" id="edited_by" value="<?php echo $nama_admin ?>">
                    <input type="hidden" name="id_artikel" id="id_artikel" value="<?php echo $artikel['id_artikel'] ?>">
                    <div class="mx-auto w-[100%]">
                        <label for="new_judul" class="block text-sm font-medium leading-6 ">Judul</label>
                        <div class="mt-2">
                            <input id="new_judul" name="new_judul" type="text" autocomplete="off" placeholder="Judul" value="<?php echo $artikel['judul'] ?>" required class="block w-[100%]  rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mx-auto w-[100%]">
                        <label for="new_penulis" class="block text-sm   font-medium leading-6 ">Penulis</label>
                        <div class="mt-2">
                            <input id="new_penulis" name="new_penulis" type="text" value="<?php echo $artikel['author'] ?>" autocomplete="off" placeholder="Penulis" required class="block w-[100%]  rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mx-auto w-[100%]">
                        <div class="">
                            <label for="new_foto" class="block text-sm font-medium leading-6">Gambar</label>
                            <div class="grid grid-cols-12 gap-10">
                                <div class="col-span-4 h-full flex items-center">
                                    <input id="new_foto" name="new_foto" type="file" autocomplete="" multiple onchange="readURL(this)" accept="image/*" class="bg-white block w-[100%] p-2 file:mr-4 file:py-1 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-violet-100 file:cursor-pointer rounded-md border-0 py-1.5 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                <div class="h-96 flex col-span-8 w-full place-items-center relative bg-gray-800 rounded-lg">
                                    <span id="gambarText" class="absolute w-full text-white text-center">Pilih Gambar Header Artikel</span>
                                    <img src="/<?= isset($artikel['img']) ? $artikel['img'] : ''; ?>" id="img" class="h-96 object-cover align-items-center mx-auto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto w-[100%]  ">
                        <label for="isi" class="block text-sm font-medium leading-6 ">Isi</label>
                        <div class="mt-2">
                            <textarea id="isi" name="new_isi" rows="16" cols="50" type="text" placeholder="Isi Artikel" autocomplete="off" class=" "><?php echo $artikel['content'] ?></textarea>
                        </div>
                    </div>
                    <div class="flex gap-10">
                        <div class="w-1/2">
                            <label for="new_tag" class="block text-sm font-medium leading-6 ">Tag</label>
                            <input type="text" value="<?php echo $artikel['tag'] ?>" placeholder="Maksimal 2 tag, pisahkan dengan '#' (#tag1 #tag2)" id="new_tag" name="new_tag" class="mt-2 block w-[100%] rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <div class="w-1/2">
                            <label for="new_status" class="block text-sm font-medium leading-6 ">Status</label>
                            <select type="text" id="new_status" name="new_status" class="mt-2 block w-[100%] rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="publish">Published</option>
                                <option value="unpublish">UnPublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="mx-auto w-[100%] ">
                        <button type="submit" name="submit" class="flex w-[100%] justify-center rounded-md bg-blue-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Kirim</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script>
    function readURL(input) {
        var img = document.querySelector("#img");
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                img.setAttribute("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            gambarText.style.display = "block";
        }
    }
</script>

</html>