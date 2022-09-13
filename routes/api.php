<?php
use App\Http\Controllers\JWKSController;
use App\Http\Middleware\TrustHosts;
use Illuminate\Support\Facades\Route;

Route::controller(JWKSController::class)->group(function() {

    Route::get('/jwks', 'jwks')->middleware(TrustHosts::class);

    Route::get('/x509pem', 'x509pem')->middleware(TrustHosts::class);

});
