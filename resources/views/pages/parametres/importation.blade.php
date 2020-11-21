@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">
    
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                        <h3>Importer des {{ request()->type }}</h3>
                        <h6>Suivez les étapes suivantes ...</h6>
                        <!--
                        <div id="stepperForm" class="bs-stepper">
                            <div class="bs-stepper-header" role="tablist">
                                <div class="step" data-target="#test-form-1">
                                <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger1" aria-controls="test-form-1">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Télécharger</span>
                                </button>
                                </div>
                                <div class="bs-stepper-line"></div>
                                <div class="step" data-target="#test-form-2">
                                <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger2" aria-controls="test-form-2">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Mapper les données</span>
                                </button>
                                </div>
                                <div class="bs-stepper-line"></div>
                                <div class="step" data-target="#test-form-3">
                                <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger3" aria-controls="test-form-3">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Importer</span>
                                </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                
                                <div id="test-form-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger1">
                                    <h4 class="text-bold mb-4">Sélectionnez un fichier CSV ou Excel à importer</h4>
                                    <div class="custom-file-container" data-upload-id="myFirstImage">
                                        <label class="custom-file-container__custom-file" >
                                            <input type="file" class="custom-file-container__custom-file__custom-file-input border" accept=".csv, .xls, .xlsx" id="file_to_upload" name="file_to_upload" dataType="{{ request()->type }}">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                    </div>
                                    <div class="" id="div_file_to_upload"></div>
                                    <a href="/" class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Télécharger le modèle Linnasoft</a><br>
                                    <button class="btn btn-primary btn-next-form rounded-pill mt-4 float-right" id="1">Suivant <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></button>
                                </div>
                                <div id="test-form-2" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger2">
                                    <div class="">
                                        
                                    </div>
                                    <button class="btn btn-primary rounded-pill btn-next-form float-right">Suivant <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></button>
                                    <button class="btn btn-primary rounded-pill btn-previous-form float-right"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg> Précédent</button>
                                </div>
                                <div id="test-form-3" role="tabpanel" class="bs-stepper-pane fade text-center" aria-labelledby="stepperFormTrigger3">
                                    <button class="btn btn-primary rounded-pill btn-import float-right"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Importer</button>
                                    <button class="btn btn-primary rounded-pill btn-previous-form float-right"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg> Précédent</button>
                                </div>
                            </div>
                        </div>
                        -->
                        <div class="mt-5">
                            <div class="mb-4 border-bottom pb-3">
                                <h6 class="text-bold">Etape 1 : Téléchargez le modèle Linnasoft</h6>
                                <p class="mt-3">Pour commencer, téléchargez notre modèle EXCEL configuré pour importer vos données dans l'application Linnasoft.</p>
                                <a href="" class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Télécharger le modèle</a>
                            </div>
                            <div class="mb-4 border-bottom pb-3">
                                <h6 class="text-bold">Etape 2 : Copiez vos {{ request()->type }} dans le modèle</h6>
                                <p class="mt-3">
                                    Ouvrez le modèle avec Microsoft Excel, copiez ensuite vos données dans le tableur.
                                </p>
                                <p class="text-danger"><b>Important :</b> si vos données contiennent des en-têtes, retirez les et gardez uniquement les en-têtes du modèle.</p>
                            </div>
                            <div class="mb-4 border-bottom pb-3">
                                <h6 class="text-bold">Etape 3 : Chargez le modèle contenant vos {{ request()->type }}</h6>
                                <p class="mt-3">
                                    <form id="uploadForm" enctype="multipart/form-data">
                                    @csrf
                                        <div class="custom-file-container" data-upload-id="myFirstImage">
                                            <label class="custom-file-container__custom-file" >
                                                <input type="file" class="custom-file-container__custom-file__custom-file-input border" accept=".csv, .xls, .xlsx" id="file_to_upload" name="file_to_upload" dataType="{{ request()->type }}" targetURL="import{{ request()->type }}">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                        </div>
                                        <div id="div_file_to_upload"></div>
                                    </form>
                                </p>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary" type='button' id="btn-make-import">Importer</button>
                                <button class="btn btn-light" type="button" id="btn-cancel-import">Annuler</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </div>

@endsection