@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left">Nombre</th>
                        <th class="px-6 py-3 text-left">Apellido Paterno</th>
                        <th class="px-6 py-3 text-left">Apellido Materno</th>
                        <th class="px-6 py-3 text-left">Nacionalidad</th>
                        <th class="px-6 py-3 text-left">Ciudad Natal</th>
                        <th class="px-6 py-3 text-left">Fecha Nacimiento</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($autores as $autor)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-6 py-4">{{ $autor->nombre }}</td>
                        <td class="px-6 py-4">{{ $autor->apellido_paterno }}</td>
                        <td class="px-6 py-4">{{ $autor->apellido_materno }}</td>
                        <td class="px-6 py-4">{{ $autor->nacionalidad }}</td>
                        <td class="px-6 py-4">{{ $autor->ciudad_natal }}</td>
                        <td class="px-6 py-4">{{ $autor->fecha_nacimiento }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection