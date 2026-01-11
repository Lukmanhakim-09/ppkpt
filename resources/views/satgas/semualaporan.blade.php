<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Investigasi - PPKPT ITH</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-[#E0DEDE]">

    <x-nav-baar />

<!-- Header -->
<div class="relative bg-[#0970A5] text-gray-50 rounded-r-full py-10 mt-30">

    <!-- Judul -->
    <div class="text-center">
        <h1 class="font-bold text-4xl tracking-widest">LAPOR AMAN</h1>
        <h4 class="font-semibold text-lg tracking-widest">
            INSTITUT TEKNOLOGI B.J. HABIBIE
        </h4>
    </div>

    <!-- Tombol Kembali (bawah kiri) -->
    <a href="{{ route('satgas.home') }}"
       class="absolute left-6 bottom-4 text-sm
              flex items-center gap-2
              bg-white/90 text-[#0970A5]
              px-4 py-2 rounded-full
              font-medium shadow
              hover:bg-white
              transition">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Kembali</span>
    </a>

</div>


    

<!-- Konten -->
<div class="mt-4 px-6 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 justify-items-center">

    @forelse ($aduans as $aduan)
        <div class="shadow-lg rounded-3xl bg-gray-50 flex p-6 gap-2
                    w-full max-w-[550px] h-[170px] overflow-hidden">

            <!-- Info -->
            <div class="flex flex-col flex-1 gap-1 overflow-hidden">
                <h5 class="font-semibold break-all text-gray-800 line-clamp-1">
                    {{ $aduan->kode_aduan }}
                </h5>

                <p class="text-sm text-gray-600 line-clamp-1">
                    <span class="font-medium">Tanggal:</span>
                    {{ $aduan->tanggal_peristiwa
                        ? \Carbon\Carbon::parse($aduan->tanggal_peristiwa)->format('d/m/Y')
                        : '-' }}
                </p>

                <p class="text-sm text-gray-600 line-clamp-1">
                    <span class="font-medium">Kategori:</span>
                    {{ $aduan->category }}
                </p>

                <p class="text-sm text-gray-600 line-clamp-2">
                    <span class="font-medium">Kronologi:</span>
                    {{ $aduan->chronology }}
                </p>
            </div>

            <!-- Aksi -->
            <div class="flex flex-col items-end justify-between h-full gap-2">
                @php
                    $warna = match(strtolower($aduan->prioritas)) {
                    'tinggi'  => 'bg-red-100 text-red-700',
                    'menengah' => 'bg-yellow-100 text-yellow-700',
                    'sedang'  => 'bg-yellow-100 text-yellow-700',
                    'rendah'  => 'bg-green-100 text-green-700',
                    default   => 'bg-gray-100 text-gray-700',
                    };
                @endphp
                <span class="{{ $warna }} px-3 py-1 text-sm font-semibold rounded-full text-right">
                    {{ $aduan->prioritas }}
                </span>

                <a href="{{ route('satgas.detaillaporan', $aduan->id) }}"
                   class="bg-[#F08619] hover:bg-[#3B6BA2]
                          transition-colors text-white
                          px-3 py-2 rounded-lg
                          text-sm font-medium whitespace-nowrap">
                    Lihat Detail
                </a>
            </div>
        </div>

    @empty
        <div class="col-span-full text-center text-gray-500 py-10">
            Tidak ada laporan.
        </div>
    @endforelse

</div>


</body>
</html>
