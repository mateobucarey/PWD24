<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Auto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estructura/css/estilos.css">
    <script src="estructura/js/validacionCampos.js"></script>
</head>
<body>
<?php include_once('estructura/encabezado.php') ?>
    <div class="container mt-4">
        <h2>Registrar Nuevo Auto</h2>
        <form action="action/accionNuevoAuto.php" method="post">
            <div class="form-group">
                <label for="patente">Patente</label>
                <input type="text" name="patente" id="patente" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="number" name="modelo" id="modelo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dniDuenio">DNI del Dueño</label>
                <input type="text" name="dniDuenio" id="dniDuenio" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Auto</button>
        </form>
    </div>
    <?php include_once('estructura/pieDePagina.php') ?>
</body>
</html>
