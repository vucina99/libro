<?php


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




Auth::routes();
Route::get('/json', 'LibroController@json');
Route::get('/jsons', 'LibroController@jsons');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('showForm');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('adminlog');

Route::get('/legal', 'LegalController@index')->name('legal.dashboard');
Route::get('/legal/login', 'Auth\LegalLoginController@showLoginForm')->name('showFormlegal');
Route::post('/legal/login', 'Auth\LegalLoginController@login')->name('legallog');
Route::get('/legal/register', 'Auth\LegalRegisterController@showLoginForm')->name('showFormlegalregister');
Route::post('/dodajkorisnika', 'Auth\LegalRegisterController@registracija')->name('registracijaLegala');
Route::get('/dalje', 'LibroController@dalje')->middleware("narucivanje");

Route::get('/potvrda', 'LibroController@potvrda');

Route::get('/', 'LibroController@index')->name("pocetna");
Route::get('/prikazproizvoda', 'LibroController@prikaz');
Route::get('/snizeniproizvodi/maloprodaja', 'LibroController@snizenjemalo');
Route::get('/snizeniproizvodi/veleprodaja', 'LibroController@snizenjevel')->middleware("vratifizicko");

Route::get('/korpa', 'LibroController@korpa');

Route::post('/naruci', 'LibroController@naruci');

Route::get('/dodavanjeveliko', 'AdminController@veliko');
Route::get('/dodavanjekategorije', 'AdminController@kategorije');
Route::get('/dodavanjepodkategorije', 'AdminController@podkategorije');
Route::post('/dodavanjekategorija' , 'AdminController@dodavanjekategorija');
Route::delete('/obrisikategoriju/{id}' , 'AdminController@brisanjekategorije');
Route::post('/dodavanjepodkategorija' , 'AdminController@dodavanjepodkategorija');
Route::delete('/obrisipodkategoriju/{id}' , 'AdminController@brisanjepodkategorije');
Route::post('/dodavanjemaloprodaje' , 'AdminController@dodavanjemaloprodaje');
Route::delete('/brisanjeproizvodamalo/{id}' , 'AdminController@brisanjeproizvodamalo');
Route::post('/dodavanjeveleprodaje' , 'AdminController@dodavanjeveleprodaje');
Route::delete('/brisanjeproizvodaveliko/{id}' , 'AdminController@brisanjeproizvodaveliko');
Route::get('/prikazproizvoda/veleprodaja/{id}' , 'LibroController@prikazveleprodaja')->middleware("vratifizicko");
Route::get('/prikazproizvoda/maloprodaja/{id}' , 'LibroController@prikazmaloprodaja');

Route::get('/veleprodaja/proizvod/{id}' , 'LibroController@prikazjednogvele')->middleware("vratifizicko");
Route::get('/maloprodaja/proizvod/{id}' , 'LibroController@prikazjednogmalo');
Route::get('/potvrdaLegalforme/{id}' , 'PotvrdaController@potvrdaforme');
Route::get('/potvrdaFizickeforme/{id}' , 'PotvrdaController@potvrdaformefiz');
Route::get('/verifikacijanaloga' ,'PotvrdaController@index');
Route::get('/prikazproizvodakategorije/maloprodaja/{id}' , 'LibroController@prikazkatmaloprodaja');
Route::get('/prikazproizvodakategorije/veleprodaja/{id}' , 'LibroController@prikazkatveleprodaja');
Route::get('/pretragamaloprodaje' , 'LibroController@pretragamaloprodaje');
Route::get('/pretragaveleprodaje' , 'LibroController@pretragaveleprodaje');
