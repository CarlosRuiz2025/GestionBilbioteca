<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fuente Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Vincular archivo CSS personalizado --> 
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: url('/img/fondologin.jpeg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <form action="{{ route('login') }}" method="POST" class="w-full max-w-md bg-gray-900 text-white p-8 rounded-lg shadow-lg fade-in">
        @csrf
        <h2 class="text-2xl font-bold text-purple-400 text-center mb-2">Inicio de Sesión</h2>
        <h3 class="text-center text-gray-400 text-sm mb-4">Bienvenido al sistema de Gestión de Biblioteca</h3>

        <!-- Mostrar mensaje de error si hay alguno -->
        @if ($errors->any())
            <div class="text-red-600 bg-red-200 border border-red-400 p-2 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Campo de Correo -->
        <div class="mb-4">
            <label for="txtCorreo" class="block text-sm font-medium text-gray-400">Correo electrónico</label>
            <input type="text" id="txtCorreo" name="email" class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Ingrese su correo" value="{{ old('email') }}" required>
        </div>

        <!-- Campo de Contraseña -->
        <div class="mb-4">
            <label for="txtContraseña" class="block text-sm font-medium text-gray-400">Contraseña</label>
            <input type="password" id="txtContraseña" name="contrasena" class="w-full p-3 rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Ingrese su contraseña" required>
        </div>

        <!-- Mostrar contraseña -->
        <div class="mb-4 flex items-center">
            <input type="checkbox" id="showPassword" class="mr-2">
            <label for="showPassword" class="text-sm text-gray-400">Mostrar contraseña</label>
        </div>

        <!-- Botón de Iniciar Sesión -->
        <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 transition duration-300 text-white font-bold py-3 rounded-lg">
            Iniciar sesión
        </button>

        <!-- Enlace de Registro -->
        <div class="mt-4 text-center text-sm text-gray-400">
            <p>¿Eres nuevo en el sistema? <a href="{{ url('/registro') }}" class="text-purple-400 hover:text-purple-500">Regístrate</a></p>
        </div>
    </form>

    <script>
        // Mostrar/ocultar contraseña
        document.getElementById('showPassword').addEventListener('change', function () {
            const passwordField = document.getElementById('txtContraseña');
            passwordField.type = this.checked ? 'text' : 'password';
        });
    </script>
</body>
</html>
