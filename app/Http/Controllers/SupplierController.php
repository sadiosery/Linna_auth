<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Imports\SuppliersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Files;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Response;

class SupplierController extends Controller
{
    public function showSuppliers()
    {
        return view('pages.commercial.achats.fournisseurs')->with('category_name', 'achats')->with('page_name', 'fournisseurs')->with('page_title', 'Fournisseurs')->with('has_scrollspy', 0)->with('scrollspy_offset', '');
    }

    public function listSuppliers()
    {
        $suppliers = DB::table('third_accounts')
                 ->select('id', '_name', 'code', 'current_balance', 'e_document')
                 ->where('corp_id', '1')
                 ->where('account_type', 'supplier')
                 ->orderBy('_name')
                 ->get();

        $allSuppliers = '<thead><tr><th>Code</th><th>Nom/Raison sociale</th><th>E-document</th><th>Solde</th><th>Action</th></tr></thead><tbody>'; 
        foreach($suppliers as $supplier)
        {
            $allSuppliers .= '<tr id="row'.$supplier->id.'"><td>#'.$supplier->code.'</td><td class="text-warning">'.$supplier->_name.'</td><td>'.getEdocument($supplier->e_document).'</td><td>'.number_format($supplier->current_balance,2,',',' ').'</td><td>
            <a href="/achats/fournisseurs/'.$supplier->id.'/'.url_mg($supplier->_name).'" class="btn-show-supplier border rounded p-1 pb-2" style="color:#000" title="Voir le fournisseur" id="'.$supplier->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>
            <a class="btn-edit-supplier border rounded p-1 pb-2" title="Modifier le fournisseur" type="button" style="color:#000" data-toggle="modal" datat-target="#suppliereditModal" id="'.$supplier->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
            <a class="btn-delete-supplier border rounded p-1 pb-2" title="Supprimer le fournisseur" type="button" style="color:#000" id="'.$supplier->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></td></tr>';
        }
        $allSuppliers .= '</tbody>';

        return response($allSuppliers)->header('Content-Type', 'text/html'); 
    }

    public function getSupplierById($id, $name = null)
    {
        if($name != null)
        {
            if(DB::table('third_accounts')->where('id', $id)->exists())
            {
                $supplier = Supplier::find($id);
                return view('pages.commercial.achats.voir-fournisseur', compact('supplier'))->with('category_name', 'achats')->with('page_name', 'fournisseurs')->with('page_title', $supplier->_name)->with('has_scrollspy', 0)->with('scrollspy_offset', '');
            }
            else
            {
                return redirect('achats/fournisseurs');
            }
        }
        else
        {
            $supplier = Supplier::find($id);
            return response()->json($supplier);
        }
    }

    public function addSupplier(Request $request)
    {
        $err = '';
        $supplier = new Supplier();
        $supplier->code = $request->supplierCode;
        $supplier->_name = $request->supplierName;
        $supplier->category = null;
        $supplier->tel1 = $request->supplierTel1;
        $supplier->tel2 = $request->supplierTel2;
        $supplier->email = $request->supplierEmail;
        $supplier->website = $request->supplierWebsite;
        $supplier->address = $request->supplierAddress;
        $supplier->city = $request->supplierCity;
        $supplier->country = $request->supplierCountry;
        $supplier->township = $request->supplierTownship;
        $supplier->_district = $request->supplierDistrict;  
        $supplier->payment_mode = $request->supplierPayment;
        $supplier->notes = $request->supplierNotes;
        $supplier->conditions = $request->supplierConditions;
        $supplier->e_document = (isset($request->edocument))? 'yes': 'no';
        $supplier->account_type = 'supplier';
        $supplier->legal_id = $request->supplierLegalid;
        $supplier->current_balance = (is_numeric($request->supplierBalance))? $request->supplierBalance: 0;
        $supplier->balance_date = ($request->supplierBalancedate != "")? sqlDate($request->supplierBalancedate): date('Y-m-d');
        $supplier->bank_name = $request->supplierBank;
        $supplier->bank_account = $request->supplierBankaccount;
        $supplier->corp_id = 1;
        $supplier->user_id = 1;

        $err = ($request->supplierName == '')? '_name_error': '';
        if($err == ''){
            $supplier->save(); 
        }
        else{
            return $err;
        }
    }

    public function deleteSupplier($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        //return data()->json(['success' => 'Catégory supprimée']);
    }

