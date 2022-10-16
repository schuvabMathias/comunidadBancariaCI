<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comunidad Bancaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Eliminar cuenta</h1>

    <form>
        <label class="form-label">Buscar:</label>
        <div class="mb-3">
            <select class="form-select" aria-label="Select Forma" name="selectForma" id="selectForma">
                <option value="Numero">Numero</option>
                <option value="Tipo">Tipo</option>
            </select>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="inputValor">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    <form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Checkbox</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    <td>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Eliminar</button>
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