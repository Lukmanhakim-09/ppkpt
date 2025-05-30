<div class="bg-[#000000]/50 absolute top-0 left-0 right-0 bottom-0 lg:h-[1900px] md:h-[2820px] sm:h-[2730px] h-[2830px] lg:p-50 md:px-25 px-10 py-50 z-40">
    <div class="bg-white w-auto h-auto items-center justify-center p-4 rounded-lg">
        <h1 class="relative bg-[#F08619] text-white py-2 text-center font-roboto rounded-lg font-semibold tracking-wider">
        <i @click="tampil = false" class="fa-solid fa-angle-left absolute left-4 top-1/2 -translate-y-1/2"></i>
        BUAT ADUAN
        </h1>  
        <div class="bg-[#E0DEDE] mt-2 w-auto h-auto">
        <!-- Wrapper Alpine -->
        <div x-data="{ tab: 'pelapor' }">

        <!-- MENU PILIHAN -->
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5">
            <div
                @click="tab = 'pelapor'"
                :class="tab === 'pelapor' ? 'bg-[#0970A5] text-white' : 'text-[#F08619]'"
                class="col-span-1 p-3 text-center font-roboto font-semibold tracking-wider cursor-pointer transition">
                PELAPOR
            </div>
            <div
                @click="tab = 'korban'"
                :class="tab === 'korban' ? 'bg-[#0970A5] text-white' : 'text-[#F08619]'"
                class="col-span-1 p-3 text-center font-roboto font-semibold tracking-wider cursor-pointer transition">
                KORBAN
            </div>
            <div
                @click="tab = 'terlapor'"
                :class="tab === 'terlapor' ? 'bg-[#0970A5] text-white' : 'text-[#F08619]'"
                class="col-span-1 p-3 text-center font-roboto font-semibold tracking-wider cursor-pointer transition">
                TERLAPOR
            </div>
            <div
                @click="tab = 'peristiwa'"
                :class="tab === 'peristiwa' ? 'bg-[#0970A5] text-white' : 'text-[#F08619]'"
                class="col-span-1 p-3 text-center font-roboto font-semibold tracking-wider cursor-pointer transition">
                PERISTIWA
            </div>
            <div
                @click="tab = 'tambahan'"
                :class="tab === 'tambahan' ? 'bg-[#0970A5] text-white' : 'text-[#F08619]'"
                class="col-span-1 p-3 text-center font-roboto font-semibold tracking-wider cursor-pointer transition">
                TAMBAHAN
            </div>
        </div>

        <!-- FORM -->
        <form class="p-6 space-y-6" action="#" method="post">

            <!-- FORM PELAPOR -->
            <div x-show="tab === 'pelapor'" x-transition>
                <p class="font-bold tracking-wider text-[#F08619]">IDENTITAS PELAPOR</p>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Nama Lengkap <span class="text-[#F08619]">*</span></label>
                    <input type="text" name="nama_pelapor" id="nama_pelapor" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Alamat <span class="text-[#F08619]">*</span></label>
                    <input type="text" name="alamat_pelapor" id="alamat_pelapor" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">File Pernyataan <span class="text-[#F08619]">*</span></label>
                    <input type="file" name="pernyataan_pelapor" id="pernyataan_pelapor" required
                    class="lg:w-[500px] rounded-lg bg-white text-base border border-gray-300
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-[#F08619] file:text-white
                            hover:file:bg-[#d97706]
                            focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                    <a href="#" class="italic underline text-[#008CFF] hover:text-[#005596] pl-20">Klik Unduh File Pernyataan</a>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Email <span class="text-[#F08619]">*</span></label>
                    <input type="email" name="email_pelapor" id="email_pelapor" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">No Hp <span class="text-[#F08619]">*</span></label>
                    <input type="tel" name="no_hp_pelapor" id="no_hp_pelapor" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Bagaimana Anda lebih nyaman dihubungi?<span class="text-[#F08619]">*</span></label>
                    <div class="space-y-3">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="hubungi" value="email" required
                            class="w-5 h-5 text-[#F08619] bg-white ">
                            <span class="font-semibold">Email</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="hubungi" value="no_hp"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">No Hp</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="hubungi" value="pesan"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Pesan</span>
                        </label>
                    </div>
                </div>
                <div class="flex flex-row justify-between items-center w-full mt-4">
                    <!-- Tombol Berikutnya -->
                    <button @click="tab = 'korban'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                        <span>Berikutnya</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- FORM KORBAN -->
            <div x-show="tab === 'korban'" x-transition>
                <p class="font-bold tracking-wider text-[#F08619]">IDENTITAS KORBAN</p>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Nama Lengkap <span class="text-[#F08619]">*</span></label>
                    <input type="text" name="nama_korban_korban" id="nama_korban_korban" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Jenis Kelamin <span class="text-[#F08619]">*</span></label>
                    <select name="jenis_kelamin_korban" id="jenis_kelamin_korban" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Alamat <span class="text-[#F08619]">*</span></label>
                    <input type="text" name="alamat_korban" id="alamat_korban" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">No HP <span class="text-[#F08619]">*</span></label>
                    <input type="text" name="no_hp_korban" id="no_hp_korban" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Status Di Kampus <span class="text-[#F08619]">*</span></label>
                    <select type="text" name="status_di_kampus_korban" id="status_di_kampus_korban" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                        <option value="" disabled selected>Pilih Status Di Kampus</option>
                        <option value="Pimpinan">Pimpinan</option>
                        <option value="Dosen">Dosen</option>
                        <option value="Tenaga Pendidik">Tenaga Pendidik</option>
                        <option value="Satpam">Satpam</option>
                        <option value="OB">OB</option>
                        <option value="Mahasiswa">Mahasiswa</option>
                    </select>
                </div>
                <div class="flex flex-row justify-between items-center w-full mt-4">
                    <!-- Tombol Sebelumnya -->
                    <button @click="tab = 'pelapor'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Sebelumnya</span>
                    </button>

                    <!-- Tombol Berikutnya -->
                    <button @click="tab = 'terlapor'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                        <span>Berikutnya</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- FORM TERLAPOR -->
            <div x-show="tab === 'terlapor'" x-transition>
                <p class="font-bold tracking-wider text-[#F08619]">IDENTITAS TERLAPOR</p>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Nama Lengkap <span class="text-[#F08619]">*</span></label>
                    <input type="text" name="nama_terlapor" id="nama_terlapor" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Jenis Kelamin <span class="text-[#F08619]">*</span></label>
                    <select name="jenis_kelamin_terlapor" id="jenis_kelamin_terlapor" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Alamat <span class="text-[#F08619]">*</span></label>
                    <input type="text" name="alamat_terlapor" id="alamat_terlapor" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">No HP <span class="text-[#F08619]">*</span></label>
                    <input type="text" name="no_hp_terlapor" id="no_hp_terlapor" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                </div>  
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Status Di Kampus <span class="text-[#F08619]">*</span></label>
                    <select type="text" name="status_di_kampus_terlapor" id="status_di_kampus_terlapor" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                        <option value="" disabled selected>Pilih Status Di Kampus</option>
                        <option value="Pimpinan">Pimpinan</option>
                        <option value="Dosen">Dosen</option>
                        <option value="Tenaga Pendidik">Tenaga Pendidik</option>
                        <option value="Satpam">Satpam</option>
                        <option value="OB">OB</option>
                        <option value="Mahasiswa">Mahasiswa</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Karakteristik <span class="text-[#F08619]">*</span></label>
                    <textarea name="karakteristik_terlapor" id="karakteristik_terlapor" required
                    class="lg:w-[500px] h-[100px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619] resize-none"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Apakah terlapor pernah terlibat dalam kejadian kekerasan lainnya?<span class="text-[#F08619]">*</span></label>
                    <div class="flex flex-row gap-2 text-center">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="terlapor" value="Ya" required
                            class="w-5 h-5 text-[#F08619] bg-white ">
                            <span class="font-semibold">Ya</span>
                        </label>

                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="terlapor" value="Tidak"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak</span>
                        </label>
                    </div>
                </div>
                <div x-data="{ warning: '' }" class="flex flex-col gap-2">
                <label class="font-semibold" for="">
                    Apakah terlapor sudah diberi peringatan atau tindakan sebelumnya? Jika ada, jelaskan
                    <span class="text-[#F08619]">*</span>
                </label>

                <div class="flex flex-row gap-4 text-center">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="warning" value="Ya" x-model="warning" required
                            class="w-5 h-5 text-[#F08619] bg-white">
                        <span class="font-semibold">Ya</span>
                    </label>

                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="warning" value="Tidak" x-model="warning"
                            class="w-5 h-5 text-[#F08619] bg-white">
                        <span class="font-semibold">Tidak</span>
                    </label>
                </div>

                <!-- Input tambahan muncul jika memilih "Ya" -->
                <div x-show="warning === 'Ya'" x-transition>
                    <input type="text" name="warning_detail" placeholder="Jelaskan tindakan atau peringatan sebelumnya"
                        class="mt-2 rounded-lg bg-white px-5 py-2 text-base border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619] w-full lg:w-[500px]">
                </div>
                </div>   
                <div class="flex flex-row justify-between items-center w-full mt-4">
                <!-- Tombol Sebelumnya -->
                <button @click="tab = 'terlapor'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Sebelumnya</span>
                </button>

                <!-- Tombol Berikutnya -->
                <button @click="tab = 'peristiwa'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                    <span>Berikutnya</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
            </div>
            

            <!-- FORM PERISTIWA -->
            <div x-show="tab === 'peristiwa'" x-transition>
                <p class="font-bold tracking-wider text-[#F08619]">PERISTIWA</p>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Tanggal Peristiwa <span class="text-[#F08619]">*</span></label>
                    <input type="date" name="tanggal_peristiwa" id="tanggal_peristiwa" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Kategori <span class="text-[#F08619]">*</span></label>
                    <select type="text" name="status_di_kampus_terlapor" id="status_di_kampus_terlapor" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="Fisik">Fisik</option>
                        <option value="Verbal">Verbal</option>
                        <option value="Seksual">Seksual</option>
                        <option value="Psikologis">Psikologis</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Kronologi Peristiwa <span class="text-[#F08619]">*</span></label>
                    <textarea name="chronology" id="chronology" required
                    class="lg:w-[500px] h-[100px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619] resize-none"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">File Bukti <span class="text-[#F08619]">*</span></label>
                    <input type="file" name="bukti_pelaporan" id="bukti_pelaporan" required
                    class="lg:w-[500px] rounded-lg bg-white text-base border border-gray-300
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-[#F08619] file:text-white
                            hover:file:bg-[#d97706]
                            focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                </div> 
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Lokasi <span class="text-[#F08619]">*</span></label>
                    <input type="text" name="lokasi" id="lokasi" required
                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                </div>
                <div class="flex flex-row justify-between items-center w-full mt-4">
                <!-- Tombol Sebelumnya -->
                <button @click="tab = 'terlapor'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Sebelumnya</span>
                </button>

                <!-- Tombol Berikutnya -->
                <button @click="tab = 'tambahan'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                    <span>Berikutnya</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
            </div>
            

            <!-- FORM TAMBAHAN -->
            <div x-show="tab === 'tambahan'" x-transition>
                <p class="font-bold tracking-wider text-[#F08619]">TAMBAHAN INFORMASI</p>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Apakah pelaku masih berpotensi melakukan kekerasan lebih lanjut terhadap korban? <span class="text-[#F08619]">*</span></label>
                    <div class="space-y-0.5">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="berpotensi" value="1" required
                            class="w-5 h-5 text-[#F08619] bg-white ">
                            <span class="font-semibold">Sangat berpotensi</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="berpotensi" value="2"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Berpotensi</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="berpotensi" value="3"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak berpotensi</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="berpotensi" value="4"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak yakin</span>
                        </label>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Seberapa parah dampak fisik yang dialami korban? <span class="text-[#F08619]">*</span></label>
                    <div class="space-y-0.5">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="dampak_fisik" value="1" required
                            class="w-5 h-5 text-[#F08619] bg-white ">
                            <span class="font-semibold">Luka berat (membutuhkan perawatan medis intensif)</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="dampak_fisik" value="2"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Luka ringan (tidak memerlukan perawatan intensif)</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="dampak_fisik" value="3"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak ada luka fisik</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="dampak_fisik" value="4"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak yakin</span>
                        </label>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Seberapa parah dampak psikologis yang dialami korban? <span class="text-[#F08619]">*</span></label>
                    <div class="space-y-0.5">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="dampak_psikologis" value="1" required
                            class="w-5 h-5 text-[#F08619] bg-white ">
                            <span class="font-semibold">Trauma berat (gangguan fungsi harian)</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="dampak_psikologis" value="2"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Gangguan psikologis sedang (stres/cemas)</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="dampak_psikologis" value="3"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak ada dampak psikologis</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="dampak_psikologis" value="4"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak yakin</span>
                        </label>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Apakah kasus ini merupakan kejadian berulang? <span class="text-[#F08619]">*</span></label>
                    <div class="space-y-0.5">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="berulang" value="1" required
                            class="w-5 h-5 text-[#F08619] bg-white ">
                            <span class="font-semibold">Sudah sering terjadi (lebih dari 5 kali)</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="berulang" value="2"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Beberapa kali terjadi (2-5 kali)</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="berulang" value="3"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Baru pertama kali terjadi (1-2 kali)</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="berulang" value="4"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak yakin</span>
                        </label>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Apakah kejadian ini mempengaruhi hubungan sosial korban? <span class="text-[#F08619]">*</span></label>
                    <div class="space-y-0.5">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="hubungan_sosial" value="1" required
                            class="w-5 h-5 text-[#F08619] bg-white ">
                            <span class="font-semibold">Gangguan hubungan yang parah (isolasi sosial total)</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="hubungan_sosial" value="2"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Gangguan hubungan yang sedang (isolasi sosial parah)</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="hubungan_sosial" value="3"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak ada gangguan hubungan sosial</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="hubungan_sosial" value="4"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak yakin</span>
                        </label>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Apakah kejadian ini mempengaruhi kinerja akademik atau pekerjaan korban?  <span class="text-[#F08619]">*</span></label>
                    <div class="space-y-0.5">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="kinerja" value="1" required
                            class="w-5 h-5 text-[#F08619] bg-white ">
                            <span class="font-semibold">Sangat mempengaruhi (absen panjang, penurunan signifikan)</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="kinerja" value="2"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Sedikit mempengaruhi (gangguan sementara)</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="kinerja" value="3"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak ada pengaruh terhadap kinerja</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="kinerja" value="4"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak yakin</span>
                        </label>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Bagaimana Anda menilai tingkat keseriusan kasus ini secara keseluruhan? * <span class="text-[#F08619]">*</span></label>
                    <div class="space-y-0.5">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="keseriusan" value="1" required
                            class="w-5 h-5 text-[#F08619] bg-white ">
                            <span class="font-semibold">Sangat serius</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="keseriusan" value="2"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Serius</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="keseriusan" value="3"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Ringan</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="keseriusan" value="4"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak yakin</span>
                        </label>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Apakah kejadian ini terjadi di lingkungan kampus atau tempat kerja korban? <span class="text-[#F08619]">*</span></label>
                    <div class="space-y-0.5">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="lingkungan" value="1" required
                            class="w-5 h-5 text-[#F08619] bg-white ">
                            <span class="font-semibold">Ya, terjadi di lingkungan langsung korban</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="lingkungan" value="2"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Ya, terjadi di lingkungan lain tetapi berhubungan dengan korban</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="lingkungan" value="3"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak terkait dengan lingkungan korban</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="lingkungan" value="4"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak yakin</span>
                        </label>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold" for="">Apakah korban bersedia bekerja sama dengan pihak berwenang untuk menyelesaikan kasus ini? <span class="text-[#F08619]">*</span></label>
                    <div class="space-y-0.5">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="bersedia" value="1" required
                            class="w-5 h-5 text-[#F08619] bg-white ">
                            <span class="font-semibold">Ya, sangat bersedia</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="bersedia" value="2"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Ya, tetapi ragu-ragu</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="bersedia" value="3"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak bersedia</span>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="radio" name="bersedia" value="4"
                            class="w-5 h-5 text-[#F08619] bg-white">
                            <span class="font-semibold">Tidak yakin</span>
                        </label>
                    </div>
                </div>
                <div class="flex flex-row justify-between items-center w-full mt-4">
                <!-- Tombol Sebelumnya -->
                <button @click="tab = 'peristiwa'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Sebelumnya</span>
                </button>

            </div>
            </div>
            
        </form>
        </div>
    </div>
</div>