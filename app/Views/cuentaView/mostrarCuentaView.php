<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comunidad Bancaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?= form_open('cuentaController/mostrarCuentas') ?>
    <label class="form-label">Buscar:</label>
    <div class="mb-3 form-floating">
        <select class="form-select" aria-label="Select Forma" name="selectForma" id="selectForma">
            <option value="numero">Numero</option>
        </select>
        <label class="form-label" for="selectForma">Buscar por:</label>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="inputValor" name="inputValor">
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
    <?php form_close() ?>
    <form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Numero</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Fecha Creacion</th>
                    <th scope="col">Tipo moneda</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Titular</th>
                    <th scope="col">Banco</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php for ($i = 0; $i < sizeof($cuentas); $i++) { ?>
                    <tr>
                        <th scope="row"><?php echo $i + 1 ?></th>
                        <td><?php echo $cuentas[$i]['numero'] ?></td>
                        <td><?php
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
                            ?></td>
                        <td><?php echo $cuentas[$i]['fecha_start'] ?></td>
                        <td><?php echo $cuentas[$i]['tipo_moneda'] ?></td>
                        <td><?php echo $cuentas[$i]['monto'] ?></td>
                        <td><?php echo $cuentas[$i]['id_titular'] ?></td>
                        <td><?php echo $cuentas[$i]['id_banco'] ?></td>
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
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Eliminar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>



<!--
    Cliente: Nombre y Apellido – Dirección – Teléfono – Fecha de Nacimiento –
    Documento de Identidad – CUIT/CUIL
-->

</html>