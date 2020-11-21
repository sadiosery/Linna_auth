<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $table = "categorisation_rules";
    protected $fillable = ['rule_name', 'operation_type', 'conditions_case', 'category_id', 'third_account_id', 'notes', 'auto_rule', 'corp_id', 'user_id'];
}
