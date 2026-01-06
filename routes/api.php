<?php

use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/login', function (Request $request) {
    return view('api.login');
    // return htmlspecialchars("Goto '/api/generate-token' to generate Sanctum access token. Then use it in the Authorization header as 'Bearer <token>'.");
})->name('login');

Route::get('/generate-token', function () {
    $user = User::createOrFirst([
        'name' => 'Test User',
        'email' => 'user@example.com',
    ], [
        'password' => bcrypt('password'),
    ]);

    // This just a token generator for testing purpose. Will delete all existing tokens on every request.
    // In production, you should use the login route and login to generate the token.
    $user->tokens()->delete();

    $token = $user->createToken('super-token')->plainTextToken;

    return $token;
})->name('generate-token');

Route::apiResource('contacts', ContactController::class)->middleware('auth:sanctum');
