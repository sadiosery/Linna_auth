<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Category;
use App\Models\Client;
use App\Models\RuleConditions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Validator;

class RuleController extends Controller
{
    public function showRules()
    {
        $rules = DB::table('categorisation_rules')
               ->select('*')
               ->where('corp_id', 1)
               ->orderBy('rule_name')
               ->get();
        $checkedCategory = '';
        $checkedAccount = '';

        $countRules = DB::table('categorisation_rules')->where('corp_id', 1)->count();
        $allRules = '<thead><tr><th nowrap>Nom de la règle</th><th nowrap>Type</th><th nowrap>Conditions</th><th nowrap>Règles</th><th nowrap>Automatique</th><th>Actions</th></tr></thead><tbody>';

        foreach($rules as $rule)
        {
            if($rule->category_id != null)  
            {
                $category = Category::find($rule->category_id);
                if(isset($category->designation)){ $checkedCategory = $category->designation; }
            }
            else{ $checkedCategory = 'Aucune';}

            if($rule->third_account_id != null)  
            {
                $account = Client::find($rule->third_account_id);
                if(isset($account->_name)){ $checkedAccount = $account->_name; }
            }
            else{ $checkedAccount = 'Aucun';}

            $rules_conditions = DB::table('categorisation_rules_conditions')
                              ->select('*')
                              ->where('rule_id', $rule->id)
                              ->orderBy('label')
                              ->get();
            
            $count_rules_conditions = DB::table('categorisation_rules_conditions')
                              ->where('rule_id', $rule->id)
                              ->count();
            

            $allConditions = '';
            foreach($rules_conditions as $condition)
            {
                if($condition->label == 'title_label')
                {
                    if($condition->cp_operator == 'not-contains')
                    {
                        $allConditions .= 'L\'intitulé ne contient pas "<b>'.$condition->value.'</b>"<br>';
                    }
                    elseif($condition->cp_operator == 'contains')
                    {
                        $allConditions .= 'L\'intitulé contient "<b>'.$condition->value.'</b>"<br>';
                    }
                    elseif($condition->cp_operator == 'equal')
                    {
                        $allConditions .= 'L\'intitulé correspond exactement à "<b>'.$condition->value.'</b>"<br>';
                    }
                }
                elseif($condition->label == 'amount_label')
                {
                    if($condition->cp_operator == 'equal')
                    {
                        $allConditions .= 'Le montant est égal à "<b>'.number_format($condition->value,0,',',' ').'</b>"<br>';
                    }
                    elseif($condition->cp_operator == 'superior')
                    {
                        $allConditions .= 'Le montant est supérieur à "<b>'.number_format($condition->value,0,',',' ').'</b>"<br>';
                    }
                    elseif($condition->cp_operator == 'inferior')
                    {
                        $allConditions .= 'Le montant est inférieur à "<b>'.number_format($condition->value,0,',',' ').'</b>"<br>';
                    }
                    elseif($condition->cp_operator == 'different')
                    {
                        $allConditions .= 'Le montant est différent de "<b>'.number_format($condition->value,0,',',' ').'</b>"<br>';
                    }
                }
                elseif($condition->label == 'date_label')
                {
                    if($condition->cp_operator == 'superior')
                    {
                        $allConditions .= 'La date de règlement est postérieure au "<b>'.$condition->value.'</b>"<br>';
                    }
                    elseif($condition->cp_operator == 'inferior')
                    {
                        $allConditions .= 'La date de règlement est antérieur au "<b>'.$condition->value.'</b>"<br>';
                    }
                    elseif($condition->cp_operator == 'between')
                    {
                        $allConditions .= 'La date de règlement est comprise entre le "<b>'.min(substr($condition->value,0,2), substr($condition->value,3,2)).'</b>" et le "<b>'.max(substr($condition->value,0,2), substr($condition->value,3,2)).'</b>"<br>';
                    }
                }
            }

            $allRules .= '<tr id="row'.$rule->id.'"><td class="td">'.$rule->rule_name.'</td><td>'.(($rule->operation_type == 'cash_in')? '<span class="badge badge-success">Credit</span>': '<span class="badge badge-danger">Débit</span>').'</td><td class="td">'.$allConditions.'</td><td class="td">Catégorie : <b>'.$checkedCategory.'</b><br>Tiers : <b>'.$checkedAccount.'</b><br>Note: <b>'.(($rule->notes == null)? 'Aucune': $rule->notes).'</b></td><td class="td">'.(($rule->auto_rule == 'yes')? '<span class="badge outline-badge-success">Oui</span>': '<span class="badge outline-badge-danger">Non</span>').'</td>
            <td nowrap>
            <a class="btn-editduplicate-rule" data-conditions="'.$count_rules_conditions.'" title="Dupliquer la règle" type="button" style="color:#000" dataOp="duplicate" id="'.$rule->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></a>
            <a class="btn-editduplicate-rule" data-conditions="'.$count_rules_conditions.'" title="Modifier la règle" type="button" style="color:#000" dataOp="edit" id="'.$rule->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
            <a class="btn-delete-rule" title="Supprimer la règle" type="button" style="color:#000" id="'.$rule->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
            </td></tr>';
        }

        $allRules .= '</tbody>';

        return response($allRules)->header('Content-Type', 'text/html');
    }

