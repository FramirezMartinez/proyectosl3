    <?php
    //productos
    class pronameController
    {
        private $model;

        public function __construct()
        {

            require_once("c://xampp/htdocs/proyectoSL2/model/pronameModel.php");
            $this->model = new pronameModel();

        }

        public function guardar($nombre, $precio, $cantidad, $tipo)
        {
            try {
                // Validar y limpiar el nombre antes de insertarlo en la base de datos
                $nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');   
                $precio = htmlspecialchars($precio, ENT_QUOTES, 'UTF-8');
                $cantidad = htmlspecialchars($cantidad, ENT_QUOTES, 'UTF-8');
                $tipo = htmlspecialchars($tipo, ENT_QUOTES, 'UTF-8');
                
                // Intentar insertar los datos en la base de datos
                $id = $this->model->insertar($nombre, $precio, $cantidad, $tipo);

                // Verificar el resultado de la inserción
                if ($id !== false) {
                    // Redirigir a la página de "show" si la inserción fue exitosa
                    header("Location:proshow.php?id=" . $id);
                    exit(); // Detener la ejecución después de la redirección
                } else {
                    // Redirigir a la página de "create" si la inserción falló
                    header("Location:procreate.php");
                    exit(); // Detener la ejecución después de la redirección
                }
            } catch (Exception $e) {
                // Manejo de excepciones: Mostrar un mensaje de error o redirigir a una página de error
                echo "Error: " . $e->getMessage();
            }
        }
    

        public function show($id)
        {
            $result = $this->model->show($id);
            return ($result !== false) ? $result : header("Location: proindex.php");
        }
        

        public function index()
        {
          return ($this->model->index())?  $this->model->index() : false;
         }

                

         public function update($id, $nombre, $precio, $cantidad)
         {
            return ($this->model->update($id, $nombre, $precio, $cantidad,) !== false) ? header("Location:proshow.php?id=" . $id) : header("Location:proindex.php");
         }

            

          public function delete($id)
          {
            return ($this->model->delete($id)) ? header("Location:proindex.php") : header("Location:proshow.php?id=".$id);
          }

            public function mostrarFormulario()
        {
            try {
                // Instanciar tu modelo
                $tiposProductos = $this->model->obtenerTiposProductos();

                if ($tiposProductos !== false) {
                    // Pasar los tipos de productos a la vista            include_once(__DIR__ . '/../../view/username/procreate.php');
                    

                } else {
                    // Manejo de errores o redirigir a una página de error
                    echo "Error al obtener tipos de productos.";
                }
            } catch (Exception $e) {
                // Manejo de errores: Puedes mostrar un mensaje de error o redirigir a una página de error
                echo "Error: " . $e->getMessage();
            }
        }

  
}
    ?>
