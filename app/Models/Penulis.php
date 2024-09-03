<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    use HasFactory;

    public function penulis()
    {
        return $this->hasMany(Penulis::class , 'id_penulis');
    }
}
