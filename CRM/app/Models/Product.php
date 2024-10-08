<?php

namespace App\Models;

use App\Traits\Exemple;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Exemple;

    protected $fillable = [
        'name',
        'price',
        'stock',
        'description'
    ];
    
    public function details() {
        return $this->hasOne(ProductDetails::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    } 

    public function orders() {
        return $this->belongsToMany(Order::class);
    }

}
