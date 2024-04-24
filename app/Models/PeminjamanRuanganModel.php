<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanRuanganModel extends Model
{
    use HasFactory;
    protected $table = 't_peminjaman_ruangan';
    protected $primaryKey = 'peminjaman_ruangan_id';

    protected $fillable = ['peminjaman_ruangan_id','nim','nama','room_id','class','date_borrow','date_return'];
    public $timestamps=false;
}