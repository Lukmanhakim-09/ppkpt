<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{config('app.name')}}</title>
    @vite('resources/css/app.css')
    <link
      rel="stylesheet"  
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  </head>
<body>
    <x-nav-baar></x-nav-baar>

    <div class="max-w-full mx-auto mt-25 p-6 bg-white rounded-2xl shadow-lg">
        <h2 class="text-2xl font-semibold text-[#0970A5] mb-6 text-center">
            Hasil Investigasi Aduan
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Kronologi -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="font-semibold text-gray-700 mb-2">Kronologi Singkat</h3>
                <p class="text-gray-600">{{ $investigasi->kronologi ?? '-' }}</p>
            </div>

            <!-- Fakta -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="font-semibold text-gray-700 mb-2">Fakta Terbukti</h3>
                <p class="text-gray-600">{{ $investigasi->fakta_terbukti ?? '-' }}</p>
                <h3 class="font-semibold text-gray-700 mt-4 mb-2">Fakta Tidak Terbukti</h3>
                <p class="text-gray-600">{{ $investigasi->fakta_tidak_terbukti ?? '-' }}</p>
            </div>

            <!-- Tindak Lanjut -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="font-semibold text-gray-700 mb-2">Tindak Lanjut</h3>
                @if($investigasi->tindak_lanjut)
                    <ul class="list-disc list-inside text-gray-600">
                        @foreach(json_decode($investigasi->tindak_lanjut) as $tindak)
                            <li>{{ ucwords(str_replace('_', ' ', $tindak)) }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-600">Belum ada tindak lanjut</p>
                @endif
            </div>

            <!-- Kesimpulan -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="font-semibold text-gray-700 mb-2">Kesimpulan</h3>
                <p class="text-gray-600">{{ $investigasi->kesimpulan ?? '-' }}</p>
            </div>

            <!-- Hasil Akhir -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="font-semibold text-gray-700 mb-2">Hasil Akhir</h3>
                <p class="text-gray-600">{{ ucwords(str_replace('_', ' ', $investigasi->hasil_akhir ?? '-')) }}</p>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="text-center mt-6">
            <a href="{{ route('user.home') }}" 
            class="bg-[#F08619] hover:bg-[#3B6BA2] text-white px-6 py-3 rounded-lg font-medium transition-colors">
                Kembali ke Halaman Utama
            </a>
        </div>
    </div>

</body>
</html>