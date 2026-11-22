<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Database\Seeders\Concerns\SalinGambar;
use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    use SalinGambar;

    public function run(): void
    {
        $pendek = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.';
        $panjang = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio. Phasellus vestibulum turpis ac sem commodo, at posuere eros consequat. Duis nec ex at ante volutpat posuere. Morbi vel nunc tortor. Nulla facilisi.';

        $data = [
            // Home
            'home_hero_judul_kecil' => 'Healthy',
            'home_hero_judul_besar' => 'Tasty Food',
            'home_hero_teks' => $pendek,
            'home_hero_gambar' => $this->salin('home-hero.png', 'pengaturan'),
            'home_tentang_teks' => $pendek,

            // Halaman Tentang
            'tentang_judul' => 'Tasty Food',
            'tentang_teks_tebal' => $pendek,
            'tentang_teks' => $pendek,
            'tentang_gambar_1' => $this->salin('tentang-1.jpg', 'pengaturan'),
            'tentang_gambar_2' => $this->salin('tentang-2.jpg', 'pengaturan'),
            'tentang_visi' => $panjang,
            'tentang_visi_gambar_1' => $this->salin('tentang-3.jpg', 'pengaturan'),
            'tentang_visi_gambar_2' => $this->salin('tentang-4.jpg', 'pengaturan'),
            'tentang_misi' => $panjang,
            'tentang_misi_gambar' => $this->salin('tentang-5.jpg', 'pengaturan'),

            // Footer & kontak
            'footer_deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'kontak_email' => 'tastyfood@gmail.com',
            'kontak_telepon' => '+62 812 3456 7890',
            'kontak_alamat' => 'Kota Bandung, Jawa Barat',
            'sosmed_facebook' => '#',
            'sosmed_twitter' => '#',
            'kontak_maps_embed' => '', // isi URL embed Google Maps nanti
        ];

        foreach ($data as $key => $value) {
            Pengaturan::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}