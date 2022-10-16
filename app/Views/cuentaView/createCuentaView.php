<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comunidad Bancaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Ingreso de cuenta:</h1>

    <form>
        <div class="mb-3">
            <label for="inputNumero" class="form-label">Numero:</label>
            <input type="number" class="form-control" id="inputNumero">
        </div>
        <div class="mb-3">
            <label for="selectTipo" class="form-label">Tipo:</label>
            <select class="form-select" aria-label="Select Tipo" name="selectTipo" id="selectTipo">
                <option value="ahorro">Caja de Ahorros</option>
                <option value="sueldo">Cuenta Sueldo / Cuenta de Seguridad Social</option>
                <option value="corriente">Cuenta Corriente</option>
                <option value="universal">Cuenta Universal Gratuita</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="inputFechaCreacion" class="form-label">Fecha de creaci&oacute;n:</label>
            <input type="date" class="form-control" id="inputFechaCreacion">
        </div>
        <div class="mb-3">
            <label for="inputMoneda" class="form-label">Moneda:</label>
            <input type="text" class="form-control" id="inputMoneda">
        </div>
        <div class="mb-3">
            <label for="inputMontoActual" class="form-label">Monto actual:</label>
            <input type="number" class="form-control" id="inputMontoActual">
        </div>
        <div class="mb-3">
            <label for="inputTitular" class="form-label">Titular:</label>
            <input type="text" class="form-control" id="inputTitular">
        </div>
        <div class="mb-3">
            <label for="inputBanco" class="form-label">Banco:</label>
            <input type="text" class="form-control" id="inputBanco">
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
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