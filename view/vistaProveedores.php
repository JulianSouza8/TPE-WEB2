<?php


class vistaProveedores{
     
     private $user=null;
     
    public function __construct($user){
        $this->user=$user;
    }
     
    
    public function mostrarProovedores($proveedores){ 
        require 'templates/proveedores.phtml';
        }

        public function showHomeLocation()
    {
        header("Location: " . BASE_URL . "proveedores");
        exit();
    }

    public function mostrarProveedor($proveedor){ 
        require 'templates/proveedor.phtml';
        }

    public function modificarProveedor($proveedor){
        require 'templates/modificarProveedor.phtml';
    }
    }