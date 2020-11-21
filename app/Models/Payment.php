<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payment_mode";
    protected $fillable = ['designation', '_type', 'corp_id', 'user_id'];
}
