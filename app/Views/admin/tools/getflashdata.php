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