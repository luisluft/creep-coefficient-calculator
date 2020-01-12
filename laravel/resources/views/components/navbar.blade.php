<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-1">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar">
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
  </div>
</nav>