@extends('layout.mainlayout', ['current'=>'Fluência'])

@section('title', 'Fluência')

@section('body')
  <div class="container">
    <form
      action="/calcular"
      method="post"
      id="formFluencia"
      class="needs-validation">
      @csrf
      {{-- Começo do parâmetro--}}
      <div class="input-group mb-0">
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
          id="T"
          type="text"
          class="form-control {{!$errors->any() ? '' : ($errors->has('T') ? 'is-invalid' :'is-valid' )}}"
          value="{{old('T')}}">
        <div class="input-group-append">
          <span
            name="units"
            class="input-group-text">(ºC)
          </span>
          <span
            id="info-temperatura-ambiente"
            class="input-group-text">
            <a
              class="badge badge-info"
              tabindex="-1"
              href="#info-temperatura-ambiente"
              data-toggle="tooltip"
              title="0ºC a 40ºC">?
            </a>
          </span>
        </div>
        <div id="T-validation"></div>
        @error('T')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Fim do parâmetro--}}
      {{-- Começo do parâmetro--}}
      <div class="input-group mb-0">
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
          id="U"
          type="text"
          class="form-control {{!$errors->any() ? '' : ($errors->has('U') ? 'is-invalid' :'is-valid' )}}"
          value="{{old('U')}}">
        <div class="input-group-append">
          <span
            name="units"
            class="input-group-text">(%)
          </span>
          <span
            id="info-umidade-ambiente"
            class="input-group-text">
            <a
              class="badge badge-info"
              tabindex="-1"
              href="#info-umidade-ambiente"
              data-toggle="tooltip"
              title="40% a 90%">?
            </a>
          </span>
        </div>
        @error('U')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Fim do parâmetro--}}
      {{-- Começo do parâmetro--}}
      <div class="input-group mb-0">
        <div class="input-group-prepend">
          <span
            name="description"
            class="input-group-text">Tensão de carregamento
          </span>
          <span
            name="symbol"
            class="input-group-text">σc
          </span>
        </div>
        <input
          name="sigmaC"
          id="sigmaC"
          type="text"
          class="form-control {{!$errors->any() ? '' : ($errors->has('sigmaC') ? 'is-invalid' :'is-valid' )}}"
          value="{{old('sigmaC')}}">
        <div class="input-group-append">
          <span
            name="units"
            class="input-group-text">(MPa)
          </span>
          <span
            id="info-tensao-carregamento"
            class="input-group-text">
            <a
              class="badge badge-info"
              tabindex="-1"
              href="#info-tensao-carregamento"
              data-toggle="tooltip"
              title="Tensão constante aplicada a peça durante o período apurado">?
            </a>
          </span>
        </div>
        @error('sigmaC')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Fim do parâmetro--}}
      {{-- Começo do parâmetro--}}
      <div class="input-group mb-0">
        <div class="input-group-prepend">
          <span
            name="description"
            class="input-group-text">Idade inicial de carregamento
          </span>
          <span
            name="symbol"
            class="input-group-text">t<sub>0</sub>
          </span>
        </div>
        <input
          name="t0"
          id="t0"
          type="text"
          class="form-control {{!$errors->any() ? '' : ($errors->has('t0') ? 'is-invalid' :'is-valid' )}}"
          value="{{old('t0')}}">
        <div class="input-group-append">
          <span
            name="units"
            class="input-group-text">(dias)
          </span>
          <span
            id="info-tempo-zero"
            class="input-group-text">
            <a
              class="badge badge-info"
              tabindex="-1"
              href="#info-tempo-zero"
              data-toggle="tooltip"
              title="Momento em que começa o carregamento (normalmente retirada de escoramento)">?
            </a>
          </span>
        </div>
        @error('t0')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Fim do parâmetro--}}
      {{-- Começo do parâmetro--}}
      <div class="input-group mb-0">
        <div class="input-group-prepend">
          <span
            name="description"
            class="input-group-text">Módulo de elasticidade inicial
          </span>
          <span
            name="symbol"
            class="input-group-text">E<sub>ci</sub>
          </span>
        </div>
        <input
          name="eci"
          id="eci"
          type="text"
          class="form-control {{!$errors->any() ? '' : ($errors->has('eci') ? 'is-invalid' :'is-valid' )}}"
          value="{{old('eci')}}">
        <div class="input-group-append">
          <span
            name="units"
            class="input-group-text">(MPa)
          </span>
          <span
            id="info-tensao-carregamento"
            class="input-group-text">
            <a
              class="badge badge-info"
              tabindex="-1"
              href="#info-tensao-carregamento"
              data-toggle="tooltip"
              title="Substitui tipo de agregado e resistência a tração nos cálculos">?
            </a>
          </span>
        </div>
        @error('eci')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Fim do parâmetro--}}
      {{-- Começo do parâmetro--}}
      <div class="input-group mb-0">
        <div class="input-group-prepend">
          <label class="input-group-text">Tipo de cimento</label>
        </div>
        <select
          name="CP"
          id="CP"
          class="custom-select {{!$errors->any() ? '' : ($errors->has('CP')?'is-invalid':'is-valid' )}}"> value="{{old('CP')}}">
          <option disabled>Escolha...</option>
          <option value="1">CP I</option>
          <option value="2">CP II</option>
          <option value="3">CP III</option>
          <option value="4">CP IV</option>
        </select>
        <div class="input-group-append">
          <span
            id="info-cimento"
            class="input-group-text">
            <a
              class="badge badge-info"
              tabindex="-1"
              href="#info-cimento"
              data-toggle="tooltip"
              title="Qualidade do cimento Portland">?
            </a>
          </span>
        </div>
        @error('CP')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Fim do parâmetro--}}
      {{-- Começo do parâmetro--}}
      <div class="input-group mb-0">
        <div class="input-group-prepend">
          <label class="input-group-text">Tipo de agregado</label>
        </div>
        <select
          name="ag"
          id="ag"
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
            id="info-agregado"
            class="input-group-text">
            <a
              class="badge badge-info"
              tabindex="-1"
              href="#info-agregado"
              data-toggle="tooltip"
              title="Utilizado para calcular módulo de elasticidade inicial.">?
            </a>
          </span>
        </div>
        @error('ag')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Fim do parâmetro--}}
      {{-- Começo do parâmetro--}}
      <div class="input-group mb-0">
        <div class="input-group-prepend">
          <span
            name="description"
            class="input-group-text">Resistência a tração
          </span>
          <span
            name="symbol"
            class="input-group-text">f<sub>ct</sub>
          </span>
        </div>
        <input
          name="fct"
          id="fct"
          type="text"
          class="form-control {{!$errors->any() ? '' : ($errors->has('fct') ? 'is-invalid' : 'is-valid' )}}"
          value="{{old('fct')}}">
        <div class="input-group-append">
          <span
            name="units"
            class="input-group-text">(MPa)
          </span>
          <span
            id="info-resistencia-t"
            class="input-group-text">
            <a
              class="badge badge-info"
              tabindex="-1"
              href="#info-resistencia-t"
              data-toggle="tooltip"
              title="Utilizado para calcular módulo de elasticidade inicial.">?
            </a>
          </span>
        </div>
        @error('fct')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Fim do parâmetro--}}
      {{-- Começo do parâmetro--}}
      <div class="input-group mb-0">
        <div class="input-group-prepend">
          <span
            name="description"
            class="input-group-text">Resistência do concreto
          </span>
          <span
            name="symbol"
            class="input-group-text">f<sub>ck</sub>
          </span>
        </div>
        <input
          name="fck"
          id="fck"
          type="text"
          class="form-control {{!$errors->any() ? '' : ($errors->has('fck') ? 'is-invalid' : 'is-valid' )}}"
          value="{{ old('fck') }}">
        <div class="input-group-append">
          <span
            name="units"
            class="input-group-text">(MPa)
          </span>
          <span
            id="info-resistencia"
            class="input-group-text">
            <a
              class="badge badge-info"
              tabindex="-1"
              href="#info-resistencia"
              data-toggle="tooltip"
              title="20MPa a 90MPa">?
            </a>
          </span>
        </div>
        @error('fck')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Fim do parâmetro--}}
      {{-- Começo do parâmetro--}}
      <div class="input-group mb-0">
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
          id="ab"
          type="text"
          class="form-control {{!$errors->any() ? '' : ($errors->has('ab') ? 'is-invalid' : 'is-valid' )}}"
          value="{{old('ab')}}">
        <div class="input-group-append">
          <span
            name="units"
            class="input-group-text">(cm)
          </span>
          <span
            id="info-abatimento"
            class="input-group-text">
            <a
              class="badge badge-info"
              tabindex="-1"
              href="#info-abatimento"
              data-toggle="tooltip"
              title="Resistência característica do concreto obtida por ensaios da norma NBR NM 67.">?
            </a>
          </span>
        </div>
        @error('ab')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Fim do parâmetro--}}
      {{-- Começo do parâmetro--}}
      <div class="input-group mb-0">
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
          id="Ac"
          type="text"
          class="form-control {{!$errors->any() ? '' : ($errors->has('Ac') ? 'is-invalid' : 'is-valid' )}}"
          value="{{old('Ac')}}">
        <div class="input-group-append">
          <span
            name="units"
            class="input-group-text">(cm²)
          </span>
          <span
            id="info-area"
            class="input-group-text">
            <a
              class="badge badge-info"
              tabindex="-1"
              href="#info-area"
              data-toggle="tooltip"
              title="Área da seção transversal da peça.">?
            </a>
          </span>
        </div>
        @error('Ac')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Fim do parâmetro--}}
      {{-- Começo do parâmetro--}}
      <div class="input-group mb-0">
        <div class="input-group-prepend">
          <span
            name="description"
            class="input-group-text">Perímetro em contato com o ar
          </span>
          <span
            name="symbol"
            class="input-group-text">u<sub>ar</sub>
          </span>
        </div>
        <input
          name="uar"
          id="uar"
          type="text"
          class="form-control {{!$errors->any() ? '' : ($errors->has('uar') ? 'is-invalid' : 'is-valid' )}}"
          value="{{old('uar')}}">
        <div class="input-group-append">
          <span
            name="units"
            class="input-group-text">(cm)
          </span>
          <span
            id="info-perimetro"
            class="input-group-text">
            <a
              class="badge badge-info"
              tabindex="-1"
              href="#info-perimetro"
              data-toggle="tooltip"
              title="Perímetro da seção em contato com a atmosfera.">?
            </a>
          </span>
        </div>
        @error('uar')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Fim do parâmetro--}}
      {{-- Começo do parâmetro--}}
      <div class="input-group mb-3">
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
          id="t"
          type="text"
          class="form-control {{!$errors->any() ? '' : ($errors->has('t') ? 'is-invalid' :'is-valid' )}}"
          value="{{old('t')}}">
        <div class="input-group-append">
          <span
            name="units"
            class="input-group-text">(dias)
          </span>
          <span
            id="info-tempo"
            class="input-group-text">
            <a
              class="badge badge-info"
              tabindex="-1"
              href="#info-tempo"
              data-toggle="tooltip"
              title=" Mínimo 7 dias - tempo para o cálculo da fluênca.">?
            </a>
          </span>
        </div>
        @error('t')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Fim do parâmetro--}}
      <button
        type="submit"
        class="btn btn-outline-dark btn-calcular btn-block">Calcular
      </button>
    </form>
    @if (session('fluencia'))
      {{-- Começo do resultado --}}
      <div class="input-group mb-0">
        <div class="input-group-prepend">
          <span
            name="description"
            class="input-group-text">Deformação por fluência
          </span>
          <span
            name="symbol"
            class="input-group-text">ε<sub>cc</sub>
          </span>
        </div>
        <input
          name="fluencia"
          id="fluencia"
          type="text"
          class="form-control"
          readonly="true"
          value="{{ session('fluencia') }}">
        <div class="input-group-append">
          <span
            name="units"
            class="input-group-text">(mm/mm)
          </span>
        </div>
        <div id="T-validation"></div>
        @error('T')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- Fim do resultado --}}
        @endif
      </div>
      <div class="row">

      </div>
      @endsection

    @section('javascript')
      <script>

      // Activates the tooltips
      $(document).ready(function () {
          $('[data-toggle="tooltip"]').tooltip();
      });

      </script>

@endsection