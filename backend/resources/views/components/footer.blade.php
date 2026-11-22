@use('App\Models\Pengaturan')

<footer class="bg-brand-black text-white">
    <div class="container-site grid gap-12 py-16 md:grid-cols-[2fr_1fr_1fr_1.6fr]">
        <div>
            <h3 class="text-2xl font-semibold">Tasty Food</h3>
            <p class="mt-6 max-w-sm text-sm leading-7 text-white/60">
                {{ Pengaturan::get('footer_deskripsi') }}
            </p>
            <div class="mt-8 flex gap-3">
                <a href="{{ Pengaturan::get('sosmed_facebook', '#') }}" aria-label="Facebook"
                   class="grid size-10 place-items-center rounded-full bg-[#3b5998]">
                    <x-fab-facebook-f class="size-5" />
                </a>
                <a href="{{ Pengaturan::get('sosmed_twitter', '#') }}" aria-label="Twitter"
                   class="grid size-10 place-items-center rounded-full bg-[#55acee]">
                    <x-fab-twitter class="size-5" />
                </a>
            </div>
        </div>

        <div>
            <h4 class="text-xl font-semibold">Useful links</h4>
            <ul class="mt-6 space-y-4 text-sm font-medium">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('berita') }}">Berita</a></li>
                <li><a href="{{ route('galeri') }}">Galeri</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-xl font-semibold">Perusahaan</h4>
            <ul class="mt-6 space-y-4 text-sm font-medium">
                <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
                <li><a href="{{ route('kontak') }}">Kontak Kami</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-xl font-semibold">Contact Info</h4>
            <ul class="mt-6 space-y-4 text-sm font-medium">
                <li class="flex items-center gap-3">
                    <x-heroicon-s-envelope class="size-5 shrink-0" /> {{ Pengaturan::get('kontak_email') }}
                </li>
                <li class="flex items-center gap-3">
                    <x-heroicon-s-phone class="size-5 shrink-0" /> {{ Pengaturan::get('kontak_telepon') }}
                </li>
                <li class="flex items-center gap-3">
                    <x-heroicon-s-map-pin class="size-5 shrink-0" /> {{ Pengaturan::get('kontak_alamat') }}
                </li>
            </ul>
        </div>
    </div>

    <p class="pb-10 text-center text-xs text-white/70">
        Copyright &copy;{{ date('Y') }} All rights reserved
    </p>
</footer>