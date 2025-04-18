<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\ModepaiementController;
use App\Http\Controllers\TransporteurController;

/*
|--------------------------------------------------------------------------
| Routes Home
|--------------------------------------------------------------------------
*/

Route::get('/', [RouteController::class, 'home'])->name('home');
Route::get('/about-us', [RouteController::class, 'about'])->name('about');
Route::get('/FAQ', [RouteController::class, 'faq'])->name('FAQ');
Route::get('/services', [RouteController::class, 'service'])->name('service');
Route::get('/services-detail', [RouteController::class, 'serviceDetails'])->name('detailService');
Route::get('/payments', [RouteController::class, 'pay'])->name('payment');
Route::get('/contact-us', [RouteController::class, 'contact'])->name('contact');


Route::get('/slt-admin', [LoginController::class, 'ShowLogin'])->name('login');
Route::post('/doLogin', [LoginController::class, 'login'])->name('doLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/dashboard', [RouteController::class, 'dashboard'])->name('dash')->middleware('auth');


Route::resource('produits',ProduitController::class)->middleware('auth');
Route::resource('clients',ClientController::class)->middleware('auth');
Route::resource('transporteurs',TransporteurController::class)->middleware('auth');
Route::resource('modepaiements',ModepaiementController::class)->middleware('auth');
Route::resource('users',UserController::class)->middleware('auth');

Route::resource('trackings',TrackingController::class)->middleware('auth');
Route::get('/trakings-en-attente',[TrackingController::class,'en_attente'])->name('en_attente')->middleware('auth');
Route::get('/trakings-en-cours',[TrackingController::class,'en_cours'])->name('en_cours')->middleware('auth');
Route::get('/trakings-termine',[TrackingController::class,'termine'])->name('termine')->middleware('auth');
Route::get('/statutChange/{id}', [TrackingController::class, 'etatChange'])->name('etatChange')->middleware('auth');


Route::post('/ajax',[AjaxController::class,'ajax'])->name('ajax');
// Route::post('/track}', [TrackingController::class, 'track'])->name('track');

// Route::get('/track_resultat/{id}', [TrackingController::class, 'track_resultat'])->name('track_resultat');



