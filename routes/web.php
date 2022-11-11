<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',function(){
	return view('auth.login');
})->name('Login');

Route::post('PostLogin','App\Http\Controllers\AuthController@PostLogin')->name('postlogin');

Route::post('logout','App\Http\Controllers\AuthController@Logout')->name('Logout');

//Display single property
Route::get('Single/Property','App\Http\Controllers\CustomerController@SingleProperty')->name('PropertySingle');

//Admin routing
Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
	Route::get('/dashboard/{id}','App\Http\Controllers\AdminController@AdminHome')->name('AdminHome');
	Route::get('/homepage/{id}','App\Http\Controllers\AdminController@Homepage')->name('homepage');
});

//Agent routing
Route::group(['prefix' => 'agent','middleware' => 'agentauth'], function () {
	
});

//Customer routing
Route::group(['prefix' => 'customer','middleware' => 'customerauth'], function () {
	
});

