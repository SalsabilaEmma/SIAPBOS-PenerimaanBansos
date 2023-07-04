<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}"> <img alt="image" src="{{ url('otika') }}/assets/img/logo.png"
                    class="header-logo" /> <span class="logo-name">SIAPBOS</span>
            </a>
        </div>
        @auth
            @if (Auth::user()->role === 'admin')
                <ul class="sidebar-menu">
                    <li class="menu-header">Main</li>
                    <li class="dropdown active">
                        <a href="{{ route('dashboard') }}" class="nav-link"><i
                                data-feather="monitor"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="command"></i><span>Master</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{ route('penerima') }}">Penerima</a></li>
                            <li><a class="nav-link" href="{{ route('bantuan') }}">Bantuan</a></li>
                            {{-- <li><a class="nav-link" href="blog.html">Blog</a></li> <li><a class="nav-link" href="calendar.html">Calendar</a></li> --}}
                        </ul>
                    </li>
                </ul>
            @endif
        @endauth
    </aside>
</div>
