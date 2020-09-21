<div class="top-navbar">
    <div class="row">
        <div class="left col-lg-7 col-md-7 col-sm-7">
            <a class="header-link" href="{{ route('home') }}">
                <img src="{{ url('/images/logo.png') }}" />
                <div class="logo-title">
                    <span class="top">Sistem Informasi Ruang Terbuka Hijau</span>
                    <br />
                    <span class="bottom">Kota Jambi</span>
                </div>    
            </a>
        </div>
        <div class="right col-lg-5 col-md-5 col-sm-5">
            <div class="blh-logo pull-right">
                <a href="http://blh.jambikota.go.id">
                    <img src="{{ url('/images/blh.png') }}">
                    <div class="blh-title">
                        <span>
                            Dinas Lingkungan Hidup
                            <br />
                            Kota Jambi
                        </span>
                    </div>
                </a>
            </div>
            <div class="clear"></div>
            <div class="links pull-right">
                
                @if (Auth::guest())
                
                <div><a href="{{ route('login') }}">Login</a></div>
                <div class="v1"></div>
                <div><a href="{{ route('register') }}">Daftar</a></div>
                @else
                <div>
                    <a href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            @endif

            
        </div>
        <div class="clear"></div>
        <div class="search-bar pull-right">
            <form method="get" action="{{ route('taman.search') }}">
                @csrf
                <input type="search" name="q" placeholder="Jelajahi taman...">
                <button type="submit" class="navbar-search-button"><i class="glyphicon glyphicon-search"></i></button>
            </form>
        </div>
        </div>
    </div>
</div>
<div class="clear"></div>