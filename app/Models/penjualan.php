<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    protected $table = 'penjualan';
    use HasFactory;
    protected $fillable = [

        'tanggal_pemasukan',
        'id_barang',
        'penghasilan_driver',
    ];
}
