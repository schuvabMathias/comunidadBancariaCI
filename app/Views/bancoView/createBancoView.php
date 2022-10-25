<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/705c9e6d0f.js" crossorigin="anonymous"></script>


    <link rel="shortcut icon" href="<?php echo base_url() ?>/app/Views/img/logo.png">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url() ?>/app/Views/styleSideBar.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/app/Views/bancoView/createBanco.css">

    <title>Comunidad Bancaria</title>
</head>

<body>
    <div class="container titulo">
        <h2>Comunidad Bancaria</h2>
    </div>
    <div class="container menuInfo d-flex  flex-column flex-md-row">

        <div>
            <nav class="navbar navbar-expand-md navbar-light d-flex flex-md-column">
                <a href="<?php echo base_url() ?>/index.php/usuarioController">
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
                                Hola, <?php echo $_SESSION['usuario'] ?>!
                            </a>
                            <!-- este de arriba se cambia a Hola, NombreUsuario! -->
                        </li>
                        <!-- MI CUENTA -->
                        <li>
                            <a href="#" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                    <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z" />
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                                </svg> Cuenta</a>
                        </li>

                        <li>
                            <a href="#" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                </svg> Cliente</a>
                        </li>

                        <!-- BANCOS -->
                        <li>
                            <a href="#" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank" viewBox="0 0 16 16">
                                    <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z" />
                                </svg> Banco</a>
                        </li>
                        <!-- Cerrar Sesion -->
                        <li>
                            <a href="<?php echo base_url() ?>/index.php/usuarioController/disconect" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg> Cerrar Sesi&oacute;n</a>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>


        <main class="container informacion ps-0 ps-md-5 flex-grow-1">
            <h1>Ingreso de banco:</h1>
            <?php if ($validation != null) { ?>
                <?= $validation->listErrors(); ?>
            <?php } ?>
            <?php if ($pantalla == 'create') { ?>
                <?= form_open('bancoController/create') ?>
            <?php } else { ?>
                <?= form_open('bancoController/update/' . $id_banco) ?>
            <?php } ?>
            <div class="mb-3 col-11 form-floating">
                <input type="text" class="form-control" id="inputNombre" name="inputNombre" value="<?php echo $nombre ?>" placeholder="Numero">
                <label for="inputNombre" class="form-label">Nombre</label>
            </div>
            <div class="mb-3 col-11 form-floating">
                <input type="text" class="form-control" id="inputDireccion" name="inputDireccion" value="<?php echo $direccion ?>" placeholder="Dirección">
                <label for="inputDireccion" class="form-label">Direcci&oacute;n:</label>
            </div>
            <div class="mb-3 col-11 form-floating">
                <input type="number" class="form-control" id="inputNroSucursal" name="inputNroSucursal" value="<?php echo $numero_sucursal ?>" placeholder="Numero de Sucursal">
                <label for="inputNroSucursal" class="form-label">Numero de Sucursal:</label>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
            <!--  <?= form_close() ?> -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        </main>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>



<!-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comunidad Bancaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Ingreso de banco:</h1>
    ?php if ($validation != null) { ?>
        ?= $validation->listErrors(); ?>
    ?php } ?>
    ?php if ($pantalla == 'create') { ?>
        ?= form_open('bancoController/create') ?>
    ?php } else { ?>
        ?= form_open('bancoController/update/' . $id_banco) ?>
    ?php } ?>
    <div class="mb-3 form-floating">
        <input type="text" class="form-control" id="inputNombre" name="inputNombre" value="?php echo $nombre ?>" placeholder="Numero">
        <label for="inputNombre" class="form-label">Nombre</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="text" class="form-control" id="inputDireccion" name="inputDireccion" value="?php echo $direccion ?>" placeholder="Dirección">
        <label for="inputDireccion" class="form-label">Direcci&oacute;n:</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="number" class="form-control" id="inputNroSucursal" name="inputNroSucursal" value="?php echo $numero_sucursal ?>" placeholder="Numero de Sucursal">
        <label for="inputNroSucursal" class="form-label">Numero de Sucursal:</label>
    </div>
    <button type="submit" class="btn btn-primary">Ingresar</button>
    ?= form_close() ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html> -->