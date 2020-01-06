@extends('layout.mainlayout', ['current'=>'home'])

@section('title', 'Home')

@section('body')
  <form action="/resultado" method="post">
    @csrf
    <div class="container">
      <div name="content">
        {{-- Começo do 1º parâmetro--}}
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span name="description" class="input-group-text">Espessura fictícia da Peça</span>
            <span name="symbol" class="input-group-text">hfic</span>
          </div>
          <input type="text" class="form-control value" name="espessura_ficticia">
          <div class="input-group-append">
            <span name="units" class="input-group-text">(m)</span>
            <span name="info" class="input-group-text"><a href="#" class="badge badge-info">?</a></span>
          </div>
        </div>
        {{-- Fim do 1º parâmetro--}}
      </div>
      <button type="submit" class="btn btn-primary">Calcular</button>
    </div>
  </form>
@endsection