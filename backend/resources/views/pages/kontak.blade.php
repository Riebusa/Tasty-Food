@use('App\Models\Pengaturan')

@php
    $input = 'w-full rounded-xl border-2 border-neutral-500 bg-white px-6 py-5 text-sm placeholder:text-neutral-500 focus:border-black focus:outline-none';
    $maps = Pengaturan::get('kontak_maps_embed');
@endphp

<x-layouts.app title="Kontak">
    <x-page-hero title="Kontak Kami" />

    <section class="py-20">
        <div class="container-site">
            <h2 class="font-heading text-2xl font-bold uppercase md:text-3xl">Kontak Kami</h2>

            @if (session('sukses'))
                <div class="mt-8 rounded-xl bg-green-100 px-6 py-4 text-sm text-green-800">{{ session('sukses') }}</div>
            @endif

            <form method="POST" action="{{ route('kontak.store') }}" class="mt-10">
                @csrf

                <div class="grid gap-4 md:grid-cols-2">
                    <div class="space-y-4">
                        <div>
                            <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Subject" class="{{ $input }}">
                            @error('subject') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Name" class="{{ $input }}">
                            @error('nama') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="{{ $input }}">
                            @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <textarea name="pesan" placeholder="Message" class="{{ $input }} h-full min-h-56 resize-none">{{ old('pesan') }}</textarea>
                        @error('pesan') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <button type="submit"
                        class="mt-4 w-full rounded-xl bg-black py-5 font-heading text-sm font-bold uppercase text-white transition hover:bg-neutral-800">
                    Kirim
                </button>
            </form>

            {{-- Info kontak --}}
            <div class="mt-20 grid gap-12 text-center md:grid-cols-3">
                <div>
                    <span class="mx-auto grid size-24 place-items-center rounded-full bg-black text-white"><x-heroicon-s-envelope class="size-10" /></span>
                    <h3 class="mt-4 font-heading text-xl font-bold uppercase">Email</h3>
                    <p class="mt-2">{{ Pengaturan::get('kontak_email') }}</p>
                </div>
                <div>
                    <span class="mx-auto grid size-24 place-items-center rounded-full bg-black text-white"><x-heroicon-s-phone class="size-10" /></span>
                    <h3 class="mt-4 font-heading text-xl font-bold uppercase">Phone</h3>
                    <p class="mt-2">{{ Pengaturan::get('kontak_telepon') }}</p>
                </div>
                <div>
                    <span class="mx-auto grid size-24 place-items-center rounded-full bg-black text-white"><x-heroicon-s-map-pin class="size-10" /></span>
                    <h3 class="mt-4 font-heading text-xl font-bold uppercase">Location</h3>
                    <p class="mt-2">{{ Pengaturan::get('kontak_alamat') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Peta --}}
    <section class="bg-brand-gray py-20">
        <div class="container-site">
            @if ($maps && str_starts_with($maps, 'https://www.google.com/maps/embed'))
                <iframe src="{{ $maps }}" title="Lokasi Tasty Food" class="h-[400px] w-full rounded-2xl border-0 shadow-md"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
            @else
                <div class="grid h-[400px] place-items-center rounded-2xl bg-neutral-200 text-neutral-500">Peta belum diatur</div>
            @endif
        </div>
    </section>
</x-layouts.app>