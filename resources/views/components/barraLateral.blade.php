<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="barraLateral">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3">
                <img src="{{asset('img/icons/favicon-32x32.png')}}"/>
                <span>ASA BRANCA</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('inicio') }}">
                    <i class="fas fa-tachometer-alt"></i><span>Lista de socios</span></a></li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('presenca') }}">
                    <i class="fas fa-tachometer-alt"></i><span>Presenças</span></a></li>
        </ul>
    </div>
</nav>
