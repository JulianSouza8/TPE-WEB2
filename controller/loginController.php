<?php
require_once 'view/loginView.php';
require_once 'model/loginModel.php';

require_once "model/productosModel.php";
require_once "model/proveedoresModel.php";
require_once "model/modelCategorias.php";
require_once "model/modelMedidas.php";

class loginController{

    private $view;
    private $model;
    private $modelProveedores;
    private $modelMedidas;
    private $modelCategorias;
    private $modelProductos;

    function __construct(){
        $this->view = new loginView();
        $this->model = new loginModel();
        $this->modelProveedores = new proveedoresModel();
        $this->modelMedidas = new modelMedidas();
        $this->modelCategorias = new modelCategorias();
        $this->modelProductos = new productosModel();
    }

    public function verLogin(){
        $this->view->mostarLogin('');
    }

    public function logear(){  
      if (!isset($_POST['usuario']) || empty($_POST['usuario'])) {
          return $this->view->mostarLogin('error de usuario');
      }
  
      if (!isset($_POST['contra']) || empty($_POST['contra'])) {
          return $this->view->mostarLogin('Error de contraseña');
      }
      $usuario = $_POST['usuario'];
      $contraseña = $_POST['contra'];
  
      // Verificar que el usuario está en la base de datos
      $usuariodb = $this->model->buscarUsuario($usuario);
      
      if($usuariodb && ($contraseña == $usuariodb->contraseña)){
          // Guardo en la sesión el ID del usuario
          $_SESSION['ID_USER'] = $usuariodb->id;
          $_SESSION['EMAIL_USER'] = $usuariodb->usuario;
          $_SESSION['LAST_ACTIVITY'] = time();
  
          // Redirijo al home

        $this->view->showHomeLocation();
      } else {
          return $this->view->mostarLogin('error de usuario o contraseña');;
      }
    }

  /* public function verificAradmin()
  {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    //todo verificar
    if (!empty($usuario) && !empty($contraseña)) {
      $usuarioDB = $this->model->buscarUsuario($usuario);
      if ($contraseña ==  $usuarioDB->contraseña) {

        session_start(); // abrimos session y guardamos el id y el nombre hasta que la cierre
        $_SESSION['IS_LOGGED'] == true;
        $_SESSION['ID_USER'] = $usuarios->id;
        $_SESSION['ADMIN'] = $usuarios->admin;
        $_SESSION['NOMBRE'] = $usuarios->nombre;
        if ($usuarios->admin == '1') {
          //$_SESSION['ESTEESADMIN'] = $usuarios->admin;
          $this->view->mostarAdmin();
          
        } else {
          //$_SESSION['ESTENOESADMN'] = $usuarios->admin;
          $this->view->mostarLogin();
        }
      } else {
        $this->view->ShowLoginError(); // pop up con error
      }
    } else {
      $this->view->ShowLoginError(); // pop up con error
    }
  }
  */
  public function logout(){
    session_start();
    session_destroy();
    $this->view->showHomeLocation();
  }
}
