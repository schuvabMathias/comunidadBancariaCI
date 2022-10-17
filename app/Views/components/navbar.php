<body>
    <!-- el navbar -->
    <div class="container" style="margin-bottom: 5.5rem;">
        <!-- navbar -->
        <nav class="navbar navbar-expand-md justify-content-center bg-dark navbar-dark fixed-top">
            <!-- Brand -->
            <div class="narbar-brand" style="margin-left: 2%;">
                <a class="navbar-brand" href="http://localhost/comunidadBancariaCI/index.php/homeController" style="font-family: 'Indie Flower', cursive; font-size: 2em;">TATW</a>
            </div>


            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse mt-2 mb-2" id="collapsibleNavbar" style="margin-left: 5%;font-size: 1.4rem;">
                <ul class="navbar-nav liNavbar">
                    <li class="nav-item liNavbar">
                        <a class="nav-link" href="http://localhost/comunidadBancariaCI/index.php/homeController">Home</a>
                    </li>
                    <li class="nav-item liNavbar">
                        <a class="nav-link" href="http://localhost/comunidadBancariaCI/index.php/clienteController/mostrar">Mostrar</a>
                    </li>
                    <li class="nav-item liNavbar">
                        <a class="nav-link" href="http://localhost/comunidadBancariaCI/index.php/clienteController/create">IngresarCliente</a>
                    </li>
                    <li class="nav-item liNavbar">
                        <a class="nav-link" href="http://localhost/comunidadBancariaCI/index.php/bancoController/mostrar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank" viewBox="0 0 16 16">
                                <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z" />
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item liNavbar">
                        <a class="nav-link" href="http://localhost/comunidadBancariaCI/index.php/bancoController/create">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-piggy-bank" viewBox="0 0 16 16">
                                <path d="M5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm1.138-1.496A6.613 6.613 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 0 0 .286-.958A7.602 7.602 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962z" />
                                <path fill-rule="evenodd" d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069c0-.145-.007-.29-.02-.431.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a.95.95 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.735.735 0 0 0-.375.562c-.024.243.082.48.32.654a2.112 2.112 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595zM2.516 6.26c.455-2.066 2.667-3.733 5.448-3.733 3.146 0 5.536 2.114 5.536 4.542 0 1.254-.624 2.41-1.67 3.248a.5.5 0 0 0-.165.535l.66 2.175h-.985l-.59-1.487a.5.5 0 0 0-.629-.288c-.661.23-1.39.359-2.157.359a6.558 6.558 0 0 1-2.157-.359.5.5 0 0 0-.635.304l-.525 1.471h-.979l.633-2.15a.5.5 0 0 0-.17-.534 4.649 4.649 0 0 1-1.284-1.541.5.5 0 0 0-.446-.275h-.56a.5.5 0 0 1-.492-.414l-.254-1.46h.933a.5.5 0 0 0 .488-.393zm12.621-.857a.565.565 0 0 1-.098.21.704.704 0 0 1-.044-.025c-.146-.09-.157-.175-.152-.223a.236.236 0 0 1 .117-.173c.049-.027.08-.021.113.012a.202.202 0 0 1 .064.199z" />
                            </svg>
                        </a>
                    </li>
                    <?php
                    if (!isset($_SESSION['usuario'])) {
                    ?>
                        <li class="nav-item liNavbar">
                            <a class="nav-link" href="http://localhost/comunidadBancariaCI/index.php/usuarioController">Ingresar</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <?php
                        if ($_SESSION['tipo_usuario'] == 0) {
                        ?>
                            <li class="nav-item liNavbar">
                                <a class="nav-link" href="">Buenas admin</a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item liNavbar">
                            <a class="nav-link" href="http://localhost/comunidadBancariaCI/index.php/usuarioController/disconect">Cerrar Sesion</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        <!-- navbar end -->
    </div>