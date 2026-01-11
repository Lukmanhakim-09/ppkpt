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
    <x-nav-baar></x-nav-baar>
    <div class="max-w-6xl mx-auto px-6 py-8 mt-24">

        <!-- Header -->
        <div class="relative w-full mb-4 flex items-center">
            <!-- Tombol Kembali -->
            <a href="javascript:history.back()"
            class="absolute left-3 flex items-center justify-center
                    w-9 h-9 rounded-full bg-[#0970A5]
                    text-white hover:bg-[#085d88]
                    transition shadow">
                <i class="fa-solid fa-angle-left"></i>
            </a>

            <!-- Judul -->
            <h5 class="font-bold tracking-widest
                    bg-[#0970A5] text-gray-50 text-center
                    rounded-xl w-full py-3 text-xl shadow-md">
                DETAIL ADUAN
            </h5>
        </div>

        <div class="bg-[#E0DEDE] p-6 rounded-xl">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base font-semibold text-[#0970A5]
                            border-l-4 border-[#0970A5] pl-3">
                        Informasi Aduan
                    </h2>

                    @php
                        $warna = match(strtolower($aduan->prioritas)) {
                            'tinggi'  => 'bg-red-100 text-red-700',
                            'menengah' => 'bg-yellow-100 text-yellow-700',
                            'sedang'  => 'bg-yellow-100 text-yellow-700',
                            'rendah'  => 'bg-green-100 text-green-700',
                            default   => 'bg-gray-100 text-gray-700',
                        };
                    @endphp

                    <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $warna }}">
                        {{ $aduan->prioritas ?? '-' }}
                    </span>
                </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">
                <div>
                    <p class="text-gray-500">Kode Aduan</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->kode_aduan ?? '-'}}</p>
                </div>
                <div>
                    <p class="text-gray-500">Kategori</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->category ?? '-'}}</p>
                </div>
                <div>
                    <p class="text-gray-500">Tanggal Peristiwa</p>
                    <p class="font-semibold text-gray-800">
                        {{ $aduan->tanggal_peristiwa ? \Carbon\Carbon::parse($aduan->tanggal_peristiwa)->format('d F Y') : '-' }}
                    </p>
                </div>
                <div>
                    <p class="text-gray-500">Lokasi Kejadian</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->lokasi ?? '-'}}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
            <h2 class="text-base font-semibold text-[#0970A5] mb-4 border-l-4 border-[#0970A5] pl-3">
                Data Pelapor
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">
                <div>
                    <p class="text-gray-500">Nama Pelapor</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->nama_pelapor ?? '-'}}</p>
                </div>
                <div>
                    <p class="text-gray-500">Alamat</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->alamat_pelapor ?? '-'}}</</p>
                </div>
                <div>
                    <p class="text-gray-500">Email</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->email_pelapor ?? '-'}}</p>
                </div>
                <div>
                    <p class="text-gray-500">No HP</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->phone_pelapor ?? '-'}}</p>
                </div>
                <div>
                    <p class="text-gray-500">Bersedia Dihubungi</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->hubungi ?? '-'}}</p>
                </div>
            </div>
        </div>

         <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
            <h2 class="text-base font-semibold text-[#0970A5] mb-4 border-l-4 border-[#0970A5] pl-3">
                Data Korban
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">
                <div>
                    <p class="text-gray-500">Nama Korban</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->nama_korban ?? '-'}}</p>
                </div>
                <div>
                    <p class="text-gray-500">Jenis Kelamin</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->jenis_kelamin_korban ?? '-'}}</p>
                </div>
                <div>
                    <p class="text-gray-500">Alamat</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->alamat_korban ?? '-'}}</p>
                </div>
                <div>
                    <p class="text-gray-500">No HP</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->phone_korban ?? '-'}}</p>
                </div>
                <div>
                    <p class="text-gray-500">Status Korban</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->status_korban ?? '-'}}</p>
                </div>
            </div>
        </div>

         <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
            <h2 class="text-base font-semibold text-[#0970A5] mb-4 border-l-4 border-[#0970A5] pl-3">
                Data Terlapor
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">
                <div>
                    <p class="text-gray-500">Nama Terlapor</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->nama_terlapor ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Jenis Kelamin</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->jenis_kelamin_terlapor ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Alamat</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->alamat_terlapor ?? '-'}}</p>
                </div>
                <div>
                    <p class="text-gray-500">No HP</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->phone_terlapor ?? '-'}}</p>
                </div>
                <div>
                    <p class="text-gray-500">Status</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->status_terlapor ?? '-'}}</p>
                </div>
                <div>
                    <p class="text-gray-500">Karakteristik</p>
                    <p class="font-semibold text-gray-800">{{ $aduan->karakteristik_terlapor ?? '-'}}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
            <h2 class="text-base font-semibold text-[#0970A5] mb-4 border-l-4 border-[#0970A5] pl-3">
                Kronologi
            </h2>

            <div class="space-y-4 text-sm">
                <div>
                    <p class="font-medium text-gray-700 mb-1">Kronologi</p>
                    <div class="bg-gray-50 border rounded-lg p-3 text-gray-700">
                        {{ $aduan->chronology ?? '-'}}
                    </div>
                </div>

            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
            <h2 class="text-base font-semibold text-[#0970A5] mb-4
                    border-l-4 border-[#0970A5] pl-3">
                Bukti & Peringatan
            </h2>

            <div class="text-sm space-y-4">

                <!-- Bukti -->
                <div class="flex items-center">
                    <span class="text-gray-500 w-40">Bukti Pelaporan</span>
                    <span class="text-gray-800 font-medium">
    :
                    @if($aduan->bukti_pelaporan)
                        <a href="{{ asset('storage/' . $aduan->bukti_pelaporan) }}"
                        target="_blank"
                        class="ml-2 text-blue-600 hover:underline">
                            Lihat Dokumen
                        </a>
                    @else
                        <span class="ml-2 text-gray-400 italic">
                            Tidak ada bukti
                        </span>
                    @endif
                </span>
                </div>

                <!-- Peringatan -->
                <div class="flex items-center">
                    <span class="text-gray-500 w-40">Peringatan</span>
                    <span class="ml-2 px-3 py-1 rounded-full text-xs font-semibold
                                bg-red-100 text-red-700">
                        {{ $aduan->warning }}
                    </span>
                </div>

                <!-- Detail Peringatan -->
                <div>
                    <p class="text-gray-500 mb-1">Detail Peringatan</p>
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-3 text-gray-800">
                        {{ $aduan->warning_detail ?? '-'}}
                    </div>
                </div>

            </div>
        </div>


        <div class="flex justify-end items-center gap-4 pt-5 mt-6
                    border-t border-gray-200">

            <!-- Tombol Kembali -->
            <a href="javascript:history.back()"
            class="inline-flex items-center gap-2
                    px-5 py-2.5 rounded-lg
                    bg-white border border-gray-300
                    text-sm font-medium text-gray-700
                    hover:bg-gray-100 hover:border-gray-400
                    transition">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali
            </a>

            <!-- Tombol Terima Aduan -->
             @php
                $latestStatus = $aduan->statuses->first();
            @endphp

            @if(!$latestStatus || $latestStatus->diterima_oleh === null)
                            <form action="{{ route('satgas.terimaaduan', $aduan->id) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="inline-flex items-center gap-2
                    px-6 py-2.5 rounded-lg
                    bg-[#F08619] text-white
                    font-semibold
                    hover:bg-[#0970A5]
                    shadow-md hover:shadow-lg
                    transition"
            class="inline-flex items-center gap-2
                    px-6 py-2.5 rounded-lg
                    bg-[#F08619] text-white
                    transition">
                <i class="fa-solid fa-check"></i>
                Terima Aduan
                </button>
            </form>
            @endif



        </div>

        </div>


    </div>
</body>
</html>