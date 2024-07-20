<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function(){
    Route::get('/home', \App\Livewire\Home::class)->name('home');
    Route::get('/profile', \App\Livewire\Auth\Profile::class)->name('profile');
    Route::get('/menu', \App\Livewire\Menu\Index::class)->name('menu.index');
    Route::get('/customer', \App\Livewire\Customer\Index::class)->name('customer.index');

    Route::get('/transaksi', \App\Livewire\Transaksi\Index::class)->name('transaksi.index');
    Route::get('/transaksi/create', \App\Livewire\Transaksi\Actions::class)->name('transaksi.create');
    Route::get('/transaksi/export', \App\Livewire\Transaksi\Export::class)->name('transaksi.export');
    Route::get('/transaksi/{transaksi}/edit', \App\Livewire\Transaksi\Actions::class)->name('transaksi.edit');
    Route::get('/transaksi/{transaksi}/cetak', \App\Livewire\Transaksi\Cetak::class)->name('transaksi.cetak');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
});
