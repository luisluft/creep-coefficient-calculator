<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
  <button class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbar"
          aria-controls="navbar"
          aria-expanded="false"
          aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse"
       id="navbar">
    <ul class="navbar-nav mr-auto">
      <li @if($current=='home') class="nav-item active"
          @else class="nav-item" @endif>
        <a class="nav-link"
           href="/">Home </a>
      </li>
      <li @if($current=='produtos') class="nav-item active"
          @else class="nav-item" @endif>
        <a class="nav-link"
           href="/produtos">Produtos (PHP)</a>
      </li>
      <li @if($current=='produtosajax') class="nav-item active"
          @else class="nav-item" @endif>
        <a class="nav-link"
           href="/produtosajax">Produtos (AJAX)</a>
      </li>
      <li @if($current=='categorias') class="nav-item active"
          @else class="nav-item" @endif>
        <a class="nav-link"
           href="/categorias">Categorias</a>
      </li>
      <li @if($current=='clientes') class="nav-item active"
          @else class="nav-item" @endif>
        <a class="nav-link"
           href="/clientes">Clientes</a>
      </li>
    </ul>
  </div>
</nav>