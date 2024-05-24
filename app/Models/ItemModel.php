<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    use HasFactory;
    
    protected $table = 'm_item';
    protected $primaryKey = 'item_id';

    protected $fillable = ['item_name', 'brand', 'item_qty', 'date_received', 'image'];

    public $timestamps = false;
}
