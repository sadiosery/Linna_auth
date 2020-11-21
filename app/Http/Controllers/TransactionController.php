<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use App\Models\Client;
use App\Models\Corporate;
use App\Models\Rule;
use App\Models\RuleConditions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use App\Imports\TransactionsImport;
use Maatwebsite\Excel\Facades\Excel;
use Response;
use Validator;
use PDF;

class TransactionController extends Controller
{
    public function showTransactions()
    {
        return view('pages.tresorerie.transactions')->with('category_name', 'tresorerie')->with('page_name', 'transactions')->with('page_title', 'Transactions')->with('has_scrollspy', 0)->with('scrollspy_offset', '');
    }

    public function listTransactions()
    {
        $filter_start = request('date_start');
        $filter_end = request('date_end');

       if($filter_start != '' && $filter_end != '' && $filter_start != 0 && $filter_end != 0 && checkdate(getMonth(sqlDate($filter_start)), getDay(sqlDate($filter_start)), getYear(sqlDate($filter_start))) && checkdate(getMonth(sqlDate($filter_end)), getDay(sqlDate($filter_end)), getYear(sqlDate($filter_end))))
        {
            $start = sqlDate($filter_start);
            $end = sqlDate($filter_end);
        }
        else
        {
            $start = date('Y').'-01-01';
            $end = date('Y-m-d');
        }

        $transactions = DB::table('transactions')
                      ->select('*')
                      ->where('corp_id', '1')
                      ->whereBetween('payment_date', [minDate($start,$end), maxDate($start,$end)])
                      ->orderByDESC('payment_date')
                      ->get();

        $checkedCategory = '';
        $checkedAccount = '';

        /*
        *   calculation *******************************
        */
            // total cash in for current period
            $total_cash_in = DB::table('transactions')->where('corp_id', 1)->where('transaction_type', 'cash_in')->whereBetween('payment_date', [minDate($start,$end), maxDate($start,$end)])->sum('amount');

            // total cash out for current period
            $total_cash_out = DB::table('transactions')->where('corp_id', 1)->where('transaction_type', 'cash_out')->whereBetween('payment_date', [minDate($start,$end), maxDate($start,$end)])->sum('amount');

            // total balance for current period
            $total_balance = floatval($total_cash_in) - floatval($total_cash_out);

            //getting previous year for start date
            $previous_start_year = intVal(getYear($start)) - 1;

            //getting previous start date
            $previous_start_date = $previous_start_year.'-'.getMonth($start).'-'.getDay($start);

            //getting previous year for end date
            $previous_end_year = intVal(getYear($end)) - 1;

            //getting previous end date
            $previous_end_date = $previous_end_year.'-'.getMonth($end).'-'.getDay($end);

            //total cash in for previous period
            $total_cash_in_previous_period = DB::table('transactions')->where('corp_id', 1)->where('transaction_type', 'cash_in')->whereBetween('payment_date', [minDate($previous_start_date, $previous_end_date), maxDate($previous_start_date, $previous_end_date)])->sum('amount');

            //total cash out for previous period
            $total_cash_out_previous_period = DB::table('transactions')->where('corp_id', 1)->where('transaction_type', 'cash_out')->whereBetween('payment_date', [minDate($previous_start_date, $previous_end_date), maxDate($previous_start_date, $previous_end_date)])->sum('amount');

            // total balance for previous period
            $total_balance_previous_period = floatval($total_cash_in_previous_period) - floatval($total_cash_out_previous_period);
        /*
        *   calculation ******************************* 
        */

        $content = '<div class="row layout-top-spacing">
        <div class="col-12 col-md-6 col-xl-4 section-space--pb_20">
            <div class="widget-content widget-content-area pt-4 pb-3 shadow border-left-success">
                <h6 class="text-uppercase">Encaissements</h6>
                <h4 class="text-success">'.number_format($total_cash_in,2,',',' ').'</h4> 
                <div class="mt-3">
                    <span class="font-size--12 text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg> 
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#dc3545" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg> 0%</span>
                    
                    <span class="float-right font-size--12 text-'.(($total_cash_in_previous_period < $total_cash_in)? 'success': 'danger').'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> '.((is_numeric(percent($total_cash_in_previous_period, $total_cash_in))? (($total_cash_in_previous_period < $total_cash_in)? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#28a745" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>': (($total_cash_in_previous_period > $total_cash_in)? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#dc3545" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>': '')): '' )).' '.((!is_numeric(percent($total_cash_in_previous_period, $total_cash_in)))? '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 286.054 286.054" width="24px" height="24px" style="enable-background:new 0 0 286.054 286.054;" xml:space="preserve"><g><path style="fill:#E2574C;" d="M143.027,0C64.04,0,0,64.04,0,143.027c0,78.996,64.04,143.027,143.027,143.027c78.996,0,143.027-64.022,143.027-143.027C286.054,64.04,222.022,0,143.027,0z M143.027,259.236c-64.183,0-116.209-52.026-116.209-116.209S78.844,26.818,143.027,26.818s116.209,52.026,116.209,116.209S207.21,259.236,143.027,259.236z M143.036,62.726c-10.244,0-17.995,5.346-17.995,13.981v79.201c0,8.644,7.75,13.972,17.995,13.972c9.994,0,17.995-5.551,17.995-13.972V76.707C161.03,68.277,153.03,62.726,143.036,62.726z M143.036,187.723c-9.842,0-17.852,8.01-17.852,17.86c0,9.833,8.01,17.843,17.852,17.843s17.843-8.01,17.843-17.843
                    C160.878,195.732,152.878,187.723,143.036,187.723z"/></g></svg>': percent($total_cash_in_previous_period, $total_cash_in).'%').'</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4 section-space--pb_20">
            <div class="widget-content widget-content-area pt-4 pb-3 shadow border-left-danger">
                <h6 class="text-uppercase">Décaissements</h6>
                <h4 class="text-danger">'.number_format($total_cash_out,2,',',' ').'</h4>
                <div class="mt-3">
                    <span class="font-size--12 text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg> 
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#dc3545" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg> 24%</span>
                    
                    <span class="float-right font-size--12 text-'.(($total_cash_out_previous_period < $total_cash_out)? 'danger': 'success').'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> '.((is_numeric(percent($total_cash_out_previous_period, $total_cash_out))? (($total_cash_out_previous_period < $total_cash_out)? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#dc3545" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>': (($total_cash_out_previous_period > $total_cash_out)? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#28a745" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>': '')): '' )).' '.((!is_numeric(percent($total_cash_out_previous_period, $total_cash_out)))? '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 286.054 286.054" width="24px" height="24px" style="enable-background:new 0 0 286.054 286.054;" xml:space="preserve"><g><path style="fill:#E2574C;" d="M143.027,0C64.04,0,0,64.04,0,143.027c0,78.996,64.04,143.027,143.027,143.027c78.996,0,143.027-64.022,143.027-143.027C286.054,64.04,222.022,0,143.027,0z M143.027,259.236c-64.183,0-116.209-52.026-116.209-116.209S78.844,26.818,143.027,26.818s116.209,52.026,116.209,116.209S207.21,259.236,143.027,259.236z M143.036,62.726c-10.244,0-17.995,5.346-17.995,13.981v79.201c0,8.644,7.75,13.972,17.995,13.972c9.994,0,17.995-5.551,17.995-13.972V76.707C161.03,68.277,153.03,62.726,143.036,62.726z M143.036,187.723c-9.842,0-17.852,8.01-17.852,17.86c0,9.833,8.01,17.843,17.852,17.843s17.843-8.01,17.843-17.843
                    C160.878,195.732,152.878,187.723,143.036,187.723z"/></g></svg>': percent($total_cash_out_previous_period, $total_cash_out).'%').'</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4 section-space--pb_20">
            <div class="widget-content widget-content-area pt-4 pb-3 shadow border-left-primary">
                <h6 class="text-uppercase">Résultat</h6>
                <h4 class="text-primary">'.((($total_balance > 0)? '+': '').number_format($total_balance,2,',',' ')).'</h4>
                <div class="mt-3">
                    <span class="font-size--12 text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg> 
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#dc3545" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg> 0%</span>
                    
                    <span class="float-right font-size--12 text-'.(($total_balance_previous_period < $total_balance)? 'success': 'danger').'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> '.((is_numeric(percent($total_balance_previous_period, $total_balance))? (($total_balance_previous_period < $total_balance)? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#28a745" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>': (($total_balance_previous_period > $total_balance)? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#dc3545" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>': '')): '' )).' '.((!is_numeric(percent($total_balance_previous_period, $total_balance)))? '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 286.054 286.054" width="24px" height="24px" style="enable-background:new 0 0 286.054 286.054;" xml:space="preserve"><g><path style="fill:#E2574C;" d="M143.027,0C64.04,0,0,64.04,0,143.027c0,78.996,64.04,143.027,143.027,143.027c78.996,0,143.027-64.022,143.027-143.027C286.054,64.04,222.022,0,143.027,0z M143.027,259.236c-64.183,0-116.209-52.026-116.209-116.209S78.844,26.818,143.027,26.818s116.209,52.026,116.209,116.209S207.21,259.236,143.027,259.236z M143.036,62.726c-10.244,0-17.995,5.346-17.995,13.981v79.201c0,8.644,7.75,13.972,17.995,13.972c9.994,0,17.995-5.551,17.995-13.972V76.707C161.03,68.277,153.03,62.726,143.036,62.726z M143.036,187.723c-9.842,0-17.852,8.01-17.852,17.86c0,9.833,8.01,17.843,17.852,17.843s17.843-8.01,17.843-17.843
                    C160.878,195.732,152.878,187.723,143.036,187.723z"/></g></svg>': abs(percent($total_balance_previous_period, $total_balance)).'%').'</span>
                </div>
            </div>
        </div></div><div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6 shadow">
                <div class="table-responsive mb-4 mt-4 pt-3">
                    <table id="table" class="table table-striped table-sm pt-2" style="width:100%"><thead><tr><td nowrap>Référence</td><td nowrap>Intitulé</td><td nowrap>Catégorie</td><td nowrap>Montant TTC</td><td nowrap>TVA</td><td nowrap>Date</td><td nowrap>Date de valeur</td><td nowrap>Tiers</td><td nowrap>Mode de paiement</td><td nowrap>Document</td><td nowrap>Mémo</td><td nowrap>Statut</td><td>Action</td></tr></thead><tbody>'; 

        foreach($transactions as $transaction)
        {
            if($transaction->category != null)  
            {
                $category = Category::find($transaction->category);
                if(isset($category->designation)){ $checkedCategory = $category->designation; }
            }
            else{ $checkedCategory = 'Non catégorisé'; }

            if($transaction->th_account != null)  
            {
                $account = Client::find($transaction->th_account);
                if(isset($account->_name)){ $checkedAccount = $account->_name; }
            }
            else{ $checkedAccount = ''; }

            $content .= '<tr id="row'.$transaction->id.'"><td nowrap>'.(($transaction->ref_number != null)? '#'.$transaction->ref_number: '').'</td><td nowrap>'.$transaction->label.'</td><td nowrap>'.$checkedCategory.'</td><td nowrap><span class="text-'.(($transaction->transaction_type == 'cash_in')? 'success': 'danger').'">'.returnNumberOp((($transaction->transaction_type == 'cash_out')? 'n': 'p'), number_format($transaction->amount,2,',',' ')).'</span></td><td nowrap>'.(($transaction->vta != null)? $transaction->vta.'%': '0%').'</td><td>'.returnDate($transaction->payment_date).'</td><td nowrap>'.(($transaction->value_date != null)? returnDate($transaction->value_date): '').'</td><td nowrap>'.$checkedAccount.'</td><td nowrap>'.$transaction->payment_mode.'</td><td nowrap></td><td nowrap>'.$transaction->notes.'</td><td nowrap><span class="badge outline-badge-primary">'.$transaction->status.'</span></td><td nowrap><a href="transactions/voir/pdf/'.$transaction->id.'" class="btn-get-transaction border p-1 pb-2 rounded" title="Générer le document" id="'.$transaction->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></a> <a class="btn-duplicate-transaction border rounded p-1 pb-2" style="cursor:pointer" id="'.$transaction->id.'" data-op="duplicate" title="Dupliquer la transaction"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></a> <a class="btn-edit-transaction border p-1 rounded pb-2" style="cursor:pointer" data-op="edit" id="'.$transaction->id.'" title="Modifier la transaction"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a> <a class="btn-delete-transaction border p-1 rounded pb-2" title="Supprimer la transaction" id="'.$transaction->id.'" style="cursor:pointer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></td></tr>';
        } 

        $content .= '</tbody></table></div></div></div></div>'; 
        return response($content)->header('Content-Type', 'text/html'); 
    }

    public function getOccurrences(Request $request)
    {
        $err;
        if($request->transaction_label == ''){
            $err = 'label';
        }
        elseif(!is_numeric($request->transaction_amount) || $request->transaction_amount <= 0)
        {
            $err = 'amount';
        }
        elseif($request->transaction_payment_date == '')
        {
            $err = 'date';
        }
        elseif($request->t_t != 'cash_in' && $request->t_t != 'cash_out')
        {
            $err = 'op';
        }
        elseif(!is_numeric($request->transaction_category))
        {
            $err = 'La catégorie est incorrecte !';
        }
        else
        {
            $count_transaction_occurrence = DB::table('transactions')
                                      ->where('corp_id', 1)
                                      ->where('transaction_type', $request->t_t)
                                      ->where('label', trim($request->transaction_label))
                                      ->where('amount', $request->transaction_amount)
                                      ->where('payment_date', sqlDate($request->transaction_payment_date))
                                      ->count();
            $err = $count_transaction_occurrence;
        }
        return $err; 
    }

    public function addTransaction(Request $request)
    {
        $count_duplicate = DB::table('transactions')
                         ->where('transaction_type', $request->t_t)
                         ->where('label', $request->transaction_label)
                         ->where('amount', $request->transaction_amount)
                         ->where('payment_date', sqlDate($request->transaction_payment_date))
                         ->count();

        $err = '';

        if($request->transaction_label == ''){
            $err = 'L\'intitulé est requis !';
        }
        elseif(!is_numeric($request->transaction_amount) || $request->transaction_amount <= 0)
        {
            $err = 'Le montant est une valeur numérique positive !';
        }
        elseif($request->transaction_payment_date == '')
        {
            $err = 'La date de paiement est requise !';
        }
        elseif(!is_numeric($request->transaction_category))
        {
            $err = 'La catégorie est incorrecte !';
        }
        elseif($request->t_t != 'cash_in' && $request->t_t != 'cash_out')
        {
            $err = 'Opération inconnue !';
        }
        else
        {
            $transaction = new Transaction();
            $transaction->label = trim($request->transaction_label);
            $transaction->amount = $request->transaction_amount;
            $transaction->vta = (is_numeric($request->transaction_vta))? $request->transaction_vta: null;  
            $transaction->payment_date = sqlDate($request->transaction_payment_date);
            $transaction->value_date = ($request->transaction_value_date == '')? null: sqlDate($request->transaction_value_date);
            $transaction->category = $request->transaction_category;
            $transaction->status = (isset($request->status))? 'Payé': 'Impayé';
            $transaction->transaction_type = $request->t_t;
            $transaction->notes = $request->transaction_notes;
            $transaction->th_account = (!is_numeric($request->transaction_th_account))? null: $request->transaction_th_account;
            $transaction->ref_number = $request->transaction_ref_num;
            $transaction->payment_mode = $request->transaction_payment_mode;
            $transaction->linked_document_type = null;
            $transaction->linked_document_id = null; 
            $transaction->corp_id = 1;
            $transaction->user_id = 1;
            $transaction->save();
            $err = 'saved';
        }
        return $err;
    }

    public function deleteTransaction($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();
        return 'Transaction supprimée avec succès !';
    }

    public function getTransactionById($id)
    {
        $transaction = Transaction::find($id);
        return response()->json($transaction);
    }

    public function edit_duplicateTransaction(Request $request)
    {
        $err = '';

        if($request->transaction_label == ''){
            $err = 'L\'intitulé est requis !';
        }
        elseif(!is_numeric($request->transaction_amount) || $request->transaction_amount <= 0)
        {
            $err = 'Le montant est une valeur numérique positive !';
        }
        elseif($request->transaction_payment_date == '')
        {
            $err = 'La date de paiement est requise !';
        }
        elseif(!is_numeric($request->transaction_category))
        {
            $err = 'La catégorie est incorrecte !';
        }
        elseif($request->t_t != 'cash_in' && $request->t_t != 'cash_out')
        {
            $err = 'Opération inconnue !';
        }
        else
        {
            if($request->op == 'duplicate')
            {
                $transaction = new Transaction();
                $transaction->label = trim($request->transaction_label);
                $transaction->amount = $request->transaction_amount;
                $transaction->vta = (is_numeric($request->transaction_vta))? $request->transaction_vta: null;  
                $transaction->payment_date = sqlDate($request->transaction_payment_date);
                $transaction->value_date = ($request->transaction_value_date == '')? null: sqlDate($request->transaction_value_date);
                $transaction->category = $request->transaction_category;
                $transaction->status = (isset($request->status))? 'Payé': 'Impayé';
                $transaction->transaction_type = $request->t_t;
                $transaction->notes = $request->transaction_notes;
                $transaction->th_account = (!is_numeric($request->transaction_th_account))? null: $request->transaction_th_account;
                $transaction->ref_number = $request->transaction_ref_num;
                $transaction->payment_mode = $request->transaction_payment_mode;
                $transaction->linked_document_type = null;
                $transaction->linked_document_id = null; 
                $transaction->corp_id = 1;
                $transaction->user_id = 1;
                $transaction->save();
                $err = 'duplicated';
            }
            elseif($request->op == 'edit')
            {
                $transaction = Transaction::find($request->transaction);
                $transaction->label = trim($request->transaction_label);
                $transaction->amount = $request->transaction_amount;
                $transaction->vta = (is_numeric($request->transaction_vta))? $request->transaction_vta: null;  
                $transaction->payment_date = sqlDate($request->transaction_payment_date);
                $transaction->value_date = ($request->transaction_value_date == '')? null: sqlDate($request->transaction_value_date);
                $transaction->category = $request->transaction_category;
                $transaction->status = (isset($request->status))? 'Payé': 'Impayé';
                $transaction->transaction_type = $request->t_t;
                $transaction->notes = $request->transaction_notes;
                $transaction->th_account = (!is_numeric($request->transaction_th_account))? null: $request->transaction_th_account;
                $transaction->ref_number = $request->transaction_ref_num;
                $transaction->payment_mode = $request->transaction_payment_mode;
                $transaction->linked_document_type = null;
                $transaction->linked_document_id = null; 
                $transaction->corp_id = 1;
                $transaction->user_id = 1;
                $transaction->save();
                $err = 'edited';
            }
        }
        return $err;
    }

    public function makePDF($id)
    {
        $transaction = Transaction::find($id);
        $corporate = Corporate::find(1);

        if($transaction->category != null)  
        {
            $category = Category::find($transaction->category);
            if(isset($category->designation)){ $checkedCategory = $category->designation; }
        }
        else{ $checkedCategory = ''; }

        if($transaction->th_account != null)  
        {
            $account = Client::find($transaction->th_account);
            if(isset($account->_name)){ $checkedAccount = $account->_name; }
        }
        else{ $checkedAccount = ''; }

        $content = '<title>'.$transaction->label.'</title>
                    <h4 style="color:#0076A8">'.$corporate->corp_name.'</h4>
                    <h5>'.$transaction->label.'</h5>
                    <h5>Tiers : '.$checkedAccount.'</h5>
                    <h5 style="text-align:right">Référence : '.$transaction->ref_number.'</h5>
                    <h5 style="text-align:right">Date de paiement : '.returnDate($transaction->payment_date).'</h5>
                    <h5 style="text-align:right">Date de valeur : '.(($transaction->value_date == null)? '': returnDate($transaction->value_date)).'</h5>
                    <table width="100%"><thead><tr style="background-color:#0076A8;color:#fff"><td>Catégorie</td><td>TVA</td><td>Montant TTC</td></tr></thead><tbody><tr>
                            <td>'.$checkedCategory.'</td>
                            <td>'.(($transaction->vta == null)? '0%': $transaction->vta.'%').'</td>
                            <td>'.number_format($transaction->amount,2,',',' ').'</td>
                        </tr></tbody></table>
                    <h5>Statut : '.$transaction->status.'</h5>
                    <h5>Payé par : '.$transaction->payment_mode.'</h5>
                    <h5>Mémo : '.$transaction->notes.'</h5>';

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($content)->setPaper('a4', 'portrait');
        $fileName = removeSpace(utf8_decode($transaction->label),'_');

        return $pdf->download($fileName.'.pdf');
        //return $pdf->stream($fileName.'.pdf');
    }

    public function ImportTransactions(Request $request)
    {
        $type = ($request->_type == 'cash_in' || $request->_type == 'cash_out' || $request->_type == 'all')? $request->_type: 'all';
        $msg = '';
        $total_rows = '';
        $ext = '';
        $row_count = 0;
        $row_to_import = 0;
        $fails = 0;
        $fail_detect_row = 0;
        $text = '';

        if($type == 'cash_in' || $type == 'cash_out')
        {
            $listcategories = DB::table('categories')
                            ->select('id', 'designation', 'category_type')
                            ->where([
                                ['data_type', $type],
                                ['corp_id', 1]
                            ])
                            ->orwhere([
                                ['data_type', $type],
                                ['category_type', 'default']
                            ])
                            ->orderBy('designation')
                            ->get(); 
        }
        else
        {
            /*$listcategories = DB::table('categories')
                            ->select('id', 'designation', 'category_type')
                            ->where([
                                ['data_type', 'cash_in'],
                                ['corp_id', 1]
                            ])
                            ->orwhere([
                                ['data_type', 'cash_out'],
                                ['corp_id', 1]
                            ])
                            ->orwhere([
                                ['data_type', $type],
                                ['category_type', 'default']
                            ])
                            ->orderBy('designation')
                            ->get(); */
        }

        $listAccounts = DB::table('third_accounts')
                      ->select('id', '_name', 'account_type')
                      ->where('corp_id', 1)
                      ->orderBy('_name')
                      ->get();

        $allAccounts = '<option value="">-- Tiers --</option>';
        foreach($listAccounts as $account)
        {
            $allAccounts .= '<option value="'.$account->id.'">'.$account->_name.(($account->account_type == 'supplier')? ' | Fournisseur': ' | Client').'</option>';
        }

        if ($request->hasFile('file')) 
        {
            if ($request->file('file')->isValid()) 
            {
                $file = $request->file('file');
                $ext = $file->getClientOriginalExtension();
                if($ext == 'xlsx' || $ext == 'xls' || $ext == 'csv')
                {
                    if($ext == 'xlsx' || $ext == 'xls')
                    {
                        $rows = Excel::toArray(new TransactionsImport, $file);
                        if($type == 'cash_in' || $type == 'cash_out')
                        {
                            foreach($rows as $line)
                            {
                                foreach($line as $val)
                                {
                                    $row_count++;
                                    $allCategories = '<option value="null">-- Catégories --</option>';
                                    $count_occurrence = DB::table('categories')->where('designation', $val[4])->count();
                                    if($count_occurrence == 0 && $val[4] != '')
                                    {
                                        $allCategories .= '<option selected value="'.$val[4].'">'.$val[4].'</option>';;
                                    }

                                    foreach($listcategories as $category)
                                    {
                                        $sub = DB::table('categories')->where('parent', $category->id)->doesntExist();
                                        if($sub)
                                        {                                           
                                            $allCategories .= '<option '.(($val[4] == $category->designation)? 'selected': '').' value="'.$category->id.'">'.$category->designation.'</option>';
                                        } 
                                    } 

                                    if($row_count > 1 && $row_count <= 1000)
                                    {
                                        /****************************rule checking ************************************/
                                    
                                            
                                        /********************************rule checking **********************************/

                                        $count_transaction_occurrence = DB::table('transactions')
                                                    ->where('corp_id', 1)
                                                    ->where('transaction_type', $type)
                                                    ->where('label', $val[0])
                                                    ->where('amount', $val[1])
                                                    ->where('payment_date', sqlDate($val[3]))
                                                    ->count();
                                        if($count_transaction_occurrence > 0)
                                        {
                                            $transaction_occurrence = DB::table('transactions')
                                                    ->where('corp_id', 1)
                                                    ->where('transaction_type', $type)
                                                    ->where('label', $val[0])
                                                    ->where('amount', $val[1])
                                                    ->where('payment_date', sqlDate($val[3]))
                                                    ->orderBy('id', 'desc')
                                                    ->first();
                                        }

                                        if($val[0] == '' || !is_numeric($val[1]) || $val[3] == '')
                                        {
                                            $fails++;
                                            $fail_detect_row = 1;
                                        }
                                        else
                                        {
                                            $fail_detect_row = 0;
                                        }

                                        $row_to_import++;
                                        $total_rows .= '<tr id="row_to_import'.$row_count.'"><td><a style="cursor:pointer;" class="btn_remove_row_to_import" id="'.$row_count.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></td><td id="stat'.$row_count.'">'.(($fail_detect_row == 1)? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#eb301c" stroke="#eb301c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>': '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2ac51c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>').'</td><td>rule</td><td>'.(($count_transaction_occurrence > 0)? '<a class="btn_show_transaction_occurrence" id="'.$transaction_occurrence->id.'" data-row="'.$row_count.'" style="cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0076A8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg></a>': '').'</td><td><input type="text" name="transactionRef'.$row_count.'" id="ref'.$row_count.'" /></td><td><input type="text" verification_type="not-empty" class="single_input_in_error '.(($val[0] == '')? 'border-danger': '').'" name="transactionLabel'.$row_count.'" id="'.$row_count.'" value="'.$val[0].'" /></td><td><select name="transactionCategory'.$row_count.'" id="category'.$row_count.'">'.$allCategories.'</select></td><td><input type="text" verification_type="not-empty" class="single_input_in_error '.((!is_numeric($val[1]))? 'border-danger': '').'" name="transactionAmount'.$row_count.'" id="'.$row_count.'" value="'.$val[1].'" /></td><td><input type="text" name="transactionVTA'.$row_count.'" id="vta'.$row_count.'" value="'.$val[2].'" /></td><td><input type="text" verification_type="not-empty" class="single_input_in_error datepicker '.(($val[3] == '')? 'border-danger': '').'" name="transactionDate'.$row_count.'" id="'.$row_count.'" value="'.date($val[3]).'" /></td><td><input type="text" name="transactionValuedate'.$row_count.'" id="valuedate'.$row_count.'" /></td><td><select name="transactionThaccount'.$row_count.'" id="thaccount'.$row_count.'">'.$allAccounts.'</select></td><td><input type="text" name="transactionPayment'.$row_count.'" id="payment'.$row_count.'" /></td></tr>';
                                    }
                                }
                            }
                                $msg .= '<div class="mb-4"><h5 id="import-title">Vous souhaitez importer <span>'.$row_to_import.'</span> transaction(s) !</h5>'.(($fails > 0)? '<h6 id="import-sub-title" class="text-danger">Important : <span>'.$fails.'</span> ligne(s) incorrecte(s) (vous pouvez corriger avant de valider l\'importation, seules les lignes valides seront importées)</h6>': '<h6 class="text-success">Aucune erreur detectée, vous pouvez valider l\'importation.</h6>').'</div><div class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0076A8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg><span class="text-dark text-bold"> : opération similaire detectée</span></div></div><div class="mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#003b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tablet"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg><span class="text-dark text-bold"> : règle de catégorisation detectée</span></div><form id="registerUpload" target="register-imports" function_to_load="clients" autocomplete="off">'.csrf_field().'<input type="hidden" name="col" value="'.$row_count.'" /><div class="table-responsive"><table class="table table-bordered table-hover" id="import-table"><thead><tr><th nowrap></th><th nowrap><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0050d9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></th><th nowrap></th><th nowrap></th><th nowrap>Référence</th><th nowrap>Intitulé de l\'opération</th><th nowrap>Catégorie</th><th nowrap>Montant</th><th nowrap>TVA</th><th nowrap>Date</th><th nowrap>Date de valeur</th><th nowrap>Tiers</th><th nowrap>Mode de paiement</th></tr></thead><tbody>'.$total_rows.'</tbody></table></div><div class="mt-3 text-right pr-3 mb-3"><input type="hidden" name="_type" id="_type" value="'.$type.'" /><button type="button" class="btn mr-2" id="btn-close-import-modal">Annuler</button><button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Valider</button></div></form>';
                        }
                        else
                        {

                        }
                    }   
                    else
                    {
                        /*$file_data = fopen($file, 'r');

                        while(($val = fgets($file_data)) !== false)
                        {
                            $data_rows[] = str_getcsv($val);
                        }
                        fclose($file_data);
                     
                        foreach($data_rows as $line)
                        {
                            foreach($line as $data)
                            {
                                $row_count++;

                                if($row_count > 1 && $row_count <= 1001)
                                {
                                    $tab = explode(";",$data);
                                    if($tab[1] == '')
                                    {
                                        $fails++;
                                        $fail_detect_name = 1;
                                    }
                                    else
                                    { 
                                        $fail_detect_name = 0; 
                                    }
                                    $row_to_import++;

                                    
                                    $total_rows .= '<tr id="row_to_import'.$row_count.'"><td><a style="cursor:pointer;" class="btn_remove_row_to_import" id="'.$row_count.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></td><td id="stat'.$row_count.'">'.(($fail_detect_name == 1)? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#eb301c" stroke="#eb301c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>': '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2ac51c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>').'</td><td><input type="text" name="clientCode'.$row_count.'" id="code'.$row_count.'" value="'.utf8_encode($tab[0]).'" /></td><td><input type="text" class="single_input_in_error '.(($fail_detect_name == 1)? 'border-danger': '').'" name="clientName'.$row_count.'" id="'.$row_count.'" value="'.utf8_encode($tab[1]).'" /></td><td><select name="clientCategory'.$row_count.'" id="category'.$row_count.'">'.$allCategories.'</select></td><td><input type="text" name="clientTel1'.$row_count.'" id="tel1'.$row_count.'" value="'.utf8_encode($tab[2]).'" /></td><td><input type="text" name="clientTel2'.$row_count.'" id="tel2'.$row_count.'" value="'.utf8_encode($tab[3]).'" /></td><td><input type="text" name="clientEmail'.$row_count.'" id="email'.$row_count.'" value="'.utf8_encode($tab[4]).'" /></td><td><input type="text" name="clientWebsite'.$row_count.'" id="website'.$row_count.'" value="'.utf8_encode($tab[5]).'" /></td><td><input type="text" name="clientAddress'.$row_count.'" id="address'.$row_count.'" value="'.utf8_encode($tab[6]).'" /></td><td><input type="text" name="clientCity'.$row_count.'" id="city'.$row_count.'" value="'.utf8_encode($tab[7]).'" /></td><td><input type="text" name="clientCountry'.$row_count.'" id="country'.$row_count.'" value="'.utf8_encode($tab[8]).'" /></td><td><input type="text" name="clientBalance'.$row_count.'" id="balance'.$row_count.'" value="'.utf8_encode($tab[9]).'" /></td><td><input type="text" class="datepicker" name="clientBalancedate'.$row_count.'" id="date'.$row_count.'" value="'.utf8_encode($tab[10]).'" /></td><td><input type="text" name="clientPayment'.$row_count.'" id="payment_mode'.$row_count.'" value="'.utf8_encode($tab[11]).'" /></td></tr>';
                                }
                            }
                        }
                        $msg .= '<div class="mb-4"><h5 id="import-title">Vous souhaitez importer <span>'.$row_to_import.'</span> client(s) !</h5>'.(($fails > 0)? '<h6 id="import-sub-title" class="text-danger">Important : <span>'.$fails.'</span> ligne(s) incorrecte(s) (vous pouvez corriger avant de valider l\'importation, seules les lignes valides seront importées)</h6>': '<h6 class="text-success">Aucune erreur detectée, vous pouvez valider l\'importation.</h6>').'</div><form id="registerUpload" target="register-imports" function_to_load="clients" autocomplete="off">'.csrf_field().'<input type="hidden" name="col" value="'.$row_count.'" /><div class="table-responsive"><table class="table table-bordered table-hover" id="import-table"><thead><tr><th nowrap></th><th nowrap><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0050d9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></th><th nowrap>Code</th><th nowrap>Nom/Raison sociale</th><th nowrap>Catégorie</th><th nowrap>Téléphone</th><th nowrap>Mobile</th><th nowrap>Email</th><th nowrap>Site web</th><th nowrap>Adresse</th><th nowrap>Ville</th><th nowrap>Pays</th><th nowrap>Solde actuel</th><th nowrap>Date</th><th nowrap>Mode de paiement</th></tr></thead><tbody>'.$total_rows.'</tbody></table></div><div class="mt-3 text-right pr-3 mb-3"><button type="button" class="btn mr-2" id="btn-close-import-modal">Annuler</button><button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Valider</button></div></form>';*/
                    }
                }
                else
                {
                    $msg = '<div class="col-12 p-3 text-center">
                    <svg id="Layer_1" enable-background="new 0 0 512 512" height="120" viewBox="0 0 512 512" width="120" xmlns="http://www.w3.org/2000/svg"><g><path d="m441 144.225v347.171c0 11.384-9.199 20.604-20.556 20.604h-328.888c-11.357 0-20.556-9.22-20.556-20.604v-470.792c0-11.384 9.199-20.604 20.556-20.604h205.556z" fill="#0076A8"/><path d="m410.167 113.32v378.076c0 11.383-9.199 20.604-20.556 20.604h30.833c11.357 0 20.556-9.22 20.556-20.604v-347.171z" fill="#003B5B"/><path d="m441 144.225h-123.333c-11.353 0-20.556-9.225-20.556-20.604v-123.621z" fill="#003B5B"/><g fill="#fafafa"><path d="m356.443 249.819h-200.886c-8.534 0-15.453-6.918-15.453-15.453 0-8.534 6.918-15.453 15.453-15.453h200.885c8.534 0 15.453 6.918 15.453 15.453 0 8.534-6.918 15.453-15.452 15.453z"/><path d="m356.443 311.63h-200.886c-8.534 0-15.453-6.918-15.453-15.453 0-8.534 6.918-15.453 15.453-15.453h200.885c8.534 0 15.453 6.918 15.453 15.453 0 8.534-6.918 15.453-15.452 15.453z"/><path d="m356.443 373.441h-200.886c-8.534 0-15.453-6.918-15.453-15.453 0-8.534 6.918-15.453 15.453-15.453h200.885c8.534 0 15.453 6.918 15.453 15.453 0 8.534-6.918 15.453-15.452 15.453z"/><path d="m269.907 435.251h-114.35c-8.534 0-15.453-6.918-15.453-15.453 0-8.534 6.918-15.453 15.453-15.453h114.35c8.534 0 15.453 6.918 15.453 15.453 0 8.535-6.918 15.453-15.453 15.453z"/></g></g></svg>
                    <p class="mt-3"><b>Le document attendu doit avoir l\'une des extensions suivantes : xls, xlsx, csv</b></p>
                    <button class="btn btn-info" id="btn_retry_upload" data-type="'.$type.'" type="button">Réessayer</button>
                    </div>';
                }
            }
        }
        return $msg;
    }

    /*public function registerImports(Request $request)
    {
        $count = intval($request->col);

        for($i=1;$i<=$count;$i++)
        {
            if($request->input('clientName'.$i) && $request->input('clientName'.$i) != '')
            {
                $client = new Client();
                $client->code = $request->input('clientCode'.$i);
                $client->_name = $request->input('clientName'.$i);
                $client->category = $request->input('clientCategory'.$i);
                $client->tel1 = $request->input('clientTel1'.$i);
                $client->tel2 = $request->input('clientTel2'.$i);
                $client->email = $request->input('clientEmail'.$i);
                $client->website = $request->input('clientWebsite'.$i);
                $client->address = $request->input('clientAddress'.$i);
                $client->city = $request->input('clientCity'.$i);
                $client->country = $request->input('clientCountry'.$i);
                $client->township = null;
                $client->_district = null;  
                $client->payment_mode = $request->input('clientPayment'.$i);
                $client->notes = null;
                $client->conditions = null;
                $client->e_document = 'no';
                $client->account_type = 'client';
                $client->legal_id = null;
                $client->current_balance = (is_numeric($request->input('clientBalance'.$i)))? $request->input('clientBalance'.$i): 0;
                $client->balance_date = ($request->input('clientBalancedate'.$i) != "")? sqlDate($request->input('clientBalancedate'.$i)): date('Y-m-d');
                $client->bank_name = null;
                $client->bank_account = null;
                $client->corp_id = 1;
                $client->user_id = 1;
                $client->save(); 
            }
        }

        return 'Clients importés avec succès !';
    }*/
}
