<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Ejemplar;
use App\Models\Usuario;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PrestamoController extends Controller
{
    // Muestra la lista de préstamos
    public function index()
    {
        // Obtener solo los préstamos que no han sido eliminados lógicamente (estado_auditoria = 1)
        $prestamos = Prestamo::where('estado_auditoria', '1')->with('usuario', 'ejemplar.libro')->get();

        return view('prestamos.prestamos', compact('prestamos'));
    }

    // Muestra el formulario de creación de un préstamo
    public function create()
    {
        $libros = Libro::with('ejemplares')->get();  // Obtener todos los libros y sus ejemplares
        $usuarios = Usuario::all();  // Obtener todos los usuarios
        
        return view('prestamos.create', compact('libros', 'usuarios'));
    }

    // Método para guardar un préstamo
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,usuario_id',
            'ejemplar_id' => 'required|exists:ejemplares,ejemplar_id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date|after:fecha_prestamo',
        ]);

        // Crear el préstamo
        $prestamo = new Prestamo();
        $prestamo->usuario_id = $request->usuario_id;
        $prestamo->ejemplar_id = $request->ejemplar_id;
        $prestamo->fecha_prestamo = $request->fecha_prestamo;
        $prestamo->fecha_devolucion = $request->fecha_devolucion;
        $prestamo->estado = 'activo'; // Por ejemplo, dependiendo de cómo manejes el estado
        $prestamo->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('prestamos.create')->with('success', 'Préstamo registrado exitosamente');
    }

    // Muestra el formulario de edición de un préstamo
    public function edit($prestamo_id)
    {
        // Obtener el préstamo con la relación ejemplar y libro
        $prestamo = Prestamo::with('ejemplar.libro', 'usuario')->findOrFail($prestamo_id); 
        $libros = Libro::with('ejemplares')->get();  // Obtener todos los libros y sus ejemplares
        $usuarios = Usuario::all();  // Obtener todos los usuarios
        $ejemplares = Ejemplar::all();  // Obtener todos los ejemplares disponibles

        return view('prestamos.edit', compact('prestamo', 'libros', 'usuarios', 'ejemplares'));
    }

    public function update(Request $request, $id)
    {
        $prestamo = Prestamo::findOrFail($id);

        $prestamo->usuario_id = $request->usuario_id;
        $prestamo->ejemplar_id = $request->ejemplar_id;
        $prestamo->fecha_prestamo = $request->fecha_prestamo;
        $prestamo->fecha_devolucion = $request->fecha_devolucion;
        $prestamo->estado = $request->estado;
        $prestamo->metodo_entrega = $request->metodo_entrega;
        $prestamo->multa_aplicada = $request->multa_aplicada;
        $prestamo->observaciones = $request->observaciones;

        // Guardar el préstamo
        $prestamo->save();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado correctamente');
    }

    // Muestra los detalles de un préstamo específico
    public function show($id)
    {
        // Obtener el préstamo
        $prestamo = Prestamo::findOrFail($id);
        return view('prestamos.show', compact('prestamo'));
    }

    // Eliminar un préstamo
    public function destroy($id)
    {
        // Obtener el préstamo
        $prestamo = Prestamo::findOrFail($id);

        // Cambiar el estado del ejemplar a 'Disponible'
        $ejemplar = $prestamo->ejemplar;
        $ejemplar->estado = 'Disponible';
        $ejemplar->save();

        // Realizar la eliminación lógica cambiando el estado de auditoría a 0
        $prestamo->estado_auditoria = '0'; // Cambiar estado de auditoría a '0'
        $prestamo->save();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado correctamente.');
    }
}
