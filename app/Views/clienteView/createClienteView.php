    <h1>Ingreso de cliente:</h1>

    <?php if ($validation != null) { ?>
        <?= $validation->listErrors(); ?>
    <?php } ?>
    <?php if ($pantalla == 'create') { ?>
        <?= form_open('clienteController/create') ?>
    <?php } else { ?>
        <?= form_open('clienteController/update/' . $dni) ?>
    <?php } ?>
    <div class="mb-3 form-floating">
        <input type="text" class="form-control" id="inputNomyApe" name="inputNomyApe" value="<?php echo $nombre_apellido ?>" placeholder="Nombre">
        <label for="inputNomyApe" class="form-label">Nombre y Apellido</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="text" class="form-control" id="inputDireccion" name="inputDireccion" value="<?php echo $direccion ?>" placeholder="Direccion">
        <label for="inputDireccion" class="form-label">Direcci&oacute;n:</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="number" class="form-control" id="inputTelefono" name="inputTelefono" value="<?php echo $telefono ?>" placeholder="Telefono">
        <label for="inputTelefono" class="form-label">Tel&eacute;fono:</label>
    </div>

    <div class="mb-3 form-floating">
        <input type="date" class="form-control" id="inputFechaNac" name="inputFechaNac" value="<?php echo $fecha_nacimiento ?>" placeholder="Fecha de Nacimiento">
        <label for="inputFechaNac" class="form-label">Fecha de nacimiento:</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="number" class="form-control" id="inputDocumento" name="inputDocumento" value="<?php echo $dni ?>" placeholder="Documento">
        <label for="inputDocumento" class="form-label">Documento de Identidad:</label>
    </div>
    <div class="mb-3 form-floating">
        <input type="number" class="form-control" id="inputCUIT_CUIL" name="inputCUIT_CUIL" value="<?php echo $cuit_cuil ?>" placeholder="Cuit/Cuil">
        <label for="inputCUIT_CUIL" class="form-label">CUIT/CUIL:</label>
    </div>
    <button type="submit" class="btn btn-primary">Ingresar</button>
    <?= form_close() ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    </body>



    <!--
    Cliente: 
    Nombre y Apellido – 
    Dirección – 
    Teléfono – 
    Fecha de Nacimiento –
    Documento de Identidad – 
    CUIT/CUIL
-->

    </html>