<?php

include_once '../../configuracion.php';
//include_once '../../control/ControlPersona.php'; // Ruta correcta al controlador de personas
//include_once '../../control/ControlAuto.php';    // Ruta correcta al controlador de autos
//include_once '../../util/funciones.php';          // Incluimos la función darDatosSubmitted()

// Usamos la función darDatosSubmitted para obtener los datos enviados
$datos = darDatosSubmitted();

// Verificamos que todos los datos requeridos estén presentes
if (isset($datos['patente']) && isset($datos['marca']) && isset($datos['modelo']) && isset($datos['dniDuenio'])) {

    // Recogemos los datos del formulario
    $patente = $datos['patente'];
    $marca = $datos['marca'];
    $modelo = $datos['modelo'];
    $dniDuenio = $datos['dniDuenio'];
    
    // Creamos una instancia de ControlPersona para buscar al dueño
    $controlPersona = new ControlPersona();
    $paramPersona = ['nroDni' => $dniDuenio];
    $personaArray = $controlPersona->buscar($paramPersona);
    
    // Verificamos si la persona dueña del auto existe en la base de datos
    if (count($personaArray) > 0) {
        // La persona existe, procedemos a registrar el auto
        $controlAuto = new ControlAuto();
        $paramAuto = [
            'patente' => $patente,
            'marca' => $marca,
            'modelo' => $modelo,
            'dniDuenio' => $dniDuenio
        ];
        
        // Intentamos dar de alta el nuevo auto
        $exito = $controlAuto->alta($paramAuto);
        
        if ($exito) {
            $mensaje = "El auto fue registrado exitosamente.";
        } else {
            $mensaje = "Hubo un error al intentar registrar el auto.";
        }
    } else {
        // La persona no existe, mostramos un mensaje y un enlace para registrar a la persona
        $mensaje = "El dueño con DNI $dniDuenio no está registrado en la base de datos.";
        $mensaje .= "<br><a href='NuevaPersona.php'>Registrar nueva persona</a>";
    }
} else {
    $mensaje = "Faltan datos obligatorios para poder registrar el auto.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Registro de Auto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../estructura/css/estilos.css">
    <script src="../estructura/js/validacionCampos.js"></script>
</head>
<body>
<?php include_once('../estructura/encabezadoAction.php') ?>
    <div class="container mt-4">
        <h2>Resultado</h2>
        <div class="alert <?php echo isset($exito) && $exito ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php echo $mensaje; ?>
        </div>
        <a href="../nuevoAuto.php" class="btn btn-primary">Volver</a>
    </div>
    <?php include_once('../estructura/pieDePagina.php') ?>
</body>
</html>
