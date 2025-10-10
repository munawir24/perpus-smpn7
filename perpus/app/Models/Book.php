<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = ['judul', 'penulis', 'penerbit', 'tahun_terbit', 'kota_terbit', 'isbn', 'lampiran', 'link', 'is_popular', 'is_publish', 'jumlah_halaman', 'jumlah_view','cover'];
}
