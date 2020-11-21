<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use PhpOffice\PhpSpreadSheet\SpreadSheet;

class ImportationController extends Controller
{
    public function showPage($type)
    {
        return view('pages.parametres.importation')->with('category_name', 'parametres')->with('page_name', 'importation')->with('page_title', 'Importer des '.$type)->with('has_scrollspy', 0)->with('scrollspy_offset', '');
    }

    public function uploadFile($type)
    {
        return response($type)->header('Content-Type', 'text/html'); 
    }

    public function import()
    {
        return response('ok')->header('Content-Type', 'text/html'); 
    }
}
