<?php

use App\Http\Controllers\CRM\Account\AccountController;
use App\Http\Controllers\CRM\Deals\DealController;
use Illuminate\Support\Facades\Route;

Route::post('/add-account',AccountController::class);
Route::post('/add-deal',DealController::class);
