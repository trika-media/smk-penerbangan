<?php

use Illuminate\Support\Facades\Route;

//WRAP ALL
Route::namespace('\App\Livewire')->group(function() {
    //NO MIDDLEWARE
    Route::get('/', Welcome::class)->name('welcome');
    Route::namespace('JalurPendaftaran')->prefix('jalur-pendaftaran')->as('jalur-pendaftaran.')->group(function() {
        Route::get('/', Index::class)->name('index');
    });
    Route::namespace('Pengumuman')->prefix('pengumuman')->as('pengumuman.')->group(function() {
        Route::get('/', Index::class)->name('index');
    });
    Route::namespace('ProgramStudi')->prefix('program-studi')->as('program-studi.')->group(function() {
        Route::get('/', Index::class)->name('index');
    });
    //GUEST ONLY
    Route::get('/start-your-day', Login::class)
    ->middleware('guest')
    ->name('login');
    
    //AUTHENTICATED ONLY
    Route::middleware('auth')->group(function () {
        Route::namespace('Admin')->group(function() {
            Route::get('/admin/dashboard', Dashboard::class)->name('dashboard');
        });
        Route::get('/logout', function () {
            Auth::logout();
        
            return redirect('/');
        })->name('logout');
    });
});
