<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VTA extends Model
{
    protected $table = "vta";
    protected $fillable = ['value', 'corp_id', 'user_id'];
}
