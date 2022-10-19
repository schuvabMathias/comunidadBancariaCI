    <h1>Crear una cuenta:</h1>
    <?php if ($validation != null) { ?>
        <?= $validation->listErrors(); ?>
    <?php } ?>
    <?php if ($pantalla == 'create') { ?>
        <?= form_open('cuentaController/create') ?>
    <?php } else { ?>
        <?= form_open('cuentaController/update/' . $id_cuenta) ?>
    <?php } ?>
    <div class="mb-3 form-floating">

        <input type="number" value="<?php echo $numero ?>" class="form-control" name="inputNumero" id="inputNumero" placeholder="numero">
        <label for="inputNumero" class="form-label">Numero:</label>
    </div>
    <div class="mb-3 form-floating">
        <select class="form-select" value="<?php echo $tipo_cuenta ?>" aria-label="Select Tipo" name="selectTipo" id="selectTipo">
            <option value="1">Caja de Ahorros</option>
            <option value="2">Cuenta Sueldo / Cuenta de Seguridad Social</option>
            <option value="3">Cuenta Corriente</option>
            <option value="4">Cuenta Universal Gratuita</option>
        </select>
        <label for="selectTipo" class="form-label">Tipo:</label>
    </div>
    <div class="form-floating mb-3">
        <input type="date" value="<?php echo $fecha_start ?>" class="form-control" name="inputFechaCreacion" id="inputFechaCreacion" placeholder="fechaDeCreacion">
        <label for="inputFechaCreacion" class="form-label">Fecha de creaci&oacute;n:</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" value="<?php echo $tipo_moneda ?>" class="form-control" name="inputMoneda" id="inputMoneda" placeholder="moneda">
        <label for="inputMoneda" class="form-label">Moneda:</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" value="<?php if ($pantalla == 'create') {
                                        echo $_SESSION['usuario'];
                                    } else {
                                        echo $titular;
                                    } ?>" class="form-control" name="inputTitular" id="inputTitular" disabled>
        <label for="inputTitular" class="form-label">Titular:</label>
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" aria-label="Floating label select example" name="inputBanco" id="inputBanco">
            <?php for ($i = 0; $i < sizeof($bancos); $i++) { ?>
                <option value="<?php echo $bancos[$i]['id_banco'] ?>"><?php echo $bancos[$i]['nombre'] ?></option>
            <?php } ?>
        </select>
        <label for="inputBanco" class="form-label">Banco:</label>
    </div>
    <button type="submit" class="btn btn-primary">Ingresar</button>
    <?= form_close() ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>



    <!--
    Cuenta: 
    Número – 
    Tipo (Caja de Ahorros, Cuenta Sueldo/ Cuenta de Seguridad Social, Cuenta Corriente, Cuenta Universal Gratuita (CUG)) – 
    Fecha de creación – 
    Moneda – 
    Monto actual – 
    Titular – 
    Banco.
-->

    </html>