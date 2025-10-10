<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClientAuthController;
use App\Http\Controllers\API\SupplierAuthController;
use App\Http\Controllers\API\EquipmentController;
use App\Http\Controllers\API\FeedbackController;
use App\Http\Controllers\API\InvoiceController;
use App\Http\Controllers\API\MaintenanceController;
use App\Http\Controllers\API\ServiceOrderController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/registerClient", [ClientAuthController::class, "register"]); 
Route::post("/registerSupplier", [SupplierAuthController::class, "register"]); 

Route::post("/loginClient", [ClientAuthController::class, "login"]); 
Route::post("/loginSupplier", [SupplierAuthController::class, "login"]); 

Route::middleware('auth:sanctum')->group(function () {
Route::post('/logoutClient', [ClientAuthController::class, 'logout']); 
Route::post('/logoutSupplier', [SupplierAuthController::class, 'logout']);
});

/** Equipments Routes  */
Route::get('/equipments', [EquipmentController::class, 'index']); 
Route::post('/equipments', [EquipmentController::class, 'store']); 
Route::get('/equipments/{id}', [EquipmentController::class, 'show']);
Route::put('/equipments/{id}', [EquipmentController::class, 'update']); 
Route::delete('/equipments/{id}', [EquipmentController::class, 'destroy']); 

/** Maintenance Schedule Routes  */
Route::get('/schedules', [MaintenanceController::class, 'index']); 
Route::post('/schedules', [MaintenanceController::class, 'store']); 
Route::get('/schedules/{id}', [MaintenanceController::class, 'show']); 
Route::delete('/schedules/{id}', [MaintenanceController::class, 'destroy']); 

/** Feedback Routes  */
Route::get('/feedbacks', [FeedbackController::class, 'index']); 
Route::post('/feedbacks', [FeedbackController::class, 'store']); 
Route::get('/feedbacks/{id}', [FeedbackController::class, 'show']);
Route::put('/feedbacks/{id}', [FeedbackController::class, 'update']); 
Route::delete('/feedbacks/{id}', [FeedbackController::class, 'destroy']);

/** Invoice Routes  */

Route::get('/invoices', [InvoiceController::class, 'index']); 
Route::post('/invoices', [InvoiceController::class, 'store']); 
Route::get('/invoices/{id}', [InvoiceController::class, 'show']);

/** Service Order Routes  */

Route::get('/serviceOrders', [ServiceOrderController::class, 'index']); 
Route::post('/serviceOrders', [ServiceOrderController::class, 'store']); 
Route::get('/serviceOrders/{id}', [ServiceOrderController::class, 'show']);

