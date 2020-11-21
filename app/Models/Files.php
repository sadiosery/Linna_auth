<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = "files";
    protected $fillable = ['filename', 'extension', 'token', 'data_type', 'data_id', 'corp_id', 'user_id']; 
}
