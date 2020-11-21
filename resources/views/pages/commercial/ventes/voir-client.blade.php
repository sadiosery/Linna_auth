@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="statbox border-0 widget box box-shadow">
                    <div class="widget-content widget-content-area mb-2 rounded-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 text-lg-left text-center">
                                <h4 class=""><b>{{ $client->_name }}</b> 
                                    <div class="btn-group no-hide" role="group">
                                        <button id="btn_upload_file" target="{{ $client->id }}" class="position-relative dropdown-toggle btn-custom-light bg-gray border rounded pt-1 pb-1 pl-2 pr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> <span class="badge badge-info counter" id="counter_files"></span></button> 

                                        <div class="dropdown-menu shadow-lg" aria-labelledby="btn_upload_file" style="width:500px;">
                                            <div id="errorContent"></div>
                                            <div id="fileuploadContent"></div>
                                            <div class="">
                                                <input type="file" name="clientFile" id="clientFile" class="input_file_to_hide" data-target="{{ $client->id }}" accept=".csv, .xls, .xlsx, .xlsm, .jpg, .jpeg, .txt, .odt, .gif, .png, .pdf, .doc, .docx, .ppt, .pptx, .odf, .ods, .rtf" />
                                                <label for="clientFile" class="btn btn-block shadow filelab bg-gray text-primary border rounded" id="btn_upload_file"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#ffffff" stroke="#1b55e2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg> Ajouter un fichier</label>
                                            </div>
                                        </div>
                                    </div>                 
                                </h4>
                                <span class=""><b>Créé le {{ returnDate(substr($client->created_at,0,10)) }} à {{ substr($client->created_at,11,5) }}</b></span>
                            </div>
                            <div class="col-12 col-lg-6 text-lg-right text-center">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <tbody>
                                            <tr>
                                                <td>EN COURS</td>
                                                <td class="text-warning pt-3"><h6><b>100 000,00</b> CFA</h6></td>
                                            </tr>
                                            <tr>
                                                <td>EN RETARD</td>
                                                <td class="text-danger pt-3"><h6><b>100 000,00</b> CFA</h6></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="widget-content widget-content-area rounded-0 mb-2">
                                    <div id="iconsAccordion" class="accordion-icons">
                                        <div class="card">
                                            <div class="card-header" id="headingOne3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#iconAccordionOne" aria-expanded="true" aria-controls="iconAccordionOne">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></div>
                                                        Contacts  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>
                                            <div id="iconAccordionOne" class="collapse show" aria-labelledby="headingOne3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover table-sm">
                                                            <tr>
                                                                <td>Téléphone 1</td>
                                                                <td class="text-dark">{{ $client->tel1 }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Téléphone 2</td>
                                                                <td class="text-dark">{{ $client->tel2 }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Adresse mail</td>
                                                                <td class="text-dark">{{ $client->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Site web</td>
                                                                <td class="text-dark">{{ $client->website }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Adresse</td>
                                                                <td class="text-dark">{{ $client->address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ville</td>
                                                                <td class="text-dark">{{ $client->city }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pays</td>
                                                                <td class="text-dark">{{ $client->country }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Commune</td>
                                                                <td class="text-dark">{{ $client->township }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quartier</td>
                                                                <td class="text-dark">{{ $client->_district }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo3">
                                                <section class="mb-0 mt-0">
                                                    <div role="menu" class="collapsed" data-toggle="collapse" data-target="#iconAccordionTwo" aria-expanded="false" aria-controls="iconAccordionTwo">
                                                        <div class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg></div>
                                                        Infos commerciales/financières  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                    </div>
                                                </section>
                                            </div>
                                            <div id="iconAccordionTwo" class="collapse" aria-labelledby="headingTwo3" data-parent="#iconsAccordion">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-sm table-hover table-bordered">
                                                            <tr>
                                                                <td>Code</td>
                                                                <td class="text-dark">{{ $client->code }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Catégorie</td>
                                                                <td class="text-dark">{{ $checkedCategory }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Notes</td>
                                                                <td class="text-dark">{{ $client->notes }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Conditions</td>
                                                                <td class="text-dark">{{ $client->conditions }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mode de règlement</td>
                                                                <td class="text-dark">{{ $client->payment_mode }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>E-document</td>
                                                                <td>{!! getEdocument($client->e_document) !!}</td>
                                                            </tr> 
                                                            <tr>
                                                                <td>N° d'immatriculation</td>
                                                                <td class="text-dark">{{ $client->legal_id }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Banque</td>
                                                                <td class="text-dark">{{ $client->bank_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>N° de compte</td>
                                                                <td class="text-dark">{{ $client->bank_account }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="widget-content widget-content-area rounded-0 mb-2">
                                <div class="mb-3 border rounded p-3">
                                    <h6><b>Récentes opérations - 30 derniers jours</b></h6>
                                    <ul class="nav nav-tabs nav-fill mb-3 mt-3" id="borderTop" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="border-top-orders-tab" data-toggle="tab" href="#border-top-orders" role="tab" aria-controls="border-top-orders" aria-selected="false">Commandes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="border-top-sales-tab" data-toggle="tab" href="#border-top-sales" role="tab" aria-controls="border-top-sales" aria-selected="false">Ventes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="border-top-credits-tab" data-toggle="tab" href="#border-top-credits" role="tab" aria-controls="border-top-credits" aria-selected="false">Avoirs</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="borderTopContent">
                                        <div class="tab-pane fade" id="border-top-credits" role="tabpanel" aria-labelledby="border-top-credits-tab">
                                            avoir - Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi quibusdam at consectetur earum saepe, alias, neque dicta iste tempora molestias odio illo nemo, suscipit accusamus laboriosam assumenda quaerat hic voluptate.
                                        </div>
                                        <div class="tab-pane fade show active" id="border-top-orders" role="tabpanel" aria-labelledby="border-top-orders-tab">
                                            commandes - Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, reiciendis officia voluptas eum alias animi qui! Explicabo fugit nihil, odio esse eveniet error aliquid autem ipsum blanditiis ullam maxime numquam.
                                        </div>
                                        <div class="tab-pane fade" id="border-top-sales" role="tabpanel" aria-labelledby="border-top-sales-tab">
                                            ventes - Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem, eius rem sit aut, totam veniam vel explicabo esse quibusdam itaque accusamus eaque natus! Tenetur vero reprehenderit at doloremque veritatis itaque.
                                        </div>
                                    </div>
                                </div>
                                <div class="border p-3 rounded">
                                    <h6><b>Activité</b></h6>
                                    <ul class="nav nav-tabs nav-fill mb-3 mt-3" id="borderTop" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="border-top-currentYear-tab" data-toggle="tab" href="#border-top-currentYear" role="tab" aria-controls="border-top-currentYear" aria-selected="false" style="color:#003B5B">Année en cours</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="border-top-totalYear-tab" data-toggle="tab" href="#border-top-totalYear" role="tab" aria-controls="border-top-totalYear" aria-selected="false" style="color:#003B5B">Depuis 2015</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="borderTopContent">
                                        <div class="tab-pane fade show active" id="border-top-currentYear" role="tabpanel" aria-labelledby="border-top-currentYear-tab">
                                            <div id="chart"></div>
                                        </div>
                                        <div class="tab-pane fade" id="border-top-totalYear" role="tabpanel" aria-labelledby="border-top-totalYear-tab">
                                            total - Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, reiciendis officia voluptas eum alias animi qui! Explicabo fugit nihil, odio esse eveniet error aliquid autem ipsum blanditiis ullam maxime numquam.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area rounded-0 mb-2">
                                <h6><b>Prévisions de ventes</b></h6>
                                <div class="col-12 p-3 bg-gray text-dark text-center rounded">
                                    Aucune prévision faite pour ce client !
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
