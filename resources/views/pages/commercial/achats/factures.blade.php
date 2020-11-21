@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="statbox widget box box-shadow">
                    <div class="col-12 bg-white pt-2 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-5 text-md-left text-center pt-2">
                                <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg><b>Liste des factures</b></h5>
                            </div>
                            <div class="col-12 col-md-7 text-md-right text-center">
                                <button class="btn btn-success mb-2" type="button" id="add-account"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Nouveau</button>

                                <button class="btn btn-info mb-2" type="button" id="cancel-view"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Importer</button>
                            </div>
                        </div>
                    </div>
                    <div class="row layout-top-spacing">
                        <div class="col-12 col-md-6 col-xl-3 section-space--pb_20">
                            <div class="widget-content widget-content-area text-center pt-4 pb-3 border-left-primary">
                                <h6 class="text-uppercase">Total ttc</h6>
                                <h4 class="text-primary">0,00</h4>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 section-space--pb_20">
                            <div class="widget-content widget-content-area text-center pt-4 pb-3 border-left-success">
                                <h6 class="text-uppercase">Réglé ttc [0%]</h6>
                                <h4 class="text-success">0,00</h4>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 section-space--pb_20">
                            <div class="widget-content widget-content-area text-center pt-4 pb-3 border-left-warning">
                                <h6 class="text-uppercase">à Réglé ttc [0%]</h6>
                                <h4 class="text-warning">0,00</h4>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 section-space--pb_20">
                            <div class="widget-content widget-content-area text-center pt-4 pb-3 border-left-danger">
                                <h6 class="text-uppercase">Retard ttc [0%]</h6>
                                <h4 class="text-danger">0,00</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="table" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Référence</th>
                                        <th>Compte</th>
                                        <th>Date</th>
                                        <th>Echéance</th>
                                        <th>Total</th>
                                        <th>Dû</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection