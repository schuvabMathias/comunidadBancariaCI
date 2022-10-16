    <h1>Ingreso de cliente:</h1>

    <?= $validation->listErrors(); ?>
    <?= form_open('clienteController/create') ?>
    <div class="mb-3">
        <label for="inputNomyApe" class="form-label">Nombre y Apellido</label>
        <input type="text" class="form-control" id="inputNomyApe" name="inputNomyApe" value="<?= set_value('nombre') ?>">
    </div>
    <div class="mb-3">
        <label for="inputDireccion" class="form-label">Direcci&oacute;n:</label>
        <input type="text" class="form-control" id="inputDireccion" name="inputDireccion" value="<?= set_value('direccion') ?>">
    </div>
    <div class="mb-3">
        <label for="inputTelefono" class="form-label">Tel&eacute;fono:</label>
        <input type="number" class="form-control" id="inputTelefono" name="inputTelefono" value="<?= set_value('telefono') ?>">
    </div>
    <div class="mb-3">
        <label for="inputFechaNac" class="form-label">Fecha de nacimiento:</label>
        <input type="date" class="form-control" id="inputFechaNac" name="inputFechaNac" value="<?= set_value('fechaNacimiento') ?>">
    </div>
    <div class="mb-3">
        <label for="inputDocumento" class="form-label">Documento de Identidad:</label>
        <input type="number" class="form-control" id="inputDocumento" name="inputDocumento" value="<?= set_value('documento') ?>">
    </div>
    <div class="mb-3">
        <label for="inputCUIT_CUIL" class="form-label">CUIT/CUIL:</label>
        <input type="number" class="form-control" id="inputCUIT_CUIL" name="inputCUIT_CUIL" value="<?= set_value('cuit_cuil') ?>">
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