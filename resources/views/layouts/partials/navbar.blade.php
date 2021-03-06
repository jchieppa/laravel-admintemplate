

<nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav ml-auto navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item ">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0 text-left" data-toggle="dropdown">
                            <span class="avatar" style="background-image: url({{ asset('assets/avatars') . '/' . Auth::user()->avatar }})"></span>
                            <div class="d-none d-lg-block pl-2">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="mt-1 small text-muted">{{ ucfirst(Auth::user()->roles()->pluck('name')->first() ) }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item " href="{{ route('admin.profile.edit', Auth::user())}}"><i class="fas fa-users-cog"></i>&nbsp; Profile</a>
                            @if (!App::environment('production'))
                                    <a class="dropdown-item" href="#"><i class="fa fa-asterisk"></i>&nbsp;&nbsp;{{ App::environment() }} environment</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-asterisk"></i>&nbsp; Laravel Framework: {{ app()->version() }} </a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-asterisk"></i>&nbsp;&nbsp;Php Version: {{ PHP_VERSION }} </a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-asterisk"></i>&nbsp;&nbsp;Current Commit: {{ `git rev-parse --short HEAD` }} </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
