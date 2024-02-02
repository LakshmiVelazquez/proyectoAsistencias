<li class="menu-header">Principal</li>
<li class="dropdown ">
    <a href="{{ route('appIndex') }}" class="nav-link"><i data-feather="monitor"></i><span>Inicio</span></a>
</li>

<li class="@yield('menuGrupo')"><a class="nav-link" href="{{ route('misGruposIndex') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
        <line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line>
        <line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line>
        <line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line>
    </svg>
    <span>Mis Grupos</span></a>
</li>
<li class="@yield('menuAsistencias')"><a class="nav-link" href="{{ route('misAsistenciasIndex') }}"><i data-feather="file"></i><span>Asistencias</span></a></li>
<li class="@yield('menuConfiguraciones')"><a class="nav-link" href="{{ route('appConfiguraciones') }}"><i data-feather="sliders"></i><span>Configuraciones</span></a></li>
