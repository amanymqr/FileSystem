<?php

use App\Http\Controllers\FileControl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function(){
//Routes for file system

Route::get('/form',[FileControl::class ,'uploadForm'])->name('file.form');
Route::post('/uploaded',[FileControl::class ,'stor'])->name('file.upload');
Route::get('/show', [FileControl::class, 'show'])->name('file.show');
Route::match(['post', 'delete'], '/files/{id}/delete', [FileControl::class, 'destroy'])->name('file.destroy');

});

Route::get('/download/{file}', [FileControl::class, 'download'])->name('file.download');
Route::get('/share/{file}', [FileControl::class, 'share'])->name('file.share');

require __DIR__.'/auth.php';
