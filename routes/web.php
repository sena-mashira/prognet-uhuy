<?php

use App\Http\Controllers\OpportunityCategoryController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\UserSavedOpportunityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /**
     * OPPORTUNITIES (Resource Controller)
     * ----------------------------------
     * index   -> GET /opportunities
     * create  -> GET /opportunities/create
     * store   -> POST /opportunities
     * show    -> GET /opportunities/{opportunity}
     * edit    -> GET /opportunities/{opportunity}/edit
     * update  -> PUT /opportunities/{opportunity}
     * destroy -> DELETE /opportunities/{opportunity}
     */
    Route::resource('opportunities', OpportunityController::class);

    /**
     * CATEGORIES (Resource Controller)
     */
    Route::resource('categories', OpportunityCategoryController::class);

    /**
     * SAVED OPPORTUNITIES (Custom Routes)
     */
    Route::get('/saved', [UserSavedOpportunityController::class, 'index'])
         ->name('saved.index');

    Route::post('/opportunities/{opportunity}/save',
        [UserSavedOpportunityController::class, 'store']
    )->name('saved.store');
});

