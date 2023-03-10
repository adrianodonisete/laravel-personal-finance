<?php


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
Route::get('/entry/results', [EntryController::class, 'firstStep'])->name('entry.results');

Route::get('/pages/{page}', [Templates::class, 'show']);
