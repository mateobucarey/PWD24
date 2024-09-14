<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Persona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estructura/css/estilos.css">
    <script src="estructura/js/validacionCampos.js"></script>
</head>
<body>
<?php include_once('estructura/encabezado.php') ?>
    <div class="container mt-4">
        <h2>Nueva Persona</h2>
        <form action="action/accionNuevaPersona.php" method="post">
            <div class="form-group">
                <label for="nroDoc">DNI</label>
                <input type="text" name="nroDni" id="nroDni" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fechaNac">Fecha de Nacimiento</label>
                <input type="date" name="fechaNac" id="fechaNac" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="domicilio">Domicilio</label>
                <input type="text" name="domicilio" id="domicilio" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Persona</button>
        </form>
    </div>
    <?php include_once('estructura/pieDePagina.php') ?>
</body>
</html>
