<?php

namespace App\Http\Controllers;

use App\Models\ProductPrices;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Response;

class ProductPricesController extends Controller
{
    public function getPrices($product)
    {
        $prices = DB::table('products_prices')
                ->where('product_id', $product)
                ->where('corp_id', 1)
                ->get();

        $allPrices = '<div class="col-12 mb-2"><h4><b>'.$prices->count().' Prix défini(s)</b> <button class="btn-custom-light bg-white border rounded-circle p-2" id="btn_add_price" data-toggle="modal" data-target="#priceModal" title="Ajouter des prix" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></button></h4></div><div class="col-12 col-lg-7"><div class="table-responsive"><table class="table table-borderless table-striped"><tbody>';

        if($prices->count() > 0)
        {
            foreach($prices as $price)
            {
                $checkedCategory = 'Introuvable';
                $checkedAccount = 'Introuvable';
                if($price->price_type == 'category')  
                {
                    $category = Category::find($price->type_id);
                    if(isset($category->designation)){ $checkedCategory = $category->designation; }
                }
                else
                {
                    $account = Client::find($price->type_id);
                    if(isset($account->_name)){ $checkedAccount = $account->_name; }
                }

                $type = ($price->price_type == 'category')? 'Catégorie de clients': (($price->price_type == 'client')? 'Client': 'Fournisseur');
                $allPrices .= '<tr><td>'.(($price->price_type == 'category')? $checkedCategory: $checkedAccount).'</td><td><span class="badge badge-'.(($price->price_type == 'category')? 'warning': 'info').'">'.$type.'</span></td><td id="row_price'.$price->id.'">'.number_format($price->price,2,',',' ').'</td><td><a class="btn-edit-price mr-2" title="Modifier" type="button" style="color:#000" id="'.$price->id.'" data-target="'.$product.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a><a class="btn-delete-price" title="Supprimer" type="button" style="color:#000" id="'.$price->id.'" data-target="'.$product.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></td></tr>';
            }
        }
        else
        {
            $allPrices .= '<div class="bg-gray p-2 rounded text-dark text-center">Aucun prix défini !</div>';
        }

        $allPrices .= '</tbody></table></div></div>';

        return response($allPrices)->header('Content-Type', 'text/html'); 
    }

    public function deletePrice($id)
    {
        $price = ProductPrices::find($id);
        $price->delete();
        return 'Prix supprimé avec succès !';
    }

    public function getPriceById($id)
    {
        $price = ProductPrices::find($id);
        return response()->json($price);
    }

    public function editPrice(Request $request)
    {
        $price = ProductPrices::find($request->id);

        if(is_numeric($request->price) && $request->price >= 0)
        {
            $price->price = $request->price;
            $price->save();
        }
    }

    public function addPrices(Request $request)
    {
        if(is_numeric($request->col) && $request->col > 0)
        {
            $rows = $request->col;

            for($i=0;$i<=$rows;$i++)
            {
                if($request->input('priceType'.$i) && $request->input('priceTypeId'.$i) && $request->input('priceValue'.$i))
                {
                    if(($request->input('priceType'.$i) == 'category' || $request->input('priceType'.$i) == 'client' || $request->input('priceType'.$i) == 'supplier') && is_numeric($request->input('priceTypeId'.$i)) && is_numeric($request->input('priceValue'.$i)))
                    {
                        $price = new ProductPrices();
                        $price->price_type = $request->input('priceType'.$i);
                        $price->type_id = $request->input('priceTypeId'.$i);
                        $price->qty = null;
                        $price->price = $request->input('priceValue'.$i);
                        $price->product_id = $request->form;
                        $price->corp_id = 1;
                        $price->user_id = 1;
                        $price->save();
                    }
                }
            }
        }
        //return $err;
    }
}
