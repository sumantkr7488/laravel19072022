<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Settings\AccountController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

// Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

// Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

// Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');

// Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

// Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::resource('/contacts', ContactController::class);
// Route::resource('/contacts', ContactController::class)->parameters([
//     'contacts' => 'kontak',
// ]);
// Route::resource('/contacts', ContactController::class)->names([
//     'index' => 'contacts.all',
//     'show' => 'contacts.view'
// ]);
// Route::resource('/companies.contacts', ContactController::class);
// Route::resource('/contacts', ContactController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
// Route::resource('/contacts', ContactController::class)->except(['index', 'show']);
// Route::resources([
//     '/contacts' => ContactController::class,
//     '/companies' => CompanyController::class
// ]);

Auth::routes(['verify' => true]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/settings/account', [AccountController::class, 'index']);