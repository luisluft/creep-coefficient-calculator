<nav class="navbar navbar-expand navbar-dark bg-dark mb-1">
    <ul class="navbar-nav mr-auto">
      <li @if($current=='Cálculo') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="{{route('creep.calculus')}}">Cálculo</a>
      </li>
      <li @if($current=='Teoria') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="{{route('creep.theory')}}">Teoria</a>
      </li>
      <li @if($current=='Exemplo') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="{{route('creep.example')}}">Exemplo</a>
      </li>
      <li @if($current=='Sobre') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="{{route('creep.about')}}">Sobre</a>
      </li>
    </ul>
</nav>
