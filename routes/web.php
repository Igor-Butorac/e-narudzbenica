<?php
use App\Item;
use App\Order;
use Illuminate\Support\Facades\Input;

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
Route::auth();


Route::group(['middleware' => 'auth'], function () {

//2020
Route::resource('orders_god','OrdersController');

Route::resource('orders2020','Orders2020Controller');

Route::resource('goods','ItemsController');

Route::get('orders/{id}/goods/create', 'ItemsController@create');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('orders2020/ordersPDF/{id}','Orders2020Controller@generatePDF');

Route::any('/search2020',function(){
    $q = Input::get ( 'q' );
    $ordersearch = Order::where('naziv_prod','LIKE','%'.$q.'%')
    ->orWhere('sastavio','LIKE','%'.$q.'%')
    ->orWhere('id','LIKE','%'.$q.'%')
    ->get();

    if(count($ordersearch) > 0)
    return view('orders2020.search2020')->withDetails($ordersearch)->withQuery ( $q );
    else return view ('orders2020.search2020')->withMessage('No Details found. Try to search again !');
    });

//2019

Route::get('orders2019/ordersPDF/{id}','Orders2019Controller@generatePDF');

Route::resource('orders2019','Orders2019Controller');



Route::any('/search',function(){
        $q2 = Input::get ( 'q' );
        $ordersearch = DB::connection('mysql2')
        ->table('orders')
        ->where('naziv_prod','LIKE','%'.$q2.'%')
        ->orWhere('sastavio','LIKE','%'.$q2.'%')
        ->orWhere('id','LIKE','%'.$q2.'%')
        ->get();

        if(count($ordersearch) > 0)
        return view('orders2019.search')->withDetails($ordersearch)->withQuery ( $q2 );
        else return view ('orders2019.search')->withMessage('No Details found. Try to search again !');
        });
    

});

// All my routes that need no authentication
Route::get('/','PagesController@index');


