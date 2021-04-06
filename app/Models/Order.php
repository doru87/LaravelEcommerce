<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(){
        return $this->belongsTo('\App\Models\User');
    }
    public function order_products(){
        return $this->hasMany(Order_Product::class,'orders_id');
    }
}
