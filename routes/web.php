<?php

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get(md5('/about'), function(){
    return view('about');
})->name('about.us');

Route::get('/contact', function(){
    return view('contact');
})->name('contact.us');


// Igor it
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';