<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\adminController;
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
    return view('admin.layout');
});

route::get('admin',[adminController::class, 'login']);

route::post('login_post',[adminController::class, 'login_post']);

