<?php 
  class usernameModel
  {
      private $PDO;
  
      public function __construct()
      {
          //require_once ("c://xampp/htdocs/proyectoSL2/config/db.php");
        
          require_once(__DIR__ . '/../config/db.php');
          $con = new db();
          $this->PDO = $con->conexion();
      }
  
      public function insertar($nombretipo)
      {
          try {
              $stament = $this->PDO->prepare("INSERT INTO tiposproductos (NombreTipo) VALUES (:NombreTipo)");
              $stament->bindParam(":NombreTipo", $nombretipo);
              return ($stament->execute()) ? $this->PDO->lastInsertId() : false;
          } catch (PDOException $e) {
              // Manejo de excepciones: Mostrar un mensaje de error o log, o redirigir a una página de error
              echo "Error al insertar en la base de datos: " . $e->getMessage();
              return false;
          }
      }

      public function show($id)
      {
        
            $stament = $this->PDO->prepare("SELECT * FROM tiposproductos WHERE Idtip = :id ");
              $stament->bindParam(":id", $id);
      
           return ($stament->execute()) ? $stament->fetch(): false;
      
           
          }

        public function index()
        {
         $stament =$this->PDO->prepare("SELECT * FROM tiposproductos");
         return($stament->execute()) ? $stament-> fetchAll(): false;
        }
            
            
        public function update($id, $nombretipo)
        {
            $statement = $this->PDO->prepare("UPDATE tiposproductos SET NombreTipo=:nombretipo WHERE Idtip=:id");
        
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":nombretipo", $nombretipo, PDO::PARAM_STR);
            
            return ($statement->execute()) ? $id : false;
        }

 public function delete($id)
 {
    $statement = $this->PDO->prepare("DELETE FROM tiposproductos WHERE Idtip=:id");
    $statement->bindParam(":id", $id);
   return ($statement->execute())? true:  false;
  
     }
}
         
?>
