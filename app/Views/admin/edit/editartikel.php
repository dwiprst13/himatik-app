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
    <?php
    if (session()->getFlashdata('error')) {
    ?>
        <div class="">
            <div class="flex text-white justify-center rounded-md w-[70%] bg-red-400 px-3 py-1 text-sm font-semibold leading-6 shadow-sm mx-auto">
                <?php echo session()->getFlashdata('error') ?>
            </div>
        </div>
    <?php
    }
    ?>
    <?php
    if (session()->getFlashdata('success')) {
    ?>
        <div class="">
            <div class="flex text-white justify-center rounded-md w-[70%] bg-red-400 px-3 py-1 text-sm font-semibold leading-6 shadow-sm mx-auto">
                <?php echo session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php
    }
    ?>
</div>