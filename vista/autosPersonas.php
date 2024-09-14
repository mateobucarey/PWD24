<?php
include '../configuracion.php';

// Validar si se ha recibido un DNI a través del GET
$dni = isset($_GET['dni']) ? $_GET['dni'] : '';

if (empty($dni)) {
    // Si no se recibe un DNI válido, mostramos un mensaje de error
    $mensaje = 'No se proporcionó un DNI válido.';
} else {
    // Buscar la persona por el DNI recibido
    $controlPersona = new ControlPersona();
    $personas = $controlPersona->buscar(['nroDni' => $dni]);

    if (count($personas) > 0) {
        // Si se encuentra la persona, obtener su nombre y apellido
        $persona = $personas[0];
        $nombre = $persona->getNombre();
        $apellido = $persona->getApellido();

        // Buscar los autos asociados a esa persona
        $controlAuto = new ControlAuto();
        $autos = $controlAuto->buscar(['dniDuenio' => $dni]);
    } else {
        // Si no se encuentra la persona, mostrar un mensaje de error
        $mensaje = 'No se encontró ninguna persona con el DNI proporcionado.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autos de Persona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estructura/css/estilos.css">
    <script src="estructura/js/validacionCampos.js"></script>
</head>
<body>
<?php include_once('estructura/encabezado.php'); ?>
    <div class="container mt-4">
        <h2>Detalles de la Persona</h2>

        <!-- Mostrar el mensaje de error si no se encuentra la persona -->
        <?php if (isset($mensaje)): ?>
            <div class="alert alert-warning" role="alert">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php else: ?>
            <!-- Mostrar los datos de la persona -->
            <div class="mb-4">
                <h3><?php echo htmlspecialchars($nombre . ' ' . $apellido); ?></h3>
            </div>

            <h2>Autos Asociados</h2>

            <!-- Mostrar la lista de autos si existen -->
            <?php if (count($autos) > 0): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Patente</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($autos as $auto): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($auto->getPatente()); ?></td>
                                <td><?php echo htmlspecialchars($auto->getMarca()); ?></td>
                                <td><?php echo htmlspecialchars($auto->getModelo()); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <!-- Mostrar un mensaje si no hay autos asociados -->
                <div class="alert alert-info" role="alert">
                    Esta persona no tiene autos asociados.
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Botón para regresar a la lista de personas -->
        <a href="listaPersonas.php" class="btn btn-primary">Volver a la lista de personas</a>
    </div>
    <?php include_once('estructura/pieDePagina.php'); ?>
</body>
</html>
