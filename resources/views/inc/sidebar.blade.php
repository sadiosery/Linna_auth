@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')

    <!--  BEGIN TOPBAR  -->
    <div class="topbar-nav header navbar" role="banner">
        <nav id="topbar">
            <ul class="navbar-nav theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="index.html">
                        <img src="{{asset('assets/img/logo/logo_110x110.png')}}" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="index.html" class="nav-link"> Linnasoft </a>
                </li>
            </ul>

            <ul class="list-unstyled menu-categories" id="topAccordion">

                @if ($page_name != 'alt_menu' && $page_name != 'blank_page' && $page_name != 'boxed' && $page_name != 'breadcrumb' )

                <li class="menu single-menu  {{ ($category_name === 'dashboard') ? 'active' : '' }}">
                    <a href="/dashboard" aria-expanded="true" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>

                <li class="menu single-menu {{ ($category_name === 'achats') ? 'active' : '' }}">
                    <a href="#achats" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            <span>Achats</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="achats" data-parent="#topAccordion">
                        <li class="{{ ($page_name === 'fournisseurs') ? 'active' : '' }}">
                            <a href="/achats/fournisseurs"> Fournisseurs </a>
                        </li>
                        <li class="{{ ($page_name === 'bons-de-commande') ? 'active' : '' }}">
                            <a href="/achats/bons-de-commande"> Bons de commandes </a>
                        </li>
                        <li class="{{ ($page_name === 'factures') ? 'active' : '' }}">
                            <a href="/achats/factures"> Factures </a>
                        </li>
                    </ul>
                </li>

                <li class="menu single-menu {{ ($category_name === 'ventes') ? 'active' : '' }}">
                    <a href="#ventes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            <span>Ventes</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="ventes" data-parent="#topAccordion">
                        <li class="{{ ($page_name === 'clients') ? 'active' : '' }}">
                            <a href="/ventes/clients"> Clients </a>
                        </li>
                        <li class="{{ ($page_name === 'produits-services') ? 'active' : '' }}">
                            <a href="/ventes/produits-services"> Produits/Services  </a>
                        </li>
                        <li class="{{ ($page_name === 'categories_cl_prod') ? 'active' : '' }}">
                            <a href="/ventes/categories"> Catégories  </a>
                        </li>
                        <li class="{{ ($page_name === 'devis') ? 'active' : '' }}">
                            <a href="/ventes/devis"> Devis </a>
                        </li>
                        <li class="{{ ($page_name === 'commandes') ? 'active' : '' }}">
                            <a href="/ventes/commandes"> Commandes </a>
                        </li>
                        <li class="{{ ($page_name === 'factures') ? 'active' : '' }}">
                            <a href="/ventes/factures"> Ventes </a>
                        </li>
                        <li class="{{ ($page_name === 'bons-de-livraison') ? 'active' : '' }}">
                            <a href="/ventes/bons-de-livraison"> Bons de livraison </a>
                        </li>
                        <li class="{{ ($page_name === 'avoirs') ? 'active' : '' }}">
                            <a href="/ventes/avoirs"> Factures d'avoir </a>
                        </li>
                    </ul>
                </li>

                <li class="menu single-menu {{ ($category_name === 'tresorerie') ? 'active' : '' }}">
                    <a href="#tresorerie" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                            <span>Trésorerie</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="tresorerie"  data-parent="#topAccordion">
                        <li class="{{ ($page_name === 'categorisation') ? 'active' : '' }}">
                            <a href="/tresorerie/categorisation"> Catégorisation </a>
                        </li>
                        <li class="{{ ($page_name === 'transactions') ? 'active' : '' }}">
                            <a href="/tresorerie/transactions"> Transactions </a>
                        </li>
                        <li class="{{ ($page_name === 'previsions') ? 'active' : '' }}">
                            <a href="/tresorerie/previsions"> Prévisions </a>
                        </li>
                        <li class="{{ ($page_name === 'exportations') ? 'active' : '' }}">
                            <a href="/tresorerie/exportations"> Exportations avancées </a>
                        </li>
                    </ul>
                </li>

                <li class="menu single-menu {{ ($category_name === 'admin') ? 'active' : '' }}">
                    <a href="#acces" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            <span>Gestion des accès</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="acces"  data-parent="#topAccordion">
                        <li class="{{ ($page_name === 'utilisateurs') ? 'active' : '' }}">
                            <a href="/admin/utilisateurs"> Utilisateurs </a>
                        </li>
                        <li class="{{ ($page_name === 'groupes-utilisateurs') ? 'active' : '' }}">
                            <a href="/admin/groupes"> Groupes d'utilisateurs </a>
                        </li>
                    </ul>
                </li>

                <li class="menu single-menu {{ ($category_name === 'abonnement') ? 'active' : '' }}">
                    <a href="/mon-abonnement" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hard-drive"><line x1="22" y1="12" x2="2" y2="12"></line><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path><line x1="6" y1="16" x2="6.01" y2="16"></line><line x1="10" y1="16" x2="10.01" y2="16"></line></svg>
                            <span>Mon abonnement</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                </li>

                <li class="menu single-menu {{ ($category_name === 'parametres') ? 'active' : '' }}">
                    <a href="/parametres/general" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                            <span>Paramètres</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                </li>

                @else

                @endif
            </ul>
        </nav>
    </div>
    <!--  END TOPBAR  -->

@endif
