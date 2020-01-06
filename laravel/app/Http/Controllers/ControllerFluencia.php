<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Helpers\HelperFluencia;
use Illuminate\Http\Request;

class ControllerFluencia extends Controller
{
    public function formulario()
    {
        return view('form');
    }
    
    public function calcular(Request $request)
    {
        // Recebe os dados do usuário
        $creepData                       = [];
        $creepData['espessura_ficticia'] = $request->input('espessura_ficticia');
        
        // Envia dados pro cálculo
        $fluencia = HelperFluencia::fluencia($creepData);
        
        // Carrega resultados pro usuário
        return view('results', compact('fluencia'));
        
    }
    
    public function resultado()
    {
        return view('index');
    }
}
