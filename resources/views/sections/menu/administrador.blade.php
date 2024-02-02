<li class="menu-header">Principal</li>
<li class="dropdown ">
    <a href="{{ route('appIndex') }}" class="nav-link"><i data-feather="monitor"></i><span>Inicio</span></a>
</li>

<li class="dropdown @yield('menuCatalogos')">
    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Catalogos</span></a>
    <ul class="dropdown-menu">
        <li class="@yield('menuLiMaterias')"><a class="nav-link @yield('menuMaterias')" href="{{ route('materiasIndex') }}">Materias</a></li>
        <li class="@yield('menuLiGrupos')"><a class="nav-link @yield('menuGrupos')" href="{{ route('gruposIndex') }}">Grupos y Grados</a></li>
        <li class="@yield('menuLiAlumnos')"><a class="nav-link @yield('menuAlumnos')" href="{{ route('alumnosIndex') }}">Alumnos</a></li>
        <li class="@yield('menuLiMaestros')"><a class="nav-link @yield('menuMaestros')" href="{{ route('maestrosIndex') }}">Maestros</a></li>
        <li class="@yield('menuLiUsuarios')"><a class="nav-link @yield('menuUsuarios')" href="{{ route('usuariosIndex') }}">Usuarios</a></li>
    </ul>
</li>
<li class="@yield('menuAsistencias')"><a class="nav-link" href="{{ route('appAsistencias') }}"><i data-feather="file"></i><span>Asistencias</span></a></li>
<li class="@yield('menuConfiguraciones')"><a class="nav-link" href="{{ route('appConfiguraciones') }}"><i data-feather="sliders"></i><span>Configuraciones</span></a></li>
