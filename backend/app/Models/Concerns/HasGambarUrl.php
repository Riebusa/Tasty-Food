<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasGambarUrl
{
    protected function gambarUrl(): Attribute
    {
        return Attribute::get(fn () => $this->gambar
            ? asset('storage/'.$this->gambar)
            : asset('images/placeholder.svg'));
    }
}