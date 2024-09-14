<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Auto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estructura/css/estilos.css">
    <script src="estructura/js/validacionCampos.js"></script>
</head>
<body>
<?php include_once('estructura/encabezado.php') ?>
    <div class="container mt-4">
        <h2>Buscar Auto</h2>
        <form action="action/accionBuscarAuto.php" method="post">
            <div class="form-group">
                <label for="patente">Número de Patente:</label>
                <input type="text" class="form-control" id="patente" name="patente" required>
            </div>
            <input type="submit" class="btn btn-primary">Buscar</input>
        </form>
    </div>
    <?php include_once('estructura/pieDePagina.php') ?>
</body>
</html>
