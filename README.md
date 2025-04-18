# Sistema de Gestión de Biblioteca

![Imagen de la Base de Datos](https://i.imgur.com/psXAAeL_d.webp?maxwidth=760&fidelity=grand.jpg)

## Descripción
El Sistema de Gestión para una Biblioteca  es una aplicación diseñada para optimizar la administración de bibliotecas comunitarias, municipales o independientes. Su principal objetivo es facilitar la gestión eficiente del inventario de libros, la administración de usuarios y los procesos de préstamo y devolución, asegurando un acceso organizado y ágil a los recursosbibliográficos.

## Las principales características del sistema incluyen:
- CRUD completo de Usuarios.
- CRUD completo de Libros.
- CRUD completo de Préstamos.
- Búsqueda avanzada de libros por título, autor, género, etc.
- Interfaz intuitiva y fácil de usar.
- Listado de Autores.
- Listado de Eventos.

## Curso
**Taller de Programación Web**

## Docente
**Diego Fernando Baes Vasquez**

## Tema
**Sistema de Gestión de Biblioteca**

## Integrantes
- [Carlos Andrés Ruiz Miranda]
- [Gian Pier Alessandro Tovar Inuma]
- [Juan Dennis Herrera Lurita]


## Tecnologías Utilizadas
| Tecnología  | Descripción |
|--------------|-------------|
| Laravel     | Framework de PHP para desarrollo web con enfoque en el backend. |
| Composer    | Administrador de dependencias para PHP. |
| HTML5       | Lenguaje de marcado para estructurar la interfaz de usuario. |
| CSS         | Hojas de estilo para mejorar la apariencia visual del sistema. |
| PostgreSQL  | Sistema de gestión de bases de datos relacional. |

## Librerías Utilizadas
- [Tailwind CSS - Página Oficial](https://tailwindcss.com)

## Prueba de la Aplicación
1. Clonar el repositorio:  
   ```bash
   git clone https://github.com/CarlosRuiz2025/gestion-biblioteca.git
   ```

2. Abrir el proyecto en Visual Studio Code:
   - Abrir Visual Studio Code.
   - Ir a **File (Archivo) → Open Folder (Abrir Carpeta)**.
   - Seleccionar "GestionBiblioteca".
   - Finalizar.

3. Instalar dependencia del composer 
   - Abre la terminal cmd o powershel directo desde el visual code 
   - Instala las siguientes dependencia: 
    ```bash
    composer install
    ```
    ```bash
    npm install
    ```
4. Generar Key
    ```bash
    php artisan key:generate
    ```
5. Crear conexion a la base de datos 
   - crear un file (arhivo) .env donde iran las bases para la conexion a la BD
   - Copiar y pegar lo del archivo .env.example
6. Ejemplo de la conexión de la BD
   ```bash
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=BdBiblioteca
    DB_USERNAME=postgres
    DB_PASSWORD=Dariagmna3000@
    ```
     
## Configuración de la Base de Datos
1. Asegurarse de que PostgreSQL esté en ejecución.
2. Crear la base de datos si no está creada, ejecutando el script SQL proporcionado.

## Ejecutar la Aplicación
Para iniciar el servidor, ejecutar los siguientes comandos en una terminal cada una:
```bash
npm run dev
```
```bash
php artisan serve
```

---
***Proyecto en desarrollo con entusiasmo y dedicación. 🚀📚***
