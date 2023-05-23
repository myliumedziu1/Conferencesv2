<header class="kt-header">
    <div class="menu-toggle" id="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <nav id="kt-nav">
        <ul>
            <li><a href="{{ route('repertuaras.index') }}">Spektakliai</a></li>
            <li><a href="#naujienos">Naujienos</a></li>
            <li><a href="https://www.kulturospasas.lt/kulturines-edukacijos?pavadinimas=&organizatorius=vizualios%20mintys">Kultūros pasas</a></li>
            <li><a href="{{ route('trupe.index') }}">Trupė</a></li>
            <li><a href="/renginiai">Repertuaras</a></li>
            <li><a href="#kontaktai">Kontaktai</a></li>
            @if(auth()->check())
                <li><a>Logged in as {{ auth()->user()->hasRole('admin') ? 'Admin' : 'User' }}</a></li>
            @endif
        </ul>
    </nav>
</header>
