<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

Route::get('/', function () {
    return view('top');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function () {
    Route::resource('photos', PhotoController::class, ['only' => ['index', 'store', 'destroy']]);
});