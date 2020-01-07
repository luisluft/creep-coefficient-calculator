@extends('layout.mainlayout', ['current'=>'home'])

@section('title', 'Home')

@section('body')
  <form
    action="/resultado"
    method="post">
    @csrf
    <div class="container">
      <div name="content">
        {{-- Começo do parâmetro--}}
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <span
              name="description"
              class="input-group-text"> Espessura fictícia da Peça
            </span>
            <span
              name="symbol"
              class="input-group-text">h
            </span>
          </div>
          <input
            name="h"
            type="text"
            class="form-control {{!$errors->any() ? '' : ($errors->has('h') ? 'is-invalid' : 'is-valid' )}}"
            value="{{old('h')}}">
          <div class="input-group-append">
            <span
              name="units"
              class="input-group-text">(m)
            </span>
            <span
              name="info"
              class="input-group-text"><a
                tabindex="-1"
                href="#"
                class="badge
            badge-info">?</a></span>
          </div>
          @error('h')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Fim do parâmetro--}}
        {{-- Começo do parâmetro--}}
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <span
              name="description"
              class="input-group-text">Temperatura ambiente
            </span>
            <span
              name="symbol"
              class="input-group-text">T
            </span>
          </div>
          <input
            name="T"
            type="text"
            class="form-control {{!$errors->any() ? '' : ($errors->has('T') ? 'is-invalid' :'is-valid' )}}"
            value="{{old('T')}}">
          <div class="input-group-append">
            <span
              name="units"
              class="input-group-text">(ºC)
            </span>
            <span
              name="info"
              class="input-group-text"><a
                tabindex="-1"
                href="#"
                class="badge
            badge-info">?</a></span>
          </div>
          @error('T')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Fim do parâmetro--}}
        {{-- Começo do parâmetro--}}
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <span
              name="description"
              class="input-group-text">Umidade ambiente
            </span>
            <span
              name="symbol"
              class="input-group-text">U
            </span>
          </div>
          <input
            name="U"
            type="text"
            class="form-control {{!$errors->any() ? '' : ($errors->has('U') ? 'is-invalid' :'is-valid' )}}"
            value="{{old('U')}}">
          <div class="input-group-append">
            <span
              name="units"
              class="input-group-text">(%)
            </span>
            <span
              name="info"
              class="input-group-text"><a
                tabindex="-1"
                href="#"
                class="badge
            badge-info">?</a></span>
          </div>
          @error('U')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Fim do parâmetro--}}
        {{-- Começo do parâmetro--}}
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <span
              name="description"
              class="input-group-text">Tensão de carregamento
            </span>
            <span
              name="symbol"
              class="input-group-text">sigmaC
            </span>
          </div>
          <input
            name="sigmaC"
            type="text"
            class="form-control {{!$errors->any() ? '' : ($errors->has('sigmaC') ? 'is-invalid' :'is-valid' )}}"
            value="{{old('sigmaC')}}">
          <div class="input-group-append">
            <span
              name="units"
              class="input-group-text">(MPa)
            </span>
            <span
              name="info"
              class="input-group-text"><a
                tabindex="-1"
                href="#"
                class="badge
            badge-info">?</a></span>
          </div>
          @error('sigmaC')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Fim do parâmetro--}}
        {{-- Começo do parâmetro--}}
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <span
              name="description"
              class="input-group-text">Idade inicial de carregamento
            </span>
            <span
              name="symbol"
              class="input-group-text">t0
            </span>
          </div>
          <input
            name="t0"
            type="text"
            class="form-control {{!$errors->any() ? '' : ($errors->has('t0') ? 'is-invalid' :'is-valid' )}}"
            value="{{old('t0')}}">
          <div class="input-group-append">
            <span
              name="units"
              class="input-group-text">(dias)
            </span>
            <span
              name="info"
              class="input-group-text"><a
                tabindex="-1"
                href="#"
                class="badge
            badge-info">?</a></span>
          </div>
          @error('t0')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Fim do parâmetro--}}
        {{-- Começo do parâmetro--}}
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <span
              name="description"
              class="input-group-text">Idade para cálculo da fluência
            </span>
            <span
              name="symbol"
              class="input-group-text">t
            </span>
          </div>
          <input
            name="t"
            type="text"
            class="form-control {{!$errors->any() ? '' : ($errors->has('t') ? 'is-invalid' :'is-valid' )}}"
            value="{{old('t')}}">
          <div class="input-group-append">
            <span
              name="units"
              class="input-group-text">(dias)
            </span>
            <span
              name="info"
              class="input-group-text"><a
                tabindex="-1"
                href="#"
                class="badge
            badge-info">?</a></span>
          </div>
          @error('t')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Fim do parâmetro--}}
        {{-- Começo do parâmetro--}}
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <label class="input-group-text">Tipo de agregado</label>
          </div>
          <select
            name="ag"
            class="custom-select {{!$errors->any() ? '' : ($errors->has('ag') ?'is-invalid':'is-valid' )}}"> value="{{old('ag')}}">
            <option
              value="escolha"
              disabled>Escolha...
            </option>
            <option value="basalto">basalto</option>
            <option value="diabasio">diabásio</option>
            <option value="granito">granito</option>
            <option value="gnaisse">gnaisse</option>
            <option value="calcario">calcário</option>
            <option value="arenito">arenito</option>
          </select>
          <div class="input-group-append">
            <span
              name="info"
              class="input-group-text"><a
                tabindex="-1"
                href="#"
                class="badge
            badge-info">?</a></span>
          </div>
          @error('ag')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Fim do parâmetro--}}
        {{-- Começo do parâmetro--}}
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <label class="input-group-text">Tipo de cimento</label>
          </div>
          <select
            name="CP"
            class="custom-select {{!$errors->any() ? '' : ($errors->has('CP')?'is-invalid':'is-valid' )}}"> value="{{old('CP')}}">
            <option disabled>Escolha...</option>
            <option value="1">CP I</option>
            <option value="2">CP II</option>
            <option value="3">CP III</option>
            <option value="4">CP IV</option>
          </select>
          <div class="input-group-append">
            <span
              name="info"
              class="input-group-text"><a
                tabindex="-1"
                href="#"
                class="badge
            badge-info">?</a></span>
          </div>
          @error('CP')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Fim do parâmetro--}}
        {{-- Começo do parâmetro--}}
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <span
              name="description"
              class="input-group-text">Resistência do concreto
            </span>
            <span
              name="symbol"
              class="input-group-text">fck
            </span>
          </div>
          <input
            name="fck"
            type="text"
            class="form-control {{!$errors->any() ? '' : ($errors->has('fck') ? 'is-invalid' : 'is-valid' )}}"
            value="{{ old('fck') }}">
          <div class="input-group-append">
            <span
              name="units"
              class="input-group-text">(MPa)
            </span>
            <span
              name="info"
              class="input-group-text"><a
                tabindex="-1"
                href="#"
                class="badge
            badge-info">?</a></span>
          </div>
          @error('fck')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Fim do parâmetro--}}
        {{-- Começo do parâmetro--}}
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <span
              name="description"
              class="input-group-text">Resistência do concreto na idade considerada
            </span>
            <span
              name="symbol"
              class="input-group-text">fct
            </span>
          </div>
          <input
            name="fct"
            type="text"
            class="form-control {{!$errors->any() ? '' : ($errors->has('fct') ? 'is-invalid' : 'is-valid' )}}"
            value="{{old('fct')}}">
          <div class="input-group-append">
            <span
              name="units"
              class="input-group-text">(MPa)
            </span>
            <span
              name="info"
              class="input-group-text"><a
                tabindex="-1"
                href="#"
                class="badge
            badge-info">?</a></span>
          </div>
          @error('fct')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Fim do parâmetro--}}
        {{-- Começo do parâmetro--}}
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <span
              name="description"
              class="input-group-text">Abatimento do concreto
            </span>
            <span
              name="symbol"
              class="input-group-text">ab
            </span>
          </div>
          <input
            name="ab"
            type="text"
            class="form-control {{!$errors->any() ? '' : ($errors->has('ab') ? 'is-invalid' : 'is-valid' )}}"
            value="{{old('ab')}}">
          <div class="input-group-append">
            <span
              name="units"
              class="input-group-text">(cm)
            </span>
            <span
              name="info"
              class="input-group-text"><a
                tabindex="-1"
                href="#"
                class="badge
            badge-info">?</a></span>
          </div>
          @error('ab')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Fim do parâmetro--}}
        {{-- Começo do parâmetro--}}
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <span
              name="description"
              class="input-group-text">Seção transversal da peça
            </span>
            <span
              name="symbol"
              class="input-group-text">Ac
            </span>
          </div>
          <input
            name="Ac"
            type="text"
            class="form-control {{!$errors->any() ? '' : ($errors->has('Ac') ? 'is-invalid' : 'is-valid' )}}"
            value="{{old('Ac')}}">
          <div class="input-group-append">
            <span
              name="units"
              class="input-group-text">(cm²)
            </span>
            <span
              name="info"
              class="input-group-text"><a
                tabindex="-1"
                href="#"
                class="badge
            badge-info">?</a></span>
          </div>
          @error('Ac')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Fim do parâmetro--}}
        {{-- Começo do parâmetro--}}
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <span
              name="description"
              class="input-group-text">Perímetro da peça em contato com o ar
            </span>
            <span
              name="symbol"
              class="input-group-text">uar
            </span>
          </div>
          <input
            name="uar"
            type="text"
            class="form-control {{!$errors->any() ? '' : ($errors->has('uar') ? 'is-invalid' : 'is-valid' )}}"
            value="{{old('uar')}}">
          <div class="input-group-append">
            <span
              name="units"
              class="input-group-text">(cm)
            </span>
            <span
              name="info"
              class="input-group-text"><a
                tabindex="-1"
                href="#"
                class="badge
            badge-info">?</a></span>
          </div>
          @error('uar')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- Fim do parâmetro--}}
      </div>
      <button
        type="submit"
        class="btn btn-primary">Calcular
      </button>
    </div>
  </form>
@endsection