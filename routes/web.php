<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Settings\AccountController;
use App\Http\Controllers\Settings\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    '/contacts'  => ContactController::class,
    '/companies' => CompanyController::class
]);

Auth::routes(['verify' => true]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/settings/account', [AccountController::class, 'index']);

Route::get('/settings/profile', [ProfileController::class, 'edit'])->name('settings.profile.edit');
Route::put('/settings/profile', [ProfileController::class, 'update'])->name('settings.profile.update');