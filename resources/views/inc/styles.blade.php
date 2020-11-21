<link href="{{asset('assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('assets/js/loader.js')}}"></script>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')
<link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
@endif
<!-- END GLOBAL MANDATORY STYLES -->

<link href="{{asset('assets/css/elements/avatar.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/components/tabs-accordian/custom-tabs.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/linnasoft.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/forms/switches.css')}}" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">

<script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<link href="{{asset('plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/css/colorPicker/jquery.minicolors.js') }}"></script>
<link href="{{asset('assets/css/colorPicker/jquery.minicolors.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/css/elements/tooltip.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
<link href="{{asset('plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('plugins/sweetalerts/promise-polyfill.js')}}"></script>
<link href="{{asset('plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/tagInput/tags-input.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/loaders/custom-loader.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/components/tabs-accordian/custom-accordions.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/elements/alert.css')}}">
<link href="{{asset('assets/css/components/custom-list-group.css')}}" rel="stylesheet" type="text/css">

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
@switch($page_name)

    @case('clients')
    @case('fournisseurs')
    @case('categorisation')
    @case('produits-services')
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
          <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
          <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}"> -->
          <link rel="stylesheet" type="text/css" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
          <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
          
          <script src="{{ asset('plugins/DataTables/buttons/js/buttons.html5.min.js') }}"></script>
          <script src="{{ asset('plugins/DataTables/buttons/js/buttons.print.min.js') }}"></script>
    @break
    @case('transactions')
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        
        <script src="{{ asset('plugins/DataTables/buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('plugins/DataTables/buttons/js/buttons.print.min.js') }}"></script>
    @break

    @default
        <script>console.log('No custom Styles available.')</script>
@endswitch
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

<!-- FUSION CHART INCLUDES --> 
    
<!-- FUSION CHART INCLUDES -->