<?php
$session = session();
$nama_admin = $session->get('nama_admin');
?>

<body class="z-40 relative w-full">
    <div class="ml-64 h-screen z-30">
        <div class="p-4 flex">
            <h1 class="text-xl">
                Tambah Artikel
            </h1>
        </div>
        <div class=" px-3 py-4 flex justify-between">
            <div class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                <a href="/himatikadmin/artikel">Kembali</a>
            </div>
        </div>
        <form class="w-[90%] flex z-40 flex-col mx-auto pb-32" action="/himatikadmin/artikel/tambahartikel" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="">
                <div class="space-y-6">
                    <input type="hidden" name="writer" id="writer" value="<?php echo $nama_admin ?>">
                    <p><?php echo $nama_admin ?></p>
                    <div class="mx-auto w-[100%]">
                        <label for="judul" class="block text-sm   font-medium leading-6 ">Judul</label>
                        <div class="mt-2">
                            <input id="judul" name="judul" type="text" autocomplete="off" placeholder="Judul" required class="block w-[100%]  rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mx-auto w-[100%]">
                        <label for="penulis" class="block text-sm   font-medium leading-6 ">Penulis</label>
                        <div class="mt-2">
                            <input id="penulis" name="penulis" type="text" autocomplete="off" placeholder="Penulis" required class="block w-[100%]  rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mx-auto w-[100%]">
                        <div class="">
                            <label for="foto" class="block text-sm font-medium leading-6">Gambar</label>
                            <div class="grid grid-cols-12 gap-10">
                                <div class="col-span-4 h-full flex items-center">
                                    <input id="foto" name="foto" type="file" autocomplete="" multiple required accept="image/*" class="bg-white block w-[100%] p-2 file:mr-4 file:py-1 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-violet-100 file:cursor-pointer rounded-md border-0 py-1.5 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                <div class="h-96 flex col-span-8 w-full place-items-center relative bg-gray-800 rounded-lg">
                                    <span id="gambarText" class="absolute w-full text-white text-center">Pilih Gambar Header Artikel</span>
                                    <img src="" id="img" class="h-96 object-cover align-items-center mx-auto" onload="readURL()">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto w-[100%]">
                        <label for="isi" class="block text-sm font-medium leading-6 ">Isi</label>
                        <div class="mt-2 z-40">
                            <textarea id="isi" name="isi" rows="16" cols="50" type="text" placeholder="Isi Artikel" autocomplete="off" class=""></textarea>
                        </div>
                    </div>
                    <div class="flex gap-10">
                        <div class="w-1/2">
                            <label for="tag" class="block text-sm font-medium leading-6 ">Tag</label>
                            <input type="text" placeholder="Maksimal 2 tag, pisahkan dengan '#' (#tag1 #tag2)" id="tag" name="tag" class="mt-2 block w-[100%] rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <div class="w-1/2">
                            <label for="status" class="block text-sm font-medium leading-6 ">Status</label>
                            <select type="text" id="status" name="status" class="mt-2 block w-[100%] rounded-md border-0 py-1.5 text-gray-900 white shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
    const showImagesBtn = document.getElementById('showImagesBtn');
    const imageList = document.getElementById('imageList');

    showImagesBtn.addEventListener('click', function() {
        if (imageList.classList.contains('hidden')) {
            imageList.classList.remove('hidden');
        } else {
            imageList.classList.add('hidden');
        }
    });

    function copyURL(elementId) {
        var fullUrl = document.getElementById(elementId).src;
        var match = fullUrl.match(/\/uploads\/gambar\/(.*)/);
        var url = match ? match[0] : '';
        var textarea = document.createElement('textarea');
        textarea.value = url;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        alert('Link telah disalin: ' + url);
    }
</script>

</html>