@props(['title'])

<section class="relative h-[320px] bg-brand-black bg-cover bg-center text-white md:h-[470px]"
         style="background-image: url('{{ \App\Models\Pengaturan::heroBg() }}')">
    <div class="absolute inset-0 bg-black/40"></div>

    <x-navbar theme="light" />

    <div class="container-site relative flex h-full items-center pt-16">
        <h1 class="font-heading text-4xl font-extrabold uppercase md:text-6xl">{{ $title }}</h1>
    </div>
</section>