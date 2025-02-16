# Laravel Nuxt Start Setup Guide

This guide explains how to set up a Laravel Nuxt Starter project from a Git repository.

## Prerequisites

Before starting, ensure you have the following installed:
- PHP (>=8.0)
- Composer
- MySQL or SQLite (or any database you prefer)
- Git
- Laravel CLI

## Step 1: Clone the Repository

Run the following command to clone the Laravel project:
```bash
git clone https://github.com/francisgill1000/laravel-nuxt-starter
```

Navigate to the project directory:
```bash
cd laravel-nuxt-starter
```

## Step 2: Install Dependencies

Run the following command to install Laravel dependencies:
```bash
composer install
```

## Step 3: Configure Environment Variables

Copy the example environment file:
```bash
cp .env.example .env
```

Generate an application key:
```bash
php artisan key:generate
```

## Step 4: Run Migrations

Run the following command to create database tables:
```bash
php artisan migrate
```

## Step 5: Serve the Application

Start the Laravel development server:
```bash
php artisan serve OR php -S localhost:8000 -t public
```

The application should now be running at `http://127.0.0.1:8000`.

## Step 6: Register and Login API

### Register API
**Endpoint:**
```
POST /api/register
```

**Request Body (JSON):**
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password",
    "password_confirmation": "password"
}
```

**Response:**
```json
{
    "message": "User registered successfully",
    "token": "your_access_token"
}
```

### Login API
**Endpoint:**
```
POST /api/login
```

**Request Body (JSON):**
```json
{
    "email": "john@example.com",
    "password": "password"
}
```

**Response:**
```json
{
    "message": "Login successful",
    "token": "your_access_token"
}
```

## Step 7: Testing APIs

You can test the API endpoints using:
- Postman
- Curl

Example Curl Command for Login:
```bash
curl -X POST "http://127.0.0.1:8000/api/login" \
     -H "Content-Type: application/json" \
     -d '{"email": "john@example.com", "password": "password"}'
```



## Step 8: Nuxt Setup

Repository also includes nuxt(2) app for you. so you dont need to setup nuxt app by yourself. just follow below commands


```bash
cd frontend
npm i
npm run dev
```

Now nuxt app also running on  `http://127.0.0.1:3000`.

## Conclusion
You have successfully set up a Laravel Nuxt Starter project. 🎉

