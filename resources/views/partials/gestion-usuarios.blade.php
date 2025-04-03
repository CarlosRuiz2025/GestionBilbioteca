<!-- Módulo: Gestión de Usuarios -->
<section id="usuarios" class="card bg-gray-800 p-8 rounded-xl shadow-lg slide-in-left mb-12">
    <h2 class="text-2xl font-bold text-purple-400 mb-4">👤 Gestión de Usuarios</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('usuarios.index') }}" class="module-btn bg-indigo-600 hover:bg-indigo-700 transition-colors flex items-center justify-center py-3 px-6 rounded-lg">
            <i class="fas fa-list-ol mr-2 text-lg"></i> 
            <span class="font-medium">Ver Listado de Usuarios</span>
        </a>
        
        <a href="{{ route('usuarios.create') }}" class="module-btn bg-emerald-600 hover:bg-emerald-700 transition-colors flex items-center justify-center py-3 px-6 rounded-lg">
            <i class="fas fa-user-plus mr-2 text-lg"></i>
            <span class="font-medium">Nuevo Usuario</span>
        </a>
    </div>
</section>
