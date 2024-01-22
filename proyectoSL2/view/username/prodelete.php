<?php

require_once("c://xampp/htdocs/proyectoSL2/controller/pronameController.php");

//require_once(__DIR__ . '/..controller/pronameController.php"');

 // Verifica si se proporciona el parámetro 'id' en la URL
if (isset($_GET['id'])) {
    // Crea una instancia del controlador
    $obj = new pronameController();

    // Recupera el 'id' de la URL
    $id = $_GET['id'];

    // Llama al método delete del controlador
    $result = $obj->delete($id);

    // Verifica el resultado de la eliminación
    if ($result) {
        echo "Registro eliminado con éxito";
    } else {
        echo "Error al eliminar el registro";
    }
} else {
    // Maneja el caso en el que no se proporciona el parámetro 'id'
    echo "No se proporcionó el parámetro 'id'";
}
?>
