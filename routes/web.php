<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\democontroler;
use  App\Http\Controllers\CategoryController;
use  App\Http\Controllers\AjaxCrudController;
use App\Models\Laravel;
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
route::get('/form',[democontroler::class,'index']);
route::get('/form/view',[democontroler::class,'view']);
route::post('/register',[democontroler::class,'register']);
Route::get('/form/delete/{id}', [democontroler::class, 'delete'])->name('delete_key');
Route::get('/form/edit/{id}', [democontroler::class, 'edit'])->name('edit_key');
Route::post('/form/update/{id}', [democontroler::class, 'update'])->name('update_key');
route::get('/laravel',function(){
      $laravel=Laravel::all();
      echo "<pre>";
      print_r($laravel);
});
route::get('/login',function(){
      return view('layouts.login');
});
Route::get('/category/edit', [CategoryController::class, 'edit']);
Route::get('/category/form', [CategoryController::class, 'create']);
Route::post('/login_info', [democontroler::class, 'session_work']);
Route::get('/ajax_crud',[AjaxCrudController::class,'ajax_crud'])->name('ajax_crud');
Route::get('/ajax_crud/read',[AjaxCrudController::class,'read'])->name('ajax_crud.read');
Route::post('/ajax_crud/create',[AjaxCrudController::class,'create'])->name('ajax_crud.create');
Route::post('/ajax_crud/edit',[AjaxCrudController::class,'edit'])->name('ajax_crud.edit');
Route::post('/ajax_crud/update',[AjaxCrudController::class,'update'])->name('ajax_crud.update');
Route::post('/ajax_crud/delete',[AjaxCrudController::class,'delete'])->name('ajax_crud.delete');

