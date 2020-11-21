@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="statbox widget box box-shadow">
                    <div class="col-12 bg-white pt-2 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-5 text-md-left text-center pt-2">
                                <h5 id="accounts_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg><b>Liste des clients</b></h5>
                            </div>
                            <div class="col-12 col-md-7 text-md-right text-center">
                                <button class="btn btn-success mb-2" type="button" id="add-client" data-toggle="modal" data-target="#clientModal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Nouveau</button>

                                <button class="btn btn-info mb-2" type="button" data-toggle="modal" data-target="#uploadModal" id="btn-import"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Importer</button>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4 mt-4" id="content-table">
                            <table id="table" class="table table-hover pt-2" style="width:100%"></table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-center">
                    <h5 class="modal-title text-white" id="clientModalLabel">Créer un nouveau client</h5>
                </div>
                <div id="validation-main-msg"></div>
                <form id="clientAddForm" class="" autocomplete="off">
                    @csrf
                <div class="modal-body pl-4 pr-4" style="max-height:400px;overflow-y:auto">
                    <div class="form-row">
                        <div class="col-12 col-md-4 mb-3">
                            <label for="" class="text-dark">Code</label>
                            <input type="text" class="form-control" id="clientCode" name="clientCode" placeholder="Ex CL123 ..." />
                        </div>
                        <div class="col-12 col-md-5 mb-3">
                            <label for="" class="text-dark">Catégorie</label>
                            <select class="form-control clientCategory" id="clientCategory" name="clientCategory">
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="" class="text-dark">Nom ou Raison sociale <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-required" id="clientName" name="clientName" data-msg="name" />
                            <span id="validateMsgname"></span>
                        </div>
                    </div>

                    <ul class="nav nav-tabs mb-3 mt-3" id="borderTop" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" style="color:#0076A8" id="border-top-contacts-tab" data-toggle="tab" href="#border-top-contacts" role="tab" aria-controls="border-top-contacts" aria-selected="true"> Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color:#0076A8" id="border-top-localisation-tab" data-toggle="tab" href="#border-top-localisation" role="tab" aria-controls="border-top-localisation" aria-selected="false"> Adresse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color:#0076A8" id="border-top-conditions-commerciales-tab" data-toggle="tab" href="#border-top-conditions-commerciales" role="tab" aria-controls="border-top-conditions-commerciales" aria-selected="false"> Conditions commerciales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color:#0076A8" id="border-top-autres-tab" data-toggle="tab" href="#border-top-autres" role="tab" aria-controls="border-top-autres" aria-selected="false"> Autres</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="borderTopContent">
                        <div class="tab-pane fade show active" id="border-top-contacts" role="tabpanel" aria-labelledby="border-top-contacts-tab">
                            <div class="form-row">
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="" class="text-dark">Téléphone</label>
                                    <input type="text" class="form-control" id="clientTel1" name="clientTel1" />
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="" class="text-dark">Mobile</label>
                                    <input type="text" class="form-control" id="clientTel2" name="clientTel2" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="" class="text-dark">Adresse mail</label>
                                    <input type="text" class="form-control" id="clientEmail" name="clientEmail" placeholder="Utilisez des ';' si plusieurs" />
                                </div>
                                <div class="col-12 col-md-5 mb-3">
                                    <label for="" class="text-dark">Site internet</label>
                                    <input type="text" class="form-control web" id="clientWebsite" name="clientWebsite" />
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="border-top-localisation" role="tabpanel" aria-labelledby="border-top-localisation-tab">
                            <div class="form-row">
                                <div class="col-12 col-md-7 mb-3">
                                    <label for="" class="text-dark">Adresse</label>
                                    <textarea name="clientAddress" id="clientAddress" rows="2" class="form-control" placeholder="Rue, Porte ..."></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="" class="text-dark">Ville</label>
                                    <input type="text" class="form-control" name="clientCity" id="clientCity" />
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="" class="text-dark">Pays</label>
                                    <input type="text" class="form-control" name="clientCountry" id="clientCountry" />
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="" class="text-dark">Commune</label>
                                    <input type="text" class="form-control" name="clientTownship" id="clientTownship" />
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="" class="text-dark">Quartier</label>
                                    <input type="text" class="form-control" name="clientDistrict" id="clientDistrict" />
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="border-top-conditions-commerciales" role="tabpanel" aria-labelledby="border-top-conditions-commerciales-tab">
                            <div class="form-row">
                                <div class="col-12 col-md-4 mb-4">
                                    <label for="" class="text-dark">Mode de paiement par défaut</label>
                                    <select name="clientPayment" id="clientPayment" class="form-control clientPayment"></select>
                                </div>
                                <div class="col-12 col-md-8 text-right">
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-success">
                                        <input type="checkbox" class="new-control-input" id="edocument" name="edocument">
                                        <span class="new-control-indicator"></span>Documents electroniques ?
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-7 mb-3">
                                    <label for="" class="text-dark">Conditions de vente</label>
                                    <textarea name="clientConditions" id="clientConditions" rows="3" class="form-control" placeholder="Ceci apparaître sur les documents commerciaux"></textarea>
                                </div>
                                <div class="col-12 col-md-5 mb-3">
                                    <label for="" class="text-dark">Notes</label>
                                    <textarea name="clientNotes" id="clientNotes" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="border-top-autres" role="tabpanel" aria-labelledby="border-top-autres-tab">
                            <div class="form-row">
                                <div class="col-12 col-md-5 mb-3">
                                    <label for="" class="text-dark">Numéro d'immatriculation</label>
                                    <input type="text" class="form-control" id="clientLegalid" name="clientLegalid" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="" class="text-dark">Solde d'ouverture <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control double-value text-required" data-msg="balance" placeholder="'.' : virgule" id="clientBalance" name="clientBalance" />
                                    <span id="validateMsgbalance"></span>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="" class="text-dark">à la date du <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control datepicker text-required" data-msg="balancedate" id="clientBalancedate" name="clientBalancedate" />
                                    <span id="validateMsgbalancedate"></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="" class="text-dark">Banque</label>
                                    <input type="text" class="form-control" id="clientBank" name="clientBank" />
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="" class="text-dark">Compte</label>
                                    <input type="text" class="form-control" id="clientBankaccount" name="clientBankaccount" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-info">Enregistrer</button>
                </div>
                </form>
            </div>
        </div>
    </div>    

    <div class="modal fade" id="clienteditModal" tabindex="-1" role="dialog" aria-labelledby="clienteditModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info text-center">
                            <h5 class="modal-title text-white" id="clienteditModalLabel"></h5>
                        </div>
                        <div id="validation-main-msg"></div>
                        <form id="clientEditForm" class="" autocomplete="off">
                            @csrf
                        <div class="modal-body pl-4 pr-4" style="max-height:400px;overflow-y:auto">
                            <input type="hidden" id="form" name="form" />
                            <div class="form-row">
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="" class="text-dark">Code</label>
                                    <input type="text" class="form-control" id="clientCode" name="clientCode" placeholder="Ex CL123 ..." />
                                </div>
                                <div class="col-12 col-md-5 mb-3">
                                    <label for="" class="text-dark">Catégorie</label>
                                    <select class="form-control clientCategory" id="clientCategory" name="clientCategory"></select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 mb-3">
                                    <label for="" class="text-dark">Nom ou Raison sociale <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control text-required" id="clientName" name="clientName" data-msg="name" />
                                    <span id="validateMsgname"></span>
                                </div>
                            </div>

                            <ul class="nav nav-tabs mb-3 mt-3" id="borderTop" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" style="color:#0076A8" id="border-top-contacts1-tab" data-toggle="tab" href="#border-top-contacts1" role="tab" aria-controls="border-top-contacts1" aria-selected="true"> Contacts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color:#0076A8" id="border-top-localisation1-tab" data-toggle="tab" href="#border-top-localisation1" role="tab" aria-controls="border-top-localisation1" aria-selected="false"> Adresse</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color:#0076A8" id="border-top-conditions-commerciales1-tab" data-toggle="tab" href="#border-top-conditions-commerciales1" role="tab" aria-controls="border-top-conditions-commerciales1" aria-selected="false"> Conditions commerciales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color:#0076A8" id="border-top-autres1-tab" data-toggle="tab" href="#border-top-autres1" role="tab" aria-controls="border-top-autres1" aria-selected="false"> Autres</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="borderTopContent">
                                <div class="tab-pane fade show active" id="border-top-contacts1" role="tabpanel" aria-labelledby="border-top-contacts1-tab">
                                    <div class="form-row">
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="" class="text-dark">Téléphone</label>
                                            <input type="text" class="form-control" id="clientTel1" name="clientTel1" />
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="" class="text-dark">Mobile</label>
                                            <input type="text" class="form-control" id="clientTel2" name="clientTel2" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="" class="text-dark">Adresse mail</label>
                                            <input type="text" class="form-control" id="clientEmail" name="clientEmail" placeholder="Utilisez des ';' si plusieurs" />
                                        </div>
                                        <div class="col-12 col-md-5 mb-3">
                                            <label for="" class="text-dark">Site internet</label>
                                            <input type="text" class="form-control web" id="clientWebsite" name="clientWebsite" />
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="border-top-localisation1" role="tabpanel" aria-labelledby="border-top-localisation1-tab">
                                    <div class="form-row">
                                        <div class="col-12 col-md-7 mb-3">
                                            <label for="" class="text-dark">Adresse</label>
                                            <textarea name="clientAddress" id="clientAddress" rows="2" class="form-control" placeholder="Rue, Porte ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="" class="text-dark">Ville</label>
                                            <input type="text" class="form-control" name="clientCity" id="clientCity" />
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="" class="text-dark">Pays</label>
                                            <input type="text" class="form-control" name="clientCountry" id="clientCountry" />
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="" class="text-dark">Commune</label>
                                            <input type="text" class="form-control" name="clientTownship" id="clientTownship" />
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="" class="text-dark">Quartier</label>
                                            <input type="text" class="form-control" name="clientDistrict" id="clientDistrict" />
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="border-top-conditions-commerciales1" role="tabpanel" aria-labelledby="border-top-conditions-commerciales1-tab">
                                    <div class="form-row">
                                        <div class="col-12 col-md-4 mb-4">
                                            <label for="" class="text-dark">Mode de paiement par défaut</label>
                                            <select name="clientPayment" id="clientPayment" class="form-control clientPayment"></select>
                                        </div>
                                        <div class="col-12 col-md-8 text-right">
                                            <div class="n-chk">
                                                <label class="new-control new-checkbox checkbox-success">
                                                <input type="checkbox" class="new-control-input" id="edocument" name="edocument">
                                                <span class="new-control-indicator"></span>Documents electroniques ?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-md-7 mb-3">
                                            <label for="" class="text-dark">Conditions de vente</label>
                                            <textarea name="clientConditions" id="clientConditions" rows="3" class="form-control" placeholder="Ceci apparaître sur les documents commerciaux"></textarea>
                                        </div>
                                        <div class="col-12 col-md-5 mb-3">
                                            <label for="" class="text-dark">Notes</label>
                                            <textarea name="clientNotes" id="clientNotes" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="border-top-autres1" role="tabpanel" aria-labelledby="border-top-autres1-tab">
                                    <div class="form-row">
                                        <div class="col-12 col-md-5 mb-3">
                                            <label for="" class="text-dark">Numéro d'immatriculation</label>
                                            <input type="text" class="form-control" id="clientLegalid" name="clientLegalid" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="" class="text-dark">Banque</label>
                                            <input type="text" class="form-control" id="clientBank" name="clientBank" />
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="" class="text-dark">Compte</label>
                                            <input type="text" class="form-control" id="clientBankaccount" name="clientBankaccount" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-info">Enregistrer</button>
                        </div>
                        </form>
                    </div>
                </div>
    </div> 

@endsection
