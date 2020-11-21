<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrices extends Model
{
    protected $table = "products_prices";
    protected $fillable = ['price_type', 'type_id', 'qty', 'price', 'product_id', 'corp_id', 'user_id']; 
}
