<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DonationController;

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

Route::get('/', [PublicController::class,'campaigns']);

Route::get('/success', function () {
    return view('success');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('campaigns', [PublicController::class,'campaigns'])->name('campaings-listing');

Route::post('donate', [DonationController::class,'donate'])->name('donate');

Route::get('campaigns/{id}', [PublicController::class,'showCampaign'])->name('show-campaing');

Route::prefix('admin')->group(function () {
    Route::resource('campaigns', CampaignController::class);
});

require __DIR__.'/auth.php';
