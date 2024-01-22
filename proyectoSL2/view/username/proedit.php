  <?php
    //  require_once("c://xampp/htdocs/proyectoSL2/view/head/head.php");
    //  require_once("c://xampp/htdocs/proyectoSL2/controller/usernameController.php");
      require_once(__DIR__ . '/../../view/head/head.php');
      require_once(__DIR__ . '/../../controller/pronameController.php');
      
  $obj = new pronameController();
  // Obtener los detalles del registro
  $prod= $obj->show($_GET['id']);
  ?>

  <form action="proupdate.php" method="post" autocomplete="off">
  <h2>Modificando  registro</h2>
  <div class="mb-3 row">
      <label for="staticEmail" class="col-sm-2 col-form-label">id</label>
      <div class="col-sm-10">
        <input type="text" name="id" readonly class="form-control-plaintext" id="staticEmail" value="<?=$prod[0];?>">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Nombre</label>
      <div class="col-sm-10">
        <input type="text" name="nombre" class="form-control" id="nombre" value="<?=$prod[1];?>">
      </div>
    </div>
  
    <div class="mb-3 row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Precio</label>
      <div class="col-sm-10">
        <input type="text" name="precio" class="form-control" id="precio" value="<?=$prod[2];?>">
      </div>
    </div>
    <div>
    <div class="mb-3 row">
      <label for="inputPassword" class="col-sm-2 col-form-label">cantidad</label>
      <div class="col-sm-10">
        <input type="text" name="cantidad" class="form-control" id="cantidad" value="<?=$prod[3];?>">
      </div>
    </div>
    
    <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Tipo de producto</label>
    <div class="col-sm-10">
        <input type="text" name="tipo" class="form-control" id="tipo" value="<?= isset($prod['TipoNombre']) ? $prod['TipoNombre'] : '' ?>">
    </div>
</div>

      <input type="submit" class="btn btn-success" value="Actualizar">
      <a class="btn btn-danger" href="proshow.php?id=<?= $prod[0] ?>">Cancelar</a>
    </div>

  </form>

  <?php
  require_once("../head/footer.php");
  ?>
