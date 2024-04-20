<?php
$session = session();
$nama_admin = $session->get('nama_admin');
?>

<body>
    <div class="ml-64 h-screen">
        <div class="p-4 flex">
            <h1 class="text-xl">
                Tambah Galeri
            </h1>
        </div>
        <div class=" px-3 py-4 flex justify-between">
            <div>
                <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                    <a href="/himatikadmin/galeri">Kembali</a>
                </button>
            </div>
        </div>
        <form class="w-[90%] flex flex-col mx-auto" action="/himatikadmin/galeri/tambahgaleri" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="my-12">
                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-5">
                        <div class="mx-auto w-[100%]">
                            <label for="judul" class="block text-sm   font-medium leading-6 ">Judul</label>
                            <div class="mt-2">
                                <input id="judul" name="judul" type="text" autocomplete="off" placeholder="Judul" required class="block w-[100%]  rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="mx-auto w-[100%]  ">
                            <label for="deskripsi" class="block text-sm font-medium leading-6 ">Deskripsi</label>
                            <div class="mt-2">
                                <textarea id="deskripsi" name="deskripsi" rows="4" cols="50" type="text" placeholder="Deskripsi Gambar" autocomplete="off" required class="block w-[100%] rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>
                        <div class="mx-auto w-[100%]">
                            <label for="foto" class="block text-sm font-medium leading-6 ">Gambar</label>
                            <div class="mt-2">
                                <input id="foto" name="foto" type="file" autocomplete="" multiple onchange="readURL(this)" required accept="image/*" class="bg-white block w-[100%] p-2 file:mr-4 file:py-1 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-violet-500 file:cursor-pointer rounded-md border-0 py-1.5 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-7">
                        <div class="w-[100%] place-items-center mx-auto bg-gray-300 h-72 rounded-lg">
                            <img src="<?= isset($_FILES['foto']['name']) ? $_FILES['foto']['tmp_name'] : ''; ?>" id="img" class="h-72 object-cover align-items-center mx-auto">
                        </div>
                    </div>
                </div>
                <div class="mx-auto w-[50%] my-5">
                    <button type="submit" name="submit" class="flex w-[100%] justify-center rounded-md bg-blue-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Kirim
                    </button>
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