<?php

use App\Http\Controllers\DisasterReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DisasterReportController::class, 'create'])->name('reports.create');
Route::post('/reports', [DisasterReportController::class, 'store'])->name('reports.store');
Route::get('/reports', [DisasterReportController::class, 'index'])->name('reports.index');
Route::put('/reports/{id}/{status}', [DisasterReportController::class, 'updateStatus'])->name('reports.updateStatus');
Route::delete('/reports/{id}', [DisasterReportController::class, 'destroy'])->name('reports.destroy');
