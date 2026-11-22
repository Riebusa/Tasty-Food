@props(['theme' => 'light'])

@php
    $menus = [
        ['label' => 'Home',    'route' => 'home'],
        ['label' => 'Tentang', 'route' => 'tentang'],
        ['label' => 'Berita',  'route' => 'berita'],
        ['label' => 'Galeri',  'route' => 'galeri'],
        ['label' => 'Kontak',  'route' => 'kontak'],
    ];
    $textColor = $theme === 'light' ? 'text-white' : 'text-brand-black';
@endphp

<header class="absolute inset-x-0 top-0 z-30 {{ $textColor }}">
    <div class="container-site relative flex items-center justify-between py-8">
        <a href="{{ route('home') }}" class="font-heading text-2xl font-bold uppercase tracking-wide">
            Tasty Food
        </a>

        <button id="menu-toggle" type="button" class="md:hidden" aria-label="Buka menu" aria-expanded="false">
            <x-heroicon-o-bars-3 class="size-7" />
        </button>

        <nav id="menu" class="absolute inset-x-0 top-full hidden bg-brand-black px-6 py-5 text-white md:static md:flex md:bg-transparent md:p-0 md:text-inherit">
            <ul class="flex flex-col gap-4 md:flex-row md:gap-10">
                @foreach ($menus as $menu)
                    <li>
                        <a href="{{ route($menu['route']) }}"
                           class="font-heading text-sm font-medium uppercase transition hover:opacity-70 {{ request()->routeIs($menu['route'].'*') ? 'font-bold' : '' }}">
                            {{ $menu['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>