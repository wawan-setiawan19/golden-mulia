<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pengguna',
        'nama_pengguna',
        'id_produk',
        'nama_produk',
        'qty',
        'jumlah',
    ];
}
