<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimerController extends Controller
{
    //
    public function index(){
        $personas = [
            ['id' => 1, 'name' => 'DAVID PAJUELO MENDOZA', 'rol' => 'admin'],
            ['id' => 2, 'name' => 'LUIS GARCÍA', 'rol' => 'user'],
            ['id' => 3, 'name' => 'MARÍA LOPEZ', 'rol' => 'user']
        ];

        $data = [
            'titulo'   => 'Lista de Personas',
            'personaIdSeleccionada' => 1,
            'personas' => $personas
        ];

        return view('contact', $data);
    }
}
