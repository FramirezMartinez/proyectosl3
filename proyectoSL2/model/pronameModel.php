<?php 
  class pronameModel
  {
      private $PDO;
  
      public function __construct()
      {
          //require_once ("c://xampp/htdocs/proyectoSL2/config/db.php");
        
          require_once(__DIR__ . '/../config/db.php');
          $con = new db();
          $this->PDO = $con->conexion();


          if (!$this->PDO) {
            echo "Error al conectar a la base de datos";
        }
      }
  
      public function insertar($nombre, $precio, $cantidad, $tipo)
      {
          try {
              $stament = $this->PDO->prepare("INSERT INTO productos (Nombre, Precio, Cantidad, Idtip) VALUES (:Nombre, :Precio, :Cantidad, :Idtip)");
              $stament->bindParam(":Nombre", $nombre);
              $stament->bindParam(":Precio", $precio);
              $stament->bindParam(":Cantidad", $cantidad);
              $stament->bindParam(":Idtip", $tipo);
      
              return ($stament->execute()) ? $this->PDO->lastInsertId() : false;
          } catch (PDOException $e) {
              // Manejo de excepciones: Mostrar un mensaje de error o log, o redirigir a una página de error
              echo "Error al insertar en la base de datos: " . $e->getMessage();
              return false;
          }
      }

      public function show($id)
      {
          try {
              $statement = $this->PDO->prepare("SELECT productos.*, tiposproductos.NombreTipo AS TipoNombre
                                               FROM productos
                                               LEFT JOIN tiposproductos ON productos.Idtip = tiposproductos.Idtip
                                               WHERE Idproducto = :id");
              $statement->bindParam(":id", $id);
              
              return ($statement->execute()) ? $statement->fetch() : false;
          } catch (PDOException $e) {
              // Manejo de excepciones: Mostrar un mensaje de error o log, o redirigir a una página de error
              echo "Error al obtener datos de la base de datos: " . $e->getMessage();
              return false;
          }
      }
      

    
        public function index()
        {
            try {
                $statement = $this->PDO->prepare("SELECT productos.*, tiposproductos.NombreTipo AS NombreTipo FROM productos
                                                LEFT JOIN tiposproductos ON productos.Idtip = tiposproductos.Idtip");
                return ($statement->execute()) ? $statement->fetchAll() : false;
            } catch (PDOException $e) {
                // Manejo de excepciones: Mostrar un mensaje de error o log, o redirigir a una página de error
                echo "Error al obtener datos de la base de datos: " . $e->getMessage();
                return false;
            }
        }

        public function update($id, $nombre, $precio, $cantidad )
        {
            $statement = $this->PDO->prepare("UPDATE productos SET Nombre=:nombre, Precio=:precio, Cantidad=:cantidad WHERE Idproducto=:id");
           
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":precio", $precio, PDO::PARAM_INT);
            $statement->bindParam(":cantidad", $cantidad, PDO::PARAM_STR);
           
            
            return ($statement->execute()) ? $id : false;
        }
        

  public function delete($id)
    {
      $statement = $this->PDO->prepare("DELETE FROM productos WHERE Idproducto=:id");
      $statement->bindParam(":id", $id);
      return ($statement->execute())? true:  false;
    }
    public function obtenerTiposProductos() {
      try {
          $statement = $this->PDO->prepare("SELECT * FROM tiposproductos");
          if ($statement->execute()) {
              $tipos = $statement->fetchAll();
              var_dump($tipos); // Añade esta línea para depurar
              return $tipos;
          } else {
              return false;
          }
      } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
          return false;
      }
  }
  

  
      


  }


         
?>
