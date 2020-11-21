@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">
    
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area animated-underline-content pb-4">  
                    <h5 class="text-bold mb-3">Liste des catégories</h5>
                    <div id="clients" class="mb-4">
                        <div class="col-12 rounded bg-info pt-3 pb-2">
                            <h6 class="text-white">Clients</h6>
                        </div>
                        <div id="clients_list" class="mt-2 pl-2"></div>
                        <button class="btn-custom-light bg-white text-info btn-add-category mt-3" id="clients"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Ajouter une catégorie</button>
                    </div>
                    <div id="products" class="mb-4">
                        <div class="col-12 rounded bg-info pt-3 pb-2">
                            <h6 class="text-white">Produits/Services</h6>
                        </div>
                        <div id="products_list" class="mt-2 pl-2"></div>
                        <button class="btn-custom-light bg-white text-info btn-add-category mt-3" id="products"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Ajouter une catégorie</button>
                    </div>
                </div>         
            </div>
        </div>  

    </div>

@endsection