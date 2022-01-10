<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Settings\AccountController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');

Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');

Auth::routes(['verify' => true]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/settings/account', [AccountController::class, 'index']);