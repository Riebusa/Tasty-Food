<?php

namespace Database\Seeders\Concerns;

use Illuminate\Support\Facades\Storage;

trait SalinGambar
{
    /**
     * Salin gambar dari database/seeders/images ke disk public dan kembalikan path-nya.
     * Jika file sumber tidak ada, dibuat gambar placeholder SVG supaya kolom tidak pernah null.
     */
    protected function salin(string $file, string $folder): string
    {
        $sumber = database_path('seeders/images/'.$file);

        if (is_file($sumber)) {
            $tujuan = $folder.'/'.$file;
            Storage::disk('public')->put($tujuan, file_get_contents($sumber));

            return $tujuan;
        }

        $this->command?->warn("Gambar tidak ditemukan: {$file} (memakai placeholder)");

        $nama = pathinfo($file, PATHINFO_FILENAME);
        $tujuan = $folder.'/'.$nama.'.svg';
        $label = e($nama);

        Storage::disk('public')->put($tujuan, <<<SVG
        <svg xmlns="http://www.w3.org/2000/svg" width="800" height="600" viewBox="0 0 800 600">
          <rect width="800" height="600" fill="#e5e5e5"/>
          <text x="400" y="310" font-family="sans-serif" font-size="32" fill="#9a9a9a" text-anchor="middle">{$label}</text>
        </svg>
        SVG);

        return $tujuan;
    }
}