@extends('layout.mainlayout', ['current'=>'Sobre'])

@section('title', 'Fluência - Sobre')

@section('body')
  <div class="container">
    <u><h4>Sobre o site</h4></u>
    <p>O site calcula a deformação por fluência do concreto ε<sub>cc</sub> segundo a norma brasileira NBR 6118:2014.
      Nos momentos onde é possível utilizar fórmulas no lugar de tabelas isto é feito e nenhuma aproximação foi realizada pelo autor.
      O roteiro de cálculo e todas as explicações pertinentes sobre os parâmetros estão disponíveis na página 'Teoria' na seção 'Roteiro
      de cálculo'. Há um exemplo de cálculo realizado com o programa Mathcad Prime 3.0 na página 'Exemplo'.
      O código do site está disponibilizado no <a
        class="btn btn-danger"
        href="https://github.com/luisluft/fluencia.nbrsimplificada">GitHub</a>.
    </p>
    <u><h4>Nota importante</h4></u>
    <p>O autor não é responsável pelo uso ou mau uso do programa e de seus resultados nem têm nenhum dever
      legal ou responsabilidade para com qualquer pessoa ou companhia pelos danos causados direta ou indiretamente
      resultantes do uso de alguma informação ou do uso do programa aqui disponibilizado. O usuário é responsável
      por toda ou qualquer conclusão feita com o uso do programa. Não existe nenhum compromisso de bom funcionamento
      ou qualquer garantia.
    </p>
  </div>
  <div class="container-fluid bg text-center">
    <h6>Sobre o autor</h6>
    <!-- Stylized button links-->
    <a
      href="https://www.facebook.com/luis.luft"
      class="btn btn-light">facebook
    </a>
    <a
      href="https://www.instagram.com/luisluft"
      class="btn btn-light">instagram
    </a>
    <a
      href="https://github.com/luisluft"
      class="btn btn-light">github
    </a>
    <br>
  </div>
@endsection
