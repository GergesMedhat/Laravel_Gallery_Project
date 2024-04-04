<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AlbumController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [AlbumController::class, 'index'])->name('home');
Route::get('/home/{id}', [AlbumController::class, 'show']);
Route::resource('album', AlbumController::class);
Route::resource('photos', PhotoController::class);
Route::get('photos', [PhotoController::class, 'index'])->name('photos.index');
Route::get('photos/create', [PhotoController::class, 'create'])->name('photos.create');
Route::get('photos/{id}', [PhotoController::class, 'show'])->name('photos.show');
Route::get('photos/{id}/delete', [PhotoController::class, 'destroy'])->name('photos.destroy');
Route::get('photos/edit/{id}', [PhotoController::class, 'edit'])->name('photos.edit');
Route::post('photos/edit', [PhotoController::class, 'update'])->name('photos.update');
;
Route::post('photos', [PhotoController::class, 'store'])->name('photos.store');
Route::delete('/albums/{album}/delete', [AlbumController::class, 'deleteWithPhotos'])->name('album.destroyWithPhotos');
Route::get('/albums/{album}/move', [AlbumController::class, 'movePhotos'])->name('album.move');