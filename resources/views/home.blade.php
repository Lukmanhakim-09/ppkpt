<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PPKPT ITH</title>
    @vite('resources/css/app.css')
    <link
      rel="stylesheet"  
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  </head>
  <body>
      <header class="z-50 fixed inset-x-0 top-0 bg-white w-full shadow-md" x-data="{ isOpen: false }">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
          <div class="flex lg:flex-1">
            <a href="#beranda" class="-m-5 p-3">
              <img class="h-18 w-auto" src="img/ppkpt.png" alt="">
            </a>
          </div>
          <div class="flex lg:hidden">
            <button @click="isOpen = !isOpen" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
              <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
            </button>
          </div>
          <div class="hidden lg:flex lg:items-center lg:gap-x-8 relative">
            <!-- Link Navigasi -->
            <a href="#" class="text-lg font-normal text-gray-900 hover:text-[#F08619] font-roboto transition-colors">Beranda</a>
            <a href="#berita" class="text-lg font-normal text-gray-900 hover:text-[#F08619] font-roboto transition-colors">Berita</a>
            <a href="#tentang" class="text-lg font-normal text-gray-900 hover:text-[#F08619] font-roboto transition-colors">Tentang Kami</a>

            <!-- Dropdown Dokumen -->
            <div class="relative" x-data="{ isOpen: false }">
                <button @click="isOpen = !isOpen" class="text-lg font-normal text-gray-900 hover:text-[#F08619] font-roboto transition-colors">
                Dokumen
                </button>
                <div x-show="isOpen" @click.outside="isOpen = false" x-transition class="absolute left-0 top-full mt-2 bg-white shadow-lg rounded-md p-4 w-[200px] z-50">
                <a href="#" class="block text-base text-gray-900 hover:text-[#F08619] font-roboto py-1">Permendikbudristek No. 55 Tahun 2024</a>
                <a href="#" class="block text-base text-gray-900 hover:text-[#F08619] font-roboto py-1">Permendikbudristek No. 30 Tahun 2021</a>
                </div>
            </div>
            </div>
          <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="/login" class="text-base font-semibold tracking-wide text-gray-50 bg-[#F08619] hover:bg-[#3B6BA2] flex items-center gap-1 font-roboto px-7 py-2 rounded-xl">
              Masuk <i class="fa-solid fa-right-to-bracket"></i>
            </a>
          </div>
        </nav>

        <!-- Mobile Dropdown Menu -->
        <div x-show="isOpen" x-transition class="lg:hidden px-6 py-4 bg-white shadow-md space-y-2 rounded-lg" x-data="{ showDocuments: false }">
        <!-- Navigasi Utama -->
        <a @click="isOpen = false" href="#" class="block text-base text-gray-900 hover:bg-gray-100 px-4 py-2 rounded-md">Beranda</a>
        <a @click="isOpen = false" href="#berita" class="block text-base text-gray-900 hover:bg-gray-100 px-4 py-2 rounded-md">Berita</a>
        <a @click="isOpen = false" href="#tentang" class="block text-base text-gray-900 hover:bg-gray-100 px-4 py-2 rounded-md">Tentang Kami</a>
        
        <!-- Dropdown Dokumen -->
        <button @click="showDocuments = !showDocuments" class="w-full text-left text-base text-gray-900 hover:bg-gray-100 px-4 py-2 rounded-md flex items-center justify-between">
            Dokumen
            <svg :class="{ 'rotate-180': showDocuments }" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div x-show="showDocuments" x-transition class="pl-6 space-y-1">
            <a href="#" class="block text-base text-gray-800 hover:text-blue-600 hover:underline">Permendikbudristek No. 55 Tahun 2024</a>
            <a href="#" class="block text-base text-gray-800 hover:text-blue-600 hover:underline">Permendikbudristek No. 30 Tahun 2021</a>
        </div>

        <a @click="isOpen = false" href="/login" class="block text-base font-semibold tracking-wide text-white bg-[#F08619] hover:bg-[#3B6BA2] px-4 py-2 rounded-lg mt-2 text-center">
            Masuk <i class="fa-solid fa-right-to-bracket"></i>
          </a>
        </div>
      </header>

    <!-- Bagian Beranda -->
    <section id="beranda"
        class="m-3 mt-28 bg-cover bg-center bg-no-repeat rounded-lg px-4 sm:px-6 md:px-10 py-10"
        style="background-image: url('img/section1.png')">
            <div class="mx-auto max-w-2xl py-16 sm:py-12 lg:max-w-none lg:py-32">
                <div class="lg:mt-6 space-y-12 lg:grid lg:grid-cols-2 lg:space-y-0 lg:gap-x-6">
                    <div>
                        <img src="img/berita1.png" alt="">
                        <h1 class="font-bold text-gray-50 tracking-widest lg:text-5xl md:text-5xl text-4xl text-justify lg:w-100 md:w-100 mx-auto">LAPOR AMAN</h1>
                        <h4 class="font-semibold text-[#F08619] tracking-widest lg:text-xl md:text-xl text-lg text-justify lg:w-100 md:w-100 mx-auto">INSTITUT TEKNOLOGI B.J. HABIBIE</h4>
                        <p class="text-gray-50 text-justify lg:w-100 md:w-100 mx-auto lg:text-xl md:text-xl text-lg">Sejak tahun 2022, ITH telah memulai menyusun kebijakan pencegahan dan penanganan pelecehan seksual melalui surat keputusan Rektor ITH tentang pedoman pencegahan pelecehan seksual di lingkungan ITH.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-[#F08619] tracking-wider text-xl text-center">Jangan Takut Untuk Laporkan 
                        <br>Kami Membersamai Anda</h4>
                        <a href="/login" class="flex items-center gap-6 font-rubik font-medium tracking-wider bg-[#F08619] text-white text-lg px-10 py-4 rounded-full w-60 mx-auto mt-4 hover:bg-[#3B6BA2]" ><i class="fa-solid fa-envelope"></i>Buat Aduan</a>
                        <a href="#" class="flex items-center gap-6 font-rubik font-medium tracking-wider bg-transparent outline-solid text-gray-50 text-lg px-10 py-4 rounded-full w-60 mx-auto mt-4 hover:bg-[#3B6BA2]" ><i class="fa-regular fa-bell"></i> Lihat Aduan</a>
                      </div>
                    </div>
                </div>
            </div>
    </section>  
    <x-body-user>
    </x-body-user>
    <x-faq></x-faq>
</body>
</html>
