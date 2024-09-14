<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambio de Dueño</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estructura/css/estilos.css">
    <script src="estructura/js/validacionCampos.js"></script>
</head>
<body>
<?php include_once('estructura/encabezado.php') ?>
    <div class="container mt-4">
        <h2>Cambiar Dueño del Auto</h2>
        <form action="action/accionCambioDuenio.php" method="post">
            <div class="form-group">
                <label for="patente">Patente del Auto</label>
                <input type="text" name="patente" id="patente" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dniNuevoDuenio">DNI del Nuevo Dueño</label>
                <input type="text" name="dniNuevoDuenio" id="dniNuevoDuenio" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Cambiar Dueño</button>
        </form>
    </div>
    <?php include_once('estructura/pieDePagina.php') ?>
</body>
</html>
