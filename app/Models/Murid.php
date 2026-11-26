<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Murid extends Model
{
protected $fillable = [
    'nisn',
    'nama',
    'jenis_kelamin',
    'alamat',
    'rayon',
    'rombel',
    'no_telp',
];
}
