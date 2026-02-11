<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiantes;
use Illuminate\Support\Facades\Storage;

class studiantesController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiantes::orderBy('id', 'asc')->paginate(10);
        return view('estudiantes', compact('estudiantes'));
    }

    public function crear()
    {
        return view('crear');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'correo'   => 'required|email|unique:student,correo',
            'edad'     => 'required|integer',
            'telefono' => 'required|string|max:20',
            'lenguaje' => 'required|string|max:50',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $rutaFoto = null;
        if ($request->hasFile('foto')) {
            $rutaFoto = $request->file('foto')->store('estudiantes', 'public');
        }

        Estudiantes::create([
            'nombre'   => $request->nombre,
            'correo'   => $request->correo,
            'edad'     => $request->edad,
            'telefono' => $request->telefono,
            'lenguaje' => $request->lenguaje,
            'foto'     => $rutaFoto,
        ]);

        return redirect()->route('estudiantes.index')->with([
            'alert' => [
                'type' => 'success',
                'title' => '¡Registro Exitoso!',
                'message' => 'El estudiante ha sido creado correctamente.'
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
            'nombre'   => 'required|string|max:255',
            'correo'   => 'required|email|unique:student,correo,' . $id,
            'edad'     => 'required|integer',
            'telefono' => 'required|string|max:20',
            'lenguaje' => 'required|string|max:50',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $estudiante = Estudiantes::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($estudiante->foto) {
                Storage::disk('public')->delete($estudiante->foto);
            }
            $estudiante->foto = $request->file('foto')->store('estudiantes', 'public');
        }

        $estudiante->update($request->except('foto'));

        return redirect()->route('estudiantes.index')->with([
            'alert' => [
                'type' => 'success',
                'title' => '¡Actualizado!',
                'message' => 'Los datos se han guardado correctamente.'
            ]
        ]);
    }

    public function eliminar($id)
    {
        $estudiante = Estudiantes::findOrFail($id);
        if ($estudiante->foto) {
            Storage::disk('public')->delete($estudiante->foto);
        }
        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with([
            'alert' => [
                'type' => 'success',
                'title' => 'Eliminado',
                'message' => 'Estudiante eliminado correctamente'
            ]
        ]);
    }

    public function eliminarTodos()
    {
        Estudiantes::truncate();
        return redirect()->route('estudiantes.index')->with([
            'alert' => [
                'type' => 'warning',
                'title' => 'Base de datos limpia',
                'message' => 'Se han eliminado todos los registros.'
            ]
        ]);
    }
}