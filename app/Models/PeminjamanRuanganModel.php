<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PeminjamanRuanganModel extends Model
{
    use HasFactory;
    protected $table = 't_peminjaman_ruangan';
    protected $primaryKey = 'peminjaman_ruangan_id';

    protected $fillable = ['nim','room_id','date_borrow','start_time', 'end_time', 'status'];
    public $timestamps=false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'nim', 'nim');
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(RuanganModel::class, 'room_id', 'room_id');
    }
}