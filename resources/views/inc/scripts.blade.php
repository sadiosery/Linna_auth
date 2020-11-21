<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script> 

@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')
<script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/fusioncharts.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/fusioncharts.charts.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/themes/fusioncharts.theme.fusion.js') }}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{asset('plugins/highlight/highlight.pack.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
@endif
<script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{asset('assets/js/elements/tooltip.js')}}"></script>
<script src="{{asset('plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{asset('plugins/input-mask/input-mask.js')}}"></script>
<script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
<script src="{{asset('assets/js/special.js')}}"></script>

<script>var _token   = $('meta[name="csrf-token"]').attr('content');</script>
<script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
<script src="{{asset('assets/js/components/notification/custom-snackbar.js')}}"></script>
<script src="{{asset('assets/js/components/ui-accordions.js')}}"></script>

<script>
        $(document).ready(function(){
          /******************************* filter list *****************************/
            var show_filter = 0;
            $(document).on('click', '#btn-show-filter', function(){
                if(show_filter == 0)
                {
                  $('#filter_content').html('<div class="col-12 bg-white pt-2 pb-2"><div class="row"><div class="col-12 col-md-3 mb-2"><label for="">Période</label><select name="" id="" class="form-control"><option value="">Toutes les dates</option><option value="">Aujourd\'hui</option><option value="">Ce mois</option><option value="">Ce trimestre</option><option value="">Cette année</option><option value="">Le mois dernier</option><option value="">L\'année dernière</option><option value="">Personnaliser</option></select></div><div class="col-12 col-md-3 mb-2"><label for="">Du</label><input type="text" class="form-control" id="start" name="start" /></div><div class="col-12 col-md-3 mb-2"><label for="">Au</label><input type="text" class="form-control" id="end" name="end" /></div><div class="col-12 col-md-3 mb-2"><label for="">Statut</label><select class="form-control" id="statut" name="statut"><option value="tous">Toutes les factures</option><option value="solde">Solde</option><option value="partiel">Partiellement réglée</option><option value="retard">En retard</option></select></div></div><div class="mt-3 text-right"><button class="btn btn-primary rounded-pill" type="button" id="btn-apply-filter">Appliquer</button></div></div>');
                  show_filter++;
                }
                else{
                  $('#filter_content').empty();
                  show_filter--;
                }
            });
        });
        
        function callBasicDataTable()
        {
            $("#table-no-config").DataTable().destroy();
            var table_basic = $('#table-no-config').DataTable({
                "lengthMenu": [ 25, 50, 75, 100 ],
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Page _PAGE_ sur _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sEmptyTable": "Aucune donnée disponible dans le tableau",
                    "sInfoEmpty":      "Page 0 sur 0",
                    "sSearchPlaceholder": "Recherche...",
                    "sLengthMenu": "Resultats :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7 
            });
        }

        function callTransactionsDataTable()
        {
            $("#table").DataTable().destroy();
            var table = $('#table').DataTable({
            "lengthMenu": [ 25, 50, 75, 100 ],
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    "visible": false,
                },
                {
                    "targets": [ 4 ],
                    "visible": false
                },
                {
                    "targets": [ 6 ],
                    "visible": false
                },
                {
                    "targets": [ 8 ],
                    "visible": false
                },
                {
                    "targets": [ 9 ],
                    "visible": false
                },
                {
                    "targets": [ 10 ],
                    "visible": false
                }
            ],
            dom: 'Bfrtip',
            buttons: [
                                {
                                    extend : 'colvis',
                                    text : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>',
                                    className: 'dt-button rounded',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                {
                                    extend : 'excel',
                                    text : '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" fill="#000000" width="24" height="24" stroke="currentColor" stroke-width="2"><g><g><path d="M439.658,91.21L351.435,2.987C349.522,1.075,346.928,0,344.223,0H79.554c-5.633,0-10.199,4.566-10.199,10.199v491.602c0,5.633,4.566,10.199,10.199,10.199h352.892c5.632,0,10.199-4.566,10.199-10.199V98.422C442.645,95.717,441.57,93.123,439.658,91.21z M354.422,34.823l53.401,53.4h-53.401V34.823z M422.247,491.602H89.753V20.398h244.271v78.024c0,5.633,4.567,10.199,10.199,10.199h78.024V491.602z"/></g></g><g><g><path d="M282.012,454.884H119.331c-5.633,0-10.199,4.566-10.199,10.199s4.566,10.199,10.199,10.199h162.681c5.632,0,10.199-4.566,10.199-10.199S287.644,454.884,282.012,454.884z"/></g></g><g><g><path d="M334.026,454.884h-11.067c-5.632,0-10.199,4.566-10.199,10.199s4.567,10.199,10.199,10.199h11.067c5.632,0,10.199-4.566,10.199-10.199S339.658,454.884,334.026,454.884z"/></g></g><g><g><path d="M311.6,263.139l75.737-93.534c2.473-3.056,2.972-7.261,1.278-10.809c-1.692-3.549-5.274-5.808-9.205-5.808h-84.952c-3.078,0-5.99,1.389-7.926,3.781L256,194.475l-30.532-37.706c-1.936-2.392-4.849-3.781-7.926-3.781H132.59c-3.931,0-7.513,2.259-9.206,5.808c-1.693,3.548-1.194,7.754,1.279,10.809l75.737,93.534l-75.737,93.534c-2.474,3.056-2.972,7.261-1.279,10.809c1.693,3.548,5.274,5.808,9.206,5.808h84.952c3.077,0,5.99-1.389,7.926-3.781L256,331.804l30.531,37.706c1.936,2.392,4.849,3.781,7.926,3.781h84.953c3.931,0,7.513-2.259,9.205-5.808c1.693-3.548,1.195-7.754-1.279-10.809L311.6,263.139z M299.323,173.386h58.706l-59.553,73.545l-29.352-36.25L299.323,173.386zM212.677,352.892h-58.706l59.552-73.545l29.352,36.25L212.677,352.892z M299.323,352.892L153.971,173.386h58.706l145.351,179.506H299.323z"/></g></g></svg>',
                                    className: 'dt-button rounded',
                                    filename: 'transactions_'+$('#filter_date_start').val()+'_'+$('#filter_date_end').val(),
                                    title: 'Transactions entre le : "'+$('#filter_date_start').val()+'" et le "'+$('#filter_date_end').val()+'"',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                {
                                    extend : 'print',
                                    text : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>',
                                    className: 'dt-button rounded',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                {
                                    extend : 'csv',
                                    text : '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 548.29 548.291" fill="#000000" stroke="currentColor" stroke-width="2"><g><path d="M486.2,196.121h-13.164V132.59c0-0.399-0.064-0.795-0.116-1.2c-0.021-2.52-0.824-5-2.551-6.96L364.656,3.677c-0.031-0.034-0.064-0.044-0.085-0.075c-0.629-0.707-1.364-1.292-2.141-1.796c-0.231-0.157-0.462-0.286-0.704-0.419c-0.672-0.365-1.386-0.672-2.121-0.893c-0.199-0.052-0.377-0.134-0.576-0.188C358.229,0.118,357.4,0,356.562,0H96.757C84.893,0,75.256,9.649,75.256,21.502v174.613H62.093c-16.972,0-30.733,13.756-30.733,30.73v159.81c0,16.966,13.761,30.736,30.733,30.736h13.163V526.79c0,11.854,9.637,21.501,21.501,21.501h354.777c11.853,0,21.502-9.647,21.502-21.501V417.392H486.2c16.966,0,30.729-13.764,30.729-30.731v-159.81C516.93,209.872,503.166,196.121,486.2,196.121z M96.757,21.502h249.053v110.006c0,5.94,4.818,10.751,10.751,10.751h94.973v53.861H96.757V21.502z M258.618,313.18c-26.68-9.291-44.063-24.053-44.063-47.389c0-27.404,22.861-48.368,60.733-48.368c18.107,0,31.447,3.811,40.968,8.107l-8.09,29.3c-6.43-3.107-17.862-7.632-33.59-7.632c-15.717,0-23.339,7.149-23.339,15.485c0,10.247,9.047,14.769,29.78,22.632c28.341,10.479,41.681,25.239,41.681,47.874c0,26.909-20.721,49.786-64.792,49.786c-18.338,0-36.449-4.776-45.497-9.77l7.38-30.016c9.772,5.014,24.775,10.006,40.264,10.006c16.671,0,25.488-6.908,25.488-17.396C285.536,325.789,277.909,320.078,258.618,313.18z M69.474,302.692c0-54.781,39.074-85.269,87.654-85.269c18.822,0,33.113,3.811,39.549,7.149l-7.392,28.816c-7.38-3.084-17.632-5.939-30.491-5.939c-28.822,0-51.206,17.375-51.206,53.099c0,32.158,19.051,52.4,51.456,52.4c10.947,0,23.097-2.378,30.241-5.238l5.483,28.346c-6.672,3.34-21.674,6.919-41.208,6.919C98.06,382.976,69.474,348.424,69.474,302.692z M451.534,520.962H96.757v-103.57h354.777V520.962z M427.518,380.583h-42.399l-51.45-160.536h39.787l19.526,67.894c5.479,19.046,10.479,37.386,14.299,57.397h0.709c4.048-19.298,9.045-38.352,14.526-56.693l20.487-68.598h38.599L427.518,380.583z"/></g></svg>',
                                    className: 'dt-button rounded',
                                    filename: 'transactions_'+$('#filter_date_start').val()+'_'+$('#filter_date_end').val(),
                                    title: 'Transactions entre le : "'+$('#filter_date_start').val()+'" et le "'+$('#filter_date_end').val()+'"',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                { 
                                    extend: 'pdf', className: 'dt-button rounded', text: '<svg id="Capa_1" enable-background="new 0 0 512 512" fill="#000000" height="24" viewBox="0 0 512 512" width="24" xmlns="http://www.w3.org/2000/svg"><g><path d="m127.741 209h-31.741c-3.986 0-7.809 1.587-10.624 4.41s-4.389 6.651-4.376 10.638l.221 113.945c0 8.284 6.716 15 15 15s15-6.716 15-15v-34.597c6.133-.031 12.685-.058 16.52-.058 26.356 0 47.799-21.16 47.799-47.169s-21.443-47.169-47.799-47.169zm0 64.338c-3.869 0-10.445.027-16.602.059-.032-6.386-.06-13.263-.06-17.228 0-3.393-.017-10.494-.035-17.169h16.696c9.648 0 17.799 7.862 17.799 17.169s-8.15 17.169-17.798 17.169z"/><path d="m255.33 209h-31.33c-3.983 0-7.803 1.584-10.617 4.403s-4.391 6.642-4.383 10.625c0 .001.223 110.246.224 110.646.015 3.979 1.609 7.789 4.433 10.592 2.811 2.79 6.609 4.354 10.567 4.354h.057c.947-.004 23.294-.089 32.228-.245 33.894-.592 58.494-30.059 58.494-70.065-.001-42.054-23.981-70.31-59.673-70.31zm.655 110.38c-3.885.068-10.569.123-16.811.163-.042-13.029-.124-67.003-.147-80.543h16.303c27.533 0 29.672 30.854 29.672 40.311 0 19.692-8.972 39.719-29.017 40.069z"/><path d="m413.863 237.842c8.284 0 15-6.716 15-15s-6.716-15-15-15h-45.863c-8.284 0-15 6.716-15 15v113.158c0 8.284 6.716 15 15 15s15-6.716 15-15v-42.65h27.22c8.284 0 15-6.716 15-15s-6.716-15-15-15h-27.22v-25.508z"/><path d="m458 145h-11v-4.279c0-19.282-7.306-37.607-20.572-51.601l-62.305-65.721c-14.098-14.87-33.936-23.399-54.428-23.399h-199.695c-24.813 0-45 20.187-45 45v100h-11c-24.813 0-45 20.187-45 45v180c0 24.813 20.187 45 45 45h11v52c0 24.813 20.187 45 45 45h292c24.813 0 45-20.187 45-45v-52h11c24.813 0 45-20.187 45-45v-180c0-24.813-20.187-45-45-45zm-363-100c0-8.271 6.729-15 15-15h199.695c12.295 0 24.198 5.117 32.657 14.04l62.305 65.721c7.96 8.396 12.343 19.391 12.343 30.96v4.279h-322zm322 422c0 8.271-6.729 15-15 15h-292c-8.271 0-15-6.729-15-15v-52h322zm56-97c0 8.271-6.729 15-15 15h-404c-8.271 0-15-6.729-15-15v-180c0-8.271 6.729-15 15-15h404c8.271 0 15 6.729 15 15z"/></g></svg>',
                                    filename: 'transactions_'+$('#filter_date_start').val()+'_'+$('#filter_date_end').val(),
                                    title: 'Transactions entre le : "'+$('#filter_date_start').val()+'" et le "'+$('#filter_date_end').val()+'"',
                                    orientation: 'landscape',
                                    customize: function (doc) {
                                        doc.content[1].table.widths = 
                                            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                                    },
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                }
            ],
            "language": {
                "lengthMenu": "Résultats : _MENU_",
                "zeroRecords": "Aucune donnée disponible",
                "info": "Page _PAGE_ sur _PAGES_",
                "infoEmpty": "0 sur 0",
                "infoFiltered": "(filtre sur _MAX_ éléments)",
                "loadingRecords": "Chargement des données ...",
                "search":         "",
                "searchPlaceholder": "Recherche ...",
                "paginate": {
                    "next":       "Suivant",
                    "previous":   "Précédent"
                }
            }
            });
        }

        function callThDataTable()
        {
            $("#table").DataTable().destroy();
            var table = $('#table').DataTable({
                "lengthMenu": [ 15, 50, 75, 100 ],
                dom: 'Bfrtip',
                buttons: [
                                {
                                    extend : 'colvis',
                                    text : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>',
                                    className: 'dt-button rounded'
                                },
                                {
                                    extend : 'excel',
                                    text : '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" fill="#000000" width="24" height="24" stroke="currentColor" stroke-width="2"><g><g><path d="M439.658,91.21L351.435,2.987C349.522,1.075,346.928,0,344.223,0H79.554c-5.633,0-10.199,4.566-10.199,10.199v491.602c0,5.633,4.566,10.199,10.199,10.199h352.892c5.632,0,10.199-4.566,10.199-10.199V98.422C442.645,95.717,441.57,93.123,439.658,91.21z M354.422,34.823l53.401,53.4h-53.401V34.823z M422.247,491.602H89.753V20.398h244.271v78.024c0,5.633,4.567,10.199,10.199,10.199h78.024V491.602z"/></g></g><g><g><path d="M282.012,454.884H119.331c-5.633,0-10.199,4.566-10.199,10.199s4.566,10.199,10.199,10.199h162.681c5.632,0,10.199-4.566,10.199-10.199S287.644,454.884,282.012,454.884z"/></g></g><g><g><path d="M334.026,454.884h-11.067c-5.632,0-10.199,4.566-10.199,10.199s4.567,10.199,10.199,10.199h11.067c5.632,0,10.199-4.566,10.199-10.199S339.658,454.884,334.026,454.884z"/></g></g><g><g><path d="M311.6,263.139l75.737-93.534c2.473-3.056,2.972-7.261,1.278-10.809c-1.692-3.549-5.274-5.808-9.205-5.808h-84.952c-3.078,0-5.99,1.389-7.926,3.781L256,194.475l-30.532-37.706c-1.936-2.392-4.849-3.781-7.926-3.781H132.59c-3.931,0-7.513,2.259-9.206,5.808c-1.693,3.548-1.194,7.754,1.279,10.809l75.737,93.534l-75.737,93.534c-2.474,3.056-2.972,7.261-1.279,10.809c1.693,3.548,5.274,5.808,9.206,5.808h84.952c3.077,0,5.99-1.389,7.926-3.781L256,331.804l30.531,37.706c1.936,2.392,4.849,3.781,7.926,3.781h84.953c3.931,0,7.513-2.259,9.205-5.808c1.693-3.548,1.195-7.754-1.279-10.809L311.6,263.139z M299.323,173.386h58.706l-59.553,73.545l-29.352-36.25L299.323,173.386zM212.677,352.892h-58.706l59.552-73.545l29.352,36.25L212.677,352.892z M299.323,352.892L153.971,173.386h58.706l145.351,179.506H299.323z"/></g></g></svg>',
                                    className: 'dt-button rounded',
                                    filename: $('#accounts_title').text(),
                                    title: $('#accounts_title').text(),
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                {
                                    extend : 'print',
                                    text : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>',
                                    className: 'dt-button rounded',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                {
                                    extend : 'csv',
                                    text : '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 548.29 548.291" fill="#000000" stroke="currentColor" stroke-width="2"><g><path d="M486.2,196.121h-13.164V132.59c0-0.399-0.064-0.795-0.116-1.2c-0.021-2.52-0.824-5-2.551-6.96L364.656,3.677c-0.031-0.034-0.064-0.044-0.085-0.075c-0.629-0.707-1.364-1.292-2.141-1.796c-0.231-0.157-0.462-0.286-0.704-0.419c-0.672-0.365-1.386-0.672-2.121-0.893c-0.199-0.052-0.377-0.134-0.576-0.188C358.229,0.118,357.4,0,356.562,0H96.757C84.893,0,75.256,9.649,75.256,21.502v174.613H62.093c-16.972,0-30.733,13.756-30.733,30.73v159.81c0,16.966,13.761,30.736,30.733,30.736h13.163V526.79c0,11.854,9.637,21.501,21.501,21.501h354.777c11.853,0,21.502-9.647,21.502-21.501V417.392H486.2c16.966,0,30.729-13.764,30.729-30.731v-159.81C516.93,209.872,503.166,196.121,486.2,196.121z M96.757,21.502h249.053v110.006c0,5.94,4.818,10.751,10.751,10.751h94.973v53.861H96.757V21.502z M258.618,313.18c-26.68-9.291-44.063-24.053-44.063-47.389c0-27.404,22.861-48.368,60.733-48.368c18.107,0,31.447,3.811,40.968,8.107l-8.09,29.3c-6.43-3.107-17.862-7.632-33.59-7.632c-15.717,0-23.339,7.149-23.339,15.485c0,10.247,9.047,14.769,29.78,22.632c28.341,10.479,41.681,25.239,41.681,47.874c0,26.909-20.721,49.786-64.792,49.786c-18.338,0-36.449-4.776-45.497-9.77l7.38-30.016c9.772,5.014,24.775,10.006,40.264,10.006c16.671,0,25.488-6.908,25.488-17.396C285.536,325.789,277.909,320.078,258.618,313.18z M69.474,302.692c0-54.781,39.074-85.269,87.654-85.269c18.822,0,33.113,3.811,39.549,7.149l-7.392,28.816c-7.38-3.084-17.632-5.939-30.491-5.939c-28.822,0-51.206,17.375-51.206,53.099c0,32.158,19.051,52.4,51.456,52.4c10.947,0,23.097-2.378,30.241-5.238l5.483,28.346c-6.672,3.34-21.674,6.919-41.208,6.919C98.06,382.976,69.474,348.424,69.474,302.692z M451.534,520.962H96.757v-103.57h354.777V520.962z M427.518,380.583h-42.399l-51.45-160.536h39.787l19.526,67.894c5.479,19.046,10.479,37.386,14.299,57.397h0.709c4.048-19.298,9.045-38.352,14.526-56.693l20.487-68.598h38.599L427.518,380.583z"/></g></svg>',
                                    className: 'dt-button rounded',
                                    filename: $('#accounts_title').text(),
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                { 
                                    extend: 'pdf', className: 'dt-button rounded', text: '<svg id="Capa_1" enable-background="new 0 0 512 512" fill="#000000" height="24" viewBox="0 0 512 512" width="24" xmlns="http://www.w3.org/2000/svg"><g><path d="m127.741 209h-31.741c-3.986 0-7.809 1.587-10.624 4.41s-4.389 6.651-4.376 10.638l.221 113.945c0 8.284 6.716 15 15 15s15-6.716 15-15v-34.597c6.133-.031 12.685-.058 16.52-.058 26.356 0 47.799-21.16 47.799-47.169s-21.443-47.169-47.799-47.169zm0 64.338c-3.869 0-10.445.027-16.602.059-.032-6.386-.06-13.263-.06-17.228 0-3.393-.017-10.494-.035-17.169h16.696c9.648 0 17.799 7.862 17.799 17.169s-8.15 17.169-17.798 17.169z"/><path d="m255.33 209h-31.33c-3.983 0-7.803 1.584-10.617 4.403s-4.391 6.642-4.383 10.625c0 .001.223 110.246.224 110.646.015 3.979 1.609 7.789 4.433 10.592 2.811 2.79 6.609 4.354 10.567 4.354h.057c.947-.004 23.294-.089 32.228-.245 33.894-.592 58.494-30.059 58.494-70.065-.001-42.054-23.981-70.31-59.673-70.31zm.655 110.38c-3.885.068-10.569.123-16.811.163-.042-13.029-.124-67.003-.147-80.543h16.303c27.533 0 29.672 30.854 29.672 40.311 0 19.692-8.972 39.719-29.017 40.069z"/><path d="m413.863 237.842c8.284 0 15-6.716 15-15s-6.716-15-15-15h-45.863c-8.284 0-15 6.716-15 15v113.158c0 8.284 6.716 15 15 15s15-6.716 15-15v-42.65h27.22c8.284 0 15-6.716 15-15s-6.716-15-15-15h-27.22v-25.508z"/><path d="m458 145h-11v-4.279c0-19.282-7.306-37.607-20.572-51.601l-62.305-65.721c-14.098-14.87-33.936-23.399-54.428-23.399h-199.695c-24.813 0-45 20.187-45 45v100h-11c-24.813 0-45 20.187-45 45v180c0 24.813 20.187 45 45 45h11v52c0 24.813 20.187 45 45 45h292c24.813 0 45-20.187 45-45v-52h11c24.813 0 45-20.187 45-45v-180c0-24.813-20.187-45-45-45zm-363-100c0-8.271 6.729-15 15-15h199.695c12.295 0 24.198 5.117 32.657 14.04l62.305 65.721c7.96 8.396 12.343 19.391 12.343 30.96v4.279h-322zm322 422c0 8.271-6.729 15-15 15h-292c-8.271 0-15-6.729-15-15v-52h322zm56-97c0 8.271-6.729 15-15 15h-404c-8.271 0-15-6.729-15-15v-180c0-8.271 6.729-15 15-15h404c8.271 0 15 6.729 15 15z"/></g></svg>',
                                    filename: $('#accounts_title').text(),
                                    title: $('#accounts_title').text(),
                                    customize: function (doc) {
                                        doc.content[1].table.widths = 
                                            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                                    },
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                }
                ],
                "language": {
                                "lengthMenu": "Résultats : _MENU_",
                                "zeroRecords": "Aucune donnée disponible",
                                "info": "Page _PAGE_ sur _PAGES_",
                                "infoEmpty": "0 sur 0",
                                "infoFiltered": "(filtre sur _MAX_ éléments)",
                                "loadingRecords": "Chargement des données ...",
                                "search":         "",
                                "searchPlaceholder": "Recherche ...",
                                "paginate": {
                                    "next":       "Suivant",
                                    "previous":   "Précédent"
                                }
                }
            });
        }

        function callProductDataTable()
        {
            $("#table").DataTable().destroy();
            var table = $('#table').DataTable({
                "lengthMenu": [ 15, 50, 75, 100 ],
                "columnDefs": [
                    {
                        "targets": [ 7 ],
                        "visible": false
                    },
                    {
                        "targets": [ 8 ],
                        "visible": false
                    },
                    {
                        "targets": [ 5 ],
                        "visible": false
                    }
                ],
                dom: 'Bfrtip',
                buttons: [
                                {
                                    extend : 'colvis',
                                    text : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>',
                                    className: 'dt-button rounded'
                                },
                                {
                                    extend : 'excel',
                                    text : '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" fill="#000000" width="24" height="24" stroke="currentColor" stroke-width="2"><g><g><path d="M439.658,91.21L351.435,2.987C349.522,1.075,346.928,0,344.223,0H79.554c-5.633,0-10.199,4.566-10.199,10.199v491.602c0,5.633,4.566,10.199,10.199,10.199h352.892c5.632,0,10.199-4.566,10.199-10.199V98.422C442.645,95.717,441.57,93.123,439.658,91.21z M354.422,34.823l53.401,53.4h-53.401V34.823z M422.247,491.602H89.753V20.398h244.271v78.024c0,5.633,4.567,10.199,10.199,10.199h78.024V491.602z"/></g></g><g><g><path d="M282.012,454.884H119.331c-5.633,0-10.199,4.566-10.199,10.199s4.566,10.199,10.199,10.199h162.681c5.632,0,10.199-4.566,10.199-10.199S287.644,454.884,282.012,454.884z"/></g></g><g><g><path d="M334.026,454.884h-11.067c-5.632,0-10.199,4.566-10.199,10.199s4.567,10.199,10.199,10.199h11.067c5.632,0,10.199-4.566,10.199-10.199S339.658,454.884,334.026,454.884z"/></g></g><g><g><path d="M311.6,263.139l75.737-93.534c2.473-3.056,2.972-7.261,1.278-10.809c-1.692-3.549-5.274-5.808-9.205-5.808h-84.952c-3.078,0-5.99,1.389-7.926,3.781L256,194.475l-30.532-37.706c-1.936-2.392-4.849-3.781-7.926-3.781H132.59c-3.931,0-7.513,2.259-9.206,5.808c-1.693,3.548-1.194,7.754,1.279,10.809l75.737,93.534l-75.737,93.534c-2.474,3.056-2.972,7.261-1.279,10.809c1.693,3.548,5.274,5.808,9.206,5.808h84.952c3.077,0,5.99-1.389,7.926-3.781L256,331.804l30.531,37.706c1.936,2.392,4.849,3.781,7.926,3.781h84.953c3.931,0,7.513-2.259,9.205-5.808c1.693-3.548,1.195-7.754-1.279-10.809L311.6,263.139z M299.323,173.386h58.706l-59.553,73.545l-29.352-36.25L299.323,173.386zM212.677,352.892h-58.706l59.552-73.545l29.352,36.25L212.677,352.892z M299.323,352.892L153.971,173.386h58.706l145.351,179.506H299.323z"/></g></g></svg>',
                                    className: 'dt-button rounded',
                                    filename: 'Liste des produits',
                                    title: 'Liste des produits',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                {
                                    extend : 'print',
                                    text : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>',
                                    className: 'dt-button rounded',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                {
                                    extend : 'csv',
                                    text : '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 548.29 548.291" fill="#000000" stroke="currentColor" stroke-width="2"><g><path d="M486.2,196.121h-13.164V132.59c0-0.399-0.064-0.795-0.116-1.2c-0.021-2.52-0.824-5-2.551-6.96L364.656,3.677c-0.031-0.034-0.064-0.044-0.085-0.075c-0.629-0.707-1.364-1.292-2.141-1.796c-0.231-0.157-0.462-0.286-0.704-0.419c-0.672-0.365-1.386-0.672-2.121-0.893c-0.199-0.052-0.377-0.134-0.576-0.188C358.229,0.118,357.4,0,356.562,0H96.757C84.893,0,75.256,9.649,75.256,21.502v174.613H62.093c-16.972,0-30.733,13.756-30.733,30.73v159.81c0,16.966,13.761,30.736,30.733,30.736h13.163V526.79c0,11.854,9.637,21.501,21.501,21.501h354.777c11.853,0,21.502-9.647,21.502-21.501V417.392H486.2c16.966,0,30.729-13.764,30.729-30.731v-159.81C516.93,209.872,503.166,196.121,486.2,196.121z M96.757,21.502h249.053v110.006c0,5.94,4.818,10.751,10.751,10.751h94.973v53.861H96.757V21.502z M258.618,313.18c-26.68-9.291-44.063-24.053-44.063-47.389c0-27.404,22.861-48.368,60.733-48.368c18.107,0,31.447,3.811,40.968,8.107l-8.09,29.3c-6.43-3.107-17.862-7.632-33.59-7.632c-15.717,0-23.339,7.149-23.339,15.485c0,10.247,9.047,14.769,29.78,22.632c28.341,10.479,41.681,25.239,41.681,47.874c0,26.909-20.721,49.786-64.792,49.786c-18.338,0-36.449-4.776-45.497-9.77l7.38-30.016c9.772,5.014,24.775,10.006,40.264,10.006c16.671,0,25.488-6.908,25.488-17.396C285.536,325.789,277.909,320.078,258.618,313.18z M69.474,302.692c0-54.781,39.074-85.269,87.654-85.269c18.822,0,33.113,3.811,39.549,7.149l-7.392,28.816c-7.38-3.084-17.632-5.939-30.491-5.939c-28.822,0-51.206,17.375-51.206,53.099c0,32.158,19.051,52.4,51.456,52.4c10.947,0,23.097-2.378,30.241-5.238l5.483,28.346c-6.672,3.34-21.674,6.919-41.208,6.919C98.06,382.976,69.474,348.424,69.474,302.692z M451.534,520.962H96.757v-103.57h354.777V520.962z M427.518,380.583h-42.399l-51.45-160.536h39.787l19.526,67.894c5.479,19.046,10.479,37.386,14.299,57.397h0.709c4.048-19.298,9.045-38.352,14.526-56.693l20.487-68.598h38.599L427.518,380.583z"/></g></svg>',
                                    className: 'dt-button rounded',
                                    filename: 'Liste des produits',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                { 
                                    extend: 'pdf', className: 'dt-button rounded', text: '<svg id="Capa_1" enable-background="new 0 0 512 512" fill="#000000" height="24" viewBox="0 0 512 512" width="24" xmlns="http://www.w3.org/2000/svg"><g><path d="m127.741 209h-31.741c-3.986 0-7.809 1.587-10.624 4.41s-4.389 6.651-4.376 10.638l.221 113.945c0 8.284 6.716 15 15 15s15-6.716 15-15v-34.597c6.133-.031 12.685-.058 16.52-.058 26.356 0 47.799-21.16 47.799-47.169s-21.443-47.169-47.799-47.169zm0 64.338c-3.869 0-10.445.027-16.602.059-.032-6.386-.06-13.263-.06-17.228 0-3.393-.017-10.494-.035-17.169h16.696c9.648 0 17.799 7.862 17.799 17.169s-8.15 17.169-17.798 17.169z"/><path d="m255.33 209h-31.33c-3.983 0-7.803 1.584-10.617 4.403s-4.391 6.642-4.383 10.625c0 .001.223 110.246.224 110.646.015 3.979 1.609 7.789 4.433 10.592 2.811 2.79 6.609 4.354 10.567 4.354h.057c.947-.004 23.294-.089 32.228-.245 33.894-.592 58.494-30.059 58.494-70.065-.001-42.054-23.981-70.31-59.673-70.31zm.655 110.38c-3.885.068-10.569.123-16.811.163-.042-13.029-.124-67.003-.147-80.543h16.303c27.533 0 29.672 30.854 29.672 40.311 0 19.692-8.972 39.719-29.017 40.069z"/><path d="m413.863 237.842c8.284 0 15-6.716 15-15s-6.716-15-15-15h-45.863c-8.284 0-15 6.716-15 15v113.158c0 8.284 6.716 15 15 15s15-6.716 15-15v-42.65h27.22c8.284 0 15-6.716 15-15s-6.716-15-15-15h-27.22v-25.508z"/><path d="m458 145h-11v-4.279c0-19.282-7.306-37.607-20.572-51.601l-62.305-65.721c-14.098-14.87-33.936-23.399-54.428-23.399h-199.695c-24.813 0-45 20.187-45 45v100h-11c-24.813 0-45 20.187-45 45v180c0 24.813 20.187 45 45 45h11v52c0 24.813 20.187 45 45 45h292c24.813 0 45-20.187 45-45v-52h11c24.813 0 45-20.187 45-45v-180c0-24.813-20.187-45-45-45zm-363-100c0-8.271 6.729-15 15-15h199.695c12.295 0 24.198 5.117 32.657 14.04l62.305 65.721c7.96 8.396 12.343 19.391 12.343 30.96v4.279h-322zm322 422c0 8.271-6.729 15-15 15h-292c-8.271 0-15-6.729-15-15v-52h322zm56-97c0 8.271-6.729 15-15 15h-404c-8.271 0-15-6.729-15-15v-180c0-8.271 6.729-15 15-15h404c8.271 0 15 6.729 15 15z"/></g></svg>',
                                    filename: 'Liste des produits',
                                    title: 'Liste des produits',
                                    orientation: 'landscape',
                                    pageSize: 'LEGAL',
                                    customize: function (doc) {
                                        doc.content[1].table.widths = 
                                            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                                    },
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                }
                ],
                "language": {
                                "lengthMenu": "Résultats : _MENU_",
                                "zeroRecords": "Aucune donnée disponible",
                                "info": "Page _PAGE_ sur _PAGES_",
                                "infoEmpty": "0 sur 0",
                                "infoFiltered": "(filtre sur _MAX_ éléments)",
                                "loadingRecords": "Chargement des données ...",
                                "search":         "",
                                "searchPlaceholder": "Recherche ...",
                                "paginate": {
                                    "next":       "Suivant",
                                    "previous":   "Précédent"
                                }
                }
            });
        }

        function callRDataTable()
        {
            $("#table").DataTable().destroy();
            var table = $('#table').DataTable({
                "lengthMenu": [ 25, 50, 75, 100 ],
                dom: 'Bfrtip',
                buttons: [
                                {
                                    extend : 'excel',
                                    text : '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" fill="#000000" width="24" height="24" stroke="currentColor" stroke-width="2"><g><g><path d="M439.658,91.21L351.435,2.987C349.522,1.075,346.928,0,344.223,0H79.554c-5.633,0-10.199,4.566-10.199,10.199v491.602c0,5.633,4.566,10.199,10.199,10.199h352.892c5.632,0,10.199-4.566,10.199-10.199V98.422C442.645,95.717,441.57,93.123,439.658,91.21z M354.422,34.823l53.401,53.4h-53.401V34.823z M422.247,491.602H89.753V20.398h244.271v78.024c0,5.633,4.567,10.199,10.199,10.199h78.024V491.602z"/></g></g><g><g><path d="M282.012,454.884H119.331c-5.633,0-10.199,4.566-10.199,10.199s4.566,10.199,10.199,10.199h162.681c5.632,0,10.199-4.566,10.199-10.199S287.644,454.884,282.012,454.884z"/></g></g><g><g><path d="M334.026,454.884h-11.067c-5.632,0-10.199,4.566-10.199,10.199s4.567,10.199,10.199,10.199h11.067c5.632,0,10.199-4.566,10.199-10.199S339.658,454.884,334.026,454.884z"/></g></g><g><g><path d="M311.6,263.139l75.737-93.534c2.473-3.056,2.972-7.261,1.278-10.809c-1.692-3.549-5.274-5.808-9.205-5.808h-84.952c-3.078,0-5.99,1.389-7.926,3.781L256,194.475l-30.532-37.706c-1.936-2.392-4.849-3.781-7.926-3.781H132.59c-3.931,0-7.513,2.259-9.206,5.808c-1.693,3.548-1.194,7.754,1.279,10.809l75.737,93.534l-75.737,93.534c-2.474,3.056-2.972,7.261-1.279,10.809c1.693,3.548,5.274,5.808,9.206,5.808h84.952c3.077,0,5.99-1.389,7.926-3.781L256,331.804l30.531,37.706c1.936,2.392,4.849,3.781,7.926,3.781h84.953c3.931,0,7.513-2.259,9.205-5.808c1.693-3.548,1.195-7.754-1.279-10.809L311.6,263.139z M299.323,173.386h58.706l-59.553,73.545l-29.352-36.25L299.323,173.386zM212.677,352.892h-58.706l59.552-73.545l29.352,36.25L212.677,352.892z M299.323,352.892L153.971,173.386h58.706l145.351,179.506H299.323z"/></g></g></svg>',
                                    className: 'dt-button rounded',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                {
                                    extend : 'print',
                                    text : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>',
                                    className: 'dt-button rounded',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                }
                ],
                "language": {
                                "lengthMenu": "Résultats : _MENU_",
                                "zeroRecords": 'Aucune règle définie !',
                                "info": "Page _PAGE_ sur _PAGES_",
                                "infoEmpty": "0 sur 0",
                                "infoFiltered": "(filtre sur _MAX_ éléments)",
                                "loadingRecords": "Chargement des données ...",
                                "search":         "",
                                "searchPlaceholder": "Recherche ...",
                                "paginate": {
                                    "next":       "Suivant",
                                    "previous":   "Précédent"
                                }
                }
                        
            });
        }

        function callMovementsDataTable()
        {
            $("#movementsTable").DataTable().destroy();
            var table = $('#movementsTable').DataTable({
                "lengthMenu": [ 10, 50, 75, 100 ],
                dom: 'Bfrtip',
                buttons: [
                                {
                                    extend : 'excel',
                                    text : '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" fill="#000000" width="24" height="24" stroke="currentColor" stroke-width="2"><g><g><path d="M439.658,91.21L351.435,2.987C349.522,1.075,346.928,0,344.223,0H79.554c-5.633,0-10.199,4.566-10.199,10.199v491.602c0,5.633,4.566,10.199,10.199,10.199h352.892c5.632,0,10.199-4.566,10.199-10.199V98.422C442.645,95.717,441.57,93.123,439.658,91.21z M354.422,34.823l53.401,53.4h-53.401V34.823z M422.247,491.602H89.753V20.398h244.271v78.024c0,5.633,4.567,10.199,10.199,10.199h78.024V491.602z"/></g></g><g><g><path d="M282.012,454.884H119.331c-5.633,0-10.199,4.566-10.199,10.199s4.566,10.199,10.199,10.199h162.681c5.632,0,10.199-4.566,10.199-10.199S287.644,454.884,282.012,454.884z"/></g></g><g><g><path d="M334.026,454.884h-11.067c-5.632,0-10.199,4.566-10.199,10.199s4.567,10.199,10.199,10.199h11.067c5.632,0,10.199-4.566,10.199-10.199S339.658,454.884,334.026,454.884z"/></g></g><g><g><path d="M311.6,263.139l75.737-93.534c2.473-3.056,2.972-7.261,1.278-10.809c-1.692-3.549-5.274-5.808-9.205-5.808h-84.952c-3.078,0-5.99,1.389-7.926,3.781L256,194.475l-30.532-37.706c-1.936-2.392-4.849-3.781-7.926-3.781H132.59c-3.931,0-7.513,2.259-9.206,5.808c-1.693,3.548-1.194,7.754,1.279,10.809l75.737,93.534l-75.737,93.534c-2.474,3.056-2.972,7.261-1.279,10.809c1.693,3.548,5.274,5.808,9.206,5.808h84.952c3.077,0,5.99-1.389,7.926-3.781L256,331.804l30.531,37.706c1.936,2.392,4.849,3.781,7.926,3.781h84.953c3.931,0,7.513-2.259,9.205-5.808c1.693-3.548,1.195-7.754-1.279-10.809L311.6,263.139z M299.323,173.386h58.706l-59.553,73.545l-29.352-36.25L299.323,173.386zM212.677,352.892h-58.706l59.552-73.545l29.352,36.25L212.677,352.892z M299.323,352.892L153.971,173.386h58.706l145.351,179.506H299.323z"/></g></g></svg>',
                                    className: 'dt-button rounded',
                                    filename: 'Liste des mouvements',
                                    title: 'Liste des mouvements',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                {
                                    extend : 'print',
                                    text : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>',
                                    className: 'dt-button rounded',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                }
                ],
                "language": {
                                "lengthMenu": "Résultats : _MENU_",
                                "zeroRecords": 'Aucune règle définie !',
                                "info": "Page _PAGE_ sur _PAGES_",
                                "infoEmpty": "0 sur 0",
                                "infoFiltered": "(filtre sur _MAX_ éléments)",
                                "loadingRecords": "Chargement des données ...",
                                "search":         "",
                                "searchPlaceholder": "Recherche ...",
                                "paginate": {
                                    "next":       "Suivant",
                                    "previous":   "Précédent"
                                }
                }
                        
            });
        }
</script>

<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
@switch($page_name)
    
      @case('clients')
            <script>
                    $(document).ready(function() {
                        load_clients();
                        load_files($('#btn_upload_file').attr('target'));
                    });

                    function load_clients()
                    {
                        $.ajax({
                                url:"get-clients",
                                method:'GET',
                                beforeSend:function()
                                {
                                    $('#table').html('<div class="bg-white p-3 rounded"><div class="loader dual-loader mx-auto"></div><h5 class="mt-2 text-center">Chargement des données ...</h5></div>');
                                },
                                success:function(response)
                                {
                                    $('#table').html(response);
                                    callThDataTable()
                                }
                        });
                    }

                    function getCategories(currentId = 0)
                    {
                        $('.clientCategory').empty();
                        $('.clientCategory').append('<option value="" '+((currentId == 0)? 'selected': '')+' >-- Catégorie de clients --</option>');
                        $.get('getCategories/clients', function(categories){
                            for(var category of categories)
                            {
                                $('.clientCategory').append('<option value="'+category.id+'" '+((currentId == category.id)? 'selected': '')+' >'+category.designation+'</option>');
                            }
                        });
                    } 

                    function getPayments(currentD = 0)
                    {
                        $('.clientPayment').empty();
                        $('.clientPayment').append('<option value="" '+((currentD == 0)? 'selected': '')+' >-- Mode de paiement --</option>');
                        $.get('getPaymentmode', function(payments){
                            for(var payment of payments)
                            {
                                $('.clientPayment').append('<option value="'+payment.designation+'" '+((currentD == payment.designation)? 'selected': '')+' >'+payment.designation+'</option>');
                            }
                        });
                    } 

                    function getClient(id)
                    {
                        $.get('clients/'+id, function(client){
                                $('#clienteditModal #form').val(client.id); 
                                $('#clienteditModal #clientCode').val(client.code);
                                $('#clienteditModal #clientName').val(client._name);
                                $('#clienteditModal #clientTel1').val(client.tel1);
                                $('#clienteditModal #clientTel2').val(client.tel2);
                                $('#clienteditModal #clientEmail').val(client.email);
                                $('#clienteditModal #clientWebsite').val(client.website);
                                $('#clienteditModal #clientAddress').val(client.address);
                                $('#clienteditModal #clientCity').val(client.city);
                                $('#clienteditModal #clientCountry').val(client.country);
                                $('#clienteditModal #clientTownship').val(client.township);
                                $('#clienteditModal #clientDistrict').val(client._district);
                                $('#clienteditModal #clientConditions').val(client.conditions);
                                $('#clienteditModal #clientNotes').val(client.notes);
                                $('#clienteditModal #clientLegalid').val(client.legal_id);
                                $('#clienteditModal #clientConditions').val(client.conditions);
                                $('#clienteditModal #clientBalance').val(client.current_balance);
                                $('#clienteditModal #clientBalancedate').val(returnDate(client.balance_date));
                                $('#clienteditModal #clientBank').val(client.bank_name);
                                if(client.e_document == 'yes'){$('#clienteditModal #edocument').attr('checked', true);} 
                                else{$('#clienteditModal #edocument').attr('checked', false);}
                                getCategories(client.category);
                                getPayments(client.payment_mode);
                                $('#clienteditModal #clientBankaccount').val(client.bank_account);
                                $('#clienteditModalLabel').html('Modifier le client : '+client._name);
                                $('#clienteditModal').modal('show');
                        });
                    }

                    $(document).on('click', '.btn-edit-client', function(){
                        getClient($(this).attr("id"));
                    });
                    
                    $(document).on('submit', '#clientAddForm', function(e){
                        e.preventDefault();
                        let form_data = $(this).serialize();

                        $.ajax({
                                url:"add-client",
                                method:'POST',
                                data:form_data,
                                success:function(response)
                                {
                                    if(response == '_name_error')
                                    {
                                        swal('','Le nom du client est requis!','error');
                                    }
                                    else{
                                        load_clients();
                                        $('#clientAddForm')[0].reset();
                                        $('#clientModal').modal('hide');
                                        Snackbar.show({
                                            text: '<b>Nouveau client créé !</b>',
                                            duration: 3000,
                                            actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                            actionTextColor: '#fff',
                                            backgroundColor: '#0076A8',
                                            pos: 'top-center'
                                        });
                                    }
                                }
                        });
                    });

                    $(document).on('submit', '#clientEditForm', function(e){
                        e.preventDefault();
                        let form_data = $(this).serialize();

                        $.ajax({
                                url:"edit-client",
                                method:'POST',
                                data:form_data,
                                success:function(response)
                                {
                                    if(response == '_name_error')
                                    {
                                        swal('','Le nom du client est requis!','error');
                                    }
                                    else{
                                        load_clients();
                                        $('#clientEditForm')[0].reset();
                                        $('#clienteditModal').modal('hide');
                                        Snackbar.show({
                                            text: '<b>Client mis à jour !</b>',
                                            duration: 3000,
                                            actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                            actionTextColor: '#fff',
                                            backgroundColor: '#0076A8',
                                            pos: 'top-center'
                                        });
                                    }
                                }
                        });
                    });

                    //deleting client .......................
                    $(document).on('click', '.btn-delete-client', function(){
                        var id = $(this).attr('id'); //[---- id of category to delete ----]

                        swal({
                            title: 'Voulez-vous supprimer ce client?',
                            text: "Cette opération est irréversible.",
                            type: 'warning',
                            showCancelButton: true,
                            cancelButtonText: 'Annuler',
                            confirmButtonText: 'Oui, supprimer',
                            padding: '2em'
                        }).then(function(result) {
                            if (result.value) {
                                //then call ajax to delete .........................................
                                $.ajax({
                                    url:'client/'+id,
                                    type:"DELETE",
                                    data:{_token:_token},
                                    success:function(data)
                                    {
                                            load_clients();
                                            Snackbar.show({
                                                text: '<b>Le client a été supprimé !</b>',
                                                duration: 3000,
                                                actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                                actionTextColor: '#fff',
                                                backgroundColor: '#0076A8',
                                                pos: 'top-center'
                                            });
                                    }
                                });
                            }
                        })
                    });

                    $(document).on('click', '#add-client', function(){
                        $('#clientAddForm')[0].reset();
                        getCategories(0);
                        getPayments(0);
                    });

                    $(document).on('click', '#btn-import', function(){
                        $('#init_content').html('<form id="uploadForm" enctype="multipart/form-data">{{ csrf_field() }}<h6 class="mb-3">Suivez les étapes ci-dessous ...</h6><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 1 : Téléchargez le modèle Linnasoft</h6><p class="mt-3">Pour commencer, téléchargez notre modèle EXCEL configuré pour importer vos données dans l\'application Linnasoft.</p><a href="{{ asset("assets/local_fl/linnasoft_tiers_template.xlsx") }}" class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Télécharger le modèle</a></div><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 2 : Copiez vos <span class="dataUpload">clients</span> dans le modèle</h6><p class="mt-3">Ouvrez le modèle avec Microsoft Excel, copiez ensuite vos données dans le tableur.</p><p class="text-danger"><b>Important :</b> si vos données contiennent des en-têtes, retirez les et gardez uniquement les en-têtes du modèle.</p></div><div class="mb-4"><h6 class="text-bold">Etape 3 : Chargez le modèle contenant vos <span class="dataUpload">clients</span></h6><span class="text-color-linna1 text-bold">Vous pouvez importer un maximum de 1000 lignes à la fois !</span> (formats attendus : xlsx, xls, csv)<p class="mt-3"><div class="custom-file-container" data-upload-id="myFirstImage"><label class="custom-file-container__custom-file" ><input type="file" class="custom-file-container__custom-file__custom-file-input border" accept=".csv, .xls, .xlsx" id="file" name="file" dataType="" targetURL="import-clients"><input type="hidden" name="MAX_FILE_SIZE" value="10485760" /><span class="custom-file-container__custom-file__custom-file-control"></span></label></div><div id="div_file_to_upload"></div></p></div><div class="modal-footer"><input type="hidden" name="_type" id="_type" /><button class="btn btn-light" data-dismiss="modal">Annuler</button><button type="submit" class="btn btn-info">Importer</button></form>');
                        $('#uploadModalTitle').html('Importer vos clients');

                        $('#file').removeClass('border-danger');
                        $('#file').val('');
                    });

                    $(document).on('click', '#btn_retry_upload', function(){
                        $('#init_content').html('<form id="uploadForm" enctype="multipart/form-data">{{ csrf_field() }}<h6 class="mb-3">Suivez les étapes ci-dessous ...</h6><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 1 : Téléchargez le modèle Linnasoft</h6><p class="mt-3">Pour commencer, téléchargez notre modèle EXCEL configuré pour importer vos données dans l\'application Linnasoft.</p><a href="{{ asset("assets/local_fl/linnasoft_tiers_template.xlsx") }}" class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Télécharger le modèle</a></div><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 2 : Copiez vos <span class="dataUpload">clients</span> dans le modèle</h6><p class="mt-3">Ouvrez le modèle avec Microsoft Excel, copiez ensuite vos données dans le tableur.</p><p class="text-danger"><b>Important :</b> si vos données contiennent des en-têtes, retirez les et gardez uniquement les en-têtes du modèle.</p></div><div class="mb-4"><h6 class="text-bold">Etape 3 : Chargez le modèle contenant vos <span class="dataUpload">clients</span></h6><span class="text-color-linna1 text-bold">Vous pouvez importer un maximum de 1000 lignes à la fois !</span> (formats attendus : xlsx, xls, csv)<p class="mt-3"><div class="custom-file-container" data-upload-id="myFirstImage"><label class="custom-file-container__custom-file" ><input type="file" class="custom-file-container__custom-file__custom-file-input border" accept=".csv, .xls, .xlsx" id="file" name="file" dataType="" targetURL="import-clients"><input type="hidden" name="MAX_FILE_SIZE" value="10485760" /><span class="custom-file-container__custom-file__custom-file-control"></span></label></div><div id="div_file_to_upload"></div></p></div><div class="modal-footer"><input type="hidden" name="_type" id="_type" /><button class="btn btn-light" data-dismiss="modal">Annuler</button><button type="submit" class="btn btn-info">Importer</button></form>');
                    });

                    function load_files(client)
                    {
                        $.ajax({
                                headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url:'/ventes/get-client-files/'+client,
                                method:'GET',
                                beforeSend:function()
                                {
                                    $('#fileuploadContent').html('<div class="text-center mt-2 mb-3"><div class="spinner-border text-success align-self-center loader-sm ">Loading...</div></div>');
                                },
                                success:function(response)
                                {
                                    $('#fileuploadContent').html(response.content);
                                    $('#counter_files').text(response.counter);
                                }
                        });
                    }

                    $(document).on('click', '.btn_delete_file', function(){
                        let id = $(this).attr('id');
                        let tok = $(this).attr('target-token');
                        let data = $(this).attr('target-data');

                        $.ajax({
                                url:'/ventes/delete-client-file/'+id+'/'+tok,
                                type:"DELETE",
                                data:{_token:_token},
                                success:function(response)
                                {
                                    load_files(data);
                                }
                        });                        
                    });

                    $(document).on('change', '#clientFile', function(){
                        let formdata = new FormData();
                        let client = $(this).attr('data-target');
                        if($(this).prop('files').length > 0)
                        {
                            let file = $(this).prop('files')[0];
                            formdata.append("clientFile", file);
                            
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: '/ventes/storeclientfile/'+client,
                                method: 'POST',
                                data: formdata,
                                contentType: false,
                                cache: false,
                                processData:false,
                                /*beforeSend:function()
                                {

                                },*/
                                success:function(response)
                                {
                                    if(response.type == 'error')
                                    {
                                        $('#errorContent').html('<div class="alert alert-outline-danger mb-1" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#b52c2c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 286.054 286.054" style="enable-background:new 0 0 286.054 286.054;" xml:space="preserve" width="20px" height="20px"><g><path style="fill:#E2574C;" d="M143.027,0C64.04,0,0,64.04,0,143.027c0,78.996,64.04,143.027,143.027,143.027c78.996,0,143.027-64.022,143.027-143.027C286.054,64.04,222.022,0,143.027,0z M143.027,259.236c-64.183,0-116.209-52.026-116.209-116.209S78.844,26.818,143.027,26.818s116.209,52.026,116.209,116.209S207.21,259.236,143.027,259.236z M143.036,62.726c-10.244,0-17.995,5.346-17.995,13.981v79.201c0,8.644,7.75,13.972,17.995,13.972c9.994,0,17.995-5.551,17.995-13.972V76.707C161.03,68.277,153.03,62.726,143.036,62.726z M143.036,187.723c-9.842,0-17.852,8.01-17.852,17.86c0,9.833,8.01,17.843,17.852,17.843s17.843-8.01,17.843-17.843C160.878,195.732,152.878,187.723,143.036,187.723z"/></g></svg> <span style="font-size:12px"><b>Oops !</b> '+response.msg+'</span></div>');
                                    }
                                    else
                                    {
                                        load_files(client);
                                    }
                                }
                            });
                        }
                    });

                    $(document).on('click', '#btn_upload_file', function(){
                        $('#errorContent').empty();
                    });
           </script>
      @break

      @case('produits-services')
            <script>
                    $(document).ready(function(){
                        load_products();
                        getPrices($('#contentPricesList').attr('data-target'));
                        getMovements($('#movementsTable').attr('data-target'));
                        load_files($('#btn_show_upload_file').attr('target'));
                    });

                    function load_products()
                    {
                        $.ajax({
                            url:"get-products",
                            method:'GET',
                            beforeSend:function()
                            {
                                $('#table').html('<div class="bg-white p-3 rounded"><div class="loader dual-loader mx-auto"></div><h5 class="mt-2 text-center">Chargement des données ...</h5></div>');
                            },
                            success:function(response)
                            {
                                $('#table').html(response);
                                callProductDataTable()
                            }
                        });
                    }

                    function getCategories(currentId = 0)
                    {
                        $('.prCategory').empty();
                        $('.prCategory').append('<option value="" '+((currentId == 0)? 'selected': '')+' >-- Catégories --</option>');
                        $.get('getCategories/products', function(categories){
                            for(var category of categories)
                            {
                                $('.prCategory').append('<option value="'+category.id+'" '+((currentId == category.id)? 'selected': '')+' >'+category.designation+'</option>');
                            }
                        });
                    }  

                    function getVTA(currentId = 0)
                    {
                        $('.prTax').empty();
                        $('.prTax').append('<option value="" '+((currentId == 0)? 'selected': '')+' >0%</option>');
                        $.get('getVTA', function(vtaList){
                            for(var vta of vtaList)
                            {
                                $('.prTax').append('<option value="'+vta.value+'" '+((currentId == vta.value)? 'selected': '')+' >'+vta.value+'%</option>');
                            }
                        });
                    }

                    function getProduct(id)
                    {
                        $.get('products/'+id, function(product){
                            $('#producteditModal #form').val(product.id); 
                            $('#producteditModal #prCode').val(product.code); 
                            $('#producteditModal #prDesignation').val(product.designation); 
                            $('#producteditModal #prSalePrice').val((product.sale_price == null)? '': product.sale_price); 
                            $('#prPurchasePrice').val((product.purchase_price == null)? '': product.purchase_price);
                            if(product._type == 'service'){ $('#producteditModal #contentProductSP').empty(); }
                            else{ $('#producteditModal #contentProductSP').html('<label for="" class="text-dark">Type de Produit</label><select name="prTypeSP" id="prTypeSP" class="form-control prTypeSP"><option '+((product.product_sp == 'sale')? 'selected': '')+' value="sale">Vente</option><option '+((product.product_sp == 'purchase')? 'selected': '')+' value="purchase">Achat</option><option '+((product.product_sp == 'both')? 'selected': '')+' value="both">Achat & Vente</option></select>'); }

                            if(product._type == 'product' && (product.product_sp == 'both' || product.product_sp == 'purchase')){ $('#producteditModal #contentPurchasePrice').html('<label for="" class="text-dark">Prix d\'achat</label><input type="text" id="prPurchasePrice" name="prPurchasePrice" class="form-control" value="'+((product.purchase_price != null)? product.purchase_price: '')+'" />'); }
                            else{ $('#producteditModal #contentPurchasePrice').empty(); }

                            if(product._type == 'service'){ $('#producteditModal #contentTracking').empty(); }
                            else{ $('#producteditModal #contentTracking').html('<div class="col-12 mb-3 border-top pt-3"><div class="n-chk"><label class="new-control new-checkbox checkbox-success"><input type="checkbox" class="new-control-input" '+((product.tracking == 'yes')? 'checked': '')+' id="prTracking" name="prTracking"><span class="new-control-indicator"></span> Ce produit est stocké ?</label></div></div><div class="col-12 col-lg-4 mb-3" id="contentPrMinStock">'+((product.tracking == 'yes')? '<label for="" class="text-dark">Stock minimum</label><input type="text" class="form-control" name="prMinStock" id="prMinStock" value="'+((product.min_stock == null)? '': product.min_stock)+'" />': '')+'</div>'); }
                            $('#producteditModal #prTax').val((product.tax == null)? '': product.tax); 
                            $('#producteditModal #prMargin').val((product.margin == null)? '': product.margin); 
                            $('#producteditModal #prDescription').val(product.description); 
                            getCategories(product.category);
                            getVTA(product.tax);
                            $('#producteditModalLabel').html('Modifier le '+((product._type == 'service')? product._type: 'produit')+' : '+product.designation);
                            $('#producteditModal').modal('show');
                        });
                    }

                    function getPrices(product)
                    {
                        $.ajax({
                            url: '/ventes/get-product-prices/'+product,
                            method: 'GET',
                            success:function(response)
                            {
                                $('#contentPricesList').html(response);
                            }
                        });
                    }

                    function getMovements(product)
                    {
                        $.ajax({
                            url: '/ventes/get-product-movements/'+product,
                            method: 'GET',
                            success:function(response)
                            {
                                $('#movementsTable').html(response);
                                callMovementsDataTable()
                            }
                        });
                    }

                    function getSinglePrice(id)
                    {
                        $.ajax({
                            url: '/ventes/get-single-price/'+id,
                            method: 'GET',
                            success:function(response)
                            {
                                $('#price'+id).val(response.price);
                            }
                        });
                    }

                    function getcurrentQty(product)
                    {
                        $.get('/ventes/getcurrentQty/'+product, function(qty){
                            $('#movementcurrentQuantity').val((qty.new_quantity == null)? 0: qty.new_quantity);
                            $('#movementnewQuantity').val((qty.new_quantity == null)? 0: qty.new_quantity);
                        });
                    }

                    $(document).on('click', '#btn_add_movement', function(){
                        let id = $(this).attr('product');
                        getcurrentQty(id);
                    });

                    $(document).on('keyup', '#movementQuantity', function(){
                        this.value = this.value.replace(/[^0-9\.]/g,'');
                        let currentM = (isNaN(parseFloat($('#movementcurrentQuantity').val())))? 0: parseFloat($('#movementcurrentQuantity').val());
                        let operationM = (isNaN(parseFloat($(this).val())) || $(this).val() == '')? 0: parseFloat($(this).val());
                        let type = $('#movementType').val();
                        let result = (type == 'out')? (parseFloat(currentM) - parseFloat(operationM)): (parseFloat(currentM) + parseFloat(operationM));

                        $('#movementnewQuantity').val(result);
                    });

                    $(document).on('change', '#movementType', function(){
                        let target = $(this).attr('data-target');
                        $('#movementQuantity').val(0);
                        getcurrentQty(target);
                    });

                    $(document).on('mouseleave', '#movementQuantity', function(){
                        if(isNaN($(this).val()))
                        {
                            $(this).val(parseFloat($(this).val()));
                        }
                    });

                    $(document).on('click', '#btn_add_price', function(){
                        $('#priceForm')[0].reset();
                        $('#priceRows').empty();
                    });

                    var price_rows = 0;
                    $(document).on('click', '#btn_add_price_row', function(){
                        let type = $('#priceType').val();

                        if(type == 'client' || type == 'supplier' || type == 'category')
                        {
                            price_rows++;
                            $('#priceRows').append('<div class="form-row" id="row'+price_rows+'"><div class="col-12 col-md-6 mb-2"><input type="hidden" class="form-control" value="'+type+'" name="priceType'+price_rows+'" /><select class="form-control" name="priceTypeId'+price_rows+'" id="priceTypeId'+price_rows+'"></select></div><div class="col-12 col-md-4 mb-2"><input type="text" class="form-control" name="priceValue'+price_rows+'" /></div><div class="col-12 col-md-2 mb-2"><a class="btn-remove-price-row" type="button" style="color:#000" id="'+price_rows+'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></div></div>');
                            if(type == 'category'){ getClientCategories('#priceTypeId'+price_rows); }
                            else{ getAccountsByType('#priceTypeId'+price_rows, type); }

                            $('#priceType').val('');
                        }
                    });

                    $(document).on('submit', '#priceForm', function(e){
                        e.preventDefault();

                        $('#priceForm #col').val(price_rows);

                        $.ajax({
                            url: '/ventes/add-prices',
                            method: 'POST',
                            data:$(this).serialize(),
                            success:function(response)
                            {
                                price_rows = 0;
                                $('#priceForm')[0].reset();
                                $('#priceModal').modal('hide');
                                getPrices($('#priceForm #form').val());
                            }
                        });
                    });

                    $(document).on('submit', '#movementForm', function(e){
                        e.preventDefault();

                        $.ajax({
                            url: '/ventes/add-movement',
                            method: 'POST',
                            data:$(this).serialize(),
                            success:function(response)
                            {
                                if(response.type == 'error')
                                {
                                    swal('', response.msg, 'error');
                                }
                                else
                                {
                                    $('#movementForm')[0].reset();
                                    $('#movementModal').modal('hide');
                                    getMovements($('#movementForm #form').val());
                                    Snackbar.show({
                                        text: '<b>'+response.msg+'</b>',
                                        duration: 4000,
                                        actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#0076A8',
                                        pos: 'top-center'
                                    });
                                }
                            }
                        });
                    });

                    function getClientCategories(fill)
                    {
                        $.get('/ventes/getCategories/clients', function(categories){
                            for(var category of categories)
                            {
                                $(fill).append('<option value="'+category.id+'">'+category.designation+'</option>');
                            }
                        });
                    }

                    function getAccountsByType(fill, type)
                    {
                        $.get('/ventes/getAccounts', function(accounts){
                            for(var account of accounts)
                            {
                                if(type == account.account_type)
                                {
                                    $(fill).append('<option value="'+account.id+'">'+account._name+'</option>');
                                }
                            }
                        });
                    }

                    $(document).on('click', '.btn-remove-price-row', function(){
                        let id = $(this).attr('id');

                        $('#row'+id).remove();
                    });

                    $(document).on('click', '.btn-delete-price', function(){
                        let id = $(this).attr('id');
                        let target = $(this).attr('data-target');

                        swal({
                                title: 'Voulez-vous supprimer ce prix?',
                                text: "Cette opération est irréversible.",
                                type: 'warning',
                                showCancelButton: true,
                                cancelButtonText: 'Annuler',
                                confirmButtonText: 'Oui, supprimer',
                                padding: '2em'
                        }).then(function(result) {
                            if (result.value) {
                                //then call ajax to delete .........................................
                                $.ajax({
                                    url:'/ventes/price/'+id,
                                    type:"DELETE",
                                    data:{_token:_token},
                                    success:function(response)
                                    {
                                        getPrices(target);
                                    }
                                });
                            }
                        })
                    });

                    $(document).on('click', '.btn-edit-price', function(){
                        let id = $(this).attr('id');
                        let target = $(this).attr('data-target');
                        
                        $('#row_price'+id).html('<input type="text" product="'+target+'" data-target-id="'+id+'" id="price'+id+'" class="input_price_edit" />');
                        getSinglePrice(id);
                        $('#price'+id).focus();
                    });

                    $(document).on('keyup', '.input_price_edit', function(event){
                        let id = $(this).attr('data-target-id');
                        let keycode = (event.keyCode ? event.keyCode : event.which);
                        let product = $(this).attr('product');

                        if(keycode == 13)
                        {
                            $.ajax({
                                url:'/ventes/price/'+id,
                                type:"PUT",
                                data:{price:$(this).val(), id:id, _token:_token},
                                success:function(data)
                                {
                                    getPrices(product);
                                }
                            }); 
                        }
                        else if(keycode == 27)
                        {
                            getPrices(product);
                        }
                    });

                    $(document).on('click', '.btn-edit-product', function(){
                        getProduct($(this).attr("id"));
                    });

                    $(document).on('change', '#newproductModal #_type', function(){
                        if($(this).val() == 'product')
                        {
                            $('#newproductModal #contentProductSP').html('<label for="" class="text-dark">Type de Produit</label><select name="prTypeSP" id="prTypeSP" class="form-control"><option value="sale">Vente</option><option value="purchase">Achat</option><option value="both">Achat & Vente</option></select>');
                            $('#newproductModal #contentTracking').html('<div class="col-12 mb-3 border-top pt-3"><div class="n-chk"><label class="new-control new-checkbox checkbox-success"><input type="checkbox" class="new-control-input" id="prTracking" name="prTracking"><span class="new-control-indicator"></span> Ce produit est stocké ?</label></div> </div><div class="col-12 col-lg-4 mb-3" id="contentPrMinStock"></div>');
                        }
                        else
                        {
                            $('#newproductModal #contentPurchasePrice').empty();
                            $('#newproductModal #contentProductSP').empty();
                            $('#newproductModal #contentTracking').empty();
                        }
                    });

                    $(document).on('change', '#newproductModal #prTypeSP', function(){
                        if($(this).val() == 'purchase' || $(this).val() == 'both')
                        {
                            $('#newproductModal #contentPurchasePrice').html('<label for="" class="text-dark">Prix d\'achat</label><input type="text" id="prPurchasePrice" name="prPurchasePrice" class="form-control" />');
                        }
                        else
                        {
                            $('#newproductModal #contentPurchasePrice').empty();
                        }
                    });

                    $(document).on('change', '#producteditModal #prTypeSP', function(){
                        if($(this).val() == 'purchase' || $(this).val() == 'both')
                        {
                            $('#producteditModal #contentPurchasePrice').html('<label for="" class="text-dark">Prix d\'achat</label><input type="text" id="prPurchasePrice" name="prPurchasePrice" class="form-control" />');
                        }
                        else
                        {
                            $('#producteditModal #contentPurchasePrice').empty();
                        }
                    });

                    $(document).on('click', '#add-product', function(){
                        $('#newproductForm')[0].reset();
                        $('#contentPrMinStock').empty();
                        $('#contentPurchasePrice').empty();
                        getCategories(0);
                        getVTA(0);
                    });

                    $(document).on('submit', '#newproductForm', function(e){
                        e.preventDefault();

                        let form_data = $(this).serialize();
                        $.ajax({
                            url:"add-product",
                            method:'POST',
                            data:form_data,
                            success:function(response)
                            {
                                if(response == 'saved')
                                {
                                    load_products();
                                    $('#newproductForm')[0].reset();
                                    $('#newproductModal').modal('hide');
                                    Snackbar.show({
                                        text: '<b>Enregistrement effectué avec succès !</b>',
                                        duration: 3000,
                                        actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#0076A8',
                                        pos: 'top-center'
                                    });
                                }
                                else{
                                    swal('',response,'error');
                                }
                            }
                        });
                    });

                    $(document).on('submit', '#producteditForm', function(e){
                        e.preventDefault();

                        let form_data = $(this).serialize();
                        $.ajax({
                            url:"edit-product",
                            method:'POST',
                            data:form_data,
                            success:function(response)
                            {
                                if(response == 'saved')
                                {
                                    load_products();
                                    $('#producteditForm')[0].reset();
                                    $('#producteditModal').modal('hide');
                                    Snackbar.show({
                                        text: '<b>Modification effectuée avec succès !</b>',
                                        duration: 3000,
                                        actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#0076A8',
                                        pos: 'top-center'
                                    });
                                }
                                else{
                                    swal('',response,'error');
                                }
                            }
                        });
                    });

                    $(document).on('click', '.btn-delete-product', function(){
                            let id = $(this).attr('id'); //[---- id of category to delete ----]
                            let target = $(this).attr('data-target');

                            swal({
                                title: 'Voulez-vous supprimer ce '+target+'?',
                                text: "Cette opération est irréversible.",
                                type: 'warning',
                                showCancelButton: true,
                                cancelButtonText: 'Annuler',
                                confirmButtonText: 'Oui, supprimer',
                                padding: '2em'
                            }).then(function(result) {
                                if (result.value) {
                                    //then call ajax to delete .........................................
                                    $.ajax({
                                        url:'product/'+id,
                                        type:"DELETE",
                                        data:{_token:_token},
                                        success:function(data)
                                        {
                                            load_products();
                                            Snackbar.show({
                                                    text: '<b>'+data+'</b>',
                                                    duration: 3000,
                                                    actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                                    actionTextColor: '#fff',
                                                    backgroundColor: '#0076A8',
                                                    pos: 'top-center'
                                            });
                                        }
                                    });
                                }
                            })
                    });

                    $(document).on('change', '#newproductModal #prTracking', function(){
                        if($(this).is(':checked'))
                        {
                            $('#newproductModal #contentPrMinStock').html('<label for="" class="text-dark">Stock minimum</label><input type="text" class="form-control" name="prMinStock" id="prMinStock" />');
                        }
                        else
                        {
                            $('#newproductModal #contentPrMinStock').empty();
                        }
                    });

                    $(document).on('change', '#producteditModal #prTracking', function(){
                        if($(this).is(':checked'))
                        {
                            $('#producteditModal #contentPrMinStock').html('<label for="" class="text-dark">Stock minimum</label><input type="text" class="form-control" name="prMinStock" id="prMinStock" />');
                        }
                        else
                        {
                            $('#producteditModal #contentPrMinStock').empty();
                        }
                    });

                    $(document).on('click', '#btn-import', function(){
                            $('#init_content').html('<form id="uploadForm" enctype="multipart/form-data">{{ csrf_field() }}<h6 class="mb-3">Suivez les étapes ci-dessous ...</h6><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 1 : Téléchargez le modèle Linnasoft</h6><p class="mt-3">Pour commencer, téléchargez notre modèle EXCEL configuré pour importer vos données dans l\'application Linnasoft.</p><a href="{{ asset("assets/local_fl/linnasoft_produits_template.xlsx") }}" class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Télécharger le modèle</a></div><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 2 : Copiez vos <span class="dataUpload">produits/services</span> dans le modèle</h6><p class="mt-3">Ouvrez le modèle avec Microsoft Excel, copiez ensuite vos données dans le tableur.</p><p class="text-danger"><b>Important :</b> si vos données contiennent des en-têtes, retirez les et gardez uniquement les en-têtes du modèle.</p></div><div class="mb-4"><h6 class="text-bold">Etape 3 : Chargez le modèle contenant vos <span class="dataUpload">produits/services</span></h6><span class="text-color-linna1 text-bold">Vous pouvez importer un maximum de 1000 lignes à la fois !</span> (formats attendus : xlsx, xls, csv)<p class="mt-3"><div class="custom-file-container" data-upload-id="myFirstImage"><label class="custom-file-container__custom-file" ><input type="file" class="custom-file-container__custom-file__custom-file-input border" accept=".csv, .xls, .xlsx" id="file" name="file" dataType="" targetURL="import-products"><input type="hidden" name="MAX_FILE_SIZE" value="10485760" /><span class="custom-file-container__custom-file__custom-file-control"></span></label></div><div id="div_file_to_upload"></div></p></div><div class="modal-footer"><input type="hidden" name="_type" id="_type" /><button class="btn btn-light" data-dismiss="modal">Annuler</button><button type="submit" class="btn btn-info">Importer</button></form>');
                            $('#uploadModalTitle').html('Importer vos produits/services');

                            $('#file').removeClass('border-danger');
                            $('#file').val('');
                    });

                    $(document).on('click', '#btn_retry_upload', function(){
                        $('#init_content').html('<form id="uploadForm" enctype="multipart/form-data">{{ csrf_field() }}<h6 class="mb-3">Suivez les étapes ci-dessous ...</h6><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 1 : Téléchargez le modèle Linnasoft</h6><p class="mt-3">Pour commencer, téléchargez notre modèle EXCEL configuré pour importer vos données dans l\'application Linnasoft.</p><a href="{{ asset("assets/local_fl/linnasoft_produits_template.xlsx") }}" class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Télécharger le modèle</a></div><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 2 : Copiez vos <span class="dataUpload">produits/services</span> dans le modèle</h6><p class="mt-3">Ouvrez le modèle avec Microsoft Excel, copiez ensuite vos données dans le tableur.</p><p class="text-danger"><b>Important :</b> si vos données contiennent des en-têtes, retirez les et gardez uniquement les en-têtes du modèle.</p></div><div class="mb-4"><h6 class="text-bold">Etape 3 : Chargez le modèle contenant vos <span class="dataUpload">produits/services</span></h6><span class="text-color-linna1 text-bold">Vous pouvez importer un maximum de 1000 lignes à la fois !</span> (formats attendus : xlsx, xls, csv)<p class="mt-3"><div class="custom-file-container" data-upload-id="myFirstImage"><label class="custom-file-container__custom-file" ><input type="file" class="custom-file-container__custom-file__custom-file-input border" accept=".csv, .xls, .xlsx" id="file" name="file" dataType="" targetURL="import-products"><input type="hidden" name="MAX_FILE_SIZE" value="10485760" /><span class="custom-file-container__custom-file__custom-file-control"></span></label></div><div id="div_file_to_upload"></div></p></div><div class="modal-footer"><input type="hidden" name="_type" id="_type" /><button class="btn btn-light" data-dismiss="modal">Annuler</button><button type="submit" class="btn btn-info">Importer</button></form>');
                    });

                    function load_files(product)
                    {
                        $.ajax({
                                headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url:'/ventes/get-product-files/'+product,
                                method:'GET',
                                beforeSend:function()
                                {
                                    $('#fileuploadContent').html('<div class="text-center mt-2 mb-3"><div class="spinner-border text-success align-self-center loader-sm ">Loading...</div></div>');
                                },
                                success:function(response)
                                {
                                    $('#fileuploadContent').html(response.content);
                                    $('#counter_files').text(response.counter);
                                }
                        });
                    }

                    $(document).on('click', '.btn_delete_file', function(){
                        let id = $(this).attr('id');
                        let tok = $(this).attr('target-token');
                        let data = $(this).attr('target-data');

                        $.ajax({
                                url:'/ventes/delete-product-file/'+id+'/'+tok,
                                type:"DELETE",
                                data:{_token:_token},
                                success:function(response)
                                {
                                    load_files(data);
                                }
                        });                        
                    });

                    $(document).on('change', '#productFile', function(){
                        let formdata = new FormData();
                        let product = $(this).attr('data-target');
                        if($(this).prop('files').length > 0)
                        {
                            let file = $(this).prop('files')[0];
                            formdata.append("productFile", file);
                            
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: '/ventes/storeproductfile/'+product,
                                method: 'POST',
                                data: formdata,
                                contentType: false,
                                cache: false,
                                processData:false,
                                /*beforeSend:function()
                                {

                                },*/
                                success:function(response)
                                {
                                    if(response.type == 'error')
                                    {
                                        $('#errorContent').html('<div class="alert alert-outline-danger mb-1" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#b52c2c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 286.054 286.054" style="enable-background:new 0 0 286.054 286.054;" xml:space="preserve" width="20px" height="20px"><g><path style="fill:#E2574C;" d="M143.027,0C64.04,0,0,64.04,0,143.027c0,78.996,64.04,143.027,143.027,143.027c78.996,0,143.027-64.022,143.027-143.027C286.054,64.04,222.022,0,143.027,0z M143.027,259.236c-64.183,0-116.209-52.026-116.209-116.209S78.844,26.818,143.027,26.818s116.209,52.026,116.209,116.209S207.21,259.236,143.027,259.236z M143.036,62.726c-10.244,0-17.995,5.346-17.995,13.981v79.201c0,8.644,7.75,13.972,17.995,13.972c9.994,0,17.995-5.551,17.995-13.972V76.707C161.03,68.277,153.03,62.726,143.036,62.726z M143.036,187.723c-9.842,0-17.852,8.01-17.852,17.86c0,9.833,8.01,17.843,17.852,17.843s17.843-8.01,17.843-17.843C160.878,195.732,152.878,187.723,143.036,187.723z"/></g></svg> <span style="font-size:12px"><b>Oops !</b> '+response.msg+'</span></div>');
                                    }
                                    else
                                    {
                                        load_files(product);
                                    }
                                }
                            });
                        }
                    });

                    $(document).on('click', '#btn_upload_file', function(){
                        $('#errorContent').empty();
                    });
            </script>
      @break

      @case('categories_cl_prod')
            <script>
                $(document).ready(function(){
                    load_categories('clients');
                    load_categories('products');
                });

                function load_categories(_type)
                {
                    $.ajax({
                        url:'get-categories/'+_type,
                        method:'GET',
                        beforeSend:function()
                        {
                            $('#'+_type+'_list').html('<div class="text-center pt-5"><div class="spinner-grow text-info align-self-center">Loading...</div></div>');
                        },
                        success:function(response)
                        {
                            $('#'+_type+'_list').html(response);
                        }
                    });
                }

                function getSubCategories(parent, type, fill)
                {
                    $.ajax({
                        url: 'getSubCategories/'+parent+'/'+type,
                        method: 'GET',
                        success:function(response)
                        {
                            $(fill).html(response);
                        }
                    });
                }

                //show/hide sub categories ................. 
                $(document).on('click', '.btn-wind', function(){
                    let parent = $(this).attr('parent');
                    let type = $(this).attr('type');

                    if($('#sub-'+parent).html() == '')
                    {
                        getSubCategories(parent, type, '#sub-'+parent)
                        $(this).empty();
                        $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>');
                    }
                    else 
                    {
                        $('#sub-'+parent).html('');
                        $(this).empty();
                        $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>');
                    }
                });

                //mouseover category div ...............
                $(document).on('mouseover', '.category-div', function(){
                    let id = $(this).attr('id');
                    let _type = $(this).attr('dataType');
                    $('#btn-sub-cat'+id).html(' <a class="btn-sub-category" style="cursor:pointer;" dataType="'+_type+'" id="'+id+'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></a>');
                });

                //mouseleave category div ...............
                $(document).on('mouseleave', '.category-div', function(){
                    let id = $(this).attr('id');
                    $('#btn-sub-cat'+id).html('');
                });

                //adding sub category ...............
                $(document).on('click', '.btn-sub-category', function(){
                    let id = $(this).attr('id');
                    let _type = $(this).attr('dataType');
                    $('.div-input-new-category').remove();

                    $('#sub-'+id).append('<div class="pt-3 border-bottom pb-2 div-input-new-category"><input type="text" class="input-no-border input-new-category" autocomplete="off" placeholder="Entrer pour valider, Echap pour annuler" name="designation" parent="'+id+'" dataType="'+_type+'" /></div>');
                    $('.input-new-category').focus();
                });

                //adding input to register new category .................
                $(document).on('click', '.btn-add-category', function(){
                    $('.div-input-new-category').remove();
                    var id = $(this).attr('id'); //[---- getting category type ==> cash_in | cash_out ----]
                    
                    $('#'+id+'_list').append('<div class="pt-3 border-bottom pb-2 div-input-new-category"><input type="text" class="input-no-border input-new-category" autocomplete="off" placeholder="Entrer pour valider, Echap pour annuler" name="designation" parent="null" dataType="'+id+'" /></div>'); //[---- adding new input to right category type ----]
                    $('.input-new-category').focus(); //[---- setting focus() to current input ----]
                }); 

                //adding new category when user press [keycode.13] .................
                $(document).on('keyup', '.input-new-category', function(event){
                    let cc = $(this).attr('dataType'); //[---- getting operation type ==> cash_in | cash_out ----]
                    let parent = $(this).attr('parent');
                    let keycode = (event.keyCode ? event.keyCode : event.which);
                    if(keycode == '13'){
                        if($(this).val() != '')
                        {
                            //then call ajax to insert .........................................
                            $.ajax({
                                url:"add-category",
                                type:"POST",
                                data:{designation:$(this).val(), data_type:cc, parent:parent, _token:_token},
                                success:function(data)
                                {
                                    load_categories(cc);
                                    Snackbar.show({
                                            text: '<b>Catégorie créée !</b>',
                                            duration: 3000,
                                            actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                            actionTextColor: '#fff',
                                            backgroundColor: '#0076A8',
                                            pos: 'top-center'
                                    });
                                }
                            }); 
                        }
                    }
                    else if(keycode == '27')
                    {
                        $('.div-input-new-category').remove();
                    }
                });

                //creating input to update category .......................
                $(document).on('click', '.btn-edit-category', function(){
                    var id = $(this).attr('id'); //[---- id of category to update ----]
                    var category_text = $('#text-category-'+id).text(); //[---- designation of category to update ----]

                    $('#content-category-'+id).empty();
                    $('#content-category-'+id).html('<input type="text" class="input-no-border input-edit-category" id="edit-input-'+id+'" data-category-id="'+id+'" data-type="'+$(this).attr('dataType')+'" />');
                    $('#edit-input-'+id).focus();
                    $('#edit-input-'+id).val(category_text);
                });

                //editing category when user press [keycode.13] .................
                $(document).on('keyup', '.input-edit-category', function(event){
                    let id = $(this).attr('data-category-id'); 
                    let _type = $(this).attr('data-type');
                    let keycode = (event.keyCode ? event.keyCode : event.which);
                    if(keycode == '13'){
                        if($(this).val() != '')
                        {
                            //then call ajax to insert .........................................
                            $.ajax({
                                url:"edit-category",
                                type:"PUT",
                                data:{designation:$(this).val(), id:id, _token:_token},
                                success:function(data)
                                {
                                    load_categories(_type);
                                    Snackbar.show({
                                            text: '<b>Catégorie modifiée !</b>',
                                            duration: 3000,
                                            actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                            actionTextColor: '#fff',
                                            backgroundColor: '#0076A8',
                                            pos: 'top-center'
                                    });
                                }
                            }); 
                        }
                    }
                    else if(keycode == '27')
                    {
                        load_categories(_type);
                    }
                });

                //deleting category .......................
                $(document).on('click', '.btn-delete-category', function(){
                    var id = $(this).attr('id'); //[---- id of category to delete ----]
                    var _type = $(this).attr('dataType');

                    swal({
                        title: 'Voulez-vous supprimer cette catégorie?',
                        text: "Toutes les sous-catégories seront supprimées.",
                        type: 'warning',
                        showCancelButton: true,
                        cancelButtonText: 'Annuler',
                        confirmButtonText: 'Oui, supprimer',
                        padding: '2em'
                    }).then(function(result) {
                        if (result.value) {
                            //then call ajax to delete .........................................
                            $.ajax({
                                url:'category/'+id,
                                type:"DELETE",
                                data:{_token:_token},
                                success:function(data)
                                {
                                    load_categories(_type);
                                    Snackbar.show({
                                        text: '<b>Catégorie supprimée !</b>',
                                        duration: 3000,
                                        actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#0076A8',
                                        pos: 'top-center'
                                    });
                                }
                            });
                        }
                    })
                });
            </script>
      @break

      @case('fournisseurs')
          <script>
                    $(document).ready(function() {
                        load_suppliers();
                        load_files($('#btn_show_upload_file').attr('target'));
                    });

                    function load_suppliers()
                    {
                        $.ajax({
                                url:"get-suppliers",
                                method:'GET',
                                beforeSend:function()
                                {
                                        $('#table').html('<div class="bg-white p-3 rounded"><div class="loader dual-loader mx-auto"></div><h5 class="mt-2 text-center">Chargement des données ...</h5></div>');
                                },
                                success:function(response)
                                {
                                    $('#table').html(response);
                                    callThDataTable();
                                }
                        });
                    }

                    function getPayments(currentD = 0)
                    {
                        $('.supplierPayment').empty();
                        $('.supplierPayment').append('<option value="" '+((currentD == 0)? 'selected': '')+' >-- Mode de paiement --</option>');
                        $.get('getPaymentmode', function(payments){
                            for(var payment of payments)
                            {
                                $('.supplierPayment').append('<option value="'+payment.designation+'" '+((currentD == payment.designation)? 'selected': '')+' >'+payment.designation+'</option>');
                            }
                        });
                    } 
                    
                    function getSupplier(id)
                    {
                        $.get('suppliers/'+id, function(supplier){
                            $('#suppliereditModal #form').val(supplier.id); 
                                $('#suppliereditModal #supplierCode').val(supplier.code);
                                $('#suppliereditModal #supplierName').val(supplier._name);
                                $('#suppliereditModal #supplierTel1').val(supplier.tel1);
                                $('#suppliereditModal #supplierTel2').val(supplier.tel2);
                                $('#suppliereditModal #supplierEmail').val(supplier.email);
                                $('#suppliereditModal #supplierWebsite').val(supplier.website);
                                $('#suppliereditModal #supplierAddress').val(supplier.address);
                                $('#suppliereditModal #supplierCity').val(supplier.city);
                                $('#suppliereditModal #supplierCountry').val(supplier.country);
                                $('#suppliereditModal #supplierTownship').val(supplier.township);
                                $('#suppliereditModal #supplierDistrict').val(supplier._district);
                                $('#suppliereditModal #supplierConditions').val(supplier.conditions);
                                $('#suppliereditModal #supplierNotes').val(supplier.notes);
                                $('#suppliereditModal #supplierLegalid').val(supplier.legal_id);
                                $('#suppliereditModal #supplierConditions').val(supplier.conditions);
                                $('#suppliereditModal #supplierBalance').val(supplier.current_balance);
                                $('#suppliereditModal #supplierBalancedate').val(returnDate(supplier.balance_date));
                                $('#suppliereditModal #supplierBank').val(supplier.bank_name);
                                if(supplier.e_document == 'yes'){$('#suppliereditModal #edocument').attr('checked', true);} 
                                else{$('#suppliereditModal #edocument').attr('checked', false);}
                                getPayments(supplier.payment_mode);
                                $('#suppliereditModal #supplierBankaccount').val(supplier.bank_account);
                                $('#suppliereditModalLabel').html('Modifier le fournisseur : '+supplier._name);
                                $('#suppliereditModal').modal('show');
                        });
                    }

                    $(document).on('click', '.btn-edit-supplier', function(){
                        getSupplier($(this).attr("id"));
                    });
                    
                    $(document).on('submit', '#supplierAddForm', function(e){
                        e.preventDefault();
                        let form_data = $(this).serialize();

                        $.ajax({
                                url:"add-supplier",
                                method:'POST',
                                data:form_data,
                                success:function(response)
                                {
                                    if(response == '_name_error')
                                    {
                                        swal('','Le nom du fournisseur est requis!','error');
                                    }
                                    else{
                                        load_suppliers();
                                        $('#supplierAddForm')[0].reset();
                                        $('#supplierModal').modal('hide');
                                        Snackbar.show({
                                            text: '<b>Nouveau fournisseur créé !</b>',
                                            duration: 3000,
                                            actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                            actionTextColor: '#fff',
                                            backgroundColor: '#0076A8',
                                            pos: 'top-center'
                                        });
                                    }
                                }
                        });
                    });

                    $(document).on('submit', '#supplierEditForm', function(e){
                        e.preventDefault();
                        let form_data = $(this).serialize();

                        $.ajax({
                                url:"edit-supplier",
                                method:'POST',
                                data:form_data,
                                success:function(response)
                                {
                                    if(response == '_name_error')
                                    {
                                    swal('','Le nom du fournisseur est requis!','error');
                                    }
                                    else{
                                    load_suppliers();
                                    $('#supplierEditForm')[0].reset();
                                    $('#suppliereditModal').modal('hide');
                                    Snackbar.show({
                                            text: '<b>Fournisseur mis à jour !</b>',
                                            duration: 3000,
                                            actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                            actionTextColor: '#fff',
                                            backgroundColor: '#0076A8',
                                            pos: 'top-center'
                                        });
                                    }
                                }
                        });
                    });

                    //deleting supplier .......................
                    $(document).on('click', '.btn-delete-supplier', function(){
                        var id = $(this).attr('id'); //[---- id of category to delete ----]

                        swal({
                            title: 'Voulez-vous supprimer ce fournisseur?',
                            text: "Cette opération est irréversible.",
                            type: 'warning',
                            showCancelButton: true,
                            cancelButtonText: 'Annuler',
                            confirmButtonText: 'Oui, supprimer',
                            padding: '2em'
                        }).then(function(result) {
                            if (result.value) {
                            //then call ajax to delete .........................................
                            $.ajax({
                                url:'supplier/'+id,
                                type:"DELETE",
                                data:{_token:_token},
                                success:function(data)
                                {
                                    load_suppliers();
                                    Snackbar.show({
                                            text: '<b>Le fournisseur a été supprimé !</b>',
                                            duration: 3000,
                                            actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                            actionTextColor: '#fff',
                                            backgroundColor: '#0076A8',
                                            pos: 'top-center'
                                        });
                                }
                            });
                            }
                        })
                    });

                    $(document).on('click', '#add-supplier', function(){
                        $('#supplierAddForm')[0].reset();
                        getCategories(0);
                        getPayments(0);
                    }); 

                    $(document).on('click', '#btn-import', function(){
                            $('#init_content').html('<form id="uploadForm" enctype="multipart/form-data">{{ csrf_field() }}<h6 class="mb-3">Suivez les étapes ci-dessous ...</h6><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 1 : Téléchargez le modèle Linnasoft</h6><p class="mt-3">Pour commencer, téléchargez notre modèle EXCEL configuré pour importer vos données dans l\'application Linnasoft.</p><a href="{{ asset("assets/local_fl/linnasoft_tiers_template.xlsx") }}" class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Télécharger le modèle</a></div><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 2 : Copiez vos <span class="dataUpload">fournisseurs</span> dans le modèle</h6><p class="mt-3">Ouvrez le modèle avec Microsoft Excel, copiez ensuite vos données dans le tableur.</p><p class="text-danger"><b>Important :</b> si vos données contiennent des en-têtes, retirez les et gardez uniquement les en-têtes du modèle.</p></div><div class="mb-4"><h6 class="text-bold">Etape 3 : Chargez le modèle contenant vos <span class="dataUpload">fournisseurs</span></h6><span class="text-color-linna1 text-bold">Vous pouvez importer un maximum de 1000 lignes à la fois !</span> (formats attendus : xlsx, xls, csv)<p class="mt-3"><div class="custom-file-container" data-upload-id="myFirstImage"><label class="custom-file-container__custom-file" ><input type="file" class="custom-file-container__custom-file__custom-file-input border" accept=".csv, .xls, .xlsx" id="file" name="file" dataType="" targetURL="import-suppliers"><input type="hidden" name="MAX_FILE_SIZE" value="10485760" /><span class="custom-file-container__custom-file__custom-file-control"></span></label></div><div id="div_file_to_upload"></div></p></div><div class="modal-footer"><input type="hidden" name="_type" id="_type" /><button class="btn btn-light" data-dismiss="modal">Annuler</button><button type="submit" class="btn btn-info">Importer</button></form>');
                            $('#uploadModalTitle').html('Importer vos fournisseurs');

                            $('#file').removeClass('border-danger');
                            $('#file').val('');
                    });            
                    
                    $(document).on('click', '#btn_retry_upload', function(){
                            $('#init_content').html('<form id="uploadForm" enctype="multipart/form-data">{{ csrf_field() }}<h6 class="mb-3">Suivez les étapes ci-dessous ...</h6><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 1 : Téléchargez le modèle Linnasoft</h6><p class="mt-3">Pour commencer, téléchargez notre modèle EXCEL configuré pour importer vos données dans l\'application Linnasoft.</p><a href="{{ asset("assets/local_fl/linnasoft_tiers_template.xlsx") }}" class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Télécharger le modèle</a></div><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 2 : Copiez vos <span class="dataUpload">fournisseurs</span> dans le modèle</h6><p class="mt-3">Ouvrez le modèle avec Microsoft Excel, copiez ensuite vos données dans le tableur.</p><p class="text-danger"><b>Important :</b> si vos données contiennent des en-têtes, retirez les et gardez uniquement les en-têtes du modèle.</p></div><div class="mb-4"><h6 class="text-bold">Etape 3 : Chargez le modèle contenant vos <span class="dataUpload">fournisseurs</span></h6><span class="text-color-linna1 text-bold">Vous pouvez importer un maximum de 1000 lignes à la fois !</span> (formats attendus : xlsx, xls, csv)<p class="mt-3"><div class="custom-file-container" data-upload-id="myFirstImage"><label class="custom-file-container__custom-file" ><input type="file" class="custom-file-container__custom-file__custom-file-input border" accept=".csv, .xls, .xlsx" id="file" name="file" dataType="" targetURL="import-suppliers"><input type="hidden" name="MAX_FILE_SIZE" value="10485760" /><span class="custom-file-container__custom-file__custom-file-control"></span></label></div><div id="div_file_to_upload"></div></p></div><div class="modal-footer"><input type="hidden" name="_type" id="_type" /><button class="btn btn-light" data-dismiss="modal">Annuler</button><button type="submit" class="btn btn-info">Importer</button></form>');      
                    });

                    function load_files(supplier)
                    {
                        $.ajax({
                                headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url:'/achats/get-files/'+supplier,
                                method:'GET',
                                beforeSend:function()
                                {
                                    $('#fileuploadContent').html('<div class="text-center mt-2 mb-3"><div class="spinner-border text-success align-self-center loader-sm ">Loading...</div></div>');
                                },
                                success:function(response)
                                {
                                    $('#fileuploadContent').html(response.content);
                                    $('#counter_files').text(response.counter);
                                }
                        });
                    }

                    $(document).on('change', '#supplierFile', function(){
                        let formdata = new FormData();
                        let supplier = $(this).attr('data-target');
                        if($(this).prop('files').length > 0)
                        {
                            let file = $(this).prop('files')[0];
                            formdata.append("supplierFile", file);
                            
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: '/achats/storesupplierfile/'+supplier,
                                method: 'POST',
                                data: formdata,
                                contentType: false,
                                cache: false,
                                processData:false,
                                /*beforeSend:function()
                                {

                                },*/
                                success:function(response)
                                {
                                    if(response.type == 'error')
                                    {
                                        $('#errorContent').html('<div class="alert alert-outline-danger mb-1" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#b52c2c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 286.054 286.054" style="enable-background:new 0 0 286.054 286.054;" xml:space="preserve" width="20px" height="20px"><g><path style="fill:#E2574C;" d="M143.027,0C64.04,0,0,64.04,0,143.027c0,78.996,64.04,143.027,143.027,143.027c78.996,0,143.027-64.022,143.027-143.027C286.054,64.04,222.022,0,143.027,0z M143.027,259.236c-64.183,0-116.209-52.026-116.209-116.209S78.844,26.818,143.027,26.818s116.209,52.026,116.209,116.209S207.21,259.236,143.027,259.236z M143.036,62.726c-10.244,0-17.995,5.346-17.995,13.981v79.201c0,8.644,7.75,13.972,17.995,13.972c9.994,0,17.995-5.551,17.995-13.972V76.707C161.03,68.277,153.03,62.726,143.036,62.726z M143.036,187.723c-9.842,0-17.852,8.01-17.852,17.86c0,9.833,8.01,17.843,17.852,17.843s17.843-8.01,17.843-17.843C160.878,195.732,152.878,187.723,143.036,187.723z"/></g></svg> <span style="font-size:12px"><b>Oops !</b> '+response.msg+'</span></div>');
                                    }
                                    else
                                    {
                                        load_files(supplier);
                                    }
                                }
                            });
                        }
                    });

                    $(document).on('click', '.btn_delete_file', function(){
                        let id = $(this).attr('id');
                        let tok = $(this).attr('target-token');
                        let data = $(this).attr('target-data');

                        $.ajax({
                                url:'/achats/delete-file/'+id+'/'+tok,
                                type:"DELETE",
                                data:{_token:_token},
                                success:function(response)
                                {
                                    load_files(data);
                                }
                        });                        
                    });

                    $(document).on('click', '#btn_upload_file', function(){
                        $('#errorContent').empty();
                    });
          </script>
      @break

      @case('categorisation')
        <script>
            $(document).ready(function(){
                load_categories('cash_in');
                load_categories('cash_out');
                getCategories('cash_in',0);
                getThaccounts(0);
                load_rules();
            });

            function load_categories(_type)
            {
                $.ajax({
                    url:'get-categories/'+_type,
                    method:'GET',
                    beforeSend:function()
                    {
                        $('#'+_type+'_list').html('<div class="text-center pt-5"><div class="spinner-grow text-info align-self-center">Loading...</div></div>');
                    },
                    success:function(response)
                    {
                        $('#'+_type+'_list').html(response);
                    }
                });
            }
            
            function load_rules()
            {
                $.ajax({
                    url: 'getRules',
                    method: 'GET',
                    success:function(response)
                    {
                        $('#table').html(response);
                        callRDataTable()
                    }
                });
            }

            function getSubCategories(parent, type, fill)
            {
                $.ajax({
                    url: 'getSubCategories/'+parent+'/'+type,
                    method: 'GET',
                    success:function(response)
                    {
                        $(fill).html(response);
                    }
                });
            }

            //show/hide sub categories ................. 
            $(document).on('click', '.btn-wind', function(){
                let parent = $(this).attr('parent');
                let type = $(this).attr('type');

                if($('#sub-'+parent).html() == '')
                {
                    getSubCategories(parent, type, '#sub-'+parent)
                    $(this).empty();
                    $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>');
                }
                else 
                {
                    $('#sub-'+parent).html('');
                    $(this).empty();
                    $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>');
                }
            });

            //mouseover category div ...............
            $(document).on('mouseover', '.category-div', function(){
                let id = $(this).attr('id');
                let _type = $(this).attr('dataType');
                $('#btn-sub-cat'+id).html(' <a class="btn-sub-category" style="cursor:pointer;" dataType="'+_type+'" id="'+id+'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></a>');
            });

            //mouseleave category div ...............
            $(document).on('mouseleave', '.category-div', function(){
                let id = $(this).attr('id');
                $('#btn-sub-cat'+id).html('');
            });

            //adding sub category ...............
            $(document).on('click', '.btn-sub-category', function(){
                let id = $(this).attr('id');
                let _type = $(this).attr('dataType');
                $('.div-input-new-category').remove();

                $('#sub-'+id).append('<div class="pt-3 border-bottom pb-2 div-input-new-category"><input type="text" class="input-no-border input-new-category" autocomplete="off" placeholder="Entrer pour valider, Echap pour annuler" name="designation" parent="'+id+'" dataType="'+_type+'" /></div>');
                $('.input-new-category').focus();
            });

            //adding input to register new category .................
            $(document).on('click', '.btn-add-category', function(){
                $('.div-input-new-category').remove();
                var id = $(this).attr('id'); //[---- getting category type ==> cash_in | cash_out ----]
                
                $('#'+id+'_list').append('<div class="pt-3 border-bottom pb-2 div-input-new-category"><input type="text" class="input-no-border input-new-category" autocomplete="off" placeholder="Entrer pour valider, Echap pour annuler" name="designation" parent="null" dataType="'+id+'" /></div>'); //[---- adding new input to right category type ----]
                $('.input-new-category').focus(); //[---- setting focus() to current input ----]
            }); 

            //adding new category when user press [keycode.13] .................
            $(document).on('keyup', '.input-new-category', function(event){
                let cc = $(this).attr('dataType'); //[---- getting operation type ==> cash_in | cash_out ----]
                let parent = $(this).attr('parent');
                let keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                  if($(this).val() != '')
                  {
                      //then call ajax to insert .........................................
                      $.ajax({
                          url:"add-category",
                          type:"POST",
                          data:{designation:$(this).val(), data_type:cc, parent:parent, _token:_token},
                          success:function(response)
                          {
                                load_categories(cc);
                                Snackbar.show({
                                    text: '<b>'+response+'</b>',
                                    duration: 3000,
                                    actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                    actionTextColor: '#fff',
                                    backgroundColor: '#0076A8',
                                    pos: 'top-center'
                                });
                          }
                      }); 
                  }
                }
                else if(keycode == '27')
                {
                    $('.div-input-new-category').remove();
                }
            });

            //creating input to update category .......................
            $(document).on('click', '.btn-edit-category', function(){
                //load_categories($(this).attr('dataType'));
                let id = $(this).attr('id'); //[---- id of category to update ----]
                let category_text = $('#text-category-'+id).text(); //[---- designation of category to update ----]

                $('#content-category-'+id).empty();
                $('#content-category-'+id).html('<input type="text" class="input-no-border input-edit-category" id="edit-input-'+id+'" data-category-id="'+id+'" data-type="'+$(this).attr('dataType')+'" />');
                $('#edit-input-'+id).focus();
                $('#edit-input-'+id).val(category_text);
            });

            //editing category when user press [keycode.13] .................
            $(document).on('keyup', '.input-edit-category', function(event){
                    let id = $(this).attr('data-category-id'); 
                    let _type = $(this).attr('data-type');
                    let keycode = (event.keyCode ? event.keyCode : event.which);
                    if(keycode == '13'){
                        if($(this).val() != '')
                        {
                            //then call ajax to insert .........................................
                            $.ajax({
                                url:"edit-category",
                                type:"PUT",
                                data:{designation:$(this).val(), id:id, _token:_token},
                                success:function(response)
                                {
                                    load_categories(_type);
                                    load_rules();
                                    Snackbar.show({
                                        text: '<b>'+response+'</b>',
                                        duration: 3000,
                                        actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#0076A8',
                                        pos: 'top-center'
                                    });
                                }
                            }); 
                        }
                    }
                    else if(keycode == '27')
                    {
                        load_categories(_type);
                    }
            });

            //deleting category .......................
            $(document).on('click', '.btn-delete-category', function(){
                    let id = $(this).attr('id'); //[---- id of category to delete ----]
                    let _type = $(this).attr('dataType');

                    swal({
                        title: 'Voulez-vous supprimer cette catégorie?',
                        text: "Toutes les sous-catégories seront supprimées.",
                        type: 'warning',
                        showCancelButton: true,
                        cancelButtonText: 'Annuler',
                        confirmButtonText: 'Oui, supprimer',
                        padding: '2em'
                    }).then(function(result) {
                        if (result.value) {
                            //then call ajax to delete .........................................
                            $.ajax({
                                url:'category/'+id,
                                type:"DELETE",
                                data:{_token:_token},
                                success:function(response)
                                {
                                    load_categories(_type);
                                    load_rules();
                                    Snackbar.show({
                                            text: '<b>'+response+'</b>',
                                            duration: 3000,
                                            actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                            actionTextColor: '#fff',
                                            backgroundColor: '#0076A8',
                                            pos: 'top-center'
                                    });
                                }
                            });
                        }
                    })
            });

            //adding conditions rows .................
            var conditions = 0;
            $(document).on('click', '.btn-add-condition', function(){
                let id = $(this).attr('id');
                let cd_case = $('#'+id+' #cd_case').val();

                conditions++;
                $('#'+id+' #conditions-content').append('<div class="form-row condition-row" id="condition'+conditions+'">'+((conditions > 1)? '<div class="col-12 mb-2"><label class="text-dark text-bold cd_case_operator">'+((cd_case == 'any')? 'Ou': 'Et')+'</label></div>': '')+'<div class="col-12 col-md-3 mb-4"><select name="label'+conditions+'" id="label'+conditions+'" class="form-control title_label"><option value="title_label">Intitulé</option><option value="amount_label">Montant</option><option value="date_label">Date de règlement</option></select></div><div class="col-12 col-md-3 mb-4"><select name="operator'+conditions+'" id="operator'+conditions+'" class="form-control operator_condition"><option value="contains">Contient</option><option value="not-contains">Ne contient pas</option><option value="equal">Correspond exactement à</option></select></div><div class="col-12 col-md-3 mb-4" id="content-condition-value'+conditions+'"><input class="form-control" name="value'+conditions+'" id="value'+conditions+'"></div>'+((conditions > 1)? '<button class="btn-custom-light bg-white text-dark mb-2 btn-remove-condition" type="button" id="'+conditions+'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>': '')+'</div>');
            });

            function getRules(id, action, fill)
            {
                $.ajax({
                    url: 'rules/'+id+'/'+action,
                    method: 'GET',
                    success:function(response)
                    {
                        $('#bodyeditModal').html(response);
                        $(fill+'Label').text((action == 'duplicate')? 'Dupliquer la règle': 'Modifier la règle');
                        $(fill).modal('show');
                    }
                });
            }  

            $(document).on('click', '.btn-editduplicate-rule', function(){
                let id = $(this).attr('id');
                let op = $(this).attr('dataOp');
                let cdt = $(this).attr('data-conditions');
                getRules(id, op, '#ruleeditModal');
                conditions = cdt;
            });

            $(document).on('change', '.title_label', function(){
                let id = $(this).attr('id');
                let condition_id = id.substr(5);
                $('#operator'+condition_id).empty();
                if($(this).val() == 'title_label')
                {
                    $('#operator'+condition_id).append('<option value="contains">Contient</option><option value="not-contains">Ne contient pas</option><option value="equal">Correspond exactement à</option>');

                    $('#content-condition-value'+condition_id).html('<input type="text" class="form-control datepicker" name="value'+condition_id+'" id="value'+condition_id+'">')
                }
                else if($(this).val() == 'amount_label')
                {
                    $('#operator'+condition_id).append('<option value="equal">Est égal à</option><option value="superior">Est supérieur à</option><option value="inferior">Est inférieur à</option><option value="different">Est différent de</option>');

                    $('#content-condition-value'+condition_id).html('<input type="text" class="form-control datepicker" name="value'+condition_id+'" id="value'+condition_id+'">');
                }
                else if($(this).val() == 'date_label'){
                    $('#operator'+condition_id).append('<option value="between">Est comprise entre</option><option value="superior">Est postérieure au</option><option value="inferior">Est antérieure au</option>');
                    
                    $('#content-condition-value'+condition_id).html('<div class="form-row"><div class="col-6"><input class="form-control input-100" name="valueBegin'+condition_id+'" placeholder="le ..." id="valueBegin'+condition_id+'" type="number" min="1" max="31"></div> <div class="col-6"><input class="form-control input-100" placeholder="et le ..." name="valueEnd'+condition_id+'" id="valueEnd'+condition_id+'" type="number" min="1" max="31"></div></div>');
                }
            });

            $(document).on('change', '.operator_condition', function(){
                let id = $(this).attr('id');
                let condition_id = id.substr(8);

                $('#content-condition-value'+condition_id).empty();
                if($(this).val() == 'between')
                {
                    $('#content-condition-value'+condition_id).html('<div class="form-row"><div class="col-6"><input class="form-control input-100" name="valueBegin'+condition_id+'" placeholder="le ..." id="valueBegin'+conditions+'" type="number" min="1" max="31"></div> <div class="col-6"><input class="form-control input-100" placeholder="et le ..." name="valueEnd'+condition_id+'" id="valueEnd'+condition_id+'" type="number" min="1" max="31"></div></div>');
                }
                else
                {
                    $('#content-condition-value'+condition_id).html('<input type="text" class="form-control datepicker" name="value'+condition_id+'" id="value'+condition_id+'">');
                }
            });

            //removing conditions rows ....................
            $(document).on('click', '.btn-remove-condition', function(){
                $('#condition'+$(this).attr('id')).remove();
            });

            //on condition case changing, change operator ....................
            $(document).on('change', '#cd_case', function(){
                if($(this).val() == 'any'){$('.cd_case_operator').text('Ou');}else{$('.cd_case_operator').text('Et');}
            });

            //checking rule applying ....................
            $(document).on('change', '.auto-apply-btn', function(){
                if($(this).is(':checked')){
                    $('.auto-apply-text').html('<b>Cette règle doit s\'appliquer automatiquement</b>');
                }
                else{
                    $('.auto-apply-text').html('<b>Toujours demander confirmation avant d\'appliquer cette règle</b>');
                }
            });

            function getCategories(_type, currentId=0)
            {
                $.ajax({
                    url:'ruleCategories/'+_type,
                    method:'GET',
                    success:function(response)
                    {   $('.ruleCategory').empty();
                        $('.ruleCategory').append('<option value="" '+((currentId == 0)? 'selected': '')+'>-- Catégorie --</option>');
                        for(let rule_category of response)
                        {
                            $('.ruleCategory').append('<option value="'+rule_category.id+'" '+((currentId == rule_category.id)? 'selected': '')+' >'+rule_category.designation+'</option>');
                        }
                    }
                });
            }

            function getThaccounts(currentId=0)
            {
                $.ajax({
                    url:'getAccounts',
                    method:'GET',
                    success:function(response)
                    {   $('.ruleThaccount').empty();
                        $('.ruleThaccount').append('<option value="" '+((currentId == 0)? 'selected': '')+'>-- Liste des tiers --</option>');
                        for(let th_account of response)
                        {
                            $('.ruleThaccount').append('<option value="'+th_account.id+'" '+((currentId == th_account.id)? 'selected': '')+'>'+th_account._name+'</option>');
                        }
                    }
                });
            }
            
            $(document).on('change', '#operation_type', function(){
                getCategories($(this).val());
            });
            
            $(document).on('click', '#btn-rule-modal', function(){
                $('#ruleForm')[0].reset();
                $('#conditions-content').empty();
                conditions = 0;
                getCategories('cash_in',0);
                getThaccounts(0);
            });

            $(document).on('click', '.btn-delete-rule', function(){
                let id = $(this).attr('id');
                
                swal({
                    title: 'Voulez-vous supprimer cette règle?',
                    text: "Cette opération est irréversible.",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Annuler',
                    confirmButtonText: 'Oui, supprimer',
                    padding: '2em'
                }).then(function(result) {
                    if (result.value) {
                        //then call ajax to delete .........................................
                        $.ajax({
                            url:'delete-rule/'+id,
                            type:"DELETE",
                            data:{_token:_token},
                            success:function(response)
                            {
                                load_rules();
                                Snackbar.show({
                                    text: '<b>'+response+'</b>',
                                    duration: 3000,
                                    actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                    actionTextColor: '#fff',
                                    backgroundColor: '#0076A8',
                                    pos: 'top-center'
                                });
                            }
                        });
                    }
                })

            });

            $(document).on('submit', '#ruleForm', function(e){
                e.preventDefault();
                $('#ruleForm #col').val(conditions);

                $.ajax({
                    url: 'addRule',
                    method: 'POST',
                    data: $(this).serialize(),
                    success:function(response)
                    {
                        if(response == '_err'){swal('','Une erreur s\'est produite, veuillez réessayer!','error');}
                        else if(response == '_cond'){swal('','Aucune condition trouvée !','error');}

                        else if(response == 'done')
                        {
                            $('#ruleForm')[0].reset();
                            $('#ruleForm #conditions-content').empty();
                            conditions = 0;
                            $('#ruleModal').modal('hide');
                            load_rules();
                            Snackbar.show({
                                text: '<b>Nouvelle règle créé !</b>',
                                duration: 3000,
                                actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                actionTextColor: '#fff',
                                backgroundColor: '#0076A8',
                                pos: 'top-center'
                            });
                        }
                    }
                });
            });

            $(document).on('submit', '#ruleeditForm', function(e){
                e.preventDefault();
                $('#ruleeditForm #col').val(conditions);

                $.ajax({
                    url: 'edit_duplicateRule',
                    method: 'PUT',
                    data: $(this).serialize(),
                    success:function(response)
                    {
                        if(response == '_err'){swal('','Une erreur s\'est produite, veuillez réessayer!','error');}
                        else if(response == '_cond'){swal('','Aucune condition trouvée !','error');}

                        else
                        {
                            $('#ruleeditForm')[0].reset();
                            $('#ruleeditForm #conditions-content').empty();
                            conditions = 0;
                            $('#ruleeditModal').modal('hide');
                            load_rules();
                            Snackbar.show({
                                text: '<b>'+response+'</b>',
                                duration: 3000,
                                actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                actionTextColor: '#fff',
                                backgroundColor: '#0076A8',
                                pos: 'top-center'
                            });
                        }
                    }
                });
            });
        </script>
      @break

      @case('transactions')
        <script>
            var today = new Date();
            var currentDate = $('#btn-filter').attr('currentDate');
            var yearDate = '01-01-'+$('#btn-filter').attr('currentYear');;

            $(document).ready(function(){
                load_transactions();
                $('#filter_date_start').val(yearDate);
                $('#filter_date_end').val(currentDate);
                $('#filter_date').val('current_year');
            });

            function load_transactions(filter_date_start = 0, filter_date_end = 0)
            {
                let start = (filter_date_start == 0)? yearDate: filter_date_start;
                let end = (filter_date_end == 0)? currentDate: filter_date_end;

                $.ajax({
                    url: 'get-transactions/'+start+'/'+end,
                    method: 'GET',
                    beforeSend:function()
                    {
                        $('#num-content').html('<div class="bg-white p-3 rounded shadow"><div class="loader dual-loader mx-auto"></div><h5 class="mt-2 text-center">Chargement de la page ...</h5></div>');
                        $('#num-content').attr('style', 'position:absolute;top:50%;left:40%');
                    },
                    success:function(response)
                    {
                        $('#num-content').attr('style', '');
                        $('#num-content').empty();
                        $('#num-content').html(response);
                        callTransactionsDataTable();
                    }
                });
            }

            $(document).on('click', '.btn-delete-transaction', function(){
                let id = $(this).attr('id');

                swal({
                        title: 'Voulez-vous supprimer cette transaction?',
                        text: "Cette opération est irréversible.",
                        type: 'warning',
                        showCancelButton: true,
                        cancelButtonText: 'Annuler',
                        confirmButtonText: 'Oui, supprimer',
                        padding: '2em'
                    }).then(function(result) {
                        if (result.value) {
                            //then call ajax to delete .........................................
                            $.ajax({
                                url:'delete-transaction/'+id,
                                type:"DELETE",
                                data:{_token:_token},
                                success:function(response)
                                {
                                    load_transactions();
                                    Snackbar.show({
                                            text: '<b>'+response+'</b>',
                                            duration: 3000,
                                            actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                            actionTextColor: '#fff',
                                            backgroundColor: '#0076A8',
                                            pos: 'top-center'
                                    });
                                }
                            });
                        }
                    })
            });

            $(document).on('click', '#btn-filter', function(){
                if($('#filter-content').hasClass('d-none'))
                {
                    $('#filter-content').removeClass('d-none');
                }
                else
                {
                    $('#filter-content').addClass('d-none');
                }
            });

            $(document).on('click', '#btn-reset-filter', function(){
                load_transactions();
                $('#filter_date_start').val(yearDate);
                $('#filter_date_end').val(currentDate);
                $('#filter_date').val('current_year');
            });

            $(document).on('change', '#filter_date', function(){
                let _val = $(this).val();
                let start = '';
                let end = '';

                switch(_val){
                    case 'current_year':
                       start = yearDate;
                       end = currentDate;
                    break;
                    case 'previous_year':
                        start = '01-01-'+($('#btn-filter').attr('currentYear') - 1);
                        end = '31-12-'+($('#btn-filter').attr('currentYear') - 1);
                    break;
                    case 'current_day':
                        start = end = currentDate;
                    break;
                }

                $('#filter_date_start').val(start);
                $('#filter_date_end').val(end);
                //load_transactions(start, end);
            });

            $(document).on('click', '#btn-apply-filter', function(){
                load_transactions($('#filter_date_start').val(),$('#filter_date_end').val());
            });

            function leapYear(year)
            {
                if((year%4 == 0 && year%100 != 0) || year%400 == 0)
                {
                    return true;
                }
                else { return false; }
            }

            function getMonthLastDay(month, year)
            {
                switch(month)
                {
                    case 1:
                        return 31;
                    break;
                    case 2:
                        if(leapYear(year)){ return 29;} else{ return 28; }
                    break;
                    case 3:
                        return 31;
                    break;
                    case 4:
                        return 30;
                    break;
                    case 5:
                        return 31;
                    break;
                    case 6:
                        return 30;
                    break;
                    case 7:
                        return 31;
                    break;
                    case 8:
                        return 31;
                    break;
                    case 9:
                        return 30;
                    break;
                    case 10:
                        return 31;
                    break;
                    case 11:
                        return 30;
                    break;
                    case 12:
                        return 31;
                    break;
                }
            }

            function completeText(text, size, elt)
            {
                let complete = '';
                if(text.length < size)
                {
                    for(let i=0;i<(size-text.length);i++)
                    {
                        complete += elt;
                    }
                }
                return complete+text;
            }

            function getCategories(type, currentId = 0)
            {
                $('.transaction_category').empty();
                $('.transaction_category').append('<option value="" '+((currentId == 0)? 'selected': '')+' >-- Catégorie --</option>');
                $.get('getCategories/'+type, function(categories){
                    for(var category of categories)
                    {
                        $('.transaction_category').append('<option value="'+category.id+'" '+((currentId == category.id)? 'selected': '')+' >'+category.designation+'</option>');
                    }
                });
            } 

            function getPayments(currentD = 0)
            {
                $('.transaction_payment_mode').empty();
                $('.transaction_payment_mode').append('<option value="" '+((currentD == 0)? 'selected': '')+' >-- Mode de paiement --</option>');
                $.get('getPaymentmode', function(payments){
                    for(var payment of payments)
                    {
                        $('.transaction_payment_mode').append('<option value="'+payment.designation+'" '+((currentD == payment.designation)? 'selected': '')+' >'+payment.designation+'</option>');
                    }
                });
            }

            function getAccounts(currentId = 0)
            {
                $('.transaction_th_account').empty();
                $('.transaction_th_account').append('<option value="" '+((currentId == 0)? 'selected': '')+' >-- Compte tiers --</option>');
                $.get('getAccounts', function(accounts){
                    for(let account of accounts)
                    {
                        $('.transaction_th_account').append('<option value="'+account.id+'" '+((currentId == account.id)? 'selected': '')+' >'+account._name+' | '+((account.account_type == 'supplier')? 'Fournisseur': 'Client')+'</option>');
                    }
                });
            }

            function getVTA(currentId = 0)
            {
                $('.transaction_vta').empty();
                $('.transaction_vta').append('<option value="" '+((currentId == 0)? 'selected': '')+' >0%</option>');
                $.get('getVTA', function(vtaList){
                    for(var vta of vtaList)
                    {
                        $('.transaction_vta').append('<option value="'+vta.value+'" '+((currentId == vta.value)? 'selected': '')+' >'+vta.value+'%</option>');
                    }
                });
            }

            // ....................
            $(document).on('change', '.status_checkbox', function(){
                if($(this).is(':checked')){
                    $('.status_text').html('<b>Payé</b>');
                }
                else{
                    $('.status_text').html('<b>Impayé</b>');
                }
            });
            
            $(document).on('click', '.btnTransaction', function(){
                let target = $(this).attr('data-transaction');
                let type = $(this).attr('data-type');

                $('#newtransactionForm')[0].reset();
                $('#newTransactionTitle').text(target);
                getCategories(type, 0);
                getAccounts(0);
                getPayments(0);
                getVTA(0);
                $('#t_t').val(type);
            });

            function getModalTransaction(id, action) 
            {
                $.get('transaction/'+id, function(transaction){
                    $('#transactioneditForm #transaction_label').val(transaction.label); 
                    $('#transactioneditForm #transaction_amount').val(transaction.amount); 
                    $('#transactioneditForm #transaction_notes').val(transaction.notes); 
                    $('#transactioneditForm #transaction_payment_date').val(returnDate(transaction.payment_date)); 
                    if(transaction.status == 'Payé'){$('#transactioneditModal #status_checkbox').attr('checked', true);} 
                    else{$('#transactioneditModal #status_checkbox').attr('checked', false);}
                    $('#transactioneditForm #transaction_ref_num').val(transaction.ref_number); 
                    $('#transactioneditForm #transaction_value_date').val((transaction.value_date == null)? '': returnDate(transaction.value_date)); 
                    getCategories(transaction.transaction_type ,transaction.category);
                    getPayments(transaction.payment_mode);
                    getVTA(transaction.vta);
                    getAccounts(transaction.th_account);
                    $('#transactioneditForm .status_text').text(transaction.status);
                    $('#transactionTitle').text((action == 'duplicate')? 'Dupliquer la transaction': 'Modifier la transaction');
                    $('#transactioneditForm #t_t').val(transaction.transaction_type);
                    $('#transactioneditForm #transaction').val(transaction.id);
                    $('#transactioneditForm #op').val(action);
                    $('#transactioneditModal').modal('show');
                });
            } 

            function getCategoryById(id)
            {
                $.ajax({
                    url: 'category/'+id,
                    method: 'GET',
                    dataType: 'JSON',
                    success:function(response)
                    {
                        $('#occurrenceCategory').text((response.designation == null)? 'Introuvable': response.designation);
                    }
                });
            }

            function getOccurrenceTransaction(id, row) 
            {
                $.get('transaction/'+id, function(transaction){
                    $('#transactionOccurrenceToast').html('<div class="myToast shadow-lg" id="draggable"><div class="myToastHeader"><h6><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg> Occurrence detectée <button class="btn-custom-light bg-white float-right btn_close_occurrence_view" id=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#aaa8a8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button></h6></div><div class="myToastBody"><div class="border-gray rounded mb-3 p-2"><div class="row ml-1"><span class="bg-gray rounded pt-2 pr-2 pl-2">'+((transaction.transaction_type == 'cash_out')? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d52727" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>': '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#42b219" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>')+'</span> <div class="ml-3"><span><b>'+((transaction.transaction_type == 'cash_out')? 'Décaissement': 'Encaissement')+'</b></span><br><span class="text-danger"><b>'+numeral(transaction.amount).format('0,0')+'</b> <span class="badge badge-info">'+transaction.status+'</span></span></div></div></div><div class="mb-3"><span class="text-dark"><b>Intitulé de l\'opération</b></span><br><span class="text-gray d-inline-block text-truncate" style="max-width:280px">'+transaction.label+'</span></div><div class="mb-3"><span class="text-dark"><b>Date</b></span><br><span class="text-gray">'+returnDate(transaction.payment_date)+'</span></div><div class="mb-3"><span class="text-dark"><b>Catégorie</b></span><br><span class="text-gray d-inline-block text-truncate" style="max-width:280px" id="occurrenceCategory"></span></div><div class="mb-3"><span class="text-dark"><b>Payé par</b></span><br><span class="text-gray d-inline-block text-truncate" style="max-width:280px">'+((transaction.payment_mode == null)? '...': transaction.payment_mode)+'</span></div></div><div class="myToastFooter"><button class="btn btn-light border" id="btn_remove_transaction_occurrence" data-row="'+row+'">Retirer</button><button class="btn btn-primary btn_close_occurrence_view">Approuver</button></div></div>');
                    getCategoryById(transaction.category);
                    $( "#draggable" ).draggable({ cursor: "move" });
                });
            }  

            $(document).on('click', '.btn_close_occurrence_view', function(){
                $('#transactionOccurrenceToast').empty();
            });

            $(document).on('click', '#btn_remove_transaction_occurrence', function(){
                let row = $(this).attr('data-row');
                $('#transactionOccurrenceToast').empty();
                $('#row_to_import'+row).remove();
            });

            $(document).on('click', '.btn-edit-transaction', function(){
                let id = $(this).attr('id');
                let op = $(this).attr('data-op');
                getModalTransaction(id, op);
            });

            $(document).on('click', '.btn-duplicate-transaction', function(){
                let id = $(this).attr('id');
                let op = $(this).attr('data-op');
                getModalTransaction(id, op);
            });

            function getOccurrences(type,label,amount,date,category,form_data,url,form,modal)
            {
                $.ajax({
                    url: 'getOccurrences',
                    method: 'POST',
                    dataType: 'text',
                    data: {transaction_label:label, transaction_amount:amount, transaction_payment_date:date, transaction_category:category, t_t:type, _token:_token},
                    success:function(response)
                    {
                    /** */
                        if(response == 'label')
                        {
                            swal('', 'L\'intitulé est requis !', 'error');
                        }
                        else if(response == 'amount')
                        {
                            swal('', 'Le montant est une valeur numérique positive !', 'error');
                        }
                        else if(response == 'date')
                        {
                            swal('', 'La date de paiement est requise !', 'error');
                        }
                        else if(response == 'op')
                        {
                            swal('', 'Opération inconnue !', 'error');
                        }
                    /** */
                        else
                        {
                            if(parseInt(response) > 0)
                            {
                                swal({
                                    title: (parseInt(response) == 1)? 'Une occurrence de cette opération a été detectée !': response+' occurrences de cette opération ont été detectées !',
                                    text: "Souhaitez vous l'enregistrer ?",
                                    type: 'warning',
                                    showCancelButton: true,
                                    cancelButtonText: 'Annuler',
                                    confirmButtonText: 'Je confirme',
                                    padding: '2em'
                                }).then(function(result) {
                                    if (result.value) {
                                        $.ajax({
                                            url:url,
                                            method:'POST',
                                            data:form_data,
                                            success:function(response)
                                            {
                                                if(response == 'saved')
                                                {
                                                    load_transactions();
                                                    $(form)[0].reset();
                                                    $(modal).modal('hide');
                                                    Snackbar.show({
                                                        text: '<b>Transaction enregistrée avec succès !</b>',
                                                        duration: 3000,
                                                        actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                                        actionTextColor: '#fff',
                                                        backgroundColor: '#0076A8',
                                                        pos: 'top-center'
                                                    });
                                                }
                                                else if(response == 'edited')
                                                {
                                                    load_transactions();
                                                    $(form)[0].reset();
                                                    $(modal).modal('hide');
                                                    Snackbar.show({
                                                        text: '<b>Transaction modifiée avec succès !</b>',
                                                        duration: 3000,
                                                        actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                                        actionTextColor: '#fff',
                                                        backgroundColor: '#0076A8',
                                                        pos: 'top-center'
                                                    });
                                                }
                                                else if(response == 'duplicated')
                                                {
                                                    load_transactions();
                                                    $(form)[0].reset();
                                                    $(modal).modal('hide');
                                                    Snackbar.show({
                                                        text: '<b>Transaction dupliquée avec succès !</b>',
                                                        duration: 3000,
                                                        actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                                        actionTextColor: '#fff',
                                                        backgroundColor: '#0076A8',
                                                        pos: 'top-center'
                                                    });
                                                }
                                                else{
                                                    swal('',response,'error');
                                                }
                                            }
                                        });
                                    }
                                })
                            }
                            else
                            {
                                $.ajax({
                                    url:url,
                                    method:'POST',
                                    data:form_data,
                                    success:function(response)
                                    {
                                        if(response == 'saved')
                                        {
                                            load_transactions();
                                            $(form)[0].reset();
                                            $(modal).modal('hide');
                                            Snackbar.show({
                                                text: '<b>Transaction enregistrée avec succès !</b>',
                                                duration: 3000,
                                                actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                                actionTextColor: '#fff',
                                                backgroundColor: '#0076A8',
                                                pos: 'top-center'
                                            });
                                        }
                                        else if(response == 'edited')
                                        {
                                            load_transactions();
                                            $(form)[0].reset();
                                            $(modal).modal('hide');
                                            Snackbar.show({
                                                text: '<b>Transaction modifiée avec succès !</b>',
                                                duration: 3000,
                                                actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                                actionTextColor: '#fff',
                                                backgroundColor: '#0076A8',
                                                pos: 'top-center'
                                            });
                                        }
                                        else if(response == 'duplicated')
                                        {
                                            load_transactions();
                                            $(form)[0].reset();
                                            $(modal).modal('hide');
                                            Snackbar.show({
                                                text: '<b>Transaction dupliquée avec succès !</b>',
                                                duration: 3000,
                                                actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                                actionTextColor: '#fff',
                                                backgroundColor: '#0076A8',
                                                pos: 'top-center'
                                            });
                                        }
                                        else{
                                            swal('',response,'error');
                                        }
                                    }
                                });
                            }
                        }
                    }
                });
            }

            $(document).on('submit', '#newtransactionForm', function(e){
                e.preventDefault();

                let label = $('#newtransactionForm #transaction_label').val();
                let amount = $('#newtransactionForm #transaction_amount').val();
                let date = $('#newtransactionForm #transaction_payment_date').val();
                let type = $('#newtransactionForm #t_t').val();
                let category = $('#newtransactionForm #transaction_category').val();
                let form_data = $(this).serialize();
                let form = '#newtransactionForm';
                let modal = '#transactionModal';

                getOccurrences(type, label, amount, date, category, form_data, 'add-transaction', form, modal);
            });

            $(document).on('submit', '#transactioneditForm', function(e){
                e.preventDefault();

                let label = $('#transactioneditForm #transaction_label').val();
                let amount = $('#transactioneditForm #transaction_amount').val();
                let date = $('#transactioneditForm #transaction_payment_date').val();
                let type = $('#transactioneditForm #t_t').val();
                let category = $('#transactioneditForm #transaction_category').val();
                let form_data = $(this).serialize();
                let form = '#transactioneditForm';
                let modal = '#transactioneditModal';

                getOccurrences(type, label, amount, date, category, form_data, 'edit_duplicateTransaction', form, modal);
            });

            $(document).on('click', '.btn_import_choice', function(){
                let target = $(this).attr('target');
                let link = '';
                $('#uploadModalTitle').html('Importer vos transactions');
                switch(target)
                {
                    case ('cash_in'):
                        link = '{{ asset("assets/local_fl/linnasoft_type_transactions_template.xlsx") }}';
                    break;
                    case ('cash_out'):
                        link = '{{ asset("assets/local_fl/linnasoft_type_transactions_template.xlsx") }}';
                    break;
                    case 'all':
                        link = '{{ asset("assets/local_fl/linnasoft_all_transactions_template.xlsx") }}';
                    break;
                }
                $('#init_content').html('<form id="uploadForm" enctype="multipart/form-data">{{ csrf_field() }}<h6 class="mb-3">Suivez les étapes ci-dessous ...</h6><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 1 : Téléchargez le modèle Linnasoft</h6><p class="mt-3">Pour commencer, téléchargez notre modèle EXCEL configuré pour importer vos données dans l\'application Linnasoft.</p><a href="'+link+'" class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Télécharger le modèle</a></div><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 2 : Copiez vos <span class="dataUpload">transactions</span> dans le modèle</h6><p class="mt-3">Ouvrez le modèle avec Microsoft Excel, copiez ensuite vos données dans le tableur.</p><p class="text-danger"><b>Important :</b> si vos données contiennent des en-têtes, retirez les et gardez uniquement les en-têtes du modèle.</p></div><div class="mb-4"><h6 class="text-bold">Etape 3 : Chargez le modèle contenant vos <span class="dataUpload">transactions</span></h6><span class="text-color-linna1 text-bold">Vous pouvez importer un maximum de 1000 lignes à la fois !</span> (formats attendus : xlsx, xls, csv)<p class="mt-3"><div class="custom-file-container" data-upload-id="myFirstImage"><label class="custom-file-container_ _custom-file" ><input type="file" class="custom-file-container__custom-file__custom-file-input border" accept=".csv, .xls, .xlsx" id="file" name="file" dataType="'+target+'" targetURL="import-transactions"><input type="hidden" name="MAX_FILE_SIZE" value="10485760" /><span class="custom-file-container__custom-file__custom-file-control"></span></label></div><div id="div_file_to_upload"></div></p></div><div class="modal-footer"><input type="hidden" name="_type" id="_type" value="'+target+'" /><button class="btn btn-light" data-dismiss="modal">Annuler</button><button type="submit" class="btn btn-info">Importer</button></form>');
                $('#file').removeClass('border-danger');
                $('#file').val('');
                $('#importChoiceModal').modal('hide');
                $('#uploadModal').modal('show');
            });   

            $(document).on('click', '#btn_retry_upload', function(){
                let link = $(this).attr('data-link');
                let target = $(this).attr('data-type');

                switch(target)
                {
                    case ('cash_in'):
                        link = '{{ asset("assets/local_fl/linnasoft_type_transactions_template.xlsx") }}';
                    break;
                    case ('cash_out'):
                        link = '{{ asset("assets/local_fl/linnasoft_type_transactions_template.xlsx") }}';
                    break;
                    case 'all':
                        link = '{{ asset("assets/local_fl/linnasoft_all_transactions_template.xlsx") }}';
                    break;
                }

                $('#init_content').html('<form id="uploadForm" enctype="multipart/form-data">{{ csrf_field() }}<h6 class="mb-3">Suivez les étapes ci-dessous ...</h6><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 1 : Téléchargez le modèle Linnasoft</h6><p class="mt-3">Pour commencer, téléchargez notre modèle EXCEL configuré pour importer vos données dans l\'application Linnasoft.</p><a href="'+link+'" class="text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Télécharger le modèle</a></div><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 2 : Copiez vos <span class="dataUpload">transactions</span> dans le modèle</h6><p class="mt-3">Ouvrez le modèle avec Microsoft Excel, copiez ensuite vos données dans le tableur.</p><p class="text-danger"><b>Important :</b> si vos données contiennent des en-têtes, retirez les et gardez uniquement les en-têtes du modèle.</p></div><div class="mb-4"><h6 class="text-bold">Etape 3 : Chargez le modèle contenant vos <span class="dataUpload">transactions</span></h6><span class="text-color-linna1 text-bold">Vous pouvez importer un maximum de 1000 lignes à la fois !</span> (formats attendus : xlsx, xls, csv)<p class="mt-3"><div class="custom-file-container" data-upload-id="myFirstImage"><label class="custom-file-container_ _custom-file" ><input type="file" class="custom-file-container__custom-file__custom-file-input border" accept=".csv, .xls, .xlsx" id="file" name="file" dataType="'+target+'" targetURL="import-transactions"><input type="hidden" name="MAX_FILE_SIZE" value="10485760" /><span class="custom-file-container__custom-file__custom-file-control"></span></label></div><div id="div_file_to_upload"></div></p></div><div class="modal-footer"><input type="hidden" name="_type" id="_type" value="'+target+'" /><button class="btn btn-light" data-dismiss="modal">Annuler</button><button type="submit" class="btn btn-info">Importer</button></form>');
            });

        </script>
      @break
    
    @default
    <script>console.log('No custom script available.')</script>
@endswitch
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <script>
                    $(document).on('click', '.no-hide .dropdown-menu', function(event){
                        event.stopPropagation();
                    });

                    $(document).on('submit', '#uploadForm', function(e){ 
                        e.preventDefault();
                        var file = $('#file').val();

                        if(file == '')
                        {
                            $('#file').addClass('border-danger');
                            $('#div_file_to_upload').addClass('text-bold text-danger mt-1');
                            $('#div_file_to_upload').html('Aucun fichier chargé !');
                        }
                        else
                        {
                            $('#file').removeClass('border-danger');
                            $('#div_file_to_upload').empty();

                            let target = $('#file').attr('targetURL');
                            $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url: target,
                                    method: 'POST',
                                    data: new FormData(this),
                                    contentType: false,
                                    cache: false,
                                    processData:false,
                                    beforeSend:function()
                                    {
                                        $('#init_content').html('<div class="text-center pt-1"><div class="loader mx-auto"></div></div>');
                                    },
                                    success:function(response)
                                    {
                                        $('#init_content').html('');
                                        $('#init_content').html(response);
                                    }
                            });
                        }
                    });

                    $(document).on('submit', '#registerUpload', function(e){
                        e.preventDefault();
                        let _target = $(this).attr('target');
                        let func = $(this).attr('function_to_load');
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: _target,
                            method: 'POST',
                            data: $(this).serialize(),
                            beforeSend:function()
                            {
                                $('#registerUpload button').attr('disabled', true);
                                $('#registerUpload input').attr('readonly', true);
                                $('#registerUpload select').attr('readonly', true);
                                $('#registerUpload a').remove();
                                $('#progressbarToast').html('<div class="myToast1 shadow-lg"><h6 class="mb-3 text-dark">Importation en cours ...</h6><div class="progress br-30"><div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div></div></div>');
                            },
                            success:function(response)
                            {
                                let percentage = 0;

                                let timer = setInterval(function(){
                                percentage = percentage + 20;
                                progress_bar(percentage, timer, response, func);
                                }, 1000);
                            }
                        });
                    });
      
                    function progress_bar(percentage, timer, text, func)
                    {
                        $('.progress-bar').css('width', percentage + '%');
                        $('.progress-bar').text(percentage+'%');
                
                        if(percentage > 100)
                        {
                            clearInterval(timer);
                            $('#progressbarToast').empty();
                            $('.progress-bar').css('width', '0%');
                            $('.progress-bar').text('0%');
                            init_upload_modal();
                            Snackbar.show({
                                text: '<b>'+text+'</b>',
                                duration: 3000,
                                actionText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
                                actionTextColor: '#fff',
                                backgroundColor: '#0076A8',
                                pos: 'top-center'
                            });
                            switch(func) {
                                case 'clients':
                                    load_clients();
                                break;
                                case 'suppliers':
                                    load_suppliers();
                                break;
                                case 'products':
                                    load_products();
                                break;
                            }
                        }
                    }

                    $(document).on('click', '.btn_remove_row_to_import', function(){
                        let id = $(this).attr('id');
                        $('#row_to_import'+id).remove();
                        $('#import-title span').text(($('#import-table tr').length) - 1);
                        $('#import-sub-title span').text(($('#import-table tr input.border-danger').length) - 1);
                        if(($('#import-table tr:has(.border-danger)').length) > 0)
                        {
                            $('#import-sub-title span').text(($('#import-table tr:has(.border-danger)').length));
                        }
                        else
                        {
                            $('#import-sub-title').text('Aucune erreur detectée, vous pouvez valider l\'importation.');
                            $('#import-sub-title').removeClass('text-danger');
                            $('#import-sub-title').addClass('text-success');
                        }
                    });

                    $(document).on('keyup', '.single_input_in_error', function(){
                        let current_id = $(this).attr('id');
                        let verification = $(this).attr('verification_type');

                        switch(verification)
                        {
                            case 'not-empty':
                                if($(this).val() == '')
                                {
                                    $(this).addClass('border-danger');
                                    $('#stat'+current_id).empty();
                                    $('#stat'+current_id).html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#eb301c" stroke="#eb301c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>');

                                    $('#import-sub-title').html('Important : <span>'+$('#import-table tr:has(.border-danger)').length+'</span> ligne(s) incorrecte(s) (vous pouvez corriger avant de valider l\'importation, seules les lignes valides seront importées)');
                                    $('#import-sub-title').removeClass('text-success');
                                    $('#import-sub-title').addClass('text-danger');
                                }
                                else
                                {
                                    $(this).removeClass('border-danger');
                                    if($('#row_to_import'+current_id+':has(.border-danger)').length > 0)
                                    {
                                        $('#stat'+current_id).empty();
                                        $('#stat'+current_id).html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#eb301c" stroke="#eb301c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>');
                                    }
                                    else
                                    {
                                        $('#stat'+current_id).empty();
                                        $('#stat'+current_id).html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2ac51c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>');
                                    }
                                }
                            break;
                        }

                        if($('#import-table tr:has(.border-danger)').length > 0)
                        {
                            $('#import-sub-title').html('Important : <span>'+$('#import-table tr:has(.border-danger)').length+'</span> ligne(s) incorrecte(s) (vous pouvez corriger avant de valider l\'importation, seules les lignes valides seront importées)');
                            $('#import-sub-title').removeClass('text-success');
                            $('#import-sub-title').addClass('text-danger');
                        }
                        else
                        {
                            $('#import-sub-title').html('Aucune erreur detectée, vous pouvez valider l\'importation.');
                            $('#import-sub-title').removeClass('text-danger');
                            $('#import-sub-title').addClass('text-success');
                        }
                    });

                    $(document).on('change', '.single_select_in_error', function(){
                        let current_id = $(this).attr('id');

                                if($(this).val() != 'product' && $(this).val() != 'service')
                                {
                                    $(this).addClass('border-danger');
                                    $('#stat'+current_id).empty();
                                    $('#stat'+current_id).html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#eb301c" stroke="#eb301c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>');

                                    $('#import-sub-title').html('Important : <span>'+$('#import-table tr:has(.border-danger)').length+'</span> ligne(s) incorrecte(s) (vous pouvez corriger avant de valider l\'importation, seules les lignes valides seront importées)');
                                    $('#import-sub-title').removeClass('text-success');
                                    $('#import-sub-title').addClass('text-danger');
                                }
                                else
                                {
                                    $(this).removeClass('border-danger');
                                    if($('#row_to_import'+current_id+':has(.border-danger)').length > 0)
                                    {
                                        $('#stat'+current_id).empty();
                                        $('#stat'+current_id).html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#eb301c" stroke="#eb301c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>');
                                    }
                                    else
                                    {
                                        $('#stat'+current_id).empty();
                                        $('#stat'+current_id).html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2ac51c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>');
                                    }
                                }

                        if($('#import-table tr:has(.border-danger)').length > 0)
                        {
                            $('#import-sub-title').html('Important : <span>'+$('#import-table tr:has(.border-danger)').length+'</span> ligne(s) incorrecte(s) (vous pouvez corriger avant de valider l\'importation, seules les lignes valides seront importées)');
                            $('#import-sub-title').removeClass('text-success');
                            $('#import-sub-title').addClass('text-danger');
                        }
                        else
                        {
                            $('#import-sub-title').html('Aucune erreur detectée, vous pouvez valider l\'importation.');
                            $('#import-sub-title').removeClass('text-danger');
                            $('#import-sub-title').addClass('text-success');
                        }
                    });

                    $(document).on('click', '.btn_show_transaction_occurrence', function(){
                        let id = $(this).attr('id');
                        let row = $(this).attr('data-row');
                        
                        getOccurrenceTransaction(id, row);
                    });

                    function isNumeric(_value)
                    {
                        $.ajax({
                            url: 'num/'+_value,
                            method: 'GET',
                            success:function(response)
                            {
                                return response;
                            }
                        });
                    }

                    function init_upload_modal()
                    {
                        $('#uploadModal').modal('hide');
                        $('#init_content').html('<form id="uploadForm" enctype="multipart/form-data">{{ csrf_field() }}<h6 class="mb-3">Suivez les étapes ci-dessous ...</h6><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 1 : Téléchargez le modèle Linnasoft</h6><p class="mt-3">Pour commencer, téléchargez notre modèle EXCEL configuré pour importer vos données dans l\'application Linnasoft.</p><a href="" class="text-primary" id="btn_download_model"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Télécharger le modèle</a></div><div class="mb-4 border-bottom pb-3"><h6 class="text-bold">Etape 2 : Copiez vos <span class="dataUpload"></span> dans le modèle</h6><p class="mt-3">Ouvrez le modèle avec Microsoft Excel, copiez ensuite vos données dans le tableur.</p><p class="text-danger"><b>Important :</b> si vos données contiennent des en-têtes, retirez les et gardez uniquement les en-têtes du modèle.</p></div><div class="mb-4"><h6 class="text-bold">Etape 3 : Chargez le modèle contenant vos <span class="dataUpload"></span></h6><span class="text-color-linna1 text-bold">Vous pouvez importer un maximum de 1000 lignes à la fois !</span> (formats attendus : xlsx, xls, csv)<p class="mt-3"><div class="custom-file-container" data-upload-id="myFirstImage"><label class="custom-file-container__custom-file" ><input type="file" class="custom-file-container__custom-file__custom-file-input border" accept=".csv, .xls, .xlsx" id="file" name="file" dataType="" targetURL=""><input type="hidden" name="MAX_FILE_SIZE" value="10485760" /><span class="custom-file-container__custom-file__custom-file-control"></span></label></div><div id="div_file_to_upload"></div></p></div><div class="modal-footer"><input type="hidden" name="_type" id="_type" /><button class="btn btn-light" data-dismiss="modal">Annuler</button><button type="submit" class="btn btn-info">Importer</button></form>');
                    }

                    $(document).on('hidden.bs.modal', '#uploadModal', function(){
                        $('#transactionOccurrenceToast').empty();
                    });

                    $(document).on('click', '#btn-close-import-modal', function(){
                        init_upload_modal();
                    });

                    $(document).on('click', '#searchDropdown', function(){
                        $('#searchInput').focus();
                    });

                    $(document).on('keyup', '#searchInput', function(){
                        getSearchResults($(this).val());
                    });

                    function getSearchResults(target)
                    {
                        if(target != '')
                        {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: 'getSearchResults/'+target,
                                method: 'GET',
                                beforeSend:function()
                                {
                                    $('#searchContent').addClass('text-center mt-4');
                                    $('#searchContent').html('<div class="spinner-grow text-info align-self-center loader-lg">');
                                },
                                success:function(response)
                                {
                                    $('#searchContent').removeClass('text-center mt-4');
                                    $('#searchContent').html(response);
                                }
                            });
                        }
                        else
                        {
                            $('#searchContent').empty();
                        }
                    }

                    $(document).on('hide.bs.dropdown', '#search-dropdown', function () {
                        $('#searchInput').val('');
                        $('#searchContent').empty();
                        $('#searchInput').focus();
                    });

                    $('.colorPicker').minicolors({
                        animationSpeed: 50,
                        animationEasing: 'swing',
                        // defers the change event from firing while the user makes a selection
                        changeDelay: 0,
                        // hue, brightness, saturation, or wheel
                        control: 'wheel',
                        // default color
                        defaultValue: '#0076A8',
                        // hex or rgb
                        format: 'hex',
                        // show/hide speed
                        showSpeed: 100,
                        hideSpeed: 100,
                        // is inline mode?
                        inline: false,
                        // a comma-separated list of keywords that the control should accept (e.g. inherit, transparent, initial).
                        keywords: '',
                        // uppercase or lowercase
                        letterCase: 'uppercase',
                        // enables opacity slider
                        opacity: false,
                        // custom position
                        position: 'bottom left',
                        // additional theme class
                        theme: 'bootstrap',

                        swatches: []

                    });

                    function returnDate(date)
                    {
                        let month = date.substr(5,2);
                        let day = date.substr(8,2);
                        let year = date.substr(0,4);
                        let output_date = day+'/'+month+'/'+year;
                        
                        return output_date;
                    }

                    $(document).on('click', '.btn-back', function(){
                        window.history.back();
                    });
                    
                    function getdatepicker()
                    {
                        jQuery(function($){
                        $.datepicker.regional['fr'] = {
                            closeText: 'Fermer',
                            prevText: '&#x3c;Préc',
                            nextText: 'Suiv&#x3e;',
                            currentText: 'Aujourd\'hui',
                            monthNames: ['Janvier','Fevrier','Mars','Avril','Mai','Juin',
                            'Juillet','Aout','Septembre','Octobre','Novembre','Decembre'],
                            monthNamesShort: ['Jan','Fev','Mar','Avr','Mai','Jun',
                            'Jul','Aou','Sep','Oct','Nov','Dec'],
                            dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
                            dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
                            dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
                            weekHeader: 'Sm',
                            dateFormat: 'dd-mm-yyyy',
                            firstDay: 1,
                            isRTL: false,
                            showMonthAfterYear: true,
                            yearSuffix: '',
                            maxDate: '+12M +0D',
                            numberOfMonths: 1,
                            showButtonPanel: true
                            };
                        $.datepicker.setDefaults($.datepicker.regional['fr']);
                        });
                        $( function() {
                        $( ".datepicker" ).datepicker();
                        } );
                        $(".datepicker").inputmask("99-99-9999");
                    }

                    jQuery(function($){
                    $.datepicker.regional['fr'] = {
                        closeText: 'Fermer',
                        prevText: '&#x3c;Préc',
                        nextText: 'Suiv&#x3e;',
                        currentText: 'Aujourd\'hui',
                        monthNames: ['Janvier','Fevrier','Mars','Avril','Mai','Juin',
                        'Juillet','Aout','Septembre','Octobre','Novembre','Decembre'],
                        monthNamesShort: ['Jan','Fev','Mar','Avr','Mai','Jun',
                        'Jul','Aou','Sep','Oct','Nov','Dec'],
                        dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
                        dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
                        dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
                        weekHeader: 'Sm',
                        dateFormat: 'dd-mm-yyyy',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: true,
                        yearSuffix: '',
                        maxDate: '+12M +0D',
                        numberOfMonths: 1,
                        showButtonPanel: true
                        };
                    $.datepicker.setDefaults($.datepicker.regional['fr']);
                    });
                    $( function() {
                    $( ".datepicker" ).datepicker();
                    } );
                    $(".datepicker").inputmask("99-99-9999");
    </script>




