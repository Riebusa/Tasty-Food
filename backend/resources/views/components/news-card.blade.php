@props(['berita'])

<article class="flex flex-col overflow-hidden rounded-xl bg-white shadow-md ring-1 ring-black/5">
    <a href="{{ route('berita.show', $berita->slug) }}">
        <img src="{{ $berita->gambar_url }}" alt="{{ $berita->judul }}" class="h-44 w-full object-cover" loading="lazy">
    </a>

    <div class="flex flex-1 flex-col p-5">
        <h3 class="font-heading text-xl font-bold uppercase">{{ $berita->judul }}</h3>
        <p class="mt-3 line-clamp-4 text-sm leading-6">{{ $berita->ringkasan }}</p>

        <div class="mt-auto flex items-center justify-between pt-6 text-sm">
            <a href="{{ route('berita.show', $berita->slug) }}" class="text-brand-accent hover:underline">Baca selengkapnya</a>
            <x-heroicon-s-ellipsis-horizontal class="size-5 text-neutral-400" />
        </div>
    </div>
</article>