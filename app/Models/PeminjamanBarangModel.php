<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBarangModel extends Model
{
    use HasFactory;
    protected $table = 't_peminjaman_barang';
    protected $primaryKey = 'peminjaman_barang_id';

    protected $fillable = ['admin_id','user_id','item_id','user_name','class','jumlah','date_borrow'];
    public $timestamps=false;
}