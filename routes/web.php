<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;


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
Route::get('dash', function()
{
    return view('dashboard.admin');
});
Route::get('supaa', function()
{
    return view('layout.signsuper');
});

Route::get('/', [ProductController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::Resource('home','ProductController');
Route::Get('register', 'ProductController@create')->name('register');
Route::Get('edit', 'ProductController@edit')->name('edit');

Route::Get('login', [CustomerController::class, 'logincustomer'])->name('login');
Route::Get('loginadmin', 'UserController@loginadmin')->name('loginadmin');
Route::Get('signup', 'CustomerController@signupcustomer')->name('signup');
Route::Get('signupadmin', 'UserController@signupuser')->name('signupadmin');

Route::Get('logout', 'UserController@logout')->name('logout');
Route::Get('logoutcustomer', 'UserController@logoutcustomer')->name('logoutcustomer');
Route::post('update/{id}','UserController@update')->name('update');

Route::Get('add', 'CustomerController@create')->name('add');
Route::Get('edit', 'CustomerController@edit')->name('edit');
Route::post('/pay', 'PaymentsController@store')->name('pay');


Route::post('logintobuy', 'CustomerController@logintobuy')->name('logintobuy');
Route::post('/addtocart', 'CartsController@store');

Route::Get('cart', 'CartsController@index')->name('cart');
Route::post('/edit_cart', 'CartsController@updatee');

Route::post('remove/{idd}', 'CartsController@destroy')->name('remove');

Route::post('registerproduct','ProductController@store');
Route::post('signup', 'UserController@store');
Route::post('signupcustomer','CustomerController@store');


Route::get('/main', 'UserController@index');
Route::post('/main/checklogin', 'UserController@checklogin');
Route::get('main/successlogin', 'UserController@successlogin')->middleware('auth');

Route::get('/getdata/{id}', 'ProductController@getdata')->name('getdata');

Route::post('placeorder','OrderController@store');

