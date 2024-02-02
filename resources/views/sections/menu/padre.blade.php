<li class="menu-header">Principal</li>
<li class="dropdown ">
    <a href="{{ route('appIndex') }}" class="nav-link"><i data-feather="monitor"></i><span>Inicio</span></a>
</li>

<li class="@yield('menuAsistencias')"><a class="nav-link" href="{{ route('misAsistenciasIndex') }}"><i data-feather="file"></i><span>Asistencias</span></a></li>