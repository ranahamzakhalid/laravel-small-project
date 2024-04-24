<?php

use App\Http\Controllers\BoyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


Route::get('/users',[UserController::class,'showUsers'])->name('home.index')->middleware('isLoggedIn'); 
Route::get('/user/{id}',[UserController::class,'singleUser'])->name('view.user')->middleware('isLoggedIn'); 
Route::get('/delete/{id}',[UserController::class,'deleteUser'])->name('delete.user');

Route::view('newuser','/adduser');
Route::post('/add',[UserController::class,'addUser'])->name('add.user');
Route::get('/update/{id}',[UserController::class,'updateUser'])->name('update.user');
Route::post('/updatedata/{id}',[UserController::class,'updatedata'])->name('update.data');

Route::get('/join',[BoyController::class,'index'])->name('city.table');

Route::get('/',[CategoryController::class,'indexx'])->name('category.index')->middleware('isLoggedIn');
Route::get('/category',[CategoryController::class,'indexx'])->middleware('isLoggedIn');
Route::get('/category/create',[CategoryController::class,'create'])->name('create.category');
Route::post('/category/create',[CategoryController::class,'store'])->name('store.category');
Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('edit.category');
Route::post('/category/{id}/edit',[CategoryController::class,'update'])->name('update.category');
Route::get('/category/{id}/delete',[CategoryController::class,'delete'])->name('delete.category');

Route::get('/login',[LoginController::class,'login'])->name('login.home')->middleware('alreadyLoggedIn');;
Route::get('/registration',[LoginController::class,'registration'])->name('registration.home')->middleware('alreadyLoggedIn');;
Route::post('/register-user',[LoginController::class,'registerUser'])->name('register.user');
Route::post('/login-user',[LoginController::class,'loginUser'])->name('login.user');
Route::get('/logout',[LoginController::class,'logout']);

Route::get('/company',[LoginController::class,'company'])->name('company.name')->middleware('isLoggedIn');
Route::post('/company',[LoginController::class,'companystore'])->name('company.store');
Route::get('/company/{id}/edit',[LoginController::class,'edit'])->name('edit.company');
Route::get('/company/{id}/delete',[LoginController::class,'delcompany'])->name('delete.company');