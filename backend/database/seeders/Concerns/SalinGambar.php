<?php

namespace Database\Seeders\Concerns;

use Illuminate\Support\Facades\Storage;

trait SalinGambar
{
    /** Salin gambar dari database/seeders/images ke disk public, kembalikan path-nya. */
    protected function salin(string $file, string $folder): ?string
    {
        $sumber = database_path('seeders/images/'.$file);

        if (! is_file($sumber)) {
            $this->command?->warn("Gambar tidak ditemukan: {$file}");

            return null;
        }

        $tujuan = $folder.'/'.$file;
        Storage::disk('public')->put($tujuan, file_get_contents($sumber));

        return $tujuan;
    }
}