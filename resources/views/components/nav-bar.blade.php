@php
    $user = auth()->user();
@endphp
    <header class="z-50 fixed inset-x-0 top-0 bg-white w-full shadow-md" x-data="{ isOpen: false }">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
          <div class="flex lg:flex-1">
            <a href="#beranda" class="-m-5 p-3">
              <img class="h-18 w-auto" src="img/ppkpt.png" alt="">
            </a>
          </div>
          <div class="flex lg:hidden">
            <button @click="isOpen = !isOpen" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
              <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
            </button>
          </div>
            <div class="hidden lg:flex lg:items-center lg:gap-x-8 relative">
            <!-- Link Navigasi -->
            <a href="#" class="text-lg font-normal text-gray-900 hover:text-[#F08619] font-roboto transition-colors">Beranda
            </a>
            <a href="#berita" class="text-lg font-normal text-gray-900 hover:text-[#F08619] font-roboto transition-colors">Berita</a>
            <a href="#tentang" class="text-lg font-normal text-gray-900 hover:text-[#F08619] font-roboto transition-colors">{{ $Label1 }}</a>

            <!-- Dropdown Dokumen -->
            <div class="relative" x-data="{ isOpen: false }">
                <button @click="isOpen = !isOpen" class="text-lg font-normal text-gray-900 hover:text-[#F08619] font-roboto transition-colors">
                Dokumen
                </button>
                <div x-show="isOpen" @click.outside="isOpen = false" x-transition class="absolute left-0 top-full mt-2 bg-white shadow-lg rounded-md p-4 w-[200px] z-50">
                <a href="#" class="block text-base text-gray-900 hover:text-[#F08619] font-roboto py-1">Permendikbudristek No. 55 Tahun 2024</a>
                <a href="#" class="block text-base text-gray-900 hover:text-[#F08619] font-roboto py-1">Permendikbudristek No. 30 Tahun 2021</a>
                </div>
            </div>
            </div>

            <div x-data="{ showProfileMenu: false }" class="hidden lg:flex lg:flex-1 lg:justify-end items-center gap-3 relative">
            <!-- Info Pengguna -->
            <div class="flex flex-col text-right">
                <h4 class="font-normal text-gray-900 tracking-wider text-lg text-center">{{ $user->fullname }}</h4>
                <h5 class="font-medium text-gray-900 tracking-wider text-base text-center">{{ $Label2 }}</h5>
            </div>
            <img
                @click="showProfileMenu = !showProfileMenu"
                class="w-12 h-12 rounded-full object-cover border-2 border-gray-300 cursor-pointer"
                src="img/user.webp" alt="">

            <!-- Dropdown Menu -->
            <div
                x-show="showProfileMenu"
                @click.outside="showProfileMenu = false"
                x-transition
                class="absolute top-full right-0 mt-2 w-48 bg-white shadow-lg rounded-md z-50">
                <a href="#" class="flex items-center gap-3 px-5 py-3 text-gray-900 hover:bg-[#F08619] hover:text-white font-roboto text-sm rounded-md tracking-wider">
                <span class="bg-[#F08619] text-white rounded-full w-9 h-9 flex items-center justify-center">
                    <i class="fa-solid fa-user text-sm"></i>
                </span>
                Edit Profil
                </a>
                <a href="/login" class="flex items-center gap-3 px-5 py-3 text-gray-900 hover:bg-[#F08619] hover:text-white font-roboto text-sm rounded-md tracking-wider">
                <span class="bg-[#F08619] text-white rounded-full w-9 h-9 flex items-center justify-center">
                    <i class="fa-solid fa-right-from-bracket text-sm"></i>
                </span>
                Keluar
                </a>
            </div>
            </div>
        </nav>

        <!-- Mobile Dropdown Menu -->
        <div x-show="isOpen" x-transition class="lg:hidden px-6 py-4 bg-white shadow-md space-y-2 rounded-lg" x-data="{ showDocuments: false }">
        <!-- Navigasi Utama -->
        <a @click="isOpen = false" href="#" class="block text-base text-gray-900 hover:bg-gray-100 px-4 py-2 rounded-md">Beranda</a>
        <a @click="isOpen = false" href="#berita" class="block text-base text-gray-900 hover:bg-gray-100 px-4 py-2 rounded-md">Berita</a>
        <a @click="isOpen = false" href="#tentang" class="block text-base text-gray-900 hover:bg-gray-100 px-4 py-2 rounded-md">{{ $Label1}}</a>
        
        <!-- Dropdown Dokumen -->
        <button @click="showDocuments = !showDocuments" class="w-full text-left text-base text-gray-900 hover:bg-gray-100 px-4 py-2 rounded-md flex items-center justify-between">
            Dokumen 
            <svg :class="{ 'rotate-180': showDocuments }" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div x-show="showDocuments" x-transition class="pl-6 space-y-1">
            <a href="#" class="block text-base text-gray-800 hover:text-blue-600 hover:underline">Permendikbudristek No. 55 Tahun 2024</a>
            <a href="#" class="block text-base text-gray-800 hover:text-blue-600 hover:underline">Permendikbudristek No. 30 Tahun 2021</a>
        </div>

        <!-- Info User -->
        <div class="flex justify-between items-center mt-4 border-t-2 border-[#F08619]">
            <div class="flex items-center gap-3 pt-4">
                <a href="#"><img class="w-12 h-12 rounded-full object-cover" src="img/user.webp" alt="Foto Pengguna"></a>
                <div>
                    <h4 class="text-gray-900 font-semibold text-base">{{ $user->fullname }}</h4>
                    <h5 class="text-gray-600 text-sm">{{ $Label2 }}</h5>
                </div>
            </div>
            <a class="bg-[#F08619] text-white rounded-md px-4 py-2 flex items-center justify-center gap-2 hover:bg-[#3B6BA2] tracking-wider font-roboto" href="/login">Keluar <i class="fa-solid fa-right-from-bracket text-sm"></i></a>
        </div>
    </header>