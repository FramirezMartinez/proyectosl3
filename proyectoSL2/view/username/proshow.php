<?php
//require_once("c://xampp/htdocs/proyectoSL2/view/head/head.php");
//require_once("c://xampp/htdocs/proyectoSL2/controller/usernameController.php");

require_once(__DIR__ . '/../head/head.php');
require_once(__DIR__ . '/../../controller/pronameController.php');

$obj = new pronameController();
// Obtener los detalles del registro
$date= $obj->show($_GET['id']);
?>

<h2 class="text-center">Detalles del registro producto</h2>
<div class="pd-3">

<a href="proindex.php" class="btn btn-primary">Regresar</a>
<a href="proedit.php?id=<?= $date[0] ?>" class="btn btn-success">Actualizar</a>

    <!-- Button trigger modal -->
    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea eliminar el registro?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Una vez eliminado no se podrá recuperar el registro
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
           <a href="prodelete.php?id=<?= $date[0]?>" class="btn btn-danger">Eliminar</a>
            
        </div>
        </div>
    </div>
    </div>
</div>
<table class="table- container-fluid">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Tipos de productos</th>
                
            </tr>   
        </thead>
    
        <tbody>
            <tr>
                <td scope="col"><?=$date[0]?></td>
                <td scope="col"><?=$date[1]?></td>
                <td scope="col"><?=$date[2]?></td>
                <td scope="col"><?=$date[3]?></td>
               <!-- También puedo mandar a traer el registro de esta manera-->
                <td scope="col"><?= isset($date['TipoNombre']) ? $date['TipoNombre'] : '' ?></td>

                   
            </tr>
        </tbody>
    </table>

<?php
require_once("../head/footer.php");
?>
