<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corporate extends Model
{
    protected $table = "corporates";
    protected $fillable = ['corp_name'];
}
