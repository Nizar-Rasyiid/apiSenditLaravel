<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
protected $table = 'pemesanans';
protected $primaryKey = 'id_pemesanan';

protected $fillable = [
    'id_user',
    'jarak' ,
    'lokasi_jemput',
    'lokasi_tujuan',
    'status',
    'nama_penerima',
    'id_kurir',
    'no_hp_penerima',
    'jenis_paket',
    'keterangan',
    'nama_pengirim',
    'no_hp_pengirim'
];
}
