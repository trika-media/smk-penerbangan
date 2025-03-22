<?php

use Illuminate\Support\Facades\Route;

//WRAP ALL
Route::namespace('\App\Livewire')->group(function() {
    //NO MIDDLEWARE
    Route::get('/', Welcome::class)->name('welcome');
    Route::namespace('Berita')->prefix('artikel')->as('berita.')->group(function() {
        Route::get('/', Index::class)->name('list');
        Route::get('/{slug}', Detail::class)->name('detail');
    });
    Route::namespace('FormPendaftaran')->prefix('form-pendaftaran')->as('form-pendaftaran.')->group(function() {
        Route::get('/', Index::class)->name('index');
    });
    Route::namespace('Profil')->prefix('profil')->as('profil.')->group(function() {
        Route::get('/{id}', Index::class)->name('index');
    });
    Route::namespace('Keunggulan')->prefix('keunggulan')->as('keunggulan.')->group(function() {
        Route::get('/', Index::class)->name('index');
    });
    Route::namespace('MengapaSmk')->prefix('mengapa-smk')->as('mengapa-smk.')->group(function() {
        Route::get('/', Index::class)->name('index');
        Route::get('/{slug}', Detail::class)->name('detail');
    });
    Route::namespace('KompetensiKeahlian')->prefix('jurusan')->as('jurusan.')->group(function() {
        Route::get('/', Index::class)->name('index');
        Route::get('/profil/{id}', Profil::class)->name('profil');
    });
    //GUEST ONLY
    Route::get('/start-your-day', Login::class)
    ->middleware('guest')
    ->name('login');
    
    //AUTHENTICATED ONLY
    Route::middleware('auth')->group(function () {
        Route::namespace('Admin')->group(function() {
            Route::get('/admin/dashboard', Dashboard::class)->name('dashboard');
            Route::namespace('Pendaftaran')->prefix('pendaftaran')->as('pendaftaran.')->group(function() {
                Route::get('/', Index::class)->name('index');
            });
            Route::namespace('KompetensiKeahlian')->prefix('kompetensi-keahlian')->as('kompetensi-keahlian.')->group(function() {
                Route::get('/', Index::class)->name('index');
            });
            Route::namespace('AlasanMemilih')->prefix('alasan-memilih')->as('alasan-memilih.')->group(function() {
                Route::get('/', Index::class)->name('index');
            });
            Route::namespace('Slider')->prefix('slider')->as('slider.')->group(function() {
                Route::get('/', Index::class)->name('index');
            });
            Route::namespace('InfoPembayaran')->prefix('info-pembayaran')->as('info-pembayaran.')->group(function() {
                Route::get('/', Index::class)->name('index');
            });
            Route::namespace('PeriodePendaftaran')->prefix('periode-pendaftaran')->as('periode-pendaftaran.')->group(function() {
                Route::get('/', Index::class)->name('index');
            });
            Route::namespace('Faq')->prefix('faq')->as('faq.')->group(function() {
                Route::get('/', Index::class)->name('index');
            });
            Route::namespace('RunningText')->prefix('running-text')->as('running-text.')->group(function() {
                Route::get('/', Index::class)->name('index');
            });
            Route::namespace('Berita')->prefix('berita')->as('berita.')->group(function() {
                Route::get('/', Index::class)->name('index');
                Route::get('/{id?}', Form::class)->name('form');
            });
            Route::namespace('BlogMengapaSmk')->prefix('blog-mengapa-smk')->as('blog-mengapa-smk.')->group(function() {
                Route::get('/', Index::class)->name('index');
                Route::get('/{id?}', Form::class)->name('form');
            });
            Route::namespace('BiodataSingkat')->prefix('biodata-singkat')->as('biodata-singkat.')->group(function() {
                Route::get('/', Index::class)->name('index');
            });
            Route::namespace('Benefit')->prefix('benefit')->as('benefit.')->group(function() {
                Route::get('/', Index::class)->name('index');
            });
            Route::namespace('Facility')->prefix('facility')->as('facility.')->group(function() {
                Route::get('/', Index::class)->name('index');
            });
            Route::namespace('Settings')->prefix('settings')->as('settings.')->group(function() {
                Route::namespace('Variabel')->prefix('variabel')->as('variabel.')->group(function() {
                    Route::get('/', Index::class)->name('index');
                });
                Route::namespace('Akun')->prefix('akun')->as('akun.')->group(function() {
                    Route::get('/', Index::class)->name('index');
                });
            });
        });
        Route::get('/logout', function () {
            Auth::logout();
        
            return redirect('/');
        })->name('logout');
    });
});
