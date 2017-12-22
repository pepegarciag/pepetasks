<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Pepetasks">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Stylesheet -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/wickedpicker.min.css') }}" rel="stylesheet">
</head>
<body class="c-login-wrapper">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<div class="c-login">
            <header class="c-login__head">
                <a class="c-login__brand" href="#!">
                    <img src="img/logo-login.svg" alt="Dashboard's Logo">
                </a>
                <h1 class="c-login__title">Inicia sesión</h1>
            </header>

            <form class="c-login__content" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="input1">Email</label>
                    <input class="c-input" type="email" id="email" name="email" placeholder="john@pepetasks.es">
                </div>

                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="input2">Password</label>
                    <input class="c-input" type="password" id="password" name="password" placeholder="...">
                </div>

                <div class="c-choice c-choice--checkbox">
                    <input class="c-choice__input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox">
                    <label class="c-choice__label" for="remember">Recuerdame</label>
                </div>

                <button class="c-btn c-btn--info c-btn--fullwidth" type="submit">Iniciar sesión en Pepetasks</button>
            </form>

            <footer class="c-login__footer">
                <a class="c-login__footer-link u-left" href="{{ route('register') }}">No tienes una cuenta todavía? Registrate!</a>
                <a class="c-login__footer-link u-right" href="{{ route('password.request') }}">Contraseña olvidada?</a>
            </footer>
        </div>

<script src="{{ asset('js/main.min.js') }}"></script>
</body>
</html>