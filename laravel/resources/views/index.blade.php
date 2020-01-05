@extends('layout.app', ['current'=>'home'])

@section('title', 'Home')

@section('body')
    <div class="jumbotron bg-light border border-secondary">
        <form>
            <a href="/calcular">Calcular</a>
        </form>
    </div>
@endsection