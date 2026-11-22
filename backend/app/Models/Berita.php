<?php

namespace App\Models;

use App\Models\Concerns\HasGambarUrl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasGambarUrl;

    protected $fillable = [
        'judul', 'slug', 'gambar', 'ringkasan', 'isi',
        'is_utama', 'is_terbit', 'diterbitkan_pada',
    ];

    protected $casts = [
        'is_utama' => 'boolean',
        'is_terbit' => 'boolean',
        'diterbitkan_pada' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (Berita $berita) {
            if (blank($berita->slug)) {
                $dasar = Str::slug($berita->judul);
                $slug = $dasar;
                $i = 2;

                while (static::where('slug', $slug)->where('id', '!=', $berita->id ?? 0)->exists()) {
                    $slug = $dasar.'-'.$i++;
                }

                $berita->slug = $slug;
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeTerbit($query)
    {
        return $query->where('is_terbit', true)
            ->where(fn ($q) => $q->whereNull('diterbitkan_pada')->orWhere('diterbitkan_pada', '<=', now()));
    }
}