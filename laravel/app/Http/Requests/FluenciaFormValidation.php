<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FluenciaFormValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'T'      => 'required|numeric|min:0|max:40',
            'U'      => 'required|numeric|min:40|max:90',
            'sigmaC' => 'required|numeric',
            't0'     => 'required|numeric|min:0',
            't'      => 'required|numeric|min:7',
            'ag'     => 'required_without:Eci',
            'CP'     => 'required',
            'fck'    => 'required|numeric|min:20|max:90',
            'fct'    => 'required_without:eci|sometimes|nullable|numeric|min:0',
            'ab'     => 'required|numeric|min:0|max:15',
            'Ac'     => 'required|numeric|min:0',
            'uar'    => 'required|numeric|min:0',
            'eci'    => 'required_without:fct,ag|sometimes|nullable|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'required'         => 'O campo :attribute deve ser preenchido.',
            'email'            => 'O email inserido não é válido.',
            'gt'               => 'O campo :attribute deve ter no mínimo o valor :value.',
            'alpha'            => 'O campo :attribute deve conter apenas letras do alfabeto.',
            'numeric'          => 'O campo :attribute deve conter apenas números.',
            'size'             => 'O campo :attribute deve possuir apenas :size caracteres',
            'min'              => 'O campo :attribute deve ser no mínimo :min',
            'max'              => 'O campo :attribute deve ser no máximo :max',
            'required_without' => 'O campo :attribute deve ser preenchido quando o(s) campos :values está(ão) vazios',
        ];
    }

    public function attributes()
    {
        return [
            'h'      => 'espessura fictícia',
            'T'      => 'temperatura ambiente',
            'U'      => 'umidade ambiente',
            'sigmaC' => 'tensão de carregamento',
            't0'     => 'idade inicial de carregamento',
            't'      => 'idade de avaliação da fluência',
            'ag'     => 'tipo de agregado',
            'CP'     => 'tipo de cimento',
            'fck'    => 'resistência do concreto',
            'fct'    => 'resistência a tração',
            'ab'     => 'abatimento do concreto',
            'Ac'     => 'seção transveral da peça',
            'uar'    => 'perímetro em contato com o ar',
            'Eci'    => 'módulo de elasticidade inicial',
        ];
    }
}
