<nav class="navbar navbar-expand-lg navbar-dark  bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand d-flex justify-content-center align-items-center m-0">
            <div class="navbar-brand logo">
                <img src="{{asset('img/icons/favicon-32x32.png')}}"/>
                <span>ASA BRANCA</span></div>
        </a>
        <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i
                class="fa fa-bars"></i></button>
        <div
            class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site') }}">Site</a>
                </li><li class="nav-item">
                    <a class="nav-link" href="{{ route('inicio') }}">Lista de socios</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('presenca') }}">Presenças</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('investimentos') }}">Investimentos</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('recebidos') }}">Recebidos</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('debitos') }}">Debitos</a></li>
                @auth()
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuario.logout') }}">Sair</a></li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
