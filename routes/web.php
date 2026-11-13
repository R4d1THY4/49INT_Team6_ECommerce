<?php

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware('auth');

