<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Finance\EntryController;
use App\Http\Controllers\Pages\Templates;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () {
    return view('layout.sb-admin');
});


Route::get('/entry/insert', [EntryController::class, 'insertEntries']);

Route::get('/pages/{page}', [Templates::class, 'show']);
