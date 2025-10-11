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
<body class="bg-[#E0DEDE]">
    <x-nav-barr>
        <x-slot name="label1">Beranda</x-slot>
        <x-slot name="label2">Berita</x-slot>
        <x-slot name="label3">Statistik</x-slot>
    </x-nav-barr>

    <div class="mt-36">
        <section id="beranda" class="scroll-mt-35">
            <div class="lg:mt-6 space-y-12 lg:grid lg:grid-cols-2 lg:space-y-0 lg:gap-x-6">
              <div class="flex flex-col gap-5">
                <div class="bg-[#0970A5] text-gray-50 text-center items-center justify-center rounded-r-full py-10" >
                  <h1 class="font-bold text-4xl tracking-widest">LAPOR AMAN</h1>
                  <h4 class="font-semibold text-lg tracking-widest">INSTITUT TEKNOLOGI B.J. HABIBIE</h4>
                  
                </div>
                <div class="flex flex-col gap-4 items-center justify-center">
                  <a href="#" class="bg-[#0970A5] text-gray-50 text-center rounded-full w-[320px] py-4 text-lg tracking-wider gap-2 flex items-center justify-center hover:bg-[#3B6BA2] font-medium"><i class="fa-regular fa-folder-open"></i>Laporan Ditangani</a>
                  <a href="#" class="bg-[#0970A5] text-gray-50 text-center rounded-full w-[320px] py-4 text-lg tracking-wider gap-2 flex items-center justify-center hover:bg-[#3B6BA2] font-medium"><i class="fa-solid fa-handshake"></i>Tahap Mediasi</a>
                  <a href="#" class="bg-[#0970A5] text-gray-50 text-center rounded-full w-[320px] py-4 text-lg tracking-wider gap-2 flex items-center justify-center hover:bg-[#3B6BA2] font-medium"><i class="fa-solid fa-arrow-up-right-dots"></i>Tahap Eskalasi</a>
                  <a href="#" class="bg-[#0970A5] text-gray-50 text-center rounded-full w-[320px] py-4 text-lg tracking-wider gap-2 flex items-center justify-center hover:bg-[#3B6BA2] font-medium"><i class="fa-solid fa-square-check"></i>Laporan Selesai</a>
                </div>
              </div>
                <div class="flex flex-col gap-4 items-center justify-center">
                    @forelse ($aduans->take(3) as $aduan)
                    <div class="shadow-lg rounded-3xl bg-gray-50 flex p-6 lg:w-[550px] gap-4">  
                        <div class="flex flex-col lg:w-[300px] md:w-[200px]">
                            <h5 class="font-semibold break-all">{{ $aduan->kode_aduan }}</h5>
                            <p>Tanggal Peristiwa : 
                                {{ $aduan->tanggal_peristiwa ? \Carbon\Carbon::parse($aduan->tanggal_peristiwa)->format('d/m/Y') : '-' }}
                            </p>

                            <p>Kategori : {{ $aduan->category }}</p>
                            <p>Kronologi : {{ Str::limit($aduan->chronology, 50, '...') }}</p>
                        </div>
                        <div class="flex flex-col items-end justify-between gap-2 ml-auto">
                            <span class="text-[#C53030] font-semibold text-right">Urgent</span>
                            <a href="#" class="bg-[#F08619] hover:bg-[#3B6BA2] transition-colors text-white px-3 py-2 rounded-lg text-sm font-medium whitespace-nowrap">Lihat Detail</a>
                        </div>
                    </div>
                    @empty
                    <div class="text-center text-gray-500">
                        Tidak ada aduan.
                    </div>
                    @endforelse
                    @if($aduans->count() > 3)
                    <a href="#" class="bg-[#F08619] text-gray-50 text-center rounded-full w-[200px] py-2 text-lg tracking-wider flex items-center justify-center hover:bg-[#3B6BA2] font-medium text-md">Semua Laporan</a>
                    @endif
                </div>       
            </div>
        </section>

        <section id="berita" class="m-12 scroll-mt-35">
          <x-berita :beritas="$beritas"></x-berita>
        </section>

        <section id="tentang" class="m-12 scroll-mt-35">
          <div class="flex flex-col items-center justify-center text-center">
            <h1 class="font-bold text-4xl tracking-widest my-8">Statistik PPKPT</h1>
            <div class="flex flex-wrap gap-6 items-center justify-center max-w-4xl">
              
              <!-- Kartu Statistik 1 -->
              <div class="flex flex-col items-center bg-[#F08619] text-white shadow-xl rounded-2xl px-6 py-4 w-60 hover:scale-105 transition-transform duration-300">
                <h6 class="font-semibold text-lg mb-2">Jumlah Aduan Masuk</h6>
                <p class="text-2xl font-bold flex items-center gap-2">
                  <i class="fa-solid fa-file-circle-plus"></i> 100
                </p>
              </div>
              
              <!-- Kartu Statistik 2 -->
              <div class="flex flex-col items-center bg-[#3B6BA2] text-white shadow-xl rounded-2xl px-6 py-4 w-60 hover:scale-105 transition-transform duration-300">
                <h6 class="font-semibold text-lg mb-2">Jumlah Aduan Selesai</h6>
                <p class="text-2xl font-bold flex items-center gap-2">
                  <i class="fa-solid fa-file-circle-check"></i> 100
                </p>
              </div>
              
              <!-- Kartu Statistik 3 -->
              <div class="flex flex-col items-center bg-[#D9534F] text-white shadow-xl rounded-2xl px-6 py-4 w-60 hover:scale-105 transition-transform duration-300">
                <h6 class="font-semibold text-lg mb-2">Jumlah Aduan Ditolak</h6>
                <p class="text-2xl font-bold flex items-center gap-2">
                  <i class="fa-solid fa-file-circle-xmark"></i> 100
                </p>
              </div>
              
            </div>
          </div>
        </section>
        <div class="text-center p-2 font-roboto tracking-wider text-base">Hak Cipta © Institut Teknologi Bacharuddin Jusuf Habibie</div>
    </div>
</body>
</html>