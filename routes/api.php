<?php

use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/login', function (Request $request) {
    return htmlspecialchars("Goto '/api/generate-token' to generate Sanctum access token. Then use it in the Authorization header as 'Bearer <token>'.");
})->name('login');

Route::get('/generate-token', function () {
    $user = User::createOrFirst([
        'name' => 'Test User',
        'email' => 'user@example.com',
    ], [
        'password' => bcrypt('password'),
    ]);

    $token = $user->createToken('super-token')->plainTextToken;

    return $token;
});

Route::apiResource('contacts', ContactController::class)->middleware('auth:sanctum');
