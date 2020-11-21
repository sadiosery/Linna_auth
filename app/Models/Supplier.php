<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "third_accounts";
    protected $fillable = ['code', '_name', 'category', 'tel1', 'tel2', 'email', 'website', 'address', 'city', 'country', 'township', '_district', 'payment_mode', 'notes', 'conditions', 'e_document', 'account_type', 'legal_id', 'current_balance', 'balance_date', 'bank_name', 'bank_account', 'corp_id', 'user_id'];
}
