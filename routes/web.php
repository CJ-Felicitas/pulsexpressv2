<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    SearchFunctionController,
    OverviewController,
    RegistrationController,
    QuartersController,
    TargetController,
    MunicipalityController,
    ClientDashboardController,
    AdminDashboardController,
};

Route::get('/', function () {
    return view('login');
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Routes accessible only to authenticated users
Route::middleware(['loggedin'])->group(function () {
    // routes for the client side
    Route::prefix('client')->group(function () {
        Route::get('/dashboard', [ClientDashboardController::class, 'returnView']);
        Route::post('/submitreport', [ClientDashboardController::class, 'submitReport']);
        Route::get('/api/municipalities/{provinceId}', [MunicipalityController::class, 'getMunicipalities']);

    });

    // routes for the admin side
    Route::prefix('admin')->group(function () {
        Route::prefix('/dashboard')->group(function () {
            // first quarter dashboard
            Route::get('/firstquarter', [AdminDashboardController::class, 'firstQuarter']);
            Route::get('/secondquarter', [AdminDashboardController::class, 'secondQuarter']);
            Route::get('/thirdquarter', [AdminDashboardController::class, 'thirdQuarter']);
            Route::get('/fourthquarter', [AdminDashboardController::class, 'fourthQuarter']);
            Route::get('/firstsemester', [AdminDashboardController::class, 'firstSemester']);
            Route::get('/secondsemester', [AdminDashboardController::class, 'secondSemester']);
        });

        Route::get('/target', [TargetController::class, 'returnview']);
        Route::get('/activequarters', function () {
            return view('admin.activequarters');
        });
        Route::post('/applytarget', [TargetController::class, 'updateTarget']);
        Route::prefix('quarters')->group(function () {
            Route::post('/setfirstquarter', [QuartersController::class, 'firstquarter']);
            Route::post('/setsecondquarter', [QuartersController::class, 'secondquarter']);
            Route::post('/setthirdquarter', [QuartersController::class, 'thirdquarter']);
            Route::post('/setfourthquarter', [QuartersController::class, 'fourthquarter']);
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




