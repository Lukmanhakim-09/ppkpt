<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PPKPT ITH</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-screen lg:overflow-y-hidden">
    
    <x-nav-baar></x-nav-baar>

    <div class="flex mt-31">

      <div class="w-[300px] bg-[#F08619] px-4 py-15 shadow-lg rounded-lg lg:block hidden">

            <x-sidebar :active="'arsip'"></x-sidebar>

            <!-- Wrapper kanan -->
            <div class="bg-[#E0DEDE] rounded-lg shadow-lg lg:mx-4 mx-2 w-[100%] h-screen p-2 overflow-y-auto">
                <div class="px-6 py-4">
                    <!-- Judul -->
                    <h5 class="font-bold tracking-widest bg-[#3B6BA2] text-gray-50 text-center rounded-xl w-full py-3 text-xl flex items-center justify-center shadow-md">
                        ARSIP ADUAN
                    </h5>

                    <!-- Controls -->
                    <div class="flex flex-col md:flex-row gap-1 mt-6 items-center">
                        <!-- Pencarian -->
                        <div class="flex items-center gap-2 border border-gray-300 rounded-lg px-3 py-2 bg-white shadow-sm w-full md:w-auto">
                            <i class="fa-solid fa-magnifying-glass text-gray-500"></i>
                            <input
                                type="text"
                                placeholder="Cari kode aduan..."
                                class="outline-none w-full"
                                id="searchInput"
                            >
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto rounded-lg shadow-md mx-6">
                <table class="min-w-full bg-white border border-gray-300 text-sm">
                    <thead class="bg-[#CCCACA] font-bold text-base">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold font-roboto">No</th>
                        <th class="px-6 py-3 text-left font-semibold font-roboto">Kode Aduan</th>
                        <th class="px-6 py-3 text-left font-semibold font-roboto">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($aduans as $index => $aduan)
                        <tr id="aduanRow" class="border-b hover:bg-gray-100">
                            <td class="px-6 py-3 font-roboto tracking-wide text-base">{{ $index + 1 }}</td>
                            <td class="px-6 py-3 font-roboto tracking-wide text-base">{{ $aduan->kode_aduan }}</td>
                            <td class="px-6 py-3 font-roboto tracking-wide text-base flex items-center">
                            <a href="{{ route('admin.detailaduan', $aduan->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded"><i class="fa-solid fa-eye"></i></i></a>
                            </td>
                        </tr>
                        @endforeach
                        <tr id="noResultsRow" style="display: none;">
                            <td colspan="4" class="px-6 py-3 font-roboto tracking-wide text-base text-center">
                                Aduan tidak ditemukan
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
                

            </div>

        </div>

    </div>

    <script>
    const searchInput = document.getElementById('searchInput');
    const rows = document.querySelectorAll('#aduanRow');
    const noResultsRow = document.getElementById('noResultsRow');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        let found = false;

        rows.forEach(row => {
            const judul = row.children[1].textContent.toLowerCase();

            if (judul.includes(searchTerm)) {
                row.style.display = '';
                found = true;
            } else {
                row.style.display = 'none';
            }
        });

        noResultsRow.style.display = found ? 'none' : '';
    });
    </script>

</body>

</html>
