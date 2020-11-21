@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="statbox widget box box-shadow">
                    <div class="col-12 bg-white pt-2 mb-3">
                        <div class="row">
                            <div class="col-12 col-md-5 text-md-left text-center pt-2">
                                <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg><b>Liste des produits/services</b></h5>
                            </div>
                            <div class="col-12 col-md-7 text-md-right text-center">
                                <button class="btn btn-success mb-2" type="button" id="add-product" data-toggle="modal" data-target="#newproductModal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Nouveau</button>

                                <button class="btn btn-info mb-2" type="button" id="btn-import" data-toggle="modal" data-target="#uploadModal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Importer</button>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="table" class="table table-hover pt-2" style="width:100%"></table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="modal fade" id="newproductModal" tabindex="-1" role="dialog" aria-labelledby="newproductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-center">
                    <h5 class="modal-title text-white">Créer un nouveau produit/service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <form id="newproductForm" autocomplete="off">
                    @csrf
                    <div class="modal-body" style="max-height:400px;overflow-y:auto">
                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-3 mb-3">
                                <label for="" class="text-dark">Type</label>
                                <select name="_type" id="_type" class="form-control">
                                    <option value="product">Produit</option>
                                    <option value="service">Service</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-3" id="contentProductSP"><label for="" class="text-dark">Type de Produit</label><select name="prTypeSP" id="prTypeSP" class="form-control"><option value="sale">Vente</option><option value="purchase">Achat</option><option value="both">Achat & Vente</option></select></div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-5 col-lg-3 mb-3">
                                <label for="" class="text-dark">Code</label>
                                <input type="text" id="prCode" name="prCode" class="form-control">
                            </div>
                            <div class="col-12 col-md-7 col-lg-5 mb-3">
                                <label for="" class="text-dark">Catégorie</label>
                                <select name="prCategory" id="prCategory" class="form-control prCategory">
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-9 col-lg-8 mb-3">
                                <label for="" class="text-dark">Désignation <span class="text-required">*</span></label>
                                <input type="text" name="prDesignation" id="prDesignation" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-4 mb-3">
                                <label for="" class="text-dark">Prix de vente</label>
                                <input type="text" id="prSalePrice" name="prSalePrice" class="form-control" />
                            </div>
                            <div class="col-12 col-md-2 mb-3">
                                <label for="" class="text-dark">Taxe%</label>
                                <select name="prTax" id="prTax" class="form-control prTax"></select>
                            </div>
                            <div class="col-12 col-md-4 mb-3" id="contentPurchasePrice"></div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-3 mb-3">
                                <label for="" class="text-dark">Marge%</label>
                                <input type="text" class="form-control" id="prMargin" name="prMargin" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-8 mb-3">
                                <label for="" class="text-dark">Description</label>
                                <textarea name="prDescription" rows="3" class="form-control" placeholder="Entrez une description ..."></textarea>
                            </div>
                        </div>
                        <div class="form-row" id="contentTracking">
                            <div class="col-12 mb-3 border-top pt-3">
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-success">
                                    <input type="checkbox" class="new-control-input" id="prTracking" name="prTracking">
                                    <span class="new-control-indicator"></span> Ce produit est stocké ?
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 mb-3" id="contentPrMinStock"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light mb-2" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="producteditModal" tabindex="-1" role="dialog" aria-labelledby="newproductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-center">
                    <h5 class="modal-title text-white" id="producteditModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <form id="producteditForm" autocomplete="off">
                    @csrf
                    <div class="modal-body" style="max-height:400px;overflow-y:auto">
                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-4 mb-3 contentProductSP" id="contentProductSP"></div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-5 col-lg-3 mb-3">
                                <label for="" class="text-dark">Code</label>
                                <input type="text" id="prCode" name="prCode" class="form-control">
                            </div>
                            <div class="col-12 col-md-7 col-lg-5 mb-3">
                                <label for="" class="text-dark">Catégorie</label>
                                <select name="prCategory" id="prCategory" class="form-control prCategory">
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-9 col-lg-8 mb-3">
                                <label for="" class="text-dark">Désignation <span class="text-required">*</span></label>
                                <input type="text" name="prDesignation" id="prDesignation" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-4 mb-3">
                                <label for="" class="text-dark">Prix de vente</label>
                                <input type="text" id="prSalePrice" name="prSalePrice" class="form-control" />
                            </div>
                            <div class="col-12 col-md-2 mb-3">
                                <label for="" class="text-dark">Taxe%</label>
                                <select name="prTax" id="prTax" class="form-control prTax"></select>
                            </div>
                            <div class="col-12 col-md-4 mb-3" id="contentPurchasePrice"></div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-3 mb-3">
                                <label for="" class="text-dark">Marge%</label>
                                <input type="text" class="form-control" id="prMargin" name="prMargin" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-8 mb-3">
                                <label for="" class="text-dark">Description</label>
                                <textarea name="prDescription" id="prDescription" rows="3" class="form-control" placeholder="Entrez une description ..."></textarea>
                            </div>
                        </div>
                        <div class="form-row" id="contentTracking"></div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="form" name="form" />
                        <button class="btn btn-light mb-2" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection