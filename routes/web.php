<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Finance\EntryController;
use App\Http\Controllers\Pages\Templates;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () {
    return view('layout.sb-admin');
});


Route::get('/entry/first', [EntryController::class, 'firstStep'])->name('entry.first');
Route::post('/entry/second', [EntryController::class, 'secondStep'])->name('entry.second');
Route::get('/entry/results', [EntryController::class, 'firstStep'])->name('entry.results');

Route::get('/pages/{page}', [Templates::class, 'show']);
