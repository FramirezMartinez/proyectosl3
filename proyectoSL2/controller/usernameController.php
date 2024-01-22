<?php
class usernameController
{
    private $model;

    public function __construct()
    {
//        require_once("c://xampp/htdocs/proyectoSL2/model/usernameModel.php");
        require_once(__DIR__ . '/../model/usernameModel.php');

        $this->model = new usernameModel();
    }

    public function guardar($nombretipo)
    {
        try {
            // Validar y limpiar el nombre antes de insertarlo en la base de datos
            $nombretipo = htmlspecialchars($nombretipo, ENT_QUOTES, 'UTF-8');

            // Intentar insertar el nombre en la base de datos
            $id = $this->model->insertar($nombretipo);

            // Verificar el resultado de la inserción
            if ($id !== false) {
                // Redirigir a la página de "show" si la inserción fue exitosa
                header("Location: show.php?id=" . $id);
                exit(); // Detener la ejecución después de la redirección
            }
             else {
                // Redirigir a la página de "create" si la inserción falló
                header("Location: create.php");
                exit(); // Detener la ejecución después de la redirección
            }
        } catch (Exception $e) {
            // Manejo de excepciones: Mostrar un mensaje de error o redirigir a una página de error
            echo "Error: " . $e->getMessage();
        }
    }
   

    public function show($id)
    {
     return($this->model->show($id) != false ) ? $this->model->show($id) :header("Location: index.php");
    }


   public function index()
   {
    return ($this->model->index())?  $this->model->index() : false;
   }


   public function update($id,$nombretipo)
   {
    return($this->model->update($id,$nombretipo) != false) ? header("Location:show.php?id=".$id) : header("Location:index.php");
   }
   

   public function delete($id)
   {
    return ($this->model->delete($id)) ? header("Location:index.php") : header("Location:show.php?id=".$id);

   }
 }
?>
