<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class getHelpersController extends Controller
{
    public function isNumeric($val)
    {
        return is_numeric($val);
    }
}
