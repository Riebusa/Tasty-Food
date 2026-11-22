<?php

namespace Database\Seeders;

use App\Models\Berita;
use Database\Seeders\Concerns\SalinGambar;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    use SalinGambar;

    public function run(): void
    {
        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.';

        // Berita utama
        Berita::updateOrCreate(
            ['slug' => 'apa-saja-makanan-khas-nusantara'],
            [
                'judul' => 'Apa Saja Makanan Khas Nusantara?',
                'gambar' => $this->salin('berita-utama.jpg', 'berita'),
                'ringkasan' => $lorem,
                'isi' => $lorem."\n\n".$lorem,
                'is_utama' => true,
                'is_terbit' => true,
                'diterbitkan_pada' => now(),
            ]
        );

        // 8 berita lain (gambar bergantian dari 4 foto)
        foreach (range(1, 8) as $i) {
            $foto = 'berita-'.((($i - 1) % 4) + 1).'.jpg';

            Berita::updateOrCreate(
                ['slug' => "lorem-ipsum-{$i}"],
                [
                    'judul' => "Lorem Ipsum {$i}",
                    'gambar' => $this->salin($foto, 'berita'),
                    'ringkasan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.',
                    'isi' => $lorem."\n\n".$lorem,
                    'is_utama' => false,
                    'is_terbit' => true,
                    'diterbitkan_pada' => now()->subDays($i),
                ]
            );
        }
    }
}