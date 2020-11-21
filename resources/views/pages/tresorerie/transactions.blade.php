@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">
            <div class="col-12 bg-white pt-2 mb-1 mt-3">
                <div class="row">
                    <div class="col-12 col-lg-5 text-md-left text-center pt-2">
                        <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg><b>Liste des opérations</b></h5>
                    </div>
                    <div class="col-12 col-lg-7 text-md-right text-center">
                        <button class="btn btn-success mb-2 rounded-pill dropdown-toggle" type="button" id="btn_add_transaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Ajouter une transaction</button>
                        <div class="dropdown-menu" aria-labelledby="btn_add_transaction">
                            <a href="javascript:void(0);" data-transaction="Nouvel encaissement" class="dropdown-item mb-2 btnTransaction" data-type="cash_in" data-toggle="modal" data-target="#transactionModal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg> Encaissement</a>
                            <a href="javascript:void(0);" data-transaction="Nouveau décaissement" class="dropdown-item mb-2 btnTransaction" data-type="cash_out" data-toggle="modal" data-target="#transactionModal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg> Décaissement</a>
                        </div>

                        <button class="btn btn-info rounded-pill mb-2" type="button" data-toggle="modal" data-target="#importChoiceModal" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Importation</button>

                        <button class="btn btn-primary rounded-pill mb-2" id="btn-filter" currentYear="{{ date('Y') }}" currentDate="{{ date('d-m-Y') }}" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Période</button>
                    </div>
                </div>
            </div>
            <div class="col-12 bg-white p-3 border d-none" id="filter-content">
                <div class="mb-3"><h4>Période</h4></div>
                <div class="form-row">
                    <div class="col-12 col-md-3 mb-3">
                        <label for="">Date de paiement</label>
                        <select name="filter_date" id="filter_date" class="form-control">
                            <option value="current_year">Cette année</option>
                            <option value="previous_year">L'année dernière</option>
                            <option value="current_day">Aujourd'hui</option>
                            <option value="customized">Dates personnalisées</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <label for="">Du</label>
                        <input type="text" class="form-control datepicker" id="filter_date_start" name="filter_date_start" />
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <label for="">Au</label>
                        <input type="text" class="form-control datepicker" id="filter_date_end" name="filter_date_end" />
                    </div>
                </div>
                <div>
                    <button class="btn btn-light rounded-pill border" id="btn-reset-filter" type="button">Restaurer</button><button class="btn btn-success rounded-pill float-none float-md-right" id="btn-apply-filter" type="button">Appliquer</button>
                </div>
            </div> 

            <div id="num-content"></div>

            <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info text-center">
                            <h5 class="modal-title text-white" id="newTransactionTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                        <form id="newtransactionForm" autocomplete="off">
                        @csrf
                        <div class="modal-body" style="max-height:410px;overflow-y:auto">
                            <div class="form-row">
                                <div class="col-12 col-lg-8 mb-3">
                                    <label class="text-dark">Intitulé de l'opération <span class="text-required">*</span> </label>
                                    <input type="text" class="form-control" name="transaction_label" id="transaction_label" placeholder="Intitulé de l'opération ..." />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-3">
                                    <label class="text-dark">Montant TTC <span class="text-required">*</span></label>
                                    <input type="text" class="form-control" name="transaction_amount" id="transaction_amount" placeholder="0,00" />
                                </div>
                                <div class="col-12 col-md-3 mb-3">
                                    <label class="text-dark">Date de paiement <span class="text-required">*</span></label>
                                    <input type="text" class="form-control datepicker" name="transaction_payment_date" id="transaction_payment_date" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-3">
                                    <label class="text-dark">Référence</label>
                                    <input type="text" class="form-control" name="transaction_ref_num" id="transaction_ref_num" placeholder="Ajouter une référence ..." />
                                </div>
                                <div class="col-12 col-md-3 mb-3">
                                    <label class="text-dark">Date de valeur</label>
                                    <input type="text" class="form-control datepicker" name="transaction_value_date" id="transaction_value_date" />
                                </div>
                                <div class="col-12 col-md-3 mb-3">
                                    <label class="text-dark">Mode de paiement</label>
                                    <select name="transaction_payment_mode" id="transaction_payment_mode" class="form-control transaction_payment_mode"></select>
                                </div>
                                <div class="col-12 col-md-1 mb-3">
                                    <label class="text-dark">TVA</label>
                                    <select name="transaction_vta" id="transaction_vta" class="form-control transaction_vta"></select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-4 mb-3">
                                    <label class="text-dark">Catégorie <span class="text-required">*</span></label>
                                    <select name="transaction_category" id="transaction_category" class="form-control transaction_category"></select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-4 mb-3">
                                    <label class="text-dark">Compte tiers</label>
                                    <select name="transaction_th_account" id="transaction_th_account" class="form-control transaction_th_account"></select>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label class="text-dark">Mémo</label>
                                    <textarea class="form-control" name="transaction_notes" id="transaction_notes" placeholder="Ajouter un commentaire ..." rows="2"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12">
                                    <label for="" class="text-dark status_text"><b>Payé</b></label><br>
                                    <label class="switch s-success mr-2">
                                        <input type="checkbox" checked name="status" class="status_checkbox" id="status_checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="t_t" id="t_t" />
                            <button class="btn btn-danger mb-2" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Enregistrer</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="transactioneditModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info text-center">
                            <h5 class="modal-title text-white" id="transactionTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                        <form id="transactioneditForm" autocomplete="off">
                        @csrf
                        <div class="modal-body" style="max-height:410px;overflow-y:auto">
                            <div class="form-row">
                                <div class="col-12 col-lg-8 mb-3">
                                    <label class="text-dark">Intitulé de l'opération <span class="text-required">*</span> </label>
                                    <input type="text" class="form-control" name="transaction_label" id="transaction_label" placeholder="Intitulé de l'opération ..." />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-3">
                                    <label class="text-dark">Montant TTC <span class="text-required">*</span></label>
                                    <input type="text" class="form-control" name="transaction_amount" id="transaction_amount" placeholder="0,00" />
                                </div>
                                <div class="col-12 col-md-3 mb-3">
                                    <label class="text-dark">Date de paiement <span class="text-required">*</span></label>
                                    <input type="text" class="form-control datepicker" name="transaction_payment_date" id="transaction_payment_date" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-3 mb-3">
                                    <label class="text-dark">Référence</label>
                                    <input type="text" class="form-control" name="transaction_ref_num" id="transaction_ref_num" placeholder="Ajouter une référence ..." />
                                </div>
                                <div class="col-12 col-md-3 mb-3">
                                    <label class="text-dark">Date de valeur</label>
                                    <input type="text" class="form-control datepicker" name="transaction_value_date" id="transaction_value_date" />
                                </div>
                                <div class="col-12 col-md-3 mb-3">
                                    <label class="text-dark">Mode de paiement</label>
                                    <select name="transaction_payment_mode" id="transaction_payment_mode" class="form-control transaction_payment_mode"></select>
                                </div>
                                <div class="col-12 col-md-1 mb-3">
                                    <label class="text-dark">TVA</label>
                                    <select name="transaction_vta" id="transaction_vta" class="form-control transaction_vta"></select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-4 mb-3">
                                    <label class="text-dark">Catégorie <span class="text-required">*</span></label>
                                    <select name="transaction_category" id="transaction_category" class="form-control transaction_category"></select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-4 mb-3">
                                    <label class="text-dark">Compte tiers</label>
                                    <select name="transaction_th_account" id="transaction_th_account" class="form-control transaction_th_account"></select>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label class="text-dark">Mémo</label>
                                    <textarea class="form-control" name="transaction_notes" id="transaction_notes" placeholder="Ajouter un commentaire ..." rows="2"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12">
                                    <label for="" class="text-dark status_text"><b>Payé</b></label><br>
                                    <label class="switch s-success mr-2">
                                        <input type="checkbox" checked name="status" class="status_checkbox" id="status_checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="t_t" id="t_t" />
                            <input type="hidden" name="transaction"id="transaction" />
                            <input type="hidden" name="op" id="op" />
                            <button class="btn btn-danger mb-2" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Enregistrer</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="importChoiceModal" tabindex="-1" role="dialog" aria-labelledby="importChoiceModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body pt-4 pb-4" style="width:600px;max-height:410px;overflow-y:auto">
                            <div id="header" class="mb-3">
                                <h5>Type d'opérations à importer : </h5>
                            </div>
                            <div class="row pl-3 pr-3">
                                    <a style="cursor:pointer" class="bg-success rounded mr-3 p-2 btn_import_choice" target="cash_in">
                                        <h6 class="text-white">Encaissements</h6>
                                        <div class="text-center mt-3"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 155.139 155.139" style="enable-background:new 0 0 155.139 155.139;" xml:space="preserve"><g><g><path style="fill:#FFFFFF;" d="M114.588,45.42h28.17L97.338,0l-45.42,45.42h28.516C76.4,98.937,48.529,142.173,12.381,152.686c5.513,1.605,11.224,2.452,17.071,2.452C73.601,155.139,109.94,107.111,114.588,45.42z"/></g></g></svg></div>
                                    </a>
                                    <a style="cursor:pointer" class="bg-danger mr-3 rounded p-2 btn_import_choice" target="cash_out">
                                        <h6 class="text-white">Décaissements</h6>
                                        <div class="text-center mt-3"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 60.731 60.731" style="enable-background:new 0 0 60.731 60.731;fill:#FFFFFF" xml:space="preserve"><g><g><path d="M15.875,42.952H4.847l17.78,17.779l17.782-17.779H29.244c1.58-20.951,12.49-37.877,26.64-41.992C53.726,0.332,51.49,0,49.2,0C31.919,0,17.694,18.8,15.875,42.952z"/></g></g></svg></div>
                                    </a>
                                    <a style="cursor:pointer" class="bg-info mr-3 rounded p-2 btn_import_choice" target="all">
                                        <h6 class="text-white">Encaissements & <br>Décaissements</h6>
                                        <div class="text-center"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 179.012 179.012" style="enable-background:new 0 0 179.012 179.012;" xml:space="preserve"><g> <path style="fill:#FFFFFF;" d="M84.461,31.681c4.356,0,8.622,0.632,12.733,1.832c-26.952,7.834-47.723,40.062-50.724,79.956h21.254l-33.868,33.862L0,113.469h21.009C24.47,67.488,51.566,31.681,84.461,31.681z M158.009,65.543h21.003L145.15,31.681l-33.862,33.862h21.254c-3.001,39.894-23.766,72.122-50.724,79.956c4.105,1.199,8.366,1.832,12.739,1.832C127.452,147.331,154.548,111.524,158.009,65.543z"/></g></svg></div>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="transactionOccurrenceToast">
                <!--<div class="myToast shadow">
                    <div class="myToastHeader">
                        <h6><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg> Occurrence detectée <button class="btn-custom-light bg-white float-right btn_close_occurrence_view" id=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#aaa8a8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button></h6>     
                    </div>
                    <div class="myToastBody">
                        <div class="border-gray rounded mb-3 p-2">
                            <div class="row ml-1">
                                <span class="bg-gray rounded pt-2 pr-2 pl-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d52727" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg></span>
                                <div class="ml-3">
                                    <span id="occurrenceType" class="text-bold">Décaissement</span><br>
                                    <span class="text-danger"><b>100 000,00</b> <span class="badge badge-success">Payé</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <span class="text-dark"><b>Intitulé de l'opération</b></span><br>
                            <span class="text-gray d-inline-block text-truncate" style="max-width:280px">Lorem ipsum dolor, sit amet lorem ipsum dolor</span>
                        </div>
                        <div class="mb-3">
                            <span class="text-dark"><b>Date</b></span><br>
                            <span class="text-gray">12/10/2020</span>
                        </div>
                        <div class="mb-3">
                            <span class="text-dark"><b>Catégorie</b></span><br>
                            <span class="text-gray d-inline-block text-truncate" style="max-width:280px">Communication & Marketing</span>
                        </div>
                        <div class="mb-3">
                            <span class="text-dark"><b>Payé par</b></span><br>
                            <span class="text-gray d-inline-block text-truncate" style="max-width:280px">Chèques</span>
                        </div>
                    </div>
                    <div class="myToastFooter">
                        <button class="btn btn-light border" id="btn_remove_">Retirer</button>
                        <button class="btn btn-primary btn_close_occurrence_view">Approuver</button>
                    </div>
                </div> -->
            </div>
    </div>

@endsection