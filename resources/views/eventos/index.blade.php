@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left">Nombre</th>
                        <th class="px-6 py-3 text-left">Descripción</th>
                        <th class="px-6 py-3 text-left">Fecha Inicio</th>
                        <th class="px-6 py-3 text-left">Fecha Fin</th>
                        <th class="px-6 py-3 text-left">Organizador</th>
                        <th class="px-6 py-3 text-left">Ubicación</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($eventos as $evento)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-6 py-4">{{ $evento->nombre }}</td>
                        <td class="px-6 py-4">{{ $evento->descripcion }}</td>
                        <td class="px-6 py-4">{{ $evento->fecha_inicio }}</td>
                        <td class="px-6 py-4">{{ $evento->fecha_fin }}</td>
                        <td class="px-6 py-4">{{ $evento->organizador }}</td>
                        <td class="px-6 py-4">{{ $evento->ubicacion }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection