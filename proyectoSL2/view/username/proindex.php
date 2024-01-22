    <?php
    //require_once("c://xampp/htdocs/proyectoSL2/view/head/head.php");
    //require_once("c://xampp/htdocs/proyectoSL2/controller/usernameController.php");
    require_once(__DIR__ . '/../head/head.php');
    require_once(__DIR__ . '/../../controller/pronameController.php');

    $obj = new pronameController;
    $rows= $obj->index();
    ?>
    <div class="container mt-3">
        <a href="/proyectoSL2/view/username/procreate.php" class="btn btn-primary">Agregar nuevo producto</a>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">Código del producto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Tipo productos</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <!-- si hay registros ejecutar este codigo -->
                <?php if($rows): ?>
                    <?php foreach($rows as $row): ?>
                     <tr>
                       <th><?= isset($row[0]) ? $row[0] : '' ?></th>
                        <td><?= isset($row['Nombre']) ? $row['Nombre'] : '' ?></td>
                        <td><?= isset($row['Precio']) ? $row['Precio'] : '' ?></td>
                        <td><?= isset($row['Cantidad']) ? $row['Cantidad'] : '' ?></td>
                        <td><?= isset($row['NombreTipo']) ? $row['NombreTipo'] : '' ?></td>
                    
                            <td>
                                <a href="proshow.php?id=<?= isset($row[0]) ? $row[0] : '' ?>" class="btn btn-primary">Ver</a>
                                <a href="proedit.php?id=<?= isset($row[0]) ? $row[0] : '' ?>" class="btn btn-success">Modificar</a> 
                                
                                <!-- Button trigger modal -->
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= isset($row[0]) ? $row[0] : '' ?>">Eliminar</a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= isset($row[0]) ? $row[0] : '' ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <a href="prodelete.php?id=<?= isset($row[0]) ? $row[0] : '' ?>" class="btn btn-danger">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay registros</td>
                    </tr>
                <?php endif;?>   
            </tbody>
        </table>
    </div>

    <?php
    //require_once("head/footer.php");
    require_once(__DIR__ . '/../head/footer.php');
    ?>