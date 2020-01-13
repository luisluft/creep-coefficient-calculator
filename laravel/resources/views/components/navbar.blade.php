<nav class="navbar navbar-expand navbar-dark bg-dark mb-1">
    <ul class="navbar-nav mr-auto">
      <li @if($current=='Cálculo') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/calculo">Cálculo</a>
      </li>
      <li @if($current=='Teoria') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/teoria">Teoria</a>
      </li>
      <li @if($current=='Exemplo') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/exemplo">Exemplo</a>
      </li>
      <li @if($current=='Sobre') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/sobre">Sobre</a>
      </li>
    </ul>
</nav>