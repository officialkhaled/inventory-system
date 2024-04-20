<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'inventory_id',
        'description',
        'quantity',
        'img_path',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id')->withDefault();
    }
}
