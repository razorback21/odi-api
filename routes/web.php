<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
