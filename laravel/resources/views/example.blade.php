@extends('layout.mainlayout', ['current'=>'Exemplo'])

@section('title', 'Fluência - Exemplo')

@section('body')
  <div class="container">

    <object
      data="https://drive.google.com/file/d/1hfJL6fE-bTWhxYoe8cFFe7VGtnvnajHH/preview"
      type="application/pdf">
      <embed
        src="storage/exemplo.pdf"/>
      <p>
          Este navegador não suporta PDFs.
          Por favor baixe o PDF pra vizualizá-lo com este link:
        <a href="https://drive.google.com/file/d/1hfJL6fE-bTWhxYoe8cFFe7VGtnvnajHH/preview">View the PDF</a>.
      </p>
      </embed>
    </object>
  </div>
@endsection
