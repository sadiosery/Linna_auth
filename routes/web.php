<?php

namespace App\Http\Controllers\CategoryController;
namespace App\Http\Controllers\ClientController;
namespace App\Http\Controllers\SupplierController;
namespace App\Http\Controllers\PaymentController;
namespace App\Http\Controllers\fusionChartsController;
namespace App\Http\Controllers\SearchController;
//namespace App\Http\Controllers\Auth\Admin\UsersController;
//namespace App\Http\Controller\TransactionController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'] , function()
 {

     //$this->middleware;

    Route::get('getSearchResults/{target}', 'SearchController@getSearchResults');

    // DASHBOARD
    Route::get('/dashboard', function() {
        // $category_name = '';
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'dashboard',
            'page_title' => 'Dashboard',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        // $pageName = 'sales';
        return view('dashboard')->with($data);
    });

    // ABONNEMENT
    Route::get('/mon-abonnement', function() {
        // $category_name = 'calendar';
        $data = [
            'category_name' => 'abonnement',
            'page_name' => 'mon-abonnement',
            'page_title' => 'Mon abonnement',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        // $pageName = 'calendar';
        return view('abonnement')->with($data);
    });

    // ACHATS
    Route::prefix('achats')->group(function () {
        /******
        *   filling fournisseurs ---------
        */
        Route::get('/fournisseurs', 'SupplierController@showSuppliers');
        Route::get('get-suppliers', 'SupplierController@listSuppliers');
        Route::post('add-supplier', 'SupplierController@addSupplier');
        Route::post('edit-supplier', 'SupplierController@editSupplier');
        Route::get('suppliers/{id}', 'SupplierController@getSupplierById');
        Route::get('fournisseurs/{id}/{name}', 'SupplierController@getSupplierById');
        Route::delete('supplier/{id}', 'SupplierController@deleteSupplier');
        Route::get('getPaymentmode', 'PaymentController@getPayments');
        Route::post('import-suppliers', 'SupplierController@ImportSuppliers');
        Route::post('register-imported-suppliers', 'SupplierController@registerImports');
        Route::post('storesupplierfile/{supplier}', 'SupplierController@storeSupplierFile');
        Route::get('get-files/{supplier}', 'SupplierController@getFiles');
        Route::delete('delete-file/{id}/{tok}', 'SupplierController@deleteFile');
        Route::get('fournisseurs/{supplier}/telechargement/{id}/{token}', 'SupplierController@downloadFile');
        /*
        *   filling fournisseurs ---------
        *******/

        Route::get('/bons-de-commande', function() {
            // $category_name = 'chat';
            $data = [
                'category_name' => 'achats',
                'page_name' => 'bons-de-commande',
                'page_title' => 'Bons de commande',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'chat';
            return view('pages.commercial.achats.bons-de-commande')->with($data);
        });
        Route::get('/factures', function() {
            // $category_name = 'contacts';
            $data = [
                'category_name' => 'achats',
                'page_name' => 'factures',
                'page_title' => 'Factures d\'achat',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'contacts';
            return view('pages.commercial.achats.factures')->with($data);
        });
    });

    // VENTES
    Route::prefix('ventes')->group(function () {
        /******
        *   filling clients ---------
        */
        Route::get('/clients', 'ClientController@showClients');
        Route::get('get-clients', 'ClientController@listClients');
        Route::post('add-client', 'ClientController@addClient');
        Route::post('edit-client', 'ClientController@editClient');
        Route::get('clients/{id}', 'ClientController@getClientById');
        Route::get('clients/{id}/{name}', 'ClientController@getClientById');
        Route::get('getCategories/{type}', 'CategoryController@getCategoriesByType');
        Route::delete('client/{id}', 'ClientController@deleteClient');
        Route::get('getPaymentmode', 'PaymentController@getPayments');
        Route::get('/categories', 'CategoryController@Categories');
        Route::get('get-categories/{_type}', 'CategoryController@listCategories');
        Route::post('add-category', 'CategoryController@addCategory');
        Route::put('edit-category', 'CategoryController@editCategory');
        Route::delete('category/{id}', 'CategoryController@deleteCategory');
        Route::get('getSubCategories/{parent}/{type}', 'CategoryController@getSubCategories');
        Route::post('import-clients', 'ClientController@ImportClients');
        Route::post('register-imported-clients', 'ClientController@registerImports');
        Route::post('storeclientfile/{client}', 'ClientController@storeClientFile');
        Route::get('get-client-files/{client}', 'ClientController@getFiles');
        Route::delete('delete-client-file/{id}/{tok}', 'ClientController@deleteFile');
        Route::get('clients/{client}/telechargement/{id}/{token}', 'ClientController@downloadFile');

        Route::post('storeproductfile/{product}', 'ProductController@storeProductFile');
        Route::get('get-product-files/{client}', 'ProductController@getFiles');
        Route::delete('delete-product-file/{id}/{tok}', 'ProductController@deleteFile');
        Route::get('produits-services/{product}/telechargement/{id}/{token}', 'ProductController@downloadFile');
        /*
        *   filling clients ---------
        *******/

        /******
        *   filling products - services
        */
        Route::get('/produits-services', 'ProductController@showProducts');
        Route::get('get-products', 'ProductController@listProducts');
        Route::post('add-product', 'ProductController@addProduct');
        Route::get('getVTA', 'VTAController@getVTA');
        Route::get('products/{id}', 'ProductController@getProductById');
        Route::post('edit-product', 'ProductController@editProduct');
        Route::delete('product/{id}', 'ProductController@deleteProduct');
        Route::post('import-products', 'ProductController@ImportProducts');
        Route::post('register-imported-products', 'ProductController@registerImports');
        Route::get('produits-services/{id}/{designation}', 'ProductController@getProductById');
        Route::get('/get-product-prices/{product}', 'ProductPricesController@getPrices');
        Route::get('/get-product-movements/{product}', 'ProductMovementsController@getMovements');
        Route::delete('/price/{id}', 'ProductPricesController@deletePrice');
        Route::put('/price/{id}', 'ProductPricesController@editPrice');
        Route::get('/get-single-price/{id}', 'ProductPricesController@getPriceById');
        Route::get('/getAccounts', 'ClientController@getAccounts');
        Route::post('add-prices', 'ProductPricesController@addPrices');
        Route::post('add-movement', 'ProductMovementsController@addMovement');
        Route::get('getcurrentQty/{product}', 'ProductMovementsController@getQuantity');
        /*
        *   filling products - services
        *******/

        Route::get('/factures', function() {
            // $category_name = 'chat';
            $data = [
                'category_name' => 'ventes',
                'page_name' => 'factures',
                'page_title' => 'Factures de vente',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'chat';
            return view('pages.commercial.ventes.factures')->with($data);
        });
        Route::get('/devis', function() {
            // $category_name = 'contacts';
            $data = [
                'category_name' => 'ventes',
                'page_name' => 'devis',
                'page_title' => 'Devis',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'contacts';
            return view('pages.commercial.ventes.devis')->with($data);
        });
        Route::get('/commandes', function() {
            // $category_name = 'calendar';
            $data = [
                'category_name' => 'ventes',
                'page_name' => 'commandes',
                'page_title' => 'Commandes',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'calendar';
            return view('pages.commercial.ventes.commandes')->with($data);
        });
        Route::get('/bons-de-livraison', function() {
            // $category_name = 'calendar';
            $data = [
                'category_name' => 'ventes',
                'page_name' => 'bons-de-livraison',
                'page_title' => 'Bons de livraison',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'calendar';
            return view('pages.commercial.ventes.bons-de-livraison')->with($data);
        });
        Route::get('/avoirs', function() {
            // $category_name = 'calendar';
            $data = [
                'category_name' => 'ventes',
                'page_name' => 'avoirs',
                'page_title' => 'Avoirs',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'calendar';
            return view('pages.commercial.ventes.avoirs')->with($data);
        });
    });

    // TRESORERIE
    Route::prefix('tresorerie')->group(function () {
        /******
        *   filling categorisation ---------
        */
            Route::get('/categorisation', 'CategoryController@showCategories');
            Route::get('get-categories/{_type}', 'CategoryController@listCategories');
            Route::post('add-category', 'CategoryController@addCategory');
            Route::put('edit-category', 'CategoryController@editCategory');
            Route::delete('category/{id}', 'CategoryController@deleteCategory');
            Route::get('ruleCategories/{type}', 'CategoryController@getCategoriesByType');
            Route::get('getAccounts', 'ClientController@getAccounts');
            Route::get('getRules', 'RuleController@showRules');
            Route::post('addRule', 'RuleController@addRule');
            Route::delete('delete-rule/{id}', 'RuleController@deleteRule');
            Route::get('rules/{id}/{action}', 'RuleController@getRuleById');
            Route::put('edit_duplicateRule', 'RuleController@edit_duplicateRule');
            Route::get('getSubCategories/{parent}/{type}', 'CategoryController@getSubCategories');
        /*
        *   filling categorisation ---------
        *******/

        /******
        *   filling transactions ---------
        */
            Route::get('/transactions', 'TransactionController@showTransactions');
            Route::get('get-transactions/{date_start}/{date_end}', 'TransactionController@listTransactions');
            Route::delete('delete-transaction/{id}', 'TransactionController@deleteTransaction');
            Route::get('getCategories/{type}', 'CategoryController@getCategoriesByType');
            Route::get('getAccounts', 'ClientController@getAccounts');
            Route::get('getPaymentmode', 'PaymentController@getPayments');
            Route::get('getVTA', 'VTAController@getVTA');
            Route::post('add-transaction', 'TransactionController@addTransaction');
            Route::get('transaction/{id}', 'TransactionController@getTransactionById');
            Route::post('edit_duplicateTransaction', 'TransactionController@edit_duplicateTransaction');
            Route::get('/transactions/voir/pdf/{id}', 'TransactionController@makePDF');
            Route::get('category/{id}', 'CategoryController@getCategoryById');
            Route::post('getOccurrences', 'TransactionController@getOccurrences');
            Route::post('import-transactions', 'TransactionController@ImportTransactions');
            //Route::post('register-imports', 'ClientController@registerImports')->name('register-imports');
        /*              transaction/makePDF/16
        *   filling transactions ---------
        *******/


        Route::get('/previsions', function() {
            // $category_name = 'calendar';
            $data = [
                'category_name' => 'tresorerie',
                'page_name' => 'previsions',
                'page_title' => 'Prévisions',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'calendar';
            return view('pages.tresorerie.previsions')->with($data);
        });
        Route::get('/exportations', function() {
            $data = [
                'category_name' => 'tresorerie',
                'page_name' => 'exportations',
                'page_title' => 'Exportations',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'calendar';
            return view('pages.tresorerie.exportations')->with($data);
        });
    });

    // UTILISATEURS
   //Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function (){

       //Route::resource('/admin/users','UsersController');
       // });

       //Auth::routes();
      //  Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){

       // Route::resource('/utilisateurs','UsersController');
       // });

            Route::prefix('admin')->group(function () {
           Route::resource('/utilisateurs','UsersController');

           Route::resource('/groupes','UsersController');

        });
       // Route::group(['namespace'=>'Auth'], function(){
          //  Route::get('login','UsersController@create')->name('login');//pour acceder au formulaire
          //  Route::post('login','LoginsController@store');
           // Route::post('logout','LoginsController@destroy')->name('logout');

           // Route::get('register','RegistersController@create')->name('register');
           // Route::get('register','RegistersController@store');
       // });

       /* Route::get('/groupes', function() {
            // $category_name = 'calendar';
            $data = [
                'category_name' => 'acces',
                'page_name' => 'groupes-utilisateurs',
                'page_title' => 'Groupes d\'utilisateurs',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'calendar';
           return view('pages.utilisateurs.groupes')->with($data);
       });


  Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function (){


    });
    */

    // PARAMETRES
    Route::prefix('parametres')->group(function () {
        Route::get('/general', function() {
            // $category_name = 'calendar';
            $data = [
                'category_name' => 'parametres',
                'page_name' => 'general',
                'page_title' => 'Paramètres généraux',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'calendar';
            return view('pages.parametres.general')->with($data);
        });

    });


});

//Auth::routes();


Route::get('/register', function() {
    
    return redirect('/register');
});
Route::get('/password/reset', function() {
    return redirect('/login');
});

Route::get('/', function() {
    return redirect('/login');
});




Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


