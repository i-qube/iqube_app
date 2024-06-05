<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Model;

class AdminModel extends Model  
{
    use HasFactory;
    protected $table = 'm_admin';
    protected $primaryKey = 'nip';

    protected $fillable = ['level_id','nama','password'];
    public $timestamps = false;

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}
