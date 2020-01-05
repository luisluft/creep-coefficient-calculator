<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Helpers\HelperFluencia;
use Illuminate\Http\Request;

class ControllerFluencia extends Controller
{
    public function index()
    {
        return view('index');
    }
    
    public function calcular()
    {
        // Calcula Fluencia
        $fluencia = HelperFluencia::fluencia();
        
        return $fluencia;
        // Carrega resultados pro usuário
        
    }
}
