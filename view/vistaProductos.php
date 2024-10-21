<?php


class vistaProductos{
     
    private $user=null;
     
    public function __construct($user){
        $this->user=$user;
    }
     
     
     
    
    public function mostrarProductos($productos,$proveedores,$medidas,$categorias){ 
        require 'templates/productos.phtml';
        }
    
    public function mostrarProducto($producto){ 
        require 'templates/producto.phtml';
        }
    
    public function showHomeLocation()
    {
        header("Location: " . BASE_URL . "productos");
        exit();
    }
    public function modificarProducto($producto,$proveedores,$medidas,$categorias){
        require 'templates/modificar.phtml';
    }

    public function mostararFiltrados($productos,$proveedores,$medidas,$categorias){
        require 'templates/mostararFiltrados.phtml';
    }




    
    }
    
    
    
    
    ?>