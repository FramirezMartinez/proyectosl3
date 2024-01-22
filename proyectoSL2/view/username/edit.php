<?php
  //  require_once("c://xampp/htdocs/proyectoSL2/view/head/head.php");
  //  require_once("c://xampp/htdocs/proyectoSL2/controller/usernameController.php");
    require_once(__DIR__ . '/../../view/head/head.php');
    require_once(__DIR__ . '/../../controller/usernameController.php');
    
$obj = new usernameController();
// Obtener los detalles del registro
$prod= $obj->show($_GET['id']);
?>

<form action="update.php" method="post" autocomplete="off">
<h2>Modificando  registro</h2>
<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">id</label>
    <div class="col-sm-10">
      <input type="text" name="id" readonly class="form-control-plaintext" id="staticEmail" value="<?=$prod[0];?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Nuevo nombre</label>
    <div class="col-sm-10">
      <input type="text" name="nombretipo" class="form-control" id="inputPassword" value="<?=$prod[1];?>">
    </div>
  </div>

  <div>
    <input type="submit" class="btn btn-success" value="Actualizar">
    <a class="btn btn-danger" href="show.php?id=<?= $prod[0] ?>">Cancelar</a>
  </div>

</form>

<?php
require_once("../head/footer.php");
?>
