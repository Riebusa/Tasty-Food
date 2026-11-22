@use('App\Models\Pengaturan')

<x-layouts.app>
    {{-- ===== HERO ===== --}}
    <section class="relative overflow-hidden bg-brand-gray">
        <x-navbar theme="dark" />

        <div class="container-site relative grid items-center md:min-h-[690px] md:grid-cols-2">
            <div class="relative z-10 pb-10 pt-40 md:py-0 md:pt-20">
                <span class="block h-px w-28 bg-black"></span>
                <h1 class="mt-10 font-heading uppercase leading-tight">
                    <span class="block text-4xl font-light md:text-5xl">{{ Pengaturan::get('home_hero_judul_kecil') }}</span>
                    <span class="block text-4xl font-extrabold md:text-5xl">{{ Pengaturan::get('home_hero_judul_besar') }}</span>
                </h1>
                <p class="mt-5 max-w-md text-sm leading-7">{{ Pengaturan::get('home_hero_teks') }}</p>
                <a href="{{ route('tentang') }}"
                   class="mt-8 inline-block bg-black px-12 py-4 font-heading text-sm font-bold uppercase text-white transition hover:bg-neutral-800">
                    Tentang Kami
                </a>
            </div>
        </div>

        <img src="{{ Pengaturan::gambar('home_hero_gambar') }}" alt="Hidangan Tasty Food"
             class="mx-auto mb-10 w-72 md:absolute md:-right-24 md:-top-20 md:mb-0 md:w-[46rem] md:max-w-none">
    </section>

    {{-- ===== TENTANG KAMI ===== --}}
    <section class="py-20">
        <div class="container-site text-center">
            <h2 class="font-heading text-2xl font-bold uppercase">Tentang Kami</h2>
            <p class="mx-auto mt-8 max-w-2xl text-sm leading-7">{{ Pengaturan::get('home_tentang_teks') }}</p>
            <span class="mx-auto mt-10 block h-px w-28 bg-black"></span>
        </div>
    </section>

    {{-- ===== 4 KARTU FITUR ===== --}}
    @if ($fitur->isNotEmpty())
        <section class="relative bg-brand-black bg-cover bg-center py-20"
                 style="background-image: url('{{ asset('images/hero/hero-bg.jpg') }}')">
            <div class="absolute inset-0 bg-black/50"></div>

            <div class="container-site relative grid gap-x-6 gap-y-24 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($fitur as $item)
                    <div class="mt-20 rounded-xl bg-white px-6 pb-10 text-center shadow-lg">
                        <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}"
                             class="-mt-20 mx-auto size-40 rounded-full object-cover">
                        <h3 class="mt-6 font-heading text-2xl font-bold uppercase">{{ $item->judul }}</h3>
                        <p class="mt-4 text-sm leading-6">{{ $item->deskripsi }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- ===== BERITA KAMI ===== --}}
    @if ($utama)
        <section class="bg-brand-gray py-20">
            <div class="container-site">
                <h2 class="text-center font-heading text-2xl font-bold uppercase">Berita Kami</h2>

                <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4 lg:grid-rows-2">
                    {{-- berita besar --}}
                    <article class="flex flex-col overflow-hidden rounded-xl bg-white shadow-md ring-1 ring-black/5 sm:col-span-2 lg:row-span-2">
                        <a href="{{ route('berita.show', $utama->slug) }}">
                            <img src="{{ $utama->gambar_url }}" alt="{{ $utama->judul }}" class="h-64 w-full object-cover lg:h-[420px]">
                        </a>
                        <div class="flex flex-1 flex-col p-6">
                            <h3 class="font-heading text-xl font-bold uppercase">{{ $utama->judul }}</h3>
                            <p class="mt-4 line-clamp-5 text-sm leading-6">{{ $utama->ringkasan }}</p>
                            <div class="mt-auto flex items-center justify-between pt-8 text-sm">
                                <a href="{{ route('berita.show', $utama->slug) }}" class="text-brand-accent hover:underline">Baca selengkapnya</a>
                                <x-heroicon-s-ellipsis-horizontal class="size-5 text-neutral-400" />
                            </div>
                        </div>
                    </article>

                    {{-- 4 berita kecil --}}
                    @foreach ($beritaKecil as $berita)
                        <x-news-card :berita="$berita" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ===== GALERI KAMI ===== --}}
    @if ($galeri->isNotEmpty())
        <section class="py-20">
            <div class="container-site">
                <h2 class="text-center font-heading text-2xl font-bold uppercase">Galeri Kami</h2>

                <div class="mt-12 grid grid-cols-2 gap-5 md:grid-cols-3">
                    @foreach ($galeri as $item)
                        <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}"
                             class="aspect-square w-full rounded-2xl object-cover shadow-md" loading="lazy">
                    @endforeach
                </div>

                <div class="mt-14 text-center">
                    <a href="{{ route('galeri') }}"
                       class="inline-block bg-black px-12 py-4 font-heading text-sm font-bold uppercase text-white transition hover:bg-neutral-800">
                        Lihat lebih banyak
                    </a>
                </div>
            </div>
        </section>
    @endif
</x-layouts.app>