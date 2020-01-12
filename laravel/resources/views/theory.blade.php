@extends('layout.mainlayout', ['current'=>'Teoria'])

@section('title', 'Fluência - Teoria')

@section('body')

  <object
    data="https://drive.google.com/file/d/1H2xAInVduE92Zjk_9_Lc1zHQaGtC1fbg/preview"
    type="application/pdf">
    <embed
      src="storage/teoria.pdf"/>
    <p>
      Este navegador não suporta PDFs.
      Por favor baixe o PDF pra vizualizá-lo com este link:
        <a href="https://drive.google.com/file/d/1H2xAInVduE92Zjk_9_Lc1zHQaGtC1fbg/preview">Clique aqui para ver o PDF</a>.
      </p>
    </embed>
  </object>

@endsection
