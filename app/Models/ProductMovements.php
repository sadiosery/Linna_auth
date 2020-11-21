<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMovements extends Model
{
    protected $table = "products_movements";
    protected $fillable = ['_type', 'product_id', 'quantity', 'price', 'discount', 'tax', '_date', 'operation_title', 'operation_id', 'total', 'new_quantity', 'corp_id', 'user_id']; 
}
