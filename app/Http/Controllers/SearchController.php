<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class SearchController extends Controller
{
    public function getSearchResults($target)
    {
        $countContent = 0;
        $results = '<div class="pt-2" id="contentSearch" style="max-height:420px;overflow-y:auto;">';

        $accounts = DB::table('third_accounts')
                  ->where([
                    ['_name', 'like', '%'.$target.'%'],
                    ['corp_id', 1]
                  ])
                  ->orwhere([
                    ['code', 'like', '%'.$target.'%'],
                    ['corp_id', 1]
                  ])
                  ->take(3)
                  ->get();

        if($accounts->count() > 0)
        {
            $countContent++;
            $results .= '<div class="mb-2" id="searchAccounts"><h6 class="bg-gray p-2"><b>Tiers ('.$accounts->count().')</b></h6>';
            foreach($accounts as $account)
            {
                $results .= '<div class=""><div class="dropdown-item"><a href="/'.(($account->account_type == 'supplier')? 'achats': 'ventes').'/'.(($account->account_type == 'supplier')? 'fournisseurs': 'clients').'/'.$account->id.'/'.url_mg($account->_name).'"><div class="media"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg><div class="media-body"><div class="data-info"><h6 class="">'.$account->_name.'</h6><p class="">'.(($account->code != null)? '#'.$account->code: '').'</p></div></div></div></a></div></div>';
            }
            $results .= '</div>';
        }

        $products = DB::table('products_services')
                  ->where([
                    ['designation', 'like', '%'.$target.'%'],
                    ['corp_id', 1]
                  ])
                  ->orwhere([
                    ['code', 'like', '%'.$target.'%'],
                    ['corp_id', 1]
                  ])
                  ->take(3)
                  ->get();
        
        if($products->count() > 0)
        {
            $countContent++;
            $results .= '<div class="mb-2" id="searchProducts"><h6 class="bg-gray p-2"><b>Produits/Services ('.$products->count().')</b></h6>';
            foreach($products as $product)
            {
                $results .= '<div class=""><div class="dropdown-item"><a href="/ventes/produits-services/'.$product->id.'/'.url_mg($product->designation).'"><div class="media"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg><div class="media-body"><div class="data-info"><h6 class="">'.(($product->_type == 'service')? 'Service': 'Produit').(($product->code == null)? '': '<span class="ml-2">#'.$product->code.'</span>').'</h6><p class="">'.$product->designation.'</p></div></div></div></a></div></div>';
            }
            $results .= '</div>';
        }

        $transactions = DB::table('transactions')
                      ->where([
                        ['label', 'like', '%'.$target.'%'],
                        ['corp_id', 1]
                      ])
                      ->orwhere([
                        ['amount', $target],
                        ['corp_id', 1]
                      ])
                      ->orwhere([
                        ['payment_date', sqlDate($target)],
                        ['corp_id', 1]
                      ])
                      ->take(3)
                      ->get();

        if($transactions->count() > 0)
        {
            $countContent++;
            $results .= '<div class="mb-2" id="searchTransactions"><h6 class="bg-gray p-2"><b>Transactions ('.$transactions->count().')</b></h6>';
            foreach($transactions as $transaction)
            {
                $type = $transaction->transaction_type;
                $results .= '<div class=""><div class="dropdown-item"> <a href="/tresorerie/transactions/voir/pdf/'.$transaction->id.'"><div class="media"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg><div class="media-body"><div class="data-info"><h6 class=""><span class="text-'.(($type == 'cash_out')? 'danger': 'success').'">'.(($type == 'cash_out')? 'Décaissement': 'Encaissement').'</span> <span class="ml-2 text-primary">'.returnDate($transaction->payment_date).'</span></h6><p class="">'.number_format($transaction->amount,2,',',' ').'</p></div></div></div></a></div></div>';
            }
            $results .= '</div>';
        }

        if($countContent == 0)
        {
            $results .= '<div class="pt-4 pb-4 text-center"><h5><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 511.96 511.96" style="enable-background:new 0 0 511.96 511.96;" xml:space="preserve"><circle style="fill:#F4D44E;" cx="256" cy="255.96" r="255.96"/><path style="fill:#E8C842;width:50px;height:50px" d="M172.398,451.935C11.247,358.894,1.46,131.055,150.506,23.523
           C103.321,44.752,62.118,80.456,34.272,128.687c-70.551,122.199-28.683,278.452,93.515,349.004
           c89.928,51.919,198.295,42.951,277.38-14.107C332.804,496.142,246.364,494.639,172.398,451.935z"/><ellipse style="fill:#656566;" cx="174.962" cy="265.869" rx="23.349" ry="29.769"/><path style="fill:#4F4F51;" d="M192.822,283.325c-12.894,0-23.349-13.328-23.349-29.769c0-6.508,1.643-12.523,4.422-17.423
           c-12.398,0.713-22.28,13.751-22.28,29.735c0,16.441,10.453,29.769,23.349,29.769c7.79,0,14.685-4.869,18.927-12.346
           C193.536,283.311,193.18,283.325,192.822,283.325z"/><g><path style="fill:#656566;" d="M200.372,388.47c-3.885-1.765-5.604-6.346-3.839-10.231c23.367-51.42,96.137-50.383,118.936,0.011
               c1.758,3.889,0.033,8.467-3.856,10.225c-3.887,1.76-8.466,0.033-10.225-3.855c-17.446-38.566-72.985-39.169-90.787,0.011
               C209.309,387.48,204.253,390.233,200.372,388.47z"/><path style="fill:#656566;" d="M373.247,212.618c-13.18-12.604-29.799-19.351-46.816-19.008c-4.257,0.123-7.796-3.301-7.882-7.567
               c-0.087-4.267,3.301-7.796,7.568-7.882c21.12-0.451,41.657,7.839,57.812,23.29c3.084,2.949,3.193,7.84,0.243,10.924
               C381.216,215.464,376.327,215.564,373.247,212.618z"/><path style="fill:#656566;" d="M127.829,212.375c-2.95-3.084-2.841-7.976,0.243-10.924c16.155-15.45,36.687-23.72,57.812-23.29
               c4.266,0.086,7.655,3.616,7.568,7.882c-0.087,4.266-3.613,7.694-7.882,7.567c-17.003-0.346-33.637,6.404-46.816,19.008
               C135.672,215.565,130.78,215.462,127.829,212.375z"/></g><path style="fill:#9CD7F2;" d="M132.895,433.369L132.895,433.369c28.187,0,47.09-28.95,35.755-54.756l-28.703-55.081
           c-2.636-5.059-9.876-5.054-12.505,0.008l-29.355,56.521C87.051,405.186,105.455,433.369,132.895,433.369z"/><path style="fill:#71C5DB;" d="M125.213,388.526l8.394-63.134c0.293-2.201,1.508-3.91,3.124-4.959
           c-3.22-1.521-7.419-0.493-9.29,3.108l-29.355,56.521c-11.036,25.124,7.367,53.307,34.809,53.307l0,0
           c7.538,0,14.4-2.085,20.209-5.612C136.59,423.188,123.934,407.592,125.213,388.526z"/><ellipse style="fill:#656566;" cx="337.038" cy="265.869" rx="23.349" ry="29.769"/><path style="fill:#4F4F51;" d="M354.893,283.325c-12.894,0-23.349-13.328-23.349-29.769c0-6.508,1.643-12.523,4.422-17.423
           c-12.398,0.713-22.28,13.751-22.28,29.735c0,16.441,10.453,29.769,23.349,29.769c7.79,0,14.685-4.869,18.927-12.346
           C355.608,283.311,355.252,283.325,354.893,283.325z"/></svg>Oops !</h5>Je ne trouve aucun résultat pour <span class="text-dark"><b>"'.$target.'"</b></span></div>';
        }

        $results .= '</div>';
        return response($results)->header('Content-Type', 'text/html'); 
    }
}
