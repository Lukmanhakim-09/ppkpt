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
            <div class="bg-[#E0DEDE] rounded-lg shadow-lg lg:mx-4 mx-2 w-full lg:h-[520px] h-auto px-2 py-6 lg:overflow-y-auto">
        <div class="px-6 pb-4">
            <!-- Judul -->
            <h5 class="font-bold tracking-widest bg-[#3B6BA2] text-gray-50 text-center rounded-xl w-full py-3 text-xl flex items-center justify-center shadow-md">
                Tambah Pengguna
            </h5>
        </div>
        <div class="mx-10">
            <form action="#" method="POST">
                @csrf
                <div class="flex flex-col gap-4 w-full">
                    <!-- Nama Lengkap -->
                    <div class="flex flex-col md:flex-row md:items-center gap-2 w-full">
                        <label for="fullname" class="md:w-40 font-medium">Nama Lengkap</label>
                        <input
                            type="text"
                            name="fullname"
                            id="fullname"
                            class="flex-1 bg-gray-50 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#F08619]"
                        >
                    </div>
                    <!-- Username -->
                    <div class="flex flex-col md:flex-row md:items-center gap-2 w-full">
                        <label for="username" class="md:w-40 font-medium">Username</label>
                        <input
                            type="text"
                            name="username"
                            id="username"
                            class="flex-1 bg-gray-50 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#F08619]"
                        >
                    </div>
                    <!-- NIM/NIDN -->
                    <div class="flex flex-col md:flex-row md:items-center gap-2 w-full">
                        <label for="nim_nidn" class="md:w-40 font-medium">NIM/NIDN</label>
                        <input
                            type="text"
                            name="nim_nidn"
                            id="nim_nidn"
                            class="flex-1 bg-gray-50 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#F08619]"
                        >
                    </div>
                    <!-- Email -->
                    <div class="flex flex-col md:flex-row md:items-center gap-2 w-full">
                        <label for="email" class="md:w-40 font-medium">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="flex-1 bg-gray-50 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#F08619]"
                        >
                    </div>
                    <!-- Password -->
                    <div class="flex flex-col md:flex-row md:items-center gap-2 w-full">
                        <label for="password" class="md:w-40 font-medium">Password</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="flex-1 bg-gray-50 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#F08619]"
                        >
                    </div>
                    <!-- Status -->
                    <div class="flex flex-col md:flex-row md:items-center gap-2 w-full">
                        <label for="status" class="md:w-40 font-medium">Status</label>
                        <select
                            name="status"
                            id="status"
                            class="flex-1 bg-gray-50 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#F08619]"
                        >
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="Pimpinan">Pimpinan</option>
                            <option value="Dosen">Dosen</option>
                            <option value="Tenaga Pendidik">Tenaga Pendidik</option>
                            <option value="Satpam">Satpam</option>
                            <option value="OB">OB</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                        </select>
                    </div>
                    <!-- Role -->
                    <div class="flex flex-col md:flex-row md:items-center gap-2 w-full">
                        <label for="role" class="md:w-40 font-medium">Role</label>
                        <select
                            name="role"
                            id="role"
                            class="flex-1 bg-gray-50 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#F08619]"
                        >
                            <option value="" disabled selected>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="satgas">Satgas</option>
                            <option value="pelapor">Pelapor</option>
                        </select>
                    </div>
                </div>
                <!-- Tombol -->
                <div class="flex mt-4 items-center gap-2">
                    <button
                        type="submit"
                        class="bg-[#F08619] text-white font-semibold tracking-wider py-2 px-6 mt-2 rounded-md hover:bg-[#3B6BA2] transition-colors">
                        Buat
                    </button>
                    <a
                        href="{{ route('admin.kelolapengguna') }}"
                        class="bg-gray-50 text-gray-900 font-semibold tracking-wider py-2 px-6 mt-2 rounded-md hover:bg-gray-200 transition-colors"
                    >
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
        </div>
    </div>
    
</body>
</html>