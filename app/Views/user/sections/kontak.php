<section class="w-[100%] mx-auto py-10 bg-gray-900">
    <div class="w-[95%] mx-auto md:w-[90%] bg-white rounded-2xl p-3 md:p-5 shadow-lg">
        <div>
            <h2 class="font-bold text-[1.6rem] md:text-[2rem] lg:text-[2.5rem] text-blue-700 my-5">Hubungi Kami</h2>
        </div>
        <div>
            Anda ingin menghubungi kami? Silahkan kirim pesan dengan klik tombol dibawah ini
        </div>
        <div class="flex justify-center mt-5">
            <button id="contactButton" class="bg-blue-700 text-white rounded-full px-3 py-2 focus:outline-none" onclick="toggleMessageForm()">Kirim Pesan</button>
        </div>
        <div class="mt-5 hidden" id="MessageForm">
            <form action="/submitMessage" method="POST">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
                    <input type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Pesan:</label>
                    <textarea id="content" name="content" rows="4" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white rounded-full px-3 py-2 focus:outline-none">Kirim Pesan</button>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    function toggleMessageForm() {
        var form = document.getElementById('MessageForm');
        var button = document.getElementById('contactButton');
        if (form.classList.contains('hidden')) {
            form.classList.remove('hidden');
            button.textContent = 'Batal';
        } else {
            form.classList.add('hidden');
            button.textContent = 'Hubungi Kami';
        }
    }
</script>