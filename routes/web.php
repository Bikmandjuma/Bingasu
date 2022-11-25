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

Route::get('login','App\Http\Controllers\AuthController@GetLogin')->name('Login');

Route::post('PostLogin','App\Http\Controllers\AuthController@PostLogin')->name('postlogin');

Route::post('logout','App\Http\Controllers\AuthController@Logout')->name('Logout');
Route::get('Clientlogout','App\Http\Controllers\AuthController@ClientLogout')->name('ClientLogout');

Route::get('forgot/password',function(){
	return view('Auth.ForgotPassword');
})->name('ForgotPassword');


//Display single property
Route::get('Single/Property','App\Http\Controllers\CustomerController@SingleProperty')->name('PropertySingle');

//agent create account
Route::get('Agent/CreateAccount','App\Http\Controllers\AgentController@AgentCreateAccount')->name('AgentCreateAccount');

//Geust contacting by email
Route::post('guest/contact','App\Http\Controllers\CustomerController@GuestContacting')->name('GuestContact');

Route::post('CreateAccount','App\Http\Controllers\AgentController@CreateAgent')->name('CreateAgent');

Route::get('Customer/CreateAccount','App\Http\Controllers\CustomerController@CustomerCreateAccount')->name('CustomerCreateAccount');

Route::post('Client/CreateAccount','App\Http\Controllers\CustomerController@ClientCreateAccount')->name('ClientCreateAccount');

//Contact

Route::get('Contact','App\Http\Controllers\CustomerController@Contact')->name('Contact');

Route::get('About',function(){
	return view('AboutUs');
})->name('AboutUs');


Route::get('Service',function(){
	return view('Service');
})->name('Service');

//Admin routing
Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
	Route::get('/dashboard/{id}','App\Http\Controllers\AdminController@AdminHome')->name('AdminHome');
	Route::get('/homepage/{id}','App\Http\Controllers\AdminController@Homepage')->name('homepage');

	Route::get('agent/list/{id}','App\Http\Controllers\AdminController@AgentList');

	Route::get('deleteAgentData/{id}','App\Http\Controllers\AdminController@DeleteAgentData');
	Route::get('AboutUs','App\Http\Controllers\AdminController@AboutUs');
	Route::post('Create/AboutUs','App\Http\Controllers\AdminController@CreateAboutUs')->name('CreateAboutUs');
	Route::get('view/agent/{id}','App\Http\Controllers\AdminController@ViewAgentInfo');

	Route::post('Create/propertiesTypes','App\Http\Controllers\AdminController@PropertyType')->name('CreatePropertyType');
	
	Route::get('propertiesTypes','App\Http\Controllers\AdminController@PropertyTypes')->name('CreateTypeProperty');
	Route::get('View/Service','App\Http\Controllers\AdminController@ViewService');
	Route::get('contact/mailbox','App\Http\Controllers\AdminController@ViewMailBox')->name('mailbox');
	Route::get('read/mail/{mail}/{id}','App\Http\Controllers\AdminController@ReadMail');
	Route::get('delete/mail/{id}','App\Http\Controllers\AdminController@DeleteMail');
	Route::get('mail/trashed','App\Http\Controllers\AdminController@TrashedMail');

});

//Agent routing
Route::group(['prefix' => 'agent','middleware' => 'agentauth'], function () {
	
	Route::get('/Home/{id}','App\Http\Controllers\AgentController@AgentHome')->name('AgentDashboard');

});

//Customer routing
Route::group(['prefix' => 'customer','middleware' => 'customerauth'], function () {
	Route::get('/dashboards/{id}','App\Http\Controllers\CustomerController@CustomerHome')->name('CustomerDashboard');
});

