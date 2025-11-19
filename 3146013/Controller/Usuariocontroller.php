<?php
class controller{
// que hacemos?
public $model;
public $view;

public function __construct(){
    $this->model = "models/usuario.php";
     $this->view = "views/usuario/lista.php";
     require_once $this->model;

     $conexion = usuario::connect(); 


}

    public function index(){
        $usuarios = usuario::listar();
        require_once $this->view;
    }
    
    public function guardar(){
        $nuevoUsuario = new usuario(null, $_POST["nombre"], $_POST["correo"], $_POST["rol"], $_POST["telefono"]);
        $nuevoUsuario->insertar();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
      
    }

}


