<?php
include_once '../../configuracion.php';
//include_once '../../control/ControlPersona.php'; // Asegúrate de que la ruta sea correcta
//include_once '../../util/funciones.php'; // Incluimos la función darDatosSubmitted()

// Usamos darDatosSubmitted para obtener los datos enviados
$datos = darDatosSubmitted();

// Verificamos que todos los datos requeridos estén presentes
if (isset($datos['nroDni']) && isset($datos['nombre']) && isset($datos['apellido']) && isset($datos['fechaNac']) && isset($datos['telefono']) && isset($datos['domicilio'])) {
    
    // Recogemos los datos del formulario
    $param = [
        'nroDni' => $datos['nroDni'],
        'nombre' => $datos['nombre'],
        'apellido' => $datos['apellido'],
        'fechaNac' => $datos['fechaNac'],
        'telefono' => $datos['telefono'],
        'domicilio' => $datos['domicilio']
    ];
    
    // Creamos una instancia de ControlPersona
    $verPersona = new ControlPersona();
    
    // Intentamos dar de alta la nueva persona
    $exito = $verPersona->alta($param);
    
    // Mostramos el mensaje correspondiente
    if ($exito) {
        $mensaje = "La persona fue cargada exitosamente.";
    } else {
        $mensaje = "Hubo un error al intentar cargar la persona.";
    }
} else {
    $mensaje = "Faltan datos obligatorios para poder cargar la persona.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Nueva Persona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../estructura/css/estilos.css">
    <script src="../estructura/js/validacionCampos.js"></script>
</head>
<body>
<?php include_once('../estructura/encabezadoAction.php') ?>

    <div class="container mt-4">
        <h2>Resultado</h2>
        <div class="alert <?php echo $exito ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php echo $mensaje; ?>
        </div>
        <a href="../nuevaPersona.php" class="btn btn-primary">Volver</a>
    </div>
    <?php include_once('../estructura/pieDePagina.php') ?>
</body>
</html>