    public function editSupplier(Request $request)
    {
        $err = '';
        $supplier = Supplier::find($request->form);
        $supplier->code = $request->supplierCode;
        $supplier->_name = $request->supplierName;
        $supplier->tel1 = $request->supplierTel1;
        $supplier->tel2 = $request->supplierTel2;
        $supplier->email = $request->supplierEmail;
        $supplier->website = $request->supplierWebsite;
        $supplier->address = $request->supplierAddress;
        $supplier->city = $request->supplierCity;
        $supplier->country = $request->supplierCountry;
        $supplier->township = $request->supplierTownship;
        $supplier->_district = $request->supplierDistrict;  
        $supplier->payment_mode = $request->supplierPayment;
        $supplier->notes = $request->supplierNotes;
        $supplier->conditions = $request->supplierConditions;
        $supplier->e_document = (isset($request->edocument))? 'yes': 'no';
        $supplier->legal_id = $request->supplierLegalid;
        $supplier->bank_name = $request->supplierBank;
        $supplier->bank_account = $request->supplierBankaccount;

        $err = ($request->supplierName == '')? '_name_error': '';
        if($err == ''){
            $supplier->save(); 
        }
        else{
            return $err;
        }
    }

    public function ImportSuppliers(Request $request)
    {
        $msg = '';
        $total_rows = '';
        $ext = '';
        $row_count = 0;
        $row_to_import = 0;
        $fails = 0;
        $fail_detect_name = 0;

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
                        $rows = Excel::toArray(new SuppliersImport, $file);
                    
                        foreach($rows as $line)
                        {
                            foreach($line as $val)
                            {
                                $row_count++;

                                if($row_count > 1 && $row_count <= 1000)
                                {
                                    if($val[1] == '')
                                    {
                                        $fails++;
                                        $fail_detect_name = 1;
                                    }
                                    else
                                    { 
                                        $fail_detect_name = 0; 
                                    }
                                    $row_to_import++;
                                    $total_rows .= '<tr id="row_to_import'.$row_count.'"><td><a style="cursor:pointer;" class="btn_remove_row_to_import" id="'.$row_count.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></td><td id="stat'.$row_count.'">'.(($fail_detect_name == 1)? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#eb301c" stroke="#eb301c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>': '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2ac51c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>').'</td><td><input type="text" name="supplierCode'.$row_count.'" id="code'.$row_count.'" value="'.$val[0].'" /></td><td><input type="text" verification_type="not-empty" class="single_input_in_error '.(($fail_detect_name == 1)? 'border-danger': '').'" name="supplierName'.$row_count.'" id="'.$row_count.'" value="'.$val[1].'" /></td><td><input type="text" name="supplierTel1'.$row_count.'" id="tel1'.$row_count.'" value="'.$val[2].'" /></td><td><input type="text" name="supplierTel2'.$row_count.'" id="tel2'.$row_count.'" value="'.$val[3].'" /></td><td><input type="text" name="supplierEmail'.$row_count.'" id="email'.$row_count.'" value="'.$val[4].'" /></td><td><input type="text" name="supplierWebsite'.$row_count.'" id="website'.$row_count.'" value="'.$val[5].'" /></td><td><input type="text" name="supplierAddress'.$row_count.'" id="address'.$row_count.'" value="'.$val[6].'" /></td><td><input type="text" name="supplierCity'.$row_count.'" id="city'.$row_count.'" value="'.$val[7].'" /></td><td><input type="text" name="supplierCountry'.$row_count.'" id="country'.$row_count.'" value="'.$val[8].'" /></td><td><input type="text" name="supplierBalance'.$row_count.'" id="balance'.$row_count.'" value="'.$val[9].'" /></td><td><input type="text" class="datepicker" name="supplierBalancedate'.$row_count.'" id="date'.$row_count.'" value="'.$val[10].'" /></td><td><input type="text" name="supplierPayment'.$row_count.'" id="payment_mode'.$row_count.'" value="'.$val[11].'" /></td></tr>';
                                }
                            }
                        }
                        $msg .= '<div class="mb-4"><h5 id="import-title">Vous souhaitez importer <span>'.$row_to_import.'</span> fournisseur(s) !</h5>'.(($fails > 0)? '<h6 id="import-sub-title" class="text-danger">Important : <span>'.$fails.'</span> ligne(s) incorrecte(s) (vous pouvez corriger avant de valider l\'importation, seules les lignes valides seront importées)</h6>': '<h6 class="text-success">Aucune erreur detectée, vous pouvez valider l\'importation.</h6>').'</div><form id="registerUpload" target="register-imported-suppliers" function_to_load="suppliers" autocomplete="off">'.csrf_field().'<input type="hidden" name="col" value="'.$row_count.'" /><div class="table-responsive"><table class="table table-bordered table-hover" id="import-table"><thead><tr><th nowrap></th><th nowrap><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0050d9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></th><th nowrap>Code</th><th nowrap>Nom/Raison sociale</th><th nowrap>Téléphone</th><th nowrap>Mobile</th><th nowrap>Email</th><th nowrap>Site web</th><th nowrap>Adresse</th><th nowrap>Ville</th><th nowrap>Pays</th><th nowrap>Solde actuel</th><th nowrap>Date</th><th nowrap>Mode de paiement</th></tr></thead><tbody>'.$total_rows.'</tbody></table></div><div class="mt-3 text-right pr-3 mb-3"><button type="button" class="btn mr-2" id="btn-close-import-modal">Annuler</button><button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Valider</button></div></form>';
                    }   
                    else
                    {
                        $file_data = fopen($file, 'r');

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

                                    
                                    $total_rows .= '<tr id="row_to_import'.$row_count.'"><td><a style="cursor:pointer;" class="btn_remove_row_to_import" id="'.$row_count.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></td><td id="stat'.$row_count.'">'.(($fail_detect_name == 1)? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#eb301c" stroke="#eb301c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>': '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2ac51c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>').'</td><td><input type="text" name="supplierCode'.$row_count.'" id="code'.$row_count.'" value="'.utf8_encode($tab[0]).'" /></td><td><input type="text" verification_type="not-empty" class="single_input_in_error '.(($fail_detect_name == 1)? 'border-danger': '').'" name="supplierName'.$row_count.'" id="'.$row_count.'" value="'.utf8_encode($tab[1]).'" /></td><td><input type="text" name="supplierTel1'.$row_count.'" id="tel1'.$row_count.'" value="'.utf8_encode($tab[2]).'" /></td><td><input type="text" name="supplierTel2'.$row_count.'" id="tel2'.$row_count.'" value="'.utf8_encode($tab[3]).'" /></td><td><input type="text" name="supplierEmail'.$row_count.'" id="email'.$row_count.'" value="'.utf8_encode($tab[4]).'" /></td><td><input type="text" name="supplierWebsite'.$row_count.'" id="website'.$row_count.'" value="'.utf8_encode($tab[5]).'" /></td><td><input type="text" name="supplierAddress'.$row_count.'" id="address'.$row_count.'" value="'.utf8_encode($tab[6]).'" /></td><td><input type="text" name="supplierCity'.$row_count.'" id="city'.$row_count.'" value="'.utf8_encode($tab[7]).'" /></td><td><input type="text" name="supplierCountry'.$row_count.'" id="country'.$row_count.'" value="'.utf8_encode($tab[8]).'" /></td><td><input type="text" name="supplierBalance'.$row_count.'" id="balance'.$row_count.'" value="'.utf8_encode($tab[9]).'" /></td><td><input type="text" class="datepicker" name="supplierBalancedate'.$row_count.'" id="date'.$row_count.'" value="'.utf8_encode($tab[10]).'" /></td><td><input type="text" name="supplierPayment'.$row_count.'" id="payment_mode'.$row_count.'" value="'.utf8_encode($tab[11]).'" /></td></tr>';
                                }
                            }
                        }
                        $msg .= '<div class="mb-4"><h5 id="import-title">Vous souhaitez importer <span>'.$row_to_import.'</span> fournisseur(s) !</h5>'.(($fails > 0)? '<h6 id="import-sub-title" class="text-danger">Important : <span>'.$fails.'</span> ligne(s) incorrecte(s) (vous pouvez corriger avant de valider l\'importation, seules les lignes valides seront importées)</h6>': '<h6 class="text-success">Aucune erreur detectée, vous pouvez valider l\'importation.</h6>').'</div><form id="registerUpload" target="register-imported-suppliers" function_to_load="suppliers" autocomplete="off">'.csrf_field().'<input type="hidden" name="col" value="'.$row_count.'" /><div class="table-responsive"><table class="table table-bordered table-hover" id="import-table"><thead><tr><th nowrap></th><th nowrap><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0050d9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></th><th nowrap>Code</th><th nowrap>Nom/Raison sociale</th><th nowrap>Téléphone</th><th nowrap>Mobile</th><th nowrap>Email</th><th nowrap>Site web</th><th nowrap>Adresse</th><th nowrap>Ville</th><th nowrap>Pays</th><th nowrap>Solde actuel</th><th nowrap>Date</th><th nowrap>Mode de paiement</th></tr></thead><tbody>'.$total_rows.'</tbody></table></div><div class="mt-3 text-right pr-3 mb-3"><button type="button" class="btn mr-2" id="btn-close-import-modal">Annuler</button><button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Valider</button></div></form>';
                    }
                }
                else
                {
                    $msg = '<div class="col-12 p-3 text-center">
                    <svg id="Layer_1" enable-background="new 0 0 512 512" height="120" viewBox="0 0 512 512" width="120" xmlns="http://www.w3.org/2000/svg"><g><path d="m441 144.225v347.171c0 11.384-9.199 20.604-20.556 20.604h-328.888c-11.357 0-20.556-9.22-20.556-20.604v-470.792c0-11.384 9.199-20.604 20.556-20.604h205.556z" fill="#0076A8"/><path d="m410.167 113.32v378.076c0 11.383-9.199 20.604-20.556 20.604h30.833c11.357 0 20.556-9.22 20.556-20.604v-347.171z" fill="#003B5B"/><path d="m441 144.225h-123.333c-11.353 0-20.556-9.225-20.556-20.604v-123.621z" fill="#003B5B"/><g fill="#fafafa"><path d="m356.443 249.819h-200.886c-8.534 0-15.453-6.918-15.453-15.453 0-8.534 6.918-15.453 15.453-15.453h200.885c8.534 0 15.453 6.918 15.453 15.453 0 8.534-6.918 15.453-15.452 15.453z"/><path d="m356.443 311.63h-200.886c-8.534 0-15.453-6.918-15.453-15.453 0-8.534 6.918-15.453 15.453-15.453h200.885c8.534 0 15.453 6.918 15.453 15.453 0 8.534-6.918 15.453-15.452 15.453z"/><path d="m356.443 373.441h-200.886c-8.534 0-15.453-6.918-15.453-15.453 0-8.534 6.918-15.453 15.453-15.453h200.885c8.534 0 15.453 6.918 15.453 15.453 0 8.534-6.918 15.453-15.452 15.453z"/><path d="m269.907 435.251h-114.35c-8.534 0-15.453-6.918-15.453-15.453 0-8.534 6.918-15.453 15.453-15.453h114.35c8.534 0 15.453 6.918 15.453 15.453 0 8.535-6.918 15.453-15.453 15.453z"/></g></g></svg>
                    <p class="mt-3"><b>Le document attendu doit avoir l\'une des extensions suivantes : xls, xlsx, csv</b></p>
                    <button class="btn btn-info" id="btn_retry_upload" type="button">Réessayer</button>
                    </div>';
                }
            }
        }
        return $msg;
    }
    
    public function registerImports(Request $request)
    {
        $count = intval($request->col);

        for($i=1;$i<=$count;$i++)
        {
            if($request->input('supplierName'.$i) != '')
            {
                $supplier = new Supplier();
                $supplier->code = $request->input('supplierCode'.$i);
                $supplier->_name = $request->input('supplierName'.$i);
                $supplier->tel1 = $request->input('supplierTel1'.$i);
                $supplier->tel2 = $request->input('supplierTel2'.$i);
                $supplier->email = $request->input('supplierEmail'.$i);
                $supplier->website = $request->input('supplierWebsite'.$i);
                $supplier->address = $request->input('supplierAddress'.$i);
                $supplier->city = $request->input('supplierCity'.$i);
                $supplier->country = $request->input('supplierCountry'.$i);
                $supplier->township = null;
                $supplier->_district = null;  
                $supplier->payment_mode = $request->input('supplierPayment'.$i);
                $supplier->notes = null;
                $supplier->conditions = null;
                $supplier->e_document = 'no';
                $supplier->account_type = 'supplier';
                $supplier->legal_id = null;
                $supplier->current_balance = (is_numeric($request->input('supplierBalance'.$i)))? $request->input('supplierBalance'.$i): 0;
                $supplier->balance_date = ($request->input('supplierBalancedate'.$i) != "")? sqlDate($request->input('supplierBalancedate'.$i)): date('Y-m-d');
                $supplier->bank_name = null;
                $supplier->bank_account = null;
                $supplier->corp_id = 1;
                $supplier->user_id = 1;
                $supplier->save(); 
            }
        }

        return 'Fournisseurs importés avec succès !';
    }
    
    public function getFiles($supplier)
    {
        $result = [];
        $content = '';
        if(is_numeric($supplier))
        {
            $files = DB::table('files')->where('corp_id', 1)->where('data_type', 'supplier')->where('data_id', $supplier)->get();

            if($files->count() > 0)
            {
                $content .= '<div class="bg-gray text-center p-2"><b>Fichiers associés</b></div><ul class="list-group list-group-media mt-2 mb-2" style="max-height:500px;overflow-y:auto">';
                foreach($files as $file)
                {
                    $user = User::find($file->user_id);

                    $content .= '<li class="list-group-item list-group-item-action link_download_file" style="cursor:pointer" target="'.$file->token.'"><div class="media"><div class="mr-3"><a href="/achats/fournisseurs/'.$file->data_id.'/telechargement/'.$file->id.'/'.$file->token.'"><img style="border:0;width:30px;height:30px" class="rounded-0" src="'.asset('assets/img/svg_files/'.($file->extension).'.svg') .'" alt="icon" /></a></div><div class="media-body"><h6 class="tx-inverse mb-1 text-wrap">'.$file->filename.'.'.$file->extension.'</h6><p class="mg-b-0">Ajouté le '.returnDate(substr($file->created_at,0,10)).' à '.substr($file->created_at,11,5).(($user->count() > 0)? ' par '.$user->name: '').'</p></div><div class="text-right mt-2"><a style="cursor:pointer" class="btn_delete_file" target-data="'.$file->data_id.'" id="'.$file->id.'" target-token="'.$file->token.'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></a></div></div></li>';
                }
                $content .= '</ul>'; 
            }
            else
            {
                $content .= '<div class="row pt-3 pb-3 pl-1 pr-1"><div class="col-3"><svg id="Layer_1" enable-background="new 0 0 512 512" height="100" viewBox="0 0 512 512" width="100" xmlns="http://www.w3.org/2000/svg"><g><path d="m392.836 0h-314.454c-11.013 0-19.974 8.96-19.974 19.974v379.531c0 11.014 8.96 19.974 19.974 19.974h20.212c1.386 0 2.709-.575 3.655-1.588l309.5-331.482c.864-.926 1.345-2.146 1.345-3.412v-62.739c.001-11.17-9.087-20.258-20.258-20.258z" fill="#ff6986"/><path d="m453.592 123.49v311.01c0 11.02-8.96 19.98-19.97 19.98h-320.05c-11.02 0-19.98-8.96-19.98-19.98v-377.03c0-11.01 8.96-19.97 19.98-19.97h254.02l9.24 9.24z" fill="#d9f9f8"/><path d="m453.592 123.49v311.01c0 11.02-8.96 19.98-19.97 19.98h-320.05c-11.02 0-19.98-8.96-19.98-19.98v-5.02h319.3c11.15 0 20.19-9.04 20.19-20.2v-285.79l-56.25-76.75z" fill="#c1eaf4"/><path d="m453.592 123.49h-20.51l-58.91-.01c-3.63 0-6.58-2.94-6.58-6.58v-79.4c1.33 0 2.6.52 3.54 1.46l81 81c.94.94 1.46 2.21 1.46 3.53z" fill="#aec9d6"/><path d="m453.592 123.49h-20.51l-61.95-84.53 81 81c.94.94 1.46 2.21 1.46 3.53z" fill="#8fb2bc"/><g fill="#aec9d6"><path d="m184.069 190.456h179.422c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-179.422c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5z"/><path d="m363.491 219.688h-179.422c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h179.422c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path d="m363.491 264.802h-35.447c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h35.447c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5z"/><path d="m292.747 264.802h-108.678c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h108.678c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5z"/></g><path d="m367.982 417.81c0 51.93-42.26 94.19-94.2 94.19-4.06 0-8.06-.26-11.98-.76h-.04c-46.29-5.93-82.18-45.57-82.18-93.43 0-47.87 35.89-87.51 82.18-93.44h.04c3.92-.5 7.92-.76 11.98-.76 51.94 0 94.2 42.26 94.2 94.2z" fill="#ff6986"/><path d="m367.982 417.81c0 51.93-42.26 94.19-94.2 94.19-4.06 0-8.06-.26-11.98-.76 46.29-5.93 82.18-45.57 82.18-93.43 0-47.87-35.89-87.51-82.18-93.44 3.92-.5 7.92-.76 11.98-.76 51.94 0 94.2 42.26 94.2 94.2z" fill="#ea3487"/><path d="m311.881 410.598c-2.929 2.93-7.678 2.929-10.606.001l-19.994-19.993v72.506c0 4.143-3.358 7.5-7.5 7.5s-7.5-3.357-7.5-7.5v-72.506l-19.994 19.993c-2.929 2.928-7.678 2.929-10.606-.001-2.929-2.929-2.929-7.678 0-10.606l32.797-32.796c1.464-1.464 3.384-2.196 5.303-2.196s3.839.732 5.303 2.196l32.797 32.796c2.929 2.928 2.929 7.677 0 10.606z" fill="#fff"/></g></svg></div><div class="col-9 pt-3"><h6>Ajoutez des fichiers à vos données.</h6><p>Les fichiers ajoutés seront associés à ce fournisseur.</p></div></div>';
            }
        }
        $result = ['content' => $content, 'counter' => $files->count()];
        return $result;
    }

    public function deleteFile($id, $token)
    {
        $file = Files::find($id);
        $file->delete();
        Storage::delete('public/data_files/'.$token);
    }

    public function storeSupplierFile(Request $request, $supplier)
    {
        $result = [];
        $extArray = ["csv", "CSV", "xls", "XLS", "xlsx", "XLSX", "xlsm", "XLSM", "jpg", "JPG", "jpeg", "JPEG", "txt", "TXT", "odt", "ODT", "gif", "GIF", "png", "PNG", "pdf", "PDF", "doc", "DOC", "docx", "DOCX", "ppt", "PPT", "pptx", "PPTX", "odf", "ODF", "ods", "ODS", "rtf", "RTF"];

        if($request->hasFile('supplierFile'))
        {
            if($request->file('supplierFile')->isValid())
            {
                $ext = $request->file('supplierFile')->getClientOriginalExtension();
                if(in_array($ext, $extArray))
                {
                    $size = filesize($request->file('supplierFile'));
                    if($size <= 10500000)
                    {
                        if(is_numeric($supplier) && DB::table('third_accounts')->where('id', $supplier)->exists())
                        {
                            $file_to_store_with_ext = $request->file('supplierFile')->getClientOriginalName();
                            $file_to_store_without_ext = pathinfo($file_to_store_with_ext, PATHINFO_FILENAME);

                            $file_to_store = md5(rand()).time().'.'.$ext;
                            $path = $request->file('supplierFile')->storeAs('public/data_files', $file_to_store);

                            $file_to_db = new Files();
                            $file_to_db->filename = $file_to_store_without_ext;
                            $file_to_db->extension = $ext;
                            $file_to_db->token = $file_to_store;
                            $file_to_db->data_type = 'supplier';
                            $file_to_db->data_id = $supplier;
                            $file_to_db->user_id = 1;
                            $file_to_db->corp_id = 1;
                            $file_to_db->save();

                            // file stored !
                            $result = ['msg' => 'File uploaded !', 'type' => 'success'];
                        }
                        else
                        {
                            $result = ['msg' => 'Erreur d\'identification !', 'type' => 'error'];
                        }
                    }
                    else
                    {
                        $result = ['msg' => 'Fichier trop volumineux !', 'type' => 'error'];
                    }
                    clearstatcache();
                }
                else
                {
                    $result = ['msg' => 'Extension non valide !', 'type' => 'error'];
                }
            }
            else
            {
                $result = ['msg' => 'Fichier invalide !', 'type' => 'error'];
            }
        }
        else
        {
            $result = ['msg' => 'Fichier introuvable !', 'type' => 'error'];
        }

        return $result;
    }

    public function downloadFile($supplier, $id, $token)
    {
        $file = Files::find($id);
        return Storage::download('public/data_files/'.$token, $file->filename.'.'.$file->extension);
    }
}
