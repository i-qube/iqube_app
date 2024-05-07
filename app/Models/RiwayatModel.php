<?php

namespace App\Models;

use App\Http\Controllers\PeminjamanBarangController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiwayatModel extends Model
{
    use HasFactory;
    protected $table = 'riwayat';
    protected $primaryKey = 'riwayat_id';

    protected $fillable = ['nim','peminjaman_ruangan_id','date_borrow', 'date_return'];
    public $timestamps = false;
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'nim', 'nim');
    }

    public function peminjaman_ruangan(): BelongsTo
    {
        return $this->belongsTo(PeminjamanBarangController::class, 'peminjaman_ruangan_id', 'peminjaman_ruangan_id');
    }
}
