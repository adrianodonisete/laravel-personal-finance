<?php

use App\Http\Controllers\Download\FilesController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Finance\EntryController;
use App\Http\Controllers\Pages\Templates;


Route::get('/', function () {
    return redirect(route('entry.first'));
});

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/entry/first', [EntryController::class, 'firstStep'])->name('entry.first');
Route::post('/entry/second', [EntryController::class, 'secondStep'])->name('entry.second');
Route::post('/entry/results', [EntryController::class, 'results'])->name('entry.results');

Route::post('/download/csv', [FilesController::class, 'downloadCsv'])->name('download.csv');

Route::get('/pages/{page}', [Templates::class, 'show']);
