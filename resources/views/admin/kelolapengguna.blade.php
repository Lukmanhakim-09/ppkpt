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
    <x-nav-baar>
        <x-slot name="label1"></x-slot>
        <x-slot name="label2"></x-slot>
        <x-slot name="label3"></x-slot>
        <x-slot name="label4"></x-slot>
        <x-slot name="label5">Admin</x-slot>
    </x-nav-bar>
    <div class="flex mt-31">
        <!-- Sidebar -->
        <div class="h-[520px] w-[300px] bg-[#F08619] px-4 py-15 shadow-lg rounded-lg lg:block hidden">
            <x-sidebar :active="'pengguna'"></x-sidebar>
            <div class="bg-[#E0DEDE] rounded-lg shadow-lg lg:mx-4 mx-2 w-[100%]">
                <div class="px-6 py-6">
                    <!-- Judul -->
                    <h5 class="font-bold tracking-widest bg-[#3B6BA2] text-gray-50 text-center rounded-xl w-full py-3 text-xl flex items-center justify-center shadow-md">
                        DAFTAR PENGGUNA
                    </h5>

                    <!-- Controls -->
                    <div class="flex flex-col md:flex-row gap-1 mt-6 items-center">
                        <!-- Pencarian -->
                        <div class="flex items-center gap-2 border border-gray-300 rounded-lg px-3 py-2 bg-white shadow-sm w-full md:w-auto">
                            <i class="fa-solid fa-magnifying-glass text-gray-500"></i>
                            <input
                                type="text"
                                placeholder="Cari pengguna..."
                                class="outline-none w-full"
                            >
                        </div>

                        <div x-data="{ open: false, selected: 'Filter' }" class="relative">
                        <button 
                            @click="open = !open"
                            class="flex items-center gap-2 border border-gray-300 rounded-lg px-3 py-2 bg-white shadow-sm w-full md:w-auto">
                            <i class="fa-solid fa-filter text-gray-500"></i>
                            <span x-text="selected"></span>
                            <i class="fa-solid fa-caret-down ml-auto"></i>
                        </button>
                        
                        <ul 
                            x-show="open"
                            @click.outside="open = false"
                            class="absolute z-10 mt-1 w-full md:w-auto bg-white rounded-lg shadow-lg border border-gray-200">
                            <li 
                            @click="selected = 'Admin'; open = false"
                            class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                            Admin
                            </li>
                            <li 
                            @click="selected = 'Satgas'; open = false"
                            class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                            Satgas
                            </li>
                            <li 
                            @click="selected = 'User'; open = false"
                            class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                            User
                            </li>
                        </ul>
                        </div>
 

                        <!-- Tombol Tambah -->
                        <button
                            class="flex items-center gap-2 bg-green-600 text-gray-50 px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition">
                            <i class="fa-solid fa-plus"></i>
                            Tambah Pengguna
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto rounded-lg shadow-md m-4 mx-6">
                <table class="min-w-full bg-white border border-gray-300 text-sm">
                    <thead class="bg-[#CCCACA] font-bold text-base">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold font-roboto">No</th>
                        <th class="px-6 py-3 text-left font-semibold font-roboto">Nama</th>
                        <th class="px-6 py-3 text-left font-semibold font-roboto">Email</th>
                        <th class="px-6 py-3 text-left font-semibold font-roboto">Role</th>
                        <th class="px-6 py-3 text-left font-semibold font-roboto">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $index => $user)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-6 py-3 font-roboto tracking-wide text-base">{{ $index + 1 }}</td>
                        <td class="px-6 py-3 font-roboto tracking-wide text-base">{{ $user->fullname }}</td>
                        <td class="px-6 py-3 font-roboto tracking-wide text-base">{{ $user->email }}</td>
                        <td class="px-6 py-3 font-roboto tracking-wide text-base">{{ $user->role }}</td>
                        <td class="px-6 py-3 font-roboto tracking-wide text-base">
                        <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Edit</button>
                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded ml-2">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>

            </div>
        </div>

    </div>
</body>
</html>