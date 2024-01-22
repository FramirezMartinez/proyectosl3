<?php 
   //require_once ("c://xampp/htdocs/proyectoSL2/controller/usernameController.php");
   require_once(__DIR__ . '/../../controller/pronameController.php');
$obj=new pronameController();
$obj->update($_POST['id'],$_POST['nombre'],$_POST['precio'],$_POST['cantidad'],$_POST['tipo']);
?>