    public function addRule(Request $request)
    {
        $msg = '';
        $checkedConditions = [];

        $count = intval($request->col);
        if(($request->op_type != 'cash_in' && $request->op_type != 'cash_out') || ($request->cd_case != 'all' && $request->cd_case != 'any') || !is_numeric($request->ruleCategory))
        {
            $msg = '_err';   
        }
        else
        {
            $label = '';
            $operator = '';
            $value = '';
            $valBegin = '';
            $valEnd = '';
            for($i=1;$i<=$count;$i++)
            {
                if($request->input('label'.$i) && $request->input('operator'.$i))
                {
                    $label = $request->input('label'.$i);
                    $operator = $request->input('operator'.$i);
                    //$value = $request->input('value'.$i);

                    if($label == 'title_label' && ($operator == 'equal' || $operator == 'not-contains' || $operator == 'contains') && $request->input('value'.$i))
                    {
                        $checkedConditions[] = ['label' => $label, 'operator' => $operator, 'value' => $request->input('value'.$i)];
                    }
                    elseif($label == 'amount_label' && ($operator == 'equal' || $operator == 'superior' || $operator == 'inferior' || $operator == 'different') && $request->input('value'.$i) && is_numeric($request->input('value'.$i)))
                    {
                        $checkedConditions[] = ['label' => $label, 'operator' => $operator, 'value' => $request->input('value'.$i)];
                    }
                    elseif($label == 'date_label' && ($operator == 'superior' || $operator == 'inferior' || $operator == 'between'))
                    {
                        if($operator == 'between' && $request->input('valueBegin'.$i) && $request->input('valueEnd'.$i) && is_numeric($request->input('valueBegin'.$i)) && is_numeric($request->input('valueEnd'.$i)) && $request->input('valueBegin'.$i) > 0 && $request->input('valueBegin'.$i) <= 31 && $request->input('valueEnd'.$i) > 0 && $request->input('valueEnd'.$i) <= 31)
                        {
                            $valBegin = (intval($request->input('valueBegin'.$i)) < 10 && strlen($request->input('valueBegin'.$i)) < 2)? '0'.$request->input('valueBegin'.$i): $request->input('valueBegin'.$i);

                            $valEnd = (intval($request->input('valueEnd'.$i)) < 10 && strlen($request->input('valueEnd'.$i)) < 2)? '0'.$request->input('valueEnd'.$i): $request->input('valueEnd'.$i);

                            $checkedConditions[] = ['label' => $label, 'operator' => $operator, 'value' => $valBegin.'-'.$valEnd];
                        }
                        else if($operator != 'between' && $request->input('value'.$i))
                        {
                            $checkedConditions[] = ['label' => $label, 'operator' => $operator, 'value' => $request->input('value'.$i)];
                        }
                    }
                }
            }
            if(count($checkedConditions) > 0)
            {
                $rule = new Rule();
                $rule->rule_name = $request->_name;
                $rule->operation_type = $request->op_type;
                $rule->conditions_case = $request->cd_case;
                $rule->category_id = $request->ruleCategory;
                $rule->third_account_id = (is_numeric($request->ruleThaccount))? $request->ruleThaccount: null;
                $rule->notes = $request->ruleNote;
                $rule->auto_rule = (isset($request->auto_rl))? 'yes': 'no';
                $rule->corp_id = 1;
                $rule->user_id = 1;
                $rule->save();
                $id = $rule->id;

                $cd_label = '';
                $cd_operator = '';
                $cd_value = '';
                
                foreach($checkedConditions as $line)
                {
                    $condition = new RuleConditions();
                    foreach($line as $key=>$val)
                    {
                        $condition->label = $line['label'];
                        $condition->cp_operator = $line['operator'];
                        $condition->value = $line['value'];
                        $condition->rule_id = $id;
                        $condition->save();
                    }
                }
                $msg="done";
            }
            else
            {
                $msg = '_cond';
            }
        }
        return $msg;
    }

