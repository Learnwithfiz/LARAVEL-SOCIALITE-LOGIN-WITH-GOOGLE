<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\LoginWithGoogle;
use App\Http\Middleware\Admin;
Route::get('/',[UserController::class,'OnIndex']);
Route::get('/login',[UserController::class,'OnLogin']);
Route::get('/logout',[UserController::class,'OnLogout']);
Route::post('/register-user',[UserController::class,'OnLoginUserRegister']);
Route::post('/login-user',[UserController::class,'OnLoginUserCheck']);

Route::get('/dashboard',[UserController::class,'OnDashboard'])->middleware(Admin::class);

Route::get('/auth/redirect',[LoginWithGoogle::class,'OnRedirect']);
Route::get('/auth/google/call-back',[LoginWithGoogle::class,'OnCallBack']);

Route::get('/auth/redirect/github',[LoginWithGoogle::class,'OnRedirectGithub']);
Route::get('/auth/github/callback',[LoginWithGoogle::class,'OnCallBackGithub']);