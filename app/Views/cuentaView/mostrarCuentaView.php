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
    <link rel="stylesheet" href="<?php echo base_url() ?>/app/Views/generalStyle.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/app/Views/tablitaStyle.css">

    <title>Comunidad Bancaria</title>
</head>

<body>
    <div class="container">
        <div class="container titulo">
            <h2>Comunidad Bancaria</h2>
        </div>
        <div class="container menuInfo d-flex flex-column flex-md-row">
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
                                <a href="<?php echo base_url() ?>/index.php/cuentaController" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                        <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z" />
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                                    </svg> Cuentas</a>
                            </li>
                            <?php if ($_SESSION['tipo_usuario'] == 0) { ?>
                                <li>
                                    <a href="<?php echo base_url() ?>/index.php/clienteController" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                        </svg> Clientes</a>
                                </li>
                            <?php } ?>
                            <!-- 
                        <li>
                            <a href="#" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                </svg> Usuario</a>
                        </li> 
                        -->
                            <!-- BANCOS -->
                            <li>
                                <a href="<?php echo base_url() ?>/index.php/bancoController" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank" viewBox="0 0 16 16">
                                        <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z" />
                                    </svg> Bancos</a>
                            </li>
                            <!-- Exit -->
                            <li>
                                <a href="<?php echo base_url() ?>/index.php/usuarioController/disconect" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                    </svg> Cerrar sesi&oacute;n</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <main class="container informacion flex-grow-1">

                <div class="container tituloTwo">
                    <h3>Menú Cuenta > Mostrar Cuentas</h3>
                </div>
                <?= form_open('cuentaController/mostrar') ?>
                <div class="justify-content-center ">
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-3 mb-3 form-floating">
                                <select class="form-select" aria-label="Select Forma" name="selectForma" id="selectForma">
                                    <option value="numero">Número</option>
                                    <option value="tipo_cuenta">Tipo de cuenta</option>
                                </select>
                                <label class="form-label" for="selectForma">Buscar por:</label>
                            </div>
                            <div class="col-7 mb-1 form-floating" id="valores">
                                <input type="text" class="form-control" id="inputValor" name="inputValor" placeholder="valor">
                                <label for="inputValor" class="form-label p-3">Valor</label>
                            </div>
                            <div class="col-7 mb-1 form-floating " id="selection">
                                <select class="form-select" aria-label="Select Tipo" name="inputValor" id="inputValor">
                                    <option value="1" selected>Caja de Ahorros</option>
                                    <option value="2">Cuenta Sueldo / Cuenta de Seguridad Social</option>
                                    <option value="3">Cuenta Corriente</option>
                                    <option value="4">Cuenta Universal Gratuita</option>
                                </select>
                                <label for="inputValor" class="form-label">Tipo:</label>
                            </div>
                            <div class="col-sm-2 col-2">
                                <div class="d-grid mt-0 ">
                                    <button type="submit" style="padding: 17px;" class="btn btn-dark botoncito">Buscar</button>
                                </div>
                            </div>
                        </div>
                        <?php form_close() ?>
                        <table class="table table-striped tablita">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Número</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Fecha Creacion</th>
                                    <th scope="col">Tipo moneda</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Titular</th>
                                    <th scope="col">Banco</th>
                                    <th scope="col">Numero Sucursal</th>
                                    <?php if ($_SESSION['tipo_usuario'] == 0) { ?>
                                        <th scope="col">Modificar</th>
                                        <th scope="col">Eliminar</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php for ($i = 0; $i < sizeof($cuentas); $i++) { ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $i + 1 ?>
                                        </th>
                                        <td>
                                            <?php echo $cuentas[$i]['numero'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($cuentas[$i]['tipo_cuenta'] == 1) {
                                                echo "Caja de Ahorro";
                                            }
                                            if ($cuentas[$i]['tipo_cuenta'] == 2) {
                                                echo "Cuenta Sueldo";
                                            }
                                            if ($cuentas[$i]['tipo_cuenta'] == 3) {
                                                echo "Cuenta Corriente";
                                            }
                                            if ($cuentas[$i]['tipo_cuenta'] == 4) {
                                                echo "Cuenta Universal Gratuita";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $cuentas[$i]['fecha_start'] ?>
                                        </td>
                                        <td>
                                            <?php echo $cuentas[$i]['tipo_moneda'] ?>
                                        </td>
                                        <td>
                                            <?php echo $cuentas[$i]['monto'] ?>
                                        </td>
                                        <td>
                                            <?php echo $cuentas[$i]['id_titular'] ?>
                                        </td>
                                        <td>
                                            <?php echo $cuentas[$i]['id_banco'] ?>
                                        </td>
                                        <td>
                                            <?php echo $cuentas[$i]['numero_sucursal'] ?>
                                        </td>
                                        <?php if ($_SESSION['tipo_usuario'] == 0) { ?>
                                            <td>
                                                <a href="http://localhost/comunidadBancariaCI/index.php/cuentaController/update/<?php echo $cuentas[$i]['id_cuenta'] ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="http://localhost/comunidadBancariaCI/index.php/cuentaController/delete/<?php echo $cuentas[$i]['id_cuenta'] ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg>
                                                </a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container d-flex justify-content-center">
                    <div class="container  divBotoncitoCenter ">
                        <div class="d-grid mt-3 ">
                            <a href="<?php echo base_url() ?>/index.php/cuentaController/volver" type="button" class="btn btn-outline-dark botoncito">Volver</a>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
            </main>
        </div>
    </div>

</body>

<script src="<?php echo base_url() ?>/app/Views/cuentaView/mostrarCuenta.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>