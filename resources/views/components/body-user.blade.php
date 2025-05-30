    <!-- Bagian Berita -->
    <section id="berita"
        class="m-3 bg-cover bg-center bg-no-repeat rounded-lg px-4 sm:px-6 md:px-10 py-10"
        style="background-image: url('img/section2.png')">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Berita Utama -->
            <div class="relative group">
            @props(['beritas'])
            @if($beritas->isNotEmpty())
                <div class="relative" id="main-news-section">
                    <img class="w-full h-[400px] object-cover rounded-lg" 
                         id="slider-image" 
                         src="{{ asset('storage/' . $beritas->first()->gambar) }}" 
                         alt="{{ $beritas->first()->judul }}">
                    <div class="absolute bottom-0 left-0 right-0 bg-[#232323]/80 rounded-lg lg:h-[200px]">
                        <div class="p-6">
                            <a href="#" class="text-white font-bold text-xl mb-2" id="slider-title">{{ $beritas->first()->judul }}</a>
                            <p class="text-[#00F0FF] text-base" id="slider-content">{{ Str::limit($beritas->first()->isi, 200) }}</p>
                        </div>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        let currentSlide = 0;
                        const slides = @json($beritas->take(3));
                        let interval;
                        let isPaused = false;
                        
                        function updateSlide() {
                            currentSlide = (currentSlide + 1) % slides.length;
                            const current = slides[currentSlide];
                            
                            document.getElementById('slider-image').src = 'storage/' + current.gambar;
                            document.getElementById('slider-title').textContent = current.judul;
                            document.getElementById('slider-content').textContent = current.isi.substring(0, 200) + '...';
                        }

                        function startSlider() {
                            if (!isPaused) {
                                interval = setInterval(updateSlide, 3000);
                            }
                        }

                        function stopSlider() {
                            clearInterval(interval);
                            isPaused = true;
                        }

                        const mainSection = document.getElementById('main-news-section');
                        mainSection.addEventListener('mouseenter', stopSlider);
                        mainSection.addEventListener('mouseleave', () => {
                            isPaused = false;
                            startSlider();
                        });

                        // Start the slider initially
                        startSlider();
                    });
                </script>
            @endif
            </div>

            <!-- Berita Lainnya -->
            <div class="space-y-4">
                <div class="h-[400px] overflow-y-auto pr-2">
                @foreach($beritas->skip(3) as $berita)  
                    <div class="flex flex-row">
                        <img class="w-1/3 h-auto object-cover rounded-lg mb-2" src="{{ asset('storage/' . $berita->gambar) }}" alt="Berita Lainnya">
                        <div class="bg-[#232323] rounded-lg p-4 mb-2 shadow-sm">
                            <a  href="#" class="text-gray-50 font-bold text-lg mb-2">{{ $berita->judul }}</a>
                            @php
                                $isilainya = Str::limit($berita->isi, 200);
                            @endphp
                            <p class="text-[#00F0FF] text-sm">{{ $isilainya }}</p>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
        </div>
    </section>

    <!-- Bagian Tentang Kami -->
    <section id="tentang"
    class="m-3 bg-cover bg-center bg-no-repeat rounded-lg px-4 sm:px-6 md:px-10 py-10"
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