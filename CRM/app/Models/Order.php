<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_price',
        'paid_at'
    ];

    public function products() {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id');
    }

    public function orders() {
        return $this->belongsTo(User::class);
    }


}
