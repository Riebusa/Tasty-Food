<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $utama = Berita::terbit()
            ->where('is_utama', true)
            ->latest('diterbitkan_pada')
            ->first();

        $lainnya = Berita::terbit()
            ->when($utama, fn ($q) => $q->whereKeyNot($utama->id))
            ->latest('diterbitkan_pada')
            ->paginate(8)
            ->withQueryString();

        return view('pages.berita', compact('utama', 'lainnya'));
    }

    public function show(string $slug)
    {
        $berita = Berita::terbit()->where('slug', $slug)->firstOrFail();

        $terkait = Berita::terbit()
            ->whereKeyNot($berita->id)
            ->latest('diterbitkan_pada')
            ->take(4)
            ->get();

        return view('pages.berita-show', compact('berita', 'terkait'));
    }
}