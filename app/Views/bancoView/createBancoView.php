<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comunidad Bancaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Ingreso de banco:</h1>
    <?php if ($validation != null) { ?>
        <?= $validation->listErrors(); ?>
    <?php } ?>
    <?php if ($pantalla == 'create') { ?>
        <?= form_open('bancoController/create') ?>
    <?php } else { ?>
        <?= form_open('bancoController/update/' . $id_banco) ?>
    <?php } ?>
    <div class="mb-3">
        <label for="inputNombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="inputNombre" name="inputNombre" value="<?php echo $nombre ?>">
    </div>
    <div class="mb-3">
        <label for="inputDireccion" class="form-label">Direcci&oacute;n:</label>
        <input type="text" class="form-control" id="inputDireccion" name="inputDireccion" value="<?php echo $direccion ?>">
    </div>
    <div class="mb-3">
        <label for="inputNroSucursal" class="form-label">Numero de Sucursal:</label>
        <input type="number" class="form-control" id="inputNroSucursal" name="inputNroSucursal" value="<?php echo $numero_sucursal ?>">
    </div>
    <button type="submit" class="btn btn-primary">Ingresar</button>
    <?= form_close() ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>



<!--
    Banco: 
    Nombre – 
    Dirección – 
    Número de Sucursal.
-->

</html>