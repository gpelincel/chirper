<?php

use App\Http\Controllers\ChirpController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Resource cria um grupo de rotas
Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store']) //Rotas dentro do grupo, sendo index apenas "/"
    ->middleware(['auth', 'verified']); //Middlewares para o controle das rotas, nesse caso autenticação de login e verificação de email

require __DIR__ . '/auth.php';
