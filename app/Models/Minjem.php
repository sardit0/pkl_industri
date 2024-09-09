<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minjem extends Model
{
    use HasFactory;

    protected $fillable = ['id','jumlah','tanggal_minjem','tanggal_kembali','batas_tgl','id_user','status','id_buku',
    ];

    public $timestamps = true;


    public function buku() {
        return $this->belongsTo(Buku::class,'id_buku');
    }
    public function user() {
        return $this->belongsTo(User::class,'id_user');
    }

    public function kembali() {
        return $this->hasMany(Kembali::class);
    }
}