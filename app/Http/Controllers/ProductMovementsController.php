<?php

namespace App\Http\Controllers;

use App\Models\ProductMovements;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Response;

class ProductMovementsController extends Controller
{
    public function getMovements($product)
    {
        $movements = DB::table('products_movements')
                   ->where('corp_id', 1)
                   ->where('product_id', $product)
                   ->get();

        $allMovements = '<thead><tr><th nowrap>Date</th><th nowrap>Type</th><th nowrap>Quantité</th><th nowrap>Prix U</th><th nowrap>Total</th><th nowrap>Référence</th></tr></thead><tbody>';

        foreach($movements as $mv)
        {
            $allMovements .= '<tr><td>'.returnDate($mv->_date).'</td><td>'.(($mv->_type == 'in')? '<span class="badge badge-success">Augmentation</span>': '<span class="badge badge-primary">Diminution</span>').'</td><td>'.number_format($mv->quantity,2,',',' ').'</td><td>'.number_format($mv->price,2,',',' ').'</td><td>'.number_format($mv->total,2,',',' ').'</td><td></td></tr>';
        }

        $allMovements .= '</tbody>';

        return response($allMovements)->header('ContentType', 'text/html');
    }

    public function getQuantity($product)
    {
        $qty = DB::table('products_movements')
             ->where('corp_id', 1)
             ->where('product_id', $product)
             ->orderBy('id', 'desc')
             ->first();
        return response()->json($qty);
    }

    public function addMovement(Request $request)
    {
        $result = [];
        if(($request->movementType == 'in' || $request->movementType == 'out') && $request->movementDate != '' && is_numeric($request->movementQuantity) && $request->movementQuantity > 0 && is_numeric($request->form))
        {
            $qty = DB::table('products_movements')
                 ->where('corp_id', 1)
                 ->where('product_id', $request->form)
                 ->orderBy('id', 'desc')
                 ->first();
            
            $currentQty = (!isset($qty->new_quantity))? 0: $qty->new_quantity;

            if($request->movementType == 'out' && (floatval($request->movementQuantity) > floatval($currentQty)))
            {
                $result = ['msg' => 'Vous n\'avez pas assez de stock pour cette opération !', 'type' => 'error'];
            }
            else
            {
                $newQty = ($request->movementType == 'in')? (floatval($currentQty) + floatval($request->movementQuantity)): (floatval($currentQty) - floatval($request->movementQuantity));
                $mv = new ProductMovements();
                $mv->_type = $request->movementType;
                $mv->product_id = $request->form;
                $mv->quantity = $request->movementQuantity;
                $mv->price = null;
                $mv->discount = null;
                $mv->tax = null;
                $mv->_date = sqlDate($request->movementDate);
                $mv->operation_title = $request->movementNotes;
                $mv->operation_id = null;
                $mv->total = null;
                $mv->new_quantity = $newQty;
                $mv->corp_id = 1;
                $mv->user_id = 1;
                $mv->save();
                $result = ['msg' => 'Quantité '.(($request->movementType == 'in')? 'augmentée': 'réduite').' de '.$request->movementQuantity.' (nouvelle quantité => '.$newQty.')', 'type' => 'success'];
            }
        }
        else
        {
            $result = ['msg' => 'Une erreur s\'est produite, réessayez !', 'type' => 'error'];
        }
        return $result;
    }
}
