<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>@yield('title','404')</title>
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel='shortcut icon' type='image/x-icon' href='{{ asset('img/favicon.ico') }}' />
        <link rel="stylesheet" href="{{ asset('css/sweetalert.min.css') }}"> 
        <script src="{{ asset('js/sweetalert.min.js') }}"></script> 
        @yield('css')
    </head>

    <body>
    @include('sweet::alert')
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky">
            @include('sections.navbar.index')
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{ route('appIndex') }}"> <img alt="image" src="{{ asset('img/logo.png') }}" class="header-logo" /> <span
                        class="logo-name">Lisca</span>
                    </a>
                </div>
                <ul class="sidebar-menu">
                    @if(session()->get('usuario_tipo') == "A")
                        @include('sections.menu.administrador')
                    @elseif(session()->get('usuario_tipo') == "M")
                        @include('sections.menu.maestro')
                    @elseif(session()->get('usuario_tipo') == "P")
                        @include('sections.menu.padre')
                    @endif
                </ul>
            </aside>
        </div>
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                @yield('content')
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
            <a href="#">Lisca</a></a>
            </div>
            <div class="footer-right">
            </div>
        </footer>
        </div>
        @yield('modals')
    </div>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('bundles/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @yield('script')
    </body>
</html>