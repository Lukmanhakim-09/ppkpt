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
                            <p class="text-[#00F0FF] text-base" id="slider-content">{{ Str::limit(strip_tags($beritas->first()->isi), 200) }}...</p>
                        </div> 
                    </div>
                </div>
                @php
                $slides = $beritas->take(3)->map(function($b) {
                    return [
                        'judul' => $b->judul,
                        'gambar' => $b->gambar,
                        'isi' => strip_tags($b->isi)
                    ];
                });
                @endphp
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        let currentSlide = 0;
                        const slides = @json($slides);
                        let interval;
                        let isPaused = false;
                        
                        function updateSlide() {
                            currentSlide = (currentSlide + 1) % slides.length;
                            const current = slides[currentSlide];
                            
                            document.getElementById('slider-image').src = 'storage/' + current.gambar;
                            document.getElementById('slider-title').textContent = current.judul;
                            document.getElementById('slider-content').innerHTML = current.isi.substring(0, 200) + '...';
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
                            <p class="text-[#00F0FF] text-sm">{!! strip_tags($isilainya, '<strong><p><em><ul>') !!}</p>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
        </div>

    