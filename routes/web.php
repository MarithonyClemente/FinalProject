<?php

use App\Http\Controllers\CompanyController;
 
Route::resource('companies', CompanyController::class);
Route::get('/search', [CompanyController::class, 'search'])->name('companies.search');