<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ButcherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\MeatController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SkinController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login/post', [AuthController::class, 'login_post']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/butcher', [ButcherController::class, 'index']);
Route::get('/butcher/create', [ButcherController::class, 'create']);
Route::post('/butcher/post', [ButcherController::class, 'post']);
Route::get('/butcher/{id}/edit', [ButcherController::class, 'edit']);
Route::post('/butcher/{id}/update', [ButcherController::class, 'update']);
Route::get('/butcher/{id}/delete', [ButcherController::class, 'delete']);


Route::get('/skin', [SkinController::class, 'index']);
Route::get('/skin/create', [SkinController::class, 'create']);
Route::post('/skin/post', [SkinController::class, 'post']);
Route::get('/total_skin', [SkinController::class, 'total_skin']);

Route::get('/get/details/{id}', [SkinController::class, 'getButcherDetails'])->name('getButcherDetails');

Route::get('/meat', [MeatController::class, 'index']);
Route::get('/meat/create', [MeatController::class, 'create']);
Route::post('/meat/post', [MeatController::class, 'post']);


Route::get('/purchases_record', [FinanceController::class, 'purchase']);
Route::get('/purchases_record/create', [FinanceController::class, 'purchase_create']);
Route::post('/purchases_record/post', [FinanceController::class, 'purchase_post']);


Route::get('/sales', [SalesController::class, 'index']);

Route::get('/sales_record', [FinanceController::class, 'sale']);
Route::get('/sales_record/create', [FinanceController::class, 'sale_create']);
Route::post('/sales_record/post', [FinanceController::class, 'sale_post']);

Route::get('export-excel-csv-file/purchase/{slug}', [FinanceController::class, 'export_excel_purchase']);
Route::get('export-excel-csv-file/sale/{slug}', [FinanceController::class, 'export_excel_sale']);

Route::get('export-pdf/purchase', [FinanceController::class, 'export_pdf_purchase']);
Route::get('export-pdf/sale', [FinanceController::class, 'export_pdf_sale']);