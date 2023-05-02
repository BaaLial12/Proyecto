<!DOCTYPE html>
<html lang="en">

{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 5 CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head> --}}

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
    <link rel="icon" type="image/x-icon" href="{{ Storage::url('img/logo/onlylogo.svg') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PayTogether - Ahorra en tus suscripciones digitales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body>
    <!-- Header -->
    <header class="py-3 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>PayTogether</h2>
                </div>
                <div class="col-md-8">
                    <nav class="navbar navbar-expand-md navbar-light justify-content-end">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#como-funciona">¿Cómo funciona?</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#caracteristicas">Caracteristicas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('login')}}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('register')}}">Register</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-5 text-center bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-4">Ahorra en tus suscripciones digitales</h1>
                    <p class="lead">PayTogether te permite compartir tus suscripciones digitales con otras personas y
                        ahorrar dinero.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cómo funciona Section -->
    <section id="como-funciona" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="mb-5">¿Cómo funciona PayTogether?</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="icon-box">
                        <i class="fas fa-user-plus fa-3x mb-3"></i>
                        <h4>Registro de usuarios</h4>
                        <p>Los usuarios se registran en PayTogether para unirse a la comunidad y compartir sus suscripciones digitales.</p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="icon-box">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h4>Creación de grupos</h4>
                        <p>Los usuarios pueden crear grupos basados en intereses comunes o compartir sus suscripciones con amigos y familiares.</p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="icon-box">
                        <i class="fas fa-money-bill-wave fa-3x mb-3"></i>
                        <h4>Ahorro de dinero</h4>
                        <p>Al unirse a un grupo y compartir sus suscripciones, los usuarios pueden ahorrar dinero en sus facturas mensuales.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>




    <!-- Características -->
    <section id="caracteristicas" class="container-fluid py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2>Características de PayTogether</h2>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3 bg-primary">
                            <h4 class="my-0 fw-normal text-white">Ahorra dinero</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Compartir suscripciones te permite ahorrar dinero al no tener que pagar
                                el precio completo de cada una de ellas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3 bg-primary">
                            <h4 class="my-0 fw-normal text-white">Variedad de opciones</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Tenemos una amplia variedad de suscripciones digitales que puedes
                                compartir, desde servicios de streaming hasta aplicaciones de productividad.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3 bg-primary">
                            <h4 class="my-0 fw-normal text-white">Fácil de usar</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Nuestra plataforma es fácil de usar y te permite compartir tus
                                suscripciones de manera rápida y sencilla.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
