<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\UploadController;
use App\Models\Post;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/', [UploadController::class, 'index']);
Route::get('post/edit/{post}', [UploadController::class, 'editPost'])->name('editPost');
Route::put('post/update/{id}', [UploadController::class, 'updatePost'])->name('updatePost');

Route::get('/showUpload', [UploadController::class, 'showUpload']);

Route::post('/upload', [UploadController::class, 'upload'])->name('uploadImg');
Route::post('/store', [UploadController::class, 'store'])->name('storeImg');


require __DIR__.'/auth.php';
