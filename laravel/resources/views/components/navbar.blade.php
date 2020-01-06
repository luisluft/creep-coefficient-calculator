<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto">
      <li @if($current=='home') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/">Formulário </a>
      </li>
      <li @if($current=='produtos') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/produtos">Resultados</a>
      </li>
    </ul>
  </div>
</nav>