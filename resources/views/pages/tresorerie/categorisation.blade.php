@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area animated-underline-content pb-4">  
                            <h5 class="text-bold">Catégorisation des opérations</h5>
                            <ul class="nav nav-tabs mb-3 mt-3" id="borderTop" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="border-top-categories-list-tab" data-toggle="tab" href="#border-top-categories-list" role="tab" aria-controls="border-top-categories-list" aria-selected="true">Liste des catégories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="border-top-categories-rules-tab" data-toggle="tab" href="#border-top-categories-rules" role="tab" aria-controls="border-top-categories-rules" aria-selected="false">Règles de catégorisation</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="borderTopContent">
                                <div class="tab-pane fade show active" id="border-top-categories-list" role="tabpanel" aria-labelledby="border-top-categories-list-tab">
                                   
                                    <div id="cash_in" class="mb-4">
                                        <div class="col-12 rounded bg-info pt-3 pb-2">
                                            <h6 class="text-white">Encaissements</h6>
                                        </div>
                                        <div id="cash_in_list" class="mt-2 pl-2"></div>
                                        <button class="btn-custom-light bg-white text-info btn-add-category mt-3" id="cash_in"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Ajouter une catégorie</button>
                                    </div>
                                    <div id="cash_out" class="mb-4">
                                        <div class="col-12 rounded bg-info pt-3 pb-2">
                                            <h6 class="text-white">Décaissements</h6>
                                        </div>
                                        <div id="cash_out_list" class="mt-2 pl-2"></div>
                                        <button class="btn-custom-light bg-white text-info btn-add-category mt-3" id="cash_out"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Ajouter une catégorie</button>
                                    </div>
                                    
                                </div>
                                <div class="tab-pane fade" id="border-top-categories-rules" role="tabpanel" aria-labelledby="border-top-categories-rules-tab">
                                    <div class="row">
                                        <div class="col-12 col-lg-6 mb-3 text-center text-lg-left">
                                            <h6 class="text-bold"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> Définissez des règles de catégorisation pour vos opérations</h6>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3 text-center text-lg-right">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#ruleModal" id="btn-rule-modal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Créer une règle</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="table" class="table table-hover pt-2" style="width:100%"></table>
                                    </div>
                                </div>
                            </div>
                        </div>         
                    </div>
                </div>
                <div class="modal fade" id="ruleModal" tabindex="-1" role="dialog" aria-labelledby="ruleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info text-center">
                                <h5 class="modal-title text-white" id="ruleModalLabel">Nouvelle règle de catégorisation</h5>
                            </div>
                            <form id="ruleForm" autocomplete="off">
                                @csrf
                            <div class="modal-body" style="max-height:420px;overflow-y:auto">
                                <input type="hidden" name="col" id="col" />
                                <div class="form-row">
                                    <div class="col-12 col-md-4 mb-4">
                                        <label for="" class="text-black">Nom de la règle</label>
                                        <input type="text" class="form-control" name="_name" id="_name" />
                                    </div>
                                    <div class="col-12 col-md-3 mb-4">
                                        <label for="" class="text-black">Pour les</label>
                                        <select name="op_type" id="operation_type" class="form-control">
                                                <option value="cash_in">Encaissements</option>
                                                <option value="cash_out">Décaissements</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 mb-2">
                                        <label for="" class="text-black">qui répondent à 
                                        <select class="select-custom-linna-2" name="cd_case" id="cd_case"><option value="all">toutes</option><option value="any">une de</option></select> ces conditions :</label>
                                    </div>
                                </div>
                                <div id="conditions-content"></div>
                                <div class="form-row">
                                    <div class="col-12 mb-4">
                                        <button class="btn-custom-light bg-white text-info btn-add-condition" type="button" id="ruleModal" data-op="add"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Ajouter une condition</button>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                                        <label for="" class="text-black">classer dans la catégorie</label>
                                        <select name="ruleCategory" id="ruleCategory" class="form-control ruleCategory"></select>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                                        <label for="" class="text-black">associer au tiers</label>
                                        <select name="ruleThaccount" id="ruleThaccount" class="ruleThaccount form-control" data-show-subtext="true"></select> 
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                                        <label for="" class="text-black">et ajouter la note</label>
                                        <input type="text" class="form-control ruleNote" id="ruleNote" name="ruleNote" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 mb-2">
                                        <label for="" class="text-dark auto-apply-text"><b>Cette règle doit s'appliquer automatiquement</b></label><br>
                                        <label class="switch s-success mr-2">
                                            <input type="checkbox" checked name="auto_rl" class="auto-apply-btn" id="auto-apply-btn">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-info">Enregistrer</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>      

                <div class="modal fade" id="ruleeditModal" tabindex="-1" role="dialog" aria-labelledby="ruleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info text-center">
                                <h5 class="modal-title text-white" id="ruleeditModalLabel"></h5>
                            </div>
                            <form id="ruleeditForm" autocomplete="off">
                                @csrf
                            <div class="modal-body" style="max-height:420px;overflow-y:auto" id="bodyeditModal"></div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-info">Enregistrer</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>                                                            
    </div>

@endsection