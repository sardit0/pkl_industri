<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kembali extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'nama', 'jumlah', 'tanggal_kembali', 'id_user', 'status', 'id_minjem', 'id_buku', 'denda'
    ];

    public $timestamps = true;

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function minjem()
    {
        return $this->belongsTo(Minjem::class, 'id_minjem');
    }
}