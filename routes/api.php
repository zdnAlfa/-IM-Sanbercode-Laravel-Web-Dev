<?php

use Illuminate\Support\Facades\Route;

// Minimal API routes file to satisfy framework loader.
Route::get('/ping', function () {
    return response()->json(['pong']);
});
