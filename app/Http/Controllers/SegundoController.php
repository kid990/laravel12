<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SegundoController extends Controller
{
    //
    public function index(){
        $personas = [
            ['id' => 1, 'name' => 'DAVID PAJUELO MENDOZA', 'rol' => 'admin'],
            ['id' => 2, 'name' => 'LUIS GARCÍA', 'rol' => 'user'],
            ['id' => 3, 'name' => 'MARÍA LOPEZ', 'rol' => 'user']
        ];

        $titulo = 'Lista de Personas';
        $personaIdSeleccionada = 1;

        return view('contact1', compact('titulo', 'personaIdSeleccionada', 'personas'));
    }

    public function create(){

        return view('contact1');

    }
}
