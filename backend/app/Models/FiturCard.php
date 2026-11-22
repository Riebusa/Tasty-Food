<?php

namespace App\Models;

use App\Models\Concerns\HasGambarUrl;
use Illuminate\Database\Eloquent\Model;

class FiturCard extends Model
{
    use HasGambarUrl;

    protected $fillable = ['judul', 'deskripsi', 'gambar', 'urutan'];
}