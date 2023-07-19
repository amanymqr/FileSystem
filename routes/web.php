<?php

use App\Http\Controllers\FileControl;
use Illuminate\Support\Facades\Route;


Route::get('/form',[FileControl::class ,'uploadForm'])->name('file.form');
Route::post('/uploaded',[FileControl::class ,'stor'])->name('file.upload');
Route::get('/show', [FileControl::class, 'show'])->name('file.show');
Route::get('/download/{file}', [FileControl::class, 'download'])->name('file.download');
Route::get('/view/{id}', [FileControl::class, 'view'])->name('file.view');
