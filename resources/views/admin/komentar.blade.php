<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Komentar - Admin</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-[#E0DEDE] min-h-screen">

    <x-nav-baar></x-nav-baar>

    {{-- Container utama --}}
    <div class="mt-32 container mx-auto px-4">

        {{-- Card utama --}}
        <div class="bg-white rounded-2xl shadow-lg p-6">

            {{-- Header --}}
            <div class="flex items-center justify-between mb-6">

                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        Kelola Komentar
                    </h1>
                    <p class="text-gray-500 text-sm">
                        Daftar semua komentar dari pengguna
                    </p>
                </div>

                {{-- tombol kembali admin --}}
                <a href="/admin"
                   class="bg-[#F28C28] hover:bg-[#e67e22] text-white px-4 py-2 rounded-lg shadow transition">
                    ← Kembali
                </a>

            </div>


            {{-- Table --}}
            @if($messages->count() > 0)

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        {{-- Header table --}}
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 text-sm uppercase">

                                <th class="px-6 py-3 text-left rounded-l-lg">No</th>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Pesan</th>
                                <th class="px-6 py-3 text-left rounded-r-lg">Tanggal</th>

                            </tr>
                        </thead>

                        {{-- Body --}}
                        <tbody class="divide-y">

                            @foreach($messages as $index => $message)

                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4 font-medium">
                                    {{ $index + 1 }}
                                </td>

                                <td class="px-6 py-4 font-semibold text-gray-800">
                                    {{ $message->nama }}
                                </td>

                                <td class="px-6 py-4 text-gray-600">
                                    {{ $message->email }}
                                </td>

                                <td class="px-6 py-4 max-w-sm">
                                    <div class="truncate"
                                         title="{{ $message->pesan }}">
                                        {{ $message->pesan }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-gray-500">
                                    {{ $message->created_at->format('d/m/Y H:i') }}
                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                {{-- Empty state --}}
                <div class="text-center py-12">

                    <i class="fa fa-comments text-gray-300 text-5xl mb-4"></i>

                    <p class="text-gray-500 text-lg">
                        Belum ada komentar
                    </p>

                    <p class="text-gray-400 text-sm">
                        Komentar dari pengguna akan muncul di sini
                    </p>

                </div>

            @endif

        </div>

    </div>

</body>
</html>
