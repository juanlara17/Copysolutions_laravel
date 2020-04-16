<header>
    <div class="container">
        <!-- hidden top area toggle link -->
        <div id="header-hidden-link">
            <a href="#" class="toggle-link" title="Click me you'll get a surprise" data-target=".hidden-top"><i></i>Open</a>
        </div>
        {{-- MODALS --}}
        <div class="row nomargin">
            @if(Auth::check())
                <div class="headnav">
                    <ul class="dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" v-pre>
                            <strong> {{ Auth::user()->name }} <i class="icon-angle-down"></i> </strong>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="./admin">Admin</a></li>
                            <li>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                            <form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none">
                                @csrf
                            </form>
                        </ul>
                    </ul>
                </div>

            @else
                <div class="span12">
                    <div class="headnav">
                        <ul>
                            <li><a href="#mySignup" data-toggle="modal"><i class="icon-user"></i> Sign up</a></li>
                            <li><a href="#mySignin" data-toggle="modal">Sign in</a></li>
                        </ul>
                    </div>
                    <!-- Signup Modal -->
                    <div id="mySignup" class="modal styled hide fade" tabindex="-1" role="dialog"
                         aria-labelledby="mySignupModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 id="mySignupModalLabel">Create an <strong>account</strong></h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="{{ route('create.user') }}" method="POST">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label" for="name">Name</label>
                                    <div class="controls">
                                        <input type="text" id="name" placeholder="Name">
                                    </div>
                                </div><div class="control-group">
                                    <label class="control-label" for="email">Email</label>
                                    <div class="controls">
                                        <input type="email" id="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="password">Password</label>
                                    <div class="controls">
                                        <input type="password" id="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputSignupPassword2">Confirm Password</label>
                                    <div class="controls">
                                        <input type="password" id="inputSignupPassword2" placeholder="Password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn">Sign up</button>
                                    </div>
                                    <p class="aligncenter margintop20">
                                        Already have an account? <a href="#mySignin" data-dismiss="modal"
                                                                    aria-hidden="true" data-toggle="modal">Sign in</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end signup modal -->
                    <!-- Sign in Modal -->
                    <div id="mySignin" class="modal styled hide fade" tabindex="-1" role="dialog"
                         aria-labelledby="mySigninModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 id="mySigninModalLabel">Login to your <strong>account</strong></h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label" for="inputText">Email</label>
                                    <div class="controls">
                                        <input type="email" id="email" placeholder="Email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputSigninPassword">Password</label>
                                    <div class="controls">
                                        <input type="password" id="inputSigninPassword" placeholder="Password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn">Sign in</button>
                                    </div>
                                    <p class="aligncenter margintop20">
                                        Forgot password? <a href="#myReset" data-dismiss="modal" aria-hidden="true"
                                                            data-toggle="modal">Reset</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end signin modal -->
                    <!-- Reset Modal -->
                    <div id="myReset" class="modal styled hide fade" tabindex="-1" role="dialog"
                         aria-labelledby="myResetModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 id="myResetModalLabel">Reset your <strong>password</strong></h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label" for="inputResetEmail">Email</label>
                                    <div class="controls">
                                        <input type="text" id="inputResetEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn">Reset password</button>
                                    </div>
                                    <p class="aligncenter margintop20">
                                        We will send instructions on how to reset your password to your inbox
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end reset modal -->
                </div>
            @endif
        </div>
        {{-- NAVBAR --}}
        <div class="row">
            <div class="span4">
                <div class="logo">
                    <a href="{{ route('index') }}"><img src="images/logo_copy.png" alt="" class="logo"/></a>
                    <h1>We Are More Than Ink and Paper</h1>
                </div>
            </div>
            <div class="span8">
                <div class="navbar navbar-static-top">
                    <div class="navigation">
                        <nav>
                            <ul class="nav topnav">
                                <li class="dropdown active">
                                    <a href="{{ route('index') }}">Home </a>
                                </li>
                                <li>
                                    <a href="#">About Us</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#portfolio">Porfolio <i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('portfolio') }}">Products</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Services <i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">Blog right sidebar</a></li>
                                        <li><a href="post-left-sidebar.html">Post left sidebar</a></li>
                                        <li><a href="post-right-sidebar.html">Post right sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">Contact </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- end navigation -->
                </div>
            </div>
        </div>
    </div>
</header>
