<body>
    <!-- el navbar -->
    <div class="container" style="margin-bottom: 5.5rem;">
        <!-- navbar -->
        <nav class="navbar navbar-expand-md justify-content-center bg-dark navbar-dark fixed-top">
            <!-- Brand -->
            <div class="narbar-brand" style="margin-left: 2%;">
                <a class="navbar-brand" href="http://localhost/comunidadBancaria/index.php/homeController" style="font-family: 'Indie Flower', cursive; font-size: 2em;">TATW</a>
            </div>


            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse mt-2 mb-2" id="collapsibleNavbar" style="margin-left: 5%;font-size: 1.4rem;">
                <ul class="navbar-nav liNavbar">
                    <li class="nav-item liNavbar">
                        <a class="nav-link" href="http://localhost/comunidadBancaria/index.php/homeController">Home</a>
                    </li>
                    <li class="nav-item liNavbar">
                        <a class="nav-link" href="http://localhost/comunidadBancaria/index.php/clienteController/mostrar">Mostrar</a>
                    </li>
                    <li class="nav-item liNavbar">
                        <a class="nav-link" href="http://localhost/comunidadBancaria/index.php/clienteController/create">IngresarCliente</a>
                    </li>
                    <?php
                    if (!isset($_SESSION['usuario'])) {
                    ?>
                        <li class="nav-item liNavbar">
                            <a class="nav-link" href="http://localhost/comunidadBancaria/index.php/usuarioController">Ingresar</a>
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
                            <a class="nav-link" href="http://localhost/comunidadBancaria/index.php/usuarioController/disconect">Cerrar Sesion</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        <!-- navbar end -->
    </div>