<?php

use App\Http\Controllers\ImageUploadController;
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

Route::post('document-upload', [ ImageUploadController::class, 'uploadImage' ])->name('image.upload.post');
Route::post('document-upload-url', [ ImageUploadController::class, 'getTempUploadUrl' ])->name('image.upload.url.post');

require __DIR__.'/auth.php';
