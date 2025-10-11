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
<body x-data="{ selectedAduan: null, showRejectForm: false, showConfirmModal: false, confirmAduanId: null }">
    <x-nav-baar></x-nav-baar>
    <div class="flex mt-31">
      <!-- Sidebar -->
      <div class="h-[520px] w-[300px] bg-[#F08619] px-4 py-15 shadow-lg rounded-lg lg:block hidden">
        <x-sidebar :active="'formulir'"></x-sidebar>
        <div class="bg-[#E0DEDE] rounded-lg shadow-lg lg:mx-4 mx-2 w-[400px] lg:h-[520px] h-auto flex flex-col">
          <div class="px-6 pt-4 pb-3 sticky top-0 z-10">
              <!-- Pencarian -->
              <div class="flex items-center gap-2 border border-gray-300 rounded-lg px-3 py-2 bg-white shadow-sm w-full">
                <i class="fa-solid fa-magnifying-glass text-gray-500"></i>
                <input type="text" placeholder="Cari Aduan..." class="outline-none w-full" id="searchInput">
              </div>
          </div>
          
          <!--Aduan-->
          <div class="px-6 pb-4 overflow-y-auto flex-1">
              <div class="flex flex-col gap-2 pt-2">
                @forelse($aduans as $aduan)
                <div @click="selectedAduan = {{ $aduan->id }}; showRejectForm = false" 
                     :class="selectedAduan === {{ $aduan->id }} ? 'bg-[#F08619] text-white' : 'bg-white'"
                     class="flex gap-2 p-4 rounded-lg hover:shadow-md transition-all cursor-pointer">
                  <i class="fa-solid fa-file-circle-check text-5xl" :class="selectedAduan === {{ $aduan->id }} ? 'text-white' : 'text-[#F08619]'"></i>
                  <div class="flex flex-col">
                    <h1 class="font-bold">{{ $aduan->kode_aduan }}</h1>
                    <p>{{ $aduan->created_at->translatedFormat('d F Y') }}</p>
                  </div>
                </div>
                @empty
                <div class="text-center py-4 text-gray-500">
                  Tidak ada data aduan
                </div>
                @endforelse
              </div>
          </div>
        </div>  
        <div class="bg-[#E0DEDE] rounded-lg shadow-lg lg:mr-4 mr-2 w-[890px] lg:h-[520px] h-auto px-2 py-6 lg:overflow-y-auto">
          <div class="px-6 pb-4">
          @if(session('success'))
                <div 
                    x-data="{ show: true }" 
                    x-init="setTimeout(() => show = false, 5000)" 
                    x-show="show" 
                    x-transition 
                    class="fixed top-28 right-4 z-50"
                >
                    <div class="flex items-center px-6 py-4 rounded-lg shadow-lg bg-green-500 text-white">
                        <i class="fas fa-check-circle mr-3"></i>
                        <div class="text-md font-semibold">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            @endif
            <template x-if="selectedAduan">
              <div>
                @foreach($aduans as $aduan)
                <div x-show="selectedAduan === {{ $aduan->id }}">
                  <p class="font-bold tracking-wider text-[#F08619]">IDENTITAS PELAPOR</p>
                  <table class="w-full border-collapse">
                    <tbody>
                      <tr>
                        <td class="font-bold">Nama Pelapor</td>
                        <td class="px-2 w-4">:</td>
                        <td class="w-100">{{ $aduan->nama_pelapor ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">Alamat</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->alamat_pelapor ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">File Pernyataan</td>
                        <td class="px-2">:</td>
                        <td class="w-100">
                          @if($aduan->pernyataan_pelapor)
                          <a href="{{ asset('storage/' . $aduan->pernyataan_pelapor) }}" target="_blank" class="text-[#0970A5] hover:underline">Lihat File</a>
                          @else
                          -
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td class="font-bold">Email</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->email_pelapor ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">No. HP</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->phone_pelapor ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">Hubungi</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->hubungi ?? '-' }}</td>
                      </tr>
                    </tbody>
                  </table>

                  <p class="font-bold tracking-wider text-[#F08619] mt-4">IDENTITAS KORBAN</p>
                  <table class="w-full border-collapse">  
                    <tbody>
                      <tr>
                        <td class="font-bold">Nama Korban</td>
                        <td class="px-2 w-4">:</td>
                        <td class="w-100">{{ $aduan->nama_korban ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">Jenis Kelamin</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->jenis_kelamin_korban ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">Alamat</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->alamat_korban ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">No. HP</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->phone_korban ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">Status Di Kampus</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->status_korban ?? '-' }}</td>
                      </tr>
                    </tbody>
                  </table>

                  <p class="font-bold tracking-wider text-[#F08619] mt-4">IDENTITAS TERLAPOR</p>
                  <table class="w-full border-collapse">  
                    <tbody>
                      <tr>
                        <td class="font-bold">Nama Terlapor</td>
                        <td class="px-2 w-4">:</td>
                        <td class="w-100">{{ $aduan->nama_terlapor ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">Jenis Kelamin</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->jenis_kelamin_terlapor ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">Alamat</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->alamat_terlapor ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">No. HP</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->phone_terlapor ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">Status Di Kampus</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->status_terlapor ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">Karakteristik</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->karakteristik_terlapor ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">Peringatan</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->warning_detail ?? '-' }}</td>
                      </tr>
                    </tbody>
                  </table>

                  <p class="font-bold tracking-wider text-[#F08619] mt-4">PERISTIWA</p>
                  <table class="w-full border-collapse">  
                    <tbody>
                      <tr>
                        <td class="font-bold">Tanggal Peristiwa</td>
                        <td class="px-2 w-4">:</td>
                        <td class="w-100">{{ $aduan->tanggal_peristiwa ? \Carbon\Carbon::parse($aduan->tanggal_peristiwa)->translatedFormat('d F Y') : '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">Kategori</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->category ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">Kronologi Peristiwa</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->chronology ?? '-' }}</td>
                      </tr>
                      <tr>
                        <td class="font-bold">File Bukti</td>
                        <td class="px-2">:</td>
                        <td class="w-100">
                          @if($aduan->bukti_pelaporan)
                          <a href="{{ asset('storage/' . $aduan->bukti_pelaporan) }}" target="_blank" class="text-[#0970A5] hover:underline">Lihat File</a>
                          @else
                          -
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td class="font-bold">Lokasi</td>
                        <td class="px-2">:</td>
                        <td class="w-100">{{ $aduan->lokasi ?? '-' }}</td>
                      </tr>
                    </tbody>
                  </table>
                  
                  <!-- Tombol Awal -->
                  <div x-show="!showRejectForm" class="flex gap-2 mt-4">
                    <form :id="'form-kirim-' + {{ $aduan->id }}" action="{{ route('admin.kirimKeSatgas', $aduan->id) }}" method="POST" class="inline">
                      @csrf
                    </form>
                    <button @click="showConfirmModal = true; confirmAduanId = {{ $aduan->id }}" 
                            class="bg-[#F08619] text-white px-4 py-2 rounded-lg hover:bg-[#0970A5]">
                      Kirim Ke Satgas
                    </button>
                    <button @click="showRejectForm = true" class="bg-[#F08619] text-white px-4 py-2 rounded-lg hover:bg-[#0970A5]">Tolak Aduan</button>
                  </div>

                  <!-- Form Penolakan -->
                  <div x-show="showRejectForm" class="mt-4">
                    <form action="{{ route('admin.tolakAduan', $aduan->id) }}" method="POST">
                      @csrf
                      <label class="block font-bold mb-2">Alasan Penolakan:</label>
                      <textarea
                        name="alasan_penolakan"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#F08619] resize-none"
                        rows="4"
                        placeholder="Masukkan alasan penolakan aduan..."></textarea>
                      <div class="flex gap-2 mt-3">
                        <button type="button" @click="showRejectForm = false" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Batal</button>
                        <button type="submit" class="bg-[#F08619] text-white px-4 py-2 rounded-lg hover:bg-[#0970A5]">Kirim</button>
                      </div>
                    </form>
                  </div>
                </div>
                @endforeach
              </div>
            </template>
            
            <template x-if="!selectedAduan">
              <div class="text-center py-20 text-gray-500">
                <p class="text-lg font-semibold">Pilih salah satu aduan untuk melihat detail</p>
              </div>
            </template>
          </div>
        </div>  
      </div>
    </div>
    
    <!-- Modal Konfirmasi Kirim Ke Satgas -->
    <div x-show="showConfirmModal" 
         x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center"
         @click.self="showConfirmModal = false">
      <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4"
           @click.stop>
        <div class="flex items-center justify-center mb-4">
          <div class="bg-[#F08619] rounded-full p-3">
            <i class="fas fa-question text-white text-3xl"></i>
          </div>
        </div>
        <h3 class="text-xl font-bold text-center mb-2">Konfirmasi Pengiriman</h3>
        <p class="text-gray-600 text-center mb-6">
          Apakah Anda yakin ingin mengirim aduan ini ke Satgas?
        </p>
        <div class="flex gap-3 justify-center">
          <button @click="showConfirmModal = false" 
                  class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
            Batal
          </button>
          <button @click="document.getElementById('form-kirim-' + confirmAduanId).submit()" 
                  class="px-6 py-2 bg-[#F08619] text-white rounded-lg hover:bg-[#0970A5] transition">
            Ya, Kirim
          </button>
        </div>
      </div>
    </div>

    <style>
      [x-cloak] { display: none !important; }
    </style>
    
</body>
</html>