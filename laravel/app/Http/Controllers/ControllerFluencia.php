<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Helpers\HelperFluencia;
use App\Http\Requests\FluenciaFormValidation;
use Illuminate\Http\Request;

class ControllerFluencia extends Controller
{
    public function formulario()
    {
        return view('form');
    }

    // Calcula fluencia e envia a resposta de volta pra quem pediu
    public function calculo(FluenciaFormValidation $request)
    {
        $fluencia = $this->calculoApi($request);

        // Carrega resultado pro usuário
        return back()->withInput()->with('fluencia', $fluencia);
    }

    /**
     * @param FluenciaFormValidation $request
     *
     * @return float|int
     */
    public function calculoApi(FluenciaFormValidation $request)
    {
        // Dados foram validados pelo FluenciaFormValidation
        // Armazena os dados do formulário em um array
        $creepData           = [];
        $creepData['h']      = request('h');
        $creepData['t']      = request('t');
        $creepData['T']      = request('T');
        $creepData['t0']     = request('t0');
        $creepData['U']      = request('U');
        $creepData['sigmaC'] = request('sigmaC');
        $creepData['ag']     = request('ag');
        $creepData['CP']     = request('CP');
        $creepData['fck']    = request('fck');
        $creepData['fct']    = request('fct');
        $creepData['ab']     = request('ab');
        $creepData['Ac']     = request('Ac');
        $creepData['uar']    = request('uar');
        $creepData['eci']    = request('eci');

        // Envia dados pro cálculo
        return HelperFluencia::fluencia($creepData);
    }

    public function teoria()
    {
        return view('theory');
    }

    public function exemplo()
    {
        return view('example');
    }

    public function sobre()
    {
        return view('about');
    }
}
