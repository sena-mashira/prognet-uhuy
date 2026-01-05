<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OpportunityCategoryController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserSavedOpportunityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage');
})->name('landing');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

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

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::resource('blogs', BlogController::class);

    Route::post(
        '/opportunities/{opportunity}/save',
        [UserSavedOpportunityController::class, 'store']
    )->name('saved.store');


    Route::resource('threads', ThreadController::class);

    Route::post(
        'threads/{thread}/replies',
        [ReplyController::class, 'store']
    )->name('replies.store');

    Route::delete('/replies/{reply}', [ReplyController::class, 'destroy'])->name('replies.destroy');
});
