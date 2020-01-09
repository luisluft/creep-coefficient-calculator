<html lang="PT-BR">
  <head>
    <link
      rel="stylesheet"
      href="{{ asset('css/app.css')}}">
    <link
      rel="stylesheet"
      href="{{ asset('css/custom.css')}}">
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta
      name="csrf-token"
      content="{{csrf_token()}}">
  </head>

  <body>
    @component('components.navbar', ['current'=> $current])
    @endcomponent
      @hasSection('body')
        @yield('body')
      @endif
    <script
      src="{{asset('js/app.js')}}"
      type="application/javascript"></script>
    @hasSection('javascript')
      @yield('javascript')
    @endif

    <footer>
      @component('components.footer')
      @endcomponent
    </footer>

  </body>
</html>