<?php

namespace App\Http\Controllers;

use App\Http\Requests\KontakRequest;
use App\Models\Pesan;

class KontakController extends Controller
{
    public function index()
    {
        return view('pages.kontak');
    }

    public function store(KontakRequest $request)
    {
        Pesan::create($request->validated());

        return back()->with('sukses', 'Terima kasih, pesan Anda sudah terkirim.');
    }
}