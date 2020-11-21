<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $fillable = ['label', 'amount', 'vta', 'payment_date', 'value_date', 'category', 'notes', 'th_account', 'ref_number', 'payment_mode', 'linked_document_type', 'linked_document_id', 'corp_id', 'user_id'];
}
