@use('App\Models\Pengaturan')

<x-layouts.app title="Tentang Kami">
    <x-page-hero title="Tentang Kami" />

    {{-- Tasty Food --}}
    <section class="bg-brand-gray py-24">
        <div class="container-site grid items-center gap-12 lg:grid-cols-2">
            <div>
                <h2 class="font-heading text-3xl font-bold uppercase">{{ Pengaturan::get('tentang_judul') }}</h2>
                <p class="mt-8 text-sm font-semibold leading-7">{{ Pengaturan::get('tentang_teks_tebal') }}</p>
                <p class="mt-6 text-sm leading-7">{{ Pengaturan::get('tentang_teks') }}</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <img src="{{ Pengaturan::gambar('tentang_gambar_1') }}" alt="Hidangan Tasty Food" class="h-72 w-full rounded-2xl object-cover shadow-md md:h-[400px]">
                <img src="{{ Pengaturan::gambar('tentang_gambar_2') }}" alt="Dapur Tasty Food" class="h-72 w-full rounded-2xl object-cover shadow-md md:h-[400px]">
            </div>
        </div>
    </section>

    {{-- Visi --}}
    <section class="py-24">
        <div class="container-site grid items-center gap-12 lg:grid-cols-2">
            <div class="order-2 grid grid-cols-2 gap-4 lg:order-1">
                <img src="{{ Pengaturan::gambar('tentang_visi_gambar_1') }}" alt="Hidangan" class="h-60 w-full rounded-2xl object-cover shadow-md md:h-[270px]">
                <img src="{{ Pengaturan::gambar('tentang_visi_gambar_2') }}" alt="Hidangan" class="h-60 w-full rounded-2xl object-cover shadow-md md:h-[270px]">
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="font-heading text-2xl font-bold uppercase">Visi</h2>
                <p class="mt-8 text-sm leading-7">{{ Pengaturan::get('tentang_visi') }}</p>
            </div>
        </div>
    </section>

    {{-- Misi --}}
    <section class="pb-24">
        <div class="container-site grid items-center gap-12 lg:grid-cols-2">
            <div>
                <h2 class="font-heading text-2xl font-bold uppercase">Misi</h2>
                <p class="mt-8 text-sm leading-7">{{ Pengaturan::get('tentang_misi') }}</p>
            </div>
            <img src="{{ Pengaturan::gambar('tentang_misi_gambar') }}" alt="Bahan makanan segar" class="h-72 w-full rounded-2xl object-cover shadow-md md:h-[270px]">
        </div>
    </section>
</x-layouts.app>