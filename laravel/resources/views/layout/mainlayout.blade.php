<html>
  <head>
    <link
      rel="stylesheet"
      href="{{ asset('css/app.css')}}">
    <link
      rel="stylesheet"
      href="{{ asset('css/custom.css')}}">
    <title>@yield('title')</title>
    <meta
      name="csrf-token"
      content="{{csrf_token()}}">
  </head>

  <body>
    @component('components.navbar', ['current'=> $current])
    @endcomponent
    <main role="main">
      @hasSection('body')
        @yield('body')
      @endif
    </main>
    <script
      src="{{asset('js/app.js')}}"
      type="application/javascript"></script>
    @hasSection('results')
      @yield('results')
    @endif
    @hasSection('javascript')
      @yield('javascript')
    @endif
  </body>
  @component('components.footer')
  @endcomponent
</html>