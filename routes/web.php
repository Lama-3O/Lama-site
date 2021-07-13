<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactUsFormController;

Route::get('contact-us', 'ContactUSController@contactUS');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'HomeController@index');

//Route::get('/contact', [ContactUsFormController::class, 'createForm']);

//Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

//Route::post('/contact', 'ContactUsFormController@ContactUsForm');// قسم تواصل معنا

//Route::get('contact', [ContactUsFormController::class, 'createForm']);

Route::get('/contact', [ContactUsFormController::class, 'createForm']);

Route::post('/', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');