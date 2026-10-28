<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/catalog', function () {
    return view('catalog');
})->name('catalog');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