    public function deleteRule($id)
    {
        $rule = Rule::find($id);
        $ruleConditions = DB::table('categorisation_rules_conditions')->where('rule_id', $id)->delete();
        $rule->delete();
        return 'La règle a été supprimée';
    }

    public function getRuleById($id, $action)
    {
        $rule = Rule::find($id);
        $count_rule_conditions = DB::table('categorisation_rules_conditions')->where('rule_id', $rule->id)->count();
        $rule_conditions = DB::table('categorisation_rules_conditions')->select('*')->where('rule_id', $id)->get();

        $categories = DB::table('categories')
                    ->select('id', 'designation')
                    ->where([
                        ['data_type', $rule->operation_type],
                        ['corp_id', 1]
                    ])
                    ->orwhere([
                        ['data_type', $rule->operation_type],
                        ['category_type', 'default']
                    ])
                    ->orderBy('designation')
                    ->get();
        $listCategories = '<option value="">-- Catégories --</option>';
        foreach ($categories as $category)
        {
            $listCategories .= '<option '.(($category->id == $rule->category_id)? 'selected': '').' value="'.$category->id.'">'.$category->designation.'</option>';
        }

        $accounts = DB::table('third_accounts')->where('corp_id', 1)->get();
        $listAccounts = '<option value="">-- Liste des tiers --</option>';
        foreach ($accounts as $account)
        {
            $listAccounts .= '<option '.(($account->id == $rule->third_account_id)? 'selected': '').' value="'.$account->id.'">'.$account->_name.'</option>';
        }

        $conditions = '';
        $count_line=0;
        foreach ($rule_conditions as $rc)
        {
            $count_line++;
            if($rc->label == 'title_label')
            {
                $conditions .= '<div class="form-row condition-row" id="condition'.$count_line.'">'.(($count_line > 1)? '<div class="col-12 mb-2"><label class="text-dark text-bold cd_case_operator">'.(($rule->conditions_case == 'any')? 'Ou': 'Et').'</label></div>': '').'<div class="col-12 col-md-3 mb-4"><select name="label'.$count_line.'" id="label'.$count_line.'" class="form-control title_label"><option selected value="title_label">Intitulé</option><option value="amount_label">Montant</option><option value="date_label">Date de règlement</option></select></div><div class="col-12 col-md-3 mb-4"><select name="operator'.$count_line.'" id="operator'.$count_line.'" class="form-control operator_condition"><option '.(($rc->cp_operator == 'contains')? 'selected': '').' value="contains">Contient</option><option '.(($rc->cp_operator == 'not-contains')? 'selected': '').' value="not-contains">Ne contient pas</option><option '.(($rc->cp_operator == 'equal')? 'selected': '').' value="equal">Correspond exactement à</option></select></div><div class="col-12 col-md-3 mb-4" id="content-condition-value'.$count_line.'"><input class="form-control" name="value'.$count_line.'" id="value'.$count_line.'" value="'.$rc->value.'"></div>'.(($count_line > 1)? '<button class="btn-custom-light bg-white text-dark mb-2 btn-remove-condition" type="button" id="'.$count_line.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>': '').'</div>'; 
            }
            elseif($rc->label == 'amount_label')
            {
                $conditions .= '<div class="form-row condition-row" id="condition'.$count_line.'">'.(($count_line > 1)? '<div class="col-12 mb-2"><label class="text-dark text-bold cd_case_operator">'.(($rule->conditions_case == 'any')? 'Ou': 'Et').'</label></div>': '').'<div class="col-12 col-md-3 mb-4"><select name="label'.$count_line.'" id="label'.$count_line.'" class="form-control title_label"><option value="title_label">Intitulé</option><option selected value="amount_label">Montant</option><option value="date_label">Date de règlement</option></select></div><div class="col-12 col-md-3 mb-4"><select name="operator'.$count_line.'" id="operator'.$count_line.'" class="form-control operator_condition"><option '.(($rc->cp_operator == 'equal')? 'selected': '').' value="equal">Est égal à</option><option '.(($rc->cp_operator == 'superior')? 'selected': '').' value="superior">Est supérieur à</option><option '.(($rc->cp_operator == 'inferior')? 'selected': '').' value="inferior">Est inférieur à</option><option '.(($rc->cp_operator == 'different')? 'selected': '').' value="different">Est différent de</option></select></div><div class="col-12 col-md-3 mb-4" id="content-condition-value'.$count_line.'"><input class="form-control" name="value'.$count_line.'" id="value'.$count_line.'" value="'.$rc->value.'"></div>'.(($count_line > 1)? '<button class="btn-custom-light bg-white text-dark mb-2 btn-remove-condition" type="button" id="'.$count_line.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>': '').'</div>'; 
            }
            elseif($rc->label == 'date_label')
            {
                $conditions .= '<div class="form-row condition-row" id="condition'.$count_line.'">'.(($count_line > 1)? '<div class="col-12 mb-2"><label class="text-dark text-bold cd_case_operator">'.(($rule->conditions_case == 'any')? 'Ou': 'Et').'</label></div>': '').'<div class="col-12 col-md-3 mb-4"><select name="label'.$count_line.'" id="label'.$count_line.'" class="form-control title_label"><option value="title_label">Intitulé</option><option value="amount_label">Montant</option><option selected value="date_label">Date de règlement</option></select></div><div class="col-12 col-md-3 mb-4"><select name="operator'.$count_line.'" id="operator'.$count_line.'" class="form-control operator_condition"><option '.(($rc->cp_operator == 'between')? 'selected': '').' value="between">Est comprise entre</option><option '.(($rc->cp_operator == 'superior')? 'selected': '').' value="superior">Est postérieure au</option><option '.(($rc->cp_operator == 'inferior')? 'selected': '').' value="inferior">Est antérieure au</option></select></div><div class="col-12 col-md-3 mb-4" id="content-condition-value'.$count_line.'">'.(($rc->cp_operator == 'between')? '<div class="form-row"><div class="col-6"><input class="form-control input-100" name="valueBegin'.$count_line.'" placeholder="le ..." id="valueBegin'.$count_line.'" type="number" min="1" max="31" value="'.min(substr($rc->value,0,2), substr($rc->value,3,2)).'"></div> <div class="col-6"><input class="form-control input-100" placeholder="et le ..." name="valueEnd'.$count_line.'" id="valueEnd'.$count_line.'" type="number" min="1" max="31" value="'.max(substr($rc->value,0,2), substr($rc->value,3,2)).'"></div></div>': '<input class="form-control" name="value'.$count_line.'" id="value'.$count_line.'" value="'.$rc->value.'">').'</div>'.(($count_line > 1)? '<button class="btn-custom-light bg-white text-dark mb-2 btn-remove-condition" type="button" id="'.$count_line.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>': '').'</div>'; 
            }
        }

        $content = '<input type="hidden" name="form" id="form" value="'.$id.'" />
        <input type="hidden" name="col" id="col" />
        <input type="hidden" name="__type" id="__type" value="'.$action.'" />
        <div class="form-row">
            <div class="col-12 col-md-4 mb-4">
                <label for="" class="text-black">Nom de la règle</label>
                <input type="text" class="form-control" name="_name" id="_name" value="'.$rule->rule_name.'" />
            </div>
            <div class="col-12 col-md-3 mb-4">
                <label for="" class="text-black">Pour les</label>
                <select name="op_type" id="operation_type" class="form-control">
                        <option '.(($rule->operation_type == 'cash_in')? 'selected': '').' value="cash_in">Encaissements</option>
                        <option '.(($rule->operation_type == 'cash_out')? 'selected': '').' value="cash_out">Décaissements</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12 mb-2">
                <label for="" class="text-black">qui répondent à 
                <select class="select-custom-linna-2" name="cd_case" id="cd_case"><option '.(($rule->conditions_case == 'all')? 'selected': '').' value="all">toutes</option><option '.(($rule->conditions_case == 'any')? 'selected': '').' value="any">une de</option></select> ces conditions :</label>
            </div>
        </div>
        <div id="conditions-content">'.$conditions.'</div>
        <div class="form-row">
            <div class="col-12 mb-4">
                <button class="btn-custom-light bg-white text-info btn-add-condition" data-op="edit" type="button" id="ruleeditModal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Ajouter une condition</button>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <label for="" class="text-black">classer dans la catégorie</label>
                <select name="ruleCategory" id="ruleCategory" class="form-control ruleCategory">'.$listCategories.'</select>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <label for="" class="text-black">associer au tiers</label>
                <select name="ruleThaccount" id="ruleThaccount" class="ruleThaccount form-control" data-show-subtext="true">'.$listAccounts.'</select> 
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <label for="" class="text-black">et ajouter la note</label>
                <input type="text" class="form-control ruleNote" id="ruleNote" name="ruleNote" value="'.$rule->notes.'" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-12 mb-2">
                <label for="" class="text-dark auto-apply-text" id="auto-apply-text"><b>'.(($rule->auto_rule == 'yes')? 'Cette règle doit s\'appliquer automatiquement': 'Toujours demander confirmation avant d\'appliquer cette règle').'</b></label><br>
                <label class="switch s-success mr-2">
                    <input type="checkbox" '.(($rule->auto_rule == 'yes')? 'checked': '').' name="auto_rl" class="auto-apply-btn" id="auto-apply-btn">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>';
        
        return $content;
    }

    public function edit_duplicateRule(Request $request)
    {
        $msg = '';
        $op = $request->__type;
        $checkedConditions = [];
        $count = intval($request->col);

        if(($request->op_type != 'cash_in' && $request->op_type != 'cash_out') || ($request->cd_case != 'all' && $request->cd_case != 'any') || !is_numeric($request->ruleCategory))
        {
            $msg = '_err';   
        }
        else
        {
            $label = '';
            $operator = '';
            $value = '';
            $valBegin = '';
            $valEnd = '';
            for($i=1;$i<=$count;$i++)
            {
                if($request->input('label'.$i) && $request->input('operator'.$i))
                {
                    $label = $request->input('label'.$i);
                    $operator = $request->input('operator'.$i);
                    //$value = $request->input('value'.$i);

                    if($label == 'title_label' && ($operator == 'equal' || $operator == 'not-contains' || $operator == 'contains') && $request->input('value'.$i))
                    {
                        $checkedConditions[] = ['label' => $label, 'operator' => $operator, 'value' => $request->input('value'.$i)];
                    }
                    elseif($label == 'amount_label' && ($operator == 'equal' || $operator == 'superior' || $operator == 'inferior' || $operator == 'different') && $request->input('value'.$i) && is_numeric($request->input('value'.$i)))
                    {
                        $checkedConditions[] = ['label' => $label, 'operator' => $operator, 'value' => $request->input('value'.$i)];
                    }
                    elseif($label == 'date_label' && ($operator == 'superior' || $operator == 'inferior' || $operator == 'between'))
                    {
                        if($operator == 'between' && $request->input('valueBegin'.$i) && $request->input('valueEnd'.$i) && is_numeric($request->input('valueBegin'.$i)) && is_numeric($request->input('valueEnd'.$i)) && $request->input('valueBegin'.$i) > 0 && $request->input('valueBegin'.$i) <= 31 && $request->input('valueEnd'.$i) > 0 && $request->input('valueEnd'.$i) <= 31)
                        {
                            $valBegin = (intval($request->input('valueBegin'.$i)) < 10 && strlen($request->input('valueBegin'.$i)) < 2)? '0'.$request->input('valueBegin'.$i): $request->input('valueBegin'.$i);

                            $valEnd = (intval($request->input('valueEnd'.$i)) < 10 && strlen($request->input('valueEnd'.$i)) < 2)? '0'.$request->input('valueEnd'.$i): $request->input('valueEnd'.$i);

                            $checkedConditions[] = ['label' => $label, 'operator' => $operator, 'value' => $valBegin.'-'.$valEnd];
                        }
                        else if($operator != 'between' && $request->input('value'.$i))
                        {
                            $checkedConditions[] = ['label' => $label, 'operator' => $operator, 'value' => $request->input('value'.$i)];
                        }
                    }
                }
            }

            if(count($checkedConditions) > 0)
            {
                if($op == 'duplicate')
                {
                    $rule = new Rule();
                    $rule->rule_name = $request->_name;
                    $rule->operation_type = $request->op_type;
                    $rule->conditions_case = $request->cd_case;
                    $rule->category_id = $request->ruleCategory;
                    $rule->third_account_id = (is_numeric($request->ruleThaccount))? $request->ruleThaccount: null;
                    $rule->notes = $request->ruleNote;
                    $rule->auto_rule = (isset($request->auto_rl))? 'yes': 'no';
                    $rule->corp_id = 1;
                    $rule->user_id = 1;
                    $rule->save();
                    $id = $rule->id;

                    $cd_label = '';
                    $cd_operator = '';
                    $cd_value = '';
                            
                    foreach($checkedConditions as $line)
                    {
                        $condition = new RuleConditions();
                        foreach($line as $key=>$val)
                        {
                            $condition->label = $line['label'];
                            $condition->cp_operator = $line['operator'];
                            $condition->value = $line['value'];
                            $condition->rule_id = $id;
                            $condition->save();
                        }
                    }
                    $msg = 'Règle dupliquée avec succès !';
                }
                elseif($op == 'edit')
                {
                    $rule = Rule::find($request->form);
                    $rule->rule_name = $request->_name;
                    $rule->operation_type = $request->op_type;
                    $rule->conditions_case = $request->cd_case;
                    $rule->category_id = $request->ruleCategory;
                    $rule->third_account_id = (is_numeric($request->ruleThaccount))? $request->ruleThaccount: null;
                    $rule->notes = $request->ruleNote;
                    $rule->auto_rule = (isset($request->auto_rl))? 'yes': 'no';
                    $rule->corp_id = 1;
                    $rule->user_id = 1;
                    $rule->save();

                    $ruleConditions = DB::table('categorisation_rules_conditions')->where('rule_id', $request->form)->delete();

                    $cd_label = '';
                    $cd_operator = '';
                    $cd_value = '';

                    foreach($checkedConditions as $line)
                    {
                        $condition = new RuleConditions();
                        foreach($line as $key=>$val)
                        {
                            $condition->label = $line['label'];
                            $condition->cp_operator = $line['operator'];
                            $condition->value = $line['value'];
                            $condition->rule_id = $request->form;
                            $condition->save();
                        }
                    }
                    $msg = 'Règle modifiée avec succès !';
                }
            }
            else
            {
                $msg = '_cond'; 
            }
        }
        return $msg;
    }
}