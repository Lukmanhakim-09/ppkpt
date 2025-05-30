<!DOCTYPE html>
<html lang="en">
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
    
    <x-nav-bar>
        <x-slot name="Label1">Tentang Kami</x-slot>
        <x-slot name="Label2">Pelapor</x-slot>
    </x-nav-bar>

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
                        <div x-data="{ tampil: false }">
                        <button @click="tampil = true" class="flex items-center gap-6 font-rubik font-medium tracking-wider bg-[#F08619] text-white text-lg px-10 py-4 rounded-full w-60 mx-auto mt-4 hover:bg-[#3B6BA2]" ><i class="fa-solid fa-envelope"></i>Buat Aduan</button>
                        <a href="#" class="flex items-center gap-6 font-rubik font-medium tracking-wider bg-transparent outline-solid text-gray-50 text-lg px-10 py-4 rounded-full w-60 mx-auto mt-4 hover:bg-[#3B6BA2]" ><i class="fa-regular fa-bell"></i> Lihat Aduan</a>
                        <div x-show="tampil">
                            <x-pelaporan></x-pelaporan>
                        </div>
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