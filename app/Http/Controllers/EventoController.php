<?php

namespace App\Http\Controllers;

use App\Models\Evento;

class EventoController extends Controller
{
    // Listar todos los eventos
    public function index()
    {
        $eventos = Evento::all();
        return view('eventos.index', compact('eventos'));
    }
}
