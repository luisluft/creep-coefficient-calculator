@extends('layout.mainlayout', ['current'=>'Cálculo'])

@section('title', 'Fluência - Cálculo')

@section('body')
  <div class="container">
    <form
      action="{{route('creep.calculus')}}" method="post" id="formFluencia">
      @csrf

      {{-- Começo do parametro --}}
      <div class="input-group">
        <div class="title border text-center bg-dark text-white pt-1">Temperatura ambiente</div>
        <div class="symbol border text-center pt-1">T</div>
        <div class="value border">
          <input
            name="T" id="T" type="text" class="form-control {{!$errors->any() ? '' : ($errors->has('T') ? 'is-invalid' :'is-valid' )}}" value="{{old('T')}}">
        </div>
        <div class="units border text-center pt-1">(ºC)</div>
        <div
          class="info border text-center">
          <a
            class="badge badge-pill badge-primary mt-2" tabindex="-1" data-toggle="tooltip" title="0ºC a 40ºC">?
          </a>
        </div>
        @error('T')
        <div class="invalid-feedback"><i>{{ $message }}</i></div>
        @enderror
      </div>
      {{-- Fim do parametro --}}

      {{-- Começo do parametro --}}
      <div class="input-group">
        <div class="title border text-center bg-dark text-white pt-1">Umidade ambiente</div>
        <div class="symbol border text-center pt-1">U</div>
        <div class="value border">
          <input
            name="U" id="U" type="text" class="form-control {{!$errors->any() ? '' : ($errors->has('U') ? 'is-invalid' :'is-valid' )}}" value="{{old('U')}}">
        </div>
        <div class="units border text-center pt-1">(%)</div>
        <div
          class="info border text-center">
          <a
            class="badge badge-pill badge-primary mt-2" tabindex="-1" data-toggle="tooltip" title="40% a 90%">?
          </a>
        </div>
        @error('U')
        <div class="invalid-feedback"><i>{{ $message }}</i></div>
        @enderror
      </div>
      {{-- Fim do parametro --}}

      {{-- Começo do parametro --}}
      <div class="input-group">
        <div class="title border text-center bg-dark text-white pt-1">Tensão de carregamento</div>
        <div class="symbol border text-center pt-1">σc</div>
        <div class="value border">
          <input
            name="sigmaC" id="sigmaC" type="text" class="form-control {{!$errors->any() ? '' : ($errors->has('sigmaC') ? 'is-invalid' :'is-valid' )}}" value="{{old('sigmaC')}}">
        </div>
        <div class="units border text-center pt-1">(MPa)</div>
        <div
          class="info border text-center">
          <a
            class="badge badge-pill badge-primary mt-2" tabindex="-1" data-toggle="tooltip" title="Tensão constante aplicada a peça durante o período apurado">?
          </a>
        </div>
        @error('sigmaC')
        <div class="invalid-feedback"><i>{{ $message }}</i></div>
        @enderror
      </div>
      {{-- Fim do parametro --}}

      {{-- Começo do parametro --}}
      <div class="input-group">
        <div class="title border text-center bg-dark text-white pt-1">Idade inicial de carregamento</div>
        <div class="symbol border text-center pt-1">t<sub>0</sub></div>
        <div class="value border">
          <input
            name="t0" id="t0" type="text" class="form-control {{!$errors->any() ? '' : ($errors->has('t0') ? 'is-invalid' :'is-valid' )}}" value="{{old('t0')}}">
        </div>
        <div class="units border text-center pt-1">(dias)</div>
        <div
          class="info border text-center">
          <a
            class="badge badge-pill badge-primary mt-2" tabindex="-1" data-toggle="tooltip" title="Momento em que começa o carregamento (normalmente retirada de escoramento)">?
          </a>
        </div>
        @error('t0')
        <div class="invalid-feedback"><i>{{ $message }}</i></div>
        @enderror
      </div>
      {{-- Fim do parametro --}}

      {{-- Começo do parametro --}}
      <div class="input-group">
        <div class="title border text-center bg-dark text-white pt-1">Módulo de elasticidade inicial</div>
        <div class="symbol border text-center pt-1">E<sub>ci</sub></div>
        <div class="value border">
          <input
            name="eci" id="eci" type="text" class="form-control {{!$errors->any() ? '' : ($errors->has('eci') ? 'is-invalid' :'is-valid' )}}" value="{{old('eci')}}">
        </div>
        <div class="units border text-center pt-1">(MPa)</div>
        <div
          class="info border text-center">
          <a
            class="badge badge-pill badge-primary mt-2" tabindex="-1" data-toggle="tooltip" title="Substitui tipo de agregado e resistência a tração nos cálculos">?
          </a>
        </div>
        @error('eci')
        <div class="invalid-feedback"><i>{{ $message }}</i></div>
        @enderror
      </div>
      {{-- Fim do parametro --}}

      {{-- Começo do parametro --}}
      <div class="input-group">
        <div class="title border text-center bg-dark text-white pt-1">Tipo de cimento</div>
        <select
          name="CP" id="CP" class="custom-select {{!$errors->any() ? '' : ($errors->has('CP')?'is-invalid':'is-valid' )}}"> value="{{old('CP')}}">
          <option disabled>Escolha...</option>
          <option value="1">CP I</option>
          <option value="2">CP II</option>
          <option value="3">CP III</option>
          <option value="4">CP IV</option>
        </select>
        <div
          class="info border text-center">
          <a
            class="badge badge-pill badge-primary mt-2" tabindex="-1" data-toggle="tooltip" title="Qualidade do cimento Portland">?
          </a>
        </div>
        @error('CP')
        <div class="invalid-feedback"><i>{{ $message }}</i></div>
        @enderror
      </div>
      {{-- Fim do parametro --}}

      {{-- Começo do parametro --}}
      <div class="input-group">
        <div class="title border text-center bg-dark text-white pt-1">Tipo de agregado</div>
        <select
          name="ag" id="ag" class="custom-select {{!$errors->any() ? '' : ($errors->has('ag') ?'is-invalid':'is-valid' )}}"> value="{{old('ag')}}">
          <option
            value="escolha" disabled>Escolha...
          </option>
          <option value="basalto">basalto</option>
          <option value="diabasio">diabásio</option>
          <option value="granito">granito</option>
          <option value="gnaisse">gnaisse</option>
          <option value="calcario">calcário</option>
          <option value="arenito">arenito</option>
        </select>
        <div
          class="info border text-center">
          <a
            class="badge badge-pill badge-primary mt-2" tabindex="-1" data-toggle="tooltip" title="Utilizado para calcular módulo de elasticidade inicial">?
          </a>
        </div>
        @error('ag')
        <div class="invalid-feedback"><i>{{ $message }}</i></div>
        @enderror
      </div>
      {{-- Fim do parametro --}}

      {{-- Começo do parametro --}}
      <div class="input-group">
        <div class="title border text-center bg-dark text-white pt-1">Resistência a tração</div>
        <div class="symbol border text-center pt-1">f<sub>ct</sub></div>
        <div class="value border">
          <input
            name="fct" id="fct" type="text" class="form-control {{!$errors->any() ? '' : ($errors->has('fct') ? 'is-invalid' :'is-valid' )}}" value="{{old('fct')}}">
        </div>
        <div class="units border text-center pt-1">(MPa)</div>
        <div
          class="info border text-center">
          <a
            class="badge badge-pill badge-primary mt-2" tabindex="-1" data-toggle="tooltip" title="Utilizado para calcular módulo de elasticidade inicial.">?
          </a>
        </div>
        @error('fct')
        <div class="invalid-feedback"><i>{{ $message }}</i></div>
        @enderror
      </div>
      {{-- Fim do parametro --}}

      {{-- Começo do parametro --}}
      <div class="input-group">
        <div class="title border text-center bg-dark text-white pt-1">Resistência do concreto</div>
        <div class="symbol border text-center pt-1">f<sub>ck</sub></div>
        <div class="value border">
          <input
            name="fck" id="fck" type="text" class="form-control {{!$errors->any() ? '' : ($errors->has('fck') ? 'is-invalid' :'is-valid' )}}" value="{{old('fck')}}">
        </div>
        <div class="units border text-center pt-1">(MPa)</div>
        <div
          class="info border text-center">
          <a
            class="badge badge-pill badge-primary mt-2" tabindex="-1" data-toggle="tooltip" title="20MPa a 90MPa">?
          </a>
        </div>
        @error('fck')
        <div class="invalid-feedback"><i>{{ $message }}</i></div>
        @enderror
      </div>
      {{-- Fim do parametro --}}

      {{-- Começo do parametro --}}
      <div class="input-group">
        <div class="title border text-center bg-dark text-white pt-1">Abatimento do concreto</div>
        <div class="symbol border text-center pt-1">a<sub>b</sub></div>
        <div class="value border">
          <input
            name="ab" id="ab" type="text" class="form-control {{!$errors->any() ? '' : ($errors->has('ab') ? 'is-invalid' :'is-valid' )}}" value="{{old('ab')}}">
        </div>
        <div class="units border text-center pt-1">(cm)</div>
        <div
          class="info border text-center">
          <a
            class="badge badge-pill badge-primary mt-2" tabindex="-1" data-toggle="tooltip" title="Resistência característica do concreto obtida por ensaios da norma NBR NM 67.">?
          </a>
        </div>
        @error('ab')
        <div class="invalid-feedback"><i>{{ $message }}</i></div>
        @enderror
      </div>
      {{-- Fim do parametro --}}

      {{-- Começo do parametro --}}
      <div class="input-group">
        <div class="title border text-center bg-dark text-white pt-1">Seção transversal da peça</div>
        <div class="symbol border text-center pt-1">A<sub>c</sub></div>
        <div class="value border">
          <input
            name="Ac" id="Ac" type="text" class="form-control {{!$errors->any() ? '' : ($errors->has('Ac') ? 'is-invalid' :'is-valid' )}}" value="{{old('Ac')}}">
        </div>
        <div class="units border text-center pt-1">(cm)</div>
        <div
          class="info border text-center">
          <a
            class="badge badge-pill badge-primary mt-2" tabindex="-1" data-toggle="tooltip" title="Área da seção transversal da peça.">?
          </a>
        </div>
        @error('Ac')
        <div class="invalid-feedback"><i>{{ $message }}</i></div>
        @enderror
      </div>
      {{-- Fim do parametro --}}

      {{-- Começo do parametro --}}
      <div class="input-group">
        <div class="title border text-center bg-dark text-white pt-1">Perímetro em contato com o ar</div>
        <div class="symbol border text-center pt-1">u<sub>ar</sub></div>
        <div class="value border">
          <input
            name="uar" id="uar" type="text" class="form-control {{!$errors->any() ? '' : ($errors->has('uar') ? 'is-invalid' :'is-valid' )}}" value="{{old('uar')}}">
        </div>
        <div class="units border text-center pt-1">(cm)</div>
        <div
          class="info border text-center">
          <a
            class="badge badge-pill badge-primary mt-2" tabindex="-1" data-toggle="tooltip" title="Perímetro da seção em contato com a atmosfera.">?
          </a>
        </div>
        @error('uar')
        <div class="invalid-feedback"><i>{{ $message }}</i></div>
        @enderror
      </div>
      {{-- Fim do parametro --}}

      {{-- Começo do parametro --}}
      <div class="input-group">
        <div class="title border text-center bg-dark text-white pt-1">Idade para cálculo da fluência</div>
        <div class="symbol border text-center pt-1">t</div>
        <div class="value border">
          <input
            name="t" id="t" type="text" class="form-control {{!$errors->any() ? '' : ($errors->has('t') ? 'is-invalid' :'is-valid' )}}" value="{{old('t')}}">
        </div>
        <div class="units border text-center pt-1">(dias)</div>
        <div
          class="info border text-center">
          <a
            class="badge badge-pill badge-primary mt-2" tabindex="-1" data-toggle="tooltip" title="Mínimo 7 dias - tempo para o cálculo da fluênca.">?
          </a>
        </div>
        @error('t')
        <div class="invalid-feedback"><i>{{ $message }}</i></div>
        @enderror
      </div>
      {{-- Fim do parametro --}}

      <div class="input-group mb-0">
        <button
          type="submit" class="btn btn-calcular btn-block">Calcular
        </button>
      </div>
    </form>
    {{-- Começo do resultado --}}
    @if (session('fluencia'))
      <div class="input-group mb-0">
        <div class="input-group-prepend">
          <span
            name="description" class="input-group-text">Deformação por fluência
          </span>
          <span
            name="symbol" class="input-group-text">ε<sub>cc</sub>
          </span>
        </div>
        <input
          name="fluencia" id="fluencia" type="text" class="form-control" readonly="true" value="{{ session('fluencia') }}">
        <div class="input-group-append">
          <span
            name="units" class="input-group-text">(mm/mm)
          </span>
        </div>
      </div>
    @endif
    {{-- Fim do resultado --}}
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
