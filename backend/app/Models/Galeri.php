<?php

namespace App\Models;

use App\Models\Concerns\HasGambarUrl;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasGambarUrl;

    protected $fillable = ['judul', 'gambar', 'urutan', 'is_slider', 'is_home'];

    protected $casts = [
        'is_slider' => 'boolean',
        'is_home' => 'boolean',
    ];
}