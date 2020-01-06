@extends('layout.mainlayout', ['current'=>'home'])

@section('title', 'Home')

@section('body')
    <div class="jumbotron bg-light border border-secondary">
    <h1>{{ $fluencia }}</h1>
    </div>
@endsection