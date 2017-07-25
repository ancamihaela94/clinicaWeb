<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--<a class="navbar-brand" href="/home">Dashboard</a>--}}
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <a class="navbar-brand" href="/home">Dashboard</a>
            <ul class="nav navbar-nav" style = "margin-top:5px">
                <li><a href="/cities">Locatii</a></li>
                <li><a href="/clinics">Clinici</a></li>
                <li><a href="/sections">Sectii</a></li>
                <li><a href="/medics">Medici</a></li>
                <li><a href="/users">Utilizatori</a></li>
                <li><a href="/appointments">Programari</a></li>
                {{--<li><a href="/records">Fise Medicale</a></li>--}}
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    {{--<li><a href="{{ route('register') }}">Inregistrare</a></li>--}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>

                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>