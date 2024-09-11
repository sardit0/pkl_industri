<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'jumlah_buku',
        'tahun_penerbit',
        'image',
        'id_penerbit',
        'id_penulis',
        'id_kategori',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit');
    }
    public function minjem()
    {
        return $this->belongsTo(Minjem::class);
    }
    public function kembali()
    {
        return $this->belongsTo(Kembali::class);
    }
}
