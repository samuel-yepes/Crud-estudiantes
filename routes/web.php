<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studiantesController;

Route::get('/', [studiantesController::class, 'index'])->name('estudiantes.index');

Route::get('/estudiantes/crear', [studiantesController::class, 'crear'])->name('estudiantes.crear');

Route::post('/estudiantes', [studiantesController::class, 'guardar'])->name('estudiantes.guardar');

Route::get('/estudiantes/{id}/editar', [studiantesController::class, 'editar'])->name('estudiantes.editar');

Route::put('/estudiantes/{id}', [studiantesController::class, 'actualizar'])->name('estudiantes.actualizar');

Route::delete('/estudiantes/{id}', [studiantesController::class, 'eliminar'])->name('estudiantes.eliminar');

Route::delete('/estudiantes', [studiantesController::class, 'eliminarTodos'])->name('estudiantes.eliminarTodos');