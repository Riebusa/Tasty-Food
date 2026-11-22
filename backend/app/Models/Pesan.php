<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $fillable = ['subject', 'nama', 'email', 'pesan', 'sudah_dibaca'];

    protected $casts = ['sudah_dibaca' => 'boolean'];
}