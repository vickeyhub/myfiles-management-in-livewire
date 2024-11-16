<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Dashboard;
use App\Livewire\Files\ShowFile;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::middleware('auth')->group(function() {
    Route::get("/", Dashboard::class)->name('dashboard');
    Route::get("/show-file/{id}", ShowFile::class)->name('show.file')->lazy();
});
