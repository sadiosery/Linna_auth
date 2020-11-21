@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area mb-2 rounded-0">
                        <div class="row">
                            <div class="col-12 col-lg-5 text-lg-left text-center mb-2">
                                <h4 class=""><b><span class="dr-edit">{{ $product->designation }}</span></b></h4>
                                <span class=""><b>Créé le {{ returnDate(substr($product->created_at,0,10)) }} à {{ substr($product->created_at,11,5) }}</b></span>
                            </div>
                            <div class="col-12 col-lg-7 text-lg-right text-center mb-2">
                                <div class="btn-group no-hide" role="group">
                                        <button id="btn_show_upload_file" target="{{ $product->id }}" class="position-relative dropdown-toggle btn-custom-light bg-gray border rounded pt-1 pb-1 pl-2 pr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> <span class="badge badge-info counter" id="counter_files"></span></button> 

                                        <div class="dropdown-menu shadow-lg" aria-labelledby="btn_upload_file" style="width:500px;">
                                            <div id="errorContent"></div>
                                            <div id="fileuploadContent"></div>
                                            <div class="">
                                                <input type="file" name="productFile" id="productFile" class="input_file_to_hide" data-target="{{ $product->id }}" accept=".csv, .xls, .xlsx, .xlsm, .jpg, .jpeg, .txt, .odt, .gif, .png, .pdf, .doc, .docx, .ppt, .pptx, .odf, .ods, .rtf" />
                                                <label for="productFile" class="btn btn-block shadow filelab bg-gray text-primary border rounded" id="btn_upload_file"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#ffffff" stroke="#1b55e2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg> Ajouter un fichier</label>
                                            </div>
                                        </div>
                                </div> 
                                @if($product->_type == 'product' && $product->tracking == 'yes')
                                <button class="position-relative btn-custom-light bg-gray border rounded pt-1 pb-1 pl-2 pr-2" title="Ajouter un mouvement" type="button" id="btn_add_movement" product="{{ $product->id }}" data-toggle="modal" data-target="#movementModal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area mb-2 rounded-0">
                        <div class="row">
                            <div class="col-12 col-lg-7 mb-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td>Code</td>
                                                <td>{{ $product->code }} </td>
                                            </tr>
                                            <tr>
                                                <td>Catégorie</td>
                                                <td class="">{{ $checkedCategory }}</td>
                                            </tr>
                                            @if($product->_type == 'product')
                                            <tr>
                                                <td>Prix d'achat</td>
                                                <td>{{ number_format($product->purchase_price,2,',',' ') }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td>Prix de vente</td>
                                                <td>{{ number_format($product->sale_price,2,',',' ') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Taxe%</td>
                                                <td>{{ number_format($product->tax,2,',',' ') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Marge%</td>
                                                <td>{{ number_format($product->margin,2,',',' ') }}</td>
                                            </tr>
                                            @if($product->_type == 'product')
                                            <tr>
                                                <td>Stocké ?</td>
                                                <td>{{ ($product->tracking == 'yes')? 'Oui': 'Non' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Stock minimum</td>
                                                <td>{{ number_format($product->min_stock,2,',',' ') }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td>Description</td>
                                                <td>{{ $product->description }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 mb-2">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-sm">
                                        <tbody>
                                            <tr class="text-center">
                                                <td>
                                                    <h6>Type</h6>
                                                    <h4 class="text-primary"><b>{{ ($product->_type == 'product')? 'Produit': 'Service' }}</b></h4>
                                                </td>
                                            </tr>
                                            @if($product->_type == 'product')
                                            <tr class="text-center">
                                                <td>
                                                    <h6>Opération</h6>
                                                    <h4 class="text-warning"><b>{{ ($product->product_sp == 'both')? 'Achat & Vente': (($product->product_sp == 'purchase')? 'Achat': 'Vente') }}</b></h4>
                                                </td>
                                            </tr>
                                            @endif
                                            @if($product->_type == 'product' && $product->tracking == 'yes')
                                            <tr class="text-center">
                                                <td>
                                                    <h6>Quantité disponible</h6>
                                                    <h4 class="text-warning"><b>1 000,00</b></h4>
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area mb-2 rounded-0">
                        <div class="row" id="contentPricesList" data-target="{{ $product->id }}"></div>
                    </div>
                    <div class="widget-content widget-content-area mb-2 rounded-0">
                        <h6><b>Tous les mouvements</b></h6>
                        <div class="table-responsive mb-4 mt-4">
                            <table id="movementsTable" data-target="{{ $product->id }}" class="table table-hover pt-2" style="width:100%"></table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="priceModal" tabindex="-1" role="dialog" aria-labelledby="priceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-center">
                    <h5 class="modal-title text-white">Ajouter des prix</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <form id="priceForm" autocomplete="off">
                    @csrf
                    <div class="modal-body" style="max-height:400px;overflow-y:auto">
                        <h6 class="mb-3">Saisir des prix pour : {{ $product->designation }}</h6>
                        <div class="form-row">
                            <div class="col-12 col-md-8 mb-3">
                                <label for="" class="text-dark">Type de prix</label>
                                <select name="priceType" id="priceType" class="form-control">
                                    <option value="">---  ---</option>
                                    <option value="client">Client</option>
                                    <option value="category">Catégorie de clients</option>
                                    <option value="supplier">Fournisseur</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4 mb-3">
                                <button class="btn btn-danger" type="button" id="btn_add_price_row" style="margin-top:33px">Ajouter</button>
                            </div>
                        </div>
                        <div id="priceRows"></div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="form" id="form" value="{{ $product->id }}" />
                        <input type="hidden" name="col" id="col" />
                        <button type="submit" class="btn btn-primary mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($product->_type == 'product' && $product->tracking == 'yes')
    <div class="modal fade" id="movementModal" tabindex="-1" role="dialog" aria-labelledby="movementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-center">
                    <h5 class="modal-title text-white">Nouveau movement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <form id="movementForm" autocomplete="off">
                    @csrf
                    <div class="modal-body" style="max-height:400px;overflow-y:auto">
                        <div class="form-row">
                            <div class="col-12 col-md-5 mb-3">
                                    <label for="" class="text-dark">Type</label>
                                    <select name="movementType" id="movementType" data-target="{{ $product->id }}" class="form-control">
                                        <option value="in">Augmentation</option>
                                        <option value="out">Diminution</option>
                                    </select>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                    <label for="" class="text-dark">Date</label>
                                    <input type="text" class="form-control datepicker" name="movementDate" id="movementDate" value="{{ date('d-m-Y') }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-4 mb-3">
                                    <label for="" class="text-dark">Qté actuelle</label>
                                    <input type="text" class="form-control text-right bg-white" readonly id="movementcurrentQuantity" />
                            </div>
                            <div class="col-12 col-md-4 mb-3">
                                    <label for="" class="text-dark">Qté opération</label>
                                    <input type="text" class="form-control text-right" name="movementQuantity" id="movementQuantity" value="0" />
                            </div>
                            <div class="col-12 col-md-4 mb-3">
                                    <label for="" class="text-dark">Nouvelle qté</label>
                                    <input type="text" class="form-control bg-white text-right" readonly id="movementnewQuantity" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                    <label for="" class="text-dark">Notes</label>
                                    <textarea class="form-control" name="movementNotes" rows="3" placeholder="Ajoutez une note ..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="form" id="form" value="{{ $product->id }}" />
                        <button type="submit" class="btn btn-primary mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

@endsection
