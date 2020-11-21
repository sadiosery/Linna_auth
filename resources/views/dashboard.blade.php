@extends('layouts.app')

@section('content')

        <div class="layout-px-spacing">
            
                <div class="col-12 bg-white pt-3 rounded mt-2 mb-2">
                    <div class="row">
                      <div class="col-12 col-md-6 mb-2">
                          <h4 class="text-color-linna1 text-center text-md-left mt-3 text-bold"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg> Dashboard ventes</h4>
                      </div>
                      <div class="col-12 text-center text-md-right col-md-6 mb-2">
                          <select class="selectpicker" data-show-subtext="true">
                            <option data-subtext="Actif" selected>Commercial</option>
                            <option data-subtext="">Trésorerie</option>
                          </select>
                      </div>
                    </div>
                </div>

                <div class="col-12 bg-white pt-3 text-center text-md-right rounded">
                    <button class="btn btn-primary btn-sm bs-tooltip mb-2" title="Actualiser" data-toggle="modal"
                    data-target="#testModal" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg></button>
                    <button class="btn btn-primary btn-sm bs-tooltip mb-2" title="Télécharger" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg></button>
                    <button class="btn btn-primary btn-sm bs-tooltip mb-2" data-toggle="modal" data-target="#dashboardModal" title="Personnaliser" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>

                    <select class="selectpicker mb-2" data-show-subtext="true">
                        <option data-subtext="">2015</option>
                        <option data-subtext="">2016</option>
                        <option data-subtext="">2017</option>
                        <option data-subtext="">2018</option>
                        <option data-subtext="">2019</option>
                        <option data-subtext="Année en cours" selected>2020</option>
                    </select>
                </div>

                <div class="modal fade" id="dashboardModal" tabindex="-1" role="dialog" aria-labelledby="dashboardModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="dashboardModalLabel">Personnaliser le dashbord</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </button>
                            </div>
                            <div class="modal-body" style="max-height:420px;overflow-y:auto;padding-top:0">
                                    <ul class="nav nav-tabs nav-fill mb-3 mt-3" id="borderTop" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="border-top-votrevisuel-tab" data-toggle="tab" href="#border-top-votrevisuel" role="tab" aria-controls="border-top-votrevisuel" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> Votre visuel</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="border-top-parametres-utilisateur-tab" data-toggle="tab" href="#border-top-parametres-utilisateur" role="tab" aria-controls="border-top-parametres-utilisateur" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Paramètres/Utilisateur</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="borderTopContent">
                                        <div class="tab-pane fade show active" id="border-top-votrevisuel" role="tabpanel" aria-labelledby="border-top-votrevisuel-tab">
                                            eye
                                        </div>
                                        <div class="tab-pane fade" id="border-top-parametres-utilisateur" role="tabpanel" aria-labelledby="border-top-parametres-utilisateur-tab">
                                            eye 1
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer border-top pt-2">
                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Annuler</button>
                                <button type="button" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row layout-top-spacing">
                    <div class="col-12 col-md-6 col-lg-3 layout-spacing">
                        <div class="col-12 bg-white rounded shadow pt-3 pb-3 border-left-primary">
                            <span>Chiffre d'affaires</span>
                            <h5 class="text-primary mt-3">100 000 000,00</h5>
                            <div class="mt-3">
                                <span class="font-size--12 text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#dc3545" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>24%</span>

                                <span class="float-right font-size--12 text-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#28a745" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>18%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 layout-spacing">
                        <div class="col-12 bg-white rounded shadow pt-3 pb-3 border-left-warning">
                            <span>Total des ventes</span>
                            <h5 class="text-warning mt-3">10 000</h5>
                            <div class="mt-3">
                                <span class="font-size--12 text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#dc3545" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>24%</span>

                                <span class="float-right font-size--12 text-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#28a745" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>18%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 layout-spacing">
                        <div class="col-12 bg-white rounded shadow pt-3 pb-3 border-left-success">
                            <span>Marge totale</span>
                            <h5 class="text-success mt-3">60 000 000,00</h5>
                            <div class="mt-3">
                                <span class="font-size--12 text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#dc3545" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>24%</span>

                                <span class="float-right font-size--12 text-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#28a745" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>18%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 layout-spacing">
                        <div class="col-12 bg-white rounded shadow pt-3 pb-3 border-left-danger">
                            <span>Acquisition de clients</span>
                            <h5 class="text-danger text-center mt-3">8%</h5>
                            <div class="mt-3">
                                <span class="font-size--12 text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#dc3545" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>24%</span>

                                <span class="float-right font-size--12 text-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#0076A8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#28a745" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>18%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row layout-top-spacing">
                    <div class="col-12 col-lg-6 layout-spacing">
                        <div class="widget-four" style="padding:0;border-radius:0px">
                            <div class="widget-content">
                               <div id="chart-sales-cy-py"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 layout-spacing">
                        <div class="widget-four" style="padding:0;border-radius:0px">
                            <div class="widget-content">
                               <div id="chart-sales-clients-category"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 layout-spacing">
                        <div class="widget-four" style="padding:0;border-radius:0px">
                            <div class="widget-content">
                               <div id="chart-profitpercentage-product"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 layout-spacing">
                        <div class="widget-four" style="padding:0;border-radius:0px">
                            <div class="widget-content">
                               <div id="chart-10-clients"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 layout-spacing">
                        <div class="widget-four" style="padding:0;border-radius:0px">
                            <div class="widget-content">
                               <div id="chart-10-products"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 layout-spacing">
                        <div class="widget-four" style="padding:0;border-radius:0px">
                            <div class="widget-content">
                               <div id="chart-target"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 layout-spacing">
                        <div class="widget-four" style="padding:0;border-radius:0px">
                            <div class="widget-content">
                               <div id="chart-sales-target"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 layout-spacing">
                        <div class="widget-four" style="padding:0;border-radius:0px">
                            <div class="widget-content">
                               <div id="chart-categories-products"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 layout-spacing">
                        <div class="widget-four" style="padding:0;border-radius:0px">
                            <div class="widget-content">
                               <div id="chart-categories-clients"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 layout-spacing">
                        <div class="widget-four" style="padding:0;border-radius:0px">
                            <div class="widget-content">
                               <div id="chart-sales-salers"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 layout-spacing">
                        <div class="widget-four" style="padding:0;border-radius:0px">
                            <div class="widget-content">
                               <div id="chart-sales-total-years"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 layout-spacing">
                        <div class="widget-four" style="padding:0;border-radius:0px">
                            <div class="widget-content">
                               <div id="chart-sales-bymonth-years"></div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    
@endsection  