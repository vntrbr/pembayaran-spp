<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    // use HasFactory;
    protected $table = 'pembayaran';

    protected $fillable = [
        'id_petugas','id_siswa','spp_bulan','tgl_bayar','jumlah_bayar'
    ];

    /**
     * Belongs To Pembayaran -> User(petugas)
     * 
     * @return void
     */
    public function petugas(){
        return $this->belongsTo(Petugas::class,'id_petugas');
    }

    /**
     * Belongs To Pembayaran -> Siswa
     * 
     * @return void
     */
    public function siswa(){
        return $this->belongsTo(Siswa::class,'id_siswa');
    }

}
