<x-layouts.app :title="$berita->judul">
    <x-page-hero title="Berita Kami" />

    <article class="py-20">
        <div class="container-site">
            <div class="mx-auto max-w-3xl">
                <img src="{{ $berita->gambar_url }}" alt="{{ $berita->judul }}" class="aspect-video w-full rounded-3xl object-cover shadow-lg">
                <h1 class="mt-10 font-heading text-3xl font-bold uppercase">{{ $berita->judul }}</h1>
                <p class="mt-2 text-sm text-neutral-500">{{ $berita->diterbitkan_pada?->translatedFormat('d F Y') }}</p>
                <div class="mt-8 whitespace-pre-line leading-8">{{ $berita->isi }}</div>
            </div>
        </div>
    </article>

    @if ($terkait->isNotEmpty())
        <section class="bg-brand-gray py-20">
            <div class="container-site">
                <h2 class="font-heading text-2xl font-bold uppercase">Berita Lainnya</h2>
                <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($terkait as $item)
                        <x-news-card :berita="$item" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts.app>