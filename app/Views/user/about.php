<section class="bg-gradient-to-b from-gray-900 from-20% to-20%">
    <div class="w-[90%] mx-auto md:w-[90%] bg-white rounded-2xl p-5 shadow-lg">
        <div>
            <h2 class="font-bold text-[2.5rem] text-blue-700">Tentang Kami</h2>
        </div>
        <div class="my-10 space-y-5">
            <div class="bg-blue-700 rounded-full text-white w-fit px-5 flex items-center shadow-lg">
                <h3 class="text-[1.5rem]">Sejarah</h3>
            </div>
            <div class="text-center p-5 border rounded-2xl bg-white shadow-md">
                <p class=" text-center">
                    HIMATIK merupakan organisasi intra kampus sebagai wadah kreatifitas seluruh mahasiswa Informatika Fakultas Komputer Universitas Alma Ata Yogyakarta, yang berdiri pada tanggal 21 November 2017.
                    HIMATIK UAA bersifat independen yang berorientasi pada pendidikan dan pengembangan soft skill serta hard skill di bidang Informatika yang berlandaskan pada nilai nilai keislaman dan kebangsaan Indonesia
                </p>
            </div>
        </div>
        <div class="my-10 space-y-5">
            <div class="bg-blue-700 rounded-full text-white w-fit px-5 flex items-center shadow-lg">
                <h3 class="text-[1.5rem]">Visi & Misi</h3>
            </div>
            <div class="flex gap-5">
                <div class="w-1/2 p-5 border rounded-2xl bg-white shadow-md hover:shadow-xl">
                    <h4 class="font-bold text-center text-[1.3rem] py-3">Visi</h4>
                    <p>
                        HIMATIK sebagai wadah untuk mengembangkan potensi mahasiswa di bidang teknologi informasi berlandaskan nilai nilai dan kebangsaan Indonesia.
                    </p>
                </div>
                <div class="w-1/2 p-5 border rounded-2xl bg-white shadow-md hover:shadow-xl">
                    <h4 class="font-bold text-center text-[1.3rem] py-3">Misi</h4>
                    <table class="w-full space-y-3">
                        <tr>
                            <td class="w-1/12">1.</td>
                            <td class="w-11/12 py-2">Mengembangkan potensi anggota HIMATIK sehingga menjadi insan yang kreatif dan mandiri sesuai nilai nilai islam dan kebangsaan.</td>
                        </tr>
                        <tr>
                            <td class="w-1/12">2.</td>
                            <td class="w-11/12 py-2">Mendorong anggota HIMATIK untuk berprestasi di bidang teknologi informasi sesuai nilai-nilai dan kebangsaan Indonesia.</td>
                        </tr>
                        <tr>
                            <td class="w-1/12">3.</td>
                            <td class="w-11/12 py-2">Berperan dalam mencerdaskan masyarakat di bidang teknologi informasi melalui kegiatan pengabdian masyarakat.</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="my-10 space-y-5">
            <div class="bg-blue-700 rounded-full text-white w-fit px-5 flex items-center shadow-lg">
                <h3 class="text-[1.5rem]">Kepengurusan</h3>
            </div>
            <div class="text-center p-5 border rounded-2xl bg-white shadow-md">
                <?php
                echo view('user/kepengurusan', ['allPengurus' => $allPengurus]);
                ?>
            </div>
        </div>
    </div>
    </div>
</section>