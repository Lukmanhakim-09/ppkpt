<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Investigasi - PPKPT ITH</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <x-nav-baar></x-nav-baar>
    
    <div class="flex mt-31">
        <div class="h-[520px] w-[300px] bg-[#0970A5] px-4 py-15 shadow-lg rounded-lg lg:block hidden">
            <x-sidebarr :active="'beranda'"></x-sidebarr>
            <div class="bg-[#E0DEDE] rounded-lg shadow-lg lg:mx-4 mx-2 w-[100%] lg:h-[520px] h-screen p-5 overflow-y-auto">
              <div class="bg-[#0970A5] text-gray-50 flex flex-col items-center justify-center rounded-r-full h-[150px] py-10 px-6">

                    <h1 class="font-bold text-4xl tracking-widest text-center">
                        LAPOR AMAN
                    </h1>

                    <h4 class="font-semibold text-lg tracking-widest text-center mt-2">
                        INSTITUT TEKNOLOGI B.J. HABIBIE
                    </h4>

                </div>

            </div>
        </div>
    </div>
</body>
</html>