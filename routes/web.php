<?php

use App\Http\Controllers\AlldataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AlldataController::class, 'index'])->name('index');
Route::post('/create', [AlldataController::class, 'createData'])->name('create');
Route::get('/upData', [AlldataController::class, 'upData'])->name('upData');
Route::post('/update', [AlldataController::class, 'update'])->name('update');
Route::delete('/delete', [AlldataController::class, 'delete'])->name('delete');
Route::get('/paginate-data', [AlldataController::class, 'pagination']);
Route::get('/searchData', [AlldataController::class, 'searchData'])->name('searchData');
