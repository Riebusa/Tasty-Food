<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Database\Seeders\Concerns\SalinGambar;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    use SalinGambar;

    public function run(): void
    {
        Galeri::truncate();

        foreach (range(1, 12) as $i) {
            Galeri::create([
                'judul' => "Galeri {$i}",
                'gambar' => $this->salin("galeri-{$i}.jpg", 'galeri'),
                'urutan' => $i,
                'is_slider' => $i <= 5,   // 5 foto pertama masuk slider
                'is_home' => $i <= 6,     // 6 foto pertama tampil di Home
            ]);
        }
    }
}