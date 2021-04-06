<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'price',
    //     'description',
    //     'category',
    //     'image',
    //     'stock'
    // ];
    public function comments(){
        return $this->hasMany('App\Models\Comment');
        
    }
    
}
