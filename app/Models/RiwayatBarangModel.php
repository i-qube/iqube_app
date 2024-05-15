<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatBarangModel extends Model
{
    use HasFactory;
    protected $table = 't_riwayat_barang';
    protected $primaryKey = 'peminjaman_barang_id';

    protected $fillable = ['peminjaman_barang_id','nim','item_id','nama','class','jumlah','date_borrow'];
    public $timestamps=false;
}