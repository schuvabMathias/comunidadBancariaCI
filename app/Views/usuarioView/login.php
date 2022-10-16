<h1>Login:</h1>

<?php
if (isset($error)) {
    echo '<br>Usuario ' . $user . ' NO encontrado - o Password incorrecto ' . $password . '<br><br>';
} ?>
<?= form_open('usuarioController/connect') ?>
<div class="mb-3">
    <label for="inputUser" class="form-label">Usuario</label>
    <input type="text" class="form-control" id="inputUser" name="inputUser" value="<?= $user ?>">
</div>
<div class="mb-3">
    <label for="inputPassword" class="form-label">Contrase&ntilde;a</label>
    <input type="text" class="form-control" id="inputPassword" name="inputPassword" value="<?= $password ?>">
</div>
<button type="submit" class="btn btn-primary">Ingresar</button>
<?= form_close() ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>

</html>