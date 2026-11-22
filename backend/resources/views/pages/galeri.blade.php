<x-layouts.app title="Galeri">
    <x-page-hero title="Galeri Kami" />

    @if ($slider->isNotEmpty())
        <section class="bg-brand-gray py-20">
            <div class="container-site">
                <div class="relative" data-slider>
                    <div data-slider-track
                         class="flex snap-x snap-mandatory overflow-x-auto scroll-smooth rounded-3xl shadow-lg [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                        @foreach ($slider as $item)
                            <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}"
                                 class="h-72 w-full shrink-0 snap-center object-cover md:h-[430px]">
                        @endforeach
                    </div>

                    <button type="button" data-slider-prev aria-label="Sebelumnya"
                            class="absolute left-0 top-1/2 grid size-12 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full bg-white shadow-lg">
                        <x-heroicon-s-chevron-left class="size-5" />
                    </button>
                    <button type="button" data-slider-next aria-label="Berikutnya"
                            class="absolute right-0 top-1/2 grid size-12 -translate-y-1/2 translate-x-1/2 place-items-center rounded-full bg-white shadow-lg">
                        <x-heroicon-s-chevron-right class="size-5" />
                    </button>
                </div>
            </div>
        </section>
    @endif

    <section class="py-20">
        <div class="container-site">
            <div class="grid grid-cols-2 gap-5 lg:grid-cols-4">
                @forelse ($galeri as $item)
                    <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}"
                         class="aspect-square w-full rounded-2xl object-cover shadow-md" loading="lazy">
                @empty
                    <p class="col-span-full text-neutral-500">Belum ada foto.</p>
                @endforelse
            </div>

            @if ($galeri->hasPages())
                <div class="mt-12">{{ $galeri->links() }}</div>
            @endif
        </div>
    </section>
</x-layouts.app>