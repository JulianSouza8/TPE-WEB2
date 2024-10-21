<?php


class loginView{
  private $user = null;

  public function mostarLogin($texto){
    require 'templates/login.phtml';
  }
  public function mostarAdmin(){
    require 'templates/admin.phtml';
  }

  public function showHomeLocation()
    {
        header("Location: " . BASE_URL . "productos");
        exit();
    }
  public function ShowLoginError($texto){
    require 'templates/loginError.phtml';
  }
  public function showHomeRegistrado($productos,$proveedores,$medidas,$categorias){
    require 'templates/homeRegistrado.phtml';
  }
}