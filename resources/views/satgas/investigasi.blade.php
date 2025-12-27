<!DOCTYPE html>
<html lang="id">
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
    <div class="flex mt-31">
        <div class="h-[520px] w-[300px] bg-[#0970A5] px-4 py-15 shadow-lg rounded-lg lg:block hidden">
            <x-sidebarr :active="'laporan-ditangani'"></x-sidebarr>
            <div class="bg-[#E0DEDE] rounded-lg shadow-lg lg:mx-4 mx-2 w-[100%] lg:h-[520px] h-screen p-2 overflow-y-auto">
                <div class="px-6 py-4 relative w-full mb-4 flex items-center">
                  <!-- Tombol Kembali -->
                  <a href="{{ route('satgas.laporanditangani') }}"
                  class="absolute left-8 flex items-center justify-center
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
                <div class="bg-[#E0DEDE] px-6 rounded-xl">
                    <form action="" method="post">
                      <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-base font-semibold text-[#0970A5]
                                    border-l-4 border-[#0970A5] pl-3">
                                Informasi Aduan
                            </h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">
                          <div class="flex flex-col">
                              <label class="text-gray-600 mb-1 font-medium">Kode Aduan</label>
                              <input type="text" 
                                    class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5]">
                          </div>
                          <div class="flex flex-col">
                              <label class="text-gray-600 mb-1 font-medium">Tanggal Awal</label>
                              <input type="text" 
                                    class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5]">
                          </div>
                          <div class="flex flex-col">
                              <label class="text-gray-600 mb-1 font-medium">Jenis Kekerasan</label>
                              <input type="text" 
                                    class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5]">
                          </div>
                          <div class="flex flex-col">
                              <label class="text-gray-600 mb-1 font-medium">Lokasi Kejadian</label>
                              <input type="text" 
                                    class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5]">
                          </div>
                        </div>
                    </div>  

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-base font-semibold text-[#0970A5]
                                    border-l-4 border-[#0970A5] pl-3">
                                Pihak Terkait
                            </h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 text-sm">
                          <!-- Card Data Korban -->
                          <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                            <h3 class="text-base font-semibold text-[#0970A5] border-l-4 border-[#0970A5] pl-3 mb-6">
                                Data Korban
                            </h3>

                            <div class="space-y-4">
                                <!-- Nama Korban -->
                                <div class="flex flex-col">
                                    <label for="nama_korban" class="text-gray-600 font-medium mb-1">Nama Korban</label>
                                    <input type="text" id="nama_korban" name="nama_korban"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5]">
                                </div>

                                <!-- Status -->
                                <div class="flex flex-col">
                                    <label for="status_korban" class="text-gray-600 font-medium mb-1">Status</label>
                                    <select id="status_korban" name="status_korban"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5]">
                                        <option value="Mahasiswa">Mahasiswa</option>
                                        <option value="Dosen">Dosen</option>
                                        <option value="Staff">Staff</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                          <!-- Card Data Terlapor -->
                          <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                              <h3 class="text-base font-semibold text-[#0970A5] border-l-4 border-[#0970A5] pl-3 mb-4">
                                  Data Terlapor
                              </h3>
                              <div class="space-y-4">
                                <!-- Nama Korban -->
                                <div class="flex flex-col">
                                    <label for="nama_korban" class="text-gray-600 font-medium mb-1">Nama Terlapor</label>
                                    <input type="text" id="nama_korban" name="nama_korban"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5]">
                                </div>

                                <!-- Status -->
                                <div class="flex flex-col">
                                    <label for="status_korban" class="text-gray-600 font-medium mb-1">Status</label>
                                    <select id="status_korban" name="status_korban"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5]">
                                        <option value="Mahasiswa">Mahasiswa</option>
                                        <option value="Dosen">Dosen</option>
                                        <option value="Staff">Staff</option>
                                    </select>
                                </div>
                            </div>
                          </div>

                          <!-- Card Data Saksi -->
                          <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                              <h3 class="text-base font-semibold text-[#0970A5] border-l-4 border-[#0970A5] pl-3 mb-4">
                                  Data Saksi
                              </h3>
                              <div class="space-y-4">
                                <!-- Nama Korban -->
                                <div class="flex flex-col">
                                    <label for="nama_korban" class="text-gray-600 font-medium mb-1">Nama Korban</label>
                                    <input type="text" id="nama_korban" name="nama_korban"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5]">
                                </div>

                                <!-- Status -->
                                <div class="flex flex-col">
                                    <label for="status_korban" class="text-gray-600 font-medium mb-1">Keterangan Singkat</label>
                                    <textarea name="" id="" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5] resize-none"></textarea>
                                </div>
                            </div>
                          </div>
                      </div>

                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
                      <h2 class="text-base font-semibold text-[#0970A5] border-l-4 border-[#0970A5] pl-3 mb-4">
                          Proses Investigasi
                      </h2>

                      <!-- Checklist -->
                      <div class="flex flex-col space-y-2 mb-4">
                          <label class="flex items-center gap-2">
                              <input type="checkbox" class="accent-[#0970A5]">
                              Wawancara Korban
                          </label>
                          <label class="flex items-center gap-2">
                              <input type="checkbox" class="accent-[#0970A5]">
                              Wawancara Saksi
                          </label>
                          <label class="flex items-center gap-2">
                              <input type="checkbox" class="accent-[#0970A5]">
                              Wawancara Terlapor
                          </label>
                          <label class="flex items-center gap-2">
                              <input type="checkbox" class="accent-[#0970A5]">
                              Pemeriksaan Bukti
                          </label>
                      </div>

                      <!-- Textarea Catatan -->
                      <div class="flex flex-col">
                          <span class="text-gray-600 font-medium mb-1">Catatan Singkat Proses Investigasi</span>
                          <textarea class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5] resize-none" 
                                    placeholder="Tulis catatan singkat di sini..."></textarea>
                      </div>
                  </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
                        <h2 class="text-base font-semibold text-[#0970A5] border-l-4 border-[#0970A5] pl-3 mb-4">
                            Temuan Investigasi
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">
                            <!-- Kronologi -->
                            <div class="flex flex-col">
                                <label class="text-gray-600 mb-1 font-medium">Kronologi Kejadian (Versi Tim Investigasi)</label>
                                <textarea class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5] resize-none"></textarea>
                            </div>

                            <!-- Ringkasan Wawancara Korban -->
                            <div class="flex flex-col">
                                <label class="text-gray-600 mb-1 font-medium">Ringkasan Wawancara Korban</label>
                                <textarea class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5] resize-none"></textarea>
                            </div>

                            <!-- Ringkasan Wawancara Saksi -->
                            <div class="flex flex-col">
                                <label class="text-gray-600 mb-1 font-medium">Ringkasan Wawancara Saksi</label>
                                <textarea class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5] resize-none"></textarea>
                            </div>

                            <!-- Ringkasan Wawancara Terlapor -->
                            <div class="flex flex-col">
                                <label class="text-gray-600 mb-1 font-medium">Ringkasan Wawancara Terlapor</label>
                                <textarea class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5] resize-none"></textarea>
                            </div>

                            <!-- Fakta Terbukti -->
                            <div class="flex flex-col">
                                <label class="text-gray-600 mb-1 font-medium">Fakta Yang Terbukti</label>
                                <textarea class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5] resize-none"></textarea>
                                <input 
                                    type="file" 
                                    class="mt-2 w-full text-sm text-gray-500
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-lg file:border-0
                                          file:text-sm file:font-semibold
                                          file:bg-[#0970A5] file:text-white
                                          hover:file:bg-[#085d88]
                                          focus:outline-none focus:ring-2 focus:ring-[#0970A5]"
                                />

                            </div>

                            <!-- Fakta Tidak Terbukti -->
                            <div class="flex flex-col">
                                <label class="text-gray-600 mb-1 font-medium">Fakta Yang Tidak Terbukti</label>
                                <textarea class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5] resize-none"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
                        <h2 class="text-base font-semibold text-[#0970A5] border-l-4 border-[#0970A5] pl-3 mb-6">
                            Hasil & Tindak Lanjut
                        </h2>

                        <!-- Checklist Tindak Lanjut -->
                        <div class="mb-6">
                            <span class="block text-gray-600 font-medium mb-3">Tindak Lanjut</span>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" class="accent-[#0970A5]">
                                    Konseling
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" class="accent-[#0970A5]">
                                    Pendampingan
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" class="accent-[#0970A5]">
                                    Sanksi Administratif
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" class="accent-[#0970A5]">
                                    Rujukan Lanjutan
                                </label>
                            </div>
                        </div>

                        <!-- Catatan Tindak Lanjut -->
                        <div class="flex flex-col mb-6">
                            <label class="text-gray-600 font-medium mb-1">
                                Catatan Tindak Lanjut
                            </label>
                            <textarea
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5] resize-none"
                                rows="3"
                                placeholder="Tulis catatan singkat tindak lanjut..."
                            ></textarea>
                        </div>

                        <!-- Hasil Akhir -->
                        <div class="flex flex-col mb-6">
                            <label class="text-gray-600 font-medium mb-1">
                                Hasil Akhir Investigasi
                            </label>
                            <select
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5] bg-white"
                            >
                                <option value="">-- Pilih hasil akhir --</option>
                                <option value="terbukti">Terbukti</option>
                                <option value="sebagian_terbukti">Sebagian Terbukti</option>
                                <option value="tidak_terbukti">Tidak Terbukti</option>
                            </select>
                        </div>

                        <!-- Kesimpulan Investigasi -->
                        <div class="flex flex-col">
                            <label class="text-gray-600 font-medium mb-1">
                                Kesimpulan Investigasi
                            </label>
                            <textarea
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0970A5] resize-none"
                                rows="4"
                                placeholder="Tulis kesimpulan akhir berdasarkan hasil investigasi..."
                            ></textarea>
                        </div>
                    </div>


                  <div class="flex justify-end mt-4 gap-3">
                      <!-- Draft -->
                      <button type="submit" name="status_investigasi" value="draft"
                          class="px-6 py-3 rounded-lg bg-gray-400 text-white font-semibold hover:bg-gray-500 shadow-md hover:shadow-lg transition">
                          Simpan Draft
                      </button>

                      <!-- Publish -->
                      <button type="submit" name="status_investigasi" value="publish"
                          class="px-6 py-3 rounded-lg bg-[#0970A5] text-white font-semibold hover:bg-[#085d88] shadow-md hover:shadow-lg transition">
                          Investigasi
                      </button>
                  </div>


                    </form>  
                </div>
            </div>
        </div>
    </div>
</body>
</html>
