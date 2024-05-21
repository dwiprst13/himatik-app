<div id="komentar" class="w-full mt-5">
    <form action="/postComent" method="POST" class="flex gap-5">
        <input type="hidden" name="id_artikel" value="<?php echo $artikel['id_artikel'] ?>">
        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
        <div class="flex gap-3 w-full">
            <div class="w-12 h-12 rounded-full bg-gray-500 flex items-center text-center"></div>
            <textarea name="komentar" id="komentar" cols="30" class="w-full rounded-lg bg-gray-100 text-gray-900 placeholder:text-gray-700 focus:outline-none focus:border-none" placeholder="Tulis Komentar Anda..."></textarea>
        </div>
        <div class="flex justify-end">
            <button id="submit" name="submit" class="bg-blue-600 focus:outline-none rounded-lg p-2 px-4 h-fit w-fit">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
            </button>
        </div>
    </form>
    <!-- <div class="my-5 space-y-3">
        <div class="flex gap-5">
            <div class="w-8 h-8 rounded-full bg-gray-500 flex items-center text-center"></div>
            <div>
            </div>
        </div>
        <hr>
        <div class="flex gap-5">
            <div class="w-8 h-8 rounded-full bg-gray-500 flex items-center text-center"></div>
            <div>
            </div>
        </div>
    </div> -->
</div>