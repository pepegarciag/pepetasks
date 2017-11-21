<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Inicio | Pepetasks</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="{{ asset('css/bootstrap-switch.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
        <header id="header">
            <div class="navbar navbar-inverse" role="banner">
                <div class="container">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active"><a href="{{ url('/') }}">Inicio</a></li>
                        <li><a href="{{ url('/home') }}">Panel de gestión</a></li>
                        <li><a href="https://www.twitter.com/pepegarciag_"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </header>
        <!--/#header-->

        <section id="home-slider">
            <div class="container">
                <div class="row">
                    <div class="main-slider">
                        <div class="slide-text">
                            <h1>Pepetasks.es</h1>
                            <p>
                                Gestiona tareas y recordatorios a través de Telegram y nuestra página web.
                            </p>
                            <a href="{{ url('/register') }}" class="btn btn-common">Registrarme</a>
                        </div>
                        <img src="images/home/slider/browser.png" class="slider-house" alt="slider image">
                        <img src="images/home/slider/iphone.png" class="slider-hill" alt="slider image">
                    </div>
                </div>
            </div>
        </section>
        <!--/#home-slider-->

        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <div class="single-service">
                            <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                                <img src="images/home/telegram.png" alt="">
                            </div>
                            <h2>Integrado con telegram</h2>
                            <p>Recibe las notificaciones de tus tareas y recordatorios a través de telegram.</p>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="single-service">
                            <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                                <img src="images/home/web.png" alt="">
                            </div>
                            <h2>Gestiona las tareas</h2>
                            <p>Puedes hacerlo desde la aplicación de telegram a través de comandos o con una interfaz más visual desde la web.</p>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                        <div class="single-service">
                            <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                                <img src="images/home/crossplatform.png" alt="">
                            </div>
                            <h2>Multiplataforma</h2>
                            <p>El cliente de telegram está disponible para iOS, Android, Mac OSX, Windows y Ubuntu. Úsalo donde quieras!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/#services-->

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="copyright-text text-center">
                            <p>
                                Made with <span class="fa fa-code"></span> and <span class="fa fa-heart"></span> by
                                <a target="_blank" class="white" href="https://www.twitter.com/pepegarciag_">@pepegarciag_</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--/#footer-->

        <script src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
