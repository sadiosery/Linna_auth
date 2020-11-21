<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Category;
use App\Charts\TheFusionCharts;
use Illuminate\Support\Facades\DB;
use Response;

class fusionChartsController extends Controller
{
    public function getClientCharts($client)
    {
        $clientChart = new TheFusionCharts;
        $clientChart->labels(['Jan', 'Feb', 'Mar']);
        $clientChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        return view('users', [ 'clientChart' => $clientChart ] );
    }
}
