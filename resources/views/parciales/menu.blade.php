<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('inicio') }}"><img src="{{ asset('images/logo.png') }}"></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-home"></i></a></li>

        
        
        <!-- Authentication Links -->
          @guest
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Register</a></li>
          @else
              @if(Auth::user()->idperfil==1)
                <li class="active"><a href="{{route('productos.index')}}">Productos</a></li>
                <li><a href="{{route('servicios.index')}}">Servicios</a></li>
                <li><a href="#">Nosotros</a></li>
                <li><a href="{{ route('perfiles.index') }}">Perfiles</a></li>
                <li><a href="{{ route('cupones.index') }}">Cupones</a></li>
              @endif

              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu">
                      <li>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Cerrar Sesion
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
              </li>
          @endguest
          <li><a href="#">Contacto</a></li>
          <li><a href="{{ route('carrito') }}"><i class="fa fa-shopping-cart"></i></a></li>
      </ul>
    </div>
  </div>
</nav>