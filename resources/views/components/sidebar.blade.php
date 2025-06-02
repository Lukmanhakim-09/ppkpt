@php
    $user = Auth::user();
@endphp
@props(['active'])
        <div class="w-1/5 h-[520px] bg-[#F08619] px-6 py-10 shadow-lg rounded-r-lg text-lg hidden lg:block">
            <a href="/admin" class="flex items-center my-1 gap-2 text-gray-50 hover:bg-[#D67F28] rounded-lg px-2 py-1 hover:mx-2 {{ $active === 'beranda' ? 'bg-[#D67F28] rounded-lg px-2 py-1' : '' }}">
                <i class="fa-solid fa-house"></i>
                <h5 class="font-semibold">Beranda</h5>
            </a>
            <a href="#" class="flex items-center my-1 gap-2 text-gray-50 hover:bg-[#D67F28] rounded-lg px-2 py-1 hover:mx-2 {{ $active === 'formulir' ? 'bg-[#D67F28] rounded-lg px-2 py-1' : '' }}">
                <i class="fa-solid fa-envelope"></i>
                <h5 class="font-semibold">Kelola Formulir</h5>
            </a>
            <a href="#" class="flex items-center my-1 gap-2 text-gray-50 hover:bg-[#D67F28] rounded-lg px-2 py-1 hover:mx-2 {{ $active === 'dokumen' ? 'bg-[#D67F28] rounded-lg px-2 py-1' : '' }}">
                <i class="fa-solid fa-file"></i>
                <h5 class="font-semibold">Kelola Dokumen</h5>
            </a>
            <a href="/admin/kelolapengguna" class="flex items-center my-1 gap-2 text-gray-50 hover:bg-[#D67F28] rounded-lg px-2 py-1 hover:mx-2 {{ $active === 'pengguna' ? 'bg-[#D67F28] rounded-lg px-2 py-1' : '' }}">
                <i class="fa-solid fa-users"></i>
                <h5 class="font-semibold">Kelola Pengguna</h5>
            </a>
            <a href="#" class="flex items-center my-1 gap-2 text-gray-50 hover:bg-[#D67F28] rounded-lg px-2 py-1 hover:mx-2 {{ $active === 'hasil' ? 'bg-[#D67F28] rounded-lg px-2 py-1' : '' }}">
                <i class="fa-solid fa-square-check"></i>
                <h5 class="font-semibold">Hasil Aduan</h5>
            </a>
            <a href="#" class="flex items-center my-1 gap-2 text-gray-50 hover:bg-[#D67F28] rounded-lg px-2 py-1 hover:mx-2 {{ $active === 'berita' ? 'bg-[#D67F28] rounded-lg px-2 py-1' : '' }}">
                <i class="fa-solid fa-newspaper"></i>
                <h5 class="font-semibold">Kelola Berita</h5>
            </a>
            <a href="#" class="flex items-center my-1 gap-2 text-gray-50 hover:bg-[#D67F28] rounded-lg px-2 py-1 hover:mx-2 {{ $active === 'gudang' ? 'bg-[#D67F28] rounded-lg px-2 py-1' : '' }}">
                <i class="fa-solid fa-warehouse"></i>
                <h5 class="font-semibold">Gudang PPKPT</h5>
            </a>
        </div>
        <div x-data="{ sidebar: false }">
            <!-- Tombol Hamburger (hanya tampil jika sidebar belum dibuka) -->
            <div class="flex lg:hidden justify-end p-4">
                <button 
                @click="sidebar = true" 
                class="text-white bg-[#F08619] px-3 py-2 rounded-lg "
                x-show="!sidebar"
                >
                <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <div x-show="sidebar"  x-transition:enter="transition-transform ease-out duration-300"
                x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition-transform ease-in duration-300"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
                class="fixed top-35 w-[200px] h-full bg-[#F08619] px-6 py-4 shadow-lg rounded-r-lg text-lg z-50 lg:hidden"
                @click.outside="sidebar = false">
                <button 
                  @click="sidebar = false" 
                  class="text-white bg-[#F08619] px-3 py-2 rounded-lg absolute top-4 right-4"
                >
                  <i class="fa-solid fa-xmark"></i>
                </button>
                <div class="flex flex-col items-center justify-center">
                    <img class="w-12 h-12 rounded-full object-cover border-2 border-[#F08619] cursor-pointer" src="{{ file_exists(public_path('storage/' . $user->profile)) ? asset('storage/' . $user->profile) : asset('img/user.webp') }}" alt="">
                    <h5 class="font-semibold">{{ $user->fullname }}</h5>
                    <h5 class="font-medium text-sm">Admin</h5>
                </div>
                <a href="/admin" class="flex items-center my-1 gap-2 text-gray-50 hover:bg-[#D67F28] rounded-lg px-2 py-1 hover:mx-2 {{ $active === 'beranda' ? 'bg-[#D67F28] rounded-lg px-2 py-1' : '' }}">
                    <i class="fa-solid fa-house"></i>
                    <h5 class="font-semibold">Beranda</h5>
                </a>
                <a href="#" class="flex items-center my-1 gap-2 text-gray-50 hover:bg-[#D67F28] rounded-lg px-2 py-1 hover:mx-2 {{ $active === 'formulir' ? 'bg-[#D67F28] rounded-lg px-2 py-1' : '' }}">
                    <i class="fa-solid fa-envelope"></i>
                    <h5 class="font-semibold">Kelola Formulir</h5>
                </a>
                <a href="#" class="flex items-center my-1 gap-2 text-gray-50 hover:bg-[#D67F28] rounded-lg px-2 py-1 hover:mx-2 {{ $active === 'dokumen' ? 'bg-[#D67F28] rounded-lg px-2 py-1' : '' }}">
                    <i class="fa-solid fa-file"></i>
                    <h5 class="font-semibold">Kelola Dokumen</h5>
                </a>
                <a href="/admin/kelolapengguna" class="flex items-center my-1 gap-2 text-gray-50 hover:bg-[#D67F28] rounded-lg px-2 py-1 hover:mx-2 {{ $active === 'pengguna' ? 'bg-[#D67F28] rounded-lg px-2 py-1' : '' }}">
                    <i class="fa-solid fa-users"></i>
                    <h5 class="font-semibold">Kelola Pengguna</h5>
                </a>
                <a href="#" class="flex items-center my-1 gap-2 text-gray-50 hover:bg-[#D67F28] rounded-lg px-2 py-1 hover:mx-2 {{ $active === 'hasil' ? 'bg-[#D67F28] rounded-lg px-2 py-1' : '' }}">
                    <i class="fa-solid fa-square-check"></i>
                    <h5 class="font-semibold">Hasil Aduan</h5>
                </a>
                <a href="#" class="flex items-center my-1 gap-2 text-gray-50 hover:bg-[#D67F28] rounded-lg px-2 py-1 hover:mx-2 {{ $active === 'berita' ? 'bg-[#D67F28] rounded-lg px-2 py-1' : '' }}">
                    <i class="fa-solid fa-newspaper"></i>
                    <h5 class="font-semibold">Kelola Berita</h5>
                </a>
                <a href="#" class="flex items-center my-1 gap-2 text-gray-50 hover:bg-[#D67F28] rounded-lg px-2 py-1 hover:mx-2 {{ $active === 'gudang' ? 'bg-[#D67F28] rounded-lg px-2 py-1' : '' }}">
                    <i class="fa-solid fa-warehouse"></i>
                    <h5 class="font-semibold">Gudang PPKPT</h5>
                </a>
            </div>
        </div>
        </div>
        