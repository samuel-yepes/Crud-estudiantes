<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studiantesController;
use App\Http\Controllers\AuthController;


Route::get('/', [AuthController::class, 'vistaLogin'])->name('login');

Route::middleware(['auth'])->group(function (){
        Route::get('/estudiantes', [studiantesController::class, 'index'])->name('estudiantes.index');

        Route::get('/estudiantes/crear', [studiantesController::class, 'crear'])->name('estudiantes.crear');

        Route::post('/estudiantes', [studiantesController::class, 'guardar'])->name('estudiantes.guardar');

        Route::get('/estudiantes/{id}/editar', [studiantesController::class, 'editar'])->name('estudiantes.editar');

        Route::put('/estudiantes/{id}', [studiantesController::class, 'actualizar'])->name('estudiantes.actualizar');

        Route::delete('/estudiantes/{id}', [studiantesController::class, 'eliminar'])->name('estudiantes.eliminar');

        Route::delete('/estudiantes', [studiantesController::class, 'eliminarTodos'])->name('estudiantes.eliminarTodos');
});

Route::get('/login',[AuthController::class,'vistaLogin']);

Route::get('/registro',[AuthController::class,'vistaRegistro']);

Route::post('/login',[AuthController::class,'login']);

Route::post('/registro',[AuthController::class,'registro']);

Route::get('/debug/jwt', function () { //prueba para ver si, si hay token en sesion
        return session('jwt_token') ?? response('No hay token en sesión', 404);
})->middleware('auth');