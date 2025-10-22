<?php

use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\Admin\AuthAttemptController;
use App\Http\Controllers\Api\Admin\FreelancerController;
use App\Http\Controllers\Api\Admin\IpAddressController;
use App\Http\Controllers\Api\Admin\LocationController;
use App\Http\Controllers\Api\Admin\ProfileController;
use App\Http\Controllers\Api\Admin\ProposalController;
use App\Http\Controllers\Api\Admin\ReviewController;
use App\Http\Controllers\Api\Admin\SkillController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\UserAgentController;
use App\Http\Controllers\Api\Admin\VerificationController;
use App\Http\Controllers\Api\Admin\VisitorController;
use App\Http\Controllers\Api\Admin\WorkController;
use App\Http\Controllers\Api\Admin\ClientController;
use App\Http\Controllers\Api\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->name('v1.')
    ->group(function () {
        Route::controller(AuthController::class)
            ->middleware('guest')
            ->prefix('admin')
            ->name('admin.')
            ->group(function () {
                Route::get('login', 'create')->name('login');
                Route::post('login', 'store');
                Route::post('logout', 'destroy')->name('logout')->middleware('auth');
            });

        Route::middleware('auth')
            ->prefix('auth')
            ->name('auth.')
            ->group(function () {
                Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            });


        Route::controller(AuthAttemptController::class)
            ->prefix('authAttempts')
            ->name('authAttempts.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });


        Route::controller(ClientController::class)
            ->prefix('clients')
            ->name('clients.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });


        Route::controller(FreelancerController::class)
            ->prefix('freelancers')
            ->name('freelancers.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });


        Route::controller(VerificationController::class)
            ->prefix('verifications')
            ->name('verifications.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });


        Route::controller(IpAddressController::class)
            ->prefix('ipAddress')
            ->name('ipAddress.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });


        Route::controller(LocationController::class)
            ->prefix('locations')
            ->name('locations.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });


        Route::controller(ProfileController::class)
            ->prefix('profiles')
            ->name('profiles.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });


        Route::controller(ProposalController::class)
            ->prefix('proposals')
            ->name('proposals.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });


        Route::controller(ReviewController::class)
            ->prefix('reviews')
            ->name('reviews.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });


        Route::controller(SkillController::class)
            ->prefix('skills')
            ->name('skills.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });


        Route::controller(UserAgentController::class)
            ->prefix('userAgents')
            ->name('userAgents.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });


        Route::controller(VisitorController::class)
            ->prefix('visitors')
            ->name('visitors.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });


        Route::controller(WorkController::class)
            ->prefix('works')
            ->name('works.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });


        Route::controller(UserController::class)
            ->prefix('users')
            ->name('users.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });

    });


