<?php

use App\Http\Controllers\AddUpdateCvController;
use App\Http\Controllers\ShowWorkerProfil;
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

Route::get('/', function () {
    return view('welcome');
});

// show worker profil
Route::get('dashboard/worker-profil', [ShowWorkerProfil::class, "index"]);

//Add new cv for worker
Route::post('/dashboard/worker-profil/worker-add-cv', [AddUpdateCvController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
