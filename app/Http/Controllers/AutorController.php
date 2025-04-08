<?php

namespace App\Http\Controllers;

use App\Models\Autor;

class AutorController extends Controller
{
    // Listar todos los eventos
    public function index()
    {
        $autores = Autor::all();
        return view('autores.index', compact('autores'));
    }
}