<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['designation', 'data_type', 'category_type', 'user_id', 'corp_id'];
}
