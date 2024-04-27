<section class="z-40">
    <div id="w-[80%] mx-auto flex flex-wrap gap-4">
        <button id="bphButton" class="default-style bg-gray-400 focus:outline-none focus:ring focus:ring-transparent w-2/12 m-2 p-2 rounded-full text-white" onclick="filterData('BPH', this)">
            BPH
        </button>
        <button id="kominfoButton" class="default-style focus:outline-none bg-gray-400 focus:ring focus:ring-transparent w-2/12 m-2 p-2 rounded-full text-white" onclick="filterData('Kominfo', this)">
            Kominfo
        </button>
        <button id="diklatButton" class="default-style focus:outline-none focus:ring focus:ring-transparent w-2/12 m-2 p-2 rounded-full text-white" onclick="filterData('Diklat', this)">
            Diklat
        </button>
        <button id="sosmasButton" class="default-style focus:outline-none focus:ring focus:ring-transparent w-2/12 m-2 p-2 rounded-full text-white" onclick="filterData('Sosmas', this)">
            Sosmas
        </button>
        <button id="psdaButton" class="default-style focus:outline-none focus:ring focus:ring-transparent w-2/12 m-2 p-2 rounded-full text-white" onclick="filterData('PSDA', this)">
            PSDA
        </button>
        <button id="ekonomiButton" class="default-style focus:outline-none focus:ring focus:ring-transparent w-2/12 m-2 p-2 rounded-full text-white" onclick="filterData('Ekonomi', this)">
            Ekonomi
        </button>
        <button id="keagamaanButton" class="default-style focus:outline-none focus:ring focus:ring-transparent w-2/12 m-2 p-2 rounded-full text-white" onclick="filterData('Keagamaan', this)">
            Keagamaan
        </button>
    </div>
</section>
<div id="data-container" class="w-[90%] mx-auto flex flex-wrap justify-center my-10">
    <?php foreach ($allPengurus as $pengurus) : ?>
        <div class="w-3/12 p-2 flex flex-col my-3" data-divisi="<?php echo htmlspecialchars($pengurus['divisi']); ?>">
            <div class="relative bg-gray-100 h-72 flex">
                <img src="/<?php echo htmlspecialchars($pengurus['foto']); ?>" class="w-full object-fil rounded-lg" alt="Profile picture of <?php echo htmlspecialchars($pengurus['nama_panggilan']); ?>">
                <div id="detail" class="absolute flex items-center text-transparent hover:text-white bg-opacity-0 rounded-lg h-full w-full hover:bg-black/80 hover:bg-opacity-50 transition duration-300 ease-in-out">
                    <div class="w-full">
                        <p class="text-center text-[1.2rem] p-2"><?php echo htmlspecialchars($pengurus['nama']); ?></p>
                        <p class="text-center text-[1.1rem] p-2"><?php echo htmlspecialchars($pengurus['posisi']); ?></p>
                    </div>
                </div>
            </div>
            <p class="text-center font-bold text-[1.3rem]"><?php echo htmlspecialchars($pengurus['nama_panggilan']); ?></p>
        </div>
    <?php endforeach; ?>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        filterData('BPH', document.getElementById('bphButton'));
    });

    function filterData(divisi, element) {
        var allData = document.querySelectorAll('#data-container > div');
        allData.forEach(function(el) {
            if (el.getAttribute('data-divisi') === divisi || divisi === 'all') {
                el.style.display = "flex";
            } else {
                el.style.display = "none";
            }
        });

        var buttons = document.querySelectorAll('.default-style');
        buttons.forEach(function(btn) {
            btn.classList.remove('bg-blue-600');
            btn.classList.add('bg-gray-400');
        });

        element.classList.add('bg-blue-600');
        element.classList.remove('bg-gray-400');
    }
</script>