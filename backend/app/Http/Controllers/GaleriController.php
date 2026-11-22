<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function __invoke()
    {
        $slider = Galeri::where('is_slider', true)->orderBy('urutan')->get();
        $galeri = Galeri::orderBy('urutan')->paginate(12);

        return view('pages.galeri', compact('slider', 'galeri'));
    }
}