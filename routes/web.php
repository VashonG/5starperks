<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;

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
require __DIR__.'/auth.php';

Route::get('/', 'AssignRoleDashboardController@index');
Route::get('/sidebarCategory', 'CategoryController@sidebarCategory');
Route::get('/get_users', 'AdminDashboardController@get_users');
//Customer Routes
Route::group(['middleware' => ['permission:customers_dashboard']], function () {
    //Customer Dashboard
   Route::get('/customer_dashboard', 'AnnouncementsController@index')
        ->name('dashboard');

    // tickets
    Route::get('/Tickets', 'CustomerDashboardController@Tickets')->name('tickets');


    // profile
    Route::get('/profile', 'CustomerDashboardController@profile')->name('profile');




});
 // products
 Route::get('/products/{slug}', 'ProdutController@getProducts')->name('products');

// Admin Routes
Route::group(['middleware' => ['permission:dashboard']], function () {

    //Admin Dashboard
    Route::resource('/salesman', AdminDashboardController::class);
    //Admin Dashboard
    Route::get('/admin_dashboard', 'AdminDashboardController@index')->name('dashboard');

    Route::post('/announcements/imagesupload', 'AnnouncementsController@imagesupload')->name("imagesupload");
    //roles
    Route::resource('roles', RoleController::class);

    //users
    Route::resource('users', UserController::class);

    // ProdutController
    Route::resource('products', ProdutController::class);
    Route::get('products/{id}/view','ProdutController@redirectUrl');

    // ProdutController
     Route::get('addProduct', 'ProdutController@addProduct');
     Route::post('scrapUrlData', 'ProdutController@scrapUrlData');

    //permissions
    Route::resource('permissions', PermissionController::class);

    //category
    Route::resource('category', 'CategoryController');


    //ticket
    Route::resource('/Tickets', 'AdminDashboardController@Tickets');

    Route::post('/addNewSalesman','SellerController@addNewSalesman')->name('addNewSalesman');
    Route::resource('/salesmen', SellerController::class);
    Route::post('/salesmen/updateSeller/{id}', 'SellerController@updateSeller');

    //aggreament
    Route::resource('/aggreament', AggreamentController::class);
    Route::post('/aggreament/changeStatus', 'AggreamentController@changeStatus')->name('changeStatus');
    Route::get('/aggreamentdata', 'AggreamentController@currentAggreament');
    //customer
    Route::resource('/customers', CustomersController::class);
    Route::post('/customers/updateSeller/{id}', 'CustomersController@updateSeller');


});
//Salesman Routes

Route::group(['middleware' => ['permission:salesman_dashboard']], function () {

            //Admin Dashboard
            Route::resource('salesman_dashboard', SalesmanDashboardController::class);

            //product
            // Route::get('products', 'SalesmanDashboardController@products');

            //customer
            Route::get('refreals', 'SalesmanDashboardController@customers');

            //announcement
            // Route::get('announcements', 'SalesmanDashboardController@announcements');

            //profile
            Route::get('profile', 'SalesmanDashboardController@profile');

            //get_customers
            Route::get('/get_users', 'SalesmanDashboardController@get_users');

});
 //Announcement
 Route::resource('/announcements', 'AnnouncementsController');
 Route::get('/getannouncements', 'AnnouncementsController@getAnnouncements');
 Route::post('/announcements/postComment', 'AnnouncementsController@PostComment')->name("postcomment");











