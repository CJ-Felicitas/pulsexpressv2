<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    SearchFunctionController,
    OverviewController,
    RegistrationController
};

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

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Routes accessible only to authenticated users
Route::middleware(['loggedin'])->group(function () {

    // routes for the client side
    Route::prefix('client')->group(function () {
        Route::get('/dashboard', function () {
            return view('client.client');
        });

    });


    // routes for the admin side
    Route::prefix('admin')->group(function () {

        // main dashboard of the admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });

        // provinces for the admin
        Route::prefix('provinces')->group(function () {
            Route::get('/davaodeoro', function () {
                return view('admin.provinces.davaodeoro');
            });
            Route::get('/davaooccidental', function () {
                return view('admin.provinces.davaooccidental');
            });
            Route::get('/davaooriental', function () {
                return view('admin.provinces.davaooriental');
            });
            Route::get('/davaodelsur', function () {
                return view('admin.provinces.davaodelsur');
            });
            Route::get('/davaodelnorte', function () {
                return view('admin.provinces.davaodelnorte');
            });
            Route::get('/davaocity', function () {
                return view('admin.provinces.davaocity');
            });
        });
    });

});




