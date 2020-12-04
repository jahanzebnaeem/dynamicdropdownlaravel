<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynamicDependent;

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

Route::get('/dynamic_dependent', [DynamicDependent::class, 'index']);
Route::post('/dynamic_dependent/fetch', [DynamicDependent::class, 'fetch'])->name('dynamicdependent.fetch');
