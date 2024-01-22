<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once(__DIR__ . '/../../controller/pronameController.php');
    $obj = new pronameController();
    
    // Obtener valores del formulario
    $nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : null;
    $precio = isset($_POST['Precio']) ? $_POST['Precio'] : null;
    $cantidad = isset($_POST['Cantidad']) ? $_POST['Cantidad'] : null;
    $tipo = isset($_POST['Tipo']) ? $_POST['Tipo'] : null;

    // Llamar a la función guardar del controlador con los datos obtenidos
    $obj->guardar($nombre, $precio, $cantidad, $tipo);
} else {
    // Manejo si la solicitud no es de tipo POST 
    echo "Acceso no permitido";
}
?>

 