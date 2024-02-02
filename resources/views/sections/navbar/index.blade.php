<div class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i data-feather="align-justify"></i></a></li>
        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn"><i data-feather="maximize"></i></a></li>
    </ul>
</div>
<ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle">
        <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
            <span class="badge headerBadge1">{{ count($asistenciasNav) }} </span> 
        </a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
            <div class="dropdown-header">
                Asistencias del día en curso
            </div>
            <div class="dropdown-list-content dropdown-list-message">
                @if(count($asistenciasNav) > 0)
                    @foreach($asistenciasNav as $asistencia)
                        <a href="#" class="dropdown-item"> 
                            <span class="dropdown-item-avatar text-white"> 
                                <img alt="image" src="{{ asset('images/user.png') }}" class="rounded-circle">
                            </span> 
                            <span class="dropdown-item-desc"> <span class="message-user">{{ $asistencia->alumno->nombre }}</span>
                                <span class="time">{{ date('h:i:s',strtotime($asistencia->fecha)) }}</span>
                            </span>
                        </a> 
                    @endforeach
                @else
                    <div class="col-md-12">
                        <h5>Sin asistencias el día de hoy.</h5>
                    </div>
                @endif
            </div>
            <div class="dropdown-footer text-center">
                <a href="{{ route('appAsistencias') }}">Ver todas<i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </li>
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 
            <img alt="image" src="{{ asset(session()->get('usuario_imagen')) }}" class="user-img-radious-style"> 
            <span class="d-sm-none d-lg-inline-block"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right pullDown">
            <div class="dropdown-title">Hola, {{ session()->get('usuario_nombre') }}</div>
            <a href="{{ route('appConfiguraciones') }}" class="dropdown-item has-icon"> 
                <i class="fas fa-cog"></i>
                Configuraciones
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"> 
                <i class="fas fa-sign-out-alt"></i>
                Cerrar Sesión
            </a>
        </div>
    </li>
</ul>