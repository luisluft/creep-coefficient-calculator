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
        $creepData           = [];
        $creepData['h']      = $request->input('h');
        $creepData['t']      = $request->input('t');
        $creepData['T']      = $request->input('T');
        $creepData['t0']     = $request->input('t0');
        $creepData['U']      = $request->input('U');
        $creepData['sigmaC'] = $request->input('sigmaC');
        $creepData['ag']     = $request->input('ag');
        $creepData['CP']     = $request->input('CP');
        $creepData['fck']    = $request->input('fck');
        $creepData['fct']    = $request->input('fct');
        $creepData['ab']     = $request->input('ab');
        $creepData['Ac']     = $request->input('Ac');
        $creepData['uar']    = $request->input('uar');

        // Envia dados pro cálculo
        $fluencia = HelperFluencia::fluencia($creepData);

        // Carrega resultados pro usuário
        return view(
            'results',
            compact('fluencia')
        );

    }

    public function resultado()
    {
        return view('index');
    }
}
