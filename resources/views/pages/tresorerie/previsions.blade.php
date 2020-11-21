@extends('layouts.app')

@section('content')

            <div class="layout-px-spacing">
        
                <div class="col-12 bg-white pt-3 shadow mt-3 rounded">
                    <div class="row">
                        <div class="col-12 text-center text-md-left col-md-7 mb-2">
                            <h6 class="text-uppercase text-color-linna1 text-bold">Vos objectifs</h6>
                            <span class="text-primary">(les montants sont calculés HT)</span>
                        </div>
                        <div class="col-12 text-center text-md-right col-md-5 mb-2">
                            <div class="btn-group mb-4 btn-group-lg">
                                <button class="btn-custom-light bg-white border pt-2 pb-2 rounded" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#28a745" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg> Changer de scénario
                                </button>
                                <div class="dropdown-menu" style="min-width:380px;">
                                    <a style="cursor:pointer;" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#0076A8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="text-dark">Scénario par défaut</span>
                                    </a>
                                    <a style="cursor:pointer;" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg><span class="text-dark" id="span1">Baisse des ventes (15%)</span> 
                                        <button class="btn-custom-light bg-white float-right bs-tooltip btn-edit-scenario" id="1" title="Renommer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button>
                                    </a>
                                    <a style="cursor:pointer" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#e83e8c" stroke="#e83e8c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="text-dark" id="span1">Investissement équipements</span> <button class="btn-custom-light bg-white float-right bs-tooltip" title="Supprimer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button><button class="btn-custom-light bg-white float-right bs-tooltip" title="Renommer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button>
                                    </a>
                                    <a style="cursor:pointer" class="dropdown-item"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#fd7e14" stroke="#fd7e14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="text-dark">COVID19</span> <button class="btn-custom-light bg-white float-right bs-tooltip" title="Supprimer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button><button class="btn-custom-light bg-white float-right bs-tooltip" title="Renommer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button>
                                    </a>
                                    <div class="divider dropdown-item"></div>
                                    <a style="cursor:pointer" class="dropdown-item" id="new-scenario-btn" data-toggle="modal" data-target="#scenarioModal" class="text-primary text-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#241cb8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg><span class="text-primary">Créer un scénario</span> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 bg-success pt-3 pb-3 shadow mt-3 rounded">
                    <div class="bg-white border text-center pt-2 rounded">
                        <h6 class="text-bold">Scénario actif : Mon premier scénario</h6>
                        <h6 class="text-uppercase text-color-linna1 text-bold">Trésorerie disponible</h6>
                        <h4 class="text-dark text-bold">+ 400 000 FCFA</h4>
                    </div>
                </div>
                <div class="col-12 pt-2 pt-2 shadow rounded">
                    <h6 class="text-bold">Commentaires:</h6> <p>Aucun commentaire pour ce scénario ...</p>
                </div>

                <div class="row layout-top-spacing" id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area animated-underline-content border border-success">  
                            <div class="text-center text-md-right">
                                <button class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg> Définir les objectifs</button>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered table-previsions">
                                    <thead class="bg-gray">
                                        <tr>
                                            <th></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn jan" data-target="jan" style="cursor:pointer;"><div class="previsions-values">Jan.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn fev" data-target="fev" style="cursor:pointer"><div class="previsions-values">Fév.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn mar" data-target="mar" style="cursor:pointer"><div class="previsions-values">Mar.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn avr" data-target="avr" style="cursor:pointer"><div class="previsions-values">Avr.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn mai" data-target="mai" style="cursor:pointer"><div class="previsions-values">Mai</div></th> 
                                            <th nowrap class="text-right text-dark pv-column target-month-btn jui" data-target="jui" style="cursor:pointer;"><div class="previsions-values">Jui.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn juil" data-target="juil" style="cursor:pointer"><div class="previsions-values">Juil.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn aou" data-target="aou" style="cursor:pointer"><div class="previsions-values">Aoû.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn sep" data-target="sep" style="cursor:pointer"><div class="previsions-values">Sep.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn oct" data-target="oct" style="cursor:pointer"><div class="previsions-values">Oct.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn nov" data-target="nov" style="cursor:pointer"><div class="previsions-values">Nov.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn dec" data-target="dec" style="cursor:pointer"><div class="previsions-values">Dec.</div></th> 
                                        </tr>
                                        <tr>
                                            <th nowrap class="text-dark"><div class="previsions-labels">Excédent en début de mois</div></th>
                                            <th nowrap class="text-right text-dark jan pv-column">100 000 000</th>
                                            <th nowrap class="text-right text-dark fev pv-column">0</th>
                                            <th nowrap class="text-right text-dark mar pv-column">0</th>
                                            <th nowrap class="text-right text-dark avr pv-column">0</th>
                                            <th nowrap class="text-right text-dark mai pv-column">0</th>
                                            <th nowrap class="text-right text-dark jui pv-column">0</th>
                                            <th nowrap class="text-right text-dark juil pv-column">0</th>
                                            <th nowrap class="text-right text-dark aou pv-column">0</th>
                                            <th nowrap class="text-right text-dark sep pv-column">0</th>
                                            <th nowrap class="text-right text-dark oct pv-column">0</th>
                                            <th nowrap class="text-right text-dark nov pv-column">0</th>
                                            <th nowrap class="text-right text-dark dec pv-column">0</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-gray">
                                            <th nowrap class="text-uppercase"><div class="previsions-labels">Encaissements</div></th>
                                            <th nowrap class="text-right jan pv-column">0</th>
                                            <th nowrap class="text-right fev pv-column">0</th>
                                            <th nowrap class="text-right mar pv-column">0</th>
                                            <th nowrap class="text-right avr pv-column">0</th>
                                            <th nowrap class="text-right mai pv-column">0</th>
                                            <th nowrap class="text-right jui pv-column">0</th>
                                            <th nowrap class="text-right juil pv-column">0</th>
                                            <th nowrap class="text-right aou pv-column">0</th>
                                            <th nowrap class="text-right sep pv-column">0</th>
                                            <th nowrap class="text-right oct pv-column">0</th>
                                            <th nowrap class="text-right nov pv-column">0</th>
                                            <th nowrap class="text-right dec pv-column">0</th>
                                        </tr>
                                        <tr>
                                            <td nowrap><div class="previsions-labels">Ventes de produits</div></td>
                                            <td nowrap class="text-right jan pv-column">0</td>
                                            <td nowrap class="text-right fev pv-column">0</td>
                                            <td nowrap class="text-right mar pv-column">0</td>
                                            <td nowrap class="text-right avr pv-column">0</td>
                                            <td nowrap class="text-right mai pv-column">0</td>
                                            <td nowrap class="text-right jui pv-column">0</td>
                                            <td nowrap class="text-right juil pv-column">0</td>
                                            <td nowrap class="text-right aou pv-column">0</td>
                                            <td nowrap class="text-right sep pv-column">0</td>
                                            <td nowrap class="text-right oct pv-column">0</td>
                                            <td nowrap class="text-right nov pv-column">0</td>
                                            <td nowrap class="text-right dec pv-column">0</td>
                                        </tr>
                                        <tr>
                                            <td nowrap><div class="previsions-labels">Prestations de service</div></td>
                                            <td nowrap class="text-right jan pv-column">0</td>
                                            <td nowrap class="text-right fev pv-column">0</td>
                                            <td nowrap class="text-right mar pv-column">0</td>
                                            <td nowrap class="text-right avr pv-column">0</td>
                                            <td nowrap class="text-right mai pv-column">0</td>
                                            <td nowrap class="text-right jui pv-column">0</td>
                                            <td nowrap class="text-right juil pv-column">0</td>
                                            <td nowrap class="text-right aou pv-column">0</td>
                                            <td nowrap class="text-right sep pv-column">0</td>
                                            <td nowrap class="text-right oct pv-column">0</td>
                                            <td nowrap class="text-right nov pv-column">0</td>
                                            <td nowrap class="text-right dec pv-column">0</td>
                                        </tr>
                                        <tr class="bg-gray">
                                            <th nowrap class="text-uppercase"><div class="previsions-labels">Décaissements</div></th>
                                            <th nowrap class="text-right jan pv-column">0</th>
                                            <th nowrap class="text-right fev pv-column">0</th>
                                            <th nowrap class="text-right mar pv-column">0</th>
                                            <th nowrap class="text-right avr pv-column">0</th>
                                            <th nowrap class="text-right mai pv-column">0</th>
                                            <th nowrap class="text-right jui pv-column">0</th>
                                            <th nowrap class="text-right juil pv-column">0</th>
                                            <th nowrap class="text-right aou pv-column">0</th>
                                            <th nowrap class="text-right sep pv-column">0</th>
                                            <th nowrap class="text-right oct pv-column">0</th>
                                            <th nowrap class="text-right nov pv-column">0</th>
                                            <th nowrap class="text-right dec pv-column">0</th>
                                        </tr>
                                        <tr>
                                            <td nowrap><div class="previsions-labels">Marketing</div></td>
                                            <td nowrap class="text-right jan pv-column">0</td>
                                            <td nowrap class="text-right fev pv-column">0</td>
                                            <td nowrap class="text-right mar pv-column">0</td>
                                            <td nowrap class="text-right avr pv-column">0</td>
                                            <td nowrap class="text-right mai pv-column">0</td>
                                            <td nowrap class="text-right jui pv-column">0</td>
                                            <td nowrap class="text-right juil pv-column">0</td>
                                            <td nowrap class="text-right aou pv-column">0</td>
                                            <td nowrap class="text-right sep pv-column">0</td>
                                            <td nowrap class="text-right oct pv-column">0</td>
                                            <td nowrap class="text-right nov pv-column">0</td>
                                            <td nowrap class="text-right dec pv-column">0</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="bg-gray">
                                        <tr>
                                            <th nowrap class="text-dark text-uppercase"><div class="previsions-labels">Excédent en fin de mois</div></th>
                                            <th nowrap class="text-right text-dark jan pv-column">0</th>
                                            <th nowrap class="text-right text-dark fev pv-column">0</th>
                                            <th nowrap class="text-right text-dark mar pv-column">0</th>
                                            <th nowrap class="text-right text-dark avr pv-column">0</th>
                                            <th nowrap class="text-right text-dark mai pv-column">0</th>
                                            <th nowrap class="text-right text-dark jui pv-column">0</th>
                                            <th nowrap class="text-right text-dark juil pv-column">0</th>
                                            <th nowrap class="text-right text-dark aou pv-column">0</th>
                                            <th nowrap class="text-right text-dark sep pv-column">0</th>
                                            <th nowrap class="text-right text-dark oct pv-column">0</th>
                                            <th nowrap class="text-right text-dark nov pv-column">0</th>
                                            <th nowrap class="text-right text-dark dec pv-column">0</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered table-previsions">
                                    <thead class="bg-gray">
                                        <tr>
                                            <th><div class="previsions-labels text-dark">Mes indicateurs</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn jan" data-target="jan" style="cursor:pointer;"><div class="previsions-values">Jan.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn fev" data-target="fev" style="cursor:pointer"><div class="previsions-values">Fév.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn mar" data-target="mar" style="cursor:pointer"><div class="previsions-values">Mar.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn avr" data-target="avr" style="cursor:pointer"><div class="previsions-values">Avr.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn mai" data-target="mai" style="cursor:pointer"><div class="previsions-values">Mai</div></th> 
                                            <th nowrap class="text-right text-dark pv-column target-month-btn jui" data-target="jui" style="cursor:pointer;"><div class="previsions-values">Jui.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn juil" data-target="juil" style="cursor:pointer"><div class="previsions-values">Juil.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn aou" data-target="aou" style="cursor:pointer"><div class="previsions-values">Aoû.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn sep" data-target="sep" style="cursor:pointer"><div class="previsions-values">Sep.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn oct" data-target="oct" style="cursor:pointer"><div class="previsions-values">Oct.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn nov" data-target="nov" style="cursor:pointer"><div class="previsions-values">Nov.</div></th>
                                            <th nowrap class="text-right text-dark pv-column target-month-btn dec" data-target="dec" style="cursor:pointer"><div class="previsions-values">Dec.</div></th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td nowrap><div class="previsions-labels">Indicateur 1</div></td>
                                            <td nowrap class="text-right jan pv-column">0</td>
                                            <td nowrap class="text-right fev pv-column">0</td>
                                            <td nowrap class="text-right mar pv-column">0</td>
                                            <td nowrap class="text-right avr pv-column">0</td>
                                            <td nowrap class="text-right mai pv-column">0</td>
                                            <td nowrap class="text-right jui pv-column">0</td>
                                            <td nowrap class="text-right juil pv-column">0</td>
                                            <td nowrap class="text-right aou pv-column">0</td>
                                            <td nowrap class="text-right sep pv-column">0</td>
                                            <td nowrap class="text-right oct pv-column">0</td>
                                            <td nowrap class="text-right nov pv-column">0</td>
                                            <td nowrap class="text-right dec pv-column">0</td>
                                        </tr>
                                        <tr>
                                            <td nowrap><div class="previsions-labels">Indicateur 2</div></td>
                                            <td nowrap class="text-right jan pv-column">0</td>
                                            <td nowrap class="text-right fev pv-column">0</td>
                                            <td nowrap class="text-right mar pv-column">0</td>
                                            <td nowrap class="text-right avr pv-column">0</td>
                                            <td nowrap class="text-right mai pv-column">0</td>
                                            <td nowrap class="text-right jui pv-column">0</td>
                                            <td nowrap class="text-right juil pv-column">0</td>
                                            <td nowrap class="text-right aou pv-column">0</td>
                                            <td nowrap class="text-right sep pv-column">0</td>
                                            <td nowrap class="text-right oct pv-column">0</td>
                                            <td nowrap class="text-right nov pv-column">0</td>
                                            <td nowrap class="text-right dec pv-column">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>         
                    </div>
                </div>

                <div class="modal fade" id="scenarioModal" tabindex="-1" role="dialog" aria-labelledby="scenarioModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-linna-1">
                                <h5 class="modal-title text-white" id="scenarioModalTitle">Nouveau scénario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </button>
                            </div>
                            <form id="scenario-form">
                            <div class="modal-body" style="max-height:400px;overflow-y:auto">
                                <div class="form-row">
                                    <div class="col-12 mb-4">
                                            <label for="" class="text-black">Nom du scénario</label>
                                            <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-4">
                                            <label for="" class="text-black">Année de prévision</label>
                                            <select class="selectpicker form-control" data-show-subtext="true">
                                                <option data-subtext="Année en cours" selected>2020</option>
                                                <option data-subtext="">2021</option>
                                                <option data-subtext="">2022</option>
                                                <option data-subtext="">2023</option>
                                                <option data-subtext="">2024</option>
                                                <option data-subtext="">2025</option>
                                            </select>
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                            <label for="" class="text-black">Couleur du scénario</label><br>
                                            <input type="text" class="form-control colorPicker" data-control="hue" value="#0076A8" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-4">
                                            <label for="" class="text-black">Intervalle</label>
                                            <select class="form-control">
                                                <option value="">Mensuel</option>
                                                <option value="">Trimestriel</option>
                                                <option value="">Annuel</option>
                                            </select>
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                            <label for="" class="text-black">Définir</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Pour tous</option>
                                                <option value="">Par client</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 mb-4">
                                            <label for="" class="text-black">Commentaires</label>
                                            <textarea name="" id="" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn" data-dismiss="modal">Annuler
                                </button>
                                <button class="btn btn-primary" type="submit">Créer le scénario</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

@endsection