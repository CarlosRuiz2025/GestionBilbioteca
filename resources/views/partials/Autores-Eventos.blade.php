<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autores y Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a2e0e6f91e.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
    <section class="card bg-gray-800 p-8 rounded-xl shadow-lg slide-in-right mb-12">
        <h2 class="text-2xl font-bold text-purple-400 mb-4">📚 Gestión de Autores y Eventos</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('autores.index') }}" class="module-btn bg-indigo-600 hover:bg-indigo-700 transition-colors flex items-center justify-center py-3 px-6 rounded-lg text-white">
                <i class="fas fa-user mr-2 text-lg"></i> 
                <span class="font-medium">Ver Autores</span>
            </a>

            <a href="{{ route('eventos.index') }}" class="module-btn bg-emerald-600 hover:bg-emerald-700 transition-colors flex items-center justify-center py-3 px-6 rounded-lg text-white">
                <i class="fas fa-calendar-alt mr-2 text-lg"></i>
                <span class="font-medium">Ver Eventos</span>
            </a>
        </div>
    </section>
</body>
</html>