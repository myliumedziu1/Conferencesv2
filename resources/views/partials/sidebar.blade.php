@if(Auth::user() && Auth::user()->hasRole('admin'))
    <div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; position: fixed; top: 0; left: 0; bottom: 0; overflow: auto; z-index: 1030; display: none;">
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-4">Dashboard</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('actors.index') }}" class="nav-link link-dark">
                    Aktoriai
                </a>
            </li>
            <li>
                <a href="{{ route('repertoire.index') }}" class="nav-link link-dark">
                    Spektakliai
                </a>
            </li>
            <li>
                <a href="{{ route('events.index') }}" class="nav-link link-dark">
                    Repertuaras
                </a>
            </li>
        </ul>
    </div>
@endif
