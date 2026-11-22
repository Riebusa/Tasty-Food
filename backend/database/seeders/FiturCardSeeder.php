<?php

namespace Database\Seeders;

use App\Models\FiturCard;
use Database\Seeders\Concerns\SalinGambar;
use Illuminate\Database\Seeder;

class FiturCardSeeder extends Seeder
{
    use SalinGambar;

    public function run(): void
    {
        FiturCard::truncate();

        foreach (range(1, 4) as $i) {
            FiturCard::create([
                'judul' => 'Lorem Ipsum',
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo,',
                'gambar' => $this->salin("fitur-{$i}.png", 'fitur'),
                'urutan' => $i,
            ]);
        }
    }
}