<?php

use App\Http\Controllers\Api\Admin\HomeController;
use Illuminate\Support\Facades\Route;

require 'web/admin.php';
require 'web/client.php';
require 'web/freelancer.php';

Route::controller(HomeController::class)
    ->group(function () {
        Route::get('', 'index')->name('home');
    });
