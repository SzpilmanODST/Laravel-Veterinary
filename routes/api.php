<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PetOwnerController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PrescriptionController;

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Role: Admin
    Route::middleware('role:admin')->group(function() {
        Route::post('/register', [AuthController::class, 'register']);

        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/{id}', [UserController::class, 'show']);
        Route::put('/users/{id}', [UserController::class, 'update']);
        Route::delete('/users/{id}', [UserController::class, 'destroy']);

        Route::get('/appointments', [AppointmentController::class, 'index']);
        Route::get('/appointments/{id}', [AppointmentController::class, 'show']);
        Route::post('/appointments', [AppointmentController::class, 'store']);
        Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']);

        Route::get('/prescriptions', [PrescriptionController::class, 'index']);
        Route::get('/prescriptions/{id}', [PrescriptionController::class, 'show']);
        Route::put('/prescriptions/{id}', [PrescriptionController::class, 'update']);

        Route::get('/pets', [PetController::class, 'index']);
        Route::get('/pets/{id}', [PetController::class, 'show']);
        Route::post('/pets', [PetController::class, 'store']);
        Route::put('/pets/{id}', [PetController::class, 'update']);
        Route::delete('/pets/{id}', [PetController::class, 'destroy']);

        Route::get('/pet-owners', [PetOwnerController::class, 'index']);
        Route::get('/pet-owners/{id}', [PetOwnerController::class, 'show']);
        Route::post('/pet-owners', [PetOwnerController::class, 'store']);
        Route::put('/pet-owners/{id}', [PetOwnerController::class, 'update']);
        Route::delete('/pet-owners/{id}', [PetOwnerController::class, 'destroy']);
    });

    // Role: Doctor
    Route::middleware('role:doctor')->group(function() {
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/{id}', [UserController::class, 'show']);
        Route::put('users/{id}', [UserController::class, 'update']);

        Route::get('/appointments', [AppointmentController::class, 'index']);
        Route::get('/appointments/{id}', [AppointmentController::class, 'show']);
        Route::post('/appointments', [AppointmentController::class, 'store']);
        Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']);

        Route::get('/prescriptions', [PrescriptionController::class, 'index']);
        Route::get('/prescriptions/{id}', [PrescriptionController::class, 'show']);
        Route::put('/prescriptions/{id}', [PrescriptionController::class, 'update']);

        Route::get('/pets', [PetController::class, 'index']);
        Route::get('/pets/{id}', [PetController::class, 'show']);
        Route::post('/pets', [PetController::class, 'store']);
        Route::put('/pets/{id}', [PetController::class, 'update']);
        Route::delete('/pets/{id}', [PetController::class, 'destroy']);

        Route::get('/pet-owners', [PetOwnerController::class, 'index']);
        Route::get('/pet-owners/{id}', [PetOwnerController::class, 'show']);
        Route::post('/pet-owners', [PetOwnerController::class, 'store']);
        Route::put('/pet-owners/{id}', [PetOwnerController::class, 'update']);
        Route::delete('/pet-owners/{id}', [PetOwnerController::class, 'destroy']);

        
    });

    // Role: Secretary
    Route::middleware('role:secretary')->group(function() {
        Route::get('/appointments', [AppointmentController::class, 'index']);
        Route::get('/appointments/{id}', [AppointmentController::class, 'show']);
        Route::post('/appointments', [AppointmentController::class, 'store']);
        Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']);

        Route::get('/pet-owners', [PetOwnerController::class, 'index']);
        Route::get('/pet-owners/{id}', [PetOwnerController::class, 'show']);
        Route::post('/pet-owners', [PetOwnerController::class, 'store']);
        Route::put('/pet-owners/{id}', [PetOwnerController::class, 'update']);
        Route::delete('/pet-owners/{id}', [PetOwnerController::class, 'destroy']);

    });

    // Cerrar sesión
    Route::post('/logout', [AuthController::class, 'logout']);
    
});

    // Iniciar sesión
    Route::post('/login', [AuthController::class, 'login']);


        Route::post('/register', [AuthController::class, 'register']);

        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/{id}', [UserController::class, 'show']);
        Route::put('/users/{id}', [UserController::class, 'update']);
        Route::delete('/users/{id}', [UserController::class, 'destroy']);

        Route::get('/appointments', [AppointmentController::class, 'index']);
        Route::get('/appointments/{id}', [AppointmentController::class, 'show']);
        Route::post('/appointments', [AppointmentController::class, 'store']);
        Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']);

        Route::get('/prescriptions', [PrescriptionController::class, 'index']);
        Route::get('/prescriptions/{id}', [PrescriptionController::class, 'show']);
        Route::put('/prescriptions/{id}', [PrescriptionController::class, 'update']);

        Route::get('/pets', [PetController::class, 'index']);
        Route::get('/pets/{id}', [PetController::class, 'show']);
        Route::post('/pets', [PetController::class, 'store']);
        Route::put('/pets/{id}', [PetController::class, 'update']);
        Route::delete('/pets/{id}', [PetController::class, 'destroy']);

        Route::get('/pet-owners', [PetOwnerController::class, 'index']);
        Route::get('/pet-owners/{id}', [PetOwnerController::class, 'show']);
        Route::post('/pet-owners', [PetOwnerController::class, 'store']);
        Route::put('/pet-owners/{id}', [PetOwnerController::class, 'update']);
        Route::delete('/pet-owners/{id}', [PetOwnerController::class, 'destroy']);



        


