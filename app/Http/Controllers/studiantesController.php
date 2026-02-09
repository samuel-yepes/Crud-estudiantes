<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiantes;
use Illuminate\Support\Facades\DB;

class studiantesController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiantes::paginate(10);
        return view('estudiantes', compact('estudiantes'));
    }

    public function crear()
    {
        return view('crear');
    }

   public function guardar(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'correo' => 'required|email|unique:student,correo',
        'edad' => 'required|integer',
        'telefono' => 'required|string|max:20',
        'lenguaje' => 'required|string|max:50',
    ]);

    Estudiantes::create($request->only([
        'nombre',
        'correo',
        'edad',
        'telefono',
        'lenguaje'
    ]));

    return redirect()
    ->route('estudiantes.index')
    ->with([
            'alert' => [
            'type' => 'success',
            'title' => 'Creado',
            'message' => 'Estudiante creado correctamente'
            ]
        ]);
}


    public function editar($id)
    {
        $estudiante = Estudiantes::findOrFail($id);
        return view('editar', compact('estudiante'));
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:student,correo,' . $id,
            'edad' => 'required|integer',
            'telefono' => 'required|string|max:20',
            'lenguaje' => 'required|string|max:50',
        ]);

        $estudiante = Estudiantes::findOrFail($id);
        $estudiante->update($request->all());

        return redirect()
        ->route('estudiantes.index')
        ->with([
            'alert' => [
            'type' => 'success',
            'title' => 'Actualizado',
            'message' => 'Estudiante actualizado correctamente'
            ]
        ]);
    }

    public function eliminar($id)
    {
        $estudiante = Estudiantes::findOrFail($id);
        $estudiante->delete();

        return redirect()
            ->route('estudiantes.index')
            ->with([
            'alert' => [
            'type' => 'success',
            'title' => 'Eliminado',
            'message' => 'Estudiante eliminado correctamente'
            ]
        ]);
    }
}
