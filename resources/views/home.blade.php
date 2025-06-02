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
      <x-nav-barr></x-nav-barr>

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
    <section id="berita" class="m-3 bg-cover bg-center bg-no-repeat rounded-lg px-4 sm:px-6 md:px-10 py-10 scroll-mt-28"
    style="background-image: url('img/section2.png')">
    <x-berita :beritas="$beritas"></x-berita>
    </section>
    <section id="tentang"
    class="m-3 bg-cover bg-center bg-no-repeat rounded-lg px-4 sm:px-6 md:px-10 py-10 scroll-mt-28"
    style="background-image: url('img/section3.png')">
        <div class="mx-auto max-w-6xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Kontak & Form -->
            <div class="text-gray-50">
                <h1 class="font-bold tracking-widest text-4xl sm:text-5xl text-left">KONTAK</h1>
                <h4 class="font-semibold tracking-widest text-lg sm:text-xl pt-8"><i class="fa-solid fa-phone"></i> 0895-7923-6768</h4>
                <h4 class="font-semibold tracking-widest text-lg sm:text-xl pt-2"><i class="fa-solid fa-envelope"></i> satgash4pksith@gmail.com</h4>
                <h4 class="font-semibold tracking-widest text-lg sm:text-xl pt-2"><i class="fa-brands fa-instagram"></i> satgasppksith07</h4>

                <form class="space-y-3 mt-6" action="#" method="POST">
                    <input type="text" name="nama" placeholder="Nama"
                        class="w-full rounded-xl bg-white px-5 py-2 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                    <input type="email" name="email" placeholder="Alamat Email"
                        class="w-full rounded-xl bg-white px-5 py-2 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                    <textarea name="pesan" placeholder="Pesan"
                        class="w-full h-40 rounded-xl bg-white px-5 py-2 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#F08619] resize-none"></textarea>
                    <button type="submit"
                        class="w-full rounded-xl bg-[#F08619] px-5 py-3 text-sm font-bold text-white shadow hover:bg-[#3B6BA2] tracking-wider font-rubik">Kirim</button>
                </form>
            </div>

            <!-- Alamat & Peta -->
            <div class="text-gray-50 text-center lg:text-left flex flex-col justify-center">
                <h4 class="font-medium tracking-wider text-base sm:text-lg font-roboto mb-4 text-center justify-center">
                    Kampus 1 Jalan Balai Kota No.1<br>
                    Kota Parepare, Sulawesi Selatan, Indonesia
                </h4>
                <div class="w-full">
                    <iframe class="w-full h-64 sm:h-80 rounded-xl"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.9591203870123!2d119.63075877367123!3d-4.028759844771094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d95bbb762bcd13d%3A0x95845218a1ae2419!2sInstitut%20Teknologi%20Bacharuddin%20Jusuf%20Habibie%20(ITH)%20-%20Kampus%201!5e0!3m2!1sid!2sid!4v1717369585160!5m2!1sid!2sid"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center p-2 font-roboto tracking-wider text-base">Hak Cipta © Institut Teknologi Bacharuddin Jusuf Habibie</div>
    </div>
    <x-faq></x-faq>
</body>
</html>
