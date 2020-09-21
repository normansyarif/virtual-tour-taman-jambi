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

Route::get('/', 'GuestController@home')->name('home');
Route::get('/taman/{id}', 'GuestController@taman')->name('taman');
Route::get('/taman-list', 'GuestController@tamanList')->name('taman.list');
Route::get('/taman-search', 'GuestController@tamanSearch')->name('taman.search');


Route::get('/admin/taman', 'AdminController@tamanIndex')->name('admin.taman.index');
Route::get('/json/admin/taman', 'AdminController@jsonTamanIndex')->name('json.admin.taman.index');
Route::get('/admin/taman/add', 'AdminController@tamanAdd')->name('admin.taman.add');
Route::post('/admin/taman/post', 'AdminController@tamanPost')->name('admin.taman.post');
Route::get('/admin/taman/delete/{id}', 'AdminController@tamanDelete')->name('admin.taman.delete');
Route::get('/admin/taman/edit/{id}', 'AdminController@tamanEdit')->name('admin.taman.edit');
Route::post('/admin/taman/update/{id}', 'AdminController@tamanUpdate')->name('admin.taman.update');


Route::get('/event/{id}', 'GuestController@event')->name('event');
Route::get('/event-list', 'GuestController@eventList')->name('event.list');
Route::get('/event-search', 'GuestController@eventSearch')->name('event.search');


Route::get('/admin/event', 'AdminController@eventIndex')->name('admin.event.index');
Route::get('/json/admin/event', 'AdminController@jsonEventIndex')->name('json.admin.event.index');
Route::get('/admin/event/add', 'AdminController@eventAdd')->name('admin.event.add');
Route::post('/admin/event/post', 'AdminController@eventPost')->name('admin.event.post');
Route::get('/admin/event/delete/{id}', 'AdminController@eventDelete')->name('admin.event.delete');
Route::get('/admin/event/edit/{id}', 'AdminController@eventEdit')->name('admin.event.edit');
Route::post('/admin/event/update/{id}', 'AdminController@eventUpdate')->name('admin.event.update');

Route::post('/review/post', 'UserController@postReview')->name('post.review');

Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile-update', 'UserController@profileUpdate')->name('profile.update');

Route::get('/partisipasi-masyarakat', 'GuestController@partisipasi')->name('partisipasi-masyarakat');
Route::get('/partisipasi-masyarakat/add', 'UserController@partisipasiAdd')->name('partisipasi-masyarakat.add');
Route::post('/partisipasi-masyarakat/post', 'UserController@partisipasiPost')->name('partisipasi-masyarakat.post');
Route::post('/partisipasi-masyarakat/tanggapan/{id}', 'AdminController@partisipasiTanggapi')->name('partisipasi-masyarakat.tanggapan');
Route::post('/partisipasi-masyarakat/delete/{id}', 'AdminController@partisipasiDelete')->name('partisipasi-masyarakat.delete');
Route::get('/partisipasi-masyarakat/{id}', 'GuestController@partisipasiDetail')->name('partisipasi-masyarakat.detail');

Route::post('ckeditor/upload', 'GeneralController@upload')->name('ckeditor.upload');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
