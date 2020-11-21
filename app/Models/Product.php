<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products_services";
    protected $fillable = ['code', 'designation', 'description', 'category', '_type', 'product_sp', 'purchase_price', 'sale_price', 'tax', 'margin', 'tracking', 'min_stock', 'corp_id', 'user_id']; 
}
