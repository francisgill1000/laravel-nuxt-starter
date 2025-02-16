<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class); // This will reset the database after each test

// Test user registration
it('registers a new user', function () {
    $response = $this->postJson('/api/register', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $response->assertStatus(201)
             ->assertJsonStructure([
                 'user' => ['id', 'name', 'email'],
                 'token',
             ]);
});

// Test user login
it('logs in a user and returns a token', function () {
    $user = User::factory()->create([
        'password' => Hash::make('password'),
    ]);

    $response = $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertStatus(200)
             ->assertJsonStructure([
                 'user' => ['id', 'name', 'email'],
                 'token',
             ]);
});

// Test user logout
it('logs out a user', function () {
    $user = User::factory()->create();
    $token = $user->createToken('Test Token')->plainTextToken;

    $response = $this->withHeader('Authorization', "Bearer $token")
                     ->postJson('/api/logout');

    $response->assertStatus(200)
             ->assertJson(['message' => 'Logged out successfully']);

    // Check that the token is deleted
    $this->assertCount(0, $user->tokens);
});
