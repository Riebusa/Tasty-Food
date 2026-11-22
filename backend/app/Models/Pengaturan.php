<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $fillable = ['key', 'value'];

    private static ?array $cache = null;

    protected static function booted(): void
    {
        static::saved(fn () => self::$cache = null);
        static::deleted(fn () => self::$cache = null);
    }

    public static function get(string $key, ?string $default = null): ?string
    {
        self::$cache ??= static::pluck('value', 'key')->all();

        return self::$cache[$key] ?? $default;
    }

    /** URL gambar dari pengaturan (nilai disimpan sebagai path di disk public). */
    public static function gambar(string $key): string
    {
        $path = static::get($key);

        return $path ? asset('storage/'.$path) : asset('images/placeholder.svg');
    }

    /** Foto latar header. Kalau admin belum mengunggah, pakai file bawaan di public. */
    public static function heroBg(): string
    {
        $path = static::get('hero_bg');

        return $path
            ? asset('storage/'.$path)
            : asset('images/hero/hero-bg.jpg');
    }
}