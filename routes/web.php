<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;

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

Route::get('/reg',[CatController::class,'reg']);
Route::get('/page',[CatController::class,'page']);
Route::post('/result',[CatController::class,'res']);
Route::get('/auth',[CatController::class,'auth']);
Route::post('/inpt',[CatController::class,'inpt']);
Route::get('/del/{id}',[CatController::class,'del']);
Route::get('/stat/{id}',[CatController::class,'stat']);
Route::get('/card/{id}',[CatController::class,'id']);
Route::get('/',[CatController::class,'about']);
Route::post('/confirm',[CatController::class,'confirm']);
Route::get('/red_lk/{user}',[CatController::class,'red_lk']);
Route::get('/cat',[CatController::class,'cat']);
Route::get('/obr',[CatController::class,'obr']);
Route::get('/add_eat',[CatController::class,'add_eat']);
Route::post('/eat_obr',[CatController::class,'eat_obr']);
Route::get('/mass',[CatController::class,'mass']);
Route::get('/clean',[CatController::class,'clean']);
Route::post('/main_inf',[CatController::class,'main_inf']);
Route::get('/add/{id}',[CatController::class,'add']);
Route::get('/ses',[CatController::class,'ses']);
Route::get('/check',[CatController::class,'ch']);
Route::get('/exit',[CatController::class,'exit']);
Route::get('/zaki',[CatController::class,'zaki']);
Route::get('/admin',[CatController::class,'admin']);
Route::post('/comms',[CatController::class,'comms']);
Route::get('/k_h',[CatController::class,'k_h']);
Route::get('/des',[CatController::class,'des']);
Route::get('/hot',[CatController::class,'hot']);
Route::get('/sup',[CatController::class,'sup']);
Route::get('/fish',[CatController::class,'fish']);
Route::get('/rolls',[CatController::class,'rolls']);
Route::get('/bread',[CatController::class,'bread']);
Route::get('/shift',[CatController::class,'shift']);
Route::get('/Appr_pers/{id}',[CatController::class,'appr']);
Route::get('/Deny_pers/{id}',[CatController::class,'deny']);
Route::get('/view_shifts',[CatController::class,'view_shifts']);
Route::post('/shift_obr',[CatController::class,'shift_obr']);
Route::post('/send',[CatController::class,'send']);
Route::get('/pers_lk',[CatController::class,'pers_zaki']);
Route::get('/orders',[CatController::class,'orders']);
Route::get('/gets/{id}',[CatController::class,'gets']);
Route::get('/del_mass/{key}',[CatController::class,'del_mass']);



