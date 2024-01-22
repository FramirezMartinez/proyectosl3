<?php 
   //require_once ("c://xampp/htdocs/proyectoSL2/controller/usernameController.php");
   require_once(__DIR__ . '/../../controller/usernameController.php');
$obj=new usernameController();
$obj->update($_POST['id'],$_POST['nombretipo']);
?>