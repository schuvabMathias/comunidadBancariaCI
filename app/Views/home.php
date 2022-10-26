<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/705c9e6d0f.js" crossorigin="anonymous"></script>


    <link rel="shortcut icon" href="<?php echo base_url() ?>/app/Views/img/logo-icon.png">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url() ?>/app/Views/styleSideBar.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/app/Views/homePage.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/app/Views/generalStyle.css">
    <title>Comunidad Bancaria</title>
</head>

<body>
    <div class="container titulo">
        <h2>Comunidad Bancaria</h2>
    </div>
    <div class="container menuInfo d-flex  flex-column flex-md-row">

        <div>
            <nav class="navbar navbar-expand-md navbar-light d-flex flex-md-column">
                <a href="<?php echo base_url() ?>/index.php/homeController">
                    <img class="imagenLogo" src="<?php echo base_url() ?>/app/Views/img/logo.png" alt="" width="150" height="150">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                    <ul class="navbar-nav w-100 d-flex flex-md-column text-center text-md-end">
                        <!-- Ingresar -->
                        <li>
                            <a href="<?php echo base_url() ?>/index.php/usuarioController" class="nav-link" aria-current="page"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                </svg>
                                Ingresar
                            </a>
                            <!-- este de arriba se cambia a Hola, NombreUsuario! -->
                        </li>

                        <li>
                            <a href="<?php echo base_url() ?>/index.php/usuarioController/ups" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                </svg> Registrarse</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <main class="container informacion flex-grow-1">

            <div id="accordion">
                <div class="container tituloTwo">
                    <h3>Características</h3>
                </div>

                <div class="contenido p-3">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                                Interoperabilidad
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                            <div class="card-body">
                                Registrandose en nuestra página web, podrá visualizar todas sus cuentas bancarias en un
                                solo lugar!
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                                Usabilidad
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                La página está diseñada de una manera muy intuitiva con menus flotantes, donde se logra
                                apreciar de manera
                                correcta la información solicitada para que nuestros usuarios no tengan ningún inconveniente
                                al querer consultar por
                                el estado de sus cuentas, entre otras cosas
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                                Diseño amigable
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                De la mano del apartado anterior, el diseño está pensado para que sea amigable y fácil de
                                aprender
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFour">
                                Beneficios
                            </a>
                        </div>
                        <div id="collapseFour" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                Al utilizar nuestra aplicación, se obtienen los siguientes beneficios:
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">- Poder visualizar todas sus cuentas en un solo lugar</li>
                                    <li class="list-group-item">- Alta confidencialidad y protección de sus datos</li>
                                    <li class="list-group-item">- Poner mas beneficios</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>