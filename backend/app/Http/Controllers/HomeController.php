<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\FiturCard;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function __invoke()
    {
        $fitur = FiturCard::orderBy('urutan')->take(4)->get();

        // Berita besar: yang ditandai utama, atau berita terbaru jika belum ada yang ditandai
        $utama = Berita::terbit()->where('is_utama', true)->latest('diterbitkan_pada')->first()
            ?? Berita::terbit()->latest('diterbitkan_pada')->first();

        $beritaKecil = Berita::terbit()
            ->when($utama, fn ($q) => $q->whereKeyNot($utama->id))
            ->latest('diterbitkan_pada')
            ->take(4)
            ->get();

        $galeri = Galeri::where('is_home', true)->orderBy('urutan')->take(6)->get();

        return view('pages.home', compact('fitur', 'utama', 'beritaKecil', 'galeri'));
    }
}