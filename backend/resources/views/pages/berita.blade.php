<x-layouts.app title="Berita">
    <x-page-hero title="Berita Kami" />

    @if ($utama)
        <section class="bg-brand-gray py-20">
            <div class="container-site grid items-center gap-10 md:grid-cols-2">
                <img src="{{ $utama->gambar_url }}" alt="{{ $utama->judul }}"
                     class="aspect-[4/3] w-full rounded-3xl object-cover shadow-lg md:aspect-auto md:h-[500px]">
                <div>
                    <h2 class="font-heading text-2xl font-bold uppercase md:text-3xl">{{ $utama->judul }}</h2>
                    <p class="mt-6 text-sm leading-7">{{ $utama->ringkasan }}</p>
                    <a href="{{ route('berita.show', $utama->slug) }}"
                       class="mt-8 inline-block bg-black px-10 py-4 font-heading text-sm font-bold uppercase text-white transition hover:bg-neutral-800">
                        Baca selengkapnya
                    </a>
                </div>
            </div>
        </section>
    @endif

    <section class="py-20">
        <div class="container-site">
            <h2 class="font-heading text-2xl font-bold uppercase md:text-3xl">Berita Lainnya</h2>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @forelse ($lainnya as $berita)
                    <x-news-card :berita="$berita" />
                @empty
                    <p class="col-span-full text-neutral-500">Belum ada berita.</p>
                @endforelse
            </div>

            @if ($lainnya->hasPages())
                <div class="mt-12">{{ $lainnya->links() }}</div>
            @endif
        </div>
    </section>
</x-layouts.app>