<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minjem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','jumlah','tanggal_minjem','tanggal_kembali','batas_tgl','id_user','status','id_buku', 'alasan', 'denda'
    ];

    public $timestamps = true;

    public function hitungDenda()
    {
        if ($this->tanggal_kembali) {
            $batasWaktu = Carbon::parse($this->tanggal_pinjam)->addDays(7);
            $tanggalKembali = Carbon::parse($this->tanggal_kembali);

            if ($tanggalKembali->greaterThan($batasWaktu)) {
                $hariTerlambat = $tanggalKembali->diffInDays($batasWaktu);
                return $hariTerlambat * 1000; // Rp. 1.000 per hari
            }
        }
        return 0;
    }
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