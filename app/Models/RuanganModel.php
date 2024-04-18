<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RuanganModel extends Model
{
    use HasFactory;
    protected $table = 'm_room';
    protected $primaryKey = 'room_id';

    protected $fillable = ['room_code','room_name','room_floor', 'image'];
    public $timestamps = false;
}
