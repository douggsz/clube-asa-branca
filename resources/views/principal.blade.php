<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ABCTC</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('img/icons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('img/icons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/icons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/icons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/icons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/icons/apple-icon-120x120.png')}}g">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('img/icons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/icons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/icons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('img/icons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/icons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/icons/favicon-16x16.png')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="{{asset('assets/fonts/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/smoothproducts.css')}}">
</head>

<body>
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark clean-navbar">
    <div class="container"><a class="navbar-brand logo" href="/"><h4>Asa Branca</h4></a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
             id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#sobre">Sobre</a></li>
                <li class="nav-item"><a class="nav-link" href="#atividades">Atividades</a></li>
                <li class="nav-item"><a class="nav-link" href="#quemsomos">Quem somos</a></li>
                <li class="nav-item"><a class="nav-link" href="#contato">Contato</a></li>
            </ul>
        </div>
    </div>
</nav>
<main class="page landing-page ">
    <header class="clean-hero shadow"
            style=" background-image: url('{{asset('/img/jpg/quail-bird-hunting-silhouette-free-vector.jpg')}}');
                background-repeat: no-repeat; background-size: cover">
        <div class="masthead-content" style="padding: 15%">
        </div>
    </header>
    <section class="clean-block clean-info dark container-fluid" id="sobre">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">um pouco sobre nós</h2>
            </div>
            <div class="row container-fluid">
                <div class="col-lg-6">
                    <img class="img-fluid" width="450rem" height="350rem" src="{{asset('img/jpg/foto-sede.jpg')}}"
                         alt="Sede do clube">
                </div>
                <div class="col">
                    <h2>O que é o Asa Branca</h2>
                    <div class="text">
                        <h4>Clube para lazer com eventos de tiro, sendo ele direcionado a duas modalidades: <b>Tiro Trap
                                Americano</b> e <b>Tiro Desportivo de Armas Raiadas Curtas e Longas</b>. O clube dispõem
                            de uma sede própria pedãnas de tiro ao prato e um estande coberto para os sócios praticarem
                            seus treinos.</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="clean-block features" id="atividades">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">atividades realizadas dentro do clube</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <h3>
                        <img src="{{asset('/img/icons/alvo.png')}}" alt="Icone alvo">
                        Tiro Trap Americano
                    </h3>
                    <p>Divide-se em 5 posições onde o atirador efetua 5 disparos em cada posição, perfazendo 25 disparos
                        em 25 pratos lançados.</p>
                </div>
                <div class="col-md-5">
                    <h3>
                        <img src="{{asset('/img/icons/bala.png')}}" alt="Icone alvo">
                        Tiro Desportivo
                    </h3>
                    <p>Esporte que exige muita disciplina e treinamento por parte do atleta, que deve trabalhar
                        principalmente a concentração e o domínio de seus movimentos.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="clean-block slider dark" id="fotos">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">algumas fotos de nossos apoiadores</h2>
                <p></p>
            </div>
            <div class="carousel slide" data-ride="carousel" id="carousel-1">
                <div class="carousel-inner">
                    <div class="carousel-item active"><img class="w-100 d-block"
                                                           src="{{asset('/img/jpg/59635441_2396610343901347_8677215315366510592_o.jpg')}}"
                                                           alt="Visita a Brasilia"></div>
                    <div class="carousel-item"><img class="w-100 d-block"
                                                    src="{{asset('/img/jpg/59477703_2396610163901365_2070311692805341184_o.jpg')}}"
                                                    alt="Visita a Brasilia"></div>
                    <div class="carousel-item"><img class="w-100 d-block"
                                                    src="{{asset('/img/jpg/58926203_2396610147234700_5807821658605486080_o.jpg')}}"
                                                    alt="Visita a Brasilia"></div>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span
                            class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a
                        class="carousel-control-next" href="#carousel-1" role="button"
                        data-slide="next"><span class="carousel-control-next-icon"></span><span
                            class="sr-only">Next</span></a></div>
            </div>
        </div>
    </section>
    <!--
    <section class="clean-block about-us" id="quemsomos">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">quem somos</h2>
                <p>confira os membros principais de nossa diretoria</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="card clean-card text-center">
                        <img class="card-img-top w-100 d-block" src="{{asset('/img/avatars/avatar1.jpeg')}}" alt="Foto Presidente">
                        <div class="card-body info">
                            <h4 class="card-title">MARCIO PEREZ DROZDOWSKI</h4>
                            <p class="card-text">Presidente</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card clean-card text-center">
                        <img class="card-img-top w-100 d-block" src="#" alt="Foto Vice-Presidente" height=413rem>
                        <div class="card-body info">
                            <h4 class="card-title">
                                LUIZ ANTONIO SOARES DA SILVA</h4>
                            <p class="card-text">Vice-Presidente</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card clean-card text-center">
                        <img class="card-img-top w-100 d-block" src="{{asset('/img/jpg/tiago.png')}}" alt="Foto Secretario">
                        <div class="card-body info">
                            <h4 class="card-title">TIAGO DE FREITAS DA SILVA</h4>
                            <p class="card-text">Secretário</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card clean-card text-center">
                        <img class="card-img-top w-100 d-block" src="{{asset('/img/avatars/avatar1.jpeg')}}" alt="Foto Tesoureiro">
                        <div class="card-body info">
                            <h4 class="card-title">RENAN CORREA RUSZKOWSKI</h4>
                            <p class="card-text">Tesoureiro</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
    <section class="clean-block clean-info" id="contato">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">fale conosco</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="card clean-card text-center">
                        <div class="card-body info">
                            <img width="60rem" height="60rem" src="{{asset('/img/icons/email.png')}}" class="img-fluid"
                                 style="padding: .5rem" alt="Icone email">
                            <h4 class="card-title">E-Mail</h4>
                            <p class="card-text">
                                diretoria@clubeasabranca.com.br
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card clean-card text-center">
                        <div class="card-body info">
                            <img width="60rem" height="60rem" src="{{asset('/img/icons/phone.png')}}" class="img-fluid"
                            alt="Icone telefone">
                            <h4 class="card-title">Telefone</h4>
                            <p class="card-text">051999854984</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card clean-card text-center">
                        <div class="card-body info">
                            <img width="60rem" height="60rem" src="{{asset('/img/icons/addr.png')}}" class="img-fluid"
                            alt="Icone mapa">
                            <h4 class="card-title">Endereço</h4>
                            <p class="card-text">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13703.9081428973!2d-51.8523946!3d-30.8313096!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x16d45a581cc8e75!2sAsa%20Branca%20Clube%20de%20Tiro%20e%20Ca%C3%A7a!5e0!3m2!1spt-BR!2sbr!4v1607798790836!5m2!1spt-BR!2sbr"
                                    width="80%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""
                                    aria-hidden="false" tabindex="0">
                                </iframe>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<footer class="page-footer dark">
    <div class="footer-copyright">
        <p>Asa Branca {{date('Y')}}</p>
    </div>
</footer>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="{{asset('assets/js/smoothproducts.min.js')}}"></script>
<script src="{{asset('assets/js/theme.js')}}"></script>
</body>

</html>
