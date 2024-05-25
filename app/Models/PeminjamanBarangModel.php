<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PeminjamanBarangModel extends Model
{
    use HasFactory;
    protected $table = 't_peminjaman_barang';
    protected $primaryKey = 'peminjaman_barang_id';

    protected $fillable = ['nim','item_id','jumlah','date_borrow'];
    public $timestamps=false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'nim', 'nim');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(ItemModel::class, 'item_id', 'item_id');
    }
}