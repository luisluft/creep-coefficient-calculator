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
        return view('form')->with(
            'name',
            'Victoria'
        );
    }

    // Calcula fluencia e envia a resposta de volta pra quem pediu
    public function calculo(FluenciaFormValidation $request)
    {
        $fluencia = $this->calculoApi($request);

        // Carrega resultado pro usuário
        return back()
            ->withInput()
            ->with(
                'fluencia',
                $fluencia
            );
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
        $creepData['eci']    = $request->input('eci');

        // Envia dados pro cálculo
        $fluencia = HelperFluencia::fluencia($creepData);
        return $fluencia;
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
