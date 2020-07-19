<header>
    <nav class="navbar navbar-expand-lg navbar-dark static-top">
        <div class="container header">
            <div class="logo_brand col-sm-3">
                <a class="navbar-brand float-left" href="{{ route('index') }}">
                    <img src="{{ asset('images/logocpy.png') }}" alt="" class="logo"/>
                    <h1>We Are More Than Ink and Paper</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <form class="form form-inline my-2 my-lg-0 col-sm-6">
                <i class="fa fa-search icon"></i>
                <input class="input form-control mr-sm-4" type="search" placeholder="Escribe lo que estas buscando..." aria-label="Search">
{{--                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>--}}
            </form>
            <div class="collapse navbar-collapse col-sm-3" id="navbarResponsive">
                <ul class="navbar-nav ml-auto align-items-center">

                    @guest()
                        <li class="nav-item login align-items-center">
                            <img src="{{ asset('images/icons/icon_user.png') }}" alt="">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    @else
                        <li class="nav-item align-items-center dropdown">
                            <img src="{{ asset('images/icons/icon_user.png') }}" alt="">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @if (Auth::user()->hasRole('admin'))
                                    <a href="{{ route('voyager.login') }}" class="dropdown-item">Admin</a>
                                @endif
                            </div>
                        </li>
                    @endguest
                    <li class="nav-item">
                        <a href="{{ route('store.index') }}"><img src="{{ asset('images/icons/icon_cart.png') }}" alt="cart">
                            @if(\Cart::getContent()->count() > 0)
                                <span class="cart-count"><span>{{ \Cart::getContent('default')->count() }}</span></span>
                            @endif
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<section class="send-message container">
    <p class="text-send">ENVIO DE PAQUETES INTERNACIONALES</p>
    <img class="icon-box" src="{{ asset('images/icons/box.png') }}" alt="">
</section>

