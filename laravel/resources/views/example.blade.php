@extends('layout.mainlayout', ['current'=>'Exemplo'])

@section('title', 'Fluência - Exemplo')

@section('body')
  <div class="container">

    <object
      data="https://github.com/luisluft/fluencia.nbrsimplificada/tree/master/laravel/storage/app/public/exemplo.pdf">
      <embed
        src="storage/exemplo.pdf"/>
      <p>This browser does not support PDFs.
        Please download the PDF to view it:
        <a href="https://github.com/luisluft/fluencia.nbrsimplificada/tree/master/laravel/storage/app/public/exemplo.pdf">View the PDF</a>.
      </p>
      </embed>
    </object>
  </div>
@endsection
