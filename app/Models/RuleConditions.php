<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuleConditions extends Model
{
    protected $table = "categorisation_rules_conditions";
    protected $fillable = ['label', 'cp_operator', 'value', 'rule_id'];
}
