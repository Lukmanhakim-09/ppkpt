<!-- Floating FAQ Button -->
<div id="faqButtonContainer" class="fixed bottom-4 right-8 z-50">
        <button id="faqButton" class="flex items-center justify-center w-14 h-14 rounded-full bg-[#F08619] hover:bg-[#3B6BA2] transition-colors duration-300 shadow-lg">
            <i class="fa-solid fa-circle-question text-2xl text-white"></i>
        </button>
    </div>

    <!-- FAQ Slide Panel -->
    <div id="faqPanel" class="fixed bottom-0 right-0 w-0 h-[400px] bg-white rounded-tl-lg shadow-lg transition-all duration-300 overflow-hidden">
        <div class="p-6 h-full overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold bg-[#3B6BA2] text-white px-4 py-2 rounded-full">FAQ</h2>
                <button id="closeFaq" class="text-gray-500 hover:text-gray-700">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="border-b border-[#F08619] pb-4">
                    <h3 class="font-bold text-lg mb-2">Apa itu SATGAS PPKPT?</h3>
                    <p class="text-gray-600">SATGAS PPKPT adalah Satuan Tugas Pencegahan dan Penanggulangan Kekerasan Seksual yang bertugas untuk mencegah dan menangani kasus kekerasan seksual di lingkungan ITH.</p>
                </div>

                <!-- FAQ Item 2 -->
                <div class="border-b border-[#F08619] pb-4">
                    <h3 class="font-bold text-lg mb-2">Siapa yang bisa melaporkan ke SATGAS PPKPT?</h3>
                    <p class="text-gray-600">Siapa saja, baik mahasiswa, dosen, karyawan, maupun masyarakat umum yang mengetahui atau mengalami kekerasan seksual di lingkungan ITH.</p>
                </div>

                <!-- FAQ Item 3 -->
                <div class="border-b border-[#F08619] pb-4">
                    <h3 class="font-bold text-lg mb-2">Bagaimana cara melaporkan ke SATGAS PPKPT?</h3>
                    <p class="text-gray-600">Anda bisa melaporkan melalui form aduan di website ini atau menghubungi kami melalui kontak yang tersedia.</p>
                </div>

                <!-- FAQ Item 4 -->
                <div class="border-b border-[#F08619] pb-4">
                    <h3 class="font-bold text-lg mb-2">Apakah identitas saya akan aman?</h3>
                    <p class="text-gray-600">Ya, identitas pelapor akan dijaga kerahasiaannya sesuai dengan peraturan yang berlaku.</p>
                </div>

                <!-- FAQ Item 5 -->
                <div class="border-b border-[#F08619] pb-4">
                    <h3 class="font-bold text-lg mb-2">Berapa lama proses penanganan?</h3>
                    <p class="text-gray-600">Proses penanganan akan segera dilakukan setelah aduan diterima dan akan diinformasikan perkembangannya kepada pelapor.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const faqButton = document.getElementById('faqButton');
        const faqButtonContainer = document.getElementById('faqButtonContainer');
        const faqPanel = document.getElementById('faqPanel');
        const closeFaq = document.getElementById('closeFaq');
        const panelWidth = 'w-[300px]';

        faqButton.addEventListener('click', () => {
            faqPanel.classList.add(panelWidth);
            faqButtonContainer.style.display = 'none';
        });

        closeFaq.addEventListener('click', () => {
            faqPanel.classList.remove(panelWidth);
            faqButtonContainer.style.display = 'block';
        });

        // Hide button when panel is open
        faqPanel.addEventListener('transitionend', () => {
            if (faqPanel.classList.contains(panelWidth)) {
                faqButtonContainer.style.display = 'none';
            } else {
                faqButtonContainer.style.display = 'block';
            }
        });
    </script>