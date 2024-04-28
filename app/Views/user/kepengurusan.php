<section class="z-40">
    <h2 class="text-[1.6rem] md:text-[2rem] lg:text-[2.5rem] font-bold text-center my-3 md:my-4 lg:my-5">Kepengurusan HIMATIK UAA Periode 2024/2025</h2>
    <div>
        <h3 class="text-[1.2rem] md:text-[1.3rem] lg:text-[1.5rem] font-bold text-center my-2 md:my-3 bg-gray-900 text-white rounded-xl p-2">Ketua dan Wakil Ketua</h3>
        <div class="w-[100%] md:w-[90%] mx-auto flex flex-wrap justify-center my-5">
            <?php
            $filteredPengurus = [];

            foreach ($allPengurus as $pengurus) {
                if ($pengurus['divisi'] === 'Ketua' || $pengurus['divisi'] === 'Wakil Ketua') {
                    $filteredPengurus[] = $pengurus;
                }
            };
            foreach ($filteredPengurus as $inti) {
            ?>
                <div class="w-[50%] md:w-[33.3333%] lg:w-[25%] p-2 my-3">
                    <div class="relative bg-gray-100 h-[12rem] md:h-[16rem] lg:h-[20rem] flex">
                        <img src="/<?php echo $inti['foto']; ?>" class="w-full object-cover rounded-lg" alt="Profile picture of <?php echo $inti['nama_panggilan']; ?>">
                        <div id="detail" class="absolute flex flex-col items-center text-transparent hover:text-white bg-opacity-0 rounded-lg h-full w-full hover:bg-black/80 hover:bg-opacity-50 transition duration-300 ease-in-out">
                            <div class="h-4/5 flex items-center">
                                <div class="">
                                    <p class="text-center text-[1.2rem] p-2"><?php echo $inti['nama']; ?></p>
                                    <p class="text-center text-[1.1rem] p-2"><?php echo $inti['posisi']; ?></p>
                                </div>
                            </div>
                            <div class="h-1/5 w-full items-center flex text-[1.5rem] px-5 justify-between">
                                <a href="<?php echo $inti['ig_link']; ?>"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                                <a href="<?php echo $inti['linkedin_link']; ?>"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                                <a href="<?php echo $inti['github_link']; ?>"><i class="fab fa-github" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="text-center font-bold text-[1.3rem]"><?php echo $inti['nama_panggilan']; ?></p>
                </div>
            <?php
            };
            ?>
        </div>
    </div>
    <h3 class="text-[1.2rem] md:text-[1.3rem] lg:text-[1.5rem] font-bold text-center my-2 md:my-3 bg-gray-900 text-white rounded-xl p-2">Struktur Kepengurusan</h3>
    <div class="w-[100%] md:w-[90%] mx-auto flex flex-wrap justify-center my-5">
        <div class="w-4/12 md:w-[20%] p-2">
            <button id="bphButton" class="default-style w-full bg-gray-400 focus:outline-none focus:ring focus:ring-transparent rounded-full p-2 text-white" onclick="filterData('BPH', this)">
                BPH
            </button>
        </div>
        <div class="w-4/12 md:w-[20%] p-2">
            <button id="kominfoButton" class="default-style w-full focus:outline-none bg-gray-400 focus:ring focus:ring-transparent rounded-full p-2 text-white" onclick="filterData('Kominfo', this)">
                Kominfo
            </button>
        </div>
        <div class="w-4/12 md:w-[20%] p-2">
            <button id="diklatButton" class="default-style w-full focus:outline-none focus:ring focus:ring-transparent rounded-full p-2 text-white" onclick="filterData('Diklat', this)">
                Diklat
            </button>
        </div>
        <div class="w-4/12 md:w-[20%] p-2">
            <button id="sosmasButton" class="default-style w-full focus:outline-none focus:ring focus:ring-transparent rounded-full p-2 text-white" onclick="filterData('Sosmas', this)">
                Sosmas
            </button>
        </div>
        <div class="w-4/12 md:w-[20%] p-2">
            <button id="psdaButton" class="default-style w-full focus:outline-none focus:ring focus:ring-transparent rounded-full p-2 text-white" onclick="filterData('PSDA', this)">
                PSDA
            </button>
        </div>
        <div class="w-4/12 md:w-[20%] p-2">
            <button id="ekonomiButton" class="default-style w-full focus:outline-none focus:ring focus:ring-transparent rounded-full p-2 text-white" onclick="filterData('Ekonomi', this)">
                Ekonomi
            </button>
        </div>
        <div class="w-4/12 md:w-[20%] p-2">
            <button id="keagamaanButton" class="default-style w-full focus:outline-none focus:ring focus:ring-transparent rounded-full p-2 text-white" onclick="filterData('Keagamaan', this)">
                Agama
            </button>
        </div>
    </div>
</section>
<div id="data-container" class="w-[90%] mx-auto flex flex-wrap justify-center my-10">
    <?php foreach ($allPengurus as $pengurus) : ?>
        <div class="w-[50%] md:w-[33.3333%] lg:w-[25%] p-2 flex flex-col my-3" data-divisi="<?php echo ($pengurus['divisi']); ?>">
            <div class="relative bg-gray-100 h-[12rem] md:h-[16rem] lg:h-[20rem] flex">
                <img src="/<?php echo ($pengurus['foto']); ?>" class="w-full object-cover rounded-lg" alt="Profile picture of <?php echo ($pengurus['nama_panggilan']); ?>">
                <div id="detail" class="absolute flex flex-col items-center text-transparent hover:text-white bg-opacity-0 rounded-lg h-full w-full hover:bg-black/80 hover:bg-opacity-50 transition duration-300 ease-in-out">
                    <div class="h-4/5 flex items-center">
                        <div class="">
                            <p class="text-center text-[1.2rem] p-2"><?php echo $pengurus['nama']; ?></p>
                            <p class="text-center text-[1.1rem] p-2"><?php echo $pengurus['posisi']; ?></p>
                        </div>
                    </div>
                    <div class="h-1/5 w-full items-center flex text-[1.5rem] px-5 justify-between">
                        <a target="_blank" href="<?php echo $pengurus['ig_link']; ?>"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        <a target="_blank" href="<?php echo $pengurus['linkedin_link']; ?>"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                        <a target="_blank" href="<?php echo $pengurus['github_link']; ?>"><i class="fab fa-github" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <p class="text-center font-bold text-[1.3rem]"><?php echo ($pengurus['nama_panggilan']); ?></p>
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