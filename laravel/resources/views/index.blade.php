@extends('layout.app', ['current'=>'home'])

@section('title', 'Home')

@section('body')
    <div class="jumbotron bg-light border border-secondary">
        <form>
            <button type="submit"
                    class="btn btn-primary">Calcular
            </button>
        </form>
    </div>
@endsection