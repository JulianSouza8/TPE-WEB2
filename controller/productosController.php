<?php
require_once "view/vistaProductos.php";
require_once "model/productosModel.php";
require_once "model/proveedoresModel.php";
require_once "model/modelCategorias.php";
require_once "model/modelMedidas.php";


class productosController{

    private $cont;
    private $view;
    private $model;
    private $modelProveedores;
    private $modelMedidas;
    private $modelCategorias;
    private $admin = 0;
    

    function __construct($res){
        $this->view = new vistaProductos($res->user);
        $this->model = new productosModel();
        $this->proveedoresModel = new proveedoresModel();
        $this->modelMedidas = new modelMedidas();
        $this->modelCategorias = new modelCategorias();
    }





    public function verproductos(){
        $productos = $this->model->getProductos();
        $proveedores = $this->proveedoresModel->getProveedores();
        $medidas = $this->modelMedidas->getMedidas();
        $categorias = $this->modelCategorias->getCategorias();       
        $this->view->mostrarProductos($productos,$proveedores,$medidas,$categorias);
    }

    public function verproducto($id_producto){
        $producto = $this->model->getProducto($id_producto);
        $this->view->mostrarProducto($producto);
    }

    public function eliminarproducto($id_producto)
    {
        $this->model->borrarProducto($id_producto);
        $this->view->showHomeLocation();
    }
    public function modificar($id_producto){
        $producto = $this->model->getProducto($id_producto);
        $proveedores = $this->proveedoresModel->getProveedores();
        $medidas = $this->modelMedidas->getMedidas();
        $categorias = $this->modelCategorias->getCategorias(); 



        $this->view->modificarProducto($producto,$proveedores,$medidas,$categorias);
    }
    public function update($id_producto){
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $unidad_medida = $_POST['unidad_medida'];
        $proveedor = $_POST['proveedor'];
        $this->model->updateProducto($id_producto,$nombre,$categoria,$unidad_medida,$proveedor);
        $this->view->showHomeLocation();
    }
    public function agregarProducto(){
        $nombre = $_POST['new_nombre'];
        $categoria = $_POST['new_id_categoria'];
        $proveedor = $_POST['new_id_proveedor'];
        $unidad_medida = $_POST['new_id_medida'];
        $this->model->agregarProducto($nombre,$categoria,$unidad_medida,$proveedor);
        $this->view->showHomeLocation();
    }

    public function filtrado(){
        $id_categoria = $_POST['id_categoria_filtro'];
        $proveedores = $this->proveedoresModel->getProveedores();
        $medidas = $this->modelMedidas->getMedidas();
        $categorias = $this->modelCategorias->getCategorias();
        if($id_categoria == 'TODOS'){
            $this->view->showHomeLocation();
        }
        else {
            $productos = $this->model->filtroCategoria($id_categoria);
            $this->view->mostararFiltrados($productos,$proveedores,$medidas,$categorias);
        }
        
        
    }
}


?>