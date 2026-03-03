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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>
<body class="h-screen lg:overflow-y-hidden">
    <x-nav-baar></x-nav-baar>
    <div class="flex mt-31">
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
        <!-- Sidebar -->
        <div class="h-screen w-[300px] bg-[#F08619] px-4 py-15 shadow-lg rounded-lg lg:block hidden">
            <x-sidebar :active="'pengguna'"></x-sidebar>
            <div class="bg-[#E0DEDE] rounded-lg shadow-lg lg:mx-4 mx-2 w-[100%] h-screen p-2 overflow-y-auto">
                <div class="px-6 py-4">
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
                                id="searchInput">
                        </div>

                        <!-- Filter -->
                        <div class="flex items-center gap-2 border border-gray-300 rounded-lg px-3 py-2 bg-white shadow-sm w-full md:w-auto">
                            <i class="fa-solid fa-filter text-gray-500"></i>
                            <select id="filterSelect" class="outline-none w-full">
                                <option value="">Semua</option>
                                <option value="admin">Admin</option>
                                <option value="satgas">Satgas</option>
                                <option value="pelapor">Pelapor</option>
                            </select>
                        </div>

                        <!-- Tombol Tambah -->
                        <a href="{{ route('admin.tambahpengguna') }}" 
                            class="flex items-center gap-2 bg-green-600 text-gray-50 px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition">
                            <i class="fa-solid fa-plus"></i>
                            Tambah Pengguna
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto rounded-lg shadow-md mx-6">
                <table class="min-w-full bg-white border border-gray-300 text-sm">
                    <thead class="bg-[#CCCACA] font-bold text-base">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold font-roboto">No</th>
                        <th class="px-6 py-3 text-left font-semibold font-roboto">Nama</th>
                        <th class="px-6 py-3 text-left font-semibold font-roboto">Username</th>
                        <th class="px-6 py-3 text-left font-semibold font-roboto">Email</th>
                        <th class="px-6 py-3 text-left font-semibold font-roboto">Role</th>
                        <th class="px-6 py-3 text-left font-semibold font-roboto">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $index => $user)
                    <tr id="userRow" class="user-row border-b hover:bg-gray-100">
                        <td class="px-6 py-3 font-roboto tracking-wide text-base">{{ $index + 1 }}</td>
                        <td class="px-6 py-3 font-roboto tracking-wide text-base">{{ $user->fullname }}</td>
                        <td class="px-6 py-3 font-roboto tracking-wide text-base">{{ $user->username }}</td>
                        <td class="px-6 py-3 font-roboto tracking-wide text-base">{{ $user->email }}</td>
                        <td class="px-6 py-3 font-roboto tracking-wide text-base">{{ ucfirst($user->role) }}</td>
                        <td class="px-6 py-3 font-roboto tracking-wide text-base flex items-center">
                        @if($user->username !== 'admin')
                            <a href="{{ Route('admin.editpengguna', $user->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form id="delete-form-{{ $user->id }}" action="{{ route('admin.kelolapengguna.delete', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete('{{ $user->id }}', '{{ $user->fullname }}', '{{ $user->username }}')" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded ml-2">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                    <tr id="noResultsRow" style="display: none;">
                        <td colspan="6" class="px-6 py-3 font-roboto tracking-wide text-base text-center">
                            Pengguna tidak ditemukan
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <script>
    const searchInput = document.getElementById('searchInput');
    const filterSelect = document.getElementById('filterSelect');
    const rows = document.querySelectorAll('#userRow');
    const noResultsRow = document.getElementById('noResultsRow');

    function filterUsers() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedRole = filterSelect.value.toLowerCase();
        let found = false;

        rows.forEach(row => {
            const fullname = row.children[1].textContent.toLowerCase();
            const username = row.children[2].textContent.toLowerCase();
            const role = row.children[4].textContent.toLowerCase();
            
            // Check if user matches search term
            const matchesSearch = (searchTerm === '' || 
                fullname.includes(searchTerm) || 
                username.includes(searchTerm));

            // Check if user matches filter
            const matchesFilter = (selectedRole === '' || role === selectedRole);

            if (matchesSearch && matchesFilter) {
                row.style.display = '';
                found = true;
            } else {
                row.style.display = 'none';
            }
        });

        noResultsRow.style.display = found ? 'none' : '';
    }

    // Add event listeners
    searchInput.addEventListener('input', filterUsers);
    filterSelect.addEventListener('change', filterUsers);

    function confirmDelete(id, fullname, username) {
        Swal.fire({
            text: `Yakin ingin menghapus pengguna "${fullname} (${username})"?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        });
    }
</script>

</body>
</html>