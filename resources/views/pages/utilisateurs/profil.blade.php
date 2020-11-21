@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">

                <div class="col-12 bg-white pt-3 pb-2 mt-3">
                    <h3 class="text-bold text-color-linna">Mon profil <button id="edit-profile-btn bs-tootip" title="Mettre à jour mon profil" type="button" class="btn btn-success btn-sm float-right"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg></button></h3>
                </div>

                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                                <div class="avatar avatar-xl">
                                    <span class="avatar-title rounded-circle">LS</span>
                                </div>
                                <div class="text-left"><button class="btn btn-primary btn-sm mt-2">Charger photo</button></div>

                                <div class="mt-4">
                                    <form action="">
                                        <div class="form-row">
                                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                <label for="">Nom</label>
                                                <input type="text" class="form-control" value="Soft">
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                <label for="">Prénom</label>
                                                <input type="text" class="form-control" value="Linna">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-md-8 mb-3">
                                                <label for="">Fonction</label>
                                                <input type="text" class="form-control" value="Manager">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-md-8 mb-3">
                                                <label for="">Téléphone</label>
                                                <input type="text" class="form-control" value="00000000">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-md-8 mb-3">
                                                <label for="">Email</label>
                                                <input type="text" readonly class="form-control" value="linna@email.com">
                                                <div id="change-email"></div>
                                                <button type="button" id="change-email-btn" data-target="display" class="btn-custom-light bg-white text-primary mt-2 btn-change-input text-underline">Changer l'adresse mail</button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-md-8 mb-3">
                                                <label for="">Mot de passe</label>
                                                <input type="password" id="currentPassword" readonly class="form-control" value="testtest">
                                                <div id="change-password"></div>
                                                <button type="button" id="change-password-btn" data-target="display" class="btn-custom-light bg-white text-primary mt-2 text-underline btn-change-input">Changer le mot de passe</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                        </div>
                    </div>
                </div>


    </div>
            
@endsection