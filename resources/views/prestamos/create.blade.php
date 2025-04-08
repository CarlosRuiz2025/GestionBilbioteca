@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-4xl font-semibold text-purple-600 mb-8 text-center">📚 Crear Préstamo</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('prestamos.store') }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-lg">
        @csrf
        <div class="space-y-6">
            <!-- Seleccionar Usuario -->
            <div class="flex flex-col mb-4">
                <label for="usuario_id" class="text-sm font-medium text-white mb-2">Selecciona un Usuario</label>
                <select name="usuario_id" id="usuario_id" class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                    <option value="">Seleccione un usuario</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->usuario_id }}" {{ old('usuario_id') == $usuario->usuario_id ? 'selected' : '' }}>
                            {{ $usuario->nombre }} {{ $usuario->apellido_paterno }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Fecha de Préstamo -->
            <div class="flex flex-col mb-4">
                <label for="fecha_prestamo" class="text-sm font-medium text-white mb-2">Fecha de Préstamo</label>
                <input type="date" name="fecha_prestamo" id="fecha_prestamo" class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-purple-500" value="{{ old('fecha_prestamo') }}" required>
            </div>

            <!-- Fecha de Devolución -->
            <div class="flex flex-col mb-4">
                <label for="fecha_devolucion" class="text-sm font-medium text-white mb-2">Fecha de Devolución</label>
                <input type="date" name="fecha_devolucion" id="fecha_devolucion" class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-purple-500" value="{{ old('fecha_devolucion') }}" required>
            </div>

            <!-- Tabla de Libros y Ejemplares -->
            <div class="overflow-x-auto bg-gray-800 rounded-lg shadow-md">
                <table class="min-w-full divide-y divide-gray-700 text-white">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Libro</th>
                            <th class="px-4 py-3 text-left">Ejemplares Disponibles</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @foreach($libros as $libro)
                            <tr class="hover:bg-gray-700">
                                <td class="px-4 py-3">{{ $libro->libro_id }}</td>
                                <td class="px-4 py-3">{{ $libro->titulo }}</td>
                                <td class="px-4 py-3">
                                    @if($libro->ejemplares->isEmpty())
                                        <span class="text-red-500">Sin ejemplares disponibles</span>
                                    @else
                                        <select name="ejemplar_id" class="w-full p-2 mt-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-purple-500">
                                            <option value="">Seleccione un ejemplar</option>
                                            @foreach($libro->ejemplares as $ejemplar)
                                                <option value="{{ $ejemplar->ejemplar_id }}" {{ old('ejemplar_id') == $ejemplar->ejemplar_id ? 'selected' : '' }}>
                                                    {{ $ejemplar->codigo_inventario }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Botón de Envío del Formulario -->
            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md">
                    Registrar Préstamo
                </button>
            </div>
        </div>
    </form>
</div>

{{-- Script para desactivar otros selects al seleccionar un ejemplar --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selects = document.querySelectorAll('select[name="ejemplar_id"]');

        selects.forEach(select => {
            select.addEventListener('change', function () {
                if (this.value) {
                    selects.forEach(s => {
                        if (s !== this) s.disabled = true;
                    });
                } else {
                    selects.forEach(s => s.disabled = false);
                }
            });
        });
    });
</script>
@endsection
