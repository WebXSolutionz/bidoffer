<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyAuctionBidController;
use App\Http\Controllers\PropertyAuctionController;
use App\Http\Controllers\UserController;
use App\Models\PropertyAuction;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| To add countries data please run this command "php artisan country-data:install"
*/

Route::get('/', function () {
    return view('home');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard'); */

Route::get('get-states', [DashboardController::class, 'getStates'])->name('getStates');
Route::get('get-cities', [DashboardController::class, 'getCities'])->name('getCities');

Route::middleware(['auth','verified'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::post('/settings', [DashboardController::class, 'saveSettings']);
    Route::get('/author', [UserController::class, 'author'])->name('author');
    Route::get('/add-listing', [PropertyAuctionController::class, 'addListing'])->name('add-listing');
    Route::post('/property/listing/step/1',[PropertyAuctionController::class, 'step1'])->name('save-pl-step1');
    Route::post('/property/listing/step/2',[PropertyAuctionController::class, 'step2'])->name('save-pl-step2');
    Route::post('/property/listing/step/3',[PropertyAuctionController::class, 'step3'])->name('save-pl-step3');
    Route::post('/property/listing/step/4',[PropertyAuctionController::class, 'step4'])->name('save-pl-step4');
    Route::post('/property/listing/step/5',[PropertyAuctionController::class, 'step5'])->name('save-pl-step5');
    Route::get('/property/listing/view/{id}', [PropertyAuctionController::class, 'viewPropertyListing'])->name('view-pl');
    Route::post('/property/listing/save-pa-bid', [PropertyAuctionBidController::class, 'savePABid'])->name('savePABid');
    Route::post('/property/listing/accept-pa-bid', [PropertyAuctionBidController::class, 'acceptPABid'])->name('acceptPABid');
    Route::get('/buyer-make-offer',[PropertyAuctionController::class, 'searchListing'])->name('searchListing');


    Route::get('logout', function(){
        Auth::logout();
        // Auth::guard('web')->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect()->to(route('login'));
    });
});

require __DIR__.'/auth.php';
