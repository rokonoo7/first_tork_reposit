<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\LoginController;
use  App\Http\Controllers\democontroler;
use  App\Http\Controllers\CategoryController;
use  App\Http\Controllers\CommonThingsController;
use  App\Http\Controllers\AjaxCrudController;
use  App\Http\Controllers\TodoController;

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
Route::get('/bitrader/signup', [LoginController::class, 'view'])->name('bitrader.signup');
Route::post('/bitrader/register', [LoginController::class, 'register'])->name('bitrader.register');
route::get('/form',[democontroler::class,'index']);
route::get('/form/view',[democontroler::class,'view']);
route::post('/register',[democontroler::class,'register']);
Route::get('/form/delete/{id}', [democontroler::class, 'delete'])->name('delete_key');
Route::get('/form/edit/{id}', [democontroler::class, 'edit'])->name('edit_key');
Route::post('/form/update/{id}', [democontroler::class, 'update'])->name('update_key');
Route::post('update/column/value', [CommonThingsController::class, 'updateAValue']);
Route::get('/todo', [TodoController::class, 'create'])->name('todo.create');
Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');
Route::get('/todo/index', [TodoController::class, 'index'])->name('todo.index');
Route::get('/todo/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::post('/todo/update/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::get('/todo/delete/{id}', [TodoController::class, 'destroy'])->name('todo.delete');






route::get('/laravel',function(){
      $laravel=Laravel::all();
      echo "<pre>";
      print_r($laravel);
});
route::get('/login',function(){
      return view('layouts.login');
});
Route::get('/category/index', [CategoryController::class, 'index'])->name('category_index');
Route::get('/category/form', [CategoryController::class, 'create']);
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('edit2_category');
Route::get('category/{id}', [CategoryController::class, 'destroy'])->name('delete_category');
Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('update_category');
Route::post('/category/store', [CategoryController::class, 'store']);
Route::post('/category/index', [CategoryController::class, '']);
Route::post('/login_info', [democontroler::class, 'session_work']);
Route::get('/ajax_crud',[AjaxCrudController::class,'ajax_crud'])->name('ajax_crud');
Route::get('/ajax_crud/read',[AjaxCrudController::class,'read'])->name('ajax_crud.read');
Route::post('/ajax_crud/create',[AjaxCrudController::class,'create'])->name('ajax_crud.create');
Route::post('/ajax_crud/edit',[AjaxCrudController::class,'edit'])->name('ajax_crud.edit');
Route::post('/ajax_crud/update',[AjaxCrudController::class,'update'])->name('ajax_crud.update');
Route::post('/ajax_crud/delete',[AjaxCrudController::class,'delete'])->name('ajax_crud.delete');

