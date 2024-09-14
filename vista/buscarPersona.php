<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Persona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estructura/css/estilos.css">
    <script src="estructura/js/validacionCampos.js"></script>
</head>
<body>
<?php include_once('estructura/encabezado.php') ?>
    <div class="container mt-4">
        <h2>Buscar Persona</h2>
        <form action="action/accionBuscarPersona.php" method="post">
            <div class="form-group">
                <label for="nroDoc">Número de Documento</label>
                <input type="text" name="nroDni" id="nroDni" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
    <?php include_once('estructura/pieDePagina.php') ?>
</body>
</html>
