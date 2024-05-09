<?php

use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\GetDeliveryServicesController;
use Illuminate\Support\Facades\Route;


Route::get('delivery_services', GetDeliveryServicesController::class);
Route::post('delivery', DeliveryController::class);
