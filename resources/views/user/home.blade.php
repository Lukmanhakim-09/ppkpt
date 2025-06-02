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
            <!-- Flash Message -->
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
            @if ($errors->any())
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
                class="fixed top-28 right-4 z-50">
                <div class="flex items-center px-6 py-4 rounded-lg shadow-lg bg-red-500 text-white">
                    <i class="fas fa-exclamation-circle mr-3"></i>
                    <div class="text-md font-semibold">
                        Lengkapi Aduan Anda terlebih dahulu.
                    </div>
                </div>
            </div>
            @endif
            
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
                        <div x-data="{ tampil: {{ $errors->any() ? 'true' : 'false' }} }">
                        <button @click="tampil = !tampil" class="flex items-center gap-6 font-rubik font-medium tracking-wider bg-[#F08619] text-white text-lg px-10 py-4 rounded-full w-60 mx-auto mt-4 hover:bg-[#3B6BA2]" ><i class="fa-solid fa-envelope"></i>Buat Aduan</button>
                        <a href="#" class="flex items-center gap-6 font-rubik font-medium tracking-wider bg-transparent outline-solid text-gray-50 text-lg px-10 py-4 rounded-full w-60 mx-auto mt-4 hover:bg-[#3B6BA2]" ><i class="fa-regular fa-bell"></i> Lihat Aduan</a>
                        <div x-show="tampil">
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
                                                :class="tab === 'pelapor' ? 'bg-[#0970A5] text-white' : 'text-[#F08619] hover:bg-[#0970A5] hover:text-white'"
                                                class="col-span-1 p-3 text-center font-roboto font-semibold tracking-wider cursor-pointer transition">
                                                PELAPOR
                                            </div>
                                            <div
                                                @click="tab = 'korban'"
                                                :class="tab === 'korban' ? 'bg-[#0970A5] text-white' : 'text-[#F08619] hover:bg-[#0970A5] hover:text-white'"
                                                class="col-span-1 p-3 text-center font-roboto font-semibold tracking-wider cursor-pointer transition">
                                                KORBAN
                                            </div>
                                            <div
                                                @click="tab = 'terlapor'"
                                                :class="tab === 'terlapor' ? 'bg-[#0970A5] text-white' : 'text-[#F08619] hover:bg-[#0970A5] hover:text-white'"
                                                class="col-span-1 p-3 text-center font-roboto font-semibold tracking-wider cursor-pointer transition">
                                                TERLAPOR
                                            </div>
                                            <div
                                                @click="tab = 'peristiwa'"
                                                :class="tab === 'peristiwa' ? 'bg-[#0970A5] text-white' : 'text-[#F08619] hover:bg-[#0970A5] hover:text-white'"
                                                class="col-span-1 p-3 text-center font-roboto font-semibold tracking-wider cursor-pointer transition">
                                                PERISTIWA
                                            </div>
                                            <div
                                                @click="tab = 'tambahan'"
                                                :class="tab === 'tambahan' ? 'bg-[#0970A5] text-white' : 'text-[#F08619] hover:bg-[#0970A5] hover:text-white'"
                                                class="col-span-1 p-3 text-center font-roboto font-semibold tracking-wider cursor-pointer transition">
                                                TAMBAHAN
                                            </div>
                                        </div>

                                        <!-- FORM -->
                                        <form class="p-6 space-y-6" action="{{ route('aduan.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <!-- FORM PELAPOR -->
                                            <div x-show="tab === 'pelapor'" x-transition>
                                                <p class="font-bold tracking-wider text-[#F08619]">IDENTITAS PELAPOR</p>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Nama Pelapor <span class="text-[#F08619]">*</span></label>
                                                    <input type="text" name="nama_pelapor" id="nama_pelapor" value="{{ old('nama_pelapor', Auth::user()->fullname) }}" 
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('nama_pelapor') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619] ">
                                                    @error('nama_pelapor')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Alamat <span class="text-[#F08619]">*</span></label>
                                                    <input type="text" name="alamat_pelapor" id="alamat_pelapor" value="{{ old('alamat_pelapor') }}"
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('alamat_pelapor') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                    @error('alamat_pelapor')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">File Pernyataan <span class="text-[#F08619]">*</span></label>
                                                    <input type="file" name="pernyataan_pelapor" id="pernyataan_pelapor" accept=".pdf,.doc,.docx"   
                                                    class="lg:w-[500px] rounded-lg bg-white text-base border @error('pernyataan_pelapor') border-red-500 @else border-gray-300 @enderror
                                                            file:mr-4 file:py-2 file:px-4
                                                            file:rounded-md file:border-0
                                                            file:text-sm file:font-semibold
                                                            file:bg-[#F08619] file:text-white
                                                            hover:file:bg-[#d97706]
                                                            focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                    @error('pernyataan_pelapor')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                    <a href="#" class="italic underline text-[#008CFF] hover:text-[#005596] pl-20">Klik Unduh File Pernyataan</a>
                                                    
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Email <span class="text-[#F08619]">*</span></label>
                                                    <input type="email" name="email_pelapor" id="email_pelapor" value="{{ old('email_pelapor') }}"
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('email_pelapor') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                    @error('email_pelapor')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">No Hp <span class="text-[#F08619]">*</span></label>
                                                    <input type="tel" name="phone_pelapor" id="phone_pelapor" value="{{ old('phone_pelapor') }}"
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('phone_pelapor') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                    @error('phone_pelapor')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Bagaimana Anda lebih nyaman dihubungi?<span class="text-[#F08619]">*</span></label>
                                                    <div class="space-y-3">
                                                        <label class="flex items-center space-x-3 cursor-pointer">
                                                            <input type="radio" name="hubungi" value="email" 
                                                            class="w-5 h-5 text-[#F08619] bg-white" {{ old('hubungi') == 'email' ? 'checked' : '' }}>
                                                            <span class="font-semibold ">Email</span>
                                                        </label>

                                                        <label class="flex items-center space-x-3 cursor-pointer">
                                                            <input type="radio" name="hubungi" value="Telepon"
                                                            class="w-5 h-5 text-[#F08619] bg-white" {{ old('hubungi') == 'Telepon' ? 'checked' : '' }}>
                                                            <span class="font-semibold">Telepon</span>
                                                        </label>

                                                        <label class="flex items-center space-x-3 cursor-pointer">
                                                            <input type="radio" name="hubungi" value="Pesan"
                                                            class="w-5 h-5 text-[#F08619] bg-white" {{ old('hubungi') == 'Pesan' ? 'checked' : '' }}>
                                                            <span class="font-semibold">Pesan</span>
                                                        </label>
                                                    </div>
                                                    @error('hubungi')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-row justify-between items-center w-full mt-4">
                                                    <!-- Tombol Berikutnya -->
                                                    <div @click="tab = 'korban'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                                                        <span>Berikutnya</span>
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- FORM KORBAN -->
                                            <div x-show="tab === 'korban'" x-transition>
                                                <p class="font-bold tracking-wider text-[#F08619]">IDENTITAS KORBAN</p>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Nama Korban <span class="text-[#F08619]">*</span></label>
                                                    <input type="text" name="nama_korban" id="nama_korban" value="{{ old('nama_korban') }}"
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('nama_korban') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                    @error('nama_korban')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Jenis Kelamin <span class="text-[#F08619]">*</span></label>
                                                    <select name="jenis_kelamin_korban" id="jenis_kelamin_korban" 
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('jenis_kelamin_korban') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                        <option value="Laki-laki" {{ old('jenis_kelamin_korban') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                        <option value="Perempuan" {{ old('jenis_kelamin_korban') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                    </select>
                                                    @error('jenis_kelamin_korban')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Alamat </label>
                                                    <input type="text" name="alamat_korban" id="alamat_korban" value="{{ old('alamat_korban') }}" 
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('alamat_korban') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                    @error('alamat_korban')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">No HP </label>
                                                    <input type="text" name="phone_korban" id="phone_korban" value="{{ old('phone_korban') }}"
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('phone_korban') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                    @error('phone_korban')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Status Di Kampus <span class="text-[#F08619]">*</span></label>
                                                    <select type="text" name="status_korban" id="status_korban" 
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('status_korban') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                        <option value="" disabled selected>Pilih Status Di Kampus</option>
                                                        <option value="Pimpinan" {{ old('status_korban') == 'Pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                                                        <option value="Dosen" {{ old('status_korban') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                                        <option value="Tenaga Pendidik" {{ old('status_korban') == 'Tenaga Pendidik' ? 'selected' : '' }}>Tenaga Pendidik</option>
                                                        <option value="Satpam" {{ old('status_korban') == 'Satpam' ? 'selected' : '' }}>Satpam</option>
                                                        <option value="OB" {{ old('status_korban') == 'OB' ? 'selected' : '' }}>OB</option>
                                                        <option value="Mahasiswa" {{ old('status_korban') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                                    </select>
                                                    @error('status_korban')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-row justify-between items-center w-full mt-4">
                                                    <!-- Tombol Sebelumnya -->
                                                    <div @click="tab = 'pelapor'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                                                        <i class="fa-solid fa-arrow-left"></i>
                                                        <span>Sebelumnya</span>
                                                    </div>

                                                    <!-- Tombol Berikutnya -->
                                                    <div @click="tab = 'terlapor'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                                                        <span>Berikutnya</span>
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- FORM TERLAPOR -->
                                            <div x-show="tab === 'terlapor'" x-transition>
                                                <p class="font-bold tracking-wider text-[#F08619]">IDENTITAS TERLAPOR</p>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Nama Terlapor <span class="text-[#F08619]">*</span></label>
                                                    <input type="text" name="nama_terlapor" id="nama_terlapor" value="{{ old('nama_terlapor') }}"
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('nama_terlapor') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                    @error('nama_terlapor')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Jenis Kelamin <span class="text-[#F08619]">*</span></label>
                                                    <select name="jenis_kelamin_terlapor" id="jenis_kelamin_terlapor" 
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('jenis_kelamin_terlapor') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                        <option value="Laki-laki" {{ old('jenis_kelamin_terlapor') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                        <option value="Perempuan" {{ old('jenis_kelamin_terlapor') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                    </select>
                                                    @error('jenis_kelamin_terlapor')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Alamat </label>
                                                    <input type="text" name="alamat_terlapor" id="alamat_terlapor" value="{{ old('alamat_terlapor') }}"
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('alamat_terlapor') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                    @error('alamat_terlapor')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">No HP </label>
                                                    <input type="text" name="phone_terlapor" id="phone_terlapor" value="{{ old('phone_terlapor') }}"
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('phone_terlapor') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                    @error('phone_terlapor')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>  
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Status Di Kampus <span class="text-[#F08619]">*</span></label>
                                                    <select type="text" name="status_terlapor" id="status_terlapor" 
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('status_terlapor') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                        <option value="" disabled selected>Pilih Status Di Kampus</option>
                                                        <option value="Pimpinan" {{ old('status_terlapor') == 'Pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                                                        <option value="Dosen" {{ old('status_terlapor') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                                        <option value="Tenaga Pendidik" {{ old('status_terlapor') == 'Tenaga Pendidik' ? 'selected' : '' }}>Tenaga Pendidik</option>
                                                        <option value="Satpam" {{ old('status_terlapor') == 'Satpam' ? 'selected' : '' }}>Satpam</option>
                                                        <option value="OB">OB</option>
                                                        <option value="Mahasiswa">Mahasiswa</option>
                                                    </select>
                                                    @error('status_terlapor')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Karakteristik <span class="text-[#F08619]">*</span></label>
                                                    <textarea name="karakteristik_terlapor" id="karakteristik_terlapor"
                                                    class="lg:w-[500px] h-[100px] rounded-lg bg-white px-5 py-2 text-base border @error('karakteristik_terlapor') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619] resize-none">{{ old('karakteristik_terlapor') }}</textarea>
                                                    @error('karakteristik_terlapor')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Apakah terlapor pernah terlibat dalam kejadian kekerasan lainnya?<span class="text-[#F08619]">*</span></label>
                                                    <div class="flex flex-row gap-2 text-center">
                                                        <label class="flex items-center space-x-2 cursor-pointer">
                                                            <input type="radio" name="terlapor" value="Iya" {{ old('terlapor') == 'Iya' ? 'checked' : '' }}
                                                            class="w-5 h-5 text-[#F08619] bg-white">
                                                            <span class="font-semibold">Ya</span>
                                                        </label>

                                                        <label class="flex items-center space-x-2 cursor-pointer">
                                                            <input type="radio" name="terlapor" value="Tidak" {{ old('terlapor') == 'Tidak' ? 'checked' : '' }}
                                                            class="w-5 h-5 text-[#F08619] bg-white">
                                                            <span class="font-semibold">Tidak</span>
                                                        </label>
                                                    </div>
                                                    @error('terlapor')
                                                    <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div x-data="{ warning: '{{ old('warning') }}' }" class="flex flex-col gap-2">
                                                <label class="font-semibold" for="">
                                                    Apakah terlapor sudah diberi peringatan atau tindakan sebelumnya? Jika ada, jelaskan
                                                    <span class="text-[#F08619]">*</span>
                                                </label>

                                                <div class="flex flex-row gap-4 text-center">
                                                    <label class="flex items-center space-x-2 cursor-pointer">
                                                        <input type="radio" name="warning" value="Iya" x-model="warning" 
                                                            class="w-5 h-5 text-[#F08619] bg-white">
                                                        <span class="font-semibold">Ya</span>
                                                    </label>

                                                    <label class="flex items-center space-x-2 cursor-pointer">
                                                        <input type="radio" name="warning" value="Tidak" x-model="warning"
                                                            class="w-5 h-5 text-[#F08619] bg-white">
                                                        <span class="font-semibold">Tidak</span>
                                                    </label>
                                                </div>
                                                @error('warning')
                                                    <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                @enderror

                                                <!-- Input tambahan muncul jika memilih "Ya" -->
                                                <div x-show="warning === 'Iya'" x-transition>
                                                    <input type="text" name="warning_detail" placeholder="Jelaskan tindakan atau peringatan sebelumnya" value="{{ old('warning_detail') }}"
                                                        class="mt-2 rounded-lg bg-white px-5 py-2 text-base border @error('warning_detail') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619] w-full lg:w-[500px]">
                                                    @error('warning_detail')
                                                        <div class="text-red-500 font-semibold mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                </div>   
                                                <div class="flex flex-row justify-between items-center w-full mt-4">
                                                <!-- Tombol Sebelumnya -->
                                                <div @click="tab = 'terlapor'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                                                    <i class="fa-solid fa-arrow-left"></i>
                                                    <span>Sebelumnya</span>
                                                </div>

                                                <!-- Tombol Berikutnya -->
                                                <div @click="tab = 'peristiwa'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                                                    <span>Berikutnya</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </div>
                                                </div>
                                            </div>
                                            

                                            <!-- FORM PERISTIWA -->
                                            <div x-show="tab === 'peristiwa'" x-transition>
                                                <p class="font-bold tracking-wider text-[#F08619]">PERISTIWA</p>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Tanggal Peristiwa <span class="text-[#F08619]">*</span></label>
                                                    <input type="date" name="tanggal_peristiwa" id="tanggal_peristiwa" value="{{ old('tanggal_peristiwa') }}"
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('tanggal_peristiwa') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                    @error('tanggal_peristiwa')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Kategori <span class="text-[#F08619]">*</span></label>
                                                    <select type="text" name="category" id="category" 
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('category') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                        <option value="" disabled selected>Pilih Kategori</option>
                                                        <option value="Fisik" {{ old('category') == 'Fisik' ? 'selected' : '' }}>Fisik</option>
                                                        <option value="Verbal" {{ old('category') == 'Verbal' ? 'selected' : '' }}>Verbal</option>
                                                        <option value="Seksual" {{ old('category') == 'Seksual' ? 'selected' : '' }}>Seksual</option>
                                                        <option value="Psikologis" {{ old('category') == 'Psikologis' ? 'selected' : '' }}>Psikologis</option>
                                                    </select>
                                                    @error('category')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Kronologi Peristiwa <span class="text-[#F08619]">*</span></label>
                                                    <textarea name="chronology" id="chronology"
                                                    class="lg:w-[500px] h-[100px] rounded-lg bg-white px-5 py-2 text-base border @error('chronology') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619] resize-none">{{ old('chronology') }}</textarea>
                                                    @error('chronology')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">File Bukti </label>
                                                    <input type="file" name="bukti_pelaporan" id="bukti_pelaporan" 
                                                    class="lg:w-[500px] rounde  d-lg bg-white text-base border @error('bukti_pelaporan') border-red-500 @else border-gray-300 @enderror
                                                            file:mr-4 file:py-2 file:px-4
                                                            file:rounded-md file:border-0
                                                            file:text-sm file:font-semibold
                                                            file:bg-[#F08619] file:text-white
                                                            hover:file:bg-[#d97706]
                                                            focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                </div> 
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Lokasi <span class="text-[#F08619]">*</span></label>
                                                    <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}"
                                                    class="lg:w-[500px] rounded-lg bg-white px-5 py-2 text-base border @error('lokasi') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-[#F08619]">
                                                    @error('lokasi')
                                                        <div class="text-red-500 font-semibold -mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="flex flex-row justify-between items-center w-full mt-4">
                                                <!-- Tombol Sebelumnya -->
                                                <div @click="tab = 'terlapor'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                                                    <i class="fa-solid fa-arrow-left"></i>
                                                    <span>Sebelumnya</span>
                                                </div>

                                                <!-- Tombol Berikutnya -->
                                                <div @click="tab = 'tambahan'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                                                    <span>Berikutnya</span>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </div>
                                                </div>
                                            </div>
                                            

                                            <!-- FORM TAMBAHAN -->
                                            <div x-show="tab === 'tambahan'" x-transition>
                                                <p class="font-bold tracking-wider text-[#F08619]">TAMBAHAN INFORMASI</p>
                                                <div class="flex flex-col gap-2">
                                                    <label class="font-semibold" for="">Apakah pelaku masih berpotensi melakukan kekerasan lebih lanjut terhadap korban? <span class="text-[#F08619]">*</span></label>
                                                    <div class="space-y-0.5">
                                                        <label class="flex items-center space-x-3 cursor-pointer">
                                                            <input type="radio" name="berpotensi" value="1" 
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
                                                            <input type="radio" name="dampak_fisik" value="1" 
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
                                                            <input type="radio" name="dampak_psikologis" value="1" 
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
                                                            <input type="radio" name="berulang" value="1" 
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
                                                            <input type="radio" name="hubungan_sosial" value="1" 
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
                                                            <input type="radio" name="kinerja" value="1" 
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
                                                            <input type="radio" name="keseriusan" value="1" 
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
                                                            <input type="radio" name="lingkungan" value="1" 
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
                                                            <input type="radio" name="bersedia" value="1" 
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
                                                <div @click="tab = 'peristiwa'" class="flex items-center space-x-2 text-[#3B6BA2] hover:text-[#d97706] font-semibold">
                                                    <i class="fa-solid fa-arrow-left"></i>
                                                    <span>Sebelumnya</span>
                                                </div>
                                                </div>
                                            </div>
                                            <div x-show="tab === 'tambahan'" class="flex flex-col sm:flex-row justify-center mt-4 gap-2">
                                                <button type="submit" class="bg-[#F08619] text-white px-6 py-2 rounded-lg hover:bg-[#3B6BA2]">
                                                    <i class="fa-solid fa-paper-plane mr-2"></i>
                                                    Kirim Aduan
                                                </button>
                                                <button type="reset" class="bg-[#F08619] text-white px-6 py-2 rounded-lg hover:bg-[#3B6BA2]">
                                                    <i class="fa-solid fa-rotate mr-2"></i>
                                                    Hapus Semua
                                                </button>
                                                <a @click="tampil = false" href="#" class="bg-[#F08619] text-white px-6 py-2 text-center rounded-lg hover:bg-[#3B6BA2]">
                                                    <i class="fa-solid fa-xmark mr-2"></i>
                                                    Tutup
                                                </a>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
    </section>
    <section id="berita" class="m-3 bg-cover bg-center bg-no-repeat rounded-lg px-4 sm:px-6 md:px-10 py-10 scroll-mt-28"
    style="background-image: url('img/section2.png')">
    <x-berita :beritas="$beritas"></x-berita>
    </section>
    <!-- Bagian Tentang Kami -->
